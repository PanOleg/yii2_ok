<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AsteriskQueueParsed */

$this->title = 'Create Calls';
$this->params['breadcrumbs'][] = ['label' => 'Calls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asterisk-queue-parsed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
