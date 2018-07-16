<?php header('Access-Control-Allow-Origin: *'); ?>
<div class="row">
	<div class="col-mg-12">
		<section class="panel">
			<!-- <header class="panel-heading">
				<span style="text-align: center;">Create Car Model</span>
			</header> -->
			<div class="heading"  style="text-align: center;font-size: 30px;">
			<span >Create Car Model</span>
			</div>
			<!-- <div class="col-sm-9 col-sm-offset-3"> -->
			<div class="panel-body" align:"center">
				<form class="form-horizontal" enctype="multipart/form-data" id="submit">

					<div class="form-group">
						<label class="col-md-2 control-label">Name</label>
						<div class="col-md-4">
							<input type="text" id="name" class="form-control" name="name" required>
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Manufacturer</label>
						<div class="col-md-4">
							<?php echo form_dropdown("manufacturer",$manufacturer,set_value('manufacturer'),'class="form-control selectpicker"');?>
						</div>

					</div>


					<div class="form-group">
						<label class="col-md-2 control-label">Color</label>
						<div class="col-md-4">
							<input type="text" id="color" class="form-control" name="color" required>
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Year</label>
						<div class="col-md-4">
							<input type="number" id="year" class="form-control" name="year" required>
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Registration Number</label>
						<div class="col-md-4">
							<input type="text" id="regnum" class="form-control" name="regnum" required>
						</div>

					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Note</label>
						<div class="col-md-4">
							<textarea name="note" class="materialize-textarea" length="400">
								<?php echo set_value( 'note');?>
							</textarea>
						</div>

					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Image 1</label>
						<div class="col-md-4">
							<input name="image1" type="file" required>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Image 2</label>
						<div class="col-md-4">
							<input name="image2" type="file" required>
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
			<!-- </div> -->
		</section>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {

		$('#submit').submit(function (e) {
			// var dataToSend = new FormData(this);
			// console.log("inside ", dataToSend);
			var form = $(this);
			// console.log("inside submit script", form.serialize());
			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo site_url('carmodel/createcarmodel');?>",
				data: new FormData(this),
				processData: false,
				async: false,
				contentType: false,
				success: function (returnData) {
					console.log("Data in script", returnData);
					if (returnData > 0) {
						window.location.href = "<?php echo site_url('carmodel/index'); ?>";
					} else {
						alert("Data Not Saved!");
					}
				},
				error: function () {
					alert("Error posting feed.");
				}
			});

		});
	});

</script>
