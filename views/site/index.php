<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\CalculateForm */
/* @var $result string */

use yii\bootstrap\ActiveForm;
use app\models\CalculateForm;
use yii\bootstrap\Html;

$this->title = 'Клуб Приключений test';
?>
<div class="site-index">
    <?php
    $form = ActiveForm::begin([
        'id' => 'calculate-form',
        'method' => 'post',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'number1')->textInput(['autofocus' => true, 'style' => 'width: 150px; display: inline']) ?>
    <?= $form->field($model, 'operation')->dropDownList(CalculateForm::OPERATIONS, ['options' => [$model->operation => ['selected' => true]]]) ?>
    <?= $form->field($model, 'number2')->textInput(['style' => 'width: 150px; display: inline']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Calculate', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?php
    if ($result !== null) {
        echo $this->render('_result', [
            'model' => $model,
            'result' => $result,
        ]);
    }
    ?>

</div>
