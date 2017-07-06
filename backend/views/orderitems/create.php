<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Orderitems */

$this->title = 'Create Orderitems';
$this->params['breadcrumbs'][] = ['label' => 'Orderitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderitems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
