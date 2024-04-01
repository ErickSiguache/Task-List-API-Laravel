<?php

namespace App\Http\Requests;

use App\Utils\StatusTypes;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $method = $this->method();
        $general_rules = [
            'content' => 'nullable|min:5|max:500',
            'status' => 'required|in:'.StatusTypes::get('DELETED').','.StatusTypes::get('NOT_DELETED'),
            'category_id' => 'required|min:0|integer'
        ];

        if ($method === 'PUT') {
            return [
                'name' => 'required|max:100|min:3|unique:tasks,name,'.request()->route('id').',id',
                ...$general_rules
            ];
        }

        return [
            'name' => 'required|max:100|min:3|unique:tasks,name,'.$this->get('id').',id',
            ...$general_rules
        ];
    }
}
