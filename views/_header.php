<img src="http://static.leboncoin.fr/img/logo_25.png" alt="logo" title="Mon projet web" />
<?php
if ($_SESSION['oUtilisateur'] instanceof User) {
    echo $_SESSION['oUtilisateur']->getUEmail() . ' vous ete conectez';
    ?>

    <br/><a href="index.php?logout">se déconecter</a>
<?php } else { ?>
    <form method = 'POST' >
        <div>
            <!-- Les champs de formulaire (input, textarea, select) doivent avoir un attribut "name" qui correspondra à la clé de notre tableau PHP quand nous récupérons les données de notre formulaire -->
            <input type="email" id="email" name="email" placeholder="Votre email" />
        </div>
        <div>
            <input type="password" id="password" name="pwd" placeholder="Votre mot de passe" />
        </div>
        <input id="formulaire" type="submit" name="loginForm" value="Se connecter" />
    </form>

<?php } ?>






<!-- On utilise la nouvelle balise HTML5 "nav" pour indiquer un élement de navigation dans notre site -->
<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href='#' id=AA>Accueil Ajax</a></li>
        <li><a href="index.php?page=depot_annances">deposer une annances</a></li>
        <li>Demandes</li>
        <li>Mes annonces</li>
        <li>Boutiques</li>
        <li>Mon compte</li>
        <li>Aide</li>
    </ul>
</nav>
<script>
    $('#AA').click(function () {

        $.ajax({
            async: true,
            type: 'POST',
            url: "ajax.php",
            data: 'action=accueil',
            error: function (dataerror) {
                alert(dataerror);
            },
            success: function (data) {

                $('#mondiv').html(data);
            }
        });
    });
</script>