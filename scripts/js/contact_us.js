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
