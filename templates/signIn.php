<?php $title = "POOF • sign in"; ?>

<?php ob_start(); ?>
<body class="signIn">
    <header>
      <img src="images/logo-white.png" alt="POOF" />
    </header>
    <main>
      <div class="form-wrapper">
        <h1>S'identifier</h1>
        <form  action="src/models/treatment/modelAccountCreation.php" method="post" >
          <label for="firstName">Nom</label>
          <input type="text" id="firstName" name="firstName" />
          <label for="lastName">Prénom</label>
          <input type="text"  id="lastName" name="lastName" />
          <label for="pseudo">Pseudo</label>
          <input type="text"  id="pseudo" name="pseudo"  placeholder="Au moins 3 caractères" />
          <label for="email">Email</label>
          <input type="email"  id="email" name="email" />
          <label for="password">Mot de passe</label>
          <input type="password"  id="password" name="password" placeholder="Au moins 6 caractères" />
          <input type="submit" value="Créer son compte" />
        </form>
        <!-- <div class="error">
          <div class="errorContainer">
            <span>x</span>
            <p>Erreur, tous les champs sont obligatoire</p>
          </div>
        </div> -->
      </div>
    </main>
    <?php require 'elements/footer.php' ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php' ?>