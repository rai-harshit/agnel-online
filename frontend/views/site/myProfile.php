<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use ruskid\stripe\StripeCheckout;

$this->title='My Profile';
$this->params['breadcrumbs'][]=$this->title;

?>

<style>

	.profile{
		background-color:#a01fd3;
		padding:15px;
		border-radius: 10px;
		font-size:large;
	}
	th,td{
		width:50%;
		padding:3px;
	}


</style>

<div class='site-myprofile'>
	<div class='container' style="padding-right:10px">
		<div class="heading">
			<center><h2><b> <?php echo Html::encode($this->title) ?> </b></h2></center>
		</div>
		<br>
		<div class="profile">
			<div class="row">
				<div class="col-md-4">
					<center>
					<img src="<?= yii\helpers\Url::to('@web/images/avatar.png') ?>" align='middle' />
					<center>
				</div>	

				<div class="col-md-8">
				<br/>
					<?php
					echo    '<table style="width:100%;">
							<tr>
							<th>Name</th>
							<td>'.$userInfo['name'].'</td>
							</tr>
							<th>Roll No</th>
							<td>'.Yii::$app->user->identity->roll_no.'</td>
							</tr>
							<tr>
							<th>Branch</th>
							<td>'.$userInfo['branch'].'</td>
							</tr>
							<tr>
							<th>Contact</th>
							<td>'.$userInfo['contact'].'</td>
							</tr>
							<tr>
							<th>Email-Id</th>
							<td>'.$userInfo['email'].'</td>
							</tr>
							<tr>
							<th>Balance</th>
							<td> &#x20B9; '.$currentBal.'</td>
							</tr>
							<tr>
							<th>Account Status</th>
							<td>'.$userInfo['status'].'</td>
							</tr>
							</table>';
							$amount=100;
					?>

				</div>

			</div>
		</div>
		<br/>
	</div>
</div>