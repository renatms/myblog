<?php
/* @var $articles app\models\Article */
use yii\helpers\Url;

?>

<div id="templatemo_content">

    <?php foreach ($articles as $article): ?>
        <div class="post_box">

            <h2><a href="#"><?= $article->title ?></a></h2>
            <div class="news_meta">Posted on <a href="#">My Blog</a>, <?= $article->getDate() ?> </a></div>
            <div class="image_wrapper"><a href="http://www.templatemo.com/page/1" target="_parent">
                    <img src="<?= $article->getImage() ?>" width="300" alt="image 1"/></a>
            </div>
            <p>
                <?= $article->description; ?>
                <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>" class="continue">Continue ...</a>
            </p>
            <div class="cleaner"></div>
        </div>
    <?php endforeach; ?>


</div>