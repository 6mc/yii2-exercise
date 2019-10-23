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





?>

           <?= Breadcrumbs::widget([ // I used breadcrumb as a sub-navbar
 
   'links' =>    [
    ['label' => 'Create Loan',   
    'url' => 'index.php?r=loan/create',      
],
   ['label' => 'Show Loans',  
    'url' => 'index.php?r=loan/index',      
]]


        ]) ?>



<div class="loan-index">

  
  

    <?= GridView::widget([ // I used yii GridView widget to display data in order
        'filterModel' => $searchModel,
        'options' => ['class'=>'ctn'],
        'summary' => '<p class="summary">Total amount: <strong class="total">'.$total.' €</strong></p>',
       
       'rowOptions'  => ['class'=> 'td'],
       'filterRowOptions'  => ['class'=>'filterrow'],
       'captionOptions'  => ['class'=>'caps'],
       'headerRowOptions'  => ['class'=>'headerrow'],
       'tableOptions'  => ['class'=>'table'],
       
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

        ],
    ]);

     ?>


</div>
<script type="text/javascript"> // Injected Javascript When built-in customization not enough
    rows = document.getElementsByClassName('td');
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();    

         for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[4].innerHTML<10) {rows[i].className="td yellow"} // first colored the rows with yellow if their interest is lower than 10
    }


    for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[7].innerHTML>date) {rows[i].className="td red"} // then colored it to red when there's still time to end date
    }
    

    for (var i = rows.length - 1; i >= 0; i--) {
        if (rows[i].cells[9].innerHTML=="No") {rows[i].className="td deactive"} //then I colored it to Gray if its status is 0
    }
                                                                                // Below I relocated the search inputs to give it similar look to your example
    boxes = document.getElementById('w0-filters'); sum = document.getElementsByClassName("summary")[0]; sum.appendChild(boxes); tops = document.getElementsByTagName("INPUT"); tops[0].placeholder = "id"; tops[1].placeholder = "user id"; tops[2].placeholder = "Amount"; tops[3].placeholder = "interest"; tops[4].placeholder = "duration"; tops[5].placeholder = "Start Date"; tops[6].placeholder = "End Date"; tops[7].placeholder = "campaign"; // tops[8].placeholder = "Status";

</script>
