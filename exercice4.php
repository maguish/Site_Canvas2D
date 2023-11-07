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
    <title>exercice4</title>

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
            <h3>Exercice : Application paint</h3>

            <div class="container">
                <img src="img/paint.png" width="400" height="300" alt="">
                <div class="resume">
                    <div class="objectif">
                        <h3>Objectif</h3>
                        <p>
                            L’objectif de cet exercice est de permettre un approfondissement des compétences en
                            programmation, en manipulant du canvas et en gestion des événements, à travers une
                            application de dessin interactive.
                        </p>
                    </div>
                    <div class="prerequis">
                        <h3>Pré-requis</h3>
                        <p>Avoir des connaissances de base en HTML5 et en JavaScript et connaître les gestionnaires
                            d'événements de base disponibles en JavaScript et leur utilisation.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="exercice" style="text-align:justify;">
            <div class="expl">
                <p>
                    Lors de la réalisation de cette application, qui propose diverses fonctionnalités telles que le
                    choix des formes, des couleurs et des outils de dessin, nous n’avons pas utilisé de code de
                    démarrage. Dans cet exercice, le code JavaScript gère les interactions avec le canvas et permet à
                    l’utilisateur de dessiner, avec une option de sauvegarde en finalité</b>.
                </p>
            </div>
            <ol>
                <li>
                    <div class="tab">
                        <div class="question">
                            <aside class="bi bi-question-circle-fill" id="aside">

                                <p>Couleur de l’arrière-plan : Ajoutez un sélecteur de couleur qui permet à
                                    l’utilisateur de choisir la couleur de fond de la zone de dessin. Lorsque
                                    l’utilisateur
                                    sélectionne une couleur à l’aide du sélecteur, mettez à jour le fond du canvas avec
                                    la
                                    couleur choisie.</p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Tout d'abord, nous allons définir la couleur de l'arrière-plan. Pour cela, nous
                                    fixons les variables pour manipuler les éléments HTML associés à cette
                                    fonctionnalité. Le sélecteur de couleur pour l'arrière-plan est identifié par l'ID
                                    <b id="Methode">"favcolor2"</b>.<br>

                                    Dans la fonction <b id="Methode">handleBG()</b> qui prend en compte la couleur
                                    choisie par l'utilisateur
                                    et l'opacité choisie, on vérifie d'abord si une couleur est choisie. Ensuite, nous
                                    extrayons les composants rouge, vert et bleu de la couleur choisie en convertissant
                                    la couleur hexadécimale en valeur décimale correspondante ou en divisant une chaîne
                                    de caractères<b>"rgb"</b> en valeurs individuelles.

                                    Nous créons ensuite une chaîne de caractères représentant la couleur au format
                                    <b>"rgba"</b> en utilisant les valeurs d'éléments et d'opacité, qui
                                    seront ensuite
                                    utilisées pour définir le style de remplissage du contexte 2D du canvas, avec
                                    <b id="Methode">context.fillStyle()</b>.
                                    <br> Enfin, <b id="Methode">context.fillRect()</b> permet de dessiner un rectangle
                                    remplissant tout le canvas
                                    avec une couleur d'arrière-plan mise à jour. Pour capturer le changement de couleur,
                                    un écouteur d'événements <b id="Methode">
                                        < input>
                                    </b> est ajouté à l'élément de sélection de couleur. La
                                    fonction <b id="Methode"> handleBG()</b> est appelée chaque fois que la couleur
                                    change, afin de mettre à
                                    jour l’arrière-plan.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\1.png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\backGround.PNG" class="img-display2" alt="">
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
                                    Dessin à main levée : créer un pinceau qui permet à l’utilisateur de dessiner
                                    librement
                                    sur la zone de dessin en utilisant la souris.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Ce code JavaScript permet à l’utilisateur de dessiner librement sur le canvas HTML
                                    avec la souris.<br>Après avoir récupérer l'élément canvas à partir de la page HTML,
                                    nous mettons en place des variables, comme <b id="Methode">isDrawing</b> qui indique
                                    si l'utilisateur
                                    est en train de dessiner ou non, des variables pour stocker les informations sur
                                    l'outil choisi, la couleur sélectionnée et l'épaisseur du pinceau etc. <br>

                                    Ensuite, nous définissons la fonction <b id="Methode">startDraw()</b>, appelée une
                                    fois que
                                    l'utilisateur clique sur le canvas, active le mode de dessin en définissant
                                    isDrawing sur true. Cette fonction enregistre les coordonnées de la souris au moment
                                    du clic et configure les propriétés du pinceau, comme l'épaisseur de ligne et la
                                    couleur.

                                    Nous avons également une fonction <b id="Methode">drawing()</b> qui est appelée
                                    lorsque l'utilisateur
                                    déplace la souris sur le canvas. Cette fonction vérifie si l'utilisateur est en
                                    train de dessiner. Si oui, elle restaure l'image précédente du canvas, et dessine la
                                    ligne en utilisant les coordonnées actuelles de la souris et les coordonnées
                                    précédentes. Cela permet d'obtenir une ligne continue pendant le mouvement de la
                                    souris.<br>Les autres outils de dessin, comme les formes géométriques, sont
                                    également
                                    implémentés dans cette fonction. Pour arrêter le dessin, lorsque l'utilisateur
                                    relâche le bouton de la souris, la variable isDrawing est réinitialisée.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\2.png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\2-1.png" class="img-display2" alt="">
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
                                    Sélection de couleur : ajouter un sélecteur de couleur qui permet à l’utilisateur de
                                    choisir la couleur du trait de dessin.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Dans le code HTML nous utilisons un élément <b id="Methode">
                                        < input>
                                    </b> de type <b>"color"</b> pour créer un
                                    sélecteur de couleur, un attribut value qui définit la couleur initiale "noire",
                                    et
                                    un attribut id.
                                    Dans le code JavaScript, nous définissons <b
                                        id="Methode">document.getElementById("favcolor1")</b>
                                    pour
                                    obtenir une référence à l'élément de sélecteur de couleur, stockée dans la
                                    variable
                                    <b>brushColor</b>.<br>Ensuite, nous ajoutons le gestionnaire d'événements
                                    <b id="Methode">"addEventListener"</b> à
                                    l'élément brushColor. Dans notre exemple, la fonction de rappel met à jour la
                                    variable brushColor avec la nouvelle valeur de couleur sélectionnée, en
                                    utilisant
                                    <b id="Methode">color1</b>.<br>
                                    La variable <b>brushColor</b> permet de définir la couleur du trait de dessin dans
                                    d'autres
                                    parties du code, comme avec l'outil pinceau pour définir la couleur de la ligne
                                    en
                                    utilisant <b id="Methode">context.strokeStyle = brushColor</b>.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\3.png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\Brush.PNG" class="img-display2" alt="">
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
                                    Effet Flou : ajouter un autre pinceau et utiliser la propriété shadowBlur du
                                    contexte de
                                    dessin pour appliquer un effet au pinceau.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>


                                    La fonction <b id="Methode">pencil</b> est responsable du comportement du pinceau
                                    lorsque l'utilisateur
                                    le sélectionne comme outil de dessin. Nous utilisons plusieurs propriétés du
                                    contexte de dessin pour donner au pinceau l'apparence souhaitée lorsqu'il est
                                    utilisé.
                                    La ligne <b id="Methode">"context.shadowBlur = 20"</b> définit la propriété
                                    shadowBlur du contexte de
                                    dessin à 20 pour appliquer un effet de flou au pinceau. La propriété <b
                                        id="Methode">shadowColor</b> à
                                    selectedColor a pour fin de définir la couleur de l'effet de flou. Nous pouvons
                                    ajuster la valeur de shadowBlur selon nos préférences.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\4.png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\pencil.PNG" class="img-display2" alt="">
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
                                    Effacement : ajouter un bouton d’effacement et créer la méthode qui permet à
                                    l’utilisateur d’effacer le contenu de la zone de dessin.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Pour ajouter un bouton d'effacement et créer une méthode pour effacer le contenu de
                                    la zone de dessin, dans notre HTML, nous mettons en place un bouton avec l'ID
                                    <b id="Methode">"clear"</b> associé à la fonction <b
                                        id="Methode">clear_canvas()</b>. C'est cette fonction qui est appelée
                                    une fois cliqué sur le bouton, ce qui efface le contenu de la zone de dessin avec la
                                    méthode <b id="Methode">clearRect()</b> du contexte canvas.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\5.png" class="img-display2" alt="">
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
                                    Ajustement de la taille du pinceau et de la gomme : Ajoutez des fonctionnalités
                                    permettant à l’utilisateur d’augmenter ou de diminuer la taille du pinceau et de la
                                    gomme en utilisant des boutons dédiés.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Pour ajuster la taille du pinceau et de la gomme, nous devons ajouter certaines
                                    fonctionnalités. D'abord les deux boutons, avec les ID <b id="Methode">"minus"</b>
                                    et <b id="Methode">"add"</b>, qui sont
                                    respectivement associés aux événements <b id="Methode">"click"</b>: avec le bouton
                                    minus, la taille du
                                    pinceau est diminuée d'une unité avec une limite inférieure fixée à <b
                                        id="Methode">p_min</b>. La taille
                                    du pinceau est stockée dans la variable <b id="Methode">"brusheWidth"</b>.<br>
                                    Pour ajuster la taille de la gomme, une technique similaire est utilisée : lorsque
                                    l'utilisateur clique sur l'image de plus, la taille de la gomme est augmentée d'une
                                    unité et affichée dans l'élément <b id="Methode">eraserVal</b>. Si la taille dépasse
                                    la valeur maximale
                                    autorisée <b> (eraserMaxSize)</b>, elle est limitée à cette valeur.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\6.png" class="img-display2" alt="">
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
                                    Saisie de texte : Ajoutez un champ de texte où l’utilisateur peut saisir du texte.
                                    Une
                                    fois que l’utilisateur a saisi le texte, ajoutez une fonctionnalité pour afficher ce
                                    texte sur le canvas à l’emplacement souhaité. L’utilisateur devrait également
                                    pouvoir
                                    choisir la taille, la police et la couleur du texte.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Pour la saisie de texte et son affichage sur le canvas, nous créons d'abord une
                                    fonction <b id="Methode">AddText</b> qui est appelée lorsque l'outil <b>"text"</b>
                                    est sélectionné.
                                    Cette
                                    fonction récupère les valeurs du texte saisi, de la taille de police, de la police
                                    et de la couleur du texte à partir des éléments du formulaire. Elle utilise les
                                    méthodes du contexte du canvas pour dessiner le texte sur le canvas aux coordonnées
                                    de la souris.<br>
                                    Enfin, l'événement <b id="Methode">mousemove</b> sur le canvas pour appeler la
                                    fonction <b id="Methode">drawing</b> qui
                                    contient la logique pour dessiner les formes même lorsque l'outil
                                    <b>"text"</b> est actif.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\7(1).png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\7(2).png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\texte.PNG" class="img-display2" alt="">
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
                                    Formes géométriques : permettre à l’utilisateur de dessiner des formes géométriques
                                    prédéfinies. Ajoutez des boutons pour chaque forme géométrique et créez des
                                    gestionnaires d’événements correspondants. Lorsque l’utilisateur clique sur l’un des
                                    boutons de forme géométrique, il peut ensuite cliquer et faire glisser sur la zone
                                    de
                                    dessin pour créer la forme choisie. Assurez-vous de prendre en compte les propriétés
                                    telles que la couleur du contour et le remplissage des formes.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Les trois fonctions principales qui permettent à l’utilisateur de dessiner des
                                    formes géométriques prédéfinies sont : <b id="Methode">drawRect</b>, <b
                                        id="Methode">drawCircle</b> et <b id="Methode">drawTriangle</b>.<br>

                                    - La fonction <b id="Methode">drawRect</b> est appelée lorsque l'utilisateur
                                    souhaite
                                    dessiner un rectangle.
                                    Si l'option <b id="Methode">"fillColor"</b> n'est pas cochée, cela signifie que nous
                                    voulons dessiner
                                    uniquement les contours du rectangle et non une forme remplie. Nous utilisons les
                                    coordonnées de la souris pour déterminer la position et la taille du rectangle, et
                                    nous utilisons <b id="Methode">context.strokeRect</b> pour le dessiner.<br>

                                    - Pour le cercle, nous créons un nouveau chemin avec <b
                                        id="Methode">context.beginPath()</b> et nous calculons le rayon du cercle en
                                    utilisant les coordonnées de la souris. En utilisant <b
                                        id="Methode">context.arc</b>, nous dessinons le
                                    cercle en utilisant le rayon calculé et les coordonnées du point central.<br>

                                    - Pour le triangle, après avoir créé un nouveau chemin, nous utilisons <b
                                        id="Methode">context.moveTo</b>
                                    pour déplacer le point de départ du triangle vers les coordonnées de la souris. En
                                    utilisant <b id="Methode">context.lineTo</b>, nous dessinons la première ligne du
                                    triangle en utilisant
                                    les coordonnées de la souris. Pour fermer le triangle, nous utilisons
                                    <b id="Methode">context.closePath()</b>, ce qui dessine la troisième ligne.<br>

                                    Enfin, la fonction <b id="Methode">drawing</b> est appelée lorsqu'on déplace la
                                    souris et lorsque le
                                    dessin est en cours. Si <b>isDrawing</b> est false, cela signifie que nous ne
                                    faisons rien
                                    car le dessin n'est pas en cours.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\8.1.png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\8.2.png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images\paint\formes.PNG" class="img-display2" alt="">
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
                                    Annulation : ajoutez un bouton d’annulation qui permet à l’utilisateur d’annuler la
                                    dernière action de dessin.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Tout d'abord, pour permettre à l'utilisateur d'annuler la dernière action du dessin,
                                    nous ajoutons un bouton d'annulation de type input dans le code HTML.<br>Ensuite,
                                    dans
                                    le code JavaScript, nous définissons la fonctionnalité d'annulation. Lorsque
                                    l'utilisateur clique sur le bouton <b>"Undo"</b>, la fonction <b
                                        id="Methode">undo()</b> sera appelée, ce qui
                                    vérifie s'il y a un état antérieur du canvas disponible dans <b>restore_array</b>.
                                    Si oui,
                                    elle restaure cet état en appelant la fonction <b id="Methode">restore_canvas()</b>,
                                    sinon elle appelle
                                    <b id="Methode">clear_canvas()</b> pour effacer complètement le canvas.<br>

                                    Enfin, le gestionnaire d'événement <b id="Methode">"mouseup"</b> permet d'appeler la
                                    fonction
                                    <b id="Methode">save_canvas()</b> à la fin du dessin de chaque action, ce qui permet
                                    d'enregistrer
                                    l'état du canvas après chaque dessin.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\9.png" class="img-display2" alt="">
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
                                    Sauvegarde : ajoutez un bouton de sauvegarde qui permet à l’utilisateur de
                                    télécharger
                                    l’image dessinée au format JPG.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Pour ajouter un bouton de sauvegarde qui permet à l’utilisateur de télécharger
                                    l’image dessinée au format <b>PNG</b>, nous commençons par créer un bouton avec l'ID
                                    <b id="Methode">"save"</b>
                                    dans la page HTML.<br>Ce dernier permet de convertir le contenu du canvas en URL de
                                    données au format PNG à l'aide de <b id="Methode">canvas.toDataURL("image/png")</b>
                                    et définit l'attribut download du lien avec le nom du fichier que vous souhaitez
                                    utiliser pour
                                    le téléchargement.<br>
                                    Enfin un événement de clic sur le lien déclenchera le
                                    téléchargement de l'image lorsqu'on clique sur le bouton.
                                </p>
                                <div class="imgs">
                                    <img src="images\paint\10.png" class="img-display2" alt="">
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
        link.href = 'exercices/Paint-application.zip';

        // Attribution d'un nom de fichier au lien de téléchargement
        link.download = 'ApplicationPaint.zip';

        // Ajout de l'élément <a> à la page
        document.body.appendChild(link);

        // Clic automatique sur le lien de téléchargement
        link.click();

        // Suppression de l'élément <a> de la page
        document.body.removeChild(link);
    }
</script>

</html>