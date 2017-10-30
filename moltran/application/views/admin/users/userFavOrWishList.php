    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?= $user['name'] ?>'s <?php echo ($is_fav == "1")?"Favourite":"Wish"?> List</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            
          <div class="panel-body">
                    <div class="table-responsive">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Business Name</th>
                            <th>Description</th>
                            <th>Open Time</th>
                            <th>Owner Name</th>
                            <th>Phone</th>
                            <th>Site</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody id="business">
                        <?php if(!empty($business)): foreach($business as $data): ?>

                            <tr class="odd gradeX">
                                <td><?= $data['name'] ?></td>
                                <td><?= substr($data['description'],0,100).'[...]' ?> </td>
                                <td><?= date('h:iA',strtotime($data['start_time'])) ?> To <?= date('h:iA',strtotime($data['end_time'])) ?></td>
                                <td><a href="<?= base_url()?>admin/users/userProfile/<?= $data['userID'] ?>"><?= $data['OwnerName'] ?> </a></td>
                                <td><?= $data['phone'] ?></td>
                                <td><a href="<?= $data['site_url'] ?>" target="_blank"><?= $data['site_url'] ?></a></td>
                                <td>
                                    <a href="<?= base_url() ?>admin/business/getUserImages/<?= $data['id'] ?>" title="UserImages"><i class="fa fa-image"></i></a>
                                </td>
                            </tr>

                        <?php endforeach; else: ?>
                            <tr><td colspan="7">No any business added in <?php echo ($is_fav == "1")?"favourite":"wish"?> list .</td></tr>
                        <?php endif; ?>
                        <tr class="odd gradeX">
                            <td colspan="8">
                                <?php echo $this->ajax_pagination->create_links(); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            
        </div>
    </div>    

