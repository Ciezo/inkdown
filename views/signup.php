<?php 
session_start();
require("../config.php");
require("../controller/UserController.php");
require("../validations/UserValidations.php");


$first_name = $last_name = $birthday = $username = $password = "";
$_err_first_name = $_err_last_name = $_err_birthday = $_err_username = $_err_password = "";
$isTaken_username = false; 

// Check when form is submitted 
if (isset($_POST["register-user"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icon/icon.png" type="image/png">
    <title>Sign-up | Register now to Inkdown!</title>

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
        .register-form {
            margin: 0 auto;
            width: 50%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .register-form .form-group {
            margin-bottom: 30px;
        }
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
    <div class="container">
        <div class="register-form card px-4">
            <h2>Sign-up to Inkdown</h2>
            <form action="signup.php" method="POST">
                <div class="form-group">
                    <label for="First Name">First Name</label>
                    <input type="text" name="firstname" placeholder="Ex. Juan" class="form-control <?php echo (!empty($_err_first_name)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name ; ?>">
                    <span class="invalid-feedback"><?php echo $_err_first_name ;?></span>
                </div>
                <div class="form-group">
                    <label for="Last Name">Last Name</label>
                    <input type="text" name="lastname" placeholder="Ex. Dela Cruz" class="form-control <?php echo (!empty($_err_last_name)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name ; ?>">
                    <span class="invalid-feedback"><?php echo $_err_last_name ;?></span>
                </div>
                <div class="form-group">
                    <label for="Birthday">Birthday</label>
                    <input type="date" name="birthday" class="form-control <?php echo (!empty($_err_birthday)) ? 'is-invalid' : ''; ?>" value="<?php echo $birthday ; ?>">
                    <span class="invalid-feedback"><?php echo $_err_first_name ;?></span>
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
                <input type="submit" name="register-user" class="form-control btn btn-outline-primary">
            </form>
        </div>
    </div>
    
</body>
</html>