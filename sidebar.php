<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>footer </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <header class="d-flex flex-nowrap">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
            <div class="logo">

                <a href="index.php"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <img src="img/logo_v2.png" alt="">
                </a>
            </div>
            <hr style="color: white;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">

                        <i class="bi bi-grid"></i>
                        Exercices
                    </a>
                </li>
                <li>
                    <?php $page = $_SERVER['PHP_SELF']; ?>

                    <a href="exercice1.php" class="inscri_link" <?php if (strpos($page, 'exercice1.php'))
                        echo ' id="active1"'; ?>>
                        <i class="bi bi-record2"></i>
                        Exercice de bienvenue : <br>
                        &nbsp; &nbsp; &nbsp;Hello Cannelle

                    </a>
                </li>
                <li>
                    <a href="exercice2.php" class="inscri_link" <?php if (strpos($page, 'exercice2.php'))
                        echo ' id="active1"'; ?>>
                        <i class="bi bi-record2"></i>
                        DataPalette
                    </a>
                </li>
                <li>
                    <a href="exercice3.php" class="inscri_link" <?php if (strpos($page, 'exercice3.php'))
                        echo ' id="active1"'; ?>>
                        <i class="bi bi-record2"></i>
                        Animation de balle <br> &nbsp; &nbsp; interactive
                    </a>
                </li>
                <li>
                    <a href="exercice4.php" class="inscri_link" <?php if (strpos($page, 'exercice4.php'))
                        echo ' id="active1"'; ?>>
                        <i class="bi bi-record2"></i>
                        Application de paint
                    </a>
                </li>
                <li>
                    <a href="exercice5.php" class="inscri_link" <?php if (strpos($page, 'exercice5.php'))
                        echo ' id="active1"'; ?>>
                        <i class="bi bi-record2"></i>
                        Animation de courbes </a>
                </li>

            </ul>
            <hr style="color: white;">
            <?php
            if (isset($_SESSION['connecter'])) {
                ?>
                <div class="d-flex  pb-1 ">
                    <a href="#" class="inscri_link">
                        <span class="bi bi-person-circle" style="color :#4bc2bc; font-size: x-large;"><b
                                style="color: white; font-family: Inter, sans-serif; font-size:16px; padding-left:5px">
                                <?php echo $_SESSION["prenom_nom"]; ?>
                            </b><a href="deconnexion.php" class="inscri_link" style="padding-left: 70px;">
                                <i class="bi bi-power" style="color :#4bc2bc; font-size: x-large;"></i>
                            </a></span>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </header>

    <!--Js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</body>

</html>