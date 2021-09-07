<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'books';

    public $orderable = [
        'id',
        'isbn',
        'book_title',
        'category.category_name',
        'binding.binding_name',
        'summary',
        'author_name',
        'published_date',
        'total_copies',
        'available_copies',
        'shelf.shelf_number',
    ];

    public $filterable = [
        'id',
        'isbn',
        'book_title',
        'category.category_name',
        'binding.binding_name',
        'summary',
        'author_name',
        'published_date',
        'total_copies',
        'available_copies',
        'shelf.shelf_number',
    ];

    protected $appends = [
        'book_image',
        'ebook',
    ];

    protected $dates = [
        'published_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'isbn',
        'book_title',
        'category_id',
        'binding_id',
        'summary',
        'author_name',
        'published_date',
        'total_copies',
        'available_copies',
        'shelf_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getBookImageAttribute()
    {
        return $this->getMedia('book_book_image')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function binding()
    {
        return $this->belongsTo(Binding::class);
    }

    public function getEbookAttribute()
    {
        return $this->getMedia('book_ebook')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getPublishedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setPublishedDateAttribute($value)
    {
        $this->attributes['published_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function shelf()
    {
        return $this->belongsTo(Shelf::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
