<?php $title = "POOF • log in"; ?>

<?php ob_start(); ?>
<body class="logIn">
    <header>
        <img src="images/logo-white.png" alt="POOF" />
    </header>
    <main>
        <div class="form-wrapper">
            <h1>Se connecter</h1>
                <form  action="src/models/treatment/modelAccountLogin.php" method="post" >
                <label for="pseudo">Pseudo / Email</label>
                <input type="text"  id="pseudo" name="pseudo" />
                <label for="password">Mot de passe</label>
                <input type="password"  id="password" name="password" />
                <input type="submit" value="Se connecter" />
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