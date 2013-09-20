<?php 

	class Meta extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
			
			$desc = "";
			switch(LiteFrame::getActiveAction()){	
				case "homepage":
					$title = "";
					break;
			}
			$this->results = array("desc" => $desc );
		}
		
	}


?>