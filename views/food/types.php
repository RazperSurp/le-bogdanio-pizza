<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Типы продуктов';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="food-types">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'name',
        'created_at',
        'updated_at'
    ],
]) ?>
</div>

