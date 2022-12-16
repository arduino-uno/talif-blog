// fetch data from MySQL
var table_comments = $('#comments_data').DataTable({
    "dom": 'rt',
    "processing":true,
    "serverSide":false,
    "order":[],
    "pageLength": 1,
    "ajax":{
        url:"./scripts/fetch_posts_comments.php",
        type:"POST",
        cache: false
    },
    "columnDefs": [
        {data: {post_id:'post_id', title:'title', author_name:'author_name', author_image:'author_image', comments:'comments[]'}, className: 'text-center', name: 'post_id', targets:0, orderable: true, searchable: true}
    ],
    "rowCallback": function( row, data ) {

        const getInitials = (string) => {
          const [firstname, lastname] = string.toUpperCase().split(' ');
          const initials = firstname.substring(0, 1);
          return lastname
            ? initials.concat(lastname.substring(0, 1))
            : initials.concat(firstname.substring(1, 2));
        };

        // on each row callback
        var div_row = $("div.row#comments_list");

        var html_text = "<div class='d-flex flex-column col-md-12'>" +
            "<div class='d-flex flex-row align-items-center text-left comment-top p-2 border-bottom px-4'>" +
            "<div class='profile-image'>" +
              "<img class='rounded-circle' src='./images/" + data.author_image + "' width='70'>" +
            "</div>" +
            "<div class='d-flex flex-column-reverse flex-grow-0 align-items-center votings ml-1'>" +
              "<a href='#' onclick='prev_page()'><i class='fa fa-sort-up fa-2x hit-voting'></i></a>" +
              "<span>" + ( table_comments.page.info().page + 1 ) + "</span>" +
              "<a href='#' onclick='next_page()'><i class='fa fa-sort-down fa-2x hit-voting'></i></a>" +
            "</div>" +
            "<div class='d-flex flex-column ml-3'>" +
              "<div class='d-flex flex-row post-title'>" +
                "<h5>" + data.title + "</h5>" +
                "<span class='ml-2'>(" + data.author_name + ")</span>" +
              "</div>" +
              "<div class='d-flex flex-row align-items-center align-content-center post-title'>" +
                "<span class='bdge mr-1'>" + data.comments.length + "</span>" +
                "<span class='mr-2 comments'>&nbsp;comments&nbsp;</span>" +
                "<span class='mr-2 dot'></span>" +
                "<span>6 hours ago</span>" +
              "</div>" +
            "</div>" +
          "</div>" +
          "<div class='d-flex flex-column p-2 px-4'>" +
            "<div class='d-flex flex-row add-comment-section mt-4 mb-4'>" +
              "<img class='img-fluid img-responsive rounded-circle mr-2' src='./images/" + data.author_image + "' width='38'>" +
              "<input type='text' class='form-control mr-3' placeholder='Add comment'>" +
              "<button class='btn btn-primary' type='button'>Comment</button>" +
            "</div>" +
            "<div class='collapsable-comment'>" +
              "<div class='d-flex flex-row justify-content-between align-items-center action-collapse p-2' data-toggle='collapse' aria-expanded='false' aria-controls='collapse-1' href='#collapse-1'>" +
                "<span>" + data.comments.length + "&nbsp;Comments</span><i class='fa fa-chevron-down servicedrop'></i>" +
              "</div>" +
              "<div id='collapse-1' class='collapse'>";

        for(var i=0;i<data.comments.length;i++) {

            if ( data.comments[i].parent_id == 0 ) {

                html_text += "<div class='commented-section mt-2'>" +
                  "<div class='d-flex flex-row align-items-center commented-user'>" +
                    "<button type='button' class='btn btn-default rounded-circle btn-lg m-1 mr-2'>" + getInitials( data.comments[i].fullname ) + "</button>" +
                    "<h5 class='mr-2'>" + data.comments[i].fullname + "</h5>" +
                    "<span class='dot mb-1'></span>" +
                    "<span class='mb-1 ml-2'>4 hours ago</span>" +
                  "</div>" +
                  "<div class='comment-text-sm'>" +
                    "<span>" + data.comments[i].message +
                  "</div>" +
                  "<div class='reply-section'>" +
                    "<div class='d-flex flex-row align-items-center voting-icons'>" +
                      "<i class='fa fa-sort-up fa-2x mt-3 hit-voting'></i>" +
                      "<i class='fa fa-sort-down fa-2x mb-3 hit-voting'></i>" +
                      "<span class='ml-2'>10</span>" +
                      "<span class='dot ml-2'></span>" +
                      "<h6 class='ml-2 mt-1'>Reply</h6>" +
                    "</div>" +
                  "</div>" +
                "</div>";

            } else {

                html_text += "<div class='commented-section mt-2 ml-5'>" +
                  "<div class='d-flex flex-row align-items-center commented-user'>" +
                    "<button type='button' class='btn btn-default rounded-circle btn-lg m-1 mr-2'>" + getInitials( data.comments[i].fullname ) + "</button>" +
                    "<h5 class='mr-2'>" + data.comments[i].fullname + "</h5>" +
                    "<span class='dot mb-1'></span>" +
                    "<span class='mb-1 ml-2'>4 hours ago</span>" +
                  "</div>" +
                  "<div class='comment-text-sm'>" +
                    "<span>" + data.comments[i].message +
                  "</div>" +
                  "<div class='reply-section'>" +
                    "<div class='d-flex flex-row align-items-center voting-icons'>" +
                      "<i class='fa fa-sort-up fa-2x mt-3 hit-voting'></i>" +
                      "<i class='fa fa-sort-down fa-2x mb-3 hit-voting'></i>" +
                      "<span class='ml-2'>10</span>" +
                      "<span class='dot ml-2'></span>" +
                      "<h6 class='ml-2 mt-1'>Reply</h6>" +
                    "</div>" +
                  "</div>" +
                "</div>";

            }

      }

      div_row.append( html_text );

    },
    "preDrawCallback": function( settings ) {
        // clear list before draw
        $("div.row#comments_list").empty();
    }

});

function prev_page() {
    $("#comments_data").dataTable().fnPageChange( 'previous', true );
};

function next_page() {
    $("#comments_data").dataTable().fnPageChange( 'next', true );
};

$('#collapse-1').on('shown.bs.collapse', function() {
    $(".servicedrop").addClass('fa-chevron-up').removeClass('fa-chevron-down');
});

$('#collapse-1').on('hidden.bs.collapse', function() {
    $(".servicedrop").addClass('fa-chevron-down').removeClass('fa-chevron-up');
});

show_userdetails();

function show_userdetails() {
    $.ajax({
          method: 'POST',
          url: "./scripts/get_userdetail.php",
          datatype: 'JSON',
          success: function ( myData ) {

              $.each( JSON.parse( myData ), function( index, obj ) {
                  const words = obj.user_fullname.split(" ");
                  var user_image = $('img[name="aboutme"]').attr( 'src', './images/' + obj.user_image );
                  var user_login = $('input[name="upt_username"]').val( obj.user_login );
                  var user_firstname = $('input[name="upt_firstname"]').val( words[0] );
                  var user_lastname = $('input[name="upt_lastname"]').val( words[1] );
                  var user_orgname = $('input[name="upt_orgname"]').val( obj.user_orgname );
                  var user_location = $('input[name="upt_location"]').val( obj.user_location );
                  var user_email = $('input[name="upt_email"]').val( obj.user_email );
                  var user_phone = $('input[name="upt_phone"]').val( obj.user_phone );
                  var user_birthday = $('input[name="upt_birthday"]').val( obj.user_birthday );
              })

          }
    });
};

$("form#form_edituser").submit( function(e) {

      var form = $("form#form_edituser");
      e.preventDefault();
      var ajax_edituser = $.ajax({
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
          show_userdetails();
      }, 3000);

});

function post_detail(post_id) {
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
