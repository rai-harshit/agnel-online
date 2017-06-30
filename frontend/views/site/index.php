<?php

/* @var $this yii\web\View */


$this->title = 'AGNEL ONLINE';
?>

<style type="text/css">
    .col-md-4{
        border: 0.5px solid black;
        border-radius:10px;
        background-color:#00d1bc;
        padding:10px;
        padding-left: 10px;
        padding-right: 10px
    }
    .container-fluid{
        padding:0px;
        margin-bottom:-1px 
    }
    .row{
        padding-left:25px;
        padding-right:25px;
    }
    img{
        width:100%;
    }
    p{  
        padding-right:10px;
        padding-left:10px;
    }

</style>


<div class="site-index"">
<div class="container-fluid">

    <div id="my-carousel" class="carousel slide" data-ride="carousel" style="width:100%; padding-top:0px;padding-bottom:0px">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#my-carousel" data-slide-to="1"></li>
            <li data-target="#my-carousel" data-slide-to="2"></li>
        </ol>

       <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?= yii\helpers\Url::to('@web/images/college.jpg') ?>"/>
            </div>
            <div class="item">
                <img src="<?= yii\helpers\Url::to('@web/images/canteen.jpg') ?>"/>
            </div>
            <div class="item">
                <img src="<?= yii\helpers\Url::to('@web/images/stationery.jpg') ?>"/>
            </div>    
        </div>


        <!-- Controls -->
        <div>
        <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
    <br/>
    <div class="row">
    <div class="col-md-4" style="height:175px">
        <center><h4 style="padding-top:5px"><b>WHAT'S NEW ?</b></h4></center>
        <center><p>
            The Catalogue has been updated with the latest products.<br/>
            Now you can download the a copy of you order-receipt in form of a PDF file for future references.
            </p>
        </center>
    </div>

    <div class="col-md-4" style="height:175px">
        <center><h4 style="padding-top:5px"><b>WHAT'S NEXT ?</b></h4></center>
        <center><p>
            To make the Ordering process easier and lightening fast, our team is developing an Agnel Online App for Android, iOS and Windows Phone Users.   
            </p>
        </center> 
    </div>
            
    <div class="col-md-4" style="height:175px">
        <center><h4 style="padding-top:5px"><b>JOIN US...</b></h4></center>
        <center><p>
            <b>A</b>re you interested in Web-Development ?<br/> 
            If yes, we would be glad to have you in our team. Drop an email to <b>harshitrai68@gmail.com</b> or else, you can also meet the Administrators during the college hours.   
            </p></center>
    </div>
    </div>
    <br/>

</div>
</div>

