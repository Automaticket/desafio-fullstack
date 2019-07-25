<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UsersResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index()
    {
        return UsersResource::collection(
            User::orderBy('updated_at', 'desc')->paginate()
        );
    }

    public function user($id)
    {
        return response(new UsersResource(User::findOrFail($id)));
    }

    public function store(UserRequest $request)
    {
        $data = [
            'name'              => $request->name,
            'email'             => $request->email,
            'sex'               => $request->sex,
            'birth_date'        => $request->birth_date,
            'cell_phone'        => $request->cell_phone,
            'father_name'       => $request->father_name,
            'mother_name'       => $request->mother_name,
            'email_verified_at' => now(),
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token'    => Str::random(10),
        ];

        $user = User::create($data);

        $address = $request->address;
        $address['user_id'] = $user->id;
        Address::create($address);

        return response()->json([], Response::HTTP_OK);
    }

    public function show($id)
    {
        //
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->cell_phone  = $request->cell_phone;
        $user->sex         = $request->sex;
        $user->birth_date  = $request->birth_date;
        $user->save();

        $address = $user->address;
        $address->cep          = $request->address['cep'];
        $address->logradouro   = $request->address['logradouro'];
        $address->number       = $request->address['number'];
        $address->complement   = $request->address['complement'];
        $address->neighborhood = $request->address['neighborhood'];
        $address->city         = $request->address['city'];
        $address->state        = $request->address['state'];

        $address->save();

        return response()->json([], Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([], Response::HTTP_OK);
    }
}
