<?php


interface CalculatorInterface {
    public  function sum();

    public function minus();

    public function multiply();

    public function divide();
}

/**
 * Class Calculator
 * @version 1.1
 * @example php index.php 2 + 5
 */
class Calculator implements CalculatorInterface
{
    private $arg1;
    private $arg2;
    private $expr;

    public function __construct($str) {
        if(empty($str)) {
            trigger_error("Empty input", E_USER_ERROR);
        }
        list($this->arg1, $this->expr, $this->arg2) = $this->parse($str);
    }

    /**
     * @return mixed
     */
    public function getExpr()
    {
        return $this->expr;
    }

    /**
     * Calculates the sum of args
     * @return mixed
     */
    public  function sum()
    {
        $this->checkArgs($this->arg1, $this->arg2);
        return $this->arg1 + $this->arg2;
    }

    /**
     * Calculate the difference
     * @return mixed
     */
    public function minus()
    {
        $this->checkArgs($this->arg1, $this->arg2);
        return $this->arg1 - $this->arg2;
    }

    /**
     * The calculation of the multiplication
     * @return mixed
     */
    public function multiply()
    {
        $this->checkArgs($this->arg1, $this->arg2);
        return $this->arg1 * $this->arg2;
    }

    /**
     * Calculation of fission
     * @return float
     */
    public function divide()
    {
        $this->checkArgs($this->arg1, $this->arg2);

        if ($this->arg2 == 0) {
            trigger_error("You cannot divide to zero", E_USER_ERROR);
        }
        return $this->arg1 / $this->arg2;
    }

    /**
     * @param $arg1
     * @param $arg2
     */
    public function checkArgs($arg1, $arg2)
    {
        if (!is_numeric($arg1) || !is_numeric($arg2)) {
            trigger_error("Arguments should be a number", E_USER_ERROR);
        }
    }

    /**
     * @param $argv
     * @return array
     */
    public function parse($argv)
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

$calculator =  new Calculator($argv);

switch ($calculator->getExpr()) {
    case '+':
        $result = $calculator->sum();
        break;
    case '-':
        $result = $calculator->minus();
        break;
    case '*':
        $result = $calculator->multiply();
        break;
    case '/':
        $result = $calculator->divide();
        break;
    default:
        trigger_error("Unknown expression, example: 2 + 5", E_USER_ERROR);
}

echo "\r\nResult: " . $result;