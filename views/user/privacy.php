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
    <title>Inkdown | Privacy</title>
    
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
                <h2 class="display-5">Privacy</h2>
                <hr>
                <p>
                    <b>
                        Effective date: July 27, 2023
                        <br>
                    </b>
                </p>
                <p>
                    Welcome to Inkdown! Your privacy is important to us, and we are committed to protecting your personal information. This Privacy Policy ("Policy") explains how we collect, use, disclose, and protect your data when you access or use our friendly text editor in the browser, Inkdown ("Service"). By using Inkdown, you consent to the practices described in this Policy.
                    <br>
                </p>
                <p>
                    <h4><b>1. Information We Collect</b></h4><br>
                    <p>
                        1.1 Information You Provide: When you create an account or use certain features of Inkdown, we may collect information that you voluntarily provide, such as your name, email address, and profile picture.
                    </p>
                    <p>
                        1.2 Usage Data: We automatically collect certain information when you use Inkdown, including your IP address, browser type, operating system, device information, and usage patterns. This data helps us improve our service and provide a better user experience.
                    </p>
                    <p>
                        1.3 Cookies and Similar Technologies: Inkdown may use cookies and similar technologies to collect information about your interactions with our website. Cookies are small files stored on your device that help us recognize you and provide a personalized experience. You can adjust your browser settings to manage or block cookies, but this may affect certain functionalities of Inkdown.
                    </p>
                </p>
                <p>
                    <h4><b>2. How We Use Your Information</b></h4><br>
                    <p>
                        2.1 Providing and Improving the Service: We use the information collected to operate, maintain, and enhance Inkdown, ensuring its smooth functionality and improving user experience.
                    </p>
                    <p>
                        2.2 Communication: We may use your email address to send you important updates, announcements, and service-related information. You can opt-out of non-essential communications at any time.
                    </p>
                    <p>
                        2.3 Analytics: We use aggregated and anonymized data for analytical purposes, helping us understand how users interact with Inkdown and make informed decisions to improve our service. 
                    </p>
                    <p>
                        2.4 Legal Compliance: We may use your information to comply with applicable laws, regulations, legal processes, or enforceable governmental requests.
                    </p>
                </p>
                <p>
                    <h4><b>3. How We Share Your Information</b></h4><br>
                    <p>
                        Inkdown does not share its data to any Third party services.
                    </p>
                </p>
                <p>
                    <h4><b>4. Data Security</b></h4><br>
                    <p>
                        We take reasonable measures to protect your information from unauthorized access, disclosure, alteration, or destruction. However, no method of data transmission over the internet or electronic storage is entirely secure. While we strive to protect your personal information, we cannot guarantee its absolute security.
                    </p>
                </p>
                <p>
                    <h4><b>5. Your choices</b></h4><br>
                    <p>
                        5.1 Account Information: You may review, update, or delete your account information by accessing your account settings on Inkdown.
                    </p>
                    <p>
                        5.2 Cookies: You can manage or disable cookies through your browser settings.
                    </p>
                </p>
                <p>
                    <h4><b>6. Children's Privacy</b></h4><br>
                    <p>
                        Inkdown is not intended for use by individuals under the age of 18. We do not knowingly collect personal information from minors. If you are a parent or legal guardian and believe that your child has provided us with their personal data, please contact us at [contact email], and we will take appropriate steps to remove the information.
                    </p>
                </p>
                <p>
                    <h4><b>7. Changes to this Privacy Policy</b></h4><br>
                    <p>
                        Inkdown is not intended for use by individuals under the age of 18. We do not knowingly collect personal information from minors. If you are a parent or legal guardian and believe that your child has provided us with their personal data, please contact us at [contact email], and we will take appropriate steps to remove the information.
                    </p>
                </p>
                <p>
                    <h4><b>8. Contact Information</b></h4><br>
                    <p>
                        If you have any questions or concerns about this Privacy Policy or Inkdown's privacy practices, please contact us at <a href="mailto:cloydvansecuya@gmail.com"><b>cloydvansecuya@gmail.com</b></a>.
                    </p>
                </p>

                <br>
                <div class="px-4 mx-0 mb-5">
                    <h5>Thank you for using Inkdown and trusting us with your data!</h5>
                    <h6>&copy 2023 Cloyd Van Secuya. All rights reserved.</h6>
                    <a href="https://www.linkedin.com/in/cloydvansecuya/">LinkedIn</a>
                </div>

                <button onclick="history.back()" class="btn btn-outline-info btn-sm px-4 me-sm-3 fw-bold">Back</button>
            </div>
        </div>
    </main>
</body>
</html>