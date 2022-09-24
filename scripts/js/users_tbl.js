		// fetch data from MySQL
		var table_users = $('#users_data').DataTable({
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
		  			url:"./scripts/fetch_users.php",
		  			type:"POST"
				},
		    "columnDefs":[
		        {data: 'user_id', className: 'text-center', name: 'user_id', targets:0, orderable: true, searchable: true},
						{data: {user_login:'user_login', user_image:'user_image'}, className: 'text-center', name: 'user_image', targets:1,
								render: function(data,type,full,meta) {
										return '<img src="./images/' + data.user_image + '" class="img-thumbnail" width="50" height="50" border="0"/>';
								}},
						{data: 'user_login', className: 'font-weight-bold', name: 'user_login', targets:2},
						{data: 'user_fullname', className: 'font-weight-normal', name: 'user_fullname', targets:3},
		        {data: 'user_email', className: 'font-monospace font-weight-normal', name: 'user_email', targets:4,
								render: function(data,type,full,meta) {
										return '<a href="mailto:' + data + '">' + data + '</a>';
								}},
						{data: 'user_role', className: 'font-weight-bold text-center', name: 'user_role', targets:5,
								render: function(data,type,full,meta) {
										return ( data == "administrator" ) ? "<span class='badge badge-info shadowed'>administrator</span>" : "<span class='badge badge-warning shadowed'>Member</span>";
								}},
		        {data: 'user_joined', className: 'text-center', name: 'user_joined', targets:6,
		            render: function(data,type,full,meta) {
		    						const event = new Date(data);
		    						const options = { dateStyle: "long" };
		    						const date = event.toLocaleString("id-ID", options);
		    						return date;
		    				}},
						{data: 'user_status', className: 'font-weight-bold text-center', name: 'user_status', targets:7,
								render: function(data,type,full,meta) {
										return ( data == true ) ? "<span class='badge badge-success shadowed'>Active</span>" : "<span class='badge badge-danger shadowed'>Inactive</span>";
								}},
		        {data: 'user_id', className: 'text-center', name: 'action', targets:-1,
		            render: function(data,type,full,meta) {
									return "<div class='btn-group' role='group'>" +
														"<button type='button' class='btn btn-primary btn-sm' onclick='edit_user(\"" + data + "\")' data-toggle='tooltip' data-placement='top' title='Update Data'><i class='fas fa-edit'></i>&nbsp;Update</button>" +
														"<button type='button' class='btn btn-warning btn-sm' onclick='delete_user(\"" + data + "\")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
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
				        titleAttr: 'Add New',
				        action: function ( e, dt, node, config ) {
										$('#form_newuser')[0].reset();
										$('#modal_newuser').modal('show');
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

		$("form#form_newuser").submit( function(e) {
				var form = $("form#form_newuser");
				e.preventDefault();
				$.ajax({
						type: form.attr('method'),
						url: form.attr('action'),
						data: new FormData( this ),
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
						table_users.ajax.reload();
						$('#modal_newuser').modal('hide');
				}, 3000);

		});

		function edit_user(user_id){
				// alert("Update Post: " + user_id);
				$('#form_edituser')[0].reset();
				$.ajax({
					 method: 'POST',
					 url: './scripts/get_userdetail.php',
					 data: { 'user_id': user_id },
					 datatype: 'JSON',
					 success: function ( myData ) {
							 $.each( JSON.parse( myData ), function( index, value ) {
									 $("#upt_username").val(value.user_login);
									 $("#upt_fullname").val(value.user_fullname);
									 $("#upt_email").val(value.user_email);
									 // $("#upt_role option[value='" + value.user_role + "']").attr('selected', 'selected');
									 $("#upt_role").val(value.user_role);
									 $("#upt_user_image").attr("src", "./images/" + value.user_image);
									 if ( value.user_status == true ) {
											 $("input[type='checkbox']#upt_status").prop( "checked", true );
									 } else {
											 $("input[type='checkbox']#upt_status").prop( "checked", false );
									 }
							 });
					 }
			 	});

				$('#hid_user_id').val(user_id);
				$('#modal_edituser').modal('show');
		};

		$("form#form_edituser").submit( function(e) {
				var form = $("form#form_edituser");
				e.preventDefault();
				$.ajax({
						type: form.attr('method'),
						url: form.attr('action'),
						data: new FormData( this ),
						processData: false,  // Important!
						contentType: false,
						cache: false,
						timeout: 600000,
						success: function ( response ) {

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
						table_users.ajax.reload();
						$('#modal_edituser').modal('hide');
				}, 3000);

		});

		function delete_user(user_id){
				// alert("Delete User: " + user_id);
				$('#hid_user_id').val(user_id);
				$('#modal_deluser').modal('show');
		};

		$('#btn_delete').on('click', function (e) {
				 var user_id = $('#hid_user_id').val();
				 $.ajax({
						 method: 'POST',
						 url: './scripts/delete_user.php',
						 data: { 'user_id': user_id },
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
						table_users.ajax.reload();
						$('#modal_deluser').modal('hide');
				}, 3000);

		});

		$('#modal_newuser, #modal_edituser, #modal_deluser').on('show.bs.modal', function () {
				$('#dialog_appear').trigger("play");
		});

		$('#modal_newuser, #modal_edituser, #modal_deluser').on('hidden.bs.modal', function () {
				$('#dialog_disappear').trigger("play");
		});
