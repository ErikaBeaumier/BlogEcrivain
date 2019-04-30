<?php
$this->_t = "Des idées ? Contactez-moi !";
?>
<h1>Des idées ? Contactez-moi !</h1>
<?php
if(!isset($_SESSION['inputs']))
{
  session_start();
}
?>

    <?php if(array_key_exists('errors', $_SESSION)): ?>

      <div class="alert alert-danger">
        <?= implode('<br>', $_SESSION['errors']); ?>
      </div>

    <?php endif ?>

    <?php if(array_key_exists('success', $_SESSION)): ?>

      <div class="alert alert-success"><span style="color:green"><strong>Votre mail a bien été envoyé.</strong></span>
      </div>

    <?php endif ?>
      
      <form action="post_contact.php" method="POST">
        <?php
        if(isset($_SESSION['inputs']))
           $form = new Contact($_SESSION['inputs']);
                
        echo $form->text('name', 'Votre nom').'<br />';
       
        echo $form->email('email', 'Votre email').'<br />';         
          
        echo $form->textarea('message', 'Votre message').'<br />'; 

        unset($_SESSION['inputs']);
        unset($_SESSION['success']);
        unset($_SESSION['errors']); ?>

            <button type="submit" class="btn btn-primary">Envoyer</button>
      </form>          
    </div>
  </div>
</body>
</html>