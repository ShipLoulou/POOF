<?php $title = "homepage"; ?>

<?php ob_start(); ?>
<body class="homepageUserLogin">
<?php require 'elements/headerUserLogin.php' ?>
    <main>
        <section class="profil">
            <img
            src="<?=$get['profileImage']?>"
            alt=""<?=$get['firstName'] . ' ' . $get['lastName']?>""
            />
            <h1><?='Bienvenue ' . $get['pseudo']?></h1>
            <a href="index.php?page=profilSetting" class="modifier">Modifier Profil</a>
        </section>
        <section class="block">
            <a href="index.php?page=myFriends">
                <div>
                    <img src="./images/8131340.png" alt="" />
                    <p>Mes amis</p>
                </div>
            </a>
            <div>
                <img src="./images/Bandeau_rejoignez-nous.webp" alt="" />
                <p>Créer une discution</p>
            </div>
            <div>
                <img src="./images/guc-VACANCES-10042022-BG-EQUIPE-A.png" alt="" />
                <p>Rejoindre une discution</p>
            </div>
        </section>
    </main>
    <?php require 'elements/footer.php' ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php' ?>