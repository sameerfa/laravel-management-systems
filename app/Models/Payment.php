<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'payments';

    public $orderable = [
        'id',
        'booking.booking_date',
        'type',
        'amount',
        'payment_type',
        'payment_details',
        'payment_date',
    ];

    public $filterable = [
        'id',
        'booking.booking_date',
        'type',
        'amount',
        'payment_type',
        'payment_details',
        'payment_date',
    ];

    protected $dates = [
        'payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'booking_id',
        'type',
        'amount',
        'payment_type',
        'payment_details',
        'payment_date',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function getPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setPaymentDateAttribute($value)
    {
        $this->attributes['payment_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
