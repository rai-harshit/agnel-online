<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title='My Profile';
$this->params['breadcrumbs'][]=$this->title;

?>

<style>

	.profile{
		background-color:#ff9f1c;
		padding:15px;
		border-radius: 10px;
		font-size:large;
	}
	th,td{
		padding:3px;
	}
	.glyphicon-list-alt{
		color:black !important;
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
							<th style="width:50%">Name</th>
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
			<div class="orderHistory" style="background-color: #ff9f1c: ">
                    <?php Pjax::begin(); ?>    
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            'orderNo',
                            'grandTotal',
                            'orderStatus',
                            ['class' => 'yii\grid\ActionColumn', 
                            'template' => '<center style="font-size : 20px"; padding-bottom: 20px>{details}</center>',
                                ],
                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>                        
                    </div>
		<br/>
	</div>
</div>