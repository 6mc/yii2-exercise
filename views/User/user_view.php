<?php   
use yii\helpers\Html;   
use yii\widgets\ActiveForm;   
?>   
   
<?php $form = ActiveForm::begin(); ?>   
   
    <?= $form->field($model, 'first_name'); ?>   
    <?= $form->field($model, 'last_name'); ?>   
    <?= $form->field($model, 'email'); ?>   
     <?= $form->field($model, 'personal_code'); ?> 
      <?= $form->field($model, 'phone'); ?> 
       <?= $form->field($model, 'active'); ?> 
        <?= $form->field($model, 'dead'); ?>
      <?= $form->field($model, 'lang'); ?>
           
      
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->   
     isNewRecord ? 'btn btn-success' : 'btn btn-primary']); ?>   
   
   <?php ActiveForm::end(); ?>  