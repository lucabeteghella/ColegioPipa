<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
        return [
            'title' => 'string',
            'description' => 'string',
            'category_id' => 'int',
            'tag_id' => 'int',
            'image' => 'file|mimetypes:image/png,image/jpg,image/jpeg|image:jpg,png,jpeg'
        ];
    }

    public function messages(): array
    {
        return [
            'image.image:jpg,png,jpeg' => 'A imagem precisa ser um dos seguintes formatos: jpg, png, jpeg'
        ];
    }
}
