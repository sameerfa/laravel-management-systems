<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
        'Other'  => 'Other',
    ];

    public $table = 'patients';

    public $orderable = [
        'id',
        'name',
        'age',
        'weight',
        'gender',
        'address',
        'phone_number',
        'disease',
    ];

    public $filterable = [
        'id',
        'name',
        'age',
        'weight',
        'gender',
        'address',
        'phone_number',
        'disease',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'age',
        'weight',
        'gender',
        'address',
        'phone_number',
        'disease',
    ];

    public function getGenderLabelAttribute($value)
    {
        return static::GENDER_SELECT[$this->gender] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
