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
  <title>Exercice3</title>

  <link href="style/style1.css" rel="stylesheet" />

  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

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
      <h3>Exercice : Animation de balle interactive</h3>

      <div class="container">
        <img src="images/trajectory/main.gif" width="400" height="300" alt="">
        <div class="resume">
          <div class="objectif">
            <h3>Objectif</h3>
            <p>
              L’objectif de cet exercice est d’illustrer différentes notions liées à l’animation et à l’interaction.
              Pour cela, nous utiliserons des gestionnaires d'événements prédéfinis pour réagir à différentes actions de
              l'utilisateur
              ou à des événements spécifiques.
            </p>
          </div>
          <div class="prerequis">
            <h3>Pré-requis</h3>
            <p>Avoir des connaissances de base en HTML5 et en JavaScript et connaître les gestionnaires d'événements de
              base disponibles en JavaScript et leur utilisation.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="exercice" style="text-align:justify;">
      <div class="expl">
        <p>
          Pour réaliser cet exercice, nous disposons d’un programme de base que vous pourrez récuprer <a
            href="https://www.lirmm.fr/~mountaz/Ens/Ter/Ico/Animation/src/">ici</a> et contenant un fichier HTML, un
          fichier CSS et deux fichiers Javascript.
          Ces deux derniers représentent les classes <b id="Methode">Animation</b> et <b id="Methode">Displayer</b>.
        </p>
        <p>
          La classe <b id="Methode">Animation</b> permet de créer des
          animations en JavaScript avec un nombre maximum d’étapes et une durée de trame personnalisable.
          Elle contient une méthode "<b id="Methode">run()</b>" pour lancer l’animation et une méthode "<b
            id="Methode">animate()</b>" qui est appelée à chaque trame
          pour mettre à jour l’état de l’animation en fonction du temps écoulé. Elle utilise aussi les fonctions "<b
            id="Methode">requestAnimationFrame()</b> et "<b id="Methode">cancelAnimationFrame()</b>":
          la première permet de créer une boucle d'animation continue et la seconde permet d'annuler l'exécution d'une
          animation planifiée précédemment.
        </p>
        <p>
          Quant à la classe <b id="Methode">Displayer</b>, elle est responsable du rendu graphique sur le canvas. Elle
          contient une classe <b id="Methode">Ball</b> pour créer des balles et
          des méthodes pour dessiner des formes et des lignes. Elle a également des attributs statiques définissant les
          couleurs pour les éléments à dessiner.

        </p>
      </div>
      <ol>
        <li>
          <div class="tab">
            <div class="question">
              <aside class="bi bi-question-circle-fill" id="aside">

                <p>Tracer une courbe pour représenter une trajectoire qu’une balle pourra suivre. Ecrire un gestionnaire
                  d’évènements qui permette
                  à l’utilisateur de réaliser le tracé dans le même canvas. Le tracé commence lorsque l’utilisateur
                  clique avec le bouton gauche puis
                  déplace la souris en maintenant la pression sur le bouton et se termine lorsque l’utilisateur relâche
                  le bouton. Les points de la
                  courbe sont stockés dans un tableau.</p>
            </div>
            </aside>
            <hr>
            <div class="reponse">
              <div>
                <p>
                  Pour commencer nous rajoutons un bouton au code HTML afin de fournir une interaction utilisateur
                  permettant de déclencher, au clic, le dessin sur le canvas.
                </p>
                <div class="imgs">
                  <img src="images/trajectory/boutonCode.png" class="img-display2" alt="">
                </div>
                <div class="imgs">
                  <img src="images/trajectory/bouton.png" class="img-display2" alt="">
                </div>
                <p>
                  Nous pouvons à présent configurer le bouton pour exécuter une série d'actions liées au dessin sur le
                  canvas lorsque le bouton est cliqué. Il utilise les écouteurs
                  d'événements (<b id="Methode">mousedown</b>, <b id="Methode">mousemove</b>, <b
                    id="Methode">mouseup</b> et <b id="Methode">mouseleave</b>) pour détecter les actions de la souris
                  et effectue le dessin correspondant en utilisant un
                  tableau pour stocker les coordonnées de chaque mouvement de souris. Ces dernières sont ensuite utliser
                  pour dessiner une ligne continue sur le canvas avec la méthode <b id="Methode">drawLine()</b> du
                  Displayer.
                </p>
                <div class="imgs">
                  <img src="images/trajectory/draw1.png" class="img-display2" alt="">
                </div>
                <div class="imgs">
                  <img src="images/trajectory/draw2.png" alt="" class="img-display2">
                </div>
                <div class="imgs">
                  <img src="images/trajectory/draw3.png" alt="" class="img-display2">
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
                  Calculer le framerate (nombre d’affichages par seconde) en continu. Afficher (mettre à jour) ce
                  framerate dans le document HTML ou dans le canvas.
                </p>
                <aside>
            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                  Nous commençons par rajouter ces deux lignes de code dans notre fichier HTML, en dessous de notre
                  canvas:
                </p>
                <div class="imgs">
                  <img src="images/trajectory/timeCode.png" alt="">
                </div>
                <p>
                  Nous pouvons à présent récupère l'élément HTML ayant l'identifiant "info" et le stocker dans la
                  variable info, permettant ainsi de le manipuler dans la suite.
                </p>
                <div class="imgs">
                  <img src="images/trajectory/info.png" class="img-display2" alt="">
                </div>
                <p>
                  De plus nous modifions notre fonction pour le dessin de la trajectoire en rajoutant trois
                  variables:<br>
                  &nbsp;&nbsp;- <b id="Methode">oldTime</b> pour mesure le temps écoulé depuis le dernier mouvement de
                  la souris,<br>
                  &nbsp;&nbsp;- <b id="Methode">oldTimeSum</b> pour mesurer la somme de tous les écarts de temps entre
                  les mouvements de la souris <br>
                  &nbsp;&nbsp;- et <b id="Methode">oldTime</b> pour mesurer la moyenne des temps entre les mouvements de
                  la souris.
                </p>
                <div class="imgs">
                  <img src="images/trajectory/variables.png" class="img-display2" alt="">
                </div>
                <p>
                  Lorsque l'utilisateur appuie sur un bouton de la souris sur le canvas, le moment où le bouton a été
                  enfoncé est enrégistré dans la variable oldTime, et puis la variable oldTimeSum est initialisée à 0
                  pour le calcul ultérieur de la durée moyenne entre les mouvements de la souris.
                </p>
                <div class="imgs">
                  <img src="images/trajectory/initialisation.png" class="img-display2" alt="">
                </div>
                <p>
                  Et lorsque l'utilisateur dessine sur le canvas, en plus d'enregistrer les mouvements de la souris
                  pendant le dessin,
                <ul>
                  <li>Nous calculons la différence de temps en millisecondes entre le moment actuel (utilisant <b
                      id="Methode">Date.now()</b>) et la valeur précédente de <b>oldTime</b> et nous l'attribuons à la
                    varialbe <b id="Methode">delta</b></li>
                  <li>Ensuite nous mettons à jour la variable <b id="Methode">oldTime</b> avec la valeur actuelle de <b
                      id="Methode">Date.now()</b>, pour être utilisée lors du prochain mouvement de la souris.</li>
                  <li>Puis nous ajoutons la différence de temps <b id="Methode">delta</b> à <b
                      id="Methode">oldTimeSum</b>, qui est une variable accumulant la somme de tous les écarts de temps
                    entre les mouvements de la souris.</li>
                  <li>Nous calculons la moyenne des temps entre les mouvements de la souris en divisant <b
                      id="Methode">oldTimeSum</b> par la longueur du tableau.</li>
                  <li>Le contenu de l'élément HTML référencé par <b>info</b> est mis à jour pour afficher les nouvelles mesures.</li>
                </ul>
                </p>
                <div class="imgs">
                  <img src="images\trajectory\drawModif.png"  width="600" height="450"alt="">
                </div>
                <p>
                  Au final, nous obtenons une fonction qui enregistre les mouvements de la souris pendant le dessin,
                  mesure les écarts de temps entre les mouvements successifs,
                  calcule la moyenne des temps et met à jour le contenu de l'élément HTML (info) pour afficher ces
                  informations. Elle dessine également les lignes correspondantes
                  sur le canvas au fur et à mesure qu'on se déplace sur le canvas.
                </p>
                <div class="imgs">
                  <img src="images/trajectory/time.png" class="img-display2" alt="">
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
                  Ecrire une deuxième animation dans laquelle la balle suit la trajectoire tracée par l’utilisateur. Il
                  est peu probable que le nombre des points de la courbe tracée par l’utilisateur correspondent
                  spontanément
                  au nombre de positions différentes nécessaires pour l’animation. On peut ré-échantilloner les points
                  définissant
                  la courbe pour ajuster.
                </p>
              </aside>

            </div>
            <hr>
            <div class="reponse">
              <div>
                <p>
                Nous reconfigurons l'écouteur d'événement qui se déclenche lorsque le bouton de la souris est relâché. Pour cela,
                    nous créons une instance de la classe Animation avec comme paramètrs, le nombre d'éléments du tableau <b>tab</b> et une vitesse d'animation de 15.
                     Ensuite, nous définissons la méthode <b id="Methode">nextStep</b> de cette instance pour effectuer les actions suivantes:<br>
                     &nbsp;&nbsp; - Tout d'abord nous effaçons tout le canvas pour ensuite redessiner la trajectoire à l'aide des coordonnées <br>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; déjà stockées dans le tableau <b>tab</b>.<br>
                     &nbsp;&nbsp; - Puis les coordonnées <b>x</b> et <b>y</b> de la balle sont mises à jour avec les coordonnées correspondantes de <br>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b id="Methode">tab[anim.step]</b>.<br>
                     &nbsp;&nbsp; - Et enfin nous redessinons la balle à sa nouvelle position.<br>
                     Par la suite, la méthode <b id="Methode">run()</b> est appelée pour démarrer l'animation et cele-ci va exécuter <b id="Methode">nextStep</b> toutes les 15 unités de temps.
                </p>
                <div class="imgs">
                    <img src="images/trajectory/anim.png" alt="">
                  </div>
                  <div class="imgs">
                    <img src="images/trajectory/main.gif" width="600" height="450" alt="">
                  </div>
              </div>
              <button type="button" name="button" class="btn">Afficher la solution</button>
            </div>
          </div>
        </li>
      </ol>
      <div class="pt-5">
        <button type="button" name="button" id="btn4" onclick="downloadZip()"> Télécharger la solution <i
            class="bi bi-arrow-down"></i></button>
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
    link.href = 'exercices/ExerciceAnimation_Wael.zip';

    // Attribution d'un nom de fichier au lien de téléchargement
    link.download = 'ExerciceBalleIneractive.zip';

    // Ajout de l'élément <a> à la page
    document.body.appendChild(link);

    // Clic automatique sur le lien de téléchargement
    link.click();

    // Suppression de l'élément <a> de la page
    document.body.removeChild(link);
  }
</script>

</html>