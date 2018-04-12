<?php

namespace App\Domains\Access\Controllers\Api;

use App\Domains\Access\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserApiController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(DataTables $dataTables)
    {
        $model = $this->userRepository->select(['id','name','email','active']);

        return $dataTables->eloquent($model)
            ->editColumn('active', function($user){
                return $user->active? '<span class="label label-success">Ativo</span>':'<span class="label label-danger">Inativo</span>';
            })
            ->addColumn('action', function ($user){
                return view('administrativo.users.actions',compact('user'));
            })
            ->rawColumns(['active','action'])
            ->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->userRepository->find($id);
        $user->active = $request->active;

        if(! $user->save()){
            return response()->json([
                'status' => 'Error'
            ]);
        }
    }
}
