<?php
class Login
{
	public $Email;
	public $Password;	

	public function __construct($Email, $Password){
		$this->Email = $Email;
		//$salt = sha1(md5($Password));
		//$this->Password = $Password.$salt;
		$this->Password = $Password;
	}
}
?>