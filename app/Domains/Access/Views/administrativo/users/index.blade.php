@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <h6 class="panel-title">Usuários<a class="heading-elements-toggle"><i class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary legitRipple"><i class="icon-database-add"></i> Novo</a>
                    <a href="" class="btn btn-primary legitRipple"><i class="icon-file-excel"></i> Exportar</a>
                </div>
                <table class="table table-bordered table-condensed table-hover datatable-highlight" id="users" data-form="tblUsers">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
