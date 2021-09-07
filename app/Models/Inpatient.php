<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inpatient extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'inpatients';

    public $orderable = [
        'id',
        'room.room_number',
        'admission_date',
        'discharge_date',
        'advance',
        'lab.lab_number',
    ];

    public $filterable = [
        'id',
        'room.room_number',
        'admission_date',
        'discharge_date',
        'advance',
        'lab.lab_number',
    ];

    protected $fillable = [
        'room_id',
        'admission_date',
        'discharge_date',
        'advance',
        'lab_id',
    ];

    protected $dates = [
        'admission_date',
        'discharge_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getAdmissionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setAdmissionDateAttribute($value)
    {
        $this->attributes['admission_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDischargeDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDischargeDateAttribute($value)
    {
        $this->attributes['discharge_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
