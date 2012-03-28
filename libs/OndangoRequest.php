<?php

require_once dirname (__FILE__)."/OndangoResponse.php";

class OndangoRequest
{
	private $protocol		= "http://";//"https://"
	private $host			= "localhost/ondango/ondango.com/cms/cms/api/";// "api.ondango.com/";
	private $expires		= "+1 hour";
	private $api_secret		= null;
	private $method			= null;
	private $url			= null;
	private $params			= array ();
	private $headers		= array
	(
		"Expect:",
		"User-Agent: Ondango PHP SDK 0.1"
	);

	
	public function __construct ($method, $url, $params)
	{
		$this->api_secret = $params["api_secret"];
		unset ($params["api_secret"]);

		$this->url = $url;
		$this->method = $method;
		$this->params = $params;
		
		// Sign request
		if (!empty ($this->api_secret))
		{
			$this->params["api_expires"] = gmdate ('Y-m-d H:i:s+00:00', strtotime ($this->expires));
			$this->params["api_signature"] = $this->create_signature ();
		}
	}


	public function execute ()
	{
		$curl = curl_init ();
		$response = new OndangoResponse ();

		curl_setopt_array ($curl, $this->get_curlOptions ());

		$response->data				= curl_exec ($curl);
		$response->curl_info		= curl_getinfo ($curl);
		$response->curl_errorNo		= curl_errno ($curl);
		$response->curl_errorMsg	= curl_error ($curl);

		curl_close ($curl);

		return $response->has_error () ? $response->error () : $response->data;
	}


	private function get_curlOptions ()
	{
		$options		= array ();
		$url			= $this->protocol.$this->host.$this->url;
		$is_POSTorPUT	= (strtolower ($this->method) == "post"  || strtolower ($this->method) == "put");
		
		if ($is_POSTorPUT)
		{
			$options[CURLOPT_POSTFIELDS] = $this->params;
		}
		else
		{
			$url .= "?".http_build_query ($this->params);
		}

		$options = $options + array
		(
			CURLOPT_URL				=> $url,
			CURLOPT_RETURNTRANSFER	=> true,
			CURLOPT_CUSTOMREQUEST	=> $this->method,
			CURLOPT_HTTPHEADER		=> $this->headers
		);

		return $options;
	}
	
	private function create_signature ()
	{
		return hash_hmac ("sha1", http_build_query ($this->params), $this->api_secret);
	}
}
?>
