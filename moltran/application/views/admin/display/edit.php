

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Display Type</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Display Type</a></li>                                    
                                    <li class="active">Edit Display Type</li>
                                </ol>
                            </div>
                        </div>
						<?php	
						foreach($data[0] as $userKey=>$userval)
						{
							${$userKey} = $userval;
						}	
						?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Form validations</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url('admin/display/edit/'.$id);?>" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cname" class="control-label col-lg-2">Name</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="name" name="name" value="<?php echo $Name?>" type="text" required="" aria-required="true">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="ccomment" class="control-label col-lg-2">Description</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control"  id="ccomment" name="comment" required="" aria-required="true"><?php echo $Description?></textarea>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    
													<label for="ccomment" class="control-label col-lg-2">Is Active</label>
                                                    <div class="col-lg-5">
													<div class="checkbox checkbox-primary">
														<input type="checkbox" id="checkbox1" name="active" value="1"<?php if(isset($IsActive) && $IsActive == '1') echo 'checked';?>>
														<label for="checkbox1">
															
														</label>
													</div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-offset-2 col-lg-10">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                                        <button class="btn btn-default waves-effect" type="button">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->


                        <!-- Form-validation -->
			
