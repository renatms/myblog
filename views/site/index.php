<?php
/* @var $articles app\models\Article */
/* @var $pagination app\models\Article */
/* @var $categories app\models\Article */


use yii\helpers\Url;
use yii\widgets\LinkPager;

?>
<div class="sidebar_box pull-right">
    <h3>Categories</h3>

    <ul class="sidebar_menu">
        <?php foreach ($categories as $category): ?>
            <li><a href="<?= Url::toRoute([
                    'site/category',
                    'id' => $category->id
                ]); ?>">&raquo; <?= $category->title; ?> <span><?= $category->getArticles()->count(); ?></span></a></li>
        <?php endforeach; ?>
    </ul>

</div>

<div id="templatemo_content">

    <?php foreach ($articles as $article): ?>
        <div class="post_box">

            <h2><a href="<?= Url::toRoute(['site/single', 'id' => $article->id]) ?>"><?= $article->title ?></a></h2>
            <div class="news_meta">Posted on <a
                        href="<?= Url::toRoute([
                            'site/category',
                            'id' => $article->category->id
                        ]) ?>"><?= $article->category->title ?></a>, <?= $article->getDate() ?> </a></div>
            <div class="image_wrapper"><a href="http://www.templatemo.com/page/1" target="_parent">
                    <img src="<?= $article->getImage() ?>" width="300" alt="image 1"/></a>
            </div>
            <p>
                <?= $article->description; ?>
                <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>" class="continue">Continue ...</a>
            </p>
            <div class="cleaner"></div>
            <ul class="text-center pull-right">
                Viewed: <?= (int)$article->viewed ?>
            </ul>
        </div>
    <?php endforeach; ?>

    <?php echo LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>

</div>
