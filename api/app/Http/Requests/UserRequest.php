<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                 => 'required',
            'email'                => 'required',
            'cell_phone'           => 'required',
            'birth_date'           => 'required',
            'sex'                  => 'required',
            'address.cep'          => 'required',
            'address.logradouro'   => 'required',
            'address.number'       => 'required',
            'address.complement'   => 'nullable',
            'address.neighborhood' => 'required',
            'address.city'         => 'required',
            'address.state'        => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'address.cep'          => 'CEP',
            'address.logradouro'   => 'logradouro',
            'address.number'       => 'number',
            'address.neighborhood' => 'neighborhood',
            'address.city'         => 'city',
            'address.state'        => 'state',
        ];
    }
}
