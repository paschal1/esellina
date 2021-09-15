$(document).ready(function(){
    $("#comment2").click(function(){
        $("#comment1").toggle();
    });
}); 
$(document).ready(function(){
    $("#comment").click(function(){
        $("#comment1").slideDown("slow");
    });
});


$(document).ready(function(){
    setInterval(function(){
        load_last_notification();

    },1000);
    function load_last_notification(){
        $.ajax({
            url:"fetch_comment.php",
            method:"POST",
            success: function (data) {
                $('#display_message').html(data);
            }
        })
    }
});

    
    



