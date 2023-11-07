<?php
require_once(__DIR__ . '/vendor/autoload.php');

use \Mailjet\Resources;

define('API_USER', '407439ea792dcb810d33c6f57307a01c');
define('API_lOGIN', '2fd3391131be16f8453f71c03c45f167');
$mj = new \Mailjet\Client(API_USER, API_lOGIN, true, ['version' => 'v3.1']);


if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Créer le corps de l'email
    $body = '
<html>
<head>
<style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f6f6f6;
    padding: 20px;
}

h2 {
    color: #333333;
}

p {
    margin: 0 0 10px;
}

ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
}

li {
    margin-bottom: 5px;
}

strong {
    font-weight: bold;
}
</style>

</head>
<body>
    <h2>Feedback des utilisateurs</h2>
    <p>Bonjour,</p>
    
    <p>Vous avez reçu un nouveau feedback de la part d\'un utilisateur :</p>
    <ul>
        <li><strong>Nom :</strong> ' . $nom.'_'.$prenom . '</li>
        <li><strong>Email :</strong> ' . $email . '</li>
        <li><strong>Feedback :</strong> ' . $message . '</li>
    </ul>
    
    <p>Veuillez prendre les mesures nécessaires pour répondre au feedback de l\'utilisateur.</p>
    
    <p>Cordialement,</p>
    <p>Votre équipe MissIconiX</p>
</body>
</html>';

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {


        $data = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "icoter23@gmail.com",
                        'Name' => "IcoMaster"
                    ],
                    'To' => [
                        [
                            'Email' => "icoter23@gmail.com",
                            'Name' => "IcoMaster"
                        ]
                    ],
                    'Subject' => "Nouveau feedback utilisateur",
                    'HTMLPart' => $body
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $data]);
        $response->success();
        header('Location:feedback.php?feed_err=success');
    } else {
        header('Location: feedback.php?feed_err=email');
        die();
    }
} else {
    header('Location: feedback.php?feed_err=empty');
    die();
}
