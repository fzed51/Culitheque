<?php
$__layout = 'defaut';

$page->addStyle('<link href="/css/recette.css" rel="stylesheet" type="text/css">');
//$page->addStyle('<link href="/css/recette-print.css" rel="stylesheet" type="text/css" media="print">');
?>
<div class="header">
    <a class="go-home" href="/"><img src="/img/logo.png" class="logo"/>Culithèque</a>

</div>
<div class="content">
    <div class="recette">
        <div class="recette-titre">
            <h1><?= $page->get('title'); ?></h1>
        </div>
        <div class="recette-infos">
            <dl>
                <?php
                if ($page->has('t_preparation')) {
                    echo "<dt>préparation : </dt><dd>" . $page->get('t_preparation') . "</dd>" . PHP_EOL;
                }
                if ($page->has('t_cuisson')) {
                    echo "<dt>cuisson : </dt><dd>" . $page->get('t_cuisson') . "</dd>" . PHP_EOL;
                }
                if ($page->has('parts')) {
                    echo "<dt>nb. de parts : </dt><dd>" . $page->get('parts') . "</dd>" . PHP_EOL;
                }
                ?>
            </dl>
        </div>
        <div class="recette-illustration-ingredients">
            <div class="recette-illustration">
                <?php if ($page->has('illustration')): ?>
                    <img src="/img/recettes/<?= $page->get('illustration'); ?>" alt = "ilustration de la recette"/>
                <?php else: ?>
                    <img src="/img/toque-blanche.png" alt = "pas d'ilustration"/>
                <?php endif ?>

            </div>
            <div class = "recette-ingredients">
                <h2>Ingrédients :</h2>

                <ul>
                    <?php
                    $ingredients = $page->get('ingredients');
                    foreach ($ingredients as $ingredient) {
                        echo '<li>' . $ingredient . '</li>' . PHP_EOL;
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="recette-preparation">

            <h2>Préparation :</h2>
            <?= $content; ?>
        </div>

    </div>
</div>