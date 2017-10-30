<!-- DataTables CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<style>
    .table>thead>tr>th{vertical-align: baseline;}
</style>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <form method="post" action="<?= base_url('admin/users/')?>" id="pagesizeform">
                <div class="col-sm-6">
                    <label>
                        <select name="pagesize" class="form-control input-sm" id="pagesize">
                            <option value="10" <?php if($pagesize == '10'){ echo "selected"; }?>>10</option>
                            <option value="25" <?php if($pagesize == '25'){ echo "selected"; }?>>25</option>
                            <option value="50" <?php if($pagesize == '50'){ echo "selected"; }?>>50</option>
                            <option value="100" <?php if($pagesize == '100'){ echo "selected"; }?>>100</option>
                        </select>
                    </label>
                </div>

                    <div class="col-sm-2">
                        <select name="userStatus" class="form-control input-sm" data-href="<?= base_url() ?>admin_ajax/users" id="usersStatus">
                            <option value="0">Active Users</option>
                            <option value="1">Block Users</option>
                        </select>
                    </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <label><input type="search" name="searchKey" id="searchKey" class="form-control input-sm" placeholder="Search" value="<?= $searchKey ?>"></label>
                        <button class="btn btn-primary btn-sm searchBtn">Search</button>
                    </div>
                </div>
                </form>
            </div>
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                   <div class="table-responsive">
                    <table width="100%" class="table table-responsive table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Profile</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Earned Points</th>
                            <th>Favourite/Wish List</th>
                            <th>Block/Active</th>
                        </tr>
                        </thead>
                        <tbody id="users">
                        <?php if(!empty($users)): foreach($users as $data): ?>

                                <tr class="odd gradeX">
                                    <td><img src="<?= base_url()."uploads/users/thumb/".$data['profilePic'] ?>" class="img-circle" height="50" width="50" /></td>
                                    <td><?= $data['name'] ?> </td>
                                    <td><?= $data['email'] ?> </td>
                                    <td><?= $data['role'] ?> </td>
                                    <td><?= ($data['points'] != "")?$data['points']:"0" ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>admin/users/favouriteList/<?= $data['id'] ?>?is_fav=1">Favourite List</a><br>
                                        <a href="<?= base_url(); ?>admin/users/favouriteList/<?= $data['id'] ?>?is_fav=0">Wish List</a>
                                    </td>
                                    <td>
                                        <?php if($data['delStatus'] == "0") { ?>
                                            <a title="Block User" onclick="return confirm('Are you sure you want to block this user?')" href="<?= base_url() ?>admin/users/blockUser/<?= $data['id']?>?status=1"><i style="color: green" class="fa fa-check-circle-o fa-1x"></i></a>
                                        <?php } else { ?>
                                            <a title="Active User" onclick="return confirm('Are you sure you want to active this user?')" href="<?= base_url() ?>admin/users/blockUser/<?= $data['id']?>?status=0"><i style="color: darkred" class="fa fa-ban fa-1x"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>

                        <?php endforeach; else: ?>
                                <tr><td colspan="7" class="text-center"><b>User(s) not available.</b></td></tr>
                        <?php endif; ?>
                        <tr class="odd gradeX">
                            <td colspan="7">
                                <?php echo $this->ajax_pagination->create_links(); ?>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                   </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>


<script src="<?= base_url()?>theme/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
            searching: false,
            bLengthChange: false,
            bPaginate: false,
            bInfo : false
        });
    });
    $(document).ready(function(){
        $("#pagesize").change(function(){
            //$('#pagesizeform').submit();
            getData(0);
            return false;
        });

        $(".searchBtn").click(function(){
            //$('#pagesizeform').submit();
            getData(0);
            return false;
        });

        $('#usersStatus').change(function () {
            var usersStatus = $(this).val();
            var searchKey = $('#searchKey').val();
            var pagesize = $('#pagesize').val();
            var action = $(this).attr('data-href');

            $.ajax({
                url: action,
                type: 'POST',
                data: {
                    usersStatus : usersStatus,
                    pagesize : pagesize,
                    searchKey : searchKey
                },
                success: function(response) {
                    $('#users').html(response);
                },
            });
        });
    });
</script>