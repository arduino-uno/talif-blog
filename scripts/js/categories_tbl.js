    // fetch data from MySQL
    var table_contacts = $('#categories_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"./scripts/fetch_categories.php",
            type:"POST"
        },
        "columnDefs":[
            {data: 'cat_id', className: 'text-center', name: 'category_id', targets:0, orderable: true, searchable: true},
            {data: 'name', className: 'font-weight-bold', name: 'name', targets:1},
            {data: 'description', className: 'font-weight-normal', name: 'description', targets:2},
            {data: 'cat_id', className: 'text-center', name: 'action', targets:-1,
                render: function(data,type,full,meta) {
                    return "<div class='btn-group' role='group'>" +
                              "<button type='button' class='btn btn-primary btn-sm' onclick='edit_category(" + data + ")' data-toggle='tooltip' data-placement='top' title='Update Data'><i class='fas fa-edit'></i>&nbsp;Update</button>" +
                              "<button type='button' class='btn btn-warning btn-sm' onclick='delete_category(" + data + ")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
                           "</div>";
                },
            }],
        "select":{
            style: 'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],
        dom: 'lBfrtip',
        buttons: [{
            className: 'btn btn-primary btn-sm mr-2',
            text: '<i class="fas fa-plus text-success"></i> Add New',
            titleAttr: 'Add New Category',
            action: function ( e, dt, node, config ) {
                $('#form_newcat')[0].reset();
                $('#modal_newcat').modal('show');
            }
        },{
            extend: 'copyHtml5',
            className: 'btn btn-primary btn-sm',
            text: '<i class="fas fa-copy"></i> Copy',
            titleAttr: 'Copy'
        },{
            extend: 'excelHtml5',
            className: 'btn btn-primary btn-sm',
            text: '<i class="fas fa-file-excel"></i> Excel',
            titleAttr: 'Excel'
        },{
            extend: 'csvHtml5',
            className: 'btn btn-primary btn-sm',
            text: '<i class="fas fa-file-csv"></i> CSV',
            titleAttr: 'CSV'
        },{
            extend: 'pdfHtml5',
            className: 'btn btn-primary btn-sm',
            text: '<i class="fas fa-file-pdf"></i> PDF',
            titleAttr: 'PDF'
        },{
            extend: 'print',
            className: 'btn btn-primary btn-sm',
            text: '<i class="fas fa-print"></i> Print',
            titleAttr: 'Print'
        },{
            extend: 'colvis',
            className: 'btn btn-primary btn-sm',
            text: '<i class="fas fa-search-plus"></i> Column Visibility',
            titleAttr: 'ColVis'
        }]

    });

    $("form#form_newcat").submit( function(e) {
        var form = $("form#form_newcat");
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: new FormData( this ),
            processData: false,  // Important!
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function( response ) {

                if ( response.indexOf("Inserted") !== -1 ) {
                    $('#success').trigger("play");
                    toastr.info('The data was added successfully.');
                } else {
                    $('#error').trigger("play");
                    toastr.error('Something went wrong.');
                }

            }

        });

        window.setTimeout(function(){
            table_contacts.ajax.reload();
            $('#modal_newcat').modal('hide');
        }, 3000);

    });

    function edit_category(cat_id){
        // alert("Update Post: " + cat_id);
        $('#form_editcat')[0].reset();
        $.ajax({
           method: 'POST',
           url: './scripts/get_catdetail.php',
           data: { 'cat_id': cat_id },
           datatype: 'JSON',
           success: function ( myData ) {
               $.each( JSON.parse( myData ), function( index, value ) {
                   $("#upt_cat_name").val(value.name);
                   $("#upt_cat_desc").val(value.description);
               });
           }
        });

        $('#hid_cat_id').val(cat_id);
        $('#modal_editcat').modal('show');
    };

    $("form#form_editcat").submit( function(e) {
        var form = $("form#form_editcat");
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            url: form.attr('action'),
            data: new FormData( this ),
            processData: false,  // Important!
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function( response ) {

                if ( response.indexOf("Updated") !== -1 ) {
                    $('#success').trigger("play");
                    toastr.info('The data was updated successfully.');
                } else {
                    $('#error').trigger("play");
                    toastr.error('Something went wrong.');
                }

            }

        });

        window.setTimeout(function(){
            table_contacts.ajax.reload();
            $('#modal_editcat').modal('hide');
        }, 3000);

    });

    function delete_category(cat_id){
        // alert("Delete Post: " + post_id);
        $('#hid_cat_id').val(cat_id);
        $('#modal_delcategory').modal('show');
    };

    $('#btn_delete').on('click', function (e) {

         var cat_id = $('#hid_cat_id').val();
         $.ajax({
             method: 'POST',
             url: './scripts/delete_category.php',
             data: { 'cat_id': cat_id },
             success: function ( response ) {
                 if ( response.indexOf("Deleted") !== -1 ) {
                     $('#success').trigger("play");
                     toastr.info('The data was deleted successfully.');
                 } else {
                     $('#error').trigger("play");
                     toastr.error('Something went wrong.');
                 }
             }

        });

        window.setTimeout(function(){
            table_contacts.ajax.reload();
            $('#modal_delcategory').modal('hide');
        }, 3000);

    });

    $('#modal_newcat, #modal_editcat, #modal_delcategory').on('show.bs.modal', function () {
        $('#dialog_appear').trigger("play");
    });

    $('#modal_newcat, #modal_editcat, #modal_delcategory').on('hidden.bs.modal', function () {
        $('#dialog_disappear').trigger("play");
    });
