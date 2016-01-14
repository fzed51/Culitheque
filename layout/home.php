<?php
$__layout = 'defaut';
$page->addStyle('<link href="css/home.css" rel="stylesheet" type="text/css">');
?>
<div class="header"><div class="header-content">
        <div class="titre"><span class="logo"><img src="img/logo.png" height="60" width="60" style="color:#fff"/></span>Culithèque</div>
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
        $pages = new \App\PagesManager(content_path . DIRECTORY_SEPARATOR . 'recettes');

        foreach ($pages as $recette) :
            ?>
            <a href="<?= $recette->getUrl(); ?>">
                <div class="recette">
                    <img src="img/recettes/<?= $recette->get('illustration'); ?>" alt="photo <?= $recette->get('title'); ?>" />
                    <p><?= $recette->get('title'); ?></p>
                </div>
            </a>
            <?php
        endforeach;
        ?>
    </div>
</div>
