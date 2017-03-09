<?php

namespace app\controllers;

use app\models\Images;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Form;
use app\models\ContactForm;
use app\models\LoginForm;
use yii\web\UploadedFile;

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
     * @return string
     */
    public function actionIndex()
    {
        $model = new Form();
        $images = new Images();
        return $this->render('form',array(
           'model' => $model,'images' => $images
        ));
    }
public function actionForm()
{
    $model = new Form();
    $images = new Images();
    if($model->load(Yii::$app->request->post()) && $images->load(Yii::$app->request->post()) && $model->save()){
            $images->form_id = $model->id;
            $images->imagesFiles = UploadedFile::getInstances($images,'imagesFiles');
        $message = Yii::$app->mailer->compose()
            ->setFrom('prozrostl@gmail.com')
            ->setTo($model->email)
            ->setSubject('Hello from Yii2')
            ->setTextBody('Имя' . $model->name . '' . 'Возраст' . $model->age . '' . 'Рост' . $model->height . '' . 'Вес' . $model->weight . '' . 'Нужна ли техника' . $model->techies . '' . 'Уровень английского' . $model->english_level . '');
            foreach ($images->imagesFiles as $file){
                $folder = (\Yii::$app->basePath.'/web/uploads/'.$file->name);
                $file->saveAs(\Yii::$app->basePath.'/web/uploads/'.$file->name);
                $images->images .=$folder . ';';
                $message->attach($folder);
            }
        $message->send();
        $images->save(false);
        $this->goHome();
   }
    return $this->render('form',array(
       'model' => $model,'images' => $images
    ));
}
    /**
     * Login action.
     *
     * @return string
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
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
