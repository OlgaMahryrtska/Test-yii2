<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$form = ActiveForm::begin(['layout'=>'horizontal'])?>
<?= $form->field($model, 'name')?>
<?= $form->field($model, 'price')?>
<?= $form->field($model, 'unit')?>
 

  <div class="form-group">
    <div class="col-lg-offset-5 col-lg-5">
      <?=Html::submitButton('Save', ['class'=>'btn btn-primary']) ?>
   </div>
</div>
<?php ActiveForm::end() ?>