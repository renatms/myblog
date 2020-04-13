<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="navbar-inverse navbar-fixed-top" id="bs-example-navbar-collapse-1">

        <ul class="nav navbar-nav text-uppercase">
            <li><a data-toggle="dropdown" class="dropdown-toggle" href="/">Home</a>

            </li>
            <li><a data-toggle="dropdown" class="dropdown-toggle" href="/web/site/about">About</a>

            </li>
        </ul>
        <div class="i_con">
            <ul class="nav navbar-nav text-uppercase">
                <?php if (Yii::$app->user->isGuest): ?>
                    <li><a href="<?= Url::toRoute(['auth/login']) ?>">Login</a></li>
                    <li><a href="<?= Url::toRoute(['auth/signup']) ?>">Register</a></li>
                <?php else: ?>
                    <?= Html::beginForm(['/auth/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->name . ')',
                        ['class' => 'btn btn-link logout', 'style' => "padding-top:10px;"]
                    )
                    . Html::endForm() ?>
                <?php endif; ?>
            </ul>
        </div>

    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Blog <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
