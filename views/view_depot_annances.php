<?php
if ($_SESSION['oUtilisateur'] instanceof User) {
    ?>

    <h1>déposer une annonce</h1>
    <form  id='annonce' method="post" enctype ="multipart/form-data">
        <div>
            <label class='label' for="annonce">Votre annonce :</label>
            <input type="text" id="annonce" name="annonce"/>
        </div>

        <div>
            <label class='label' for="description">Déscription :</label>
            <textarea id="description" name= 'description'></textarea>
        </div>
        <div>
            <label class='label' for="prix">prix en euros :</label>
            <input type="text" id="prix" name='prix'/>
        </div>
        <div>
            <!-- On limite le fichier à 100Ko -->
            <input type="hidden" name="MAX_FILE_SIZE" value="60000">
            Fichier : <input type="file" name="image">
        </div>
        <div class="button">
            <button type="submit" name="sendAnnonce" value="Envoyer annonce">Envoyer votre annonce</button>

        </div>
    </form>
    <?php
} else {
    echo ' conectez vous pour accéder a cette page';
}
?>
