<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsteriskQueueParsedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asterisk-queue-parsed-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'callid') ?>

    <?= $form->field($model, 'queue') ?>

    <?= $form->field($model, 'time') ?>

    <?= $form->field($model, 'callerid') ?>

    <?php // echo $form->field($model, 'agentid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'success') ?>

    <?php // echo $form->field($model, 'holdtime') ?>

    <?php // echo $form->field($model, 'calltime') ?>

    <?php // echo $form->field($model, 'position') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
