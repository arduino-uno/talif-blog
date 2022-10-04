// fetch data from MySQL
var table_templates = $('#templates_data').DataTable({
    "processing":true,
    "serverSide":false,
    "order":[],
    "ajax":{
        url:"./scripts/fetch_templates.php",
        type:"POST"
    },
    "columnDefs": [
      {data: {temp_id:'temp_id', title:'title', description:'description', image:'image', status:'status', created:'created'}, className: 'text-center', name: 'temp_id', targets:0, orderable: true, searchable: true},
    ],
    "rowCallback": function( row, data ) {

        if ( data.status == false ) {
            var txt_btn = '<i class="fas fa-check-circle"></i>&nbsp;Active';
            var txt_color = 'bg-warning';
        } else {
            var txt_btn = '<i class="fas fa-times-circle"></i>&nbsp;Inactive';
            var txt_color = 'bg-success';
        };

        // on each row callback
        var div_row = $("div.row#template_list");
        div_row.append('<div class="col-md-4">' +
          '<div class="card mb-4 shadow-sm">' +
          '<img src="./images/' + data.image + '" class="bd-placeholder-img card-img-top" width="100%" height="225"/>' +
          '<div class="card-body">' +
          '<h4><a href="#" onclick="template_detail(' + data.temp_id + ')"' + data.title + '>' + data.title + '</a></h4>' +
          '<p class="card-text">' + data.description + '</p>' +
          '<div class="d-flex justify-content-between align-items-center">' +
          '<div class="btn-group">' +
          '<button type="button" class="btn btn-sm btn-outline-secondary" onclick="template_detail(' + data.temp_id + ')">View</button>' +
          '<button type="button" class="btn btn-sm btn-outline-secondary ' + txt_color + '" onclick="template_status(' + data.status + ')">' + txt_btn + '</button>' +
          '</div>' +
          '<small class="text-muted">' + data.created + '</small>' +
          '</div>' +
          '</div>' +
          '</div>' +
        '</div>');

      },
      "preDrawCallback": function( settings ) {
        // clear list before draw
        $("div.row#template_list").empty();
  }
});

function template_detail(temp_id){
		// alert("Update Post: " + temp_id);
		$.ajax({
			 method: "POST",
			 url: "./scripts/get_tempdetail.php",
			 data: { 'temp_id': temp_id },
			 datatype: 'JSON',
			 success: function ( myData ) {
					$.each( JSON.parse( myData ), function( index, value ) {
						 $("#temp_image").attr("src", "./images/" + value.image);
						 $("h4#temp_title.media-heading").html(value.title);
						 $("p#temp_description").html(value.description);
						 $("a#temp_link").html(value.author_name);
             $("a#temp_link").attr("href", value.author_url );
             const d = new Date(value.created);
             let created = d.toLocaleString("us-US",{dateStyle :"medium"});
						 $("span#temp_created").html(created);
					});
			 }
		});

		$('#hid_temp_id').val(temp_id);
		$('#modal_viewtemplate').modal('show');

};

function publish_comment( comm_id ) {

		$.post( "./scripts/update_comment_publish.php", { "comm_id": comm_id }, function( response ) {
					if ( response.indexOf("Updated") !== -1 ) {
							$('#success').trigger("play");
							toastr.info('The comment was published.');
					} else {
							$('#success').trigger("play");
							toastr.info('The comment was unpublished.');
					}
		}).fail(function() {
				$('#error').trigger("play");
				toastr.error('Something went wrong.');
		});

		window.setTimeout(function() {
				table_comments.ajax.reload();
		}, 3000);

};

$('#modal_viewtemplate').on('show.bs.modal', function () {
    $('#dialog_disappear').trigger("play");
});

$('#modal_viewtemplate').on('hidden.bs.modal', function () {
    $('#dialog_disappear').trigger("play");
});
