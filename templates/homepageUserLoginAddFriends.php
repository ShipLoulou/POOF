<?php $title = "homepage • Mes amis"; ?>

<?php ob_start(); ?>
<body class="homepageUserLoginFriends">
<?php require 'elements/headerUserLogin.php' ?>
    <main class="homepageUserLoginFriends--main">
        <div class="containerFriends">
            <div class="title">
                <a href=<?= 'index.php?page=' . $_SESSION['user']['lastName'] . $_SESSION['user']['firstName'] ?>><-</a>
                <h1>Information personnelles</h1>
            </div>
            <div class="content">
                <div class="contentContainer">
                    <?php foreach($getFriendOfUser as $friendOfUser): ?>
                        <figure>
                            <img src="<?= $friendOfUser['profileImage'] ?>" alt="<?= $friendOfUser['pseudo'] ?>">
                            <figcaption><?= $friendOfUser['pseudo'] ?></figcaption>
                        </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="containerMyInfo">
            <form action="src/models/treatment/modelHomepageUserLoginAddFriends.php" method="post"  >
                <div>
                    <label for="pseudo">Entrer le pseudo de <br> votre ami :</label>
                    <input type="text" placeholder="ne pas mettre le #" id="pseudo" name="pseudo">
                    <input type="text" id="user_id" name="user_id" value="<?= $_SESSION['user']['user_id'] ?>" style="display : none">
                </div>
                <input type="submit" value="Ajouter cette amis">
            </form>
        </div>
    </main>
    <?php require 'elements/footer.php' ?>
</body>
<?php $content = ob_get_clean(); ?>

<?php require 'layout.php' ?>