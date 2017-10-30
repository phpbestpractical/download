
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Change Password</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form role="form" method="post" enctype="multipart/form-data" class="validateForm" action="<?= base_url() ?>admin/users/changePassword">
                <fieldset>
                    <?php if ($this->session->flashdata("flash_message_error") != "") { ?>
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Error!</strong><?= $this->session->flashdata("flash_message_error") ?>
                        </div>
                    <?php } ?>

                    
                    <div class="form-group">
                        <label class="control-label">New Password</label>
                        <input class="form-control" id="password" placeholder="New Password" name="password" type="password" autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Confirm Password</label>
                        <input class="form-control" placeholder="Confirm Password" name="password_confirm" type="password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                    </div>
                </fieldset>
            </form>
        </div>    
    </div>      