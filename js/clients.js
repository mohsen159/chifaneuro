$(document).ready(function() {
    let table = $('.client-table').DataTable({
        responsive: true,
        paging: false,
        dom: 'Bfrtip',
        buttons: [{
                text: 'Add',
                action: function () {
                    $('#add').modal('show');
                }
            },
            {
                extend: 'print',
                messageTop: ' ',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                    columns: ':visible',
                    modifier: {
                        page: 'current'
                    }
                }
            },
            'colvis'
        ],
        order: [
            [0, 'desc']
        ]
    });


    $('#search-input').on('keyup', function() {
        table.search(this.value).draw();
    });
});