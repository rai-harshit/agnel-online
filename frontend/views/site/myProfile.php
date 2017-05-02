<?php 

use yii\helpers\Html;
use yii\grid\GridView;

$this->title='My Profile';
$this->params['breadcrumbs'][]=$this->title;

	$dP1=['Name','Branch','Contact','E-Mail ID','Account Status'];
?>


	<div class='site-myprofile'>
		<div class='container'>
			<center><h1> <?php echo Html::encode($this->title) ?> </h1></center><br/>
				<center style="font-size: 20px">

				<?php


					for($i=0;$i<=$count1;$i++)
					{
						echo $dP1[$i]."&nbsp;&nbsp;".$dataProvider1[$i]."<br/>";
					}


					echo "Balance = &#x20B9;".$dataProvider2."<br/>";


				?>

				</center>
		</div>
	</div>