

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                
                                <ol class="breadcrumb pull-left">
                                     <li><a href="#">Front Link</a></li>                                         
                                    <li class="active">Display Type</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">ADD Display Type</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url('admin/display/add');?>" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cname" class="control-label col-lg-2">Name</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" id="name" name="name" type="text" required="" aria-required="true">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="ccomment" class="control-label col-lg-2">Description</label>
                                                    <div class="col-lg-10">
                                                        <textarea class="form-control" id="ccomment" name="comment" required="" aria-required="true"></textarea>
                                                    </div>
                                                </div>
												<div class="form-group">
                                                    
													<label for="ccomment" class="control-label col-lg-2">Is Active</label>
                                                    <div class="col-lg-5">
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
						
						
		

