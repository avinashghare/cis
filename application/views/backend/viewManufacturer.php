<div style="margin-bottom:20px;">
<a class="btn btn-primary pull-right" href="<?php echo site_url('manufacturer/create'); ?>">Create</a>
</div>
<div>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>ACTIONS</th>
        </tr>
        <?php
            foreach($results as $result){
                
        ?>
        <tr>
            <td><?php echo $result->id; ?> </td>
            <td><?php echo $result->name; ?> </td>
            <td>
            <a class="btn btn-primary" href="<?php echo site_url('manufacturer/editManufacturer?id=').$result->id; ?>">Edit</a>
            <a class="btn btn-danger" href="javascript:void(0);" onclick="deletemanufacturer(<?php echo $result->id;?>);">Delete</a>
            
            </td>
        </tr>
        <?php
            }
            ?>
    </table>
</div>
<script type="text/javascript">

    var urlfordelete="<?php echo base_url();?>";

    function deletemanufacturer (id){
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = urlfordelete+"index.php/manufacturer/deletemanufacturer?id="+id;
        else
          return false;
        }
</script>