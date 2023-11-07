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
  <title>Exercice2</title>

  <link href="style/style1.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
      <h3>Exercice : DataPalette</h3>

      <div class="container">
        <img src="images/ballon/main.png" width="400" height="300" alt="">
        <div class="resume">
          <div class="objectif">
            <h3>Objectif</h3>
            <p>
              L’objectif de cet exercice est d'utiliser les fonctions du context graphique afin de créer des objets graphiques et de les affichager dans le contexte graphique.
            </p>
          </div>
          <div class="prerequis">
            <h3>Pré-requis</h3>
            <p>Avoir des connaissances de base en HTML5 et en JavaScript et connaître le format de données JSON.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="exercice" style="text-align:justify;">
      <div class="expl">
        <p>
          Pour cet exercice nous partons d'une structure de données que vous pouvez récupérer <a href="https://www.lirmm.fr/~mountaz/Ens/Ihm/Tp/Balloons/data.json">ici</a>.
        </p>
        <p>
          Le but de cet exercice est de manipuler des données brutes fournies au format JSON afin de les transformer
          en données graphiques. Cet exercice s’inspire notamment du concept de visualisation de données de David McCandless (<a href="https://www.ted.com/talks/david_mccandless_the_beauty_of_data_visualization">cliquez ici pour plus de détails</a>).
        </p>
      </div>
      <ol>
        <li>
          <div class="tab">
            <div class="question">
              <aside class="bi bi-question-circle-fill" id="aside">
                <p>Écrire en javascript une structure de données qui permet de représenter des bulles avec :<br>
                  - un constructeur qui crée des bulles à partir des paramètres donnés : x, y, r (rayon) et c (couleur) <br>
                  - une méthode qui permet d’afficher les bulles.</p>
              </aside>

            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                  Nous définissons une fonction constructeur appelée "<b id="Methode">Bubble</b>" qui est utilisée pour créer des objets de type "Bulle".
                  Les paramètres de la fonction constructeur sont les suivants :
                <ul>
                  <li>x: La coordonnée x de la bulle.</li>
                  <li>y: La coordonnée y de la bulle.</li>
                  <li>r: Le rayon de la bulle.</li>
                  <li>color: La couleur de la bulle (optionnel). Si aucune couleur n'est spécifiée, la valeur par défaut sera null.</li>
                </ul>
                <p>
                  La fonction constructeur assigne les valeurs des paramètres aux propriétés correspondantes de l'objet "Bulle" créé. Par exemple, this.x = x; assigne la valeur de x à la propriété x de l'objet.
                </p>
                </p>
                <div class="imgs">
                  <img src="images/ballon/bulleCons.png" alt="">
                </div>
                <p>
                  Nous ajoutons une méthode <b id="Methode">draw</b> à l'objet <b>prototype</b> de la fonction constructeur Bubble. Cette méthode est utilisée pour dessiner la bulle sur un contexte graphique de canvas.
                  prend un argument <b id="Methode">ctx</b>, qui représente le contexte graphique du canvas sur lequel la bulle sera dessinée. <br>
                  Voici ce que fait la méthode <b id="Methode">draw</b> :
                <ul>
                  <li>Elle définit d'abord la couleur de remplissage du contexte graphique à la couleur spécifiée dans la propriété color de l'objet Bubble. Cette couleur sera utilisée pour remplir la bulle.</li>
                  <li>Elle démarre ensuite un nouveau tracé en préparation pour dessiner la bulle.</li>
                  <li>Puis elle dessine un arc circulaire pour représenter la bulle avec la méthode <b id="Methode">ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI, true)</b>.
                    Les paramètres spécifiés sont les suivants :<br>
                    &nbsp; &nbsp;- this.x, this.y : les coordonnées du centre de la bulle <br>
                    &nbsp; &nbsp;- this.r : le rayon de la bulle <br>
                    &nbsp; &nbsp;- 0 : L'angle de départ de l'arc en radians (0 correspond à l'angle horizontal à droite) <br>
                    &nbsp; &nbsp;- 2 * Math.PI : l'angle final de l'arc en radians (correspondant à un cercle complet) <br>
                    &nbsp; &nbsp;- true : indique que le sens de l'arc est dans le sens des aiguilles d'une montre.</li>
                  <li>Enfin elle remplit la forme dessinée (la bulle) avec la couleur de remplissage définie précédemment.</li>
                </ul>
                </p>
                <div class="imgs">
                  <img src="images/ballon/draw.png" alt="">
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
                <p>Importer le fichier de données data.json pour créer un ensemble de bulles à partir des données
                  x, y et r, et en choisissant la même couleur, dans un premier temps, pour tous les ballons.
                </p>
              </aside>

            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                  Pour importer le fichier data.json nous choisissons de copier l'ensemble des données dans un fichier <b id="Methode">data.js</b> et attribuons la variable <b id="Methode">data</b> à ses données. Ensuite nous lions le fichier data.js à notre page html par la ligne suivante:
                </p>
                <div class="imgs">
                  <img src="images/ballon/json.png" alt="">
                </div>
                <p>Nous aurions pu aussi importer le fichier en remplaçant tout simplement l'attribut <b id="Methode">src</b> du script par "<b id="Methode">data.json</b>".</p>
              </div>
              <button type="button" name="button" class="btn">Afficher la solution</button>
            </div>
          </div>
        </li>

        <li>
          <div class="tab">
            <div class="question">
              <aside class="bi bi-question-circle-fill" id="aside">
                <p>Compter le nombre de valeurs différentes qui se trouvent dans les données Data.json pour l’attribut "attribute".</p>
              </aside>
            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                  Nous définissons la fonction <b id="Methode">countValues</b> prend deux paramètres : "data" qui est un tableau d'objets et "attribute" qui est un caractère représentant un attribut des objets dans le tableau.
                  La fonction compte le nombre de valeurs uniques pour l'attribut spécifié dans le tableau d'objets et renvoie ce nombre.<br>
                  Voici ce que fait la fonction:
                <ul>
                  <li>
                    <b id="Methode">const map = new Map()</b>: crée une nouvelle instance de <b id="Methode">Map</b>, qui sera utilisée pour stocker les valeurs uniques de l'attribut
                  </li>
                  <li>Nous initialisons un compteur à zéro puis faisons un parcourt du tableau data pour vérifie si, pour chaque élément <b>val</b> du tableau, la propriété <b>v</b> correspond à l'attribut spécifié et si la valeur correspondante <b id="Methode">val[v]</b> n'est pas déjà présente dans la Map.
                    Si ces conditions sont satisfaites, cela signifie que nous avons trouvé une nouvelle valeur unique pour l'attribut spécifié. Dans ce cas on incrémente notre compteur et on ajoute la valeur unique à la Map, en utilisant le compteur comme clé et la valeur <b>val[v]</b> comme valeur associée.</li>
                  <li>Le nombre de valeurs uniques trouvées correspond à la taille de la Map.</li>
                </ul>
                </p>
                <div class="imgs">
                  <img src="images/ballon/count.png" alt="">
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
                <p><strong style="font-weight: revert">Coloration "locale":</strong><br>
                  - <u>Modèle RGB</u>: créer une méthode javascript qui génère une première palette de couleurs en utilisant une
                  stratégie simple (répandue &nbsp; &nbsp; mais peu recommandée) : faire varier une des composantes rgb en gardant les deux autres fixes (par exemple, on peut garder r à 64,&nbsp; &nbsp; b à 128 et faire varier v).<br>
                  - <u>Modèle HSLA</u>: créer une méthode javascript qui génère une deuxième palette de couleurs en utilisant lemodèle hsla pour faire varier &nbsp; &nbsp; l’une des composantes (la teinte, la saturation, la brillance ou la transparence), tout en gardant les trois autres composantes fixes.<br>
                  - <u>Composition de plusieurs couleurs par ballon</u>: créer une troisième palette de couleur dans laquelle la couleur d'un ballon <br> &nbsp; est composée d'un dégradé de p couleurs. Pour simplifier, vous pouvez faire l'exercice avec p = 2 et un calcul du dégradé par <br>&nbsp; la méthode de gradient linéaire du canvas (createLinearGradient).<br>
                  - <u>Dégradés monochromes de couleurs</u>: créer une quatrième palette de couleurs qui donne un effet de dégradé sur la couleur<br> &nbsp; d'un ballon en jouant sur la luminosité ou la saturation et en utilisant un dégradé radial ou un dégradé linéaire (createLinearGradient).
                </p>
              </aside>

            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>Tout d'abord définissons la fonction suivante qui nous permet d'effectuer des opérations de dessin en utilisant les données fournies
                  et qui fait appelle à la méthode <b>draw()</b> de l'objet Bubble:</p>
                <p>
                <div class="imgs">
                  <img src="images/ballon/generator.png" alt="">
                </div>
                <p>Cette fonction calcule les tailles d'unité sur les axes x et y en fonction du nombre de valeurs uniques des attributs 'x' et 'y' dans les données, puis parcourt les données pour créer et dessiner des bulles sur le canvas
                  en utilisant les coordonnées ajustées et les autres propriétés des éléments dans data. <br>
                  La methode <b id="Methode">createColors()</b> permet de générer les palettes de couleurs et sera à définir en fonction des méthodes de génération utilisées.</p>
                <p>
                  - Pour générer une palette de couleur avec le modèle RGB, nous définissons la fonction <b id="Methode">createColors()</b> qui prend en paramètre un entier <b>n</b> et qui renvoie un tableau de couleurs
                  une fois que le tableau est complètement rempli. Nous fixons les composantes rouge et bleue, tandis que la composante verte varie en fonction de l'index i et du nombre de valeurs uniques pour l'attribut 'c' dans les données.
                </p>
                <div class="imgs">
                  <img src="images/ballon/rgbCode.png" width="500" height="300" alt="">
                  <img src="images/ballon/rgb.png" width="400" height="300" class="resulimg" alt="">
                </div>
                <p>
                  - Pour générer une palette de couleur avec le modèle HSLA, nous définissons la fonction <b id="Methode">generateHslaColors()</b> qui utilise le modèle de couleur <b id="Methode">HSLA(teinte, saturation, luminosité, alpha)</b>, et où la teinte varie en fonction de l'index i et du nombre de valeurs uniques pour l'attribut 'c' dans les données,
                  tandis que la saturation, la luminosité et l'alpha sont des valeurs constantes.
                </p>
                <div class="imgs">
                  <img src="images/ballon/hslaCode.png" width="510" height="345" alt="">
                  <img src="images/ballon/main.png" width="400" height="300" class="resulimg" alt="">
                </div>
                <p>
                  - Pour faire un dégradé linéaire de 2 couleurs sur les bulles, nous définissons une méthode étendue du prototype de l'objet Bubble que l'on nomme <b id="Methode">drawGradientLinear()</b>.
                  Tout comme la méthode <b id="Methode">draw()</b>, cette méthode dessine un cercle mais avec un remplissage dégradé linéaire, où la couleur varie du blanc à la couleur spécifiée pour l'objet Bubble. <br>
                  Cette dernière couleur est générée en utilisant la méthode <b id="Methode">generateHslaColors()</b>. <br>
                  Le dégradé linéaire est créé à partir des coordonnées du cercle et de son rayon, et les points d'arrêt du dégradé définissent les couleurs à utiliser.
                </p>
                <div class="imgs">
                  <img src="images/ballon/linearCode.png" width="500" height="300" alt="">
                  <img src="images/ballon/linear.png" width="400" height="300" class="resulimg" alt="">
                </div>
                <p>
                  - De la même manière que pour le dégradé linéaire, nous définissons la méthode <b id="Methode">drawGradientRadial()</b> pour faire un dégradé radial de 2 couleurs sur les bulles.
                </p>
                <div class="imgs">
                  <img src="images/ballon/radialCode.png" width="500" height="300" alt="">
                  <img src="images/ballon/radial.png" width="400" height="300" class="resulimg" alt="">
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
                <p><strong style="font-weight: revert">Coloration "globale":</strong><br>
                  - Mettre en œuvre une coloration qui renforce les attributs de position. Cette méthode consiste à utiliser des
                  dégradés définis sur tout<br>&nbsp;&nbsp;le canvas. Avec un gradient linéaire comme celui produit par la méthode
                  createLinearGradient configuré pour tout le canvas.<br>&nbsp;&nbsp;On obtient alors un effet de renforcement
                  de la représentation de l’axe des x et/ou de l’axe des y.
                </p>
              </aside>

            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                  Pour renforcer la repésentation sur l'axe des x (horizontal), nous définissons la méthode <b id="Methode">gobalGradientLinear()</b> qui
                  crée une palette de couleurs en utilisant un dégradé linéaire allant du vert au blanc. Le nombre de couleurs dans la palette est déterminé par le paramètre n.
                  Cette méthode crée un dégradé linéaire en utilisant les coordonnées (100, 0) comme point de départ du dégradé et les coordonnées (canvas.width, 0) comme point d'arrivée du dégradé.
                  Ce dégradé s'étend horizontalement.
                </p>
                <div class="imgs">
                  <img src="images/ballon/globalCode.png" width="500" height="310" alt="">
                  <img src="images/ballon/global.png" width="400" height="300" class="resulimg" alt="">
                </div>
              </div>
              <button type="button" name="button" class="btn">Afficher la solution</button>
            </div>
          </div>
        </li>
      </ol>
      <div class="pt-5">
        <button type="button" name="button" id="btn4" onclick="downloadZip()"> Télécharger la solution <i class="bi bi-arrow-down"></i></button>
      </div>
    </section>
  </main>

  <!--###################################################################-->
  <!--###################################################################-->

  <!--PIED DE PAGE-->

  <?php
  require('footer1.html')
  ?>
</body>

<script>
  function downloadZip() {
    // Création d'un élément <a> invisible
    var link = document.createElement('a');
    link.style.display = 'none';

    // Définition de l'URL du fichier ZIP à télécharger
    link.href = 'exercices/ExerciceBallon.zip';

    // Attribution d'un nom de fichier au lien de téléchargement
    link.download = 'ExerciceBalles.zip';

    // Ajout de l'élément <a> à la page
    document.body.appendChild(link);

    // Clic automatique sur le lien de téléchargement
    link.click();

    // Suppression de l'élément <a> de la page
    document.body.removeChild(link);
  }
</script>

</html>