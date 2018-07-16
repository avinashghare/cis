<div class="row">
	<div class="col-mg-12">
	    <section class="panel">
		    <header class="panel-heading">
				Edit Manufacturer 
			</header>
			<div class="panel-body">
			    <form class="form-horizontal" enctype="multipart/form-data" id="submit">
				   
					<div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-4">
                          <input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo $before->id;?>">
						  <input type="text" id="normal-field" class="form-control" name="name" value="<?php echo $before->name;?>" required>
						</div>
						
                    </div>

					<div class="form-group">
						<label class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-4">	
						<button type="submit" class="btn btn-primary" id="sub">Submit</button>
						</div>
					</div>
                </form>
				</form>
			</div>
		</section>
    </div>
</div>
<script  type="text/javascript">
	$(document).ready(function() {

		$('#submit').submit(function(e) {
		var form = $(this);
		console.log("inside ",form.serialize());
		e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('manufacturer/editManufacturerSubmit');?>",
				data: form.serialize(),
    			processData: false,
				dataType: "html",
				success: function(returnData){
					console.log("Data",returnData);
					if(returnData>0){
                        // alert("Data Saved!");
						window.location.href = "<?php echo site_url('manufacturer/index'); ?>";
					}else{
						alert("Data Not Saved!");
                    window.location.href = "<?php echo site_url('manufacturer/editManufacturer?id=').$before->id; ?>";
					}
				},
				error: function() { 
                    alert("Error posting feed."); 
                    window.location.href = "<?php echo site_url('manufacturer/editManufacturer?id=').$before->id; ?>";
                    }
			});

		});
	});
</script>