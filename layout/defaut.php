<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Culitheque<?= empty($page->get('title')) ? '' : ' - ' . $page->get('title'); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <!--<link href="css/reset.css" type="text/css" rel="stylesheet" >-->
        <!--<link href="css/grid.css" type="text/css" rel="stylesheet" >-->
        <link href="css/defaut.css" type="text/css" rel="stylesheet" >
        <?= $page->getStyle(); ?>
    </head>
    <body>
        <?= $page->getContent(); ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <?= $page->getScript(); ?>
    </body>
</html>
