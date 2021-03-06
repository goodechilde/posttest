<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class PostUpdateRequest extends FormRequest
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
     * @psalm-suppress PossiblyInvalidMethodCall
     * @psalm-suppress PossiblyNullReference
     */
    public function rules()
    {
        $id = $this->route()->parameter('post')->id;

        /**
         * Usage of id
         * 'username' => 'required|unique:users,username,' . $id,
         */

        return [
            'id' => 'required|unique:posts,id,' . $id,
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            \response()->json([
                'messages' => $validator->errors()->all(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY),
        );
    }

}
