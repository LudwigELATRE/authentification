<?php require '../vendor/autoload.php';

use App\Auth;

if (!empty($_POST['valider'])) {
    $pdo = new PDO("sqlite:../data.sqlite", null, null, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $auth = new Auth($pdo);
    $user = $auth->login($username, $password);
}
if ($user)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="p-4">
    <h1>Se connecter</h1>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Pseudo">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Mot de passe">
        </div>
        <button class="btn btn-primary" name="valider">Valider</button>
    </form>
</body>

</html>