<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return response()->json(
            User::orderBy('updated_at', 'desc')->paginate()
        );
    }

    public function user($id)
    {
        return response()->json(User::select(
            'id',
            'name',
            'email',
            'father_name',
            'mother_name',
            'cell_phone',
            'sex',
            'birth_date'
        )
        ->findOrFail($id));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
