<?php

namespace App\Http\Requests\Device;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'user_id' => [Rule::requiredIf(function () {
                return (auth()->user()->isAdmin()) ? true : false;
            }), 'exists:users,id'],
            'maintenances' => 'required|exists:maintenances,id',
            'description' => 'required|string',
        ];
    }
}
