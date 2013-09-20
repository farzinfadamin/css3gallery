$(document).ready(function(){
	
	var $SearchBox = $("#search-box");
	
	function SearchBoxClick(){
		if (!$SearchBox.data('box-open')){
			$SearchBox.data('box-open', true).addClass('extend').find('input').focus()
			return false;
		}else{
			return $SearchBox.find('input').val() ? true : false;
		}
	}

	$SearchBox.bind('submit click', SearchBoxClick);
	
	$SearchBox.find('input').bind('blur', function(){
		$SearchBox.data('box-open', false).removeClass('extend')
	});
	
	
	
	// Tags
	$.each($('.has-more-btn'), function(){
		var $ul =$(this).data('i', 15);
		$ul.data('li-size', $ul.find("li:not('.more-btn')").size())
			.find('li:lt('+$ul.data('i')+')')
			.show();
	});
	$('.more-btn').click(function(){
		var $ul = $(this).parent('ul');
		$ul.data('i', (
			$ul.data('i')+15 <= $ul.data('li-size') 
				? $ul.data('i')+15
				: $ul.data('li-size'))
		);
		$ul.find('li:lt('+$ul.data('i')+')').show();
		if ($ul.data('i')==$ul.data('li-size')) $(this).hide();
	});
	
});