<?php 

use yii\helpers\Html;
use yii\web\UrlManager;
$this->title="Thank You !";
$this->params['breadcrumbs'][]="Order Receipt";

?>
<head>
<style type="text/css">
	table
	{
		width:100%; 
		border:1px solid black;
	}
	tr,th,td
	{
		border:1px solid black;
		padding:5px;
		padding-left: 15px;
		width:25%;
	}
</style>
</head>
<div class="site-receipt">
	<div class="container" style="padding-right:10px">

		<center>
			<h1><?php echo Html::encode("Order Receipt"); ?></h1><br/>
        </center>

   	        <div class="col-md-4">
	        	<center>
	        	<img src="<?= yii\helpers\Url::to('@web/images/agnels_logo.png') ?>" align='middle'/>
	        	</center>
	        </div>

        	<div class="col-md-8">
			<h4>INSTRUCTIONS:</h4>
        	<p>
				You will have to provide the Barcode at the Counter before collecting your order.<br/>
				You can take the Screenshot of the Barcode and also download the pdf vesion of this receipt for any future references.
			</p>
			<div name="barcode" align='center'>
				<?php 
					$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
			        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($uniqueID, $generator::TYPE_CODE_128)) . '">';
		        ?>
	        </div>
	        <br/>
	        <p>
	        	If BarCodes aren't your thing, you can also use the following Unique ID for the same purpose :
	        	<h2 align="center">
	        		<?php
	        			echo $uniqueID;
	        		?>
	        	</h2>
	        </p>
	        </div>

        <br/>

        	<?php
	        	echo 
		        	"<table>
		        	<tr>
		        		<th>Date</th>
		        		<th>Order ID</th>
		        		<th>Ordered Items</th>
		        		<th>Total Amount (INR)</th>
		        	</tr>";	
		    ?>
        	<?php 
	        	echo 
	        		"<tr>
	        		<td rowspan=$count > $dateTime </td>
	        		<td rowspan=$count > $orderNo  </td>
	        		<td> $ordered_items[0] </td>
	        		<td rowspan=$count > &#x20B9 $grandTotal </td>
	        		</tr>";
        	?>
	        <?php
	        		for($i=1;$i<$count;$i++) {
	        			echo "<tr><td> $ordered_items[$i] </td></tr>";
	        		}
	        		echo "</table>";
	        ?><br/>
	        <div class="nav nav-pills nav-justified" style="padding-right:10px;">
	            <li class="active" >
	            	<a href="
					    <?php
				        echo Yii::$app->UrlManager->createUrl(array('site/receipt','uid'=>$uniqueID,'dT'=>$dateTime,'oNo'=>$orderNo,'count'=>$count,'gT'=>$grandTotal,'ordIt'=>$ordered_items));			
					    ?>">GENERATE PDF
					</a>
	            </li>
	        </div>

	</div>
</div>




