 <?Php // background page comes in -->
 include("index_background.php");?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/png" class="img-fluid" href="epsimage/icon.PNG">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <title>eps||post||now</title>
     <script>
     setInterval(
         function() {
             $('#content').load('action.php');
         }, 9000);
     </script>

 </head>

 <body>

     <div id="content" class="container"> please wait...</div>
 </body>

 </html>