<?php

namespace ngframerphp\utility;


final class UtilCommon
{

    // Function > sanitize().
    // Description > Sanitizes (string)data by converting special characters into their HTML entities and returns HTML entities converted (string)data.
    public static function sanitize($data)
    {
        // Sanitize the (string)data and return it.
        return htmlspecialchars($data);
    }


    // Function > cleanTrim().
    // Description > Trims if there are more than one space concurrently in the provided (string)data, and returns trimmed (string)data.
    // Returns the data by reducing unwanted whitespace and consistent whitespace.
    public static function cleanTrim($data)
    {
        // Trim the string to remove leading and trailing whitespace.
        $data = trim($data);
        // Replace any sequences of consecutive whitespace characters with a single space character.
        $data = preg_replace('/\s+/', ' ', $data);
        // Return the final trimmed data.
        return $data;
    }


    // Function > isOnlyWhitespace().
    // Description > Returns (bool)true if the string(data) is only whitespace character, else returns (bool)false.
    public static function isOnlyWhiteSpace($data)
    {
        // Loop through the string(data) and check if each character is a whitespace character.
        for ($i = 0; $i < strlen($data); $i++) {
            // If any character is not a whitespace character, return False.
            if (!ctype_space($data[$i])) {
                return false;
            }
        }
        // Check was suuccessful and all characters in the string(data) are whitespace characters, so return True.
        return true;
    }


    // Function > isOnlyNumber().
    // Description > Returns (bool)true is the (string)data sent contains only number.
    public static function isOnlyNumber($data)
    {
        // Return if the data is numeric in nature.
        return is_numeric($data);
    }


    // Function > makeArray().
    // Returns > (Array) made by merging one/multiple array/s.
    // Usecase > Binding the error values from multiple functions.
    // Description > Takes in multiple or single arrays with and then marges to make a single error.
    public static function mergeArray(...$arrays): array
    {
        $mergedArray = [];
        // Iterate through each input array
        foreach ($arrays as $array) {
            // Iterate through the keys of the current array
            foreach (array_keys($array) as $key) {
                // Get the current value in the merged array (if exists)
                $value = isset($mergedArray[$key]) ? $mergedArray[$key] : [];
                // Get the value from the current array
                $newValue = isset($array[$key]) ? $array[$key] : [];

                // Handle merging based on the types of values
                if (is_array($value) && is_array($newValue)) {
                    $mergedArray[$key] = array_values(array_unique(array_merge($value, $newValue), SORT_REGULAR));
                } elseif (is_array($value) && !is_array($newValue)) {
                    $mergedArray[$key] = array_values(array_unique(array_merge($value, [$newValue]), SORT_REGULAR));
                } elseif (!is_array($value) && is_array($newValue)) {
                    $mergedArray[$key] = array_values(array_unique(array_merge([$value], $newValue), SORT_REGULAR));
                } else {
                    $mergedArray[$key] = array_values(array_unique([$value, $newValue], SORT_REGULAR));
                }

                // Handle merging for nested arrays
                if (is_array($value) && is_array($newValue)) {
                    foreach ($value as $innerKey => $innerValue) {
                        if (is_array($innerValue) && isset($newValue[$innerKey]) && is_array($newValue[$innerKey])) {
                            // Recursively merge nested arrays
                            $mergedArray[$key][$innerKey] = self::mergeArray($mergedArray[$key][$innerKey] ?? [], $newValue[$innerKey]);
                        }
                    }
                }
            }
        }
       return $mergedArray;
    }
}