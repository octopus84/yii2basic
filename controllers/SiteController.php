<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Validador;
use app\models\ValidadorForm;

class SiteController extends Controller
{
    public function actionEntry(){
        $model = new EntryForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // validar los datos recibidos en el modelo
            // aquí haz algo significativo con el modelo ...
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // la página es mostrada inicialmente o hay algún error de validación
            return $this->render('entry', ['model' => $model]);
        }
    }

    public function actionValidador(){
        $model = new Validador;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('confirma', ['model' => $model]);
        }else{
            return $this->render('validador', ['model' => $model]);
        }
        
    }    
    
    public function actionValidadorForm(){
        $model = new ValidadorForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('confirma', ['model' => $model]);
        }else{
            return $this->render('validadorform', ['model' => $model]);
        }
        
    }  

    public function actionFormulario($mensaje = "Bienvenido a Tuturial Yii2 - Segunda parte"){
        return $this->render("formulario",["mensaje"=>$mensaje]);
    }

    /*action para formulario*/
    public function actionRequest(){
        $mensaje =null;
        if (isset($_REQUEST["nombre"])) {
            $mensaje = "Has enviado tu nombre correctamente ".$_REQUEST["nombre"] ;
        }
        return $this->redirect(["site/formulario","mensaje"=>$mensaje]);
    }

    public function actionSaluda($get="Bienvenidos a Tutorial Yii2"){
        $mensaje ="Bienvenido a yii, ";
        $nombres = ["Octavio","Vanessa","Isidora","Muriel","Amador"];
        return $this->render("saluda",
            ["mensaje"=>$mensaje,
            "nombres"=>$nombres,
            "get2"=>$get
        ]);
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
