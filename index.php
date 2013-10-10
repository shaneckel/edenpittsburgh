<?php
session_start();

$userinfo = array(
                'eden'=>'password123' 
                );

if(isset($_GET['logout'])) {
    $_SESSION['username'] = '';
    header('Location:  ' . $_SERVER['PHP_SELF']);
}

if(isset($_POST['username'])) {
    if($userinfo[$_POST['username']] == $_POST['password']) {
        $_SESSION['username'] = $_POST['username'];
    }else {
        //Invalid Login
    }
}
?>
<!DOCTYPE html>
<html>

  <head>
    <title>Eden | Fresh. Local. Smart. | 735 Copeland St. - Pittsburgh, Pa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="//cloud.typography.com/6038632/802882/css/fonts.css" />
  </head>

  <body ng-app="ngEden">
  
    <header class="top" scroll ng-class="{min:scrollpast}">
      <nav>
        <a ng-class="{ active: $state.includes('dinner') }" ui-sref="dinner">dinner</a>
        <a ng-class="{ active: $state.includes('brunch') }" ui-sref="brunch">brunch</a>
        <a ui-sref="home" class="logo">
          <img ng-src="/img/edenlogo.svg">
        </a>
        <a ng-class="{ active: $state.includes('about') }" ui-sref="about">about</a>
        <a ng-class="{ active: $state.includes('contact') }" ui-sref="contact">contact</a>
      </nav>
    </header>

    <article ui-view class="main" ng-animate="{enter:'fade-enter'}"></article>

    <script src="js/util/angular.js"></script>
    <script src="js/util/angular-ui-router.js"></script>
    <script src="js/eden.js"></script>

  <?php else: ?>
   
   <form name="login" action="" method="post">
        Username:  <input type="text" name="username" value="" /><br />
        Password:  <input type="password" name="password" value="" /><br />
        <input type="submit" name="submit" value="Submit" />
    </form>

  <?php endif; ?>

  </body>
</html>