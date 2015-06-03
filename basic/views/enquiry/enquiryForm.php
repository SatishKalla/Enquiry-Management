<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\EnquiryForm;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Enquiry Form';
$this->params['breadcrumbs'][] = $this->title;
?>
 <h1><?= Html::encode($this->title) ?></h1>
<div class="col-md-6">
  <?php $form = ActiveForm::begin(['layout' => 'horizontal','fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-3',
            'wrapper' => 'col-sm-7',
            'error' => '',
            'hint' => '',
        ],
    ],	]); ?>
    
    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'date')->widget(DateTimePicker::className(), [
   'language' => 'en',
   //'size' => 'ms',
   //'template' => '{input}',
    //'pickButtonIcon' => 'glyphicon glyphicon-time',
    'inline' => false,
    'clientOptions' => [
        //'startView' => 1,
        //'minView' => 0,
        //'maxView' => 1,
        'autoclose' => true,
        //'linkFormat' => 'HH:ii P', // if inline = true
        'format' => 'dd-MM-yyyy HH:ii:ss', // if inline = false
        'todayBtn' => false
    ]
]);?>
    <?= $form->field($model, 'purpose') ?>
    <?= $form->field($model, 'description') ?>
    <?= $form->field($model, 'contactno') ?>


  
   <div class="col-lg-offset-3 col-lg-6">   
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-block', 'name' => 'submit-button','style' => 'margin-left:30%;padding-left:50px;padding-right:50px;']) ?>
</div>
    </div>
    <div class="col-md-6">
    <?php echo yii\bootstrap\Carousel::widget([
    'items' => [
        // the item contains only the image
        '<img src="/basic/images/1.png"/>',
        // equivalent to the above
        ['content' => '<img src="/basic/images/4.jpg"/>'],
        // the item contains both the image and the caption
        [
            'content' => '<img src="/basic/images/3.png"/>',
                        
        ],
    ]
]);?>
    </div>
 <?php ActiveForm::end(); ?>
    