<form id="searchForm">
    <input type="text" id="search_text" name="search_text" />

    <select name="search_type">
        <!-- L'attribut "value" correspond à la valeur qui sera retournée lors de la soumission de notre formulaire -->
        <option value="Toutes catégories">Toutes catégories</option>
        <option value="Voiture">Voiture</option>
        <option value="Moto">Moto</option>
    </select>

    <select>
        <option>Toutes catégories</option>
        <option>Voiture</option>
        <option>Moto</option>
    </select>

    <!-- On utilise la nouvelle balise HTML5 "datalist" pour créer une autocomplétion sur notre champ "ville" -->
    <datalist id="cities">
        <option label="Paris">
        <option label="Marseille">
        <option label="Lyon">
        <option label="Toulouse">
        <option label="Nice">
        <option label="Nantes">
        <option label="Strasbourg">
        <option label="Montpellier">
        <option label="Bordeaux">
        <option label="Rennes">
        <option label="Le Havre">
        <option label="Reims">
        <option label="Lille">
        <option label="Saint-Étienne">
        <option label="Toulon ">
    </datalist>
    <!-- L'attribut "placeholder" sert à préciser l'utilité du champ ; le texte indiqué est affichée dans le champ quand celui-ci est vide -->
    <input type="text" list="cities" id="search_city" name="search_city" placeholder="Villes ou codes postaux" />

    <input type="submit" value="Chercher" />
</form>

<div id="mainContent">
    <!-- On utilise la nouvelle balise HTML5 "section" pour définir un groupe d'éléments <article> -->
    <section>
        <h2>Contact</h2>
    </section>

    <!-- On utilise la nouvelle balise HTML5 "aside" pour indiquer un "panneau latéral" à notre site -->
    <aside>
        <h2 class="title important">FAQ</h2>
    </aside>
</div>

<form id="contactform" method="post">
    <div class="fcontact">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name='name'/>
    </div>
    <div class="fcontact">
        <label for="objet">Objet :</label>
        <input type="text" id="objet" name ='objet'/>
    </div>
    <div class="fcontact">
        <label for="message">Message :</label>
        <textarea id="message" name='message'></textarea>
    </div>
    <div class="button">
        <button type="submit" name='sendmsg'>Envoyer votre message</button>
    </div>
</form>