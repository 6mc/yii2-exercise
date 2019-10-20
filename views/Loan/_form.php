<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Loan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="loan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'interest')->textInput() ?>

    <?= $form->field($model, 'duration')->textInput() ?>

<?= $form->field($model, 'start_date')->widget(DatePicker::classname(), [
    'options' => ['autocomplete'=>'off'],
    'pluginOptions' => [
        'format' => 'yyyy-MM-dd',
        'todayHighlight' => true
    ]
]) ?>


<?= $form->field($model, 'end_date')->widget(DatePicker::classname(), [
       'options' => ['autocomplete'=>'off'],
       'pluginOptions' => [
        'format' => 'yyyy-MM-dd',
        'todayHighlight' => true
    ]
]) ?>


    <?= $form->field($model, 'campaign')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
