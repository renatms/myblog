<?php
/* @var $article app\models\Article */
use yii\helpers\Url;

?>

<div id="templatemo_content">

    <div class="post_box">

        <h2><a href="<?= Url::toRoute(['site/single', 'id' => $article->id]) ?>"><?= $article->title ?></a></h2>
        <div class="news_meta">Posted on <a href="<?= Url::toRoute([
                'site/category',
                'id' => $article->category->id
            ]) ?>"><?= $article->category->title ?></a>, <?= $article->getDate() ?> </a></div>
        <div class="image_wrapper"><a href="http://www.templatemo.com/page/1" target="_parent">
                <img src="<?= $article->getImage() ?>" width="300" alt="image 1"/></a>
        </div>
        <p>
            <?= $article->content; ?>
            <a href="<?= Url::toRoute(['site/index']); ?>" class="continue">Back ...</a>
        </p>
        <div class="cleaner"></div>
        <ul class="text-center pull-right">
            <?= (int)$article->viewed; ?>
        </ul>
    </div>

</div>
