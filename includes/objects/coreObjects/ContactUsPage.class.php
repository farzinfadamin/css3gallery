<?php 

class ContactUsPage {
	
	private $fullName;
	private $emailAddress;
	private $phoneNumber;
	private $message;
	private $service;
	private $hear;
	

	
	private static $emailTemplate;
	private static $userEmailTemplate;
	private static $emailTitle = 'The PerGen Productions Website Contact Us Form';
	private static $to = 'info@pergenproductions.com';
	private static $cc = 'arahimza@yahoo.com';
	private static $bcc = 'pedramphp@gmail.com';
	private static $subject = "New Message: The PerGen Productions Website Contact Us Form";
	private static $emailLogo;
	private static $bgDate;
	private static $bgMessage;
	private static $divider;
	private static $emailBg;
	
	private $request;
	private $services = array();
	
	private static $empty = "(Empty)";
	
	public function __construct( $request ){
	
		$this->request = $request;
	
		self::$emailTemplate = LiteFrame::GetApplicationPath()."email/contact.html";
		self::$userEmailTemplate = LiteFrame::GetApplicationPath().'email/contactUser.html';
		self::$emailLogo = LiteFrame::GetImagePath()."email/logo-pergenproductions.png";
		self::$bgMessage = LiteFrame::GetImagePath()."email/bg-message.png";
		self::$emailBg = LiteFrame::GetImagePath()."email/bg-email.png";
		
		self::$divider = ""; //FILL THIS 
		
		foreach( $request as $key => $value ){
			
			$request[$key] = htmlspecialchars(stripslashes(ucfirst( trim( $value ))));
			if(empty($request[$key]) && $key != 'emailAddr'){
				$request[$key] = self::$empty; 
			}
		}
		$this->fullName =		$request['fullName'];
		$this->emailAddress =	$request['emailAddr'];
		$this->phone =			$request['phoneNumber'];
		$this->message =		$request['msg'];
		$this->service =        $request['service'];
		$this->hear = 			$request['whereHear'];
	}

	public function isValid(){
		return filter_var($this->emailAddress, FILTER_VALIDATE_EMAIL) && !empty($this->fullName);
	}
	
	public function submit(){
		
		$services = (empty($this->services)) ? self::$empty : $this->services;
		
		if($services != self::$empty ){		
			$services = implode("\n",$services);
		}
		
		$message = file_get_contents(self::$emailTemplate);
		
		$arrayTplVars = array('{emailLogo}','{emailBg}','{fullName}','{emailAddress}','{phone}','{message}','{divider}','{hear}','{service}','{bgMessage}','{date}');
		$arrayTplData = array(	self::$emailLogo,
								self::$emailBg,
								$this->fullName,
								$this->emailAddress,
								$this->phone,
								$this->message,
								self::$divider,
								$this->hear,
								$this->service,
								self::$bgMessage,
								date("M jS, Y H:i A"));
								
		$message = str_replace($arrayTplVars, $arrayTplData, $message);
		
		
		
		$headers = 'From: '.self::$emailTitle.' <'.$this->emailAddress.'> ' . "\r\n";
		$headers .= 'CC:' . self::$cc . "\r\n";
		$headers .= 'Bcc:' . self::$bcc . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		
		
		$userMessage = file_get_contents(self::$userEmailTemplate);
		$arrayTplVars = array('{emailLogo}','{emailBg}','{fullName}','{message}','{divider}','{date}','{emailAddress}','{phone}','{service}');
		$arrayTplData = array(	self::$emailLogo,
								self::$emailBg,
								$this->fullName,
								$this->message,
								self::$divider,
								date("M jS, Y H:i A"),
								$this->emailAddress,
								$this->phone,
								$this->service);
								
		$userMessage = str_replace($arrayTplVars, $arrayTplData, $userMessage);

		$headersUser = 'From: '.self::$emailTitle.' <'.self::$to.'>'. "\r\n";
		$headersUser .= 'MIME-Version: 1.0' . "\r\n";
		$headersUser .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		if( mail( self::$to, self::$subject, $message, $headers ) &&
			mail( $this->emailAddress, self::$subject, $userMessage, $headersUser )){
			return true;
		}else{
			return false;
		}
		
	}
}
?>
