<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About Us';
$this->params['breadcrumbs'][] = $this->title;
?>

<style type="text/css">
	.developers-info{
		color:black;
		font-size:18px;
		padding-right:15px;
		padding-left:15px
	}

	table{
		border:2px solid black;
		border-radius:1px;
		width : 100%;
	}
	tr,th,td{
		padding: 5px;
		border:1px solid black;
		width : 50%;
		font-size: auto;
	}
	#HR,#NN,#AK{
		background-color:#ff9f1c;
		padding:1em;
		border-radius:10px;
	}
</style>

<div class="site-about">
<div class="container" style="padding-right:10px">
	<div class="heading">
		<center>
    	<h2><b><?= Html::encode($this->title) ?></b></h2>
		</center>
	</div>    
    <br/>
	
    <div class="developers-info">
	    <div id="HR" class="row">
	    	<div class="col-md-4">
		    	<img src="<?= yii\helpers\Url::to('@web/images/hr.jpg') ?>" style="width:100%;">
		    </div>
		    <div class="col-md-8">
		    	<table width="100%">
		    		<tr>
		    			<th>
			    			Name
			    		</th>
			    		<td>
			    			Harshit Rai
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Branch
			    		</th>
			    		<td>
			    			Information Technology
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Batch
			    		</th>
			    		<td>
			    			2015-2019
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Contact
			    		</th>
			    		<td>
			    			8452904404
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Email-ID
			    		</th>
			    		<td>
			    			harshitrai68@gmail.com
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Role
			    		</th>
			    		<td>
			    			Developer
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Contribtions
			    		</th>
			    		<td>
			    			Developer & Designer<br/>
			    		</td>
			    	</tr>
			    </table>
		   	</div>
	    </div>
	    <br/>
	    <div id="NN" class="row">
	    	<div class="col-md-4">
		    	<img src="<?= yii\helpers\Url::to('@web/images/nn.jpg') ?>" style="width:100%">
		    </div>
			<div class="col-md-8">
		    	<table width="100%">
		    		<tr>
		    			<th>
			    			Name
			    		</th>
			    		<td>
			    			Nathan Nunes
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Branch
			    		</th>
			    		<td>
			    			Information Technology
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Batch
			    		</th>
			    		<td>
			    			2015-2019
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Contact
			    		</th>
			    		<td>
			    			-----
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Email-ID
			    		</th>
			    		<td>
			    			-----
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Role
			    		</th>
			    		<td>
			    			Assistance in Project Development
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Contribtion
			    		</th>
			    		<td>
			    			Data Collection, UI Designer, Project Report
			    		</td>
			    	</tr>
			    </table>
		   	</div>
	    </div>
	    <br/>
	    <div id="AK" class="row">
	    	<div class="col-md-4">
		    	<img src="<?= yii\helpers\Url::to('@web/images/ak.jpg') ?>" style="width:100%">
		    </div>
			<div class="col-md-8">
		    	<table width="100%">
		    		<tr>
		    			<th>
			    			Name
			    		</th>
			    		<td>
			    			Azhar Khan
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Branch
			    		</th>
			    		<td>
			    			Information Technology
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Batch
			    		</th>
			    		<td>
			    			2015-2019
			    		</td>
			    	</tr>
			    	<tr>
			    	<tr>
			    		<th>
			    			Contact
			    		</th>
			    		<td>
			    			-----
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Email-ID
			    		</th>
			    		<td>
			    			-----
			    		</td>
			    	</tr>
			    		<th>
			    			Role
			    		</th>
			    		<td>
			    			Assistance in Project Development
			    		</td>
			    	</tr>
			    	<tr>
			    		<th>
			    			Contribution
			    		</th>
			    		<td>
			    			Application Testing, UI Designer, Project Report 
			    		</td>
			    	</tr>
			    </table>
		   	</div>
	    </div>
	    <br/>
	</div>
</div>
</div>