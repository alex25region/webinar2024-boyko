<?php

declare(strict_types=1);

namespace App\Http\Requests\Goal;

use Illuminate\Foundation\Http\FormRequest;

class SaveGoalRequest extends FormRequest
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
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'name' => ['required', 'string', 'max:155'],
            'term_in_months' => ['required', 'integer', 'min:1', 'max:60'],
        ];
    }

    public function getProjectId(): int
    {
        return $this->validated('project_id');
    }
}
