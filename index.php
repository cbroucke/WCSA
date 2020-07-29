<!DOCTYPE html>
<?php 
//inclusion du singleton pour accés BDD
include_once 'Singleton.class.php';
//connexion a la bdd
$dbi = Singleton::getInstance();
$db = $dbi->getConnection();
$query = $db->prepare("SELECT nom from equipage");
//on execute la requete préparé
$query->execute();
//on fetch le resultat et on le retourne dans un tableau index
$results = $query->fetchAll(PDO::FETCH_COLUMN);
?>
<html lang="fr">
  <head>
    <link href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Jason</title>
  </head>
  <body>
    <!-- Header section -->
    <header>
      <h1>
        <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
        Les Argonautes
      </h1>
      
    </header>

    <!-- Main section -->
    <main>
      
      <!-- New member form -->
      <h2>Ajouter un(e) Argonaute</h2>
      <form class="new-member-form" action="execute.action.php" method="post">
        <label for="name">Nom de l&apos;Argonaute</label>
        <input id="name" name="name" type="text" placeholder="Charalampos" maxlength="18" required="required" />
        <button type="submit">Envoyer</button>
      </form>
      
      <!-- Member list -->
      <h2>Membres de l'équipage</h2>
      <section class="member-list">
        <div class="member-item">
          <?php for($i=0; $i< count($results); $i++){ ?>
          <span class="member"><?php echo $results[$i]; ?></span>
          <?php } ?>
      </div>
        
      </section>
    </main>

    <footer>
      <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
    </footer>
  </body>
</html>