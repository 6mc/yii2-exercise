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

 //print_r( User::find()->where(['id'=>'7472'])->one()->loans); 



print_r( Loan::find()->where(['id'=>'36470'])->one()->user);

//Yii::$app->User->age()
?></p>
    <h1><?= Html::encode($this->title) ?></h1>

   
             <?= Breadcrumbs::widget([
    //'options' => ['style' => 'margin-top:0;'],

    //        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
   'links' =>    [
    ['label' => 'Create User',   // required
    'url' => 'index.php?r=user/create',      // optional, will be processed by Url::to()
],
   ['label' => 'Show Users',   // required
    'url' => 'index.php?r=user/index',      // optional, will be processed by Url::to()
]]


        ]) ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
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
