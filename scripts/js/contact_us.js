var settings = settings_detail();

function settings_detail() {
     $.ajax({
        method: 'POST',
        url: './scripts/get_settings.php',
        datatype: 'JSON',
        success: function ( myData ) {
            $.each( JSON.parse( myData ), function( index, value ) {
                $("img#logo").attr("src", "./images/" + value.logo);
                $("h2#title").html(value.title);
                $("a#email").html(value.email);
                $("a#email").attr("href", "mailto:" + value.email );
            });
        }
    })
};

$("form#form_contactus").submit( function(e) {
    var form = $("form#form_contactus");
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
                toastr.info('The data was inserted successfully.');
            } else {
                $('#error').trigger("play");
                toastr.error('Something went wrong.');
            }

        }

    });

});
