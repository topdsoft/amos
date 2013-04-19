//<!--
	function rating(r,starId,inputId) {
		if(r==1 && $("#"+inputId).val()==1) {r=0;}
		$(".tdBox").find("#"+starId).each(function(i){
			if(i>=r) {$(this).fadeOut(500);}
			else {$(this).fadeIn(500);}
		})
		if(r==0) $("#"+inputId).val('');
		else $("#"+inputId).val(r);
	}
//-->
