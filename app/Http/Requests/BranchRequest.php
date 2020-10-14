<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'branch_name' => ['required'],
            'branch_street' => ['required'],
            'branch_city' => ['required'],
            'branch_state' => ['required'],
            'branch_post_code' => ['required'],
            'branch_country' => ['required'],
            'branch_contact_number' => ['required'],
            'branch_operating_hours'=> ['required'],
            'brance_other_info'=>[],
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
        ];
    }
}
