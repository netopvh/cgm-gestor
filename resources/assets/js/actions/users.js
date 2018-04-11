$.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [
        {
            orderable: false,
            width: '100px'
        }
    ],
    language: {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar: ",
        "oPaginate": {
            "sNext": "&rarr;",
            "sPrevious": "&larr;",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    },
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    drawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
});

//SETUP CSRF TOKEN
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var lastIdx = null;
var usersTable = $('#users').DataTable({
    serverSide: true,
    processing: true,
    responsive: true,
    columnDefs: [
        {
            targets: 4,
            className: "text-center",
        }
    ],
    ajax: '/api/users',
    columns: [
        {data: 'id', width: '90px'},
        {data: 'name'},
        {data: 'email'},
        {data: 'active', width: '100px'},
        {data: 'action', width: '80px', sortable: false}
    ]
});

// Highlighting rows and columns on mouseover
$('.datatable-highlight tbody').on('mouseover', 'td', function() {
    var colIdx = usersTable.cell(this).index().column;

    if (colIdx !== lastIdx) {
        $(usersTable.cells().nodes()).removeClass('active');
        $(usersTable.column(colIdx).nodes()).addClass('active');
    }
}).on('mouseleave', function() {
    $(usersTable.cells().nodes()).removeClass('active');
});

$('table[data-form="tblUsers"]').on('click','.ativar',function (e) {
    e.preventDefault();
    var vm = $(this);
    console.log('ID: ' + vm.data('id') + ' - Ação:' + vm.data('value'));
    $.ajax({
        url: '/api/users/' + vm.data('id'),
        type: "patch",
        data: {
            active: vm.data('value'),
        },
        success: function (data) {
            console.log("Resultado: " + data)
            //usersTable.ajax.reload(null, false);
        },
        error: function (request, status, error) {
            console.log(request);
            console.log(status);
            console.log(error);
        }
    })
});

$('table[data-form="tblUsers"]').on('click','.desativa',function (e) {
    e.preventDefault();
    var vm = $(this);
    $.ajax({
        url: '/api/users/' + vm.data('id'),
        type: "patch",
        data: {
            active: vm.data('value'),
        },
        success: function (data) {
            console.log("teste");
            //usersTable.ajax.reload(null, false);
        },
        error: function (request, status, error) {
            console.log(request);
            console.log(status);
            console.log(error);
        }
    })
});


