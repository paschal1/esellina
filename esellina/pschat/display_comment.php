<?php
     include('../config/dbconn.php');
     $query= "SELECT * FROM user_post_comment WHERE user_id ORDER BY comment_id DESC";
     $result = mysqli_query($dbconn, $query);
     $rowCount = mysqli_num_rows($result);
     $output="";
      if($result){
     while($row = mysqli_fetch_array($result)){
         $output .= '
         <div></div>
         <div class="alert alert_default">
         <p><small>'.$row["comment"].'</small></p>
         <button type="button" id="comment2" onclick="showForm()">reply</button>

         
        <form id="comment1" style="display:none;">
        <textarea class="form-input" type="text" style="border:none;" placeholder="comment goes here..." name="comment" id="comment" row="2" col="3" value=""></textarea>
        <input type="image" title="submit" name="submit" src="img/sendtext.PNG" alt="Send" width=30px height=22px />
        </form>

         </div>';
     }
    
         
          echo $rowCount;
          echo ' Comments';
     }
     
     echo $output;
     
    
     ?>


     


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <body>
    <button type="button" id="comment2" onclick="showForm()">reply me</button>

         
<form id="comment1" style="display:none;">
<textarea class="form-input" type="text" style="border:none;" placeholder="comment goes here..." name="comment" id="comment" row="2" col="3" value=""></textarea>
<input type="image" title="submit" name="submit" src="img/sendtext.PNG" alt="Send" width=30px height=22px />
</form>

    <script type="text/javascript">
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

function showForm() {
    document.getElementById('comment1').style.display='block';
}
     
     </script>
    </body>
    </html>