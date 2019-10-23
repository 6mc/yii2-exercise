<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
 use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name:ntext',
            'last_name:ntext',
            'email:ntext',
            'personal_code',
            'phone',
            'active:boolean',
            'dead:boolean',
            'lang:ntext',
        ],
    ]) ?>

</div>
       // Here first we find the loans of the user. With the help of relations of models
    <?php $loans =  User::find()->where(['id'=>$model->id])->one()->loans;
        echo "<h1>Loans</h1> <tr>
  <table class ='table table-striped table-bordered detail-view' style='width:100%'>
    <th>Amount</th>
    <th>interest</th>
    <th>Duration</th>
    <th>Start date</th>
    <th>End Date</th>
    <th>Campaign</th>
  </tr>";
          foreach ($loans as $loan) {
            echo "<tr><td>" .$loan->amount . "</td><td>". $loan->interest . "</td><td>". $loan->duration . "</td><td>". $loan->start_date . "</td><td>". $loan->end_date . "</td><td>". $loan->campaign ."</td></tr>";
          }
echo "</table>";
     ?>
