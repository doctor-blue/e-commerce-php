<?php 

session_start();
require __DIR__ . '/../csrf.php';
require __DIR__ . '/db.php';
require __DIR__ . '../../models/user.php';
require __DIR__ . '../../controllers/user-controller.php';

if(isset($_SESSION['name'])) {
    header('Location: /');
}

$error = false;

if(isset($_POST['login']) && CSRF::validateToken($_POST['token'])) {
    $user = new User();
    $userController = new UserController();
    $user->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $user->setPassword(filter_input(INPUT_POST, 'password'));


    // echo "email ".$user->getEmail().' '.$statement->rowCount().' '.$user->getPassword();
    // if($statement->rowCount() > 0) {
    //     $result = $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    //     echo '\n result '.$result['password']. ' compare '.strcmp($user->getPassword(), $result['password']);
    //     if(strcmp($user->getPassword(), $result['password'])==0) {
    //         $_SESSION['name'] = $result['lastname'] . ' ' . $result['firstname'];
    //         $_SESSION['email'] = $result['email'];
    //         $_SESSION['phone'] = $result['phone'];
    //         $_SESSION['address'] = $result['address'];
    //         $_SESSION['created-time'] = $result['created'];
    //         header('Location: /');
    //     }else{
    //     $error = true;
    //     echo "verify pwd failed";
    // }
    // }else
    //  $error = true;
    $result = $userController->login($user->getEmail(),$user->getPassword(),$pdo);
    if($result !=NULL){
        $_SESSION['name'] = $result['lastname'] . ' ' . $result['firstname'];
        $_SESSION['email'] = $result['email'];
        $_SESSION['phone'] = $result['phone'];
        $_SESSION['address'] = $result['address'];
        $_SESSION['created-time'] = $result['created'];
        header('Location: /');
    }else{
        $error=true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>The Hive Supermarket</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="The Hive Supermarket">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="The Hive">
  <meta name="generator" content="The Hive Supermarket">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="views/images/favicon.png" />
  
  <link rel="stylesheet" href="views/plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="views/plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="views/plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="views/plugins/slick/slick.css">
  <link rel="stylesheet" href="views/plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="views/css/style.css">

</head>

<body id="body">

    <section class="signin-page account">
    <div class="container">
        <div class="row">
            
        <?php if($error): ?>
            <div class="row mt-30">
                <div class="col-xs-12">
                    <div class="alertPart">
                    <div class="alert alert-danger alert-common" role="alert"><i class="tf-ion-close-circled"></i><span>Login Failed!</span> Invalid username/password</div>
                    </div>
                </div>		
            </div>
        <?php endif ?>

        <div class="col-md-6 col-md-offset-3">
            <div class="block text-center">
            <a href="/">
                <svg width="250px" height="29px" viewBox="0 0 200 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                        font-family="AustinBold, Austin" font-weight="bold">
                        <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                            <text id="AVIATO">
                                <tspan x="108.94" y="325">The Hive</tspan>
                            </text>
                        </g>
                    </g>
                </svg>
            </a>
            <h2 class="text-center">Welcome Back</h2>
            <form class="text-left clearfix" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" >
                <?php CSRF::csrfInputField() ?>
                <div class="form-group">
                    <input type="email" name="email" class="form-control"  placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="text-center">
                    <button name="login" type="submit" class="btn btn-main text-center" >Login</button>
                </div>
            </form>
            <p class="mt-20">Don't have an account ?<a href="/register"> Create New Account</a></p>
            <p class="mt-20"><a href="/forgot-password">Forgot Password?</a></p>
            </div>
        </div>
        </div>
    </div>
    </section>

 <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="views/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="views/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="views/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="views/plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="views/plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="views/plugins/slick/slick.min.js"></script>
    <script src="views/plugins/slick/slick-animation.min.js'"></script>

    <!-- Main Js File -->
    <script src="views/js/script.js"></script>
    
    

  </body>
  </html>
