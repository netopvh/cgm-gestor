<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/fonts.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body class="navbar-top">
<div id="app">
    <div class="page-container">
        <div class="page-content">
            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-8 col-centered">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h6 class="panel-title">
                                        <i class="icon-books position-left"></i> Acesso aos Sistemas Internos</h6>
                                    <div class="heading-elements">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                           class="btn btn-primary heading-btn">Sair do Sistema</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <table>
                                        <tr>
                                            <td class="spacer">
                                                <a href="http://protocolo.cgm.portovelho.ro.gov.br/" target="_blank"
                                                   class="btn bg-purple-400 btn-float btn-float-lg">
                                                    <i class="icon-archive"></i>
                                                    <span>e-Protocolo</span>
                                                </a>
                                            </td>
                                            <td class="spacer">
                                                <a href="{{ route('almoxarifado.index') }}"
                                                   class="btn bg-blue-700 btn-float btn-float-lg">
                                                    <i class="icon-store"></i>
                                                    <span>e-Almoxarifado</span>
                                                </a>
                                            </td>
                                            <td class="spacer">
                                                <a href="#" target="_blank"
                                                   class="btn bg-indigo-600 btn-float btn-float-lg">
                                                    <i class="icon-cabinet"></i>
                                                    <span>e-Processos</span>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.index') }}"
                                                   class="btn bg-orange-700 btn-float btn-float-lg">
                                                    <i class="icon-lock2"></i>
                                                    <span>Administrativo</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/bundle.min.js') }}"></script>
</body>
</html>
