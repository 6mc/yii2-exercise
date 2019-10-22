<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Loan;
//use Yii;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="loan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Loan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
   
        'options' => ['class'=>'ctn'],
        'summary' => '<p class="summary">Total amount: <strong class="total">'.$total.' €</strong></p>',
       //'rowOptions'  => ['class'=>'td'],
       'rowOptions'  => ['class'=> 'td'],
       'filterRowOptions'  => ['class'=>'filterrow'],
       'captionOptions'  => ['class'=>'caps'],
       'headerRowOptions'  => ['class'=>'headerrow'],
       'tableOptions'  => ['class'=>'table'],
       // 'columns'  =>['class'=>'row'],
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'amount',
            'interest',
            'duration',
            'start_date',
            'end_date',
            'campaign',
            'status:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
<script type="text/javascript"> 
    rows = document.getElementsByClassName('td');

    for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[9].innerHTML=="No") {rows[i].className="td deactive"}
    }
        
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();    


    for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[7].innerHTML>date) {rows[i].className="td red"}
    }
    


</script>
