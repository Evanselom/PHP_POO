<?php
echo "<h1>Contactez-nous</h1>";
echo "<p>Remplissez le formulaire ci-dessous pour nous contacter :</p>";

/*****************************************
  *  Constantes et variables
  *****************************************/
  define('LOGIN','Rasmus');  // Login correct
  define('PASSWORD','lerdorf');  // Mot de passe correct
  $message = '';      // Message à afficher à l'utilisateur
 
  /*****************************************
  *  Vérification du formulaire
  *****************************************/
  // Si le tableau $_POST existe alors le formulaire a été envoyé
  if(!empty($_POST))
  {
    // Le login est-il rempli ?
    if(empty($_POST['nom']))
    {
      $message = 'Veuillez indiquer votre nom svp !';
    }
      // Le mot de passe est-il rempli ?
      elseif(empty($_POST['email']))
    {
      $message = 'Veuillez indiquer votre email svp !';
    }
      else
    {
      // L'identification a réussi
      $message = 'Message envoyé avec succès !';
    }
  }


 if(!empty($message)) echo "<p>".$message."</p>";
?>
<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>" method="post">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>
    <br><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="message">Message :</label><br>
    <textarea id="message" name="message" rows="4" required></textarea>
    <br><br>

    <button type="submit">Envoyer</button>
</form>