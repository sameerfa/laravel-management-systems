<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'bookings';

    public $orderable = [
        'id',
        'room.room_number',
        'customer.customer_name',
        'booking_date',
        'checkin',
        'checkout',
    ];

    public $filterable = [
        'id',
        'room.room_number',
        'customer.customer_name',
        'booking_date',
        'checkin',
        'checkout',
    ];

    protected $fillable = [
        'room_id',
        'customer_id',
        'booking_date',
        'checkin',
        'checkout',
    ];

    protected $dates = [
        'booking_date',
        'checkin',
        'checkout',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getBookingDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setBookingDateAttribute($value)
    {
        $this->attributes['booking_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCheckinAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setCheckinAttribute($value)
    {
        $this->attributes['checkin'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getCheckoutAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setCheckoutAttribute($value)
    {
        $this->attributes['checkout'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
