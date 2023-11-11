<?php
namespace App\Utils;

class ArrayUtil{
    public static function removeItemFromArray($array, $itemToRemove){
        $index = array_search($itemToRemove, $array);

        if ($index !== false) {
            array_splice($array, $index, 1);
        }

        return array_values($array);
    }
}

