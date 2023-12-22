<?php

namespace ngframerphp\utility;

final class UtilPassword
{

    // Salts the password to convert "password" to "pswpasswordsod" like structure.
    public function saltPassword($password)
    {
        $pre =  $password[0] . $password[2] . $password[4];
        $post =  $password[strlen($password) - 1] . $password[strlen($password) - 3] . $password[strlen($password) - 5];
        // Add f1, f3, f5 to before the password and l5, l3, l1 to after the password.
        $password =  $pre . $password . $post;
        return $password;
    }



    // Use the hashing algorithm after the password has been salted using the BYCRYPT method. Returns string value of the hashed password.
    public static function hashPassword($password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }



    // Checks if the unhashedPassword is same as the hashed password. Returns (bool) true or false.
    public static function verifyPassword($unhashedPassword, $hashedPassword): bool
    {
        return (bool) password_verify($unhashedPassword, $hashedPassword);
    }



    // Calculates the strength of password using a lot of arruments. and returns the password strength in number (int) between 0 to 100.
    public static function calculatePasswordStrength($password, $firstName, $middleName, $lastName, $phoneNumber, $countryName, $birthDate): int
    {
        // Grab the commonPasswords and leakedPasswords from the same class.
        $commonPasswords = [];
        $leakedPasswords = [];
        // Initialize with password strength 0.
        $passwordStrength = 0;
        // Check if it is (1)commonPassword, or (2)leakedPassword.
        if (in_array($password, $commonPasswords)) {
            $passwordStrength = 0;
        } else if (in_array($password, $leakedPasswords)) {
            $passwordStrength = 0;
        }
        // Check for passwordStrength using password length.
        $passwordLength = strlen($password);
        if ($passwordLength >= 4 && $passwordLength < 8) {
            $passwordStrength += 10;
        }
        if ($passwordLength >= 8 && $passwordLength < 12) {
            $passwordStrength += 10;
        }
        if ($passwordLength >= 12 && $passwordLength < 16) {
            $passwordStrength += 10;
        }
        if ($passwordLength >= 16 && $passwordLength < 20) {
            $passwordStrength += 10;
        }
        // Check if it has (1)numbers, (2)lowerCaseLetters, (3)upperCaseLetters, and (4)specialCharacters
        if (preg_match('/\d/', $password)) {
            $passwordStrength += 10;
        }
        if (preg_match('/[a-z]/', $password)) {
            $passwordStrength += 5;
        }
        if (preg_match('/[A-Z]/', $password)) {
            $passwordStrength += 10;
        }
        if (preg_match('/[^A-Za-z\d]/', $password)) {
            $passwordStrength += 15;
        }
        // Check if password has (1)firstName, (2)middleName, (3)lastName, (4)phoneNumber, (5)countryName, or (6)birthDate.
        $birthDate = str_replace('/', '', $birthDate);
        if (
            stripos($password, $firstName) !== false ||
            stripos($password, $middleName) !== false ||
            stripos($password, $lastName) !== false ||
            stripos($password, $phoneNumber) !== false ||
            stripos($password, $countryName) !== false ||
            stripos($password, $birthDate) !== false
        ) {
            $passwordStrength -= 30;
        }
        // Ensure the final strength is not negative and within the range of 0 to 100
        $passwordStrength = max(0, min($passwordStrength, 100));
        // Return the password strength.
        return $passwordStrength;
    }
}
