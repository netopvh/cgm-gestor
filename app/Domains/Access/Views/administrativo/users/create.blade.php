@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <h6 class="panel-title">Usuários<a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.users.store') }}" class="form-validate" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-bold">Usuário: </label>
                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="text-bold">Nome: </label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-bold">Senha:</label>
                                    <input type="password" name="passoword" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="text-bold">Email: </label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="text-bold">Perfil:</label>
                                        <select name="role" class="select" required></select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary legitRipple"><i
                                            class="icon-database-insert"></i> Cadastrar
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-info legitRipple"><i
                                            class="icon-reply"></i> Retornar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop