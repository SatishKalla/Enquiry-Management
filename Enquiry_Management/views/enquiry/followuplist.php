<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\EnquiryForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Enquiry Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enquiry-form-view">    

  <!--   <p>
        <?= Html::a('Update', ['update', 'id' => $model->enquiry_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->enquiry_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

<div class='col-md-6'>
<h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'enquiry_id',
            'name',
            'date',
            'purpose',
            'description:ntext',
            'contactno',
        ],
    ]) ?>
</div>
<?php
if($flg == "notclosed"){
?>

   <div class='col-md-6'>
<?php
    $this->title = 'FollowUp Form';
$this->params['breadcrumbs'][] = $this->title;
?>
 <h1><?= Html::encode($this->title) ?></h1>
  <?php $form = ActiveForm::begin(['layout' => 'horizontal','fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            //'offset' => 'col-sm-offset-3',
            'wrapper' => 'col-md-8',
            'error' => '',
            'hint' => '',
            'class'=>'col-md-12',        
        ],
    ],  ]); ?>
    <div id='frm'>
    <?= $form->field($mod, 'name') ?>
    <?= $form->field($mod, 'issueddate')->widget(DateTimePicker::className(), [
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
    <?= $form->field($mod, 'status')->dropDownList(['pending'=>'Pending','processing'=>'Processing','close'=>'Close'],['prompt'=>'Please Select']) ?> 
  <div class="col-lg-offset-4 col-lg-4">       
    <?= Html::submitButton('Submit', ['class' => 'btn btn-success btn-block', 'name' => 'submit-button','style' => 'margin-left:30%;padding-left:50px;padding-right:50px;']) ?>
</div>
</div>
</div>
<?php
}
?>
<div class="col-md-12">
<span id='title'><h3><b>FollowUp List</b></h3></span>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'S.No'],
            'followupsid',
            'name',
            ['attribute'=>'issueddate','format'=>['date','php:d-m-Y h:i:s'],'label'=>'Date'],
            'status',
            // 'contactno',
            ['class' => 'yii\grid\ActionColumn','visible'=>false],
        ],
    ]); ?>
</div>
</div>