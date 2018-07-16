<div class="heading"  style="text-align: center;font-size: 30px;">
			<span >View Models</span>
			</div>
<div style="margin-bottom:20px;">
<a class="btn btn-primary pull-right" href="<?php echo site_url('carmodel/create'); ?>">Create</a>
</div>
<div>
<?php 
// print_r($results);
?>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>MANUFACTURER</th>
            <th>MODEL</th>
            <th>ACTIONS</th>
        </tr>
        <?php
            foreach($results as $result){
                
        ?>
        <tr>
            <td><?php echo $result->id; ?> </td>
            <td><?php echo $result->manufacturerName; ?> </td>
            <td><?php echo $result->name; ?> </td>
            <td>
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="javascript:load_carmodel(<?php echo $result->id; ?>)">View</a>
            <a class="btn btn-primary" href="<?php echo site_url('carmodel/edit?id=').$result->id; ?>">Edit</a>
            <a class="btn btn-danger" href="javascript:void(0);" onclick="deletecarmodel(<?php echo $result->id;?>);">Delete</a>
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</div>
<script type="text/javascript">

    var urlfordelete="<?php echo base_url();?>";

    function deletecarmodel(id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = urlfordelete+"index.php/carmodel/deletecarmodel?id="+id;
        else
          return false;
        } 
//$(".modal-dialog").hide();
function load_carmodel(id)
{
    console.log(id);
    $.ajax({
                type: "GET",
                url: "<?php echo site_url('carmodel/getsingle');?>",
                data: "id="+id,
				processData: false,
				async: false,
				contentType: false,
                success: function (response) {
                    console.log("response",response);
                $(".displaycontent").html(response);
                  
                }
            });
}
</script>

<div class="modal fade displaycontent" id="myModal">

<?php include('modal.php'); ?>
