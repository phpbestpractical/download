

	<!-- Page-Title -->
	<div class="row">
		<div class="col-sm-12">

		<ol class="breadcrumb pull-left">
		<li><a href="#">Front Link</a></li>                                    
		<li class="active">Service</li>
		</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title">ADD SERVICE</h3></div>
					<div class="panel-body">
						<div class="form">
						<form class="form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url('admin/service/add');?>" novalidate="novalidate" enctype="multipart/form-data">
							<div class="form-group">
								<label for="cname" class="control-label col-lg-2">Service Name</label>
								<div class="col-lg-4">
								<input class="form-control" id="name" name="name" placeholder="Name" type="text" required="" aria-required="true">
								</div>
								<label for="cname" class="control-label col-lg-2">Device Type</label>
								<div class="col-lg-4">
								
								<select class="select2 form-control" data-placeholder="Choose a DeviceType..." name="devicetype">
								
								<option value="1">Android</option>
								<option value="2">iOS</option>
								</select>
								</div>
							</div>
							<div class="form-group">
								<label for="cname" class="control-label col-lg-2">App Type</label>
								<div class="col-lg-4">
									
									<select class="select2 form-control" data-placeholder="Choose a AppType..." name="apptype">									
									<option value="1">Game</option>
									<option value="2">Other</option>
									</select>
								</div>
								<label for="cname" class="control-label col-lg-2">Package Name</label>
								<div class="col-lg-4">
								<input class="form-control" id="packagename" name="packagename" placeholder="Package Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="cname" class="control-label col-lg-2">Message Text</label>
								<div class="col-lg-4">
								<textarea class="form-control" id="ccomment" placeholder="Description" name="comment"></textarea>
								</div>
								<label for="cname" class="control-label col-lg-2">Logo Image</label>
								<div class="col-lg-4">
								<input type="file" id="logoimg" name="logoimg">
								</div>
							</div>
							<div class="form-group">
								<label for="cname" class="control-label col-lg-2">Banner Image</label>
								<div class="col-lg-4">
								<input type="file" id="bannerimg" name="bannerimg">
								</div>
								<label for="cname" class="control-label col-lg-2">Banner Ad Image</label>
								<div class="col-lg-4">
								<input type="file"  id="banneradimg" name="banneradimg">
								</div>
							</div>
							<div class="form-group">
								<label for="cname" class="control-label col-lg-2">Full Ad Image</label>
								<div class="col-lg-4">
								<input type="file" id="fulladimg" name="fulladimg">
								</div>
								<label for="cname" class="control-label col-lg-2">Play Store Image URL</label>
								<div class="col-lg-4">
								<input class="form-control" id="url" name="url" placeholder="Play Store Image URL" type="text">
								</div>
							</div>
							<div class="form-group">
								<label for="cname" class="control-label col-lg-2">Native Account</label>
								<div class="col-lg-4">
								
								<?php echo form_dropdown('AccountId',$accountDrp,'','class="select2 form-control" id="accountid" placeholder="Please Select Account"');?>
								</div>
								<label for="cname" class="control-label col-lg-2"> Used Account</label>
								<div class="col-lg-4">
								
								<?php echo form_multiselect('AccountID[]',$accountDrp,'','class="select2 form-control" id="accountid" placeholder="Please Select Account"');?>
								</div>
								
							</div>
							<div class="form-group">
								<label for="cname" class="control-label col-lg-2">Category ID</label>
								<div class="col-lg-4">
								<?php echo form_multiselect('CategoryId[]',$categoryDrp,'','class="select2 form-control" id="categoryid" placeholder="Please Select category"');?>
								</div>
	
								<label for="ccomment" class="control-label col-lg-2">Is Active</label>
								<div class="col-lg-4">
								<div class="checkbox checkbox-primary">
								<input type="checkbox" id="checkbox1" name="active">
								<label for="checkbox1">

								</label>
								</div>

								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
								<button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
								<a class="btn btn-purple waves-effect" href="<?php echo base_url('admin/service');?>">Cancel</a>
								</div>
							</div>
						</form>
						</div> <!-- .form -->
					</div> <!-- panel-body -->
			</div> <!-- panel -->
		</div> <!-- col -->
	</div> <!-- End row -->


<!-- Form-validation -->
						
						
		

