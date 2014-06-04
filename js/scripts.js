
		function loadItem(parent, order) {

			$("#overlay").css({zIndex:99}).fadeIn(800, function(){
				var url="/feed/viewItem/"+parent+"/"+order;
				$("#overlay-inside").load(url, function(){ })		
			})
		} 	
		
		
		function loadItemOther(parent, order) {
			var url="/feed/viewItem/"+parent+"/"+order;
			$("#overlay-inside").load(url, function(){ })		
		} 

		
		
		function overlayclose(){
			$("#overlay").hide(200)
		}
		

		


					
				
		
