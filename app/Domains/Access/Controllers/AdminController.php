<?php
/**
 * Created by PhpStorm.
 * User: 00545841240
 * Date: 27/03/2018
 * Time: 11:53
 */

namespace App\Domains\Access\Controllers;

use App\Core\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('administrativo.index');
    }
}