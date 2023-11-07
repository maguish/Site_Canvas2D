<!doctype html>
<html lang="en">

<head>
    <!-- Main css -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    require('navbar.php')

    ?>

    <?php


    if (isset($_GET['exer_err'])) { ?>

        <div id="message">
            <div style="padding: 5px;">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Info</strong> Connectez-vous <br> pour pouvoir commencer les exercices!
                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Document</title>
                    </head>

                    <body>

                    </body>

                    </html>
                    <span type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></span>
                </div>
            </div>
        </div>

    <?php
    } ?>
    <main>
        <section class="py-lg-16 pt-4">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row align-items-center">
                    <!-- col -->
                    <div class="col-lg-6 mb-6 mb-lg-0">
                        <div class="">
                            <h1 class="display-3 fw-bold mb-3" style="color: #263238;">
                                <strong style="color: #ff5660;">Canvas 2D </strong>
                            </h1>
                            <!-- para -->
                            <p class="sous-titre mb-5" style="color: #263238;"><strong>Créez</strong>, <strong>innovez</strong>, <strong>laissez votre imagination s'envoler !</strong></p>
                            <!-- btn -->
                            <a href="inscription.php" id="btn1" class="btn btn-primary btn-lg">Créer votre compte</a>
                            <a href="exercices.php" id="btn2" class="btn btn-outline-primary btn-lg">Voir les exercices</a>


                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-6 d-flex justify-content-center">
                        <!-- images -->
                        <img id="img1" src="img/js.svg" />
                    </div>
                </div>
            </div>
        </section>


        <section class="pb-14">
            <div class="container px-4 py-5" id="featured-3">
                <h2 class="pb-2 border-bottom"></h2>
                <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
                    <div class="feature col-md-6 col-lg-3 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                            <img src="img/canavs.png" style="height:2em ; width: 2em" />

                        </div>
                        <h3 class="fs-2">Canvas2D</h3>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                    </div>
                    <div class="feature col-md-6 col-lg-3 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                            <img src="img/js_logo.png" style="height:2em ; width: 2em" />

                        </div>
                        <h3 class="fs-2">JavaScript</h3>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                    </div>
                    <div class="feature col-md-6 col-lg-3 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                            <img src="img/HTML5_logo.png" style="height:2em ; width: 2em" />

                        </div>
                        <h3 class="fs-2">Html</h3>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                    </div>
                    <div class="feature col-md-6 col-lg-3 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center fs-2 mb-3">
                            <img src="img/CSS3_logo.png" style="height:2em ; width: 2em" />


                        </div>
                        <h3 class="fs-2">CSS</h3>
                        <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
                    </div>
                </div>

            </div>
            </div>

        </section>

        <section class="pb-14 " style="background-color: #f7fafb;">
            <h2 class="border-bottom"></h2>

            <div class="row mb-lg-10 mb-5 pt-5">
                <div class="offset-lg-1 col-lg-10 col-12">
                    <div class="row align-items-center">
                        <!-- col -->
                        <div class="col-lg-6 col-md-8">
                            <!-- rating -->
                            <div class="" style="color: #263238;">
                                <!-- heading -->
                                <h2 class="h1">Nos Exercices </h2>
                                <p class="mb-0"> Apprendre la programmation graphique interactive <br> et
                                    l'animation pour le web</p>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-4 text-md-end mt-4 mt-md-0">
                            <!-- btn -->
                            <a href="exercices.php" id="btn1" class="btn btn-primary"> Accéder aux exercices</a>
                        </div>
                    </div>

                </div>

            </div>

            <div class="container px-4 pb-5" id="featured-3">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="cards-wrapper">
                                <div class="card" id="card_carousel">
                                    <img src="img/canelle.png" class="card-img-top" style="height: 260px;" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Exercice de bienvenue : Hello Cannelle</h5>
                                        <a href="exercice1.php" id="btn3" class="btn" style="margin-top: 20px;">Commencer exercice</a>
                                    </div>
                                </div>
                                <div class="card d-none d-md-block " id="card_carousel">
                                    <img src="img/gradiant.png" class="card-img-top" style="height: 260px;" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title" style="padding-bottom: 0px;">Exercice : DataPalette</h5>
                                        <a href="exercice2.php" id="btn3" class="btn" style="margin-top: 20px;">Commencer exercice</a>
                                    </div>
                                </div>
                                <div class="card d-none d-md-block" id="card_carousel">
                                    <img src="img/interaction.gif" class="card-img-top" style="height: 260px; " alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Exercice : Animation de balle interactive</h5>
                                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                                        <a href="exercice3.php" id="btn3" class="btn" style="margin-top: 20px;">Commencer exercice</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="cards-wrapper">
                                <div class="card" id="card_carousel">
                                    <img src="img/paint.png" class="card-img-top" style="height: 260px;">
                                    <div class="card-body">
                                        <h5 class="card-title">Exercice : Application de paint</h5>
                                        <a href="exercice4.php" id="btn3" class="btn" style="margin-top: 20px;">Commencer exercice</a>
                                    </div>
                                </div>
                                <div class="card d-none d-md-block" id="card_carousel">
                                    <center>
                                        <img src="img/exercice5.gif" class="card-img-top " style="height: 260px; max-width:70%">

                                    </center>
                                    <div class="card-body">
                                        <h5 class="card-title">Exercice : Animation de courbes</h5>
                                        <a href="exercice5.php" id="btn3" class="btn" style="margin-top: 20px;">Commencer exercice</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span> </a>
                </div>
            </div>

    </main>

    <button class="btn btn-secondary" onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="bi bi-caret-up-fill" style="color: white;"></i>

    </button>

    <?php
    require('footer.php')
    ?>



    <!--Js-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">
        // Get the button:
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

</body>

</html>