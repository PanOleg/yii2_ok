<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsteriskQueueParsedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asterisk-queue-parsed-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Calls', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'callid',
            'queue',
            'time',
            'callerid',
            // 'agentid',
            // 'status',
            // 'success',
            // 'holdtime:datetime',
            // 'calltime:datetime',
            // 'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
