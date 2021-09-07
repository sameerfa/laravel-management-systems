<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmCustomer extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'crm_customers';

    public $orderable = [
        'id',
        'first_name',
        'last_name',
        'status.name',
        'email',
        'phone',
        'address',
        'skype',
        'website',
        'description',
    ];

    public $filterable = [
        'id',
        'first_name',
        'last_name',
        'status.name',
        'email',
        'phone',
        'address',
        'skype',
        'website',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'status_id',
        'email',
        'phone',
        'address',
        'skype',
        'website',
        'description',
    ];

    public function status()
    {
        return $this->belongsTo(CrmStatus::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
