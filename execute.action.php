<?php 
//inclusion du singleton pour accés BDD
include_once 'Singleton.class.php';
//connexion a la bdd
$dbi = Singleton::getInstance();
$db = $dbi->getConnection();
//verification de l'envoi du nom
if(isset($_POST['name']) && count($_POST['name']) <= 18 ){
    //preparation de la requete et envoi en bdd
    $query = $db->prepare("INSERT INTO `equipage`(`nom`) VALUES (:nom)");
    $reponse = $query->execute(array(
        'nom' => $_POST['name']
    ));
}
//redirection vers la page
header('location: index.php');
?>