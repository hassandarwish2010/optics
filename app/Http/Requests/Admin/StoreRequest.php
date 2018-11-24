<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required|string|max:191|min:2',
          'country' => 'required|string|max:191|min:2',
          'city' => 'required|string|max:191|min:2',
          'address' => 'required|string|max:191|min:2',
          'phone' => 'required|string|max:191|min:2',
          'working_hours' => 'required|string|max:191|min:2',
        ];
    }
}
