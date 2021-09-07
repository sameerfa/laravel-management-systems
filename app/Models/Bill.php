<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const PATIENT_TYPE_SELECT = [
        'Inpatient'  => 'Inpatient',
        'Outpatient' => 'Outpatient',
    ];

    public $table = 'bills';

    public $orderable = [
        'id',
        'patient.name',
        'patient_type',
        'doctor_charge',
        'medicine_charge',
        'room_charge',
        'operation_charge',
        'no_of_days',
        'nursing_charge',
        'advance',
        'health_card',
        'lab_charge',
        'bill',
    ];

    public $filterable = [
        'id',
        'patient.name',
        'patient_type',
        'doctor_charge',
        'medicine_charge',
        'room_charge',
        'operation_charge',
        'no_of_days',
        'nursing_charge',
        'advance',
        'health_card',
        'lab_charge',
        'bill',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'patient_id',
        'patient_type',
        'doctor_charge',
        'medicine_charge',
        'room_charge',
        'operation_charge',
        'no_of_days',
        'nursing_charge',
        'advance',
        'health_card',
        'lab_charge',
        'bill',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function getPatientTypeLabelAttribute($value)
    {
        return static::PATIENT_TYPE_SELECT[$this->patient_type] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
