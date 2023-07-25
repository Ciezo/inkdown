<?php 
session_start();
error_reporting(0);
require("../config.php");
require("../validations/UserValidations.php");
require("../views/sessions/user/UserSession.php");
require("../views/sessions/admin/AdminSession.php");


$username = $password = "";
$_err_username = $_err_password = "";
$login_as_role = "";

// Check when form is submitted 
if (isset($_POST["login-user"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    
    /** Validate username */
    $input_username = trim($_POST["username"]);
    if (empty($input_username)) {
        $_err_username = "Please, provide a username!";
    } else {
        $username = $input_username;
    }


    /** Validate username */
    $input_password = trim($_POST["password"]);
    if (empty($input_password)) {
        $_err_password = "Please, provide a password!";
    } else {
        $password = $input_password;
    }



    /** Check if no errors occurred */
    if (empty($_err_username) && empty($_err_password)) {

        /** Check who is logging in */
        $login_as_role = $_POST["login-role"];

        /** Check the database for existing users accounts */
        if($login_as_role == "user") {
            $user_query = "SELECT * FROM USERS WHERE username='$username' AND password='$password'";
            $user_results = mysqli_query($conn, $user_query);
            $user_rows = mysqli_fetch_array($user_results); 
            if ($username == $user_rows["username"] && $password == $user_rows["password"]) {
                UserSession::setUserSessionRole("user");
                UserSession::saveUserCredentials($username, $password);
                UserSession::setUserCookies();
                UserSession::sessionUserCheck();
            } else {
                Print '<script>alert("Incorrect Username or Password!");</script>';
            }
        }
        
        /** Check if the admin is trying to log-in */
        else if ($login_as_role == "admin") {
            $admin_query = "SELECT * FROM ADMIN WHERE username='$username' AND password='$password'"; 
            $admin_results = mysqli_query($conn, $admin_query);
            $admin_rows = mysqli_fetch_array($admin_results); 
            if ($username == $admin_rows["username"] && $password == $admin_rows["password"]) {
                AdminSession::setAdminSessionRole("admin");
                AdminSession::saveAdminCredentials($username, $password);
                AdminSession::setAdminCookies();
                AdminSession::sessionAdminCheck();
            } else {
                Print '<script>alert("Incorrect Username or Password!");</script>';
            }
        }
    }   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icon/icon.png" type="image/png">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c36559a51c.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <style>
        .container {
            padding-top: 50px;
        }
        .login-form {
            margin: 0 auto;
            width: 50%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .login-form .form-group {
            margin-bottom: 30px;
        }
        #login_active {
            background-color: white;
            border-radius: 10px;
            color: black;
        }
    </style>
</head>
<body>
    <!-- Bootstrap navbar -->
    <?php include ("../components/injectables/navbar/home_navbar.php");?>

    <!-- Content goes here -->
    <div class="container">
        <div class="login-form card px-4">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <div class="card-header mt-2 mb-2 border-dark">
                        <label for="Logging-in as"><h2>Logging-in as</h2></label>
                    </div>
                    <select name="login-role" class="form-control">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="First Name">Username</label>
                    <input type="text" name="username" placeholder="Ex. juan_cruz123" class="form-control <?php echo (!empty($_err_username)) ? 'is-invalid' : ''; ?>" value="<?php echo $username ; ?>">
                    <span class="invalid-feedback"><?php echo $_err_username ;?></span>
                </div>
                <div class="form-group">
                    <label for="Password">Password</label>
                    <input type="password" name="password" placeholder="*******" class="form-control <?php echo (!empty($_err_password)) ? 'is-invalid' : ''; ?>" value="<?php echo $password ; ?>">
                    <span class="invalid-feedback"><?php echo $_err_password ;?></span>
                </div>
                <!-- Submit -->
                <input type="submit" name="login-user" class="form-control btn btn-outline-success">
            </form>
        </div>
    </div>
    
</body>
</html>