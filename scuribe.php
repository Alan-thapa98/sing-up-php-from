<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Subscription Form | CodingNepal</title> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <style type="text/css">@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  height: 100vh;
  background: linear-gradient(136deg, rgb(224,195,252) 0%, rgb(142,197,252) 100%);
}
::selection{
  color: #fff;
  background: rgb(142,197,252);
}
.show-btn, .wrapper{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  border-radius: 5px;
  box-shadow: 0px 10px 15px rgba(0,0,0,0.1);
}
.show-btn{
  color: rgb(142,197,252);
  padding: 13px 18px;
  font-size: 20px;
  font-weight: 500;
  text-transform: uppercase;
  cursor: pointer;
}
.wrapper{
  z-index: 5;
  background: #fff;
  padding: 30px;
  text-align: center;
  max-width: 400px;
  width: 100%;
  display: flex;
  align-items: center;
  flex-direction: column;
  top: 50%;
  opacity: 1;
  pointer-events: auto;
  transition: all 0.3s ease;
}
#toggle{
  display: none;
}
#toggle:checked ~ .wrapper{
  opacity: 0;
  pointer-events: none;
  top: 40%;
}
.wrapper .cancel-icon{
  position: absolute;
  right: 20px;
  top: 20px;
  color: rgb(142,197,252);
  cursor: pointer;
}
.cancel-icon:hover{
  color: rgb(224,195,252);
}
.wrapper .icon{
  height: 110px;
  width: 110px;
  background: linear-gradient(136deg, rgb(224,195,252) 0%, rgb(142,197,252) 100%);
  line-height: 110px;
  border-radius: 50%;
  color: #fff;
  font-size: 55px;
}
.wrapper .content{
  margin: 20px 0;
}
.content header{
  font-size: 30px;
  font-weight: 600;
}
.content p{
  color: #333;
  font-size: 16px;
  font-weight: 400;
  margin-left: -3px;
}
form{
  width: 98%;
}
form .field{
  height: 45px;
  width: 100%;
  margin-bottom: 12px;
}
form .field input{
  width: 100%;
  height: 100%;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding: 0 15px;
  outline: none;
  font-size: 17px;
  transition: all 0.3s ease;
}
form .field input:focus{
  border-color: rgb(142,197,252);
}
form .btn{
  height: 47px;
  width: 100%;
  position: relative;
  overflow: hidden;
  border-radius: 5px;
}
form .btn .layer{
  height: 100%;
  width: 300%;
  position: absolute;
  left: -100%;
  background: linear-gradient(136deg, rgb(224,195,252) 0%, rgb(142,197,252) 100%);
  transition: all 0.4s ease;
}
form .btn:hover .layer{
  left: 0;
}
form .btn button{
  z-index: 1;
  position: relative;
  background: none;
  padding: 0px!important;
  color: #fff;
  border: 0px;
  outline: none;
  font-size: 20px;
  font-weight: 500;
  cursor: pointer;
  height: 100%;
  width: 100%;
}
.wrapper .text{
  margin-top: 5px;
}
.alert{
  margin: -9px 0 12px 0;
  padding: 10px;
  border-radius: 5px;
}
.success-alert{
  color: #155724;
  background: #d4edda;
  border: 1px solid #c3e6cb;
}
.error-alert{
  color: #721c24;
  background: #f8d7da;
  border: 1px solid #f5c6cb;
}
</style>
  <input type="checkbox" id="toggle">
  <label for="toggle" class="show-btn">Show Modal</label>
  <div class="wrapper">
    <label for="toggle">
    <i class="cancel-icon fas fa-times"></i>
    </label>
    <div class="icon"><i class="far fa-envelope"></i></div>
    <div class="content">
      <header>Become a Subscriber</header>
      <p>Subscribe to our blog and get the latest updates straight to your inbox.</p>
    </div>
    <form action="index.php" method="POST">
    <?php 
    $userEmail = ""; //first we leave email field blank
    if(isset($_POST['subscribe'])){ //if subscribe btn clicked
      $userEmail = $_POST['email']; //getting user entered email
      if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validating user email
        $subject = "Thanks for Subscribing us - CodingNepal";
        $message = "Thanks for subscribing to our blog. You'll always receive updates from us. And we won't share and sell your information.";
        $sender = "From: shahiprem7890@gmail.com";
        //php function to send mail
        if(mail($userEmail, $subject, $message, $sender)){
          ?>
           <!-- show sucess message once email send successfully -->
          <div class="alert success-alert">
            <?php echo "Thanks for Subscribing us." ?>
          </div>
          <?php
          $userEmail = "";
        }else{
          ?>
          <!-- show error message if somehow mail can't be sent -->
          <div class="alert error-alert">
          <?php echo "Failed while sending your mail!" ?>
          </div>
          <?php
        }
      }else{
        ?>
        <!-- show error message if user entered email is not valid -->
        <div class="alert error-alert">
          <?php echo "$userEmail is not a valid email address!" ?>
        </div>
        <?php
      }
    }
    ?>
      <div class="field">
        <input type="text" class="email" name="email" placeholder="Email Address" required value="<?php echo $userEmail ?>">
      </div>
      <div class="field btn">
        <div class="layer"></div>
        <button type="submit" name="subscribe">Subscribe</button>
      </div>
    </form>
    <div class="text">We do not share your information.</div>
  </div>

</body>
</html>
<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Subscription Form | CodingNepal</title> -->
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <input type="checkbox" id="toggle">
  <label for="toggle" class="show-btn">Show Modal</label>
  <div class="wrapper">
    <label for="toggle">
    <i class="cancel-icon fas fa-times"></i>
    </label>
    <div class="icon"><i class="far fa-envelope"></i></div>
    <div class="content">
      <header>Become a Subscriber</header>
      <p>Subscribe to our blog and get the latest updates straight to your inbox.</p>
    </div>
    <form action="index.php" method="POST">
    <?php 
    $userEmail = ""; //first we leave email field blank
    if(isset($_POST['subscribe'])){ //if subscribe btn clicked
      $userEmail = $_POST['email']; //getting user entered email
      if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)){ //validating user email
        $subject = "Thanks for Subscribing us - CodingNepal";
        $message = "Thanks for subscribing to our blog. You'll always receive updates from us. And we won't share and sell your information.";
        $sender = "From: shahiprem7890@gmail.com";
        //php function to send mail
        if(mail($userEmail, $subject, $message, $sender)){
          ?>
           <!-- show sucess message once email send successfully -->
          <div class="alert success-alert">
            <?php echo "Thanks for Subscribing us." ?>
          </div>
          <?php
          $userEmail = "";
        }else{
          ?>
          <!-- show error message if somehow mail can't be sent -->
          <div class="alert error-alert">
          <?php echo "Failed while sending your mail!" ?>
          </div>
          <?php
        }
      }else{
        ?>
        <!-- show error message if user entered email is not valid -->
        <div class="alert error-alert">
          <?php echo "$userEmail is not a valid email address!" ?>
        </div>
        <?php
      }
    }
    ?>
      <div class="field">
        <input type="text" class="email" name="email" placeholder="Email Address" required value="<?php echo $userEmail ?>">
      </div>
      <div class="field btn">
        <div class="layer"></div>
        <button type="submit" name="subscribe">Subscribe</button>
      </div>
    </form>
    <div class="text">We do not share your information.</div>
  </div>

</body>
</html>
