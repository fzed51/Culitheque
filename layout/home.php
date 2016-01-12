<?php
$__layout = 'defaut';
$page->addStyle('<link href="css/home.css" rel="stylesheet" type="text/css">');
?>
<div class="header"><div class="header-content">
    <div class="titre"><span class="logo"><img src="img/<?= $page->get('logo');?>" height="60" width="60" style="color:#fff"/></span><?= $page->get('header_titre'); ?></div>
    <div class="sous-titre"><?= $content; ?></div>
</div></div>
<div class="content">
    <div class="filtres">
        <div class="filtre">Entée</div>
        <div class="filtre">Plat</div>
        <div class="filtre">Dessert</div>
    </div>
    <div class="recettes">
        <?php
        for($i=0; $i<10; $i++):
        ?>
        <div class="recette">
            <img src="img/recettes/galette_pomme_cannelle.jpg" alt="photo galette a la pomme cannelle" />
            <p>galette a la pomme cannelle</p>
        </div>
        <?php
        endfor;
        ?>
    </div>
</div>
