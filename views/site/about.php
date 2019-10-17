<?php

/* @var $this yii\web\View */
use app\models\User;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;


$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


$dataProvider = new ActiveDataProvider([
    'query' => User::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
]);
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
