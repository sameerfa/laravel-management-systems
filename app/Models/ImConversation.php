<?php

namespace App\Models;

use App\Models\ImMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImConversation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['subject', 'owner_id'];
    protected $with     = ['recipients'];

    public function messages()
    {
        return $this->hasMany(ImMessage::class, 'conversation_id')->latest('id');
    }

    public function recipients()
    {
        return $this->belongsToMany(User::class, 'im_recipients', 'conversation_id', 'user_id')->withTrashed()->withPivot('seen_at');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id')->withTrashed();
    }

    public function scopeInboxOrOutbox($query)
    {
        return $query->whereHas('recipients', function ($query) {
            $query->where('id', auth()->id());
        })->latest('updated_at');
    }

    public function scopeInbox($query)
    {
        return $query->inboxOrOutbox()
            ->where('owner_id', '!=', auth()->id())
            ->latest('updated_at');
    }

    public function scopeOutbox($query)
    {
        return $query->inboxOrOutbox()
            ->where('owner_id', auth()->id())
            ->latest('updated_at');
    }

    public function updateSeenAt(): void
    {
        $this->recipients()->updateExistingPivot(auth()->id(), ['seen_at' => now()]);
    }

    public function getIsUnreadAttribute(): bool
    {
        $seen_at = $this->recipients->firstWhere('id', auth()->id())->pivot->seen_at;

        return $this->updated_at->gt($seen_at);
    }

    public static function getUnreadConversations(): array
    {
        $unreadConversations = ['inbox' => 0, 'outbox' => 0, 'all' => 0];

        ImConversation::inboxOrOutbox()
            ->each(function ($conversation) use (&$unreadConversations) {
                $seen_at = $conversation->recipients->firstWhere('id', auth()->id())->pivot->seen_at;

                if (!$conversation->updated_at->gt($seen_at)) {
                    return;
                }

                ++$unreadConversations['all'];

                if ($conversation->owner_id === auth()->id()) {
                    ++$unreadConversations['outbox'];
                } else {
                    ++$unreadConversations['inbox'];
                }
            });

        return $unreadConversations;
    }
}
