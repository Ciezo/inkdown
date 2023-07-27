<?php 
    require("../config.php");
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/icon/icon.png" type="image/png">
    <title>Inkdown | Home</title>
    
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
        #home_active {
            background-color: white;
            border-radius: 10px;
            color: black;
        }
    </style>
</head>
<body>
    
    <!-- Bootstap navbar  -->
    <?php include ("../components/injectables/navbar/home_navbar.php");?>
    
    <main>
        <!-- Content goes here -->
        <div class="container-sm mx-auto pt-5">
            <div class="px-4 py-5 my-5 text-center">
                <h1 class="display-1 fw-bold text-body-emphasis">✒️ Inkdown</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="display-4 lead mb-4">
                        Your friendly in-browser text editor
                    </p>
                    <p class="lead fw-light text-body-emphasis">
                        Experience the Speed of Thought with Inkdown!
                    </p>
                    <p class="lead">
                        Discover a whole new level of personalization with Inkdown's lightning-fast, simple, and lightweight platform. Creating personalized texts and notes has never been easier! Our intuitive interface allows you to unleash your creativity effortlessly.
                    </p>
                    <div class="d-grid pt-4 gap-2 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 gap-4"  href="signup.php">Try it now!</a>
                    </div>
                    <span class="lighter">A lightweight yet simple experience!</span>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Unleash Your Creativity</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        With Inkdown, the power to customize your content is in your hands. Emphasize your thoughts with bold and italics, create organized lists with numbering, and add links to your texts for a seamless experience. Editing your content is a breeze!
                        
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh1-1 mb-3">Always Remembered</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        Inkdown values your work and ensures that your notes are persistently saved, ready to be accessed whenever you need them. Say goodbye to losing your ideas and hello to a reliable companion that keeps track of your thoughts.
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Lightning-Fast Data Retrieval</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        Powered by PHP's cutting-edge lightweight and dynamic capabilities, Inkdown fetches your notes in the blink of an eye. Say goodbye to waiting and hello to instant access!
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="container-sm mx-auto">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold text-body-emphasis lh1-1 mb-3">Seamless 24/7 Access</h1>
                    </div>
                    <div class="col-lg-6">
                        <p class="lead">
                            Inkdown deploys a remote database pipeline, guaranteeing 24/7 access for all users. Your notes are always within reach, no matter where you are.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Scale with Ease</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        Our source code is designed with scalability in mind, using Classes and Controllers to collect events and user data. Inkdown grows with you, accommodating your needs as they evolve.
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="container-sm mx-auto">
                <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold text-body-emphasis lh1-1 mb-3">Your Space, Your Way</h1>
                    </div>
                    <div class="col-lg-6">
                        <p class="lead">
                            We believe in user-centric design, and that's why Inkdown ensures that each user has access to their own respective pages. Enjoy a seamless and personalized experience every time.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Elegance and Intuition</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        Inkdown's user interface is elegantly simple yet remarkably intuitive and dynamic. We understand the value of aesthetics, making your note-taking experience a pleasure.
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">A Symphony of Functionality</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                    Inkdown offers a comprehensive CRUD system, operating on a PHP local API. This "wrapper" ensures flawless logic and data handling, giving you complete control over your content.
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Archive and Restore</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        Never fear losing your valuable notes again! Inkdown implements cutting-edge techniques for archiving and restoring. Safeguard your work and easily restore it whenever needed.
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Save, Edit, Remove, and Restore Notes</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        Inkdown has ways to create, edit, and delete personalized notes whilst maintaining the ability to archive and restore them. 
                        With Inkdown, the power to customize your content is in your hands. Emphasize your thoughts with bold and italics, create organized lists with numbering, and add links to your texts for a seamless experience. Editing your content is a breeze!    
                    </p>
                </div>
            </div>
        </div>

        <div class="divider-dark"></div>

        <div class="container-sm mx-auto">
            <div class="row flex-lg-row align-items-center g-5 py-5">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">The future of note taking</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">
                        Embrace the future of note-taking with Inkdown, where speed, creativity, and reliability converge to give you the ultimate writing experience. Say hello to a world of seamless personalization and innovation today!
                    </p>
                </div>
            </div>
        </div>

    </main>
</body>
</html>