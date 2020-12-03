<?php

namespace app\modules\api\controllers;

use app\modules\api\models\LoginForm;
use app\modules\api\models\SignupForm;
use Yii;
use yii\filters\Cors;
use yii\rest\Controller;
use yii\web\Response;

/**
 * Default controller for the `api` module
 */
class UsersController extends Controller
{
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'cors' => Cors::class
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $model->getUser()->toArray(['id', 'username', 'password', 'access_token']);
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post(), '') && $model->register()) {
            return true;
        }

        Yii::$app->response->statusCode = 422;
        return [
            'errors' => $model->errors
        ];
    }
}
