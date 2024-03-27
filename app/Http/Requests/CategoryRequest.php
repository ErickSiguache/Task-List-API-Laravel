<?php

namespace App\Http\Requests;

use App\Utils\StatusTypes;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $method = $this->method();
        $general_rules = [
            "description" => "required|max:200|nullable",
            "status" => "required|in:".StatusTypes::get('DELETED').",".StatusTypes::get('NOT_DELETED')
        ];

        if ($method === 'PUT') {
            return [
                "name" => "required|max:50|min:3|unique:categories,name,".request()->route('id').',id',
                ...$general_rules
            ];
        }

        return [
            "name" => "required|max:50|min:3|unique:categories,name,".$this->get('id').',id',
            ...$general_rules
        ];
    }
}
