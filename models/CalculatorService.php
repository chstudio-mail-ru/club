<?php


namespace app\models;


class CalculatorService
{


    public function plus($a, $b)
    {
        return $a + $b;
    }

    public function minus($a, $b)
    {
        return $a - $b;
    }

    public function times($a, $b)
    {
        return $a * $b;
    }

    public function divided_by($a, $b)
    {
        try {
            return $a / $b;
        } catch (\Exception $e) {
            return 'Exception: '.$e->getMessage();
        }
    }
}