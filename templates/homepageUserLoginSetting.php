<?php $title = "homepage"; ?>

<?php ob_start(); ?>
<body class="homepageUserLoginSetting">
<?php require 'elements/headerUserLogin.php' ?>
    <main class="homepageUserLoginSetting--main">
        <div class="containerSetting">
            <div class="title">
                <a href=<?= 'index.php?page=' . $_SESSION['user']['lastName'] . $_SESSION['user']['firstName'] ?>><-</a>
                <h1>Information personnelles</h1>
            </div>
            <form action="src/models/treatment/modelHomepageUserLoginSetting.php" method="post">
                <div style="display : none">
                    <label for="user_id">password</label>
                    <input type="text" id="user_id" name="user_id" value="<?= $get['user_id']?>" >                    
                </div>
                <div>
                    <label for="firstName">Prénom</label>
                    <input type="text" id="firstName" name="firstName" value="<?= $get['firstName']?>" >
                </div>
                <div>
                    <label for="lastName">Nom</label>
                    <input type="text" id="lastName" name="lastName" value="<?= $get['lastName']?>" >
                </div>
                <div>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" id="pseudo" name="pseudo" value="<?= $get['pseudo']?>" >                    
                </div>
                <div>
                    <label for="profileImage">Image de profil</label>
                    <input type="text" id="profileImage" name="profileImage" value="<?= $get['profileImage']?>" >                    
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="email" id="email" name="email" value="<?= $get['email']?>" >                    
                </div>
                <div style="display : none">
                    <label for="Oldpassword">password</label>
                    <input type="password" id="Oldpassword" name="Oldpassword" value="<?= $get['password']?>" >                    
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" id="password" name="password" value="<?= $get['password']?>" >                    
                </div>
                <input type="submit" value="Appliquer les modifications">
            </form>
        </div>
    </main>
    <?php require 'elements/footer.php' ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php' ?>