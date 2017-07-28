<?php 

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\db\Command;

$this->title = "Order Details";
$this->params['breadcrumbs'][] = $this->title;

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
if (strpos($url,'id=')== true)
    $orderNo= $_GET['id'];

    $connection = Yii::$app->db;
    $result = $connection->createCommand('
                select orders.orderNo as "Order No",
                        dateTime as "Date & Time of Order",
                        orders.uniqueID as "Unique ID",
                        Group_Concat(ordered_item) as "Ordered Items",
                        itemsCount as "Units Ordered",
                        grandTotal as "Grand Total",
                        orderStatus as "Order Status"
                from orders, orderitems
                where orders.orderNo=:orderNo and orders.orderNo=orderitems.orderNo 
                ')
                ->bindValue(':orderNo',$orderNo)
                ->queryAll();

?>
?>
<head>
    <style>
        table{
            width:100%;
        }
        th,tr{
            padding:10px;
            width:50%;
        }
    </style>
</head>
<div class = "site-Details">

    <div class = "container" style = "padding-right:10px";>
        <div class = "heading">
            <center>
            <h2><b><?= Html::encode($this->title) ?></b></h2>
            </center>
        </div>
        <br>

        <div style="padding-bottom: 50px">
            <table>
                <?php 
                    foreach ($result[0] as $key => $value) {
                        print(
                            "<tr>
                            <th>$key</th>
                            <td>$value</td>
                            </tr>"
                            );   
                    }  
                ?> 
            </table>
        </div>
    </div>

</div>
