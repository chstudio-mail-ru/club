<?php

namespace app\services;

use app\services\dto\CalculateDto;

class CalculateService
{
    private function plus(CalculateDto $calculateDto): float
    {
        return $calculateDto->number1 + $calculateDto->number2;
    }

    private function minus(CalculateDto $calculateDto): float
    {
        return $calculateDto->number1 - $calculateDto->number2;
    }

    private function times(CalculateDto $calculateDto): float
    {
        return $calculateDto->number1 * $calculateDto->number2;
    }

    private function divided_by(CalculateDto $calculateDto): float
    {
        return $calculateDto->number1 / $calculateDto->number2;
     }

    public function calculate(CalculateDto $calculateDto)
    {
        $methodName = preg_replace("/\s/", "_", $calculateDto->operation);
        if (method_exists($this, $methodName)) {
            try {
                $result = $this->$methodName($calculateDto);
            } catch (\Exception $e) {
                return 'Exception: '.$e->getMessage();
            }
        } else {
            $result = "Method {$methodName} not supported!";
        }

        return $result;
    }
}