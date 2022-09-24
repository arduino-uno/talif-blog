
/*
//Load the file containing the chat log
function load_chats(){
    var oldscrollHeight = $("div.direct-chat-messages")[0].scrollHeight - 20; //Scroll height before the request
    $.ajax({
        method: 'POST',
        url: "./scripts/fetch_chats.php",
        datatype: 'JSON',
        success: function ( myData ) {
            $.each( JSON.parse( myData ), function( index, value ) {
                //Insert chat log into the #chatbox div
                $( "div.direct-chat-messages" ).html( value.messages );
                $( "ul.contacts-list" ).html( value.contacts );
                $( "div.dropdown-menu.dropdown-menu-lg.dropdown-menu-right" ).html( value.notifmsg );
            });
            //Auto-scroll
            var newscrollHeight = $("div.direct-chat-messages")[0].scrollHeight - 20; //Scroll height after the request
            if(newscrollHeight > oldscrollHeight){
                $("div.direct-chat-messages").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
            }
        }
    });
};

//Reload file every 2500 ms
setInterval( load_chats, 2500 );


$("button#btn_submitmsg").on("click", function (e) {
    var clientmsg = $("input#message").val();
    if ( clientmsg.length > 0 ) {
        $.post( "./scripts/post_chats.php", { "message": clientmsg } );
        $("input#message").val("");
    };

});

$("input#message").on("keypress",function(e) {
    if ( e.which == 13 ) {
        $("button#btn_submitmsg").trigger("click");
        return false;
    };
});
*/
