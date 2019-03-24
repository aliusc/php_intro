<?php


namespace Nfq\Akademija\Not_Typed {

    function calculateHomeWorkSum(...$numbers): int
    {
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += $number;
        }
        return $sum;
    }
}


namespace Nfq\Akademija\Soft {

    function calculateHomeWorkSum(int...$numbers): int
    {
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += $number;
        }
        return $sum;
    }

}

namespace {

    function calculateHomeWorkSum(...$numbers)
    {
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += $number;
        }
        return $sum;
    }
}