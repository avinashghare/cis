<!-- <div class="modal fade" tabindex="-1" id="myModal" role="dialog"> -->
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="modal-title"style="text-align:center;">Car Datails of
				<?php echo $carmodel->name;?> </h4>
		</div>
		<div class="modal-body">
			<table class="table table-striped">
				<tbody>
					<div class="container col-sm-6 col-sm-offset-3" >
						<div class="row">
							<span>Name : </span>
							<span>
								<b>
									<?php echo $carmodel->name;?>
								</b>
							</span>
						</div>

						<div class="row">
							<span>Manufacturer : </span>
							<span>
								<b>
									<?php echo $carmodel->manufacturer;?>
								</b>
							</span>
						</div>

						<div class="row">
							<span>Color : </span>
							<span>
								<b>
									<?php echo $carmodel->color;?>
								</b>
							</span>
						</div>

						<div class="row">
							<span>Year : </span>
							<span>
								<b>
									<?php echo $carmodel->year;?>
								</b>
							</span>
						</div>

						<div class="row">
							<span>Registration Numbar : </span>
							<span>
								<b>
									<?php echo $carmodel->regnum;?>
								</b>
							</span>
						</div>

						<div class="row">
							<span>Note : </span>
							<span>
								<b>
									<?php echo $carmodel->note;?>
								</b>
							</span>
						</div>
                        <br>
						<div class="row">
							<span>Image 1 : </span>
							<span class="img-center big">
								<?php if($carmodel->image1 == "") { 
                                    echo "Image 1 Not Found";
                                } else {
									                    ?>
								<img width="200px" height="100" src="<?php echo base_url('uploads')."/".$carmodel->image1; ?>" alt="Image 1">
								<?php } ?>
							</span>
						</div>
                        <br>
                        <br>
						<div class="row">
							<span>Image 2 : </span>
							<span class="img-center big">
								<?php if($carmodel->image2 == "") { 
                                    echo "Image 2 Not Found";
                                } else {
									                    ?>
								<img width="200px" height="100" src="<?php echo base_url('uploads')."/".$carmodel->image2; ?>" alt="Image 2">
								<?php } ?>
							</span>
						</div><br>
                        <div class="row">
                            <a class="btn btn-primary" href="<?php echo site_url('carmodel/soldcarmodel?id=').$carmodel->id; ?>">Sold</a>
                        </div>
					</div>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
