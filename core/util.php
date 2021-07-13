<?php

class utilGetWebPageMotorQuotation extends Main{
	public function doTask(){
		$this->json->curl->url = MOTOR_QUOTATION;
		return json_decode((new utilGetWebPage($this->type,$this->json))->doTask());
	}
}

class utilGetWebPageMotorReport extends Main{
	public function doTask(){
		$this->json->curl->url = MOTOR_REPORT;
		return json_decode((new utilGetWebPage($this->type,$this->json))->doTask());
	}
}

class utilCheckToken extends Main{
	public function doTask(){

		$this->json->curl->param = new \stdClass();
		$this->json->curl->url = MOTOR_AUTH . "?token=" . ((new utilGetToken($this->type,$this->json))->doTask());

		$result = (new utilGetWebPage($this->type,$this->json))->doTask();
		return json_decode($result);
	}
}

class utilGetWebPage extends Main{
	public function doTask(){

		$authorization = "Authorization: Bearer " . ((new utilGetToken($this->type,$this->json))->doTask());

		$options = array(
	        CURLOPT_RETURNTRANSFER => true,   // return web page
	        CURLOPT_HEADER         => false,  // don't return headers
	        CURLOPT_FOLLOWLOCATION => true,   // follow redirects
	        CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
	        CURLOPT_ENCODING       => "",     // handle compressed
	        CURLOPT_USERAGENT      => "test", // name of client
	        CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
	        CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
	        CURLOPT_TIMEOUT        => 120,    // time-out on response
	        CURLOPT_POSTFIELDS     => json_encode($this->json->curl->param),    // time-out on response
	        CURLOPT_HTTPHEADER	   => array('Content-Type: application/json' , $authorization ),
	    ); 

	    $ch = curl_init($this->json->curl->url);
	    curl_setopt_array($ch, $options);

	    $content  = curl_exec($ch);

	    curl_close($ch);

	    return $content;
	}
}

class utilGetToken extends Main{
	public function doTask(){

	    $headers = ((new utilGetAuthorizationHeaders($this->type,$this->json))->doTask());
	    // HEADER: Get the access token from the header
	    if (!empty($headers)) {
	        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
	            return $matches[1];
	        }
	    }

	    return "";
	}
}

class utilGetAuthorizationHeaders extends Main{
	public function doTask(){

	    $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
	}
}

 ?>
