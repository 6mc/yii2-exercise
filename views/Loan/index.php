<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Loan;
use yii\widgets\LinkPager;
use yii\widgets\Breadcrumbs;
//use Yii;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loans';


//$this->params['breadcrumbs'][] = $this->title;


?>

           <?= Breadcrumbs::widget([
    //'options' => ['style' => 'margin-top:0;'],

    //        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
   'links' =>    [
    ['label' => 'Create Loan',   // required
    'url' => 'index.php?r=loan/create',      // optional, will be processed by Url::to()
],
   ['label' => 'Show Loans',   // required
    'url' => 'index.php?r=loan/index',      // optional, will be processed by Url::to()
]]


        ]) ?>



<div class="loan-index">

  
  

    <?= GridView::widget([
        'filterModel' => $searchModel,
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
            ['class' => 'yii\grid\ActionColumn']
  // [

  //                 'format' => 'raw',

  //                 'value' => function($data) {

  //                       return Html::a('Deactive', [ 'Deactivate' ], ['class' => 'btn']);

  //                 }


  //         ],

        ],
    ]);

     ?>


</div>
<script type="text/javascript"> 
    rows = document.getElementsByClassName('td');
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();    

         for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[4].innerHTML<10) {rows[i].className="td yellow"}
    }


    for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[7].innerHTML>date) {rows[i].className="td red"}
    }
    

    for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[9].innerHTML=="No") {rows[i].className="td deactive"}
    }

    boxes = document.getElementById('w0-filters'); sum = document.getElementsByClassName("summary")[0]; sum.appendChild(boxes); tops = document.getElementsByTagName("INPUT"); tops[0].placeholder = "id"; tops[1].placeholder = "user id"; tops[2].placeholder = "Amount"; tops[3].placeholder = "interest"; tops[4].placeholder = "duration"; tops[5].placeholder = "Start Date"; tops[6].placeholder = "End Date"; tops[7].placeholder = "campaign"; // tops[8].placeholder = "Status";

</script>
