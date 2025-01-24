<?php

declare(strict_types=1);

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class SaveProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'name' => ['required', 'string', 'max:155'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['nullable', 'string'],
        ];
    }

    public function attributes(): array
    {
        if (app()->getLocale() == 'ru') {
            return [
                'user_id' => 'пользователь'
            ];
        } else {
            return [
                'user_id' => 'username'
            ];
        }
    }
}
