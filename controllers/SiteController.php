<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\captcha\Captcha;
use yii\captcha\CaptchaValidator;

class SiteController extends Controller {

	/**
	 * @inheritdoc
	 */
	public function behaviors() {
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only'  => [ 'logout' ],
				'rules' => [
					[
						'actions' => [ 'index', 'getimagefromgiphy' ],
						'allow'   => true,
						'roles'   => [ '@' ],
					],
				],
			],
			'verbs'  => [
				'class'   => VerbFilter::className(),
				'actions' => [
					'logout' => [ 'post' ],
				],
			],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [
			'error'   => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				//'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex() {

		$tree           = [ 0 => [ 'id' => 0, 'parent' => null ] ];
		$minNodes       = 100;
		$maxNodes       = 1000;
		$countNodes     = rand( $minNodes, $maxNodes );
		$countNodesTree = 1;
		$coefficient    = 20;
		while ( $countNodes > 0 )
		{
			foreach ( $tree as $key => $node )
			{
					if ( $countNodes > $coefficient ) {
						$countChild = rand( 0, $countNodes / $coefficient );
					} else {
						$countChild = rand( 0, $countNodes );
					}
					$countNodes -= $countChild;
					while ( $countChild > 0 ) {
						array_push( $tree, [ 'id' => $countNodesTree ++, 'parent' => $node['id'] ] );
						$countChild --;
					}
			}
			$countNodes --;
		}

		return $this->render('index', [ 'tree' => $tree ]);
	}

	public function actionGetimagefromgiphy() {
		$request = Yii::$app->request;
		$validate = new CaptchaValidator();
		$code = $validate->validate($request->post('captcha'));

		return json_encode(['status' => $code]);
	}
}
