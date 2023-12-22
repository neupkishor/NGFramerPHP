<?php

namespace ngframerphp\utility;

use DateTime;

final class UtilDatetime
{


    // Function > is_date_valid
    // Description > Returns (bool)true if the date is valid in format else returns (bool)false. Date format is Y-m-d. No use of other date format.
    public static function isValidDate($date)
    {
        // Specify the expected date format.
        $format = 'Y-m-d';
        // Create a DateTime object from the given date string.
        $dateTime = DateTime::createFromFormat($format, $date);
        // Check if the DateTime object was successfully created and if its formatted value matches the original date string.
        // If both conditions are true, the date is considered valid
        return (bool) $dateTime && $dateTime->format($format) === $date;
    }


    

    // Returns if the date of birth is valid by checking if date is in past or today.
    public static function isValidBirthdate($date)
    {
        $currentDate = new DateTime();
        if (UtilDatetime::isValidDate($date)) {
            $providedDate = DateTime::createFromFormat('Y-m-d', $date);
            if ($providedDate && $providedDate <= $currentDate) {
                return true;
            }
        }
        return false;
    }





    // Calculates the date of birth and returns in 3 decimal digits.
    public static function calculateAge($birthdate)
    {
        if (UtilDatetime::isValidDate($birthdate)) {
            $birthdate = DateTime::createFromFormat('Y-m-d', $birthdate);
            $currentDate = new DateTime();
            $diff = $currentDate->diff($birthdate);
            return round($diff->y + ($$diff->m / 12), 3);
        }
        return false;
    }





    // Check if the age is really valid. Use the max/min age of person to determine.
    public static function isValidAge($birthdate)
    {
        if (UtilDatetime::isValidDate($birthdate)) {
            $age = UtilDatetime::calculateAge($birthdate);
            if (($age > 0) && ($age < 120)) {
                return true;
            }
            return false;
        }
    }




    // Check if the age is fine for Individual NeupID type.
    public static function isValidIndivAge($birthdate)
    {
        if (UtilDatetime::isValidAge($birthdate)) {
            $age = UtilDatetime::calculateAge($birthdate);
            if (UtilDatetime::isValidAge($birthdate) && ($age >= 16)) {
                return true;
            }
        }
        return false;
    }




    // Check if the age is fine for Individual NeupID type.
    public static function isValidDependentAge($birthdate)
    {
        if (UtilDatetime::isValidAge($birthdate)) {
            $age = UtilDatetime::calculateAge($birthdate);
            if (UtilDatetime::isValidAge($birthdate) && ($age < 16)) {
                return true;
            }
        }
        return false;
    }



    // Handelling birthdate for certain countries like:






}
