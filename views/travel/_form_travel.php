<?php
use yii\widgets\ActiveForm;
//เขียนเองทั้งหมด

//print_r($model);

?>
<div class="well">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 20]) ?>
    <?= $form->field($model, 'tra_type')->textInput(['maxlength' => 20]) ?>
    <?= $form->field($model, 'detail')->textInput() ?>    
    <?= $form->field($model, 'score_summer')->textInput() ?>
    <?= $form->field($model, 'score_rain')->textInput() ?>
    <?= $form->field($model, 'score_winter')->textInput() ?>
    <?= $form->field($model, 'place_Latitude')->textInput() ?>
    <?= $form->field($model, 'place_Longitude')->textInput() ?>
    <?= $form->field($model, 'time_open')->textInput() ?>
    <?= $form->field($model, 'time_close')->textInput() ?>    
    <?= $form->field($model, 'website')->textInput() ?>   
        <?php 
        if(!$model->isNewRecord) {
            echo $form->field($model, 'Date_time')->textInput() ;
        }
    ?>

    <button type="submit" class="btn btn-primary">save</button>

    <?php ActiveForm::end(); ?>
</div>

