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


    unset($itemId,$rollNo,$dateTime);

    Url::to(['site%2Fcatalogue']);
    return Yii::$app->response->redirect(Url::to(['catalogue']));

}




$this->title = 'Cart';
$this->params['breadcrumbs'][] = $this->title;

?>

<head>
<style type="text/css">
    .glyphicon-trash{
        color:black;
    }
    .cart{
        background-color:#ff9f1c;
        padding:15px;
        border-radius:10px
    }
</style>
</head>
<div class="site-cart">
    <div class="container" style="padding-right:10px">

        <div class="heading">
        <center>
        <h2><b><?= Html::encode($this->title) ?></b></h2>
        </center>
        </div>
        <br/>
        <div class="cart"> 
            <div class="nav nav-pills" style="padding-bottom:3px">
                    <li class="pull-right">
                        <a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#cart') ?>" style=" color:#ff9f1c; background-color: black">HELP</a>
                    </li>
            </div>  
                <b>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        'itemName',
                        'itemPrice',
                        ['class' => 'yii\grid\ActionColumn', 'template' =>
                                        '<center><button style="font-size:25px;margin:-9px;width:55px; background-color:#ff9f1c;padding-top:5px;border:none; color:black">{delete}</button></center>'

                                    ],
                        ],
                    ]);
                ?>
                <?php Pjax::end(); ?>

                </b>
        </div><br>

                <div class="nav nav-pills nav-justified">
                  <li class="active" ><a href="index.php?r=site%2Forders" style=" border-radius:10px"><b>ORDER NOW</b></a></li>
                </div>
                <br/>
    </div>
</div>
