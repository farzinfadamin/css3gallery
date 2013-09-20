<?php 
	
	class Title extends SiteObject {
		
		public function __construct(){
			parent::__construct();	
		}
		
		
		public function process(){
			

			$title = "CSS3Designer";
			switch(LiteFrame::getActiveAction()){
				case "homepage":
					$title = "CSS3Gallery | CSS3designer";
					break;
			}
			$this->results = $title;
			
		}
		
	}


?>