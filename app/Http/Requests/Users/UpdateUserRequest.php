<?php

namespace App\Http\Requests\Users;


class UpdateUserRequest extends UserRequest
{
    public function authorize() : bool
    {
        return true;
    }

    public function rules() : array
    {
        return [
            'name' => ['string', 'max:50'],
        ];
    }
}
