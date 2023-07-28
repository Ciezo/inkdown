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
if (isset($_POST["login-user"]) || $_SERVER["REQUEST_METHOD"] == "POST") {
    
    /** Validate username */
    $input_username = trim($_POST["username"]);
    $validate_username = UserValidations::login_check_username($input_username);
    if(isset($validate_username)) {
        $_err_username = $validate_username; 
    } 
    $username = $input_username;


    /** Validate username */
    $input_password = trim($_POST["password"]);
    $validate_password = UserValidations::login_check_password($input_password);
    if(isset($validate_password)) {
        $_err_password = $validate_password; 
    } 
    $password = $input_password;


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
                $_err_login_failed = "login-failed";
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
                $_err_login_failed = "login-failed";
            }
        }
    }   
}
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icon/icon.png" type="image/png">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/main.css">
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="../css/globals.css">

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c36559a51c.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
    <style>
        #login_active {
            color: white;
            font-weight:bold;
        }
    </style>
</head>
<body>
    <!-- Bootstrap navbar -->
    <?php include ("../components/injectables/navbar/home_navbar.php");?>

    <!-- Content goes here -->
    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Hello 👋 <br>Welcome back!</h1>
                    <p class="col-lg-10 fs-4">Ready to get back in your productivity zone? Login now! 👉</p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <?php
                        if(!empty($_err_login_failed)) {
                            include("../components/composable/invalidLogin.php");
                        }
                    ?>
                    <form class="needs-validation p-4 p-md-5 border rounded-3" novalidate action="login.php" method="POST">
                        <div class="form-group mb-3">
                            <label for="floatingRole" class="form-label">Logging-in as:</label>
                            <select name="login-role" id="floatingRole"class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="username" placeholder="Username" id="floatingUsername" class="form-control <?php echo (!empty($_err_username)) ? 'is-invalid' : ''; ?>" value="<?php echo $username ; ?>">
                            <label for="floatingUsername"><i class="fa-regular fa-user"></i> Username</label>
                            <span class="invalid-feedback"><?php echo $_err_username ;?></span>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="password" name="password" placeholder="Password" id="floatingPassword" class="form-control <?php echo (!empty($_err_password)) ? 'is-invalid' : ''; ?>" value="<?php echo $password ; ?>">
                            <label for="floatingPassword"><i class="fa-solid fa-vault"></i> Password</label>
                            <span class="invalid-feedback"><?php echo $_err_password ;?></span>
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Stay signed-in
                            </label>
                        </div>

                        <hr class="my-4">
                        <input type="submit" name="login-user" class="w-100 btn btn-lg btn-success" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>