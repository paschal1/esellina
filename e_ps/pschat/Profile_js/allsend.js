$(document).ready(function () {
     

 // Here is where i wrote the javascript to prevent page reload for sendMessage button
    $('form[data-sendmessage-form-id]').each(function() {
        $(this).submit((e) => {
            e.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "quickmessage.php",
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
});