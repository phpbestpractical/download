

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                
                                <ol class="breadcrumb pull-left">
									<li><a href="#">Front Link</a></li>                                    
                                    <li class="active">Store</li>
                                </ol>
								<a id="addToTable" class="btn btn-primary waves-effect waves-light pull-right" href="<?php echo base_url("admin/store/add")?>">Add New <i class="fa fa-plus"></i></a>
                            </div>
                        </div>


                        <div class="row">
							<div class="col-md-12">
						   
								<div class="panel panel-default">
									<div class="panel-heading">
												<h3 class="panel-title">STORE LIST</h3>
									</div>
						<div class="panel-body">
                                <table id="datatable-buttons" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Store Name</th>
                                            <th>Description</th>
											<th>StoreURL</th>
											
                                            <th>Active</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php foreach($data as $val){?>
                                        <tr class="gradeX">
                                            <td><?php echo $val['Name'];?></td>
                                            <td><?php echo $val['Description'];?></td>
											<td><?php echo $val['StoreURL'];?></td>
                                            <td><?php echo $val['IsActive'];?></td>
                                            <td class="actions">
                                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                                <a title="Edit" href="<?php echo base_url("admin/store/edit/".$val['StoreID'])?>" class="on-default edit-row" ><i class="fa fa-pencil"></i></a>
                                                <a title="Delete" onclick="return confirm('Are you sure want to delete this record?');" href="<?php echo base_url("admin/store/delete/".$val['StoreID'])?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
										<?php }?>
                                        
                                        
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- end: page -->

                        </div> <!-- end Panel -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->			
                    
