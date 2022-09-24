		var settings = settings_detail();

		function settings_detail() {
			   $.ajax({
						method: 'POST',
						url: './scripts/get_settings.php',
						datatype: 'JSON',
						success: function ( myData ) {
							  $.each( JSON.parse( myData ), function( index, value ) {
										console.log(value.nama_login);
										$("#compLogo").attr("src", "./images/" + value.logo);
		            		$("#title").val(value.title);
		            		$("#description").val(value.description);
		                $("#address").val(value.address);
		                $("#phone").val(value.phone);
		                $("#email").val(value.email);
		                $("#facebook").val(value.facebook);
		                $("#twitter").val(value.twitter);
		                $("#google").val(value.google);
		                $("#linkedin").val(value.linkedin);
		                $("#youtube").val(value.youtube);
								});
						}
				})
		};

		$("form").submit( function(e) {
		      var form = $("#form_settings");
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

					window.setTimeout(function(){ location.reload() }, 3000);
		});
