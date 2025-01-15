<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SaveUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['is_admin' => $this->has('is_admin')]);

        is_null($this->password) == $this->request->remove('password');

//        if($this->password == null) {
//            $this->request->remove('password');
//        }
//        if($this->password_confirmation == null) {
//            $this->request->remove('password_confirmation');
//        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $unique = Rule::unique('users')->ignore($this->route('user'));

        return [
            'firstname' => ['required', 'string', 'min:2', 'max:50'],
            'lastname' => ['required', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', $unique],
            'phone' => ['required', 'string', 'min:10', 'max:15'],
            'is_admin' => ['boolean'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'nullable|min:8'
        ];
    }

    public function getName(): string
    {
        return $this->validated('name');
    }
}
