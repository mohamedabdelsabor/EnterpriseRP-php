<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EmployeeRequest extends FormRequest
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
            'first_name' => 'required|string|min:4',
            'last_name' => 'required|string|min:4',
            'company_id' => 'nullable|exists:companies,id',
            'email' => 'nullable|email|unique:employees,email,' . data_get($this->route('employee'), 'id'),
            'phone' => 'nullable|string|min:11,unique:employees,phone,' . data_get($this->route('employee'), 'id'),
        ];
    }
}
