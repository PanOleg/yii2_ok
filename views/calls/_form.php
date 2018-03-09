<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsteriskQueueParsed */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asterisk-queue-parsed-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'callid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'queue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'time')->textInput() ?>

    <?= $form->field($model, 'callerid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agentid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'success')->textInput() ?>

    <?= $form->field($model, 'holdtime')->textInput() ?>

    <?= $form->field($model, 'calltime')->textInput() ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
