<?php

namespace App\Http\Controllers\Api;

use App\Entities\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use App\Http\Requests\UserRequest as Request;

class UserController extends Controller
{
    /**
     *
     * @var [UserRepository]
     */
    private $repo;

    /**   
     * @param UserRepository $repo
     */
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;    
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repo->getAll();

        return new UserResource($users);
    }

    /**
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt('password');

        try{
            $user = User::create($data);
            return response()->json($user, 201);
        }catch(\Exception $ex){
            return response()->json([
                'error' => $ex->getMessage()
            ]);
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return $user->fill($request->all());

    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try {
            
            $user->delete();


        }catch(\Exception $ex){
            return response()->json([
                'error' => $ex->getMessage()
            ]);
        }   
    }
}
