<?php

class PostController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '/layouts/column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'create', 'update'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView()
    {
        $post = $this->loadModel();

        $this->render('view', array(
            'model' => $post
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Post;
        if (isset($_POST['Post'])) {
            $model->attributes = $_POST['Post'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate()
    {
        $model = $this->loadModel();
        if (isset($_POST['Post'])) {
            $model->attributes = $_POST['Post'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(array('index'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex($year = null, $month = null, $category = null)
    {
        $criteria = new CDbCriteria(array(
            'order' => 'published_at DESC',
        ));

        if (isset($year)) {
            $criteria->addCondition("YEAR(published_at) = $year");
        }

        if (isset($month)) {
            $criteria->addCondition("MONTH(published_at) = $month");
        }

        if (isset($category)) {
            if (Category::model()->findByPk($category) == null)
                throw new CHttpException(404, 'The requested page does not exist.');

            $criteria->addCondition("category_id = $category");
        }

        $dataProvider = new CActiveDataProvider('Post', array(
//            'pagination' => array(
//                'pageSize' => Yii::app()->params['postsPerPage'],
//            ),
            'criteria' => $criteria,
        ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Post('search');
        if (isset($_GET['Post']))
            $model->attributes = $_GET['Post'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id'])) {
                $this->_model = Post::model()->findByPk($_GET['id']);
            }
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }
}
