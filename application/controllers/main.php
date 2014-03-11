<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {


	public function main($new_name, $new_email){
		$user = json_decode(  
    file_get_contents('http://example.com/index.php/api/user/id/1/format/json')  
);  
  
echo $user->name; 
	 }

}

?>