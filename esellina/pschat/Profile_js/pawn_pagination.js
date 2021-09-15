// $(document).ready(function(){

//     var page_num = 1;
//     load_page(page_num, false);

//     $(window).scroll(function(){
//         if ($(window).scrollTop() + $(window).height() > $(document).height() - 100){

//             page_num++;
//             load_page(page_num, false)
//         }
//     });
// });

// function load_page(page_num, loading){
//     if(loading == false){
//         loading =true;
//         $.ajax({
//             url:"fetch_status.php",
//             type:"post",
//             data:{
//                 page_num: page_num
//             },
//             beforeSend: function() {
//                 $('#ajax-loader').show();
//                 return;
//             }

//         }).done(function(data){
//             $('#ajax-loader').hide();
//             loading = false;
//             $("#fetch").append(data);
//         }).fail(function(jqXHR, ajaxOptions, thrownError){
//             $('#ajax-loader').hide();
//         });
//     }
// }


var start = 0;
var limit =9;
var reachedMax = false;

$(window).scroll(function(){
        if ($(window).scrollTop() == $(document).height() - $(window).height())
        getData();
    })

$(document).ready(function(){
    getData();
});

function getData() {

    if(reachedMax)
    return;

    $.ajax({
                    url:"fetch_status.php",
                    method:"POST",
                    dataType:"text",
                    data:{
                        getData: 1,
                        start: start,
                        limit: limit
                    },
                    success: function(record_id) {
                        if(record_id == reachedMax){
                            reachedMax = true;

                        }else{
                            start += limit;
                            $("#fetch").append(record_id);
                        }
                        
                    }
        
                });

}