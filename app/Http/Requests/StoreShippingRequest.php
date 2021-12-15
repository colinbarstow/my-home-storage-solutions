<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;


class StoreShippingRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'description' => 'required',
            'carrier' => 'required',
            'delivery_time' => 'required',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return [
            'description.required' => 'A description is required for your shipping template',
            'carrier.required' => 'A carrier is required for your shipping template',
            'delivery_time.required' => 'A delivery time is required for your shipping template',
        ];
    }
}
