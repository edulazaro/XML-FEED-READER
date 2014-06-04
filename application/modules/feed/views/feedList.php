
<div class="container-fluid" >
	<div class="row">
		<div class="col-md-12">

			<div class="panel-group" id="accordion"  style="padding-top:20px;">
			  <div class="panel panel-default">
				<div class="panel-heading">

				
					<div class="panel-title right-div-title"  style="position:relative; margin:0px auto; width:100%; text-align:center;  ">
					  <h2 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo($id); ?>">
							<?php echo($title); ?>
						</a>
					  </h2>
					</div>	 
				</div>
				<div id="collapse<?php echo($id); ?>" class="panel-collapse collapse">
				  <div class="panel-body">		
					<div style="position:relative; margin:0px auto; width:100%; text-align:left; padding-bottom:20px;   ">

						<?php 
				
						
						
						
						$fin = count($items);
						for($i = 0; $i < $fin; $i++)

						{


							?>				
							<div class="right-div-link" style="position:relative; margin:0px auto; width:100%; text-align:left;  ">
							
							
					
							
							
							<a  href="#" onClick="loadItem('<?php echo($items[$i]['parent']); ?>','<?php echo($items[$i]['orden']); ?>')"><?php echo($items[$i]['title']); ?></a>
						

							</div>
							<?php
				
						} 
					?>
					</div>	  		
					
					</div>
				  </div>
				</div>
			  </div>
			  
			  
		</div>		
	</div>  
</div>	

