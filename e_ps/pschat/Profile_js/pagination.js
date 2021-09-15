

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