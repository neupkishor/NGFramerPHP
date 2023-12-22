<?php

namespace ngframerphp\utility;

final class UtilUrl
{


	public static function isValidUrl($url)
	{
		return (bool) filter_var($url, FILTER_VALIDATE_URL);
	}


}
