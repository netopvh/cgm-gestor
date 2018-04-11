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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        return response()->json([
            $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
