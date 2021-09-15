

 $("#formdata").on('submit',function(e){


    var form_data = $(this).serialize();
    $.ajax({
        type:"POST",
        url:"upload.php",
        data:form_data,
        success:function(){
            
            $('#formdata')[0].reset();
            alert('post sent');
            
        }
    
    })
    e.preventDefault();
    }); 

 //script for pagination or infinite scrolling
    $(document).ready(function() {
        $('.loader').hide();
        var load = 0;
        var num = "<?php echo $num; ?>";
        $(window).scroll(function() {
            if ($(window).scrollTop() == $(document).height() - $(window).height()) {
                $('.loader').show();
                load++;
                if (load * 4 > num) {
                    $('.msg').text("No more data");
                    $('.loader').hide();
                } else {
                    $.post("fetch.php", {
                        load: load
                    }, function(data) {
                        $('#image_table').append(data);
                        $('.loader').hide();
                    });
                }
            }
        })


        $(document).on('click', '.view_user', function() {
            var user_id = $(this).attr('id');
            if (confirm("Wants to view Profile")) {
                $.ajax({
                    url: "view_profile.php",
                    method: "POST",
                    data: {
                        user_id: user_id
                    },
                    success: function(data) {
                        $("#userprofile").html(data);
                    }
                })
            }
        });
    });
    
    //  Here is where i wrote the javascript to prevent page reload for comment form
$(document).ready(function() {

    $('form[data-comment-form-id]').each(function () {
        //
        $(this).submit((e) => {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "add_comment.php",
                data: form_data,
                success: function() {
                    $(this).reset();
                    alert('comment sent');
                }

            })

        });
    });

    // Here is where i wrote the javascript to prevent page reload for sendMessage button  
    $('form[data-sendmessage-form-id]').each(function() {
        $(this).submit((e) => {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../app/ajax/insert.php",
                data: form_data,
                success: function() {

                    // if(data.error != ''){
                    alert('message sent');
                    $(this).reset();
                    //      $('#comment_message').html(data.error);
                    // }
                }

            })
        });
    });

    // Here is where i wrote the javascript to prevent page reload for Uploading button

    $('#formdata').submit((e) => {
        e.preventDefault();
        $.ajax({
            url: "upload.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                $('#postimage').val();
                $(this).reset();
                alert('post sent');

            }

        })
    });


});