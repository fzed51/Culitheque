<?php
$__layout = 'defaut';
$page->addStyle('<link href="css/home.css" rel="stylesheet" type="text/css">');
?>
<div class="header">
    <div class="titre"><?= $page->get('header_titre'); ?></div>
    <div class="sous-titre"><?= $content; ?></div>
</div>
<div class="content">
    <div class="filtres">
        <div class="filtre">Entée</div>
        <div class="filtre">Plat</div>
        <div class="filtre">Dessert</div>
    </div>
    <div class="recettes">

    </div>
</div>
