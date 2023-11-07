<!doctype html>
<html lang="en">

<head>
    <!-- Main css -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FeedBack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">

</head>


<body class="d-flex flex-column">
    <?php
    require('navbar.php')

    ?>
    <main class="flex-shrink-0">
        <!-- Page content-->
        <section class="py-5">
            <div class="container px-5">
                <!-- Contact form-->
                <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                    <div class="text-center mb-5">
                        <div class="bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3" id="featureIcon"><i class="bi bi-envelope"></i></div>
                        <h1 class="fw-bolder" style="color: #263238;">Votre feedback est précieux pour nous !</h1>
                        <p class="lead fw-normal text-muted mb-0">Veuillez prendre quelques instants pour nous faire part de votre expérience et nous aider à améliorer nos services</p>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <?php
                            if (isset($_GET['feed_err'])) {
                                $err = htmlspecialchars($_GET['feed_err']);

                                switch ($err) {
                                    case 'success':
                            ?>

                                        <div id="message">
                                            <div style="padding: 5px;">
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>Succès</strong> <br> Votre FeedBack a été envoyée avec succès!
                                                    <span type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                        break;
                                    case 'email':

                                    ?>

                                        <div id="message">
                                            <div style="padding: 5px;">
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Erreur</strong> email non valide
                                                    <span type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                        break;
                                    case 'empty':
                                    ?>

                                        <div id="message">
                                            <div style="padding: 5px;">
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Erreur</strong> Veuillez remplir tous les champs
                                                    <span type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></span>
                                                </div>
                                            </div>
                                        </div>

                            <?php
                                }
                            }
                            ?> <form id="contactForm" data-sb-form-api-token="API_TOKEN" action="contact.php" method="POST">
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nom" name="nom" type="text" placeholder="Ecrire votre nom ici..." data-sb-validations="required" />
                                    <label for="nom">Votre Nom</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input class="form-control" id="prenom" name="prenom" type="text" placeholder="Ecrire votre prénom ici..." data-sb-validations="required" />
                                    <label for="nom">Votre Prénom</label>
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="nom@exemple.com" data-sb-validations="required,email" />
                                    <label for="email">Adresse Email </label>

                                </div>
                                <!-- Message input-->
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" id="" type="text" name="message" placeholder="Ecrire votre message ici..." style="height: 10rem" data-sb-validations="required"></textarea>
                                    <label for="message">Votre Message</label>
                                </div>

                                <!-- Submit Button-->
                                <div class="d-grid"><button class="btn btn-lg" id="submitButton" type="submit">Envoyer</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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


        document.addEventListener('DOMContentLoaded', () => {
            $('.alert').alert();
        });

        $(document).ready(function() {

            window.setTimeout(function() {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                    $(this).remove();
                });
            }, 3000);

        });
    </script>

</body>

</html>