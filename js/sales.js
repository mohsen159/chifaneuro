var table = $('#Sales').DataTable({
    responsive: true,
    paging: false,
    dom: 'Bfrtip',
    buttons: [{
        text: 'add',
        action: function () {

            //alert("nothing for now ")
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
        text: 'excel',
        exportOptions: {
            columns: ':visible',
            modifier: {
                page: 'current'
            }
        }
    },
        'colvis'
    ],

    columnDefs: [{
        targets: -1,
        visible: true
    },
    {
        targets: 0,
        visible: false
    }
    ],

    order: [
        [0, "desc"]
    ]
});