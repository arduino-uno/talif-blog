    // fetch data from MySQL
    var table_pages = $('#pages_data').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"./scripts/fetch_pages.php",
            type:"POST"
        },
        "columnDefs":[
            {data: 'page_id', className: 'font-weight-bold text-center', name: 'page_id', targets:0, orderable: true, searchable: true,
                render: function(data,type,full,meta) {
                    return '<span class="display-4 font-weight-bold">' + data + '</span>';
                }},
            {data: {title:'title', body:'body', image:'image', author_id:'author_id', author_name:'author_name', published:'published', tags:'tags', likes:'likes'}, className: 'font-weight-normal', name: 'title', targets:1,
                render: function(data,type,full,meta) {
                    return '<div class="media">' +
                        '<img class="d-flex m-2 rounded border border-light" src="./images/' + data.image + '" width="60" alt="Generic placeholder image">' +
                        '<div class="media-body">' +
                          '<span class="font-weight-bold">' + data.title + '</span>' +
                          '<p class="info">' + data.body + '</p>' +
                        '</div></div>' +
                        '<p>' +
                          '<i class="fas fa-user"></i>&nbsp;by&nbsp;<a href="./media.php?module=user-profile">' + data.author_name + '</a>&nbsp;' +
                          '|&nbsp;<i class="fas fa-calendar-alt"></i>&nbsp;' + data.published + '&nbsp;' +
                          '|&nbsp;<i class="fas fa-heart"></i>&nbsp;' + data.likes + '&nbsp;Likes&nbsp;' +
                          '|&nbsp;<i class="fas fa-tags"></i>&nbsp;Tags&nbsp;:&nbsp;' + data.tags + '&nbsp;' +
                        '</p>';
                }},
            {data: {page_id:'page_id', status:'status'}, className: 'text-center', name: 'action', targets:-1,
                render: function(data,type,full,meta) {

                    if ( data.status == false ) {
                        var txt_btn = "<i class='fas fa-eye'></i>&nbsp;Published";
                    } else {
                        var txt_btn = "<i class='fas fa-eye-slash'></i>&nbsp;Unpublished";
                    };

                    return "<div class='btn-group m-1' role='group'>" +
                              "<button type='button' class='btn btn-default btn-sm' onclick='publish_page(" + data.page_id + ")' data-toggle='tooltip' data-placement='top' title='Publish Data'>" + txt_btn + "</button>" +
                              "<button type='button' class='btn btn-info btn-sm' onclick='edit_page(" + data.page_id + ")' data-toggle='tooltip' data-placement='top' title='Update Data'><i class='fas fa-edit'></i>&nbsp;Update</button>" +
                              "<button type='button' class='btn btn-warning btn-sm' onclick='delete_page(" + data.page_id + ")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
                           "</div>";

                }
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
            titleAttr: 'Add New Page',
            action: function ( e, dt, node, config ) {
                $('#form_newpage')[0].reset();
                $('#modal_newpage').modal('show');
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
    // Enable CKEDITOR for Pages & Posts body / Contents
    CKEDITOR.replace( 'page_body' );
    // Enable CKEDITOR for Update Pages & Posts body / Contents
    CKEDITOR.replace( 'upt_page_body' );

    $('input#page_tags, input#upt_page_tags').tagsInput({
        interactive: true,
        placeholder: 'Add a tag',
        minChars: 2,
        maxChars: 20, // if not provided there is no limit
        limit: 5, // if not provided there is no limit
        unique: true
    });

    $("form#form_newpage").submit( function(e) {
        var form = $("form#form_newpage");
        var formData = new FormData(this);
        var page_body = CKEDITOR.instances.page_body.getData();
        formData.append( 'page_body', page_body );
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            enctype: form.attr('enctype'),
            url: form.attr('action'),
            data: formData,
            processData: false,  // Important!
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function ( response ) {

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
            table_pages.ajax.reload();
            $('#modal_newpage').modal('hide');
        }, 3000);

    });

    function publish_page( page_id ) {

				$.post( "./scripts/update_page_publish.php", { "page_id": page_id }, function( response ) {
							if ( response.indexOf("Updated") !== -1 ) {
									$('#success').trigger("play");
									toastr.info('The page was published.');
							} else {
									$('#success').trigger("play");
									toastr.info('The page was unpublished.');
							}
				}).fail(function() {
            $('#error').trigger("play");
            toastr.error('Something went wrong.');
        });

				window.setTimeout(function(){
            table_pages.ajax.reload();
        }, 3000);

		};

    function edit_page(page_id){
        // alert("Update Post: " + page_id);
        $('#form_editpage')[0].reset();
        $.ajax({
           method: "POST",
           url: "./scripts/get_pagedetail.php",
           data: { 'page_id': page_id },
           datatype: 'JSON',
           success: function ( myData ) {
               $.each( JSON.parse( myData ), function( index, value ) {

                   $("#upt_page_title").val(value.title);
                   $("#upt_page_body").html(value.body);
                   // Set ckeditor value
                   CKEDITOR.instances.upt_page_body.setData(value.body);
                   $('input#upt_page_tags').importTags( value.tags );
                   $("#upt_page_image").attr("src", "./images/" + value.image);
                   if ( value.status == 1 ) {
                       $("#upt_page_status").prop( "checked", true );
                   } else {
                       $("#upt_page_status").prop( "checked", false );
                   }

               });
           }
        });

        $('#hid_page_id').val(page_id);
        $('#modal_editpage').modal('show');
    };

    $("form#form_editpage").submit( function(e) {
        var form = $("form#form_editpage");
        var formData = new FormData(this);
        var upt_page_body = CKEDITOR.instances.upt_page_body.getData();
        formData.append( 'upt_page_body', upt_page_body );
        e.preventDefault();
        $.ajax({
            type: form.attr('method'),
            enctype: form.attr('enctype'),
            url: form.attr('action'),
            data: formData,
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
            table_pages.ajax.reload();
            $('#modal_editpage').modal('hide');
        }, 3000);

    });

    function delete_page(page_id){
        // alert("Delete Page: " + page_id);
        $('#hid_page_id').val(page_id);
        $('#modal_delpage').modal('show');
    };

    $('#btn_delete').on('click', function (e) {
         var page_id = $('#hid_page_id').val();
         $.ajax({
             method: "POST",
             url: "./scripts/delete_page.php",
             data: { 'page_id': page_id },
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
            table_pages.ajax.reload();
            $('#modal_delpage').modal('hide');
        }, 3000);

    });

    $('#modal_newpage, #modal_editpage, #modal_delpage').on('show.bs.modal', function () {
        $('#dialog_appear').trigger("play");
    });

    $('#modal_newpage, #modal_editpage, #modal_delpage').on('hidden.bs.modal', function () {
        $('#dialog_disappear').trigger("play");
    });
