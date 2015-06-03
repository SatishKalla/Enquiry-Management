<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\widgets\LinkPager;
use dosamigos\datetimepicker\DateTimePicker;


?>
<span id='title'><h3><b>Enquiries List</b></h3></span>
<div id='enqlist' style="width: 100%;">
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','header'=>'S.No'],
            'name',
            //'date',
            ['attribute'=>'date','format'=>['date','php:d-m-Y h:i:s'],'label'=>'Date'],
            'purpose',
            // 'contactno',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<!-- <div id='followups'>
<?php
	$this->title = 'Enquiry Form';
$this->params['breadcrumbs'][] = $this->title;
?>
 <h1><?= Html::encode($this->title) ?></h1>

  <?php $form = ActiveForm::begin(['layout' => 'horizontal','fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-3',
            'offset' => 'col-sm-offset-3',
            'wrapper' => 'col-sm-3',
            'error' => '',
            'hint' => '',
        ],
    ],	]); ?>
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
    <?= $form->field($mod, 'status') ?> 
  
       
    <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'name' => 'submit-button','style' => 'margin-left:30%;padding-left:50px;padding-right:50px;']) ?>

</div>
<span id='title'><h3><b>FollowUp List</b></h3></span>
<div id="followups" style="width: 50%;">
<table class='table table-hover'>
    <thead>

        <tr class="active">
        	<th data-field="followupid" >Followup Id</th>
            <th data-field="name" >Name</th>
            <th data-field="issueddate">Issued Date</th>
            <th data-field="status">Status</th>   
            <th data-field="view"></th>
            <th data-field="edit"></th>
        </tr>
    </thead>
    <tbody>
       	<?php

  /*   // display pagination
	foreach ($models as $values) 
			{
				$id=$values->enquiry_id;
				$name=$values->name;
				$date=$values->date;
				$pur=$values->purpose;
				$num=$values->contactno;

				echo "<tr>";
				echo "<td class='success'>$id</td>";
				echo "<td class='success'>$name</td>";
				echo "<td class='success'>$pur</td>";
				echo "<td class='success'>$date</td>";
				echo "<td class='success'>$num</td>";
				echo "<td class='success'><a href='#'>View</a></td>";
				echo "<td class='success'><a href='#'>Edit</a></td>";

				echo "</tr>";			

			}
*/
			
    	?>

    </tbody>

</table>
<div id='page'><?php echo LinkPager::widget(['pagination'=>$pagination]) ?>	</div> -->
</div>