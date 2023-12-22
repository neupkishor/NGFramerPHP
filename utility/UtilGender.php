<?php

namespace ngframerphp\utility;

final class UtilGender
{
    public static function isValidGender($gender):bool
    {
        // Only 4 gender types are valid.
        if ($gender == "male" ||$gender == "female" ||$gender == "custom" ||$gender == "undisclosed"){
            return true;
        }else{
            return false;
        }
    }
}
