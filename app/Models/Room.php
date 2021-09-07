<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_SELECT = [
        'Vacant'  => 'Vacant',
        'Blocked' => 'Blocked',
        'Booked'  => 'Booked',
    ];

    public $table = 'rooms';

    public $orderable = [
        'id',
        'room_type.room_type',
        'room_number',
        'description',
        'status',
    ];

    public $filterable = [
        'id',
        'room_type.room_type',
        'room_number',
        'description',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'room_type_id',
        'room_number',
        'description',
        'status',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
