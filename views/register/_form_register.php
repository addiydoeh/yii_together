<?php
use yii\widgets\ActiveForm;
//เขียนเองทั้งหมด

//print_r($model);

?>
<div class="well">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'password')->textInput() ?>
    
    <?= $form->field($model, 'sex')->textInput() ?>
    <?php 
        if(!$model->isNewRecord) {
            echo $form->field($model, 'create_date')->textInput() ;
        }
    ?>

    <button type="submit" class="btn btn-primary">save</button>

    <?php ActiveForm::end(); ?>
</div>

