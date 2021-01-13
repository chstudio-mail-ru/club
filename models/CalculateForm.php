<?php

namespace app\models;

use yii\base\Model;

/**
 * CalculateForm is the model behind the calculate form.
 */
class CalculateForm extends Model
{
    const OPERATIONS = [
        "plus" => 'Plus',
        "minus" => 'Minus',
        "times" => 'Times',
        "divided by" => 'Divided By',
    ];
    public $operation;
    public $number1;
    public $number2;
    public $result;

    /**
     * @return array the validation rules.
     */
    public function rules(): array
    {
        return [
            [['number1', 'number2', 'operation'], 'required'],
            [['number1', 'number2'], 'number', 'message' => 'Numeric values are required'],
            ['operation', 'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels(): array
    {
        return [
            'operation' => 'Operation',
            'number1' => 'Number1',
            'number2' => 'Number2',
        ];
    }

    public function calculate()
    {
        $methodName = preg_replace("/\s/", "_", $this->operation);
        $calculateService = new CalculatorService();
        if (method_exists($calculateService, $methodName)) {
            $this->result = $calculateService->$methodName($this->number1, $this->number2);
        } else {
            $this->result = "Method {$methodName} not supported!";
        }
    }
}
