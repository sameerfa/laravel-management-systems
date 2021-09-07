<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_create');
    }

    protected function rules(): array
    {
        return [
            'project.project_name' => [
                'string',
                'required',
            ],
            'project.brief' => [
                'string',
                'required',
            ],
            'mediaCollections.project_related_files' => [
                'array',
                'nullable',
            ],
            'mediaCollections.project_related_files.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'project.customer_id' => [
                'integer',
                'exists:crm_customers,id',
                'required',
            ],
            'project.hourly_rate' => [
                'numeric',
                'required',
            ],
            'project.total_hours' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'project.estimated_hours' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
