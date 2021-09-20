<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sellina login</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- boot strap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="icon" href="img/EPS logo B&W copyPNG.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-400 p-5 shadow rounded">
        <form method="POST" action="app/http/auth.php">

            <div class="d-flex justify-content-center align-items-center flex-column">
                <h3 class="display-4 fs-1 text-center">LOGIN</h3>
                <img src="img/EPS logo B&W copyPNG.png" alt="logo" class="w-25">
                <?php if(isset($_GET['error'])){?>
                 <div class="alert alert-warning" role="alert"><?php echo htmlspecialchars($_GET['error']);?></div> <?php } ?>
                <?php if(isset($_GET['success'])){?>
                <div class="alert alert-success" role="success"><?php echo htmlspecialchars($_GET['success']);?></div> <?php } ?>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input class="form-control" type="text" id="username" name="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" id="password" name="password">
            </div>

            <button type="submit" name="submit" class="btn btn-secondary">login</button>

            <a href="sign_up.php">Sign Up</a>

        </form>
    </div>
</body>

</html>