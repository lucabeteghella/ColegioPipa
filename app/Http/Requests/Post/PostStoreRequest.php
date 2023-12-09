<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|int',
            'tag_id' => 'required|int',
            'image' => 'file|mimetypes:image/png,image/jpg,image/jpeg|image:jpg,png,jpeg'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório',
            'description.required' => 'A descrição é obrigatória',
            'category_id.required' => 'A categoria é obrigatória',
            'tag_id.required' => 'A tag é obrigatória',
            'image.image:jpg,png,jpeg' => 'A imagem precisa ser um dos seguintes formatos: jpg, png, jpeg'
        ];
    }
}
