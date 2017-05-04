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
        .glyphicon-shopping-cart{
            color:black !important;
        }
    </style>
</head>

<div class="site-catalogue">
    <div class=container>
        <center><h1><?php echo Html::encode($this->title) ?></h1></center><br/>
                <ul class="nav nav-pills nav-justified" style="padding-right:10px">
                  <li class="active"><a data-toggle="pill" href="#cant-reg"><b>Canteen: Regular</b></a></li>
                  <li><a data-toggle="pill" href="#cant-sp"><b>Canteen: Today's Special</b></a></li>
                  <li><a data-toggle="pill" href="#tcs"><b>The Central Store</b></a></li>
                </ul>
          
               <div class="tab-content">
                
                <div id="cant-reg" class="tab-pane fade in active" style="padding-right: 10px">
                        <br>
                        <div class="canteenitems-catalogue">
                        <b>
                        <?php Pjax::begin(); ?>   
                         <?= GridView::widget([
                                'dataProvider' => $dataProvider1,
                                'filterModel' => $searchModel1,
                                'columns' => [
                                    'name',
                                    'price',
                                    'status',
                                    ['class' => 'yii\grid\ActionColumn', 'template' =>
                                    '<center><button style="font-size:25px;margin:-9px;width:55px;background-color: #118cff;padding-top:5px;border:none;">{cart}</button></center>'

                                    ],

                                    ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                        </b>
                        </div>
                </div>


                <div id="cant-sp" class="tab-pane fade">
                      <br>
                      <div class="spcanteenitems-catalogue" style="padding-right: 10px">
                      <b>
                        <?php Pjax::begin(); ?>    
                        <?= GridView::widget([
                                'dataProvider' => $dataProvider2,
                                'filterModel' => $searchModel2,
                                'columns' => [

                                    'name',
                                    'price',
                                    'status',
                                    ['class' => 'yii\grid\ActionColumn', 'template' => '<center><button style="font-size:25px;margin:-9px;width:55px;background-color: #118cff;padding-top:5px;border:none;">{cart}</button></center>'],                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                        </b>
                        </div>                
                </div>


                <div id="tcs" class="tab-pane fade">
                    <br>
                    <div class="storeitems-catalogue" style="padding-right: 10px">
                    <b>
                        <?php Pjax::begin(); ?>    
                        <?= GridView::widget([
                                'dataProvider' => $dataProvider3,
                                'filterModel' => $searchModel3,
                                'columns' => [
                                    'name',
                                    'price',
                                    'status',
                                    ['class' => 'yii\grid\ActionColumn', 'template' => '<center><button style="font-size:25px;margin:-9px;width:55px;background-color: #118cff;padding-top:5px;border:none;">{cart}</button></center>'],
                                ],
                            ]); ?>
                        <?php Pjax::end(); ?>
                        </b>                          
                    </div>
                </div>
              </div>
              <br/>
                <div class="nav nav-pills nav-justified" style="padding-right:10px;">
                  <li class="active" ><a href="index.php?r=site%2Fcart" style=" border-radius:60px"><b>PROCEED TO CART</b></a></li>
                </div>


    </div>
</div>

