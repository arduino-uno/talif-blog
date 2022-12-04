// fetch data from MySQL
var table_comments = $('#comments_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
				url:"./scripts/fetch_comments.php",
				data: { 'parent_id': 0 },
				type:"POST"
		},
		"columnDefs":[
				{data: 'post_id', className: 'font-weight-bold text-center', name: 'post_id', targets:0, orderable: true, searchable: true,
					render: function(data,type,full,meta) {
							return '<span class="display-4 font-weight-bold">' + data + '</span>';
				}},
				{data: {post_id:'post_id', title:'title', fullname:'fullname', email:'email', message:'message', created:'created', likes:'likes'}, className: 'font-weight-normal', name: 'content', targets:1,
						render: function(data,type,full,meta) {

								const getInitials = (string) => {
									const [firstname, lastname] = string.toUpperCase().split(' ');
									const initials = firstname.substring(0, 1);
									return lastname
										? initials.concat(lastname.substring(0, 1))
										: initials.concat(firstname.substring(1, 2));
								};

								return '<div class="media">' +
										'<button type="button" class="btn btn-default btn-circle btn-lg m-1 mr-2">' + getInitials( data.fullname ) + '</button>' +
										'<div class="media-body">' +
											'<span class="font-weight-bold">' + data.title + '</span>' +
											'<p class="info">' + data.message + '</p>' +
										'</div></div>' +
										'<p>' +
											'<i class="fas fa-user"></i>&nbsp;by&nbsp;<a href="mailto:' + data.email + '">' + data.fullname + '</a>&nbsp;' +
											'|&nbsp;<i class="fas fa-calendar-alt"></i>&nbsp;' + data.created + '&nbsp;' +
											'|&nbsp;<i class="fas fa-heart"></i>&nbsp;' + data.likes + '&nbsp;Likes&nbsp;' +
											'|&nbsp;<i class="fas fa-file"></i>&nbsp;<a href="#" onclick="post_detail(' + data.post_id + ')">Post Detail&nbsp;</a>&nbsp;' +
											'|&nbsp;<i class="fas fa-reply"></i>&nbsp;<a href="#" onclick="comment_replies()">Replies&nbsp;</a>&nbsp;' +
										'</p>';

						}},
				{data: {comm_id:'comm_id', status:'status'}, className: 'text-center', name: 'action', targets:-1,
						render: function(data,type,full,meta) {

								if ( data.status == false ) {
										var txt_btn = "<i class='fas fa-eye'></i>&nbsp;Published";
								} else {
										var txt_btn = "<i class='fas fa-eye-slash'></i>&nbsp;Unpublished";
								};

								return "<div class='btn-group m-1' role='group'>" +
													"<button type='button' class='btn btn-default btn-sm' onclick='publish_comment(" + data.comm_id + ")' data-toggle='tooltip' data-placement='top' title='Unpublish Data'>" + txt_btn + "</button>" +
													"<button type='button' class='btn btn-info btn-sm' onclick='edit_comment(" + data.comm_id + ")' data-toggle='tooltip' data-placement='top' title='Update Data'><i class='fas fa-edit'></i>&nbsp;Update</button>" +
													"<button type='button' class='btn btn-warning btn-sm' onclick='delete_comment(" + data.comm_id + ")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
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
// Enable CKEDITOR for comments body / Contents
CKEDITOR.replace( 'content' );
// Enable CKEDITOR for Update comments body / Contents
CKEDITOR.replace( 'upt_content' );

function post_detail(post_id){
		// alert("Update Post: " + post_id);
		$.ajax({
			 method: "POST",
			 url: "./scripts/get_postdetail.php",
			 data: { 'post_id': post_id },
			 datatype: 'JSON',
			 success: function ( myData ) {

					$.each( JSON.parse( myData ), function( index, value ) {
						 $("#post_image").attr("src", "./images/" + value.image);
						 $("h4#post_title.media-heading").html(value.title);
						 $("p#post_ibody").html(value.body);
						 $("a#post_link").attr("href", "./media.php?module=user-profile");
						 $("a#post_link").html(value.author_name);
						 $("span#post_published").html(value.published);
						 $("span#post_tags").html(value.tagslabeled);
						 $("span#post_likes").html(value.likes);
					});

			 }
		});

		$('#hid_post_id').val(post_id);
		$('#modal_viewpost').modal('show');

};

function comment_replies(){
		// before reinitialize
		$('#replies_data').DataTable().clear();
		$('#replies_data').DataTable().destroy();
		// alert("Update Post: " + parent_id);
		var table_replies = $('#replies_data').DataTable({
				"processing":true,
				"serverSide":true,
				"order":[],
				"ajax":{
						url:"./scripts/fetch_comments.php",
						data: { 'parent_id': 1 },
						type:"POST"
				},
				"columnDefs":[
						{data: 'comm_id', className: 'font-weight-bold text-center', name: 'comm_id', targets:0, orderable: true, searchable: true,
								render: function(data,type,full,meta) {
										return '<span class="display-4 font-weight-bold">' + data + '</span>';
								}},
						{data: {post_id:'post_id', title:'title', fullname:'fullname', email:'email', message:'message', created:'created', likes:'likes'}, className: 'font-weight-normal', name: 'content', targets:1,
								render: function(data,type,full,meta) {

										const getInitials = (string) => {
											const [firstname, lastname] = string.toUpperCase().split(' ');
											const initials = firstname.substring(0, 1);
											return lastname
												? initials.concat(lastname.substring(0, 1))
												: initials.concat(firstname.substring(1, 2));
										};

										return '<div class="media">' +
												'<button type="button" class="btn btn-default btn-circle btn-lg m-1 mr-2">' + getInitials( data.fullname ) + '</button>' +
												'<div class="media-body">' +
													'<span class="font-weight-bold">' + data.title + '</span>' +
													'<p class="info">' + data.message + '</p>' +
												'</div></div>' +
												'<p>' +
													'<i class="fas fa-user"></i>&nbsp;by&nbsp;<a href="mailto:' + data.email + '">' + data.fullname + '</a>&nbsp;' +
													'|&nbsp;<i class="fas fa-calendar-alt"></i>&nbsp;' + data.created + '&nbsp;' +
													'|&nbsp;<i class="fas fa-heart"></i>&nbsp;' + data.likes + '&nbsp;Likes&nbsp;' +
												'</p>';

								}},
						{data: {comm_id:'comm_id', status:'status'}, className: 'text-center', name: 'action', targets:-1,
								render: function(data,type,full,meta) {

										if ( data.status == false ) {
												var txt_btn = "<i class='fas fa-eye'></i>&nbsp;Published";
										} else {
												var txt_btn = "<i class='fas fa-eye-slash'></i>&nbsp;Unpublished";
										};

										return "<div class='btn-group m-1' role='group'>" +
															"<button type='button' class='btn btn-default btn-sm' onclick='publish_comment(" + data.comm_id + ")' data-toggle='tooltip' data-placement='top' title='Unpublish Data'>" + txt_btn + "</button>" +
															"<button type='button' class='btn btn-info btn-sm' onclick='edit_comment(" + data.comm_id + ")' data-toggle='tooltip' data-placement='top' title='Update Data'><i class='fas fa-edit'></i>&nbsp;Update</button>" +
															"<button type='button' class='btn btn-warning btn-sm' onclick='delete_comment(" + data.comm_id + ")' data-toggle='tooltip' data-placement='top' title='Remove Data'><i class='fas fa-trash'></i>&nbsp;Delete</button>" +
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
		// Call view comment replies modal
		$('#modal_viewreply').modal('show');
};

function publish_comment( comm_id ) {

		$.post( "./scripts/update_comment_publish.php", { "comm_id": comm_id }, function( response ) {
					if ( response.indexOf("Updated") !== -1 ) {
							$('#success').trigger("play");
							toastr.info('The comment was published.');
					} else {
							$('#success').trigger("play");
							toastr.info('The page was unpublished.');
					}
		}).fail(function() {
				$('#error').trigger("play");
				toastr.error('Something went wrong.');
		});

		window.setTimeout(function() {
				table_comments.ajax.reload();
		}, 3000);

};

function edit_comment(comm_id){

		$.ajax({
			 method: "POST",
			 url: "./scripts/get_commentdetail.php",
			 data: { 'comm_id': comm_id },
			 datatype: 'JSON',
			 success: function ( myData ) {

					 $.each( JSON.parse( myData ), function( index, value ) {

							 $("#upt_post_title").val(value.title);
							 $("#upt_post_body").html(value.body);
							 // Set ckeditor value
							 CKEDITOR.instances.upt_post_body.setData(value.body);
							 $("#upt_post_tags").val(value.tags);
							 $("#upt_post_image").attr("src", "./images/" + value.image);
							 if ( value.status == 1 ) {
									 $("#upt_post_status").prop( "checked", true );
							 } else {
									 $("#upt_post_status").prop( "checked", false );
							 };

					 });

			 }
		});

		$('#hid_comment_id').val(comm_id);
		$('#modal_editcomment').modal('show');
		
};

$("form#form_editcomment").submit( function(e) {
		var form = $("form#form_editcomment");
		var formData = new FormData(this);
		var upt_content = CKEDITOR.instances.upt_content.getData();
		formData.append( 'upt_content', upt_content );
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
				table_comments.ajax.reload();
				$('#modal_editcomment').modal('hide');
		}, 3000);

});

function delete_comment(comm_id){
		// alert("Delete Comment: " + comm_id);
		$('#hid_comm_id').val(comm_id);
		$('#modal_delcomment').modal('show');
};

$('#btn_delete').on('click', function (e) {
		 var comm_id = $('#hid_comm_id').val();

		 $.ajax({
				 method: 'POST',
				 url: './scripts/delete_comment.php',
				 data: { 'comm_id': comm_id },
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
				table_comments.ajax.reload();
				$('#modal_delcomment').modal('hide');
		}, 3000);

});

$('#modal_viewpost, #modal_editcomment, #modal_delcomment').on('show.bs.modal', function () {
		$('#dialog_disappear').trigger("play");
});

$('#modal_viewpost, #modal_editcomment, #modal_delcomment').on('hidden.bs.modal', function () {
		$('#dialog_disappear').trigger("play");
});
