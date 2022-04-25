<?php include 'partials/top.html.php';?>

<h1>Hello Blog !</h1>

<div class="container">
    <div class="row">
        <!-- foreach($iterable expression as $value) -->
        <?php foreach($articles as $article) : ?>
            <div class="card" style="width: 18rem; margin-right: 10px;">
                <div class="card-body col-md-12">
                    <h5 class="card-title"><?=$article['title']?></h5>
                    <p class="card-text"><?=$article['content']?></p>
                    <a href="?controller=blog&action=article" class="card-link">Lire la suite</a>
                </div>
            </div>  
        <?php endforeach; ?>
    </div>
</div>

<?php include 'partials/bottom.html.php';?>


