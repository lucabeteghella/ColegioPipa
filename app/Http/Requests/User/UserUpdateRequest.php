<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'string',
            'image' => 'file|mimetypes:image/png,image/jpg,image/jpeg|image:jpg,png,jpeg',
            'permission_id' => 'exists:permissions,id',
            'password' => 'min:4|max:16'
        ];
    }

    public function messages()
    {
        return [
            'image.image:jpg,png,jpeg' => 'A imagem precisa ser um dos seguintes formatos: jpg, png, jpeg',
            'permission_id.exists' => 'Tipo de permissão não existente',
            'password.min' => 'A senha deve ter entre 8 e 16 caracteres',
            'password.max' => 'A senha deve ter entre 8 e 16 caracteres'
        ];
    }
}
