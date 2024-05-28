<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../assets/style/style_Admin.css" />
  <title>Login</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>

<body>
  <form action="../../auth/login/store_login.php" method="post">
    <div class="container">
      <div class="form-logo">
        <a href="../index.php" class="login-title"><img src="../assets/images/verde_wide_green.png" alt="" ></a>
          
      </div>
      <div class="box form-box">
        <!-- <span><b>Verde Creative</b></span></a><br> -->
        <!-- <header>Login</header> -->
        <form action="">
          <div class="field input">
            <label for="username"></label>
            <input type="username" name="username" id="username" autocomplete="off" placeholder="Username" required />
          </div>
          <div class="field input">
            <label for="password"></label>
            <input type="password" name="password" id="password" autocomplete="off" placeholder="Password" required />
          </div>
          <div class="field">
            <input type="submit" class="btn" name="submit" value="Login" required />
          </div>
        </form>
      </div>
    </div>
</body>

</html>