<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'projects';

    public $orderable = [
        'id',
        'project_name',
        'brief',
        'customer.first_name',
        'hourly_rate',
        'total_hours',
        'estimated_hours',
    ];

    public $filterable = [
        'id',
        'project_name',
        'brief',
        'customer.first_name',
        'hourly_rate',
        'total_hours',
        'estimated_hours',
    ];

    protected $appends = [
        'related_files',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'project_name',
        'brief',
        'customer_id',
        'hourly_rate',
        'total_hours',
        'estimated_hours',
    ];

    public function getRelatedFilesAttribute()
    {
        return $this->getMedia('project_related_files')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function customer()
    {
        return $this->belongsTo(CrmCustomer::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
