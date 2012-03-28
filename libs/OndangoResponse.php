<?php

class OndangoResponse
{
	public $data			= null;
	public $curl_info		= null;
	public $curl_errorNo	= null;
	public $curl_errorMsg	= null;


	public function has_error ()
	{
		return !$this->curl_errorNo ? false : true;
	}

	public function error ()
	{
		return sprintf ('CURL Error: %d: %s', $this->curl_errorNo, $this->curl_errorMsg);
	}
}
?>
