<?php

namespace App\Domains\Access\Controllers;

use App\Core\Exceptions\GeneralException;
use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;
use App\Domains\Access\Models\User;
use Prettus\Validator\Exceptions\ValidatorException;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrativo.users.index');
    }

    public function create()
    {
        return view('administrativo.users.create');
    }

    /**
     * Armazena registro no banco de dados
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    public function edit($id)
    {
        try {
            $user = $this->userRepository->findExists('id', $id);
            return view('administrativo.users.edit')
                ->withUser($user);
        } catch (GeneralException $e) {
            return redirect()->route('admin.users.index')
                ->with('errors', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->userRepository->update($request->all(), $id);
            return redirect()
                ->route('admin.users.index')
                ->with('success', 'Registro atualizado com sucesso!');
        } catch (ValidatorException $e) {
            return redirect()->back()
                ->with('error', $e->getMessageBag())
                ->withInput();
        }
    }
}
