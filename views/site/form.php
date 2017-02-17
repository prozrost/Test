<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileupload\FileUploadUI;
?>
<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php $form = ActiveForm::begin([

        'options' => ['enctype' => 'multipart/form-data'],
        'action' => ['site/form']
    ]); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($Form, 'name')->textInput(['class'=>'name_class'])->input('name',['placeholder' => "Имя"])->label(false); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($Form, 'email')->textInput()->input('email',['placeholder' => "E-mail"])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($Form, 'age')->textInput()->input('age',['placeholder' => "Возраст(полных лет)"])->label(false); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($Form, 'height')->textInput()->input('height',['placeholder' => "Рост"])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($Form, 'weight')->textInput()->input('weight',['placeholder' => "Вес"])->label(false); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($Form, 'city')->textInput()->input('city',['placeholder' => "Город проживания"])->label(false); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <p><img class="describe_images" src="computer.png"></img>Нужна ли техника в аренду</p>
        </div>
        <?= $form->field($Form, 'techies')->radioList(
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
            <p><img class="describe_images" src="English.png"></img>Знание английского</p>
        </div>
        <?= $form->field($Form, 'english_level')->radioList(
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
            <p class="add_photo"><img class="describe_images" src="photo.png"></img>Добавить фото(до 5 штук)</p>

        </div>
        <div class="col-lg-6">
            <?= $form->field($Form, 'images[]')->fileInput(['multiple' => true, 'accept' => 'image/*','id'=>'gallery-photo-add'])->label(false) ?>
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
<? $this->registerJsFile('preview.js');?>
