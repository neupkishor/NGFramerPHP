<?php

namespace ngframerphp\utility;

final class UtilEmail
{
	public static function isValidEmail($email)
	{
		// Using filter_var function with FILTER_VALIDATE_EMAIL flag
		return (bool) filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
	}
}
