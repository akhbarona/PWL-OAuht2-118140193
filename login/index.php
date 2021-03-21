<?php
session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: loginform.php');
    exit();
}
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
            <div class="col-md-7">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td rowspan="5"><img class="rounded mx-auto d-block" src="<?= $_SESSION['picture'] ?>"></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td><?= $_SESSION['id'] ?></td>
                        </tr>
                        <tr>
                            <td>Fisrt Name</td>
                            <td><?= $_SESSION['givenName'] ?></td>
                        </tr>
                        <tr>
                            <td>Last name</td>
                            <td><?= $_SESSION['familyName'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?= $_SESSION['email'] ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button onclick="window.location.href='logout.php';" class="btn btn-danger me-md-2" type="button">Log out</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>