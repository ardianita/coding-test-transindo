<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrashRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $validation = [
            'name'     => ['required', 'max:255'],
            'deskripsi'   => ['required'],
            'category_id'  => ['required', 'integer', 'exists:categories,id'],
            'harga'      => ['required', 'integer']
        ];

        if ($this->isMethod('post')) {
            $validation['foto'] = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        if (!$this->isMethod('post')) {
            $validation['foto'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }

        return $validation;
    }
}
