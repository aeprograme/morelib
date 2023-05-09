<?php

namespace More;
/** A Class that handles mathmatical equations */
class Math {
    /**
     * Returns the remainder of dividing First number on Second number
     * @param int|float $firstNumber
     * @param int|float $secondNumber
     * @return int|float
     */
    static function Modulo(int|float $firstNumber, int|float $secondNumber) : int|float
    {
        return $firstNumber % $secondNumber;
    }
    /**
     * Divide the first number on second number
     * @param int|float $firstNumber
     * @param int|float $secondNumber
     * @return int|float
     */
    static function Divide(int|float $firstNumber, int|float $secondNumber) : int|float
    {
        return $firstNumber / $secondNumber;
    }
    /**
     * Returns the absolute number of $number
     * @param int|float $num
     * @return int|float
     */
    static function Absolute(int|float $num) : int|float
    {
        return abs($num);
    }
    /**
     * Returns the arc cosine of $num
     * @param int|float $num
     * @return float
     */
    static function ArcCosine(int|float $num) : float
    {
        return acos($num);
    }
    /**
     * Returns the inverse arc cosine of $num which is a number
     * @param int|float $num
     * @return float
     */
    static function HyperbolicCosine(int|float $num) : float
    {
        return acosh($num);
    }
}