<!-- DataTables CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?= base_url()?>theme/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
<style>
    .table>thead>tr>th{vertical-align: baseline;}
</style>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payment Histories</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <form method="post" action="<?= base_url('admin/users/paymentHistories')?>" id="pagesizeform">
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

<!--                    <div class="col-sm-2">
                        <select name="userStatus" class="form-control input-sm" data-href="<?= base_url() ?>admin_ajax/users" id="usersStatus">
                            <option value="0">Active Users</option>
                            <option value="1">Block Users</option>
                        </select>
                    </div>-->
                <div class="col-sm-6">
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
                            <th>#Transaction ID</th>
                            <th>Transaction On</th>
                            <th>User</th>
                            <th>Business</th>
                            <th>Total</th>
                            <th>Admin Fee</th>
                            <th>Earnings</th>
                        </tr>
                        </thead>
                        <tbody id="payments">
                        <?php 
                        $totalEarnings = '0';
                        if(!empty($paymentHistories) && $paymentHistories[0]['id'] != ""): foreach($paymentHistories as $data): ?>
                                 <?php $totalEarnings = $totalEarnings + $data['business_amount'] ?>
                                <tr class="odd gradeX">
                                    <td><?= $data['charge_id'] ?></td>
                                    <td><?= $data['created_at'] ?></td>
                                    <td><?= $data['user'] ?> </td>
                                    <td><?= $data['business'] ?> </td>
                                    <td>£<?= number_format($data['amount'],2) ?> </td>
                                    <td>£<?= number_format(($data['admin_amount'] + $data['stripe_amount']),2) ?> </td>
                                    <td>£<?= number_format($data['business_amount'],2) ?> </td>
                                </tr>

                        <?php endforeach; else: ?>
                                <tr><td colspan="7" class="text-center"><b>Payment histories not available.</b></td></tr>
                        <?php endif; ?>
                                <tr>
                                    <td colspan="6"><p class="text-right"><b>Total Earnings:</b></p></td>
                                    <td><b>£<?= number_format($totalEarnings,2) ?></b></td>
                                </tr>        
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