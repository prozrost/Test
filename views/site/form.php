<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin([

        'options' => ['enctype' => 'multipart/form-data'],
        'action' => ['site/form']
    ]); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'name')->textInput(['class'=>'name_class'])->input('name',['placeholder' => "Имя"])->label(false); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'email')->textInput()->input('email',['placeholder' => "E-mail"])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'age')->textInput()->input('age',['placeholder' => "Возраст(полных лет)"])->label(false); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'height')->textInput()->input('height',['placeholder' => "Рост"])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'weight')->textInput()->input('weight',['placeholder' => "Вес"])->label(false); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'city')->textInput()->input('city',['placeholder' => "Город проживания"])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <p><img class="describe_images" src="computer.png"/>Нужна ли техника в аренду</p>
        </div>
        <?= $form->field($model, 'techies')->radioList(
        [
            'no' => 'Нет',
            'yes_camera' => 'Да,только камера',
            'yes_both' => 'да,компьютер и камера'
        ]
    )->label(false);
    ?>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <p><img class="describe_images" src="English.png"/>Знание английского</p>
        </div>
        <?= $form->field($model, 'english_level')->radioList(
        [
            'starter' => 'Без знания',
            'elementary' => 'Базовый',
            'intermediate' => 'Средний',
            'up-intermediate' => 'Высокий',
            'advanced' => 'Превосходный'
        ]
    )->label(false);
?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="col-lg-6">
            <p class="add_photo"><img class="describe_images" src="photo.png"/>Добавить фото(до 5 штук)</p>

        </div>
        <div class="col-lg-6">
            <?= $form->field($images, 'imagesFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*','id'=>'gallery-photo-add'])->label(false) ?>
        </div>
        </div>
        <div class="col-lg-6 pixels-line">
            <div class="preview"></div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>
<?=  $this->registerJsFile('preview.js');?>
