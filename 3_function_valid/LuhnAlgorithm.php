<?php


class LuhnAlgorithm
{
    public function validation($digit)
    {
        if(preg_match('/[A-Za-z]/', $digit)) return false;
        if(empty($digit)) return false;
        $number = strrev(preg_replace('/[^\d]/', '', $digit));
        $sum = 0;
        for ($i = 0, $j = strlen($number); $i < $j; $i++) {
            if (($i % 2) == 0) {
                $val = $number[$i];
            } else {
                $val = $number[$i] * 2;
                if ($val > 9)  {
                    $val -= 9;
                }
            }
            $sum += $val;
        }
        return (($sum % 10) === 0);
    }
}