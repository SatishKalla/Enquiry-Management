<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Enquiry Management',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
           echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index'],'visible' => !Yii::$app->user->isGuest,],
                    ['label' => 'Enquiry', 'url' => ['/enquiry/enquiry'],'visible' => !Yii::$app->user->isGuest,],
                    
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        //['label' => 'Contact', 'url' => ['/site/contact']],
            //(' . Yii::$app->user->identity->username . ')

        ?>
 
        <div class="container">
        <?php
       if(Yii::$app->user->isGuest) 
       {
          
       } 
        else 
        {
         echo Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]);
        }
       
         ?>   
            <?= $content ?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
           <b> <p class="pull-left">&copy; Enquiry Management <?= date('Y') ?></p></b>
            <b><p class="pull-right"><?= "Developed By SatishKalla"  ?></p></b>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
