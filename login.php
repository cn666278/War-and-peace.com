<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <!-- <link rel="stylesheet" href="css/style.css" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="./login.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <?php
            require('db.php');
            session_start();
            // If form submitted, insert values into the database.
            if (isset($_POST['username'])){

                $username = stripslashes($_REQUEST['username']); // removes backslashes
                $username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($con,$password);

            //Checking is user existing in the database or not
                $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
                $result = mysqli_query($con,$query) or die(mysqli_error());
                $rows = mysqli_num_rows($result);
                if($rows==1){
                    $_SESSION['username'] = $username;
                    header("Location: assignment1.html"); // Redirect user to index.php
                    }else{
                        echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
                        }
            }else{
        ?>
        <div class="container right-panel-active">

          <!-- login -->
          <div class="container_form container--signin">
              <form action="#" method="post" name="login" class="form" id="form2">
                <h2 class="form_title">Login</h2>
                <input type="text" name="username" class="input" placeholder="Username" required />
                <input type="password" name="password" class="input" placeholder="Password" required />
                <input name="submit" class="btn" type="submit" value="Login" />
                <p>Not registered yet? <a href='registration.php'>Register Here</a></p>
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
      							<button class="btn" id="signIn">Sign In</button>
                  </div>
                  <div class="overlay_panel overlay--right">
      							<p>
      								<b style="font-size:28px; font-family: "Times New Roman", Georgia, Serif;" title="WAR AND PEACE" target="_blank" class="w3-hover-text-blue">War and Peace.com</b>
                    </p>
                    <button class="btn" id="signUp">Sign In</button>
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
