<?php
/**
 * Created by PhpStorm.
 * User: 00545841240
 * Date: 27/03/2018
 * Time: 11:25
 */

namespace App\Domains\Almoxarifado\Controllers;

use App\Core\Http\Controllers\Controller;

class AlmoxarifadoController extends Controller
{

    public function __construct()
    {
        //
    }

    public function index()
    {
        return view('almoxarifado.index');
    }

}