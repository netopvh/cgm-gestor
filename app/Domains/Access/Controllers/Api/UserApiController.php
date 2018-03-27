<?php

namespace App\Domains\Access\Controllers\Api;

use App\Domains\Access\Models\User;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class UserApiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(DataTables $dataTables)
    {
        $model = User::query()->select('id','name','email','active');

        return $dataTables->eloquent($model)
            ->addColumn('action', function (){
                return view('administrativo.users.actions');
            })
            ->editColumn('active', function($user){
                return $user->active? 'Ativo':'Inativo';
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
        //
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