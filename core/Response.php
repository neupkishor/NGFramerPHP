<?php

namespace ngframerphp\core;

class Response
{

	public function setStatusCode(int $statusCode)
	{
		http_response_code($statusCode);
	}

	public function renderView($layoutView, $contentView, $contentParam = [])
	{
		// Load the layout data and the content data.
		$layoutData = $this->loadLayoutData($layoutView, $contentParam);
		$contentData = $this->loadContentData($contentView, $contentParam);
		// Replace the {{content}} with the $contentData to create view.
		echo str_replace('{{content}}', $contentData, $layoutData);
	}

	protected function loadLayoutData($layoutView, $contentParam = [])
	{
		extract($contentParam);
		ob_start();
		include_once ROOT . "/view/layout/{$layoutView}.php";
		return ob_get_clean();
	}

	protected function loadContentData($contentView, $contentParam = [])
	{
		extract($contentParam);
		ob_start();
		include_once ROOT . "/view/{$contentView}.php";
		return ob_get_clean();
	}
}
