<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="icon-menu9"></i>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ route('admin.users.edit',['id' => $user->id]) }}"><i class="icon-pen6"></i> Editar</a></li>
            @if($user->active)
                <li>
                    <a href="#" class="desativa" data-id="{{ $user->id }}" data-value="0">
                        <i class="icon-user-block"></i> Desativar
                    </a>
                </li>
            @else
                <li>
                    <a href="#" class="ativar" data-id="{{ $user->id }}" data-value="1">
                        <i class="icon-user-check"></i> Ativar
                    </a>
                </li>
            @endif
        </ul>
    </li>
</ul>