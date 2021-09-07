<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class ModelExport implements FromCollection
{
    use Exportable;

    public Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function collection(): Collection
    {
        return $this->model->all();
    }
}
