<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'borrowers';

    public $orderable = [
        'id',
        'student.name',
        'book.isbn',
        'borrowed_from',
        'borrowed_to',
        'return_date',
        'user.name',
    ];

    public $filterable = [
        'id',
        'student.name',
        'book.isbn',
        'borrowed_from',
        'borrowed_to',
        'return_date',
        'user.name',
    ];

    protected $fillable = [
        'student_id',
        'book_id',
        'borrowed_from',
        'borrowed_to',
        'return_date',
        'user_id',
    ];

    protected $dates = [
        'borrowed_from',
        'borrowed_to',
        'return_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function getBorrowedFromAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setBorrowedFromAttribute($value)
    {
        $this->attributes['borrowed_from'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBorrowedToAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setBorrowedToAttribute($value)
    {
        $this->attributes['borrowed_to'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getReturnDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setReturnDateAttribute($value)
    {
        $this->attributes['return_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
