<?php

namespace App\Models;

use App\Models\ImConversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImMessage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['body', 'user_id'];

    protected $touches = ['conversation'];

    public function conversation()
    {
        return $this->belongsTo(ImConversation::class, 'conversation_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
