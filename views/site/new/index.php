<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Form', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name:ntext',
            'email:ntext',
            'age',
            'height',
            // 'weight',
            // 'city:ntext',
            // 'techies:ntext',
            // 'english_level:ntext',
            // 'photo_1',
            // 'photo_2',
            // 'photo_3',
            // 'photo_4',
            // 'photo_5',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
