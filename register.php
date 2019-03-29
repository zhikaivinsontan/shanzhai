<?php
include("includes/config.php");
include("includes/classes/constants.php");
include("includes/classes/account.php");

$account = new Account($con);


function getInputValue($name) {
  if (isset($_POST[$name])) {
    echo $_POST[$name];
  }
}
include("includes/register-handler.php");
include("includes/login-handler.php");
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>shanzhai music</title>



  <link rel="stylesheet" type="text/css" href="assets/css/register.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>



</head>
<body>
  <div id="background">
    <div id="inputContainer" class="">



      <?php
//not werking for naos
/*
  if(isset($_POST['registerButton'])) {

    echo '<script>$("#hideRegister").click(function() {
    $("#loginForm").show();
    $("#registerForm").hide();
    });
    </script>';
  } else {



 echo '<script>
          $("#hideLogin").click(function() {
            $("#loginForm").hide();
            $("#registerForm").show();
          });
        </script>';


  }
*/

  ?>






  <form id="loginForm" class="" action="register.php" method="post">
    <h2>Login to your account</h2>
    <p>
      <?php echo $account->getError(Constants::$loginFailed )?>
      <label for="">Username</label>
      <input id="loginUsername" type="text" name="loginUsername" placeholder="Username" required>
    </p>
    <p>
      <label for="">Password</label>
      <input id="loginPassword" type="password" name="loginPassword"  required>
    </p>
    <button type="submit" name="loginButton">Login</button>

    <div class="hasAccountText">
      <span id="hideLogin">Don't have an account yet? Signup here.</span>
    </div>
  </form>















  <form id="registerForm" class="" action="register.php" method="post">
    <h2>Register Today!</h2>
    <p>
      <?php echo $account->getError(Constants::$firstNameCharacters)?>
      <label for="">First Name</label>
      <input id="firstName" type="text" name="firstName" placeholder="e.g. John" required>
    </p>
    <p>
      <?php echo $account->getError(Constants::$lastNameCharacters)?>
      <label for="">Last Name</label>
      <input id="lastName" type="text" name="lastName" placeholder="e.g. Horstman" required>
    </p>
    <p>

      <?php echo $account->getError(Constants::$usernameCharacters)?>
      <?php echo $account->getError(Constants::$usernameInvalid)?>
      <label for="">Username</label>
      <input id="userName" type="text" name="username" placeholder="Username" value="<?php getInputValue('username');?>" required>
    </p>
    <p>

      <?php echo $account->getError(Constants::$emailsInvalid)?>

      <label for="">Email</label>
      <input id="email" type="email" name="email" placeholder="Email" required>
    </p>
    <p>

      <?php echo $account->getError(Constants::$emailsDoNotMatch)?>

      <label for="">Confirm Email</label>
      <input id="email" type="email" name="email2" placeholder="Email" required>
    </p>
    <p>

      <?php echo $account->getError(Constants::$passwordCharacters)?>
      <?php echo $account->getError(Constants::$passwordNotAlphanumeric)?>




      <label for="">Password</label>
      <input id="password" type="password" name="password"  required>
    </p>
    <p>

      <?php echo $account->getError(Constants::$passwordsDoNotMatch )?>


      <label for="">Confirm Password</label>
      <input id="password2" type="password" name="password2"  required>
    </p>
    <button type="submit" name="registerButton">Register</button>

    <div id="hasAccountText">
      <span id="hideRegister">Already have an account? Log in here.</span>
    </div>
  </form>

  <div id="loginText">
    <h1>Get great music, right now</h1>



  </div>






</div>

</div>

</body>
</html>
