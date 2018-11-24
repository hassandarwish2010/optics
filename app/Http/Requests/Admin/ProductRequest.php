<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
          'code' => 'required|string|max:191|min:2',
          'image' => 'image|max:5000',
          'brand_id' => 'required',
          'gender' => 'required',
          'type' => 'required',
          'keywords' => 'required|string|max:191|min:2',
      ];
    }
}
