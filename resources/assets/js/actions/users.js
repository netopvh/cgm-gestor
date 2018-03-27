$.extend( $.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
        orderable: false,
        width: '100px'
    }],
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    language: {
        search: '<span>Filtro:</span> _INPUT_',
        searchPlaceholder: 'Pesquisar',
        lengthMenu: '<span>Exibir:</span> _MENU_',
        processing: "Processando...",
        infoEmpty: "Mostrando 0 até 0 de 0 registros",
        zeroRecords: "Nenhum registro encontrado",
        emptyTable: "Nenhum registro encontrado",
        paginate: { 'first': 'Primeiro', 'last': 'Último', 'next': '&rarr;', 'previous': '&larr;' }
    },
    drawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function() {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
});


let usersTable = $('#users');

if (usersTable.length) {
    let oTableUser = usersTable.DataTable({
        serverSide: true,
        processing: true,
        ajax: '/api/users'
    })
}

// Enable Select2 select for the length option
$('.dataTables_length select').select2({
    minimumResultsForSearch: Infinity,
    width: 'auto'
});