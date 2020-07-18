<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\Storage;
use backend\models\ProductPrice;
use backend\models\Product;
use backend\models\Categories;
use backend\models\SubCategories;
use backend\models\OrderInfo;
use backend\models\Payment;
use backend\models\Orders;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'avtorizatsiya'],
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
     * {@inheritdoc}
     */
   public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {

            return $this->redirect(['/site/login']);
        }

         $Month_r = [ "01" => "Январь", "02" => "Февраль", "03" => "Март", "04" => "Апрель",  "05" => "Май", "06" => "Июнь", "07" => "Июль", "08" => "Август", "09" => "Сентябрь", "10" => "Октябрь", "11" => "Ноябрь", "12" => "Декабрь"];

        $command = Yii::$app->db->createCommand("
        SELECT  COUNT(*) AS count FROM orders");

        $all_orders_count = $command->queryOne();

        $command = Yii::$app->db->createCommand("
        SELECT  COUNT(*) AS count ,SUM(summa) as summ  FROM payment");
        $all_end_order = $command->queryOne();

        $summa_pay=0;
        $month = [];
        $values_coming = [];
        for ($i = 1; $i <= date('m'); $i++) {
            $summa_pay=0;
            if($i < 10) $day = '0'.$i;
            else $day = $i;
            $month [] = date('Y')."-".$Month_r[$day];
            $date = 'Y-' . $day . '-' . '01';
            $date_to = 'Y-' . $day . '-' . '31';

                $coming= Payment::find()
                    ->where(['between', 'payment.payed_at', date( $date ), date( $date_to ) ])
                    ->all();
                foreach ($coming as $value) {
                    $summa_pay+= $value->summa;    
                }
            $values_pay [] = $summa_pay;
        }
        // echo "<pre>";
        // print_r($all_orders_count);

        return $this->render('index',[
            'all_orders_count' =>$all_orders_count,
            'all_end_order'=>$all_end_order,
            'month' => $month,
            'values_pay' => $values_pay,


        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }

    public function actionAvtorizatsiya()
    {
      if(isset(Yii::$app->user->identity->id))
      {
        return $this->render('error');
      }        
       else
        {
            Yii::$app->user->logout();
            $this->redirect(['login']);
        }

    }

    public function actionSetThemeValues()
    {
        $session = Yii::$app->session;
        if (isset($_POST['sd_position'])) $session['sd_position'] = $_POST['sd_position'];

        if (isset($_POST['header_styling'])) $session['header_styling'] = $_POST['header_styling'];

        if (isset($_POST['sd_styling'])) $session['sd_styling'] = $_POST['sd_styling'];

        if (isset($_POST['cn_gradiyent'])) $session['cn_gradiyent'] = $_POST['cn_gradiyent'];

        if (isset($_POST['cn_style'])) $session['cn_style'] = $_POST['cn_style'];

        if (isset($_POST['boxed'])) $session['boxed'] = $_POST['boxed'];

    }

    public function actionSdPosition()
    {
        $session = Yii::$app->session;
        if($session['sd_position'] != null) return $session['sd_position'];
        else return 1;
    }

    public function actionHeaderStyling()
    {
        $session = Yii::$app->session;
        if($session['header_styling'] != null) return $session['header_styling'];
        else return 1;
    } 

    public function actionSdStyling()
    {
        $session = Yii::$app->session;
        if($session['sd_styling'] != null) return $session['sd_styling'];
        else return 1;
    } 

    public function actionCnGradiyent()
    {
        $session = Yii::$app->session;
        if($session['cn_gradiyent'] != null) return $session['cn_gradiyent'];
        else return 1;
    } 

    public function actionCnStyle()
    {
        $session = Yii::$app->session;
        if($session['cn_style'] != null) return $session['cn_style'];
        else return 1;
    } 
    public function actionBoxed()
    {
        $session = Yii::$app->session;
        if($session['boxed'] != null) return $session['boxed'];
        else return 1;
    } 

}

