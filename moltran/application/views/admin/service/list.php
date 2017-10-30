

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					
					<ol class="pull-left breadcrumb">
						<li><a href="#">Front Link</a></li>                                   
						<li class="active">Service</li>
					</ol>
					<a id="addToTable" class="btn btn-primary waves-effect waves-light pull-right" href="<?php echo base_url("admin/service/add")?>">Add New <i class="fa fa-plus"></i></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				   
			<div class="panel panel-default">
				<div class="panel-heading">
							<h3 class="panel-title">SERVICE LIST</h3>
				</div>
				<div class="panel-body">
					
					<table id="datatable-buttons" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Device Type</th>
								<th>Service Name</th>
								<th>Package Name</th>
								<th>Logo Image</th>
								<th>Banner Image</th>
								<th>Account</th>								
								<th>Display Type</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $val){
								
								$accountData = $this->service_model->getAccountNameById($val['AccountID']);
								?>
							<tr class="gradeX">
								<td><?php 
								if($val['DeviceType'] == '1')
								{
								echo 'Android';
								}
								else{ echo 'iOS';}
								?></td>
								<td><?php echo $val['ServiceName'];?></td>
								 <td><?php echo $val['PackageName'];?></td>
								 <td><img height="50" width="50" src="<?php echo base_url().'uploads/logo/'.$val['LogoImage']?>"></td>
								 <td><img height="50" width="50" src="<?php echo base_url().'uploads/'.$val['BannerImage']?>"></td>
								 <td><?php echo $accountData[0]['AccountName'];?></td>
								 <td><?php echo $val['DeviceType'];?></td>
								 <td class="actions">
									<a title="Edit" href="<?php echo base_url("admin/service/edit/".$val['ServiceID'])?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
									<a title="Delete" onclick="return confirm('Are you sure want to delete this record?');" href="<?php echo base_url("admin/service/delete/".$val['ServiceID'])?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
								</td>
								
							</tr>
							<?php }?>
							
							
							
							
						</tbody>
					</table>
				</div>
				<!-- end: page -->

			</div> <!-- end Panel -->
			</div>
			</div>
		</div> <!-- container -->
				   
	</div> <!-- content -->			
                    
