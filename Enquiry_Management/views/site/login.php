<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
 
    <div class="container" style="margin-top:86px">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <strong> Sign in to continue</strong>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['id'=>'LoginForm','layout' => 'horizontal','fieldConfig' => [
                           // 'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                            'horizontalCssClasses' => [
                               
                               'offset' => 'col-sm-offset-3',
                                'wrapper' => 'col-sm-8',
                                'error' => '',
                                'hint' => '',
                            ],
                        ],  ]); ?>


              
                                
                        <div class="row">                                               
                            <?= $form->field($model, 'username', ['template' => '
                                               <div class="col-sm-1">{label}</div>
                                               <div class="col-sm-10">
                                                   <div class="input-group">
                                                       <span class="input-group-addon">
                                                            <i class="glyphicon glyphicon-user"></i>
                                                        </span> 
                                                      {input}
                                                   </div>
                                                   {error}{hint}
                                               </div>'])->textInput(array('placeholder' => 'Username'))->label(false) ?>
                                                          
                            <?= $form->field($model, 'password', ['template' => '
                                           <div class="col-sm-1">{label}</div>
                                           <div class="col-sm-10">
                                               <div class="input-group">
                                                  <span class="input-group-addon">
                                                    <i class="glyphicon glyphicon-lock"></i>
                                                </span>
                                                  {input}
                                               </div>
                                               {error}{hint}
                                           </div>'])->passwordInput(array('placeholder' => 'Password'))->label(false) ?>
                                                                   
                            <?= $form->field($model, 'rememberMe', [      
                                            ])->checkbox() ?>
                            <div class="form-group">
                                <div class="col-lg-offset-1 col-lg-10">
                                    <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                                     <?php
                                    /*Modal::begin(
                                        [
                                            'header'=>'Recover Password',
                                            'id'=>'rp',
                                            'size'=>'modal-lg',
                                        ]);
                                    echo "<div id='rpcontent'></div>'";
                                    Modal::end();*/
                                    ?> 
                                </div> 
                            </div>
                            <div class="col-lg-offset-4"><a href="#" type="button"  data-toggle="modal" data-target="#forgotpassword">Forgot Password</a></div>
                        </div>                            
                    </div>
                        <div class="panel-footer ">                                   
                            Don't have an account! <strong><a href="#" type="button"  data-toggle="modal" data-target="#signup">
                            Signup</a></strong> here.
                                          <?php
                                         /*    Modal::begin(
                                                [
                                                    'header'=>'Signup',
                                                    'id'=>'modal',
                                                    'size'=>'modal-lg',
                                                ]);
                                            echo "<div id='modalcontent'></div>'";
                                            Modal::end();*/
                                            ?> 
                        </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Password Recovery</h4>
      </div>
      <div class="modal-body">
       <center><h3>Enter your Username or Mail Id</h3></center>                
              <center><p>Provide a valid Username/Mail Id.</p></center> 
         <div class="col-sm-11">      
              
      <?= $form->field($model, 'username')->input('email',['placeholder'=>'example@email.com or satish1223'])->label(false) ?>                         
      </div><br/> <br/>        
    </div>

      <div class="modal-footer">                                     
            <?= Html::submitButton('Get Password', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>                             
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>       
     
    </div>
  </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register with Us</h4>
      </div>
      <div class="modal-body">

      <div class="row">      
       <?= $form->field($model, 'username')->textInput(['style' => 'width:30%','placeholder' => 'First Name'])->label(false); ?>    
       <?= $form->field($model, 'username')->textInput(['style' => 'width:30%','placeholder' => 'Last Name'])->label(false); ?>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div> 
