<?php

namespace App\Repositories;

use App\Entities\User;

class UserRepository
{

    public function getAll($paginate = true)
    {
        if($paginate) {
            return User::orderBy('updated_at','desc')->paginate();
        }

        return User::orderBy('updated_at', 'desc')->get();
    }

}