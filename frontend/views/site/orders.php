<?php

use yii\helpers\Html;
use yii\db\Command;
use frontend\models\Cart;
use frontend\models\Orders;
use yii\widgets\Pjax;
use yii\grid\Gridview;
use yii\helpers\Url;

$this->title="Order Confirmation";
$this->params['breadcrumbs'][]=$this->title;



?>

<head>
	<style>
		.row{
			margin-right:15px;
			margin-bottom:10px;
			margin-left:0px;

		}
		.col-md-6{
			background-color: #ff9f1c;
			border:1px solid black;
			padding:5px;
			font-size: 15px;
			font-weight: bold;
			border-radius: 10px;
			color:black;
		}
		.order-items{
			background-color:#ff9f1c;
        	padding:15px;
        	border-radius:10px;
		}
	</style>
</head>
<body>
		<div class="site-orders">
			<div class="container" style="padding-right: 10px">

				<div class="heading">
					<center>
					<h2><b><?= Html::encode($this->title)  ?></b></h2>
					</center>
				</div>
				<br/>

				<div class="order-items">
					<b>
					<?= Gridview::widget([
						'dataProvider'=>$dataProvider,
						'columns'=>[
							'itemId',
							'itemName',
							'itemPrice',
						], 
					]); ?>
					</b>
				</div>
				<br/>
				<center>
						<div class="col-md-6">
								<?= "PRODUCT COUNT : ".$itemsCount ?>
						</div>
						<div class="col-md-6">
								<?= "PAYABLE AMOUNT : "?>&#x20B9;<?=$grandTotal ?>
						</div>

						<div class="col-md-6">
								<?= "CURRENT WALLET BALANCE : &#x20B9;".$walletBal ?>
						</div>
						<div class="col-md-6">
								<?= "BALANCE AFTER DEDUCTION: &#x20B9;$walletBal - &#x20B9;$grandTotal = &#x20B9;".($walletBal-$grandTotal)?>
						</div>
				</center>

		<br/>
		<?php
		if(($walletBal>$grandTotal)and($itemsCount>0))
		{
		    echo '<div class="nav nav-pills nav-justified">
	            <li class="active" ><a href="index.php?r=site%2Fpayment-init" style=" border-radius:10px"><b>PROCEED & MAKE PAYMENT</b></a></li>
	        </div><br/>';
        }
        else
        {
        	if($itemsCount==0){
        		Yii::$app->session->setFlash('error','Cart is empty. Add something to the cart and try again.');
        			}
        	else{

        		Yii::$app->session->setFlash('error','You have Insufficient Balance.');
        			}
        }
        ?>

	</div>
</div>