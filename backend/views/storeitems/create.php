<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Storeitems */

$this->title = 'Create Storeitems';
$this->params['breadcrumbs'][] = ['label' => 'Storeitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="storeitems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
