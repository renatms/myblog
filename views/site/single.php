<?php
/* @var $article app\models\Article */
/* @var $comment app\models\Comment */
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
            Viewed: <?= (int)$article->getViewed($article->id); ?>
        </ul>
    </div>

</div>


<?php if (!empty($comments)): ?>

    <?php foreach ($comments as $comment): ?>

        <div class="bottom-comment"><!--bottom comment-->
            <h4>comments</h4>

            <div class="comment-img">
                <img width="30" class="img-circle" src="<?= $comment->user->image; ?>" alt="">
            </div>

            <div class="comment-text">
                <a href="#" class="replay btn pull-right"> Replay</a>
                <h5><?= $comment->user->name ?></h5>

                <p class="comment-date">
                    <?= $comment->getDate(); ?>
                </p>


                <p class="para"><?= $comment->text; ?></p>
            </div>
        </div>
        <!-- end bottom comment-->

    <?php endforeach; ?>

<?php endif; ?>

<?php if (!Yii::$app->user->isGuest): ?>
    <div class="leave-comment"><!--leave comment-->
        <h4>Leave a reply</h4>

        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => ['site/comment', 'id' => $article->id], 'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form']]) ?>

        <div class="form-group">
            <div class="col-md-12">
                <?= $form->field($comment, 'text')->textarea(['class' => 'form-control', 'placeholder' => 'Write message'])->label(false) ?>
            </div>
        </div>
        <button type="submit" class="btn send-btn">Post Comment</button>

        <?php \yii\widgets\ActiveForm::end(); ?>
    </div><!--end leave comment-->
<?php endif; ?>
