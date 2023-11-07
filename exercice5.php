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
    <title>exercice5</title>

    <link href="style/style1.css" rel="stylesheet" />

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
            <h3>Exercice : Animation de courbes</h3>

            <div class="container">
                <img src="images/exo5/main.gif" width="600" height="400" alt="">
                <div class="resume">
                    <div class="objectif">
                        <h3>Objectif</h3>
                        <p>
                            L’objectif de cet exercice est d'explorer et de visualiser différentes courbes mathématiques en utilisant des techniques de dessin, d'animation et d'interaction.
                        </p>
                    </div>
                    <div class="prerequis">
                        <h3>Pré-requis</h3>
                        <p>
                            - Connaissance du langage JavaScript <br>
                            - Compréhension des concepts de dessin Canvas 2d<br>
                            - Familiarité avec les fonctions explicites et paramétrées <br>
                            - Maîtrise des interactions utilisateur <br>
                            - Capacité à manipuler les éléments du DOM
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="exercice" style="text-align:justify;">
            <div class="expl">
                <p>
                    Pour réaliser cet exercice, nous disposons d’un programme de base que vous pourrez récuprer <a href="https://www.lirmm.fr/~mountaz/Ens/Ihm/Tp/Courbes/exo-5.html">ici</a>. <br>
                    Dans ce fichier, nous avons 4 classes :
                </p>
                <ul>
                    <li>
                        <b id="Methode">Display</b> qui permet de dessiner des fonctions mathématiques sur le canvas et
                        contenant 5
                        méthodes: <br>
                        &nbsp;- <b id="Methode">createFunctions</b> pour stocker les fonctions à dessiner,<br>
                        &nbsp;- <b id="Methode">drawNextFunction</b> pour changer la fonction actuellement dessinée
                        lorsqu'il y a un événement de défilement <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de la souris,<br>
                        &nbsp;- <b id="Methode">setFunction</b> pour définir la fonction à dessiner en fonction d'une
                        chaîne de caractères fournie,<br>
                        &nbsp;- <b id="Methode">redrawFromInput</b> pour redessiner la fonction en fonction de la
                        valeur saisie dans l'élément d'entrée (<i>input</i>) <br>&nbsp;&nbsp;&nbsp;et faisant appelle à
                        la fonction <b id="Methode">setFunction</b>,<br>
                        &nbsp;- et <b id="Methode">draw</b> pour dessiner la fonction courante sur le canvas.
                    </li>
                    <li>
                        <b id="Methode">Repere</b> qui permet de repésenter un repère cartésien utilisé pour dessiner
                        les fonctions mathématiques sur le canvas et contenant 6 méthodes: <br>
                        &nbsp;- <b id="Methode">drawAxes</b> pour dessiner les axes du repère sur le
                        contexte graphique tout en traçant des marques régulières le long des axes,<br>
                        &nbsp;- <b id="Methode">getMinX</b> et <b id="Methode">getMaxX</b> qui renvoient
                        respectivement les valeurs
                        minimale et maximale de l'axe x du repère,<br>
                        &nbsp;- <b id="Methode">xm2p</b> et <b id="Methode">ym2p</b> qui convertissent
                        les coordonnées du modèle (valeurs réelles) en coordonnées sur le canvas (pixels) en utilisant
                        les dimensions du repère et les
                        valeurs minimale et maximale de l'axe correspondant,<br>
                        &nbsp;- et <b id="Methode">printCoords</b> qui affiche les coordonnées d'un point
                        p dans le
                        modèle (valeurs réelles) ainsi que leurs équivalents en coordonnées sur le canvas (pixels).
                    </li>
                    <li>
                        <b id="Methode">Point</b> qui permet de représenter un point dans le repère cartésien.<br>
                    </li>
                    <li>
                        <b id="Methode">Courbe</b> qui permet de représenter et de dessiner une courbe dans le repère
                        cartésien en
                        fonction d'une fonction donnée. Elle a plusieurs propriétés, dont <br>
                        - <b id="Methode">fun</b> qui représente la fonction de la courbe, <br>
                        - <b id="Methode">ndvilb</b> qui est le nombre de valeurs (représentées sur l'intervalle
                        de définition) incluses dans la courbe, <br>
                        - <b id="Methode">key</b> qui est une clé d'identification, <br>
                        - <b id="Methode">parametree</b> qui indique si la courbe est paramétrique ou non, <br>
                        - et <b id="Methode">neverDrawn</b> qui indique si la courbe n'a jamais été
                        dessinée.<br>
                        Elle possède également 2 méthodes:<br>
                        - <b id="Methode">init</b> pour initialiser les points de la courbe.<br>
                        - et <b id="Methode">draw</b> pour dessiner la courbe sur un contexte
                        graphique en
                        utilisant le repère.
                    </li>
                </ul>
                <p>
                    Il convient de remarquer que la logique de création des fonctions mathématiques et celle de dessin
                    des axes du repère dans les méthodes <b id="Methode">createFunctions</b> et <b id="Methode">drawAxes</b>, respectivement, ne
                    sont pas présente dans le code donné.
                </p>
                </p>
            </div>
            <ol>
                <li>
                    <div class="tab">
                        <div class="question">
                            <aside class="bi bi-question-circle-fill" id="aside">

                                <p>Dessin des axes ox, et oy (avec marques).</p>

                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Nous choisissons de dessiner les axes et les marques du repère en utilisant des
                                    lignes droites et ceux-ci grâce au méthodes <b id="Methode">moveTo()</b> et <b id="Methode">lineTo()</b> du
                                    contexte graphique.<br><br>
                                    - Tout d'abord nous dessinons la ligne reliant le bord inférieur gauche <b>(0,
                                        this.height)</b> au bord inférieur droit
                                    <b>(this.width, this.height)</b> du canvas.<br>
                                    - Ensuite nous dessinons celle reliant le bord inférieur gauche <b>(0,
                                        this.height)</b> au bord supérieur gauche <b><br>(0, 0)</b>
                                    du canvas.<br>
                                    - Puis nous utilisons une boucle pour dessiner les marques sur l'axe des abscisses
                                    et l'axe des ordonnées. Pour ce
                                    faire, nous utilisons la variable <b>nbt</b> représentant le nombre total
                                    de marques à dessiner et qui est calculée en
                                    fonction de la hauteur du repère et de la distance entre les marques
                                    (<b>this.#pitch.w</b>).<br><br>
                                    Prenons le cas du tracé des marques sur l'axe des abscisses: Nous
                                    utilisons la variable x pour suivre la position
                                    horizontale de chaque marque et à chaque itération de la boucle, nous
                                    dessinons
                                    une marque verticale à la
                                    position <b>(x, this.height)</b> et <b>(x, this.height -
                                        this.#mark.h)</b>.<br> Ensuite, nous incrémentons x en fonction de la
                                    distance entre les marques.<br>
                                    Pour le cas du tracé des marques sur l'axe des ordonnées: Nous utilisons
                                    la variable y pour suivre la position
                                    verticale de chaque marque et à chaque itération de la boucle, nous
                                    dessinons
                                    une marque horizontale à la
                                    position <b>(0, y)</b> et <b>(this.#mark.w, y)</b>.<br> Ensuite, nous
                                    incrémentons y en fonction de la distance entre les marques.
                                </p>
                                <div class="imgs">
                                    <img src="images/exo5/axe1Code.png" class="img-display2" alt="">
                                </div>
                                <div class="imgs">
                                    <img src="images/exo5/axe2Code.png" class="img-display2" alt="">
                                </div>
                                <p>
                                    Pour visualiser naïvement le résultat, nous pouvons ajouter la ligne suivante dans le constructeur de la classe <b>Display</b>:
                                </p>
                                <div class="imgs">
                                    <img src="images/exo5/ajout.png" alt="">
                                </div>
                                <p>
                                    Cette ligne doit être ajoutée avant la dernière ligne de code du constructeur sinon cela engendrerai une erreur.<br>
                                    Il convient de noter que c'est la méthode <b>draw()</b> de la classe <b>Courbe</b> qui est chargée du dessin du repère et ne peux pour le moment pas être appelée dans la méthode
                                    <b>draw()</b> du <b>Display</b> car étant liée aux éléments du tableau définit dans la méthode <b>createFunctions()</b> et ce tableau est actuellement vide.
                                </p>
                                <div class="imgs">
                                    <img src="images/exo5/axes.png" class="img-display2" alt="">
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
                                    Sur l'intervalle [0,1], dessin des courbes données par des fonctions explicites <br>
                                    - première bissectrice des axes (droite x = y) <br>
                                    - f(x) = x<sup>2</sup> <br>
                                    - f(x) = sin(x) <br>
                                    - Courbe de rebond définie par une concaténation de courbes : f<sub>a,b</sub>(x) =
                                    -0.25 * (11 - 6 * a - 11 * x)<sup>2</sup> + b<sup>2</sup> pour a, b définis par la
                                    suite: a<sub>0</sub>[...] définition donnée dans le code ...
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Avant de répondre à ces questions, il serait bien de comprendre ce que font les méthodes <b>init()</b> et <b>draw()</b> définits dans la classe <b>Courbe</b>. <br>
                                    La méthode <b>init()</b> calcule les coordonnées de chaque point de la courbe en utilisant l'intervalle de définition, la fonction de la courbe et le pas entre les valeurs de x. Les points sont ensuite stockés dans un tableau pour être utilisés ultérieurement lors du dessin de la courbe.<br>
                                    Quant à la méthode <b>draw()</b>, elle dessine la fonction sur le canvas en utilisant les coordonnées du repère et le contexte graphique. Dans son implémentation, elle vérifie d'abord si la courbe n'a jamais été dessinée auparavant. Si tel est le cas, elle fait appel à la fonction <b>init()</b> pour initialiser
                                    les points de la courbe avant de dessiner cette dernière. Sinon, elle dessine directement la courbe.
                                </p>
                                <p>&nbsp</p>
                                <p>
                                    Nous pouvons maintenant dessiner les courbes en ajoutant, pour chaque courbe, une nouvelle instance de la classe <b>Courbe</b> dans le tableau <b>functions</b>. Chaque courbe portera un identifiant unique et sera associée à une clé désignant le nom de la fonction.
                                    Nous initialisons pour ce faire, la variable <b>i</b> à 0. Cette variable sera utilisée pour attribuer un identifiant unique à chaque courbe et sera incrémentée à chaque création d'une nouvelle courbe.
                                </p>
                                <p>&nbsp</p>
                                <ul>
                                    <li>
                                        <p>
                                            La fonction associée à cette courbe est la fonction identité qui renvoie simplement la valeur d'entrée x. La clé associée est "<b>lerp</b>" et nous définissons à <b>false</b> le paramètre <b>parametree</b> de la courbe pour indiquer qu'elle n'est pas paramétrée.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/lerp.png" alt="">
                                        </div>
                                        <div class="imgs">
                                            <img src="images/exo5/lerpImg.png" class="img-display2" alt="">
                                        </div>
                                        <p>&nbsp;</p>
                                    </li>
                                    <li>
                                        <p>
                                            La fonction associée à cette courbe est la fonction carré qui renvoie le carré de la valeur d'entrée x. La clé associée est "<b>x^2</b>" et nous définissons à <b>false</b> le paramètre <b>parametree</b> de la courbe.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/x2.png" alt="">
                                        </div>
                                        <div class="imgs">
                                            <img src="images/exo5/x2Img.png" class="img-display2" alt="">
                                        </div>
                                        <p>&nbsp;</p>
                                    </li>
                                    <li>
                                        <p>
                                            La fonction associée à cette courbe est la fonction sinus qui renvoie le sinus de la valeur d'entrée x. La clé associée est "<b>sin(x)</b>" et nous définissons à <b>false</b> le paramètre <b>parametree</b> de la courbe.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/sinus.png" alt="">
                                        </div>
                                        <div class="imgs">
                                            <img src="images/exo5/sinusImg.png" class="img-display2" alt="">
                                        </div>
                                        <p>&nbsp</p>
                                    </li>
                                    <li>
                                        <p>
                                            Pour représenter la courbe de rebond, nous utilisons les fonctions <i>rewind</i> et <i>bounce</i> pour la définir. Nous créons une nouvelle instance de la classe <b>Courbe</b> avec comme fonction associée, la fonction qui renvoie le résultat de l'application
                                            de la fonction <i>bounce</i> inversée par la fonction <i>rewind</i> à la valeur d'entrée x. La clé associée est "<b>bounce</b>" et nous définissons à <b>false</b> le paramètre <b>parametree</b> de la courbe.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/bounce.png" alt="">
                                        </div>
                                        <div class="imgs">
                                            <img src="images/exo5/bounceImg.png" class="img-display2" alt="">
                                        </div>
                                    </li>
                                </ul>
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
                                    Sur l'intervalle [0,1], dessin de courbes données par des fonctions paramétrées <br>
                                    - courbe de Bézier quadratique, dont il conviendra de donner les points de contrôle
                                    <br>
                                    - courbe de Bézier cubique, dont il conviendra de donner les points de contrôle.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    <u><b>Rappel</b> :</u> Une courbe paramétrée est une représentation mathématique d'une courbe où les coordonnées x et y d'un point sur la courbe sont exprimées en fonction d'un paramètre. Au lieu d'utiliser une fonction reliant directement x à y, une courbe paramétrée utilise deux fonctions distinctes, généralement
                                    notées x(t) et y(t), où t est le paramètre. La valeur du paramètre t est généralement un nombre réel qui varie dans un intervalle donné. En faisant varier la valeur de t, on obtient une série de points qui, une fois reliés, forment la courbe paramétrée.
                                </p>
                                <p>&nbsp</p>
                                <ul>
                                    <li>
                                        <p>
                                            Une courbe de Bézier quadratique est la courbe
                                            B(t) = (1-t)<sup>2</sup>P<sub>0</sub> + 2t(1-t)P<sub>1</sub> + t<sup>2</sup>P<sub>2</sub>,
                                            défini par les points de contrôle P<sub>0</sub>, P<sub>1</sub> et P<sub>2</sub>. Pour représenter une courbe de Bézier quadratique, nous définissons la fonction <b>quad_bezier()</b> suivante:
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/quadBez.png" alt="">
                                        </div>
                                        <p>
                                            Cette fonction retourne une autre fonction représentant une courbe de Bézier quadratique définie par trois points de contrôle : a, b et c et qui prend en paramètre un paramètre t qui varie entre 0 et 1.
                                            Elle calcule les coordonnées x et y d'un point sur la courbe de Bézier quadratique correspondant à la valeur de t. Les formules utilisées sont basées sur l'interpolation quadratique entre les points de contrôle. <br>
                                            Pour afficher la courbe, nous déclarons tout d'abord les variables a, b et c puis nous les utilisons pour créer une nouvelle instance de la classe <b>Courbe</b> avec "<b>fiso</b>" comme clé associée, la fonction de la courbe de Bézier quadratique obtenue à partir de <b>quad_bezier(a, b, c)</b>
                                            et le paramètre <b>true</b> pour indiquer que c'est une courbe paramétrée.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/fiso.png" alt="">
                                        </div>
                                        <div class="imgs">
                                            <img src="images/exo5/fisoImg.png" class="img-display2" alt="">
                                        </div>
                                        <p>&nbsp</p>
                                    </li>
                                    <li>
                                        <p>
                                            Une courbe de Bézier cubique est la courbe
                                            B(t) = (1-t)<sup>3</sup>P<sub>0</sub> + 3t(1-t)<sup>2</sup>P<sub>1</sub> + 3t<sup>2</sup>(1-t)P<sub>2</sub> + t<sup>3</sup>P<sub>3</sub>,
                                            défini par les points de contrôle P<sub>0</sub>, P<sub>1</sub>, P<sub>2</sub> et P<sub>3</sub>. Pour représenter une courbe de Bézier cubique, nous définissons la fonction <b>cubic_bezier()</b> suivante:
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/cubBez.png" alt="">
                                        </div>
                                        <p>
                                            Cette fonction retourne une autre fonction représentant une courbe de Bézier cubique définie par quatre points de contrôle : a, b, c et d et qui prend en paramètre un paramètre t qui varie entre 0 et 1.
                                            Elle calcule les coordonnées x et y d'un point sur la courbe de Bézier cubique correspondant à la valeur de t. Les formules utilisées sont basées sur l'interpolation cubique entre les points de contrôle. <br>
                                            Pour afficher la courbe, nous déclarons tout d'abord les variables a, b, c et d puis nous les utilisons pour créer une nouvelle instance de la classe <b>Courbe</b> avec "<b>sfs</b>" comme clé associée, la fonction de la courbe de Bézier cubique obtenue à partir de <b>cubic_bezier(a, b, c, d)</b>
                                            et le paramètre <b>true</b> pour indiquer que c'est une courbe paramétrée.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/sfs.png" alt="">
                                        </div>
                                        <div class="imgs">
                                            <img src="images/exo5/sfsImg.png" class="img-display2" alt="">
                                        </div>
                                    </li>
                                </ul>
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
                                    En utilisant la classe Animation, créer l'animation d'un point qui se déplace le
                                    long de la courbe affichée.

                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <p>
                                    Commençons par définir dans la classe <b>Courbe</b> la fonction <b>drawMobile()</b> qui nous permettra de dessiner un point mobile sur une courbe:
                                </p>
                                <div class="imgs">
                                    <img src="images/exo5/drawM.png" alt="">
                                </div>
                                <p>
                                    Cette fonction prend en paramètre l'indice du point mobile dans la liste des points de la courbe, le repère dans lequel la courbe est tracée et le contexte graphique utilisé pour le dessin.<br>
                                    Elle commence par déclarer les variables <b>previous</b>, <b>p</b> et <b>newP</b>: <b>p</b> représentant le point mobile à dessiner, <b>previous</b> représentant le point précédent dans la séquence de points et <b>newP</b> est un nouveau point créé avec les coordonnées (0.5, 1 - p.y). <br>
                                    Ensuite elle vérifie si l'indice i est supérieur à zéro. Si oui, cela signifie qu'il existe un point précédent et dans ce cas, elle assigne les coordonnées du point précédent à la variable <b>previous</b> puis efface la zone autour du point précédent sur le graphique.
                                    Le rectangle est défini par les coordonnées du point précédent converties à l'aide de la fonction de conversion de coordonnées <b>repere.xm2p()</b>, le rayon du point mobile (<b>this.radius</b>), et la hauteur du repère (<b>repere.height</b>).<br>
                                    Enfin elle dessine un axe vertical à la position du point mobile, puis dessine le point mobile sous la forme d'une ellipse remplie avec la couleur orange.
                                </p>
                                <p>La fonction <b>drawVerticalAxe()</b> est une méthode de la classe <b>Repere</b> et est définit comme suite:</p>
                                <div class="imgs">
                                    <img src="images/exo5/drawVA.png" alt="">
                                </div>
                                <p>&nbsp</p>
                                <p>
                                    Nous pouvons maintenant définir la fonction <b>startAnimation(e)</b> de la manière suivante:<br>
                                    - Elle récupère d'abord la courbe à animer en faisant appel à la méthode <b>getCurve()</b> pour obtenir l'objet curve correspondant.<br>
                                    - Ensuite elle crée une instance de la classe <b>Animation</b> en spécifiant le nombre de points de la courbe et une valeur de délai de 35 (qui contrôle la vitesse de l'animation).<br>
                                    - Puis elle définit la fonction <b>nextStep</b> de l'animation qui sera appelée à chaque étape de l'animation et qui est responsable du dessin du point mobile sur le canvas. Elle utilise la méthode <b>drawMobile()</b> pour dessiner le point mobile en utilisant le paramètre <b>animation.step</b>, qui représente l'étape actuelle de l'animation.<br>
                                    - Enfin elle supprime le dessin précédent avant de recommencer la nouvelle animation avec la méthode <b>run()</b>.
                                </p>
                                <div class="imgs">
                                    <img src="images/exo5/anim.png" alt="">
                                </div>
                                <p>
                                    Les fonctions <b>getNbPoints()</b> et <b>drawMobile()</b> définies dans <b>startAnimation(e)</b> sont respectivement dans les classes <b>Courbe</b> et <b>Display</b> et sont définies comme suite:
                                </p>
                                <div class="imgs">
                                    <img src="images/exo5/drawMC.png" alt="">
                                </div>
                                <div>
                                    <img src="images/exo5/nPoints.png" style="padding-left: 20px" alt="">
                                </div>
                                <p>&nbsp</p>
                                <p>
                                    Nous obtenons le resultat suivant sur la courbe de rebond:
                                </p>
                                <div class="imgs">
                                    <img src="images/exo5/main.gif" width="580" height="500" alt="">
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
                                    <strong>Interactions:</strong> <br>
                                    - un clic lance une nouvelle animation avec la courbe affichée.<br>
                                    - ajouter un champs texte qui permet de donner le nom de la courbe à afficher <br>
                                    - changer la courbe affichée en utilisant la molette de la souris.
                                </p>
                            </aside>
                        </div>
                        <hr>
                        <div class="reponse">
                            <div>
                                <ul>
                                    <li>
                                        <p>
                                            Nous ajoutons un écouteur d'événement de clic à l'ensemble du document. Lorsque l'utilisateur clique n'importe où sur la page, la fonction <b>startAnimation(e)</b> est appelée, avec l'événement de clic e en tant que paramètre.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/ecouteur3.png" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <p>
                                            Nous ajoutons un écouteur d'événement de frappe de touche à l'élément du document ayant l'ID <b>input_id</b>. Lorsqu'une touche est enfoncée, la fonction anonyme est appelée avec l'événement e en tant que paramètre. Cette fonction vérifie
                                            si la touche enfoncée est la touche "Entrée" (keyCode 13), et si c'est le cas, elle appelle la fonction <b>redrawFromInput(e)</b>.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/ecouteur4.png" alt="">
                                        </div>
                                    </li>
                                    <li>
                                        <p>
                                            Nous ajoutons un écouteur d'événement de la molette de la souris à l'élément du document ayant l'ID <b>input_id</b>. Lorsque la molette de la souris est tournée, la fonction <b>drawNextFunction(e)</b> est appelée, avec l'événement e en tant que paramètre.
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/ecouteur1.png" alt="">
                                        </div>
                                        <p>
                                            Nous faisons de même pour l'ID <b>canvas_id</b>
                                        </p>
                                        <div class="imgs">
                                            <img src="images/exo5/ecouteur2.png" alt="">
                                        </div>
                                    </li>
                                </ul>
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
        link.href = 'exercices/traceur.zip';

        // Attribution d'un nom de fichier au lien de téléchargement
        link.download = 'CourbeDynamique.zip';

        // Ajout de l'élément <a> à la page
        document.body.appendChild(link);

        // Clic automatique sur le lien de téléchargement
        link.click();

        // Suppression de l'élément <a> de la page
        document.body.removeChild(link);
    }
</script>

</html>