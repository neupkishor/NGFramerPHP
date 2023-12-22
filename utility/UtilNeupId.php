<?php

namespace ngframerphp\utility;

class UtilNeupId
{
    // Function > is_valid_neupid_format()
    // Checks if the format of the (string)neupid is correct or not.
    // Returns (bool)true if the (string)neupid format is correct, else returns (bool)false.
    public static function isValidPrimaryNeupIdFormat($neupId): bool
    {
        // Regular expression pattern to match letters (upper and lower case), numbers, and underscore.
        if (preg_match('/^[a-zA-Z0-9_]+$/', $neupId)) {
            return true;
        }
        return false;
    }


    public static function isValidNeupIdFormat($neupId): bool
    {
        // Regular expression pattern to match letters (upper and lower case), numbers, underscore, and period.
        if (preg_match('/^[a-zA-Z0-9_.]+$/', $neupId)) {
            return true;
        }
        return false;
    }



    public static function isValidExtensionNeupIdFormat($extensionId): bool
    {
        // Regular expression pattern to match only letters (upper and lower case).
        if (preg_match('/^[a-zA-Z]+$/', $extensionId)) {
            return true;
        }
        return false;
    }


    public static function isReservedNeupId($askedNeupId): bool
    {
        $reservedNeupId = ['settings', 'neup', 'profile', 'username', 'example', 'home', 'me', 'neupgroup', 'chat', 'messages', 'index'];
        if (in_array($askedNeupId, $reservedNeupId)){
            return false;
        }
        return true;
    }
}
