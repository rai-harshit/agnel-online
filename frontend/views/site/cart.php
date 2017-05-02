<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\web\User;
use yii\db\Query;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use frontend\models\Cart;
use yii\db\Command;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


/*******CART*******/
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (strpos($url,'id=')== true) {
    $itemId= $_GET['id'];
   
    if(strpos($url,'creg00'))
    {
        $rows = (new \yii\db\Query())
        ->select(['id','name','price'])
        ->from('canteenitems')
        ->where(['id' => $itemId])
        ->limit(10)
        ->all();
    }
    if(strpos($url,'cspe00'))
    {
        $rows = (new \yii\db\Query())
        ->select(['id','name','price'])
        ->from('spcanteenitems')
        ->where(['id' => $itemId])
        ->limit(10)
        ->all();
    }
    if(strpos($url,'sto00'))
    {
         $rows = (new \yii\db\Query())
        ->select(['id','name','price'])
        ->from('storeitems')
        ->where(['id' => $itemId])
        ->limit(10)
        ->all();       
    }
    date_default_timezone_set('Asia/Kolkata');
    $dateTime = date('Y-m-d H:i:s', time());
    $rollNo=Yii::$app->user->identity->roll_no;
    $itemName = ArrayHelper::getColumn($rows, 'name');
    $itemPrice = ArrayHelper::getColumn($rows, 'price');

/*    print_r($rows);
    echo "<br/>".$itemId;
    echo "<br/>".$itemName[0];
    echo "<br/>".$itemPrice[0]; 
    echo "<br/>".$dateTime;
    echo "<br/>".$rollNo;
*/

$cart = Yii::$app->db->createCommand('INSERT INTO cart(dateTime,rollNo,itemId,itemName,itemPrice)values (:dateTime,:rollNo,:itemId,:itemName,:itemPrice)')
        ->bindValue(':dateTime',$dateTime)
        ->bindValue(':rollNo',$rollNo)
        ->bindValue(':itemId',$itemId)
        ->bindValue(':itemName',$itemName[0])
        ->bindValue(':itemPrice',$itemPrice[0])
        ->execute();


/*$cart= new Cart();
$cart->dateTime=$dateTime;
$cart->rollNo=$rollNo;
$cart->itemId=$itemId;
$cart->itemName=$itemName;
$cart->itemPrice=$itemPrice;
$cart->save();
*/
    
    unset($itemId,$rollNo,$dateTime);

       Yii::$app->response->redirect(Url::to('index.php?r=site%2Fcatalogue'));

}




$this->title = 'My Shopping Cart';
$this->params['breadcrumbs'][] = $this->title;

?>

<head>
<style type="text/css">
    .glyphicon-trash{
        color:black;
    }
</style>
</head>
<div class="site-cart">
    <div class="container">

        <center><h1><?= Html::encode($this->title) ?></h1></center><br/>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <div style="padding-right:10px">   
                <b>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'itemName',
                        'itemPrice',
                        ['class' => 'yii\grid\ActionColumn', 'template' =>
                                        '<center><button style="font-size:25px;margin:-9px;width:55px; background-color: #118cff;padding-top:5px;border:none; color:black">{delete}</button></center>'

                                    ],
                        ],
                    ]);
                ?>
                <?php Pjax::end(); ?>

                </b>
        </div><br>

                <div class="nav nav-pills nav-justified" style="padding-right:10px;">
                  <li class="active" ><a href="index.php?r=site%2Forders" style=" border-radius:60px"><b>ORDER NOW</b></a></li>
                </div>
    </div>
</div>
