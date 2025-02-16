<?php

session_start();

require __DIR__ . '/../db.php';
require __DIR__ . '/../../csrf.php';


if(isset($_POST['submit']) && CSRF::validateToken($_POST['token'])) {
   $password = password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
   $statement = $pdo->prepare("UPDATE admin SET password=? WHERE username=?");
   $statement->execute(array($password, 'admin'));
   header('Location: /admin/home');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Hive | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link href="/views/admin/assets/css/auth.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="mb-4 text-muted">Reset Password</h6>
                    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                        <div class="mb-3 text-start">
                            <?php CSRF::csrfInputField() ?>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary shadow-2 mb-4">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/views/admin/assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>