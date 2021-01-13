<?php

namespace app\models;

use JetBrains\PhpStorm\Pure;
use yii\base\Model;
use app\services\dto\CalculateDto;

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

    /**
     * @return CalculateDto
     */
    public function getDto(): CalculateDto
    {
        $dto = new CalculateDto();
        $dto->operation = $this->operation;
        $dto->number1 = $this->number1;
        $dto->number2 = $this->number2;

        return $dto;
    }
}
