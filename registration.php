<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <!-- <link rel="stylesheet" href="css/style.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="./login.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
    <?php
        require('db.php');
        // If form submitted, insert values into the database.
        if (isset($_REQUEST['username'])){
            $username = stripslashes($_REQUEST['username']); // removes backslashes
            $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
            $email = stripslashes($_REQUEST['email']);
            $email = mysqli_real_escape_string($con,$email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con,$password);

            $trn_date = date("Y-m-d H:i:s");
            $query = "INSERT into `users` (username, password, email, trn_date) VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
            }
        }else{
    ?>

    <div class="container right-panel-active">

      <!-- Register -->
      <div class="container_form container--signup">
          <form action="#" method="post" name="register" class="form" id="form1">
            <h2 class="form_title">Register</h2>
            <input type="text" name="username" class="input" placeholder="Username" required />
            <input type="email" name="email" class="input" placeholder="Email" required />
            <input type="password" name="password" class="input" placeholder="Password" required />
            <input name="submit" class="btn" type="submit" value="Register" />
          </form>
          <br/><br/>
      </div>

      <!-- overlay -->
      <div class="container_overlay">
          <div class="overlay">
              <div class="overlay_panel overlay--left">
                <p>
                  <b style="font-size:28px; font-family: "Times New Roman", Georgia, Serif;" title="WAR AND PEACE" target="_blank" class="w3-hover-text-blue">War and Peace.com</b>
                </p>
                <button class="btn" id="signUp">Register</button>
              </div>
              <div class="overlay_panel overlay--right">
                <p>
                  <b style="font-size:28px; font-family: "Times New Roman", Georgia, Serif;" title="WAR AND PEACE" target="_blank" class="w3-hover-text-blue">War and Peace.com</b>
                </p>
                <button class="btn" id="signUp">Register</button>
              </div>
          </div>
      </div>

    </div>

    <!-- background -->
    <div class="slidershow">
        <div class="slidershow--image" style="background-image: url('img/ukr.png')"></div>
        <div class="slidershow--image" style="background-image: url('img/afg1.png')"></div>
        <div class="slidershow--image" style="background-image: url('img/iraq1.png')"></div>
        <div class="slidershow--image" style="background-image: url('img/ko1.jpg')"></div>
    </div>

    <!-- partial -->
    <script src="./login.js"></script>

    <?php } ?>
    </body>
</html>
