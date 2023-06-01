<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:4',
            'website' => 'nullable|string|min:4',
            'email' => 'nullable|email|unique:companies,email,' . data_get($this->route('company'), 'id'),
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100'
        ];
    }
}
