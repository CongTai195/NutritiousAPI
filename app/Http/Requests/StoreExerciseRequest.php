<?php

namespace App\Http\Requests;

use App\Helpers\ErrorCodeHelper;
use App\Helpers\HttpCode;
use App\Helpers\ResponseHelper;
use App\Helpers\Status;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class StoreExerciseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'diary_id' => 'required',
            'name' => 'required|unique:exercises',
            'calories' => 'required',
            'duration' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * handle response validate.
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = [];
        $fields = array_keys($this->rules());
        $validator_errors = (new ValidationException($validator))->errors();
        foreach ($fields as $field) {
            if ($validator_errors[$field] ?? 0) {
                $errors[$field] = $validator_errors[$field][0];
            }
        }
        throw new HttpResponseException(
            ResponseHelper::send([], Status::NG, HttpCode::UNPROCESSABLE_ENTITY, $errors)
        );
    }
}
