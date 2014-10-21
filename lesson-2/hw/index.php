<?php

/**
 * Class Calculator
 * @version 1.0
 * @example php index.php 2 + 5
 */
class Calculator
{
    /**
     * Calculates the sum of args
     * @param $arg1
     * @param $arg2
     * @return mixed
     */
    static function sum($arg1, $arg2)
    {
        self::checkArgs($arg1, $arg2);
        return $arg1 + $arg2;
    }

    /**
     * Calculate the difference
     * @param $arg1
     * @param $arg2
     * @return mixed
     */
    static function minus($arg1, $arg2)
    {
        self::checkArgs($arg1, $arg2);
        return $arg1 - $arg2;
    }

    /**
     * The calculation of the multiplication
     * @param $arg1
     * @param $arg2
     * @return mixed
     */
    static function multiply($arg1, $arg2)
    {
        self::checkArgs($arg1, $arg2);
        return $arg1 * $arg2;
    }

    /**
     * Calculation of fission
     * @param $arg1
     * @param $arg2
     * @return float
     */
    static function divide($arg1, $arg2)
    {
        self::checkArgs($arg1, $arg2);

        if ($arg2 == 0) {
            trigger_error("You cannot divide to zero", E_USER_ERROR);
        }
        return $arg1 / $arg2;
    }

    /**
     * @param $arg1
     * @param $arg2
     */
    static function checkArgs($arg1, $arg2)
    {
        if (!is_numeric($arg1) || !is_numeric($arg2)) {
            trigger_error("Arguments should be a number", E_USER_ERROR);
        }
    }

    /**
     * @param $argv
     * @return array
     */
    static function parse($argv)
    {
        $argument1 = (isset($argv[1])) ? $argv[1] : '';
        $argument2 = (isset($argv[2])) ? $argv[2] : '';
        $argument3 = (isset($argv[3])) ? $argv[3] : '';

        if (empty($argument1) || empty($argument2) || empty($argument3)) {
            trigger_error("Cannot parse params", E_USER_ERROR);
        }

        return [$argument1, $argument2, $argument3];
    }
}

list($num1, $expr, $num2) = Calculator::parse($argv);

switch ($expr) {
    case '+':
        $result = Calculator::sum($num1, $num2);
        break;
    case '-':
        $result = Calculator::minus($num1, $num2);
        break;
    case '*':
        $result = Calculator::multiply($num1, $num2);
        break;
    case '/':
        $result = Calculator::divide($num1, $num2);
        break;
    default:
        trigger_error("Unknown expression, example: 2 + 5", E_USER_ERROR);
}

echo "Result: " . $result;