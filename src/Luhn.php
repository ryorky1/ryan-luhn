<?php

namespace Rhino\Luhn;

class Luhn {

    private $number;
    private $charCnt;

    /**
     * Set number that the instance should handle.
     * @param sting|int $number Number in string or int format
     */
    function __construct($number) {
        $this->setVals($number);
    }

    /**
     * Luhn algorithm validation(number must be divisible by 10)
     * @return bool
     */
    public function validLuhn() {
        $checksum = self::calculateSumTotal($this->number, $this->charCnt);
        // If the checksum  is divisible by 10 it is valid
        return ($checksum % 10) === 0;
    }

    /**
     * Calculate the checksum from a number
     * @param string $number
     * @param int $len
     * @return int
     */
    public static function calculateSumTotal($number, $len = 0) {
        //to simplify things, reverse the array(chang back)
        $number = strval(strrev($number));
        if ($len === 0) {
            $len = strlen($number);
        }

        $checkTotal = 0;
        //iterate over each digit of the number/string
        for ($i = 0; $i < $len; $i++) {
            //if it's evenly divisible by 2
            if(($i%2) !== 0) {
                $tempmultiply = intval($number[$i]) * 2;
                //if it becomes a 2 digit number subtract 9
                $temp = $tempmultiply > 9 ? $tempmultiply-9: $tempmultiply;
            }
            //if it's not evenly divisible by 2
            else{
                $temp = $number[$i];
            }

            $checkTotal += $temp;
        }
        return $checkTotal;
    }


    /**
     * Remove all none numeric characters from string
     *
     * @param string $string
     * @return string
     */
    public static function toInt($string) {
        return preg_replace("/[^\d]/", "", $string);
    }

    /**
     * Set number that will be used
     * @param string or int $number
     */
    public function setVals($inputnum) {
        $number = strval(self::toInt($inputnum));
        $len = strlen($number);

        $this->number = $number;
        $this->charCnt = $len;
    }

}
