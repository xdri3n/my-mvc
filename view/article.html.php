<?php include 'partials/top.html.php';?>

<h3>Je suis un article !</h3>

<p>Bien joué Joe</p>

<?php foreach($articles as $article) : ?>
    <?=$article?>
<?php endforeach; ?>

<?php include 'partials/bottom.html.php';?>