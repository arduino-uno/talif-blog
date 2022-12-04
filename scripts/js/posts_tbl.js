    // fetch data from MySQL
		var table_posts = $('#posts_data').DataTable({
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
						url:"./scripts/fetch_posts.php",
						type:"POST"
				},
				"columnDefs":[
						{data: 'post_id', className: 'font-weight-bold text-center', name: 'post_id', targets:0, orderable: true, searchable: true,
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
						{data: {post_id:'post_id', status:'status'}, className: 'text-center', name: 'action', targets:-1,
								render: function(data,type,full,meta) {

										if ( data.status == false ) {
												var txt_btn = "<i class='fas fa-eye'></i>&nbsp;Published";
										} else {
												var txt_btn = "<i class='fas fa-eye-slash'></i>&nbsp;Unpublished";
										};

										return "<div class='btn-group m-1' role='group'>" +
															"<button type='button' class='btn btn-default btn-sm' onclick='publish_post(" + data.post_id + ")' data-toggle='tooltip' data-placement='top' title='Unpublish Data'>" + txt_btn + "</button>" +
															"<button type='button' class='btn btn-info btn-sm' onclick='edit_post(" + data.post_id + ")' data-toggle='tooltip' data-placement='top' title='Update Data'><i class='fas fa-edit'></i>&nbsp;Update</button>" +
															"<button type='button' class='btn btn-warning btn-sm' onclick='delete_post(" + data.post_id + ")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
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
						titleAttr: 'Add New Post',
		        action: function ( e, dt, node, config ) {
								$('#form_newpost')[0].reset();
								$('#modal_newpost').modal('show');
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
		CKEDITOR.replace( 'post_body' );
		// Enable CKEDITOR for Update Pages & Posts body / Contents
		CKEDITOR.replace( 'upt_post_body' );

		$('input#post_tags, input#upt_post_tags').tagsInput({
			  interactive: true,
			  placeholder: 'Add a tag',
			  minChars: 2,
			  maxChars: 20, // if not provided there is no limit
			  limit: 5, // if not provided there is no limit
			  unique: true
		});

		$("form#form_newpost").submit( function(e) {
        var form = $("form#form_newpost");
        var formData = new FormData(this);
        var post_body = CKEDITOR.instances.page_body.getData();
        formData.append( 'post_body', page_body );
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

		function publish_post( post_id ) {

				$.post( "./scripts/update_post_publish.php", { "post_id": post_id }, function( response ) {
							if ( response.indexOf("Updated") !== -1 ) {
									$('#success').trigger("play");
									toastr.info('The post was published.');
							} else {
									$('#success').trigger("play");
									toastr.info('The page was unpublished.');
							}
				}).fail(function() {
	          $('#error').trigger("play");
	      		toastr.error('Something went wrong.');
	      });

				window.setTimeout(function() {
						table_posts.ajax.reload();
				}, 3000);

		};

		function edit_post( post_id ){
				// alert("Update Post: " + post_id);
				$('#form_editpost')[0].reset();

				$.ajax({
					 method: "POST",
					 url: "./scripts/get_postdetail.php",
					 data: { 'post_id': post_id },
					 datatype: 'JSON',
					 success: function ( myData ) {
							 $.each( JSON.parse( myData ), function( index, value ) {

									 $("#upt_post_title").val(value.title);
									 $("#upt_post_body").html(value.body);
									 // Set ckeditor value
									 CKEDITOR.instances.upt_post_body.setData(value.body);
									 $('input#upt_post_tags').importTags( value.tags );
									 $("#upt_post_image").attr("src", "./images/" + value.image);
									 if ( value.status == 1 ) {
											 $("#upt_post_status").prop( "checked", true );
									 } else {
											 $("#upt_post_status").prop( "checked", false );
									 };

							 });
					 }
				});

				$('#hid_post_id').val(post_id);
				$('#modal_editpost').modal('show');

		};

		$("form#form_editpost").submit( function(e) {
				var form = $("form#form_editpost");
				var formData = new FormData(this);
				var upt_post_body = CKEDITOR.instances.upt_post_body.getData();
				formData.append( 'upt_post_body', upt_post_body );
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
										toastr.info('The data was updated successfully..');
								} else {
										$('#error').trigger("play");
										toastr.error('Something went wrong.');
								}

						}

				});

		    window.setTimeout(function(){
						table_posts.ajax.reload();
						$('#modal_editpost').modal('hide');
				}, 3000);

		});

		function delete_post(post_id){
				// alert("Delete Post: " + post_id);
				$('#hid_post_id').val(post_id);
				$('#modal_delpost').modal('show');
		};

		$('#btn_delete').on('click', function (e) {
		     var post_id = $('#hid_post_id').val();
				 $.ajax({
		 				 method: 'POST',
		 				 url: './scripts/delete_post.php',
		 				 data: { 'post_id': post_id },
		 				 success: function ( response ) {
								 if ( response.indexOf("Deleted") !== -1 ) {
										 $('#success').trigger("play");
										 toastr.info('The data was deleted successfully..');
								 } else {
										 $('#error').trigger("play");
										 toastr.error('Something went wrong.');
								 }
						 }

			 	});

				window.setTimeout(function(){
						table_posts.ajax.reload();
						$('#modal_delpost').modal('hide');
				}, 3000);

		});

		$('#modal_newpost').on('shown.bs.modal', function (e) {
		    // Get select
		    var select = $('#post_category');
		    select.empty();
		    $.post( "./scripts/get_catoptions.php", function( myData ) {
		        $.each( JSON.parse( myData ), function( index, value ) {
		            // Add options
		            if ( value['id'] == 0 ) {
		                select.append('<option value=' + value['id'] + ' selected>' + value['name'] + '</option>');
		            } else {
		                select.append('<option value=' + value['id'] + '>' + value['name'] + '</option>');
		            }
		        });
		    });

				// tagsInput here
		});

		$('#modal_editpost').on('shown.bs.modal', function (e) {
		    // Get select
		    var select = $('#upt_post_category');
		    var post_id = $('form#form_editpost input#hid_post_id').val();
		    select.empty();
		    $.post( "./scripts/get_catoptions.php", function( myData ) {
		        $.each( JSON.parse( myData ), function( index, value ) {
		            // Add options
		            if ( post_id == value['id'] ) {
		                select.append('<option value=' + value['id'] + ' selected>' + value['name'] + '</option>');
		            } else {
		                select.append('<option value=' + value['id'] + '>' + value['name'] + '</option>');
		            }
		        });
		    });
		});

		$('#modal_newpost, #modal_editpost, #modal_delpost').on('show.bs.modal', function () {
				$('#dialog_disappear').trigger("play");
		});

		$('#modal_newpost, #modal_editpost, #modal_delpost').on('hidden.bs.modal', function () {
				$('#dialog_disappear').trigger("play");
		});
