<?php

/* @var $this yii\web\View */


$this->title = 'AGNEL ONLINE';
?>

<div class="site-index">

    <div class="body-content">

<div class="container-fluid" style="padding-top: 0px" >

    <div id="my-carousel" class="carousel slide" data-ride="carousel" style="width:100%; padding-top:0px">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#my-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#my-carousel" data-slide-to="1"></li>
            <li data-target="#my-carousel" data-slide-to="2"></li>
        </ol>

       <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="<?= yii\helpers\Url::to('@web/images/college.jpg') ?>" style="width: 100%"/>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="<?= yii\helpers\Url::to('@web/images/canteen.jpg') ?>" style="width: 100%"/>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="<?= yii\helpers\Url::to('@web/images/stationery.jpg') ?>" style="width: 100%"/>
                <div class="carousel-caption">
                </div>
            </div>
        </div> 

    <!-- Controls -->
        <a class="left carousel-control" href="#my-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#my-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row" style="padding-top:0px">
            <div class="col-lg-4">
                <center><h4><b>ARTICLE 1</b></h4></center>
            </div>
            <div class="col-lg-4">
                <center><h4><b>ARTICLE 2</b></h4></center>
            </div>
            <div class="col-lg-4">
                <center><h4><b>ARTICLE 3</b></h4></center>
            </div>
    </div>

    <div class="row" style="padding-top:0px">
      
            <div class="col-lg-6">
                <a class="btn btn-default" href="index.php?r=site%2Flogin" style="width:100%; background-color:grey"><h5><b>LOGIN &raquo;</b></h5></a>   
            </div>
            <div class="col-lg-6">
                <a class="btn btn-default" href="index.php?r=site%2Fsignup" style="width:100%; background-color:grey"><h5><b>SIGNUP &raquo;</b></h5></a>
            </div>
    </div>

    </div>
    </div>

</div>
</div>
