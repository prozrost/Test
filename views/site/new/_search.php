<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'techies') ?>

    <?php // echo $form->field($model, 'english_level') ?>

    <?php // echo $form->field($model, 'photo_1') ?>

    <?php // echo $form->field($model, 'photo_2') ?>

    <?php // echo $form->field($model, 'photo_3') ?>

    <?php // echo $form->field($model, 'photo_4') ?>

    <?php // echo $form->field($model, 'photo_5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
