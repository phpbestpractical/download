﻿

			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					
					<ol class="pull-left breadcrumb">
						<li><a href="#">Front Link</a></li>                                   
						<li class="active">Category</li>
					</ol>
					<a id="addToTable" class="btn btn-primary waves-effect waves-light pull-right" href="<?php echo base_url("admin/category/add")?>">Add New <i class="fa fa-plus"></i></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				   
			<div class="panel panel-default">
				<div class="panel-heading">
							<h3 class="panel-title">CATEGORY LIST</h3>
				</div>
				<div class="panel-body">
					
					<table id="datatable-buttons" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Category Name</th>
								<th>Description</th>
								<th>Is Active</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $val){?>
							<tr class="gradeX">
								<td><?php echo $val['Name'];?></td>
								<td><?php echo $val['Description'];?></td>
								 <td><?php echo $val['IsActive'];?></td>
								<td class="actions">
									<a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
									<a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
									<a title="Edit" href="<?php echo base_url("admin/category/edit/".$val['CategoryID'])?>" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
									<a title="Delete" onclick="return confirm('Are you sure want to delete this record?');" href="<?php echo base_url("admin/category/delete/".$val['CategoryID'])?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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
                    
