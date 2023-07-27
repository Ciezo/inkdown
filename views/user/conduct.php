<?php 
session_start();
require("../../config.php");
require("../../components/utils.php");
if (!isset($_SESSION["user"])) {
    // If not logged in, then redirect to not found
    header("location: ../error/error404.php");
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkdown | Code of Conduct</title>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../js/bootstrap.bundle.min.js"></script>

    <!-- Custom styles -->
    <link rel="stylesheet" href="../../css/globals.css">

    <!-- Fonts and icons -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c36559a51c.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
</head>
<body>

    <!-- Bootstap navbar  -->
    <?php include ("../../components/injectables/navbar/user_navbar.php");?>
    
    <main>
        <!-- Content goes here -->
        <div class="container-sm mx-auto pt-5">
            <div class="p-4 p-md-5 border rounded-3 mb-5">
                <h2 class="display-5">Code of Conduct</h2>
                <hr>
                <p>At Inkdown, we believe in fostering a positive and inclusive community for all users of our friendly text editor. To achieve this, we expect all users to abide by the following Code of Conduct when interacting with Inkdown's services, including the website, communication channels, and any related platforms. This Code of Conduct is designed to promote respectful and constructive interactions and to ensure that everyone feels safe and welcome within our community. <br></p>
                <h4>1. Be Respectful and Inclusive</h4><br>
                <p>Treat all users, administrators, and moderators with respect and kindness. Avoid engaging in any form of harassment, discrimination, or harmful behavior based on race, ethnicity, gender, sexual orientation, age, religion, disability, or any other personal characteristic. We are committed to creating an inclusive environment where everyone feels valued and respected.</p>

                <h4>2. Maintain a Safe Environment</h4><br>
                <p>Ensure that all interactions within the Inkdown community are free from threats, violence, or any other harmful conduct. Do not share or promote content that is offensive, explicit, or illegal. This includes refraining from posting or sharing content that may violate intellectual property rights or privacy laws.</p>

                <h4>3. Engage in Constructive Discussions</h4><br>
                <p>Encourage open and constructive discussions within the community. Respect differing opinions and be willing to listen to others' viewpoints. Avoid personal attacks, trolling, or disruptive behavior that hinders healthy discussions.</p>

                <h4>4. Respect User Privacy</h4><br>
                <p>Respect the privacy of other users and refrain from sharing or seeking personal information without explicit consent. Do not attempt to access or manipulate others' accounts, data, or any information not intended for public sharing.</p>

                <h4>5. Report Inappropriate Behavior</h4><br>
                <p>If you encounter any behavior that violates this Code of Conduct or raises concerns about the safety and well-being of the community, please report it to us immediately at <a href="mailto:cloydvansecuya@gmail.com"><b>cloydvansecuya@gmail.com</b></a>. We take all reports seriously and will review and address them promptly.</p>

                <h4>6. Comply with the Terms of Service and Privacy Policy</h4><br>
                <p>Ensure that your use of Inkdown aligns with the Terms of Service and Privacy Policy outlined on our website. Familiarize yourself with these documents and adhere to their guidelines.</p>

                <h4>7. Follow Platform-Specific Rules</h4><br>
                <p>If you participate in Inkdown's community through external platforms or social media channels, such as forums or social media groups, also adhere to the specific rules and guidelines of those platforms.</p>

                <h4>Consequences of Violating the Code of Conduct</h4><br>
                <p>Failure to comply with this Code of Conduct may result in appropriate actions, including but not limited to:</p>
                <ul>
                    <li>Warning or temporary suspension of account access.</li>
                    <li>Permanent suspension or termination of account access.</li>
                    <li>Removal of content or comments that violate the Code of Conduct.</li>
                    <li>Reporting to relevant authorities if necessary, especially for severe violations.</li>
                </ul>

                <h4>Thank You for Your Cooperation</h4><br>
                <p>By using Inkdown, you agree to abide by this Code of Conduct. We appreciate your cooperation in helping us maintain a positive and inclusive environment for all users. If you have any questions or need further clarification regarding this Code of Conduct or any related matters, please feel free to reach out to us at <a href="mailto:cloydvansecuya@gmail.com"><b>cloydvansecuya@gmail.com</b></a>.</p>

                <p>Thank you for being a part of the Inkdown community and contributing to a welcoming and respectful space for all!</p>

                <button onclick="history.back()" class="btn btn-outline-info btn-sm px-4 me-sm-3 fw-bold">Back</button>
            </div>
        </div>
    </main>
</body>
</html>