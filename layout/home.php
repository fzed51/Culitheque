<?php
if (!isset($_SESSION['filtre'])) {
    $_SESSION['filtre'] = [];
}
if (isset($_GET['f'])) {
    if ($_GET['f'] !== 'RAZ') {
        $_SESSION['filtre'][] = strtoupper($_GET['f']);
    } else {
        $_SESSION['filtre'] = [];
    }
}
$FILTRE = $_SESSION['filtre'];

$__layout = 'defaut';
$page->addStyle('<link href="css/home.css" rel="stylesheet" type="text/css">');
?>
<div class="header"><div class="header-content">
        <div class="titre"><span class="logo"><img src="img/logo.png" height="60" width="60" style="color:#fff"/></span>Culithèque</div>
        <div class="sous-titre"><?= $content; ?></div>
    </div></div>
<div class="content">
    <a name="filtre"></a>
    <?php
    $recettes = new \App\PagesManager(recette_path);
    if (!empty($FILTRE)) {
        $recettes = $recettes->withTag($FILTRE);
    }
    ?>
    <div class="filtres">
        <?php
        $tags = $recettes->getTags();
        ?>
        <div class="filtre">Entée</div>
        <div class="filtre">Plat</div>
        <div class="filtre">Dessert</div>
    </div>
    <div class="recettes">
        <?php foreach ($recettes as $recette) : ?>
            <a href="<?= $recette->getUrl(); ?>">
                <div class="recette">
                    <?php if ($recette->has('illustration')): ?>
                        <img src="/img/recettes/<?= $recette->get('illustration'); ?>" alt="photo <?= $recette->get('title'); ?>" />
                    <?php else: ?>
                        <img src="/img/toque-blanche.png" alt = "pas d'ilustration"/>
                    <?php endif ?>
                    <p><?= $recette->get('title'); ?></p>
                </div>
            </a>
            <?php
        endforeach;
        ?>
    </div>
</div>
