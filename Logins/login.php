 <?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "tutorials");
    $msg = "";
    if (isset($_POST['submit'])) {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' && password='$password'");
        $num = mysqli_num_rows($sql);

        if ($num > 0) {
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['USER_ID'] = $row['id'];
            $_SESSION['USER_NAME'] = $row['username'];
            header("location:index.php");
        } else {
            $msg = "Incorage username or password!";
        }
    }
    ?>
 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <title>Login Page</title>
     <style>
         body {
             text-align: center;
             margin-top: 40px;
         }
     </style>
 </head>

 <body>
     <div class="main">
         <div class="flex">
             <div class="content">
                 <h2 class="title">Login</h2>
                 <form method="post" action="">
                     <label for="username">Username</label>
                     <div class="box">
                         <input type="text" name="username" placeholder="Username" class="form-control" required>
                     </div>
                     <label for="password">Password</label>
                     <div class="box">
                         <input type="password" name="password" placeholder="Password" class="form-control" required>
                     </div>
                     <div class="btn-box">
                         <input type="submit" name="submit" value="Login" class="btn submit-btn">
                     </div>
                     <div class="error">
                         <?php echo '<p style="color:red">'.$msg.'</p>'?>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </body>

 </html>