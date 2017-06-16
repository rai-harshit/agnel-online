<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;



use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Symfony\Component\HttpFoundation\Response;


$dataProvider1->pagination->pageParam = 'cant-reg-page';
$dataProvider1->sort->sortParam = 'cant-reg-sort';

$dataProvider2->pagination->pageParam = 'cant-sp-page';
$dataProvider2->sort->sortParam = 'cant-sp-sort';

$dataProvider3->pagination->pageParam = 'store-page';
$dataProvider3->sort->sortParam = 'store-sort';

$this->title='Catalogue';
$this->params['breadcrumbs'][] = $this->title;

?>

<head>
    <style type="text/css">
        .canteenitems-catalogue .glyphicon-shopping-cart{
            color:black !important;
        }
        .tab-content{
            width:100%;
            background-color:#808ca0;
            padding:15px;
            border-radius:10px;
            color:black;
        }
    </style>

</head>

<div class="site-catalogue">
    <div class=container style="padding-right:10px">
                
        <div class="heading">
            <center>
            <h2><b><?php echo Html::encode($this->title) ?></b></h2>
            </center>
        </div>
            <br/>


            <ul class="nav nav-pills nav-justified" >
                <li class="active"><a data-toggle="pill" href="#cant-reg"><b>Canteen: Regular</b></a></li>
                <li><a data-toggle="pill" href="#cant-sp"><b>Canteen: Today's Special</b></a></li>
                <li><a data-toggle="pill" href="#tcs"><b>The Central Store</b></a></li>
            </ul>
            <br/>

            <div class="tab-content">               
            <div id="cant-reg" class="tab-pane fade in active">
                <div class="canteenitems-catalogue">

                    <?php Pjax::begin(); ?>   
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider1,
                            'filterModel' => $searchModel1,
                            'columns' => [
                                'name',
                                'price',
                                'status',
                                ['class' => 'yii\grid\ActionColumn', 'template' =>
                                    '<center><button id="helo" style="font-size:25px;margin:-9px;width:55px;background-color:#808ca0;padding-top:5px;border:none;">{cart}</button></center>'

                                ],

                                ],
                        ]); ?>
                    <?php Pjax::end(); ?>

                    </div>
                </div>


                <div id="cant-sp" class="tab-pane fade">
                      <div class="spcanteenitems-catalogue">
                        <?php Pjax::begin(); ?>    
                        <?= GridView::widget([
                                'dataProvider' => $dataProvider2,
                                'filterModel' => $searchModel2,
                                'columns' => [

                                    'name',
                                    'price',
                                    'status',
                                    ['class' => 'yii\grid\ActionColumn', 'template' => '<center><button style="font-size:25px;margin:-9px;width:55px;background-color:#808ca0;padding-top:5px;border:none;">{cart}</button></center>'],                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                        </div>                
                </div>


                <div id="tcs" class="tab-pane fade">
                    <div class="storeitems-catalogue">
                        <?php Pjax::begin(); ?>    
                        <?= GridView::widget([
                                'dataProvider' => $dataProvider3,
                                'filterModel' => $searchModel3,
                                'columns' => [
                                    'name',
                                    'price',
                                    'status',
                                    ['class' => 'yii\grid\ActionColumn', 'template' => '<center><button style="font-size:25px;margin:-9px;width:55px;background-color:#808ca0;padding-top:5px;border:none;">{cart}</button></center>'],
                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>                        
                    </div>
                </div>
              </div>
            <div class="nav nav-pills nav-justified" style="padding-top: 10px">
                <li class="active" ><a href="index.php?r=site%2Fcart" style=" border-radius:10px"><b>PROCEED TO CART</b></a></li>
            </div>
            <br/>
    </div>
</div>

