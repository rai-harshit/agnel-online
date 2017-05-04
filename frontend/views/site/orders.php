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
			background-color: #dbdde0;
			border:1px solid black;
			padding:5px;
			font-size: 18px;
			font-weight: bold;
			border-radius: 10px;
			color:black;
		}
	</style>
</head>
<body>
		<div class="site-orders">
			<div class="container">

				<center><h1><?= Html::encode($this->title)  ?></h1></center><br/>


					<div style="padding-right: 15px;font-size:auto">
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

		<center>
			<div class=row>
				<div class="col-md-6">
						<?= "PRODUCTS' COUNT : ".$itemsCount ?>
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
			</div>
		</center>

		<br>
		<?php
		if(($walletBal>$grandTotal)and($itemsCount>0))
		{
		    echo '<div class="nav nav-pills nav-justified" style="padding-right:10px;">
	            <li class="active" ><a href="index.php?r=site%2Fpayment-init" style=" border-radius:60px"><b>PROCEED & MAKE PAYMENT</b></a></li>
	        </div>';
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
</body>