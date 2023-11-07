<?php
session_start();
require_once 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navbar </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <nav class="navbar navbar-expand-sm bg-light  bg-white">
        <div class="container-fluid" style="padding-right: 30px; padding-left: 30px;">
            <a class="navbar-brand" href="index.php"> <img class="image" src="img/Logo_université_montpellier.png" width="50" height="45" class="d-inline-block align-top" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <div class="navbar-nav me-auto">
                    <div class="nav_border">
                        <a class="inscri_link" href="index.php">
                            <span class="mb-0 h3" style="font-family:sans-serif; font-weight: 500;">Canvas2D</span>
                        </a>
                    </div>

                    <?php	$page = $_SERVER['PHP_SELF']; ?>
                    <div class="d-flex" <?php if(strpos($page,'index.php')) echo ' id="active"';?>>
                        <a class="inscri_link" href="index.php" style="padding-left: 20px; padding-top: 5px;">
                            <span class="bi bi-house-fill"></span>
                            <span class="inscription"> Accueil </span>
                        </a>
                    </div>
                    <div class="d-flex">
                        <a class="inscri_link" href="exercices.php" style="padding-left: 20px; padding-top: 5px;" <?php if(strpos($page,'exercices.php')) echo ' id="active"';?>>
                            <span class="bi bi-list"></span>
                            <span class="inscription"> Exercices </span>
                        </a>
                    </div>

                    <div class="d-flex" <?php if(strpos($page,'feedback.php')) echo ' id="active"';?>>
                        <a class="inscri_link" href="feedback.php" style="padding-left: 20px; padding-top: 5px;">
                            <span class="bi bi-wechat"></span>
                            <span class="inscription"> FeedBack </span>
                        </a>
                    </div>

                    <div class="d-flex" <?php if(strpos($page,'a-propos.php')) echo ' id="active"';?>>
                        <a class="inscri_link" href="a-propos.php" style="padding-left: 20px; padding-top: 5px;">
                            <span class="bi bi-info-circle-fill"></span>
                            <span class="inscription"> À propos </span>
                        </a>
                    </div>

                </div>
                <?php
                if (!isset($_SESSION['connecter'])) {
                ?>
                    <div  class="d-flex" <?php if(strpos($page,'inscription.php')) echo ' id="active"';?>>
                        <a href="inscription.php" class="inscri_link">
                            <span class="bi bi-person-circle"></span>
                            <span class="inscription"> S'inscrire</span>
                        </a>
                    </div>
                    <div class="d-flex" <?php if(strpos($page,'login.php')) echo ' id="active"';?>>
                        <a href="login.php" class="inscri_link">
                            <span>Se connecter</span>
                        </a>
                    </div>
                <?php
                } elseif (isset($_SESSION['connecter'])) {
                ?>
                    <div class="d-flex  pb-1 ">
                        <a href="#" class="inscri_link">
                            <span class="bi bi-person-circle" style="color :#ff5660; font-size: x-large; margin-right:23px"><b style="color: #263238; font-family: Inter, sans-serif; font-size:16px"> <?php echo $_SESSION["prenom_nom"]; ?></b></span>
                        </a>
                    </div>
                    <div class="d-flex">
                        <a href="deconnexion.php" class="inscri_link">
                            <span>Se déconnecter</span>
                        </a>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </nav>
    <h2 class="pb-2 border-bottom" style="margin: 0rem 1.5rem;"></h2>

</body>

</html>