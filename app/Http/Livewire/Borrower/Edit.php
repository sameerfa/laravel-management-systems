<?php

namespace App\Http\Livewire\Borrower;

use App\Models\Book;
use App\Models\Borrower;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public Borrower $borrower;

    public array $listsForFields = [];

    public function mount(Borrower $borrower)
    {
        $this->borrower = $borrower;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.borrower.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->borrower->save();

        return redirect()->route('admin.borrowers.index');
    }

    protected function rules(): array
    {
        return [
            'borrower.student_id' => [
                'integer',
                'exists:students,id',
                'required',
            ],
            'borrower.book_id' => [
                'integer',
                'exists:books,id',
                'required',
            ],
            'borrower.borrowed_from' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'borrower.borrowed_to' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'borrower.return_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'borrower.user_id' => [
                'integer',
                'exists:users,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['student'] = Student::pluck('name', 'id')->toArray();
        $this->listsForFields['book']    = Book::pluck('isbn', 'id')->toArray();
        $this->listsForFields['user']    = User::pluck('name', 'id')->toArray();
    }
}
