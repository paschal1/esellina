
 $(document).ready(function() {
	 setInterval(() => {
		
		fetch_users();
		update_user_activity();
	 }, 2000);
	 
function update_user_activity(){
	$.ajax({
url: "update_user.php",
method: "POST",
success: function(data){
	//alert(data);
	//$("#userdata").html(data);

	
}
	 })

}

	 function fetch_users(){
	  $.ajax({
url: "fetch_user.php",
method: "POST",
success: function(data){
	//alert(data);
	$("#userdata").html(data);

	
}
	 })
	
	}
		

 });