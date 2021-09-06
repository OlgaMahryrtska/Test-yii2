<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Product;
use yii\data\ActiveDataProvider;

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
                'only' => ['logout'],
                'rules' => [
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
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */

    public function actionHello(){
        return $this->render('hello', ['param'=>"Autumn came"]);

    }
     public function actionProducts2(){
         $dataProvider = new ActiveDataProvider([
             'query'=>Product::find(),
             'pagination'=>[
                 'pageSize'=>3,
             ],
            ]);
        return $this->render('product2', ['dataProvider' =>$dataProvider]);
     }
      public function actionAdd(){
          $model = new Product();
          if($model->load(Yii::$app->request->post())){
              $model->save();
             return $this->redirect(['view','id'=>$model->id]);
         }
         
         return $this->render('edit',['model'=>$model]);

      }

      public function actionDelete($id){
        $model = Product::findOne($id);
        if($model) $model->delete();
        return $this->redirect(['products2']);
      }

     public function actionUpdate($id){
         $model=Product::findOne($id);
         if($model->load(Yii::$app->request->post())){
              $model->save();
             return $this->redirect(['view','id'=>$model->id]);
         }
         
         return $this->render('edit',['model'=>$model]);
     }
     public function actionView($id){
         $model = Product::findOne($id);
         return $this->render('view',['model'=>$model]);

     }

    public function actionProducts(){
      $rows =  Product:: find()->all();
      return $this->render('product', ['rows'=> $rows]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
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

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
