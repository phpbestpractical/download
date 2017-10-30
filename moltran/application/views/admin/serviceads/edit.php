
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Service</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <?php echo form_open('admin/service/edit/' . $service['id'], array('class' => 'ajax-form validateForm', 'enctype' => "multipart/form-data", 'id' => 'editservice')); ?>

    <div class="col-md-6">

        <div class="form-group">
            <label class="control-label">Service Name</label>
            <input type="text" class="form-control" name="name" value="<?= (isset($service['serviceType']) ? $service['serviceType'] : "") ?>" placeholder="Service Name" >
        </div>
        <div class="button-group">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </div>


    <?php echo form_close(); ?>
</div>


<script>
    

</script>
