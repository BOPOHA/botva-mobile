<?php  
class PropertyPage
{
    private $_properties = array(
                      'name' => null,
                      'dateofbirth' => null,
                      'time_server' => null
                     );
    var $html;
    function __get($propertyName)
    {
        
        if(!array_key_exists($propertyName, $this->_properties))
        {
            throw new Exception('Недопустимое значение свойства!');
        }
        
        if(method_exists($this, 'get'. $propertyName))
			{
				return call_user_func(array(
						  $this,
						  'get'. $propertyName
						 ));
			}
			else 
			{
	//            return $this->_properties[$propertyName]; 
				global $xpath, $k, $rip_id;
				$dom = new doMDocument();
				$dom -> preserveWhiteSpace = false;
				$dom -> formatOutput = true;
				@$dom -> loadHTML($this->html);
				$xdom = new doMXPath($dom);
				return $xdom -> query($xpath[$propertyName][0]) -> item(0) -> nodeValue ;
				//$htm = $xdom -> query('/html/head/title') -> item(0) -> nodeValue ;
				//echo $htm;
				//echo "666";
			}
    }
    function __set($propertyName, $value)
    {
        
        if(!array_key_exists($propertyName, $this->_properties))
        {
            throw new Exception('Недопустимое значение свойства!');
        }
        
        if(method_exists($this, 'set'. $propertyName))
        {
            return call_user_func(array(
                      $this,
                      'set'. $propertyName
                     ), $value);
        }
        else 
        {
            $this->_properties[$propertyName] = $value;
        }
    }
    function setUrl($url)
    {
        global $useragent, $httpheader, $user_cookie_file, $k;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $user_cookie_file);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $user_cookie_file);
        $this->html = curl_exec($ch);
        curl_close($ch);
        $k = substr($this->html, strpos($this->html, "var KEY=") + 8, 5);
        $_SESSION['k'] = $k;
        echo $k;
    }
}
?>
