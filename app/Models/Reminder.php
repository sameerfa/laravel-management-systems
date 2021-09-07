<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'reminders';

    public $orderable = [
        'id',
        'booking.booking_date',
        'reminder_type',
        'reminder_detail',
        'datetime',
    ];

    public $filterable = [
        'id',
        'booking.booking_date',
        'reminder_type',
        'reminder_detail',
        'datetime',
    ];

    protected $dates = [
        'datetime',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'booking_id',
        'reminder_type',
        'reminder_detail',
        'datetime',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function getDatetimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDatetimeAttribute($value)
    {
        $this->attributes['datetime'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
