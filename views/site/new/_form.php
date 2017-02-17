<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Form */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'city')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'techies')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'english_level')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo_1')->textInput() ?>

    <?= $form->field($model, 'photo_2')->textInput() ?>

    <?= $form->field($model, 'photo_3')->textInput() ?>

    <?= $form->field($model, 'photo_4')->textInput() ?>

    <?= $form->field($model, 'photo_5')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
