<?php 
session_start();
require("../config.php");
require("../controller/UserController.php");
require("../validations/UserValidations.php");


$first_name = $last_name = $birthday = $username = $password = "";
$_err_first_name = $_err_last_name = $_err_birthday = $_err_username = $_err_password = "";
$isTaken_username = false; 

// Check when form is submitted 
if (isset($_POST["register-user"]) || $_SERVER["REQUEST_METHOD"] == "POST") {
    
    /** Validate first name */
    $input_first_name = trim($_POST["firstname"]);
    $validate_first_name = UserValidations::check_first_name($input_first_name);
    if(isset($validate_first_name)) {
        $_err_first_name = $validate_first_name; 
    } 
    $first_name = $input_first_name;


    /** Validate last name */
    $input_last_name = trim($_POST["lastname"]);
    $validate_last_name = UserValidations::check_last_name($input_last_name);
    if(isset($validate_last_name)) {
        $_err_last_name = $validate_last_name; 
    } 
    $last_name = $input_last_name; 


    /** Validate birthday */
    $input_birthday = trim($_POST["birthday"]);
    $validate_birthday = UserValidations::check_user_birthday($input_birthday);
    if(isset($validate_birthday)) {
        $_err_birthday = $validate_birthday;
    }
    $birthday = $input_birthday;


    /** Validate username */
    $input_username = trim($_POST["username"]);
    $validate_username = UserValidations::check_username($input_username);
    if(isset($validate_username) || $isTaken_username == true) {
        $_err_username = $validate_username;
    }
    $username = $input_username;


    /** Validate username */
    $input_password = trim($_POST["password"]);
    $validate_password = UserValidations::check_user_password($input_password);
    if(isset($validate_password)) {
        $_err_password = $validate_password;
    }
    $password = $input_password;



    /** Check if no errors occurred */
    if (empty($_err_first_name) && empty($_err_last_name) && empty($_err_birthday) && empty($_err_username) && empty($_err_password)) {
        $user_model = new User($first_name, $last_name, $birthday, $username, $password);
        $controller = UserController::saveUser($user_model);
    }   
}
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icon/icon.png" type="image/png">
    <title>Sign-up | Register now to Inkdown!</title>

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
        #signup_active {
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
    <main>
        <div class="container col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Embark on an Extraordinary Journey with Inkdown! 🚀</h1>
                    <p class="col-lg-10 fs-4">
                        Are you ready to unleash your creativity and elevate your note-taking game to unprecedented heights? Look no further than Inkdown, it will revolutionize the way you capture your thoughts and ideas! 🌟
                    </p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="needs-validation p-4 p-md-5 border rounded-3" novalidate action="signup.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="firstname" placeholder="First name" id="floatingInput" class="form-control <?php echo (!empty($_err_first_name)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name ; ?>">
                            <label for="floatingInput"><i class="fa-regular fa-address-card"></i> First name</label>
                            <span class="invalid-feedback"><?php echo $_err_first_name ;?></span>
                        </div>    

                        <div class="form-floating mb-3">
                            <input type="text" name="lastname" placeholder="Last name" id="floatingInput" class="form-control <?php echo (!empty($_err_last_name)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name ; ?>">
                            <label for="floatingInput"><i class="fa-solid fa-signature"></i> Last name</label>
                            <span class="invalid-feedback"><?php echo $_err_last_name ;?></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="date" name="birthday" id="floatingDate" class="form-control <?php echo (!empty($_err_birthday)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday ; ?>">
                            <label for="floatingDate"><i class="fa-solid fa-cake-candles"></i> Birthday</label>
                            <span class="invalid-feedback"><?php echo $_err_birthday ;?></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="username" placeholder="Username" id="floatingUsername" class="form-control <?php echo (!empty($_err_username)) ? 'is-invalid' : ''; ?>" value="<?php echo $username ; ?>">
                            <label for="floatingUsername"><i class="fa-regular fa-user"></i> Username</label>
                            <span class="invalid-feedback"><?php echo $_err_username ;?></span>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password"  placeholder="Password" id="floatingPassword" class="form-control <?php echo (!empty($_err_password)) ? 'is-invalid' : ''; ?>" value="<?php echo $password ; ?>">
                            <label for="floatingPassword"><i class="fa-solid fa-vault"></i> Password</label>
                            <span class="invalid-feedback"><?php echo $_err_password ;?></span>
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        
                        <input class="w-100 btn btn-lg btn-primary" name="register-user" type="submit" value="Sign up">
                        <hr class="my-4">
                        <small class="text-body-secondary">By clicking Sign up, you agree to the terms of use.</small>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>