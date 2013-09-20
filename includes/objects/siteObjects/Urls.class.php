<?php 

	class Urls extends SiteObject {
		
		public function __construct(){
			parent::__construct();
		}
		
		
		public function process(){
		
			
			$siteUrls = array();
			$siteUrls["homepage"] = LiteFrame::BuildActionUrl( "homepage" );
			$siteUrls["about"] = LiteFrame::BuildActionUrl( "about" );
			$siteUrls["contact"] = LiteFrame::BuildActionUrl( "contact" );
			$siteUrls["testimonials"] = LiteFrame::BuildActionUrl( "testimonials" );
			$siteUrls["services"] = LiteFrame::BuildActionUrl( "services" );
			$siteUrls["services_wedding"] = LiteFrame::BuildActionUrl( "services-wedding" );
			$siteUrls["services_birthday"] = LiteFrame::BuildActionUrl( "services-birthday" );
			$siteUrls["services_concert"] = LiteFrame::BuildActionUrl( "services-concert" );
			$siteUrls["services_corporate"] = LiteFrame::BuildActionUrl( "services-corporate" );
			$siteUrls["services_holiday"] = LiteFrame::BuildActionUrl( "services-holiday" );
			$siteUrls["services_cultural"] = LiteFrame::BuildActionUrl( "services-cultural" );
			$siteUrls["services_outdoor"] = LiteFrame::BuildActionUrl( "services-outdoor" );
			$siteUrls["services_livePerformance"] = LiteFrame::BuildActionUrl( "services-live-performance" );
			$siteUrls["services_DJs"] = LiteFrame::BuildActionUrl( "services-nominated-djs" );
			$siteUrls["services_screens"] = LiteFrame::BuildActionUrl( "services-screens" );
			$siteUrls["services_ledLightingControl"] = LiteFrame::BuildActionUrl( "services-led-lighting-control" );
			$siteUrls["services_ledMovingHead"] = LiteFrame::BuildActionUrl( "services-led-moving-head" );
			$siteUrls["services_ledPinSpot"] = LiteFrame::BuildActionUrl( "services-led-pin-spot" );
			$siteUrls["services_ledWashUplighting"] = LiteFrame::BuildActionUrl( "services-led-wash-uplighting" );
			$siteUrls["services_onlinePlanner"] = LiteFrame::BuildActionUrl( "services-online-planner" );
			$siteUrls["services_eventConsulting"] = LiteFrame::BuildActionUrl( "services-event-consulting" );
			$siteUrls["portfolio"] = LiteFrame::BuildActionUrl( "portfolio" );
			$siteUrls["events"] = LiteFrame::BuildActionUrl( "events" );
			
			$external = array();
			$external["mexoinc"] = "http://www.mexoinc.com";
			$external["curlybit"] = "http://www.curlybit.com";
			$external["facebook"] = "https://facebook.com/arshiakia";
			$external["twitter"] = "https://twitter.com/PerGenPro";
			$external["gmap"] = "http://maps.google.com/maps/ms?msa=0&msid=208909912969342858005.0004bc9095da5cc5744dc&ie=UTF8&t=m&z=19&vpsrc=1&iwloc=0004bc9095dc03300d254";
			
			$globalUrls = array();
			$globalUrls["tel_number"] = "1-855-2PERGEN";
			$globalUrls["fax_number"] = "1-866-830-0721";
			$globalUrls["address"] = "8206 Leesburg Pike, Suite 209, Vienna, VA 22182";
			$globalUrls["email"] = "info@pergenproductions.com";
			
			$this->results = array(
				"site" 		=> $siteUrls,
				"external"	=> $external,
				"globalUrl"	=> $globalUrls
			);
		}
		
		
		public static function getProfileUrl($userId){
			return LiteFrame::BuildActionUrl( "profile", array("user_id" => $userId));
		}
		
		public static function getUserReviewsUrl($userId){
			return LiteFrame::BuildActionUrl( "user-reviews", array("user_id" => $userId));
		}
		
		public static function getUserLikesUrl($userId){
			return LiteFrame::BuildActionUrl( "user-likes", array("user_id" => $userId));
		}
				
		public static function getUserOwnsUrl($userId){
			return LiteFrame::BuildActionUrl( "user-owns", array("user_id" => $userId));
		}
						
		public static function getUserWishesUrl($userId){
			return LiteFrame::BuildActionUrl( "user-wishes", array("user_id" => $userId));
		}
		
		public static function getProductUrl($productId){
			return LiteFrame::BuildActionUrl( "product", array("product_id" => $productId));
		}
		
		public static function getProductReviewsUrl($productId){
			return LiteFrame::BuildActionUrl( "product-reviews", array("product_id" => $productId));
		}
		
		public static function getUserFollowingsUrl($productId){
			return LiteFrame::BuildActionUrl( "followings", array("user_id" => $productId));
		}
		
		public static function getUserFollowersUrl($productId){
			return LiteFrame::BuildActionUrl( "followers", array("user_id" => $productId));
		}
		
	}
?>