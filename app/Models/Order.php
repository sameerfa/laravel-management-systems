<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'orders';

    public $orderable = [
        'id',
        'item_table.name',
        'booking.booking_date',
        'order_date',
        'quantity',
        'cost',
    ];

    public $filterable = [
        'id',
        'item_table.name',
        'booking.booking_date',
        'order_date',
        'quantity',
        'cost',
    ];

    protected $dates = [
        'order_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'item_table_id',
        'booking_id',
        'order_date',
        'quantity',
        'cost',
    ];

    public function itemTable()
    {
        return $this->belongsTo(ItemTable::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function getOrderDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setOrderDateAttribute($value)
    {
        $this->attributes['order_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
