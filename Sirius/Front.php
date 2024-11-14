<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sirius A Learning Platform </title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet"  type="text/css" href="Css\Front.css">
    </head>
    <body class="welcome-body-page">
        <div class="blurr"> <br /> 
            <div class="container">

                <nav class="navbar navbar-expand-lg navbar-light bg-light" id="Front_nav">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img src="image\icon.webp" width="40" >
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#aboutModal">About</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#contactModal">Contact Us</a>
                                </li>  
                            </ul>
                            <ul>
                                <li class="navbar-nav me-auto mb-2 mb-lg-0">
                                <a class="nav-link" href="login.php">Login</a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
                <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body"> 
                                <img src="image\Logo_of_Sirius.webp" alt="Logo">  
                                <p>Our e-learning institute is a modern educational platform designed to deliver quality education across diverse curricula and skill-building courses.
                                We offer comprehensive programs including A Levels, O Levels, SSC, HSC, and specialized courses aimed at enhancing personal and professional skills. 
                                Our institute prides itself on a faculty of experienced and passionate teachers who are dedicated to student success.
                                Each educator is committed to fostering an engaging, interactive learning environment that goes beyond traditional teaching methods.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>If you have any queries,
                                   contact us via Email or phone<br>
                                   <a href="https://mail.google.com/mail/u/0/?ogbl#inbox?compose=DmwnWsmFRzBmJKzdXxdlMXzNkShRrgKKDfJNJKGghldHXlmmSsvXCrfnPdXWgtFZVMPTZBsdmLHB">siriusprogram79@gmail.com</a><br>
                                   Phone No. 01838073738

                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
