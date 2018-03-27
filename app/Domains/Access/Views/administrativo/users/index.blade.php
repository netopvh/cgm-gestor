@extends('layouts.app')

@section('page-header')

@stop

@section('content')
    <app-page width="8">
        <app-panel title="Lista de Usuários">
            <table class="table" id="users">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>
            </table>
        </app-panel>
    </app-page>
@stop
