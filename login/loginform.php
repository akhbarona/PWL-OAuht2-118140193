<?php
require_once "config.php";
require_once "loginbiasa.php";

if (isset($_SESSION['access_token'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['submit'])) {
    login();
}

$loginURL = $gClient->createAuthUrl();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login With Google</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6 col-offset-3 center-block text-center">
                <div class="col-md-12">
                <h3 class="text-center heading">Sign in to PWL</h3>
                </div><br>
                <form action="" method="POST">
                    <input placeholder="Email..." name="email" class="form-control" required><br>
                    <input type="password" placeholder="Password..." name="password" class="form-control" required><br>
                    <input type="submit" name="submit" value="Log In" class="btn btn-primary">
                    <input type="button" value="Log In With Google" onclick="window.location = '<?= $loginURL ?>';" class="btn btn-danger"><br>
                </form>
            </div>
        </div>
    </div>
</body>

</html>