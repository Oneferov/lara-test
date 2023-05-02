<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \App\Models\User;

class UserUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'user_type_id' => ['required', 'exists:user_types,id'],
            'position_id' => ['required', 'exists:positions,id']
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (User::where('id', '!=', $this->id)->where('email', $this->email)->first()) {
                $validator->errors()->add('email', 'Этот email уже используется в системе');
            }
        });
    }
            

    public function attributes()
    {
        return [
            'first_name' => 'имя',
            'last_name' => 'фамилия',
            'middle_name' => 'отчество',
            'subdivision_id' => 'подразделение',
            'password' => 'пароль',
            'user_type_id' => 'тип',
            'position_id' => 'должность',
        ];
    }
}
