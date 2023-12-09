<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required',
            'cpf' => 'required|unique:users,cpf',
            'image' => 'file|mimetypes:image/png,image/jpg,image/jpeg|image:jpg,png,jpeg',
            'permission_id' => 'exists:permissions,id',
            'password' => 'required|min:4|max:16'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.unique' => 'O email já existe no sistema',
            'phone_number.required' => 'O telefone é obrigatório',
            'cpf.required' => 'O CPF é obrigatório',
            'cpf.unique' => 'O CPF já existe no sistema',
            'image.image:jpg,png,jpeg' => 'A imagem precisa ser um dos seguintes formatos: jpg, png, jpeg',
            'permission_id.exists' => 'Tipo de permissão não existente',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter entre 8 e 16 caracteres',
            'password.max' => 'A senha deve ter entre 8 e 16 caracteres'
        ];
    }
}
