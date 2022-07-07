<?php
class PhoneKeyboardConverter
{
    private static $letterArr = [
        'a' => 2, 'b' => 22,   'c' => 222,
        'd' => 3, 'e' => 33,  'f' => 333,
        'g' => 4, 'h' => 44, 'i' => 444,
        'j' => 5, 'k' => 55, 'l' => 555,
        'm' => 6, 'n' => 66,  'o' => 666,
        'p' => 7, 'q' => 77,  'r' => 777,  's' => 777,
        't' => 8, 'u' => 88,  'v' => 888,
        'w' => 9, 'x' => 99,  'y' => 999, 'z' => 9999,
        ' ' => 0
    ];

    static function convertToNumeric($string)
    {
        $result = '';
        $newString = strtolower($string);
        $stringArr =  str_split($newString);
        $lastIndex = count($stringArr) - 1;
        foreach ($stringArr as $currentIndex => $substring) {
            $result .= self::findCode($substring, $currentIndex, $lastIndex);
        }
        return $result;
    }

    static function convertToString($numeric)
    {
        $result = '';
        $numberArr = explode(",", $numeric);
        foreach ($numberArr as $s) {
            $result .= self::findLetter($s);
        }
        return $result;
    }

    private static function findLetter($string)
    {
        $newString = '';
        foreach (self::$letterArr as $codeindex => $code) {
            if ($string == $code) {
                $newString .=  $codeindex;
                break;
            }
        }
        return $newString;
    }
    private static function findCode($string, $currentN, $lastN)
    {
        $newcode = '';
        foreach (self::$letterArr as $codeindex => $code) {
            if ($string == $codeindex) {
                $newcode .=  $code;
                
                if ($currentN !== $lastN) {
                    $newcode .=  $code. ',';
                }
                
              break;
            }
        }

        return $newcode;
    }
};
$numberToConvert = '5,2,22,555,33,222,9999,66,444,55';
$stringToConvert = 'Ela nie ma kota';

$newConvertString = PhoneKeyboardConverter::convertToNumeric($stringToConvert);
echo $newConvertString; // "33,555,2,0,66,444,33,0,6,2,0,55,666,8,2" 

$newConvertNumeric = PhoneKeyboardConverter::convertToString($numberToConvert);
echo $newConvertNumeric; // "jablecznik"
