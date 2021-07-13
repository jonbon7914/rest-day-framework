<?php

class CURL{

	public function curlPostCall($param, $url){

		// create curl resource 
        $ch = curl_init(); 
        print_r(PDO::getAvailableDrivers());
        // set url 
        // curl_setopt($ch, CURLOPT_URL, "http://localhost:8082/api-non-auth/getAllRoles"); 
        curl_setopt($ch, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_POST, 1);

        // $output contains the output string 
        $output = curl_exec($ch); 

        print_r($output);

        // close curl resource to free up system resources 
        curl_close($ch);  

        return $output;

	}

} 

?>