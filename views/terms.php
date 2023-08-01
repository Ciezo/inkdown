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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inkdown | Terms</title>
    
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
    
</head>
<body>

    <!-- Bootstap navbar  -->
    <?php include ("../components/injectables/navbar/home_navbar.php");?>
    
    <main>
        <!-- Content goes here -->
        <div class="container-sm mx-auto pt-5">
            <div class="p-4 p-md-5 border rounded-3 mb-5">
                <h2 class="display-5">Terms</h2>
                <hr>
                <p>
                    <b>
                        Effective Date: June 9, 2023 
                        <br>
                    </b>
                </p>
                <p>
                    Welcome to Inkdown! We're excited to have you as a user of our friendly text editor in the browser. 
                    Before you start using our service, please take a moment to review our Terms of Service ("Terms") below. 
                    By accessing or using the Inkdown website, you agree to be bound by these Terms. 
                    If you do not agree with any part of these Terms, you should not use our service. 
                    <br>
                </p>
                <p>
                    <h4><b>1. Acceptance of Terms</b></h4><br>
                    <p>
                        By accessing or using Inkdown, you affirm that you are at least 18 years old and capable of entering into a legally binding agreement. If you are using Inkdown on behalf of an organization, you warrant that you have the authority to bind the organization to these Terms. If you are accessing or using Inkdown on behalf of a minor, you acknowledge that you are the parent or legal guardian of that minor and accept these Terms on behalf of the minor.
                    </p>
                </p>
                <p>
                    <h4><b>2. Use of Inkdown</b></h4><br>
                    <p>
                        Inkdown is a web-based text editor designed to provide users with a friendly and efficient writing experience. You may use Inkdown for personal, educational, or business purposes, provided that you comply with these Terms and all applicable laws and regulations.
                    </p>
                </p>
                <p>
                    <h4><b>3. User Accounts and Security</b></h4><br>
                    <p>
                        To access certain features of Inkdown, you may be required to create an account. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. If you believe that your account has been compromised, please notify us immediately at <b>cloydvansecuya@gmail.com</b>. Inkdown will not be liable for any loss or damage arising from unauthorized access to your account.
                    </p>
                </p>
                <p>
                    <h4><b>4. User Content</b></h4><br>
                    <p>
                        Inkdown allows you to create, edit, and save text content. You retain ownership of any content you create using our service. By using Inkdown, you grant us a non-exclusive, worldwide, royalty-free license to use, reproduce, modify, distribute, and display your content solely for the purpose of providing and improving our service.
                    </p>
                </p>

                <br><br>

                <p>
                    <b>
                        You agree not to use Inkdown to create or distribute any content that is unlawful, offensive, harmful, infringes on intellectual property rights, or violates the rights of others. Inkdown reserves the right to remove any content that violates these Terms or for any other reason at our sole discretion.
                    </b>
                </p>

                <p>
                    <h4><b>1. Intellectual Property Rights</b></h4><br>
                    <p>
                        Inkdown and its related logos, trademarks, and service marks are the property of <b>Cloyd Van Secuya</b>, are protected by intellectual property laws. You may not use our trademarks or logos without our prior written consent.                        
                    </p>
                </p>
                <p>
                    <h4><b>2. Disclaimer of Warranties</b></h4><br>
                    <p>
                        Inkdown is provided on an "as-is" basis without warranties of any kind, whether express or implied. We make no warranties about the accuracy, reliability, availability, or suitability of the service for any purpose. Your use of Inkdown is at your own risk.
                    </p>
                </p>
                <p>
                    <h4><b>3. Limitation of Liability</b></h4><br>
                    <p>
                        To the maximum extent permitted by law, Inkdown and its affiliates, officers, employees, and agents shall not be liable for any direct, indirect, incidental, special, or consequential damages arising out of or in connection with the use of Inkdown or these Terms.
                    </p>
                </p>
                <p>
                    <h4><b>4. Modifications to the Terms</b></h4><br>
                    <p>
                        We reserve the right to modify these Terms at any time. Any changes will be effective immediately upon posting the revised Terms on the Inkdown website. By continuing to use Inkdown after such changes, you agree to be bound by the modified Terms.
                    </p>
                </p>
                <p>
                    <h4><b>5. Termination</b></h4><br>
                    <p>
                        We may terminate or suspend your access to Inkdown without prior notice if you violate these Terms or for any other reason at our discretion. Upon termination, your right to use Inkdown will cease immediately.
                    </p>
                </p>
                <p>
                    <h4><b>6. Governing Law and Jurisdiction</b></h4><br>
                    <p>
                        These Terms shall be governed by and construed in accordance with the laws of Manila, Philippines, without regard to its conflict of laws principles. Any dispute arising out of or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts located in Manila, Philippines.
                    </p>
                </p>
                <p>
                    <h4><b>7. Contact Information</b></h4><br>
                    <p>
                        If you have any questions or concerns regarding these Terms or Inkdown, please contact <a href="mailto:cloydvansecuya@gmail.com"><b>cloydvansecuya@gmail.com</b></a>.
                    </p>
                </p>

                <br>
                <div class="px-4 mx-0 mb-5">
                    <h5>Thank you for using Inkdown! Happy writing!</h5>
                    <h6>&copy 2023 Cloyd Van Secuya. All rights reserved.</h6>
                    <a href="https://www.linkedin.com/in/cloydvansecuya/">LinkedIn</a>
                </div>

                <button onclick="history.back()" class="btn btn-outline-info btn-sm px-4 me-sm-3 fw-bold">Back</button>
            </div>            
        </div>
    </main>
</body>
</html>