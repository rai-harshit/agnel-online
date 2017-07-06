<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\widgets\GridView;
use yii\db\Command;
use frontend\models\Cart;

AppAsset::register($this);
if(isset(Yii::$app->user->identity)){
    $orderCount=Yii::$app->db->createCommand('select count([[id]]) from {{cart}} where rollNo=:rollNo')
    ->bindValue(':rollNo',Yii::$app->user->identity->roll_no)
    ->queryScalar();
}
else{
    $orderCount=0;
}

    $this->beginPage() 
?>



<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--Head-->
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <style type="text/css">

    body {
    background:
        radial-gradient(black 15%, transparent 16%) 0 0,
        radial-gradient(black 15%, transparent 16%) 8px 8px,
        radial-gradient(rgba(255,255,255,.1) 15%, transparent 80%) 0 1px,
        radial-gradient(rgba(255,255,255,.1) 15%, transparent 80%) 8px 9px;
        background-color:#282828;
        background-size:16px 16px;
    }

    .container {
         padding-right: 0; /*15px in bootstrap.css*/
         padding-left:1em;
         padding-bottom:0px;
         padding-top:0px;
         margin-bottom:0px;
     }

    .wrap {overflow-x:auto; overflow-y:auto;} 

    .heading {
        background-color:#ff9f1c;
        padding-top:5px;
        padding-bottom:10px;
        border-radius: 10px;
        font-size:large;
        color: black;
    }

    .col-lg-5{
    width:100%;
    background-color:#ff9f1c;
    padding:15px;
    border-radius:10px
    }

    .form-control{ 
        background:
            radial-gradient(black 15%, transparent 16%) 0 0,
            radial-gradient(black 15%, transparent 16%) 8px 8px,
            radial-gradient(rgba(255,255,255,.1) 15%, transparent 80%) 0 1px,
            radial-gradient(rgba(255,255,255,.1) 15%, transparent 80%) 8px 9px;
            background-color:#282828;
            background-size:16px 16px;
        color:white;
        font-weight: bold !important;
        font-size: large !important;
    } 

    li > a {
        color : #ff9f1c;
        font-size : 16px;
        font-weight: bold;
    }

    ul > li > a:hover {
    color : black; 
    background-color: #ff9f1c;
    }

    table,td,th,th>a {
        font-weight: bold;
        color: black !important;
        background-color: #ff9f1c;
        border:none !important;
    }

    th{
        font-size: 15px;
    }

    td{
        padding-top: 10px !important;
    }

    </style>

</head>


 <?php $this->beginBody() ?>
<!--Body-->
<body>
    


    <div class='wrap' style="overflow:hidden">
        <div class="container">
                <?php
                    NavBar::begin([
                        'brandLabel' => '<span class="glyphicon glyphicon-education"></span> AGNEL-ONLINE &#946',
                        'brandUrl' => Yii::$app->homeUrl,
                        'options' => ['class' => 'navbar-inverse navbar-fixed-top  navbar-left'],
                                 ]);

                        $menuItems = [
                            ['label' => '<font size=4.5px>'.$orderCount.'</font> <span class="glyphicon glyphicon-shopping-cart"></span>  CART', 'url' => ['/site/cart']],
                            ['label' => 'CATALOGUE', 'url' => ['/site/catalogue']],
                            ['label' => 'CONTACT US', 'url' => ['/site/contact']],
                            ['label' => 'ABOUT US', 'url' => ['/site/about']],

                            ];

                            if (Yii::$app->user->isGuest) 
                            {
                                $menuItems[] = ['label' => 'SIGNUP', 'url' => ['/site/signup']];
                                $menuItems[] = ['label' => 'LOGIN', 'url' => ['/site/login']];
                            } 
                            else 
                            {
                                $menuItems[] = ['label' => 'PROFILE', 'url' => ['/site/my-profile']];
                                $menuItems[] = '<li>'
                                    . Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        '<b name="logout" style="color:black;">LOGOUT  (' . Yii::$app->user->identity->roll_no . ')</b>',
                                        ['class' => 'btn btn-link logout']
                                    )
                                    . Html::endForm()
                                    . '</li>';                                
                            }
                            echo Nav::widget([
                                'options' => ['class' => 'navbar-nav navbar-right'],
                                'items' => $menuItems,
                                'encodeLabels' => false,
                            ]);
                    NavBar::end();
                ?>

        </div>
                
        <div class="container-fluid" style="padding-top:0px; padding-bottom: 0px; padding-left:0px;margin-top:-40px;">
                    <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                    ?>
                    <?= Alert::widget() ?>    
                    <?= $content ?>
        </div>

    </div>

    <!--Footer-->
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; AGNEL-ONLINE <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

</body>
</html>


<!--Body End & Page End -->
<?php $this->endBody() ?>
<?php $this->endPage() ?>

