<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\widgets\Alert;

//sS
use frontend\models\Storeitems;
use frontend\models\StoreitemsSearch;
use yii\web\NotFoundHttpException;
//se

//cs
use frontend\models\Canteenitems;
use frontend\models\CanteenitemsSearch;
//ce

//scs
use frontend\models\Spcanteenitems;
use frontend\models\SpcanteenitemsSearch;
//sce

//cs
use frontend\models\Cart;
use frontend\models\CartSearch;
//ce

//os
use frontend\models\Orders;
use frontend\models\OrdersSearch;
//oe

//ps
use frontend\models\User;
use frontend\models\UserSearch;
//pe

//os
use frontend\models\Orderitems;
use frontend\models\OrderitemsSearch;
//

//queriesCommand
use yii\db\Command;
//qCe

use mPDF;


/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    public function actionMyProfile()
    {   
        $rollNo=Yii::$app->user->identity->roll_no;
        $userInfo=Yii::$app->db->createCommand('select [[name]],[[branch]],[[contact]],[[email]],[[status]] from {{user}} where roll_no=:rollNo')
            ->bindValue(':rollNo',$rollNo)
            ->queryOne();
        if($userInfo['status']==10)
            $userInfo['status']='Active';
  
            
        $currentBal=Yii::$app->db->createCommand('select [[balance]] from {{wallet}} where rollNo=:rollNo')
            ->bindValue(':rollNo',$rollNo)
            ->queryScalar();

        //$orderHistory=Yii::$app->db->createCommand('select [[orderNo]],[[dateTime]],[[itemsCount]],[[grandTotal]],[[uniqueID]],[[orderStatus]] from orders where rollNo=:rollNo')
        //    ->bindValue(':rollNo',$rollNo)
        //    ->all();

        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('myProfile',[
            'userInfo'=>$userInfo,
            'currentBal'=>$currentBal,
            'searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider
                ]);
    }

    public function actionDetails()
    {   
        return $this->render('details');
    } 



    public function actionCatalogue()
    {
        $searchModel1 = new CanteenitemsSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);

        $searchModel2 = new SpcanteenitemsSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);

        $searchModel3 = new StoreitemsSearch();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);

        return $this->render('catalogue', [
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
            'searchModel3' => $searchModel3,
            'dataProvider3' => $dataProvider3,    
        ]);

    } 


    public function actionCart()
    {
        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(isset(Yii::$app->user->identity))
        {   
 
            return $this->render('cart', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);

            }
        else
        {   
            Yii::$app->session->setFlash('error','You need to be logged in to access the Cart');
            return $this->redirect(['login']);
        }
    } 



        public function actionOrders()
    {   
        $rollNo=Yii::$app->user->identity->roll_no;

        $itemsCount = Yii::$app->db->createCommand('select count([[id]]) from {{cart}} where rollNo=:rollNo')
        ->bindValue(':rollNo',$rollNo)
        ->queryScalar();

        $grandTotal = Yii::$app->db->createCommand('select sum([[itemPrice]]) from {{cart}} where rollNo=:rollNo')
        ->bindValue(':rollNo',$rollNo)
        ->queryScalar();

        $walletBal=Yii::$app->db->createCommand('select [[balance]] from {{wallet}} where rollNo=:rollNo')
        ->bindValue(':rollNo',$rollNo)
        ->queryScalar();


        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if(isset(Yii::$app->user->identity))
        {
        return $this->render('orders',[
            'searchModel'=> $searchModel,
            'dataProvider'=> $dataProvider,
            'itemsCount'=> $itemsCount,
            'grandTotal'=> $grandTotal,
            'walletBal'=> $walletBal,
            ]);
        }
        else
        {   
            Yii::$app->session->setFlash('error','You need to be logged in to access the Order Page');
            return $this->redirect(['login']);
        }
    }


        public function actionPaymentInit()
    {   


        $rollNo=Yii::$app->user->identity->roll_no;

        $itemsCount = Yii::$app->db->createCommand('select count([[id]]) from {{cart}} where rollNo=:rollNo')
                    ->bindValue(':rollNo',$rollNo)
                    ->queryScalar();

        if($itemsCount==0)
        {
            Yii::$app->session->setFlash('error','Cart is Empty. Add some items to the cart and try again.');
            return $this->redirect(['cart']);
        }
        
        $grandTotal = Yii::$app->db->createCommand('select sum([[itemPrice]]) from {{cart}} where rollNo=:rollNo')
            ->bindValue(':rollNo',$rollNo)
            ->queryScalar();
        
        $walletBal=Yii::$app->db->createCommand('select [[balance]] from {{wallet}} where rollNo=:rollNo')
            ->bindValue(':rollNo',$rollNo)
            ->queryScalar();
        
        $newBal=$walletBal-$grandTotal;
        
        $paymentStatus=Yii::$app->db->createCommand('update {{wallet}} set [[balance]]=:newBal where rollNo=:rollNo')
            ->bindValue(':newBal',$newBal)
            ->bindValue(':rollNo',$rollNo)
            ->execute();

        if((isset($paymentStatus)!=1) AND ($paymentStatus!=1))
        {
            Yii::$app->session->setFlash('error','Your payment was unsuccessful. Please try again !');
            return $this->redirect('index.php?r=site%2Fcart');
        }

        date_default_timezone_set('Asia/Kolkata');
        $dateTime = date('Y-m-d H:i:s', time());

        $itemIDs=Yii::$app->db->createCommand('select [[itemId]] from {{cart}} where rollNo=:rollNo')
                    ->bindValue(':rollNo',$rollNo)
                    ->queryColumn();

        $count=count($itemIDs);

        $canteenCount=0;
        $storeCount=0;

        for($i=0;$i<$count;$i++)
        {
            if(strpos($itemIDs[$i],'reg00')or strpos($itemIDs[$i],'spe00'))
            {
                $canteenCount++;
            }

            if(strpos($itemIDs[$i],'to00'))
            {
                $storeCount++;
            }
        }

        if($canteenCount>0 && $storeCount>0)
        {
            Yii::$app->session->setFlash('error','Please order Canteen & Store items separately.');
            return $this->redirect('index.php?r=site%2Fcart'); 
        }

        $uniqueID=dechex(rand(100000000000,999999999999));
        
        if($canteenCount>0)
        {
            $uniqueID='c.'.$uniqueID;
        }
        else
        {
            $uniqueID='s.'.$uniqueID;
        }


        Yii::$app->db->createCommand('insert into orders(dateTime,rollNo,itemsCount,grandTotal,uniqueID) values(:dateTime, :rollNo, :itemsCount, :grandTotal, :uniqueID)')
            ->bindValue(':dateTime',$dateTime)
            ->bindValue(':rollNo',$rollNo)
            ->bindValue(':itemsCount',$itemsCount)
            ->bindValue(':grandTotal',$grandTotal)
            ->bindValue(':uniqueID',$uniqueID)
            ->execute();

        $orderNo =Yii::$app->db->getLastInsertID();   

        $ordered_items=Yii::$app->db->createCommand('select [[itemName]] from {{cart}} where rollNo=:rollNo')
                    ->bindValue(':rollNo',$rollNo)
                    ->queryColumn();


        for($i=0;$i<$count;$i++)
        {
            $cartTransfer=Yii::$app->db->createCommand('insert into {{orderitems}} (uniqueID,orderNo,ordered_item) values (:uniqueID,:orderNo,:ordered_item)')
            ->bindValue(':uniqueID',$uniqueID)
            ->bindValue(':orderNo',$orderNo)
            ->bindValue(':ordered_item',$ordered_items[$i])
            ->execute();
        }

        Yii::$app->db->createCommand('delete from {{cart}} where rollNo=:rollNo')
            ->bindValue(':rollNo',$rollNo)
            ->execute();


        $this->redirect(array('bill','uid'=>$uniqueID,'dT'=>$dateTime,'oNo'=>$orderNo,'count'=>$count,'gT'=>$grandTotal));
    }


        public function actionBill($uid,$dT,$oNo,$count,$gT)
    {   

        if(isset(Yii::$app->user->identity))
        {   
            $ordered_items=Yii::$app->db->createCommand('select [[ordered_item]] from {{orderitems}} where uniqueID=:uniqueID')
                    ->bindValue(':uniqueID',$uid)
                    ->queryColumn();            
            return $this->render('Bill',[
                'uniqueID'=>$uid,
                'dateTime'=>$dT,
                'orderNo'=>$oNo,
                'count'=>$count,
                'grandTotal'=>$gT,
                'ordered_items'=>$ordered_items
                ]);
        }
        else
        {    
            Yii::$app->session->setFlash('error','You need to be logged in first to perform that action.');
            return $this->redirect('index.php?r=site%2Flogin');
        }    
    }


    public function ReceiptPDF()
    {       
            $uniqueID=$_GET['uid'];
            $dateTime=$_GET['dT'];
            $orderNo=$_GET['oNo'];
            $count=$_GET['count'];
            $grandTotal=$_GET['gT'];
            $ordered_items=$_GET['ordIt'];
            $barCode=new \Picqer\Barcode\BarcodeGeneratorPNG();
            $barCodeData=
            base64_encode($barCode->getBarcode($uniqueID, $barCode::TYPE_CODE_128));
            $rollNo=Yii::$app->user->identity->roll_no;
        $mpdf=new mPDF();
        $mpdf->charset_in='utf-8';
        $mpdf->SetMargins(9,9,20);
        $mpdf->SetTitle("AGNEL-ONLINE-".$orderNo);
        $mpdf->SetSubject("Order Receipt");
        $mpdf->SetAuthor("G_H0$t");
        $mpdf->defaultheaderfontsize=10;
        $mpdf->setHeader($rollNo.'&nbsp;&nbsp;AGNEL-ONLINE {DATE j-m-Y}');
        $mpdf->setFooter('{PAGENO}');
        $mpdf->WriteHTML("
                <style type='text/css'>
                table
                {
                    width:100%; 
                    border:1px solid black;
                }
                tr,th,td
                {
                    border:1px solid black;
                    padding:5px;
                    width:25%;
                    text-align:center;
                }

                </style>
                <body>
                    <div class='container'>
                        <h1 align='center' style='font-family:arial; font-weight:lighter'>Order Receipt</h1>

                        <div>
                            <img src='../web/images/agnels_logo.jpg' style='margin-left:35%'>
                        </div>
                        <div>
                            <h4 align='center'>INSTRUCTION:</h4>
                            <p>
                            You will have to provide the Barcode at the Counter before collecting your order.<br/>

                            </p>
                            <div class='barcode'>
                                <img src='data:image/png;base64,.$barCodeData' style='width:40%; margin-left:30%'>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <p>
                        If BarCodes aren't your thing, you can also use the following Unique ID for the same purpose :
                        <h2 align='center' style='font-family:arial; font-weight:light'>
                            $uniqueID
                        </h2>
                    </p>
                    <br/>
                    <table>
                    <tr>
                        <th>Date</th>
                        <th>Order ID</th>
                        <th>Ordered Items</th>
                        <th>Total Amount (INR)</th>
                    </tr>
                    <tr>
                    <td rowspan=$count > $dateTime </td>
                    <td rowspan=$count > $orderNo  </td>
                    <td> $ordered_items[0] </td>
                    <td rowspan=$count >  &#8377; $grandTotal </td>
                    </tr>");
            for($i=1;$i<$count;$i++) {
                $mpdf->WriteHTML("
                        <tr><td> $ordered_items[$i] </td></tr>
                        ");   }
            $mpdf->WriteHTML("        
                    </table>
                    <br/><br/>
                    <h4>General Instructions:</h4>
                    <ol>
                        <li>You can use this PDF file in case there is any complications in Order completion.</li>
                        <li>In case of an issue, you will be required to either submit the hard-copy of this PDF file or email this copy to the Administrator.</li>
                        <li>In case any fraud is attempted by modifying the details of this file, strict (legal) actions will be taken on the basis of severity of the case.</li>
                    </ol>
                </body>

            ");

               $mpdf->Output('ordersPDF/AGNEL-ONLINE-'.$orderNo.'.pdf','F'); 
        return $mpdf->Output('AGNEL-ONLINE-'.$orderNo.'.pdf','I');
    }


    public function actionReceipt()
    {
        $this->ReceiptPDF();
    }


    public function actionFaq()
    {
        return $this->render('faq');
    }

        public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['cart']);
    }

        public function findModel($id)
    {
        if (($model = Cart::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }




}