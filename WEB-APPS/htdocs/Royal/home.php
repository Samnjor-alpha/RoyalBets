
<div class="container">
	<?php include'sidebar.php';?>

		<div class="col-xs-12 col-sm-9">
			<!--<div class="jumbotron">-->
				<div class="">
					<div class="panel panel-default text-danger">
				<div style="background-color:#000000"
							<div class="panel-body">	
								<div class="col-xs-12 col-sm-12">

									<fieldset>
										
									
										
									
                                        <legend><h2 class="text-left text-danger">Company mission</h2></legend>
											<p>Provide our guests a unique experience, through which they connect with the best in our company, 
												and to offer top quality service to our entire guest and provided comfort abundance.</p>
									</fieldset>	
									<fieldset>
										<legend><h2 class="text-left text-danger ">Company Vision </h2></legend>
											<p>royal guest house is to provide best quality of services applying top quality 
												guest house and conference facilities, in order to fulfill the best way in the relevant needs of every guest.</p>
									</fieldset>
									<fieldset>
										<legend><h2 class="text-left text-danger ">About</h2></legend>
										
									On the year 2018, Christian and Family have started a business. It was royal Guest House, located # Adjacent to Machakos County Assembly, Kenya. It was well renovated with 14 air conditioned rooms, Hot and Cold Shower, Cable Television and WIFI area.
									</fieldset>
									<br/><br/><br/><br/>
									<fieldset>
										<legend><h2 class="text-left text-danger ">Featured Rooms</h2></legend>
										<?php 

										$mydb->setQuery("SELECT *,typeName FROM room ro, roomtype rt WHERE ro.typeID = rt.typeID");
								  		$cur = $mydb->loadResultList();

											foreach($cur as $room){
												$image = WEB_ROOT . 'admin/mod_room/'.$room->roomImage;
												echo '<div style=" float:left;  margin:7px;">';		
												echo '<a href="'.$image.'" rel="prettyPhoto[mwaura]"><img src="'.$image.'" width="100px" height="120px" 
												style="-webkit-border-radius:5px; -moz-border-radius:5px;"  title="'.$room->roomName.'" alt="'.$room->roomName.'" >
												<br>'.$room->roomName.'<br>'.$room->typeName.'</a>';
												echo'</div>';
												
											}


										?>

									</fieldset>


								</div>
							</div>
						</div>	

				</div>
		<!--	</div>-->
		</div>
		<!--/span--> 
		<!--Sidebar-->

	</div>
