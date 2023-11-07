<?php
session_start();
require_once 'config.php'; // ajout connexion bdd 
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['connecter'])) {
  header('Location:index.php?exer_err=erreur');
  die();
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Exercice1</title>

  <link href="style/style1.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script type="text/javascript" src="js/script.js"></script>
</head>

<body>

  <!--HEADER-->
  <?php
  require('sidebar.php')

  ?>
  <!--###################################################################-->
  <!--###################################################################-->

  <!--PARTIE MAIN-->
  <main>

    <section class="intro" id="intro">
      <h3>Exercice de bienvenue : Hello Cannelle</h3>
      <hr>
      <div class="container">
        <img src="img/canelle.png" alt="" class="img-display2">
        <div class="resume">
          <div class="objectif">
            <h3>Objectif</h3>

            <p>
              L’objectif de cet exercice est d’introduire les éléments de base de la programmation graphique en
              JavaScript et de se familiariser avec Canvas 2D, une fonctionnalité native de HTML5 permettant de dessiner des graphiques
              et des éléments visuels directement dans une page web à l'aide de JavaScript.
            </p>
          </div>
          <div class="prerequis">
            <h3>Pré-requis</h3>
            <p>Avoir des connaissances de base en HTML5 et en JavaScript.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="exercice" style="text-align:justify;">
      <div class="expl">
        <p>
          Le canvas 2D fournit un espace de dessin bidimensionnel sur lequel vous pouvez manipuler des pixels, des formes géométriques, des images et des textes.
          Les fonctionnalités du canvas 2D incluent le tracé de lignes, de courbes, de rectangles, de cercles, la manipulation des couleurs, des gradients, des images,
          la gestion des événements liés à la souris et au clavier, ainsi que la transformation des éléments graphiques (translation, rotation, mise à l'échelle, etc.). <br>
          Pour utiliser le canvas 2D, vous devez créer un élément <b>&lt canvas &gt</b> dans votre code HTML et puis utiliser JavaScript pour obtenir le contexte de rendu 2D du canvas.<br>
        </p>
        <p>
          Dans le code suivant nous commençons par créer une page HTML avec un canvas avec un identifiant unique, "<b>Hello-Cannelle-canvas</b>", puis nous lions un fichier JavaScript externe pour manipuler le canvas.
          Le contenu et le comportement du canvas seront définis dans le fichier "<b>canvas.js</b>". Les attributs <b id="Methode">width</b> et <b id="Methode">height</b> définissent respectivement la largeur et la hauteur du canvas en pixels.
        </p>
        <div>
          <img src="images/cannelle/index.png" alt="" class="img-display2">
        </div>
        <p>
          L'étape suivante consiste à récupérer notre canvas par son identifiant pour ensuite obtenir le contexte de rendu 2D associé à celui-ci.
          Pour ce faire, nous utilisons la méthode <b id="Methode">getContext()</b> avec le paramètre "<b>2d</b>" pour indique que nous voulons utiliser le contexte de rendu 2D.<br>
          Ces étapes sont nécessaires afin de pouvoir manipuler et dessiner sur le canvas.
        </p>
        <div>
          <img src="images/cannelle/script.png" alt="" class="img-display2">
        </div>
        <p>
          Le contexte de rendu 2D fournit des méthodes et des propriétés pour dessiner et manipuler des éléments sur le canvas.
          Nous allons voir quelques unes de ces méthodes et propriétés à travers cet exercice consistant à reproduire l'image ci-dessus (<a href="#intro">cliquez ici</a>).
        </p>
      </div>
      <ol>
        <li>
          <div class="tab">
            <div class="question">
              <aside class="bi bi-question-circle-fill" id="aside">
                <p>Dessiner deux lignes perpendiculaires avec canvas</p>
              </aside>

            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                <ul>
                  <li>
                    Nous faisons d'abord appel à la méthode <b id="Methode">context.beginPath()</b>, qui nous permet de commencer un nouveau chemin avant de définir les opérations de dessin suivantes.
                  </li>
                  <li>
                    <b id="Methode">context.strokeStyle</b> permet de définir la couleur de trait du contexte de rendu.
                  </li>
                  <li>
                    <b id="Methode">context.lineWidth</b> permet de définir l'épaisseur de ligne pour les traits dessinés. Dans cet exemple, l'épaisseur de ligne est définie sur 3 pixels.
                  </li>
                  <li>
                    <b id="Methode">context.moveTo()</b> déplace le "stylet" (le pointeur de dessin) vers un nouvel emplacement sans tracer de ligne. Ici le stylet est placé au point (25,220) qui est notre point de départ.
                  </li>
                  <li>
                    <b id="Methode">context.lineTo()</b> ajoute un segment de ligne au chemin de dessin. Ici on trace une ligne droite du point de départ actuel (défini précédemment par moveTo()) aux coordonnées (25, 570) puis de ces dernières aux coordonnées (215, 570).
                  </li>
                  <li>
                    <b id="Methode">context.stroke()</b> effectue le rendu des lignes tracées jusqu'à présent en utilisant la couleur et l'épaisseur de ligne définies.
                  </li>
                </ul>
                </p>
                <div class="imgs">
                  <img src="images/cannelle/linesCode.png" alt="" class="img-display" style="width: 35%;">
                  <img src="images/cannelle/lines.png" class="resulimg" alt="">
                </div>
              </div>
              <button type="button" name="button" class="btn">Afficher la solution</button>
            </div>
          </div>
        </li>

        <li>
          <div class="tab">
            <div class="question">

              <aside class="bi bi-question-circle-fill" id="aside">
                <p>
                  Écrire en JavaScript un code permettant de dessiner les formes géométriques suivantes :<br>
                  - Un rectangle plein en gris placé en haut à gauche <br>
                  - Deux triangles: le premier doit avoir une bordure noire et l'intérieur rempli en gris, le deuxième est coloré en <br>
                  &nbsp&nbsp dégradé de noir et blanc, et ayant une ombre noire.
                </p>
              </aside>

            </div>
            <hr>
            <div class="reponse">
              <div>
                <div class="">
                  <p>
                    Pour dessiner un rectangle plein en gris placé en haut à gauche, il suffit de suivre les étapes suivantes:
                  <ul>
                    <li>
                      Nous commençons un nouveau chemin avec <b id="Methode">context.beginPath()</b>.
                    </li>
                    <li>
                      <b id="Methode">context.fillStyle</b> permet de définir la couleur de remplissage du contexte de rendu.
                    </li>
                    <li>
                      <b id="Methode">context.fillRect</b> permet de dessiner un rectangle rempli aux coordonnées et aux dimensions spécifiées.
                      La méthode fillRect() prend quatre arguments : les deux premiers arguments représentent les coordonnées du coin supérieur gauche du rectangle,
                      et les deux derniers arguments représentent la largeur et la hauteur du rectangle respectivement. Dans cet exemple, le rectangle est dessiné avec
                      un coin supérieur gauche aux coordonnées (20, 20) avec une largeur de 320 pixels et une hauteur de 80 pixels.
                    </li>
                  </ul>
                  </p>
                  <div class="imgs">
                    <img src="images/cannelle/rectangleCode.png" alt="" class="img-display" style="width: 35%;">
                    <img src="images/cannelle/rectangle.png" class="resulimg" alt="">
                  </div>
                </div>
                <div class="">
                  <p>
                    <br> <br>
                    Pour dessiner un triangle avec une bordure noire et l'intérieur rempli en gris:
                  <ul>
                    <li>
                      Nous commençons un nouveau chemin avec <b id="Methode">context.beginPath()</b>.
                    </li>
                    <li>
                      <b id="Methode">context.strokeStyle</b> permet de définir la couleur de la bordure du triangle.
                    </li>
                    <li>
                      Nous définissons la couleur de remplissage du triangle avec <b id="Methode">context.fillStyle</b> .
                    </li>
                    <li>
                      Nous définissons l'épaisseur de la bordure du triangle avec <b id="Methode">context.lineWidth</b>.
                    </li>
                    <li>
                      Nous nous positionnons aux coordonnées(140,20) avec <b id="Methode">context.moveTo()</b>.
                    <li>
                      Puis nous traçons une ligne droite de (140,20) à (22,20) puis de ce dernier aux coordonnées (130,150) avec<b id="Methode">context.lineTo()</b>. Et enfin nous fermons le triangle en reliant le dernier point au point(130,20).
                    </li>
                    <li>
                      <b id="Methode">context.fill()</b> permet de remplir le triangle avec la couleur de remplissage définie précédemment.
                    </li>
                    <li>
                      Nous traçons la bordure du triangle avec la couleur de bordure définie précédemment avec <b id="Methode">context.stroke()</b>.
                    </li>
                    <li>
                      Enfin nous fermons le chemin de dessin actuel avec <b id="Methode">context.closePath()</b>.
                    </li>
                  </ul>
                  </p>
                  <div class="imgs">
                    <img src="images/cannelle/triangle1Code.png" alt="" class="img-display" style="width: 35%;">
                    <img src="images/cannelle/triangle1.png" class="resulimg" alt="">
                  </div>
                </div>
                <div class="">
                  <p>
                    <br> <br>
                    Pour dessiner un triangle coloré en dégradé de noir et de blanc, et ayant une ombre noire:
                  <ul>
                    <li>
                      Nous commençons par créer un dégradé linéaire qui sera utilisé comme couleur de bordure du triangle avec la méthode <b id="Methode">createLinearGradient()</b>.
                      Cette méthode prend quatre arguments, représentant les coordonnées de début et de fin du dégradé linéaire. Dans cet exemple, le dégradé linéaire
                      va du point (300, 0) au point (300, 120). La variable "grd" est utilisée pour stocker le dégradé linéaire.
                    </li>
                    <li>
                      <b id="Methode">grd.addColorStop(0.25, "black")</b> définit un point d'arrêt pour le dégradé linéaire précédemment créé. La méthode <b id="Methode">addColorStop()</b> prend deux arguments :
                      la position du point d'arrêt (un nombre entre 0 et 1, indiquant la position le long du dégradé) et la couleur à cet endroit. Dans cet exemple, à 25% du dégradé linéaire,
                      la couleur est définie sur "black".
                    </li>
                    <li>
                      Nous définissons un autre point d'arrêt pour le dégradé linéaire avec <b id="Methode">grd.addColorStop(0.75, "white")</b>. A 75% du dégradé linéaire, la couleur est définie sur "white".
                    </li>
                    <li>
                      A ce stade nous pouvons commencer le dessin du triangle en suivant le même procédé que pour le dessin du premier triangle à seule différence que nous rajoutons une ombre noir au dessin.
                      Pour ce faire nous utilisons les méthodes suivantes: <br>
                      - <b id="Methode">context.shadowColor</b> spécifie la couleur de l'ombre portée par les formes dessinées. Dans cet exemple, la couleur de l'ombre est définie sur "black".<br>
                      - <b id="Methode">context.shadowBlur</b> spécifie l'étendue du flou de l'ombre. Dans cet exemple, le flou est défini sur 30 pixels.<br>
                      - <b id="Methode">context.shadowOffsetX</b> spécifie la distance horizontale entre la forme dessinée et son ombre. Dans cet exemple, l'ombre est décalée de 5 pixels vers la droite.<br>
                      - <b id="Methode">context.shadowOffsetY</b> spécifie la distance verticale entre la forme dessinée et son ombre. Dans cet exemple, l'ombre est décalée de 5 pixels vers le bas.
                    </li>
                  </ul>
                  </p>
                  <div class="imgs">
                    <img src="images/cannelle/triangle2Code.png" alt="" class="img-display">
                    <img src="images/cannelle/triangle2.png" class="resulimg" alt="">
                  </div>
                </div>
              </div>
              <button type="button" name="button" class="btn">Afficher la solution</button>
            </div>
          </div>
        </li>

        <li>
          <div class="tab">
            <div class="question">
              <aside class="bi bi-question-circle-fill" id="aside">
                <p>Écrire un code JavaScript qui permet de faire une composition de couleurs pour un texte.</p>

              </aside>
            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                <ul>
                  <li>
                    Nous créons un dégradé linéaire en utilisant la méthode <b id="Methode">createLinearGradient()</b> précédemment vue.
                  </li>
                  <li>
                    <b id="Methode">context.font</b> permet de définir la police de caractères pour le texte qui sera dessiné. Dans cet exemple, la police de caractères est définie sur "50px sans-serif".
                  </li>
                  <li>
                    Nous définissons la couleur de remplissage du texte avec le dégradé linéaire créé précédemment, donc la couleur de remplissage sera un dégradé entre les deux points spécifiés.
                  </li>
                  <li>
                    Nous définissons les propriétés de l'ombre portée par le texte avec les méthodes vu dans l'exercice pécedent.
                  </li>
                  <li>
                    Nous définissons l'épaisseur de la ligne utilisée pour le tracé du texte. Dans cet exemple, l'épaisseur de ligne est définie sur 15 pixels.
                  </li>
                  <li>
                    Enfi nous utilisons la méthode <b id="Methode">context.fillText()</b> pour dessiner le texte "Hello Cannelle" sur le canvas aux coordonnées (230, 190). Cette méthode utilise la police de caractères, la couleur de remplissage, l'ombre, et l'épaisseur de ligne définies précédemment.
                  </li>
                </ul>
                </p>
                <div class="imgs">
                  <img src="images/cannelle/textCode.png" alt="" class="img-display2">
                  <img src="images/cannelle/text.png" class="resulimg" alt="">
                </div>
              </div>
              <button type="button" name="button" class="btn">Afficher la solution</button>
            </div>
          </div>
        </li>
        <li>
          <div class="tab">
            <div class="question">
              <aside class="bi bi-question-circle-fill" id="aside">
                <p>Insérer une image dans le canvas.</p>

              </aside>
            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                <ul>
                  <li>
                    Nous créons un nouvel objet Image en utilisant le constructeur <b id="Methode">Image()</b>. Cet objet sera utilisé pour charger et manipuler l'image.
                  </li>
                  <li>
                    Nous définissons la source de l'image en spécifiant le chemin vers le fichier image par cette ligne <b id="Methode">img.src = "bear.jpg";</b>
                  </li>
                  <li>
                    Nous définissons une fonction qui sera exécutée lorsque l'image est complètement chargée. L'événement <b id="Methode">onload</b> est déclenché lorsque l'image est chargée avec succès. À ce moment-là, la fonction anonyme est exécutée.<br>
                    La méthode <b id="Methode">drawImage()</b> du contexte de rendu 2D est utilisée pour dessiner l'image sur le canvas. Les paramètres de cette méthode spécifient l'image à dessiner (img), les coordonnées de l'endroit où l'image doit être
                    dessinée sur le canvas (250, 220), ainsi que la largeur et la hauteur de l'image lorsqu'elle est dessinée (500, 300).
                  </li>
                </ul>
                </p>
                <div class="imgs">
                  <img src="images/cannelle/imgCode.png" alt="" class="img-display">
                  <img src="img/canelle.png" class="resulimg" alt="">
                </div>
              </div>
              <button type="button" name="button" class="btn">Afficher la solution</button>
            </div>
          </div>
        </li>
      </ol>


    </section>
    <div class="pt-5">
      <button type="button" name="button" id="btn4" onclick="downloadZip()"> Télécharger la solution <i class="bi bi-arrow-down"></i></button>
    </div>

  </main>

  <!--###################################################################-->
  <!--###################################################################-->

  <!--PIED DE PAGE-->

  <?php
  require('footer1.html')
  ?>

  <!--Js-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script>
    function downloadZip() {
      // Création d'un élément <a> invisible
      var link = document.createElement('a');
      link.style.display = 'none';

      // Définition de l'URL du fichier ZIP à télécharger
      link.href = 'exercices/Hello-Cannelle.zip';

      // Attribution d'un nom de fichier au lien de téléchargement
      link.download = 'Hello-Cannelle.zip';

      // Ajout de l'élément <a> à la page
      document.body.appendChild(link);

      // Clic automatique sur le lien de téléchargement
      link.click();

      // Suppression de l'élément <a> de la page
      document.body.removeChild(link);
    }
  </script>
</body>

</html>