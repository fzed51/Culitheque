<?php
if (!isset($_SESSION['filtre'])) {
    $_SESSION['filtre'] = [];
}
if (isset($_GET['f'])) {
    $_SESSION['filtre'][] = strtoupper($_GET['f']);
}
if (isset($_GET['af'])) {
    if ($_GET['af'] !== 'ALL') {
        if (isset($_SESSION['filtre'][$_GET['af']])) {
            unset($_SESSION['filtre'][$_GET['af']]);
        }
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
        if (!empty($FILTRE)) {
            ?>
            <a class="unfiltre tout" href="/?af=ALL#filtre"> X </a>
            <?php
            $tagFiltre = [];
            foreach ($FILTRE as $idFiltre) {
                if (isset($tags[$idFiltre])) {
                    $tagFiltre[$idFiltre] = $tags[$idFiltre];
                    unset($tags[$idFiltre]);
                }
            }
            foreach ($tagFiltre as $idTag => $tag):
                ?>
                <a class="unfiltre" href="/?af=<?= $idTag; ?>#filtre"><?= $tag; ?></a>
                <?php
            endforeach;
        }
        if (!empty($tags)) {
            foreach ($tags as $idTag => $tag):
                ?>
                <a class="filtre" href="/?f=<?= $idTag; ?>#filtre"><?= $tag; ?></a>
                <?php
            endforeach;
        }
        ?>
        <!--<div class="filtre">Entée</div>
        <div class="filtre">Plat</div>
        <div class="filtre">Dessert</div>-->
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
