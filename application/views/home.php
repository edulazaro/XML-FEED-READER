
<div id="overlay" class="overlay-div" >
	<div class="close_button" onclick="overlayclose();" style="position:absolute; margin-top:10px; right:10px;"> </div>
	<div id="overlay-inside" style="position:arelative; padding:40px; ">


	</div>
	
</div>

<div class="container-fluid" >
	<div class="row">
	  <div class="col-md-12">
		<div style="position:relative; margin:0px auto; width:100%; text-align:center; padding-top:30px;   ">
			<h1>XML FEED READER</h1><span>HMVC example, reads XML feeds, lists items in the page calling a module (HMVC archuitecture with PHP), and loads content in a overlay layer through AJAX when items are clicked.<br/> Content is saved in both a JSON file and a database for caching.</span>
		</div>	  
	  </div>  
	</div>	
	<div class="row" style="margin-top:60px; padding-bottom:100px;">		
	    <div  class="col-md-1"> 
		</div>	
		<div    class="col-md-10" >
			<div id="right-div"> 
				<?php
				// Write here the external feeds for testing
				echo Modules::run( 'feed/feed/listTitles', "http://api.flickr.com/services/feeds/photos_public.gne?tags=computers&format=rss_200"); 
				echo Modules::run( 'feed/feed/listTitles', "http://www.jarcors.com/feed"); 
				echo Modules::run( 'feed/feed/listTitles', "http://blogs.valvesoftware.com/feed"); 
				?>
			</div>	 
		</div>	
		<div class="col-md-1"> 
		</div>	  
	</div>
</div>	


