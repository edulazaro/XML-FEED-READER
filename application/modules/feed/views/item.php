
<div class="container-fluid" >
	<div class="row">
		<div class="col-md-12">
			<span><?php if ($PUBDATE!=''){ echo($PUBDATE."&nbsp;&nbsp;|&nbsp;&nbsp;"); }?></span> <?php echo($FEEDNAME); ?>
		</div>		
	</div>  
	<div class="row">
		<div class="col-md-8" style="margin-top:20px;">
			<span style="font-size:14px; font-weight:bold"><?php echo($TITLE); ?></span>
		</div>		
	</div>  	
	<div class="row">
		<div class="col-md-6" style="margin-top:20px;">
			<span style="font-size:14px; font-weight:bold"><?php echo($MEDIA_THUMBNAIL1); ?></span>
		</div>		
	</div> 	
	<div class="row">
		<div class="col-md-6" style="margin-top:20px;">
			<span style="font-size:14px; font-weight:bold"><?php echo($DESCRIPTION); ?></span>
		</div>		
	</div> 		
	<div class="row" style="margin-top:90px;">
		<div class="col-md-4" style="text-align:center;">
			<?php 
			if($ORDER>0){
				$previous=$ORDER-1;
			}
			else{
				$previous=$numrows-1;;
			}
			?>
			<a  href="#" onClick="loadItemOther('<?php echo($FEEDID); ?>','<?php echo($previous); ?>')">PREVIOUS</a>
		</div>		
		<div class="col-md-4" >
			<a  href="<?php echo($LINK); ?>" >View Entire Feed</a>
		</div>	
		<div class="col-md-4" style="text-align:center;">
			<?php 
			if($ORDER<($numrows-1)){
				$next=$ORDER+1;
			}
			else{
				$next=0;
			}
			?>
			<a  href="#" onClick="loadItemOther('<?php echo($FEEDID); ?>','<?php echo($next); ?>')">NEXT</a>
		</div>			
	</div> 			
				
</div>	

