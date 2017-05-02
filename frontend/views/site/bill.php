<?php 

use yii\helpers\Html;

$this->title="Thank You !";
$this->params['breadcrumbs'][]="Order Receipt";

?>

<div class="site-receipt">
	<div class="container" style="padding-right:10px">
		<center>
			<h1><?php echo Html::encode("Order Receipt"); ?></h1><br/>
			<h4>INSTRUCTIONS:</h4>
				<p>
				You will have to provide the Barcode at the Counter before collecting your order.<br/>
				You can take the Screenshot of the Barcode and also download the pdf vesion of this receipt for any future references.
			</p>
			<div name="barcode">
				<?php 
					$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
			        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($uniqueID, $generator::TYPE_CODE_128)) . '">';
		        ?>
	        </div>
	        <br/>
	        <p>
	        	If BarCodes aren't your thing, you can also use the following Unique ID for the same purpose :
	        	<h2>
	        		<?php
	        			echo $uniqueID;
	        		?>
	        	</h2>
	        </p>
        </center>
        <br/>
        <?php echo '
        <table style="width:100%; border-collapse: collapse;">
        	<tr>
        		<th>Date</th>
        		<th>Order ID</th>
        		<th>Ordered Items</th>
        		<th>Total</th>
        	</tr>
        </table> ';
        
        ?>

	</div>
</div>