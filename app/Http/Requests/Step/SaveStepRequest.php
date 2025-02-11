<?php

namespace App\Http\Requests\Step;

use Illuminate\Foundation\Http\FormRequest;

class SaveStepRequest extends FormRequest
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
            'goal_id' => ['required', 'integer', 'exists:goals,id'],
            'name' => ['required', 'string', 'max:155'],
            'started_at' => ['required', 'date'],
            'finished_at' => ['required', 'date'],
        ];
    }
}
