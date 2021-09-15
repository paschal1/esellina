<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <title>Add text</title>
    <style>
        body{
            height:100vh;
            display: flex;
            flex-wrap: wrap;
            justify-content:center;
            align-items: center;
        }
        #id{
            background-color:none;
            color:black;
        }
    </style>
</head>
<body>

            <!-- Button trigger modal -->
            <button class="btn btn-success btn-round pull-right" data-toggle="modal" data-target="#myModal">
                <i class="now-ui-icons shopping_cart-simple"></i>Add To Cart</button>

            <!-- Modal Core -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="form group">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Enter Quantity:</h4>
                  </div>
                  <div class="modal-body">

                    <div class="input-append">
                        <?php
                            echo "<select class='btn btn-warning btn-round dropdown-toggle' size='1' name='prod_qty' id='prod_qty'>";
                            $i=1; $prod_qty=$prod_qty;
                            while ($i <= $prod_qty ){
                                echo "<option value=".$i.">".$i."</option>";
                                $i++;
                            }
                            echo "</select>";
                        ?>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-round" data-dismiss="modal">Close</button>
                    <a><button type="submit" name="submit" class="btn btn-success btn-round">Order</button></a>
                  </div>
                </div>
                </form>

              </div>
            </div>
            </div>

            
   </div>
</div>




<form method="POST" action="post_txt.php">
        
    <input type="text" id="id" placeholder="      Type Status Here" name="txt" style="with:200px; height:300px; border:1px solid;   margin-top:10%; margin-left:30%;" class="text-center" >
     <input type="submit" value="Post" name="submit">

</form>
<button style="text-align:center; margin-left:30%;" onclick="ifunction()">colors</button>
<button>fonts</button>
<button>Emojis</button><br><br>
</body>
</html>
<script>

function ifunction(){
    var x = Math.floor(Math.random()*256);
    var y = Math.floor(Math.random()*256);
    var z = Math.floor(Math.random()*256);

    var bgColor = "rgb("+ x +","+ y +","+ z +")";
    console.log(bgColor);
    document.getElementById("id").style.background= bgColor;

}

$('#myModal').on('shown.bs.modal', function(){
    $('#myModalLabel').trigger('focus')
})
</script>