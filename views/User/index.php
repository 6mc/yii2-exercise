<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
 use app\models\Loan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
<p><?php 

 






?></p>
    <h1><?= Html::encode($this->title) ?></h1>

   
             <?= Breadcrumbs::widget([ //using breadcrumb for User
    

    
   'links' =>    [
    ['label' => 'Create User',   
    'url' => 'index.php?r=user/create',     
],
   ['label' => 'Show Users',   
    'url' => 'index.php?r=user/index',      
]]


        ]) ?>

   

    <?= GridView::widget([ // using GridView widget
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name:ntext',
            'last_name:ntext',
            'email:ntext',
            'personal_code',
            'phone',
            'active:boolean',
            'dead:boolean',
            'lang:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
