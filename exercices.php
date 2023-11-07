<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercices</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">


</head>

<body>
  <?php
  require('navbar.php')
  ?>
  <?php
  if (isset($_GET['exercice_err'])) {
    $err = htmlspecialchars($_GET['exercice_err']);
    switch ($err) {
      case 'erreur':
  ?>
        <div id="message">
          <div style="padding: 5px;">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Erreur</strong> Vous devez connecter pour commencer les exercices !
              <span type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></span>
            </div>
          </div>
        </div>
  <?php
    }
  }
  ?>

  <main class="">

    <div class="p-4 p-md-5 mb-4" style="background-color: #4bc2bc;">
      <div class="row">
        <div class="col-6 px-0 text-white">
          <h1 class="display-4"><strong>Le guide ultime d'HTML5 Canvas</strong> </h1>
          <p class="lead my-3">Explorez la puissance de Canvas avec des exercices interactifs.</p>
          <p class="lead mb-3 text-white fw-bold">Créez des dessins avancés, des animations dynamiques et des applications web percutantes en utilisant HTML5 Canvas et JavaScript.</p>
          <div class="row">
            <div class="col">
              <span style="color: #263238"><i class="bi bi-globe"></i> Français</span> <span style="padding-left: 10px; color: #263238"><i class="bi bi-bar-chart-fill"></i> Moyenne</span>

            </div>

          </div>
        </div>
        <div class="col-6 px-0  d-flex justify-content-center">
          <img  class="img-thumbnail" src="img/HTML5-Canvas-Ultimate-Guide-Learn-HTML5-Canvas-removebg.png" />

        </div>
      </div>

    </div>
    <!-- col -->
    <div class="container">
      <div class="row g-5">
        <div class="col-md-8">
          <div class=" g-0 border  overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <h3 class="title mb-3">Ce que vous apprendrez</h3>
              <ul class="list_ex">
                <li id="li-ex"><i class="bi bi-check-lg" id="bi-check-lg"></i>Bases d’apprentissage de HTML5 Canvas</li>
                <li id="li-ex"><i class="bi bi-check-lg" id="bi-check-lg"></i>Animations et interraction avec l'API Canvas</li>
                <li id="li-ex"><i class="bi bi-check-lg" id="bi-check-lg"></i>Capable de créer des applications HTML5 <br> &nbsp; &nbsp; &nbsp; avec Canvas</li>
                <li id="li-ex"><i class="bi bi-check-lg" id="bi-check-lg"></i>Compétences avancées en dessin sur Canvas</li>
                <li id="li-ex"><i class="bi bi-check-lg" id="bi-check-lg"></i>Afficher les données sur Canvas</li>
                <li id="li-ex"><i class="bi bi-check-lg" id="bi-check-lg"></i>Compréhension claire et solide de Canvas</li>

              </ul>
            </div>
          </div>

          <div class="blog-post">
            <h3 class="title mb-1">Nos Exercices</h3>
            <p class="blog-post-meta">5 exercices • Durée totale: 84 heures</p>
            <div class="tree">
              <div class="tree-item is-root border flex-md-row  shadow-sm">
                <span class="tree-item__title"> <i class="bi bi-chevron-up" id="bi1"></i>Exercice de bienvenue : Hello Cannelle</span>
                <a href="exercice1.php" class="tree-item__link">Commencer l'exercice<i class="bi bi-chevron-right p-2" style="font-size: 14px;"></i></a>
                <div class="reponse">
                  <div>
                    <div class="tree-item__body">
                      <p>Cet exercice introduit la programmation graphique interactive sur le web en utilisant le canvas 2D. Les apprenants manipuleront des formes, des couleurs, du texte et des images, acquérant ainsi une solide compréhension des fonctionnalités offertes par le canvas 2D. En reproduisant un modèle, ils se familiariseront avec le processus de création graphique, utilisant des méthodes de dessin et des attributs de style.</p>
                    </div>
                    <div class="mb-1"><i class="bi bi-exclamation-circle-fill" id="bi-c"></i> <span id="Meth_Utile">Méthodes utilisées :</span>
                      <span id="Methode"><a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/getContext" class="link">getContext("2d")</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/beginPath" class="link">beginPath() </a></span>,
                      <span id="Methode"><a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/moveTo" class="link">moveTo()</a></span>,
                      <span id="Methode"><a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/lineTo" class="link">lineTo() </a></span> et
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/drawImage" class="link">drawImage()</a></span> etc.
                    </div>
                  </div>
                </div>

                <a href="#" class="tree-item__icon">
                  <img src="img/one.gif" alt="HTML" style="width: 75px;height: 75px;">
                </a>
              </div>
              <div class="tree-link"></div>
              <div class="tree-item is-root border flex-md-row shadow-sm">
                <span class="tree-item__title"> <i class="bi bi-chevron-up" id="bi1"></i> Exercice : DataPalette</span>

                <a href="exercice2.php" class="tree-item__link">Commencer l'exercice<i class="bi bi-chevron-right p-2" style="font-size: 14px;"></i></a>

                <div class="reponse">
                  <div>
                    <div class="tree-item__body">Cet exercice vous permettra d'améliorer vos compétences en programmation JavaScript en pratiquant la création et la manipulation de structures de données à partir d'un fichier JSON. Vous découvrirez comment gérer les couleurs dans la représentation graphique de données et utiliser une hashmap pour compter les occurrences des valeurs. De plus, vous apprendrez à contrôler les coordonnées du canvas afin de positionner vos éléments graphiques selon vos préférences. En vous inspirant de l'approche visuelle de David McCandless, vous serez en mesure de transformer des données brutes en visualisations percutantes. Explorez les multiples possibilités offertes par le Canvas pour créer des visualisations interactives et expressives.</div>
                    <div class="mb-1"><i class="bi bi-exclamation-circle-fill" id="bi-c"></i> <span id="Meth_Utile">Méthodes utilisées :</span>
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/createLinearGradient" class="link">createLinearGradient(x0, y0, x1, y1)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/arc" class="link">arc(x, y, radius, startAngle, endAngle)</a></span> et
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasGradient/addColorStop" class="link">addColorStop(offset, color)</a></span> etc.
                    </div>
                  </div>
                </div>
                <a href="#" class="tree-item__icon">
                  <img src="img/two.gif" alt="HTML" style="width: 75px;height: 75px;">
                </a>
              </div>
              <div class="tree-link"></div>
              <div class="tree-item is-root border flex-md-row shadow-sm">
                <span class="tree-item__title"> <i class="bi bi-chevron-up" id="bi1"></i>Exercice : Animation de balle interactive </span>
                <a href="exercice3.php" class="tree-item__link">Commencer l'exercice<i class="bi bi-chevron-right p-2" style="font-size: 14px;"></i></a>
                <div class="reponse">
                  <div>
                    <div class="tree-item__body">
                      <p>L'objectif de cet exercice est de vous familiariser avec l'animation et l'interaction en utilisant JavaScript et la technologie Canvas HTML5. Vous apprendrez à créer des mouvements fluides et des effets visuels dynamiques sur un canvas en mettant à jour régulièrement les propriétés des objets graphiques. Vous explorerez également la capacité d'interagir avec les éléments animés, en leur donnant le pouvoir de modifier le contenu. À travers cet exercice, vous maîtriserez la manipulation des propriétés du Canvas pour contrôler la position, la vitesse et la direction d'une balle, vous permettant d'améliorer vos compétences en animation interactive.</p>
                    </div>
                    <div class="mb-1"><i class="bi bi-exclamation-circle-fill" id="bi-c"></i> <span id="Meth_Utile">Méthodes utilisées :</span>
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener" class="link">addEventListener(type, listener)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame" class="link">requestAnimationFrame(callback)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/Window/cancelAnimationFrame" class="link">cancelAnimationFrame(requestID)</a></span> et
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/clearRect" class="link">clearRect(x, y, width, height)</a></span> etc.
                    </div>
                  </div>
                </div>
                <a href="#" class="tree-item__icon">
                  <img src="img/three.gif" alt="HTML" style="width: 75px;height: 75px;">
                </a>
              </div>
              <div class="tree-link"></div>
              <div class="tree-item is-root border flex-md-row shadow-sm">
                <span class="tree-item__title"> <i class="bi bi-chevron-up" id="bi1"></i>Exercice : Application de paint</span>
                <a href="exercice4.php" class="tree-item__link">Commencer l'exercice<i class="bi bi-chevron-right p-2" style="font-size: 14px;"></i></a>
                <div class="reponse">
                  <div>
                    <div class="tree-item__body">Dans cet exercice de peinture avancé, vous pourrez interagir de manière personnalisée avec le canvas. Vous aurez la possibilité de dessiner des formes personnalisées en choisissant la couleur, la taille et le mode de remplissage. Vous pourrez également créer des tracés libres sur le canvas et ajouter du texte, en personnalisant la taille, la couleur, la police et les effets. Des fonctionnalités supplémentaires, telles que la gomme, l'annulation d'actions, l'effacement du canvas, le changement de fond et l'enregistrement au format PNG, sont incluses pour faciliter votre expérience de dessin.</div>
                    <div class=""><i class="bi bi-exclamation-circle-fill" id="bi-c"></i> <span id="Meth_Utile">Méthodes utilisées :</span>
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener" class="link">addEventListener(type, listener)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/strokeRect" class="link">strokeRect(x, y, width, height)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/fillText" class="link">fillText(text, x, y)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/HTMLCanvasElement/toDataURL" class="link">toDataURL(type)</a></span> etc.
                    </div>
                  </div>
                </div>
                <a href="#" class="tree-item__icon">
                  <img src="img/four.gif" alt="HTML" style="width: 75px;height: 75px;">
                </a>
              </div>
              <div class="tree-link"></div>
              <div class="tree-item is-root border flex-md-row shadow-sm">
                <span class="tree-item__title"> <i class="bi bi-chevron-up" id="bi1"></i>Exercice : Courbe dynamique </span>
                <a href="exercice5.php" class="tree-item__link">Commencer l'exercice<i class="bi bi-chevron-right p-2" style="font-size: 14px;"></i></a>
                <div class="reponse">
                  <div>
                    <div class="tree-item__body">Dans cet exercice d'animation, vous apprendrez les concepts clés de l'animation et de l'interaction. Vous explorerez les principes fondamentaux du mouvement vertical sous l'effet de la gravité, en manipulant une balle rebondissante. Vous vous concentrerez également sur la conception esthétique pour créer une apparence réaliste et dynamique en utilisant l'effet de squash and stretch, qui donne du poids et de la souplesse à la balle. Ce sera une occasion d'approfondir votre compréhension des mécanismes de manipulation d'objets en mouvement et de créer des animations captivantes.</div>
                    <div class=""><i class="bi bi-exclamation-circle-fill" id="bi-c"></i> <span id="Meth_Utile">Méthodes utilisées :</span>
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame" class="link">requestAnimationFrame(callback)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/bezierCurveTo" class="link">bezierCurveTo(cp1x, cp1y, cp2x, cp2y, x, y)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/fillRect" class="link">fillRect(x, y, width, height)</a></span>,
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/fillRect" class="link">clearInterval(intervalID)</a></span> et
                      <span id="Methode"> <a href="https://developer.mozilla.org/en-US/docs/Web/API/clearInterval" class="link">setInterval()</a></span> etc.
                    </div>
                  </div>
                </div>
                <a href="#" class="tree-item__icon">
                  <img src="img/five.gif" alt="HTML" style="width: 75px;height: 75px;">
                </a>
              </div>
            </div>
          </div>
          <div class="blog-post">
            <h3 class="mb-1">Prérequis</h3>
            <ul>
              <li>Connaissances de base en HTML5</li>
              <li>Connaissances de base en CSS3</li>
              <li>Connaissances de base en JavaScript</li>
              <li> Curiosité d’apprendre de nouvelles technologies</li>


            </ul>
          </div>

          <div class="blog-post">
            <h3 class="title mb-1">Description</h3>
            <div class="tree-item__body">
              <p>Canvas a été initialement créé par Apple en 2004 et il a façonné les applications Web modernes de nouvelle génération.
                Dans le monde du développement <b>Web moderne</b> d'aujourd'hui, c'est l'une des compétences les plus exigeantes pour créer <b>des jeux</b>, <b>des graphiques Web</b>,<b> des dessins</b> et <b>des visualisations de données </b>. </p>
            </div>
            <div class="tree-item__body">
              <p>Dans ces exercices, nous couvrirons tous les points clés de <b>l'API Canvas</b> ensemble.
                Ces exercices sont une meilleure chance pour qui est prêt à apprendre cette technologie de pointe ou à améliorer les compétences personnelles. Tous les sujets sont soutenus par <b>des solutions complétes</b>,
                pour soutenir et renforcer la courbe d'apprentissage. </p>
            </div>




            <div class="reponse">
              <div>
                <div class="tree-item__body">
                  <p> Le sujet traité dans le cours est principalement :</p>
                </div>
                <ul>
                  <li class="pb-1">Bases de Canvas</li>
                  <li class="pb-1">Comprendre les mathématiques de base derrière la toile et coordonner les systèmes</li>
                  <li class="pb-1">Tracer des chemins et des lignes sur canvas</li>
                  <li class="pb-1">Dessin de formes comme le rect, le cercle et les polygones plus complexes</li>
                  <li class="pb-1">Écriture de textes sur canvas</li>
                  <li class="pb-1">Effets texte</li>
                  <li class="pb-1">Interactions</li>
                  <li class="pb-1">Animations</li>
                  <li class="pb-1">Interactions DOM</li>
                  <li>Écouteur d'évènements</li>
                </ul>
              </div>
            </div>

            <span class="DisplayMore">Affiche plus + </span>


          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="position-sticky border" style="top: 2rem; background-color: #dff5f4a1;">
            <span style="float: right; color:#949393; margin: 10px">Mise à jour le 18/05/2023 </span>
            <div class="p-4 mb-3 mt-4 bg-body-tertiary rounded">
              <h5 class="title">Chaque exercice comprend : </h5>
              <ul class="list-right">
                <li id="li-right"><i class="bi bi-image" id="bi-r"></i>Des images de la solution à atteindre</li>
                <li id="li-right"><i class="bi bi-body-text" id="bi-r"></i></i>Un énoncé avec des questions de difficulté croissante</li>
                <li id="li-right"><i class="bi bi-lightbulb" id="bi-r"></i>Une solution avec des explications bien détaillées</li>
                <li id="li-right"><i class="bi bi-file-earmark-arrow-down" id="bi-r"></i>Des ressources téléchargeables </li>


              </ul>
            </div>
            <hr>
            <div class="p-4">
              <h5 class="title">Lien utiles : </h5>
              <ul>
                <li><a href="https://developer.mozilla.org/fr/docs/Web/API/Canvas_API" class="link">Canvas (MDN Documentation)</a></li>
                <li><a href="https://html.spec.whatwg.org/multipage/canvas.html" class="link">Canvas (WhatWg documentation)</a></li>
                <li><a href="https://joshondesign.com/p/books/canvasdeepdive/title.html" class="link">Canvas Josh Book</a></li>
                <li><a href="https://www.w3.org/2015/04/2dcontext-lc-sample.html" class="link">Canvas (W3C spec)</a></li>
                <li><a href="https://www.w3.org/TR/uievents/" class="link">UI events (W3C spec)</a></li>
                <li><a href="https://www.w3.org/TR/pointerevents3/" class="link">Pointer events (W3C spec)</a></li>
              </ul>
            </div>
            <hr>
            <div class="p-4">
              <h5 class="title">À qui ces exercices s'adressent-t-ils ? </h5>
              <ul>
                <li class="pb-1">Nouveaux débutants</li>
                <li class="pb-1">Quiconque veut apprendre le Canvas HTML5 en profondeur</li>
                <li class="pb-1">Quiconque souhaite améliorer les compétences HTML5 Canvas</li>
                <li class="pb-1">Quiconque veut actualiser les connaissances HTML5 Canvas</li>

              </ul>
            </div>

          </div>
        </div>
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

  <script type="text/javascript">
    // JavaScript
    let texts = document.querySelectorAll(".tree-item__title");
    texts.forEach(text => {
      text.addEventListener('click', (e) => {
        let icon = text.querySelector(".bi");

        text.parentElement.classList.toggle("show");

        if (text.parentElement.classList.contains("show")) {
          icon.classList.remove("bi-chevron-up");
          icon.classList.add("bi-chevron-down");
        } else {
          icon.classList.remove("bi-chevron-down");
          icon.classList.add("bi-chevron-up");
        }
      });
    });

    // JavaScript
    let textss = document.querySelectorAll(".DisplayMore");
    textss.forEach(text => {
      text.addEventListener('click', (e) => {

        text.parentElement.classList.toggle("show");

        if (text.parentElement.classList.contains("show")) {

          text.textContent = "Afficher moins -";


        } else {

          text.textContent = "Afficher plus +";


        }
      });
    });

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