<?php
$mesAnnonces = $oAnManager->getList();
?>
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
        <h2>Consulter les annonces</h2>
        <?php
        foreach ($mesAnnonces as $annonce) {
            echo '<a href="index.php?page=detail_annonce&id=' . $annonce->getVar('id') . '">';
            echo '<article class="annonce">';
            echo '<div class="date">' . $annonce->getVar('creat_date') . '</div>';
            echo '<div class="image"><img src="userfiles/img/' . $annonce->getVar("picture") . '" /></div>';
            echo '<div class="description">';
            echo '<h3>' . $annonce->getVar('id') . ' ' . $annonce->getVar('title') . '</h3>';
            $dpt = $annonce->getVar('description');
            echo mb_substr($dpt, 0, 100);  // abcd
            ?><br><?php
            echo '<strong class="important">' . $annonce->getVar('price') . ' €</strong>';
            echo '</div>';
            echo '</article>';
            echo '</a>';
            echo '<hr />';
        }
        ?>
    </section>

    <!-- On utilise la nouvelle balise HTML5 "aside" pour indiquer un "panneau latéral" à notre site -->
    <aside>
        <h2 class="title important">Annonces à la une</h2>
        <?php
        foreach ($mesAnnoncesSide as $annonce) {
            echo '<article class="annonce-side">';
            echo '<img src="' . $annonce['image'] . '" alt="description annonce" title="Description de l\'annonce" />';
            echo '<h3>' . $annonce['titre'] . '</h3>';
            echo '<p><strong class="important">' . $annonce['prix'] . ' €</strong></p>';
            echo '</article>';
        }
        ?>
        <button>En savoir plus</button>
    </aside>
</div>