
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					
					<ol class="pull-left breadcrumb">
						<li><a href="#">Front Link</a></li>                                   
						<li class="active">Service Ads Details</li>
					</ol>
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading"><h3 class="panel-title">Service Ads Details</h3></div>
						<div class="panel-body">
							<div class="form">
								<form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url('admin/serviceads/add');?>" novalidate="novalidate">
									<div class="form-group">
										<label for="cname" class="control-label col-lg-2">Account</label>
										<div class="col-lg-4">
											<?php echo form_dropdown('AccountID',$accountdata,'','class="select2 form-control" id="accountid"');?>
										</div>
									
										<label for="ccomment" class="control-label col-lg-2">Ads Type</label>
										<div class="col-lg-4">
											<?php echo form_dropdown('AdsID',$adsdata,'','class="select2 form-control" id="adsid" onchange="return getData();"');?>
											</div>
									</div>
								
									<div class="form-group">
										
										<label for="cname" class="control-label col-lg-2">Device Type</label>
										<div class="col-lg-4">
										
										<select class="select2 form-control devicetype" id="devicetype" name="devicetype" onchange="return getData();">
										
										<option value="1">Android</option>
										<option value="2">iOS</option>
										</select>
										</div>
										<label for="cname" class="control-label col-lg-2">App Type</label>
										<div class="col-lg-4">
											
											<select class="select2 form-control aptype" id="aptype" name="apptype" onchange="return getData();">									
											<option value="1">Game</option>
											<option value="2">Other</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="ccomment" class="control-label col-lg-2">Service</label>
										<div class="col-lg-4" id="servicedrp">
											<?php echo form_dropdown('serviceId',$servicearr,'','class="form-control" id="serviceid"');?>
										</div>
										<label for="cname" class="control-label col-lg-2"></label>
										<div class="col-lg-4">
											<button class="btn btn-success waves-effect waves-light" type="submit">Add</button>
											
										</div>
									</div>
									
								</form>
							</div> <!-- .form -->
						</div> <!-- panel-body -->
					</div> <!-- panel -->
				</div> <!-- col -->

			</div> <!-- End row -->
			<div class="row">
				<div class="col-md-12">
				   
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Service List</h3>		
				</div>
				<div class="panel-body"  id="em" style="display:none;">
					
					<table id="datatable-buttons" class="table table-striped table-bordered employee-grid">
						<thead>
							<tr>
								<th>Service</th>
								<th>Ads Type</th>
								<th>Device Type</th>
								<th>App Type</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="dummydata">
							
						</tbody>
					</table>
				</div>	
				<div class="panel-body"  id="em1" style="display:none;">	
					<table id="SecondDataTableID" class="table table-striped table-bordered employee-grid">
						<thead>
							<tr>
								<th>Service</th>
								<th>Ads Type</th>
								<th>Device Type</th>
								<th>App Type</th>
								<th>Order By</th>
								<th>Seconds</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="dummydata1">
							
						</tbody>
					</table>
				</div>
				<div class="panel-body"  id="em2" style="display:none;">		
					<table id="ThirdDataTableID" class="table table-striped table-bordered employee-grid">
						<thead>
							<tr>
								<th>Service</th>
								<th>Ads Type</th>
								<th>Device Type</th>
								<th>App Type</th>
								<th>Order By</th>
								
								<th>Delete</th>
							</tr>
						</thead>
						<tbody id="dummydata2">
							
						</tbody>
					</table>
				</div>
				<!-- end: page -->

			</div> <!-- end Panel -->
			</div>
			</div>
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
			<script type="text/javascript">
			$(document).ready(function(){
				
				
				$('#accountid').change(function(){
					
					var accountid = $('#accountid option:selected').val();
					
					$.ajax({
							type: "POST",
							url: "<?php echo base_url("admin/serviceads/getService") ?>", //here we are calling our user controller and get_cities method with the country_id
							data:{accountid : accountid},							
							success: function(result) //we're calling the response json array 'states'
							{								
								
								$('#servicedrp').html(result);
								
							}
					});			
				});
			});
			function getData(){
				
					var accountid = $('#accountid option:selected').val();					
					var adsid = $('#adsid').val();
					var devicetype = $('#devicetype').val();
					var aptype = $('#aptype').val();
					var serviceId = $('#serviceid').val();
					
					$.ajax({
							type: "POST",
							url: "<?php echo base_url("admin/serviceads/service") ?>", //here we are calling our user controller and get_cities method with the country_id
							data:{accountid : accountid,adsid:adsid,devicetype : devicetype,aptype : aptype,serviceId:serviceId},							
							success: function(result) //we're calling the response json array 'states'
							{
								alert(result);
								if(adsid == '1')
								{									
									$('#dummydata').html(result);
									$('#em').show();
									$('#em2').hide();
									$('#em1').hide();
									
									
								}
								if(adsid == '2')
								{
									
									//$('#employee-grid').show();
									$('#em1').show();
									$('#dummydata1').html(result);									
									$('#em').hide();
									$('#em2').hide();
																		
								}
								if(adsid == '3')
								{
									
									//$('#employee-grid').show();
									$('#dummydata2').html(result);
									$('#em2').show();
									$('#em1').hide();
									$('#em').hide();
									
								}
								
								
							}

					});
			}			
			</script>
			<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Order and Second</h4>
      </div>
      <div class="modal-body">
			<form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url('admin/serviceads/add');?>" novalidate="novalidate">
				<div class="form-group">
					<label for="cname" class="control-label col-lg-2">Order By</label>
					<div class="col-lg-6">						
						<input class="form-control" id="order" name="order" placeholder="Order" type="text">
					</div>
				</div>
			
				<div class="form-group">
					
					
					<label for="cname" class="control-label col-lg-2">Seconds</label>
					<div class="col-lg-6">
						
						<input class="form-control" id="second" name="second" placeholder="Seconds" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="cname" class="control-label col-lg-2"></label>
					
					<div class="col-lg-4">
						<button class="btn btn-success waves-effect waves-light" type="submit">Add</button>
						
					</div>
				</div>
				
			</form>
      </div>
      
    </div>

  </div>
</div>