<?php $title = "POOF"; ?>

<?php ob_start(); ?>
<body class="homepageUserNotLogged">
    <header>
        <img src="images/logo-white.png" alt="POOF" />
        <ul>
            <li>
            <a href="index.php?page=logIn"> Se connecter </a>
            </li>
            <li>
            <a href="index.php?page=signIn"> S'identifier </a>
            </li>
        </ul>
    </header>
    <main>
      <h1>Bienvenue sur POOF</h1>
      <h2>Partagez vos aventures avec vos amis !</h2>
    </main>
    <?php require 'elements/footer.php' ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php' ?>