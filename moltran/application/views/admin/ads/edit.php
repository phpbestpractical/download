
                        <!-- Page-Title -->
                        <div class="row">
                            <ol class="breadcrumb pull-left">
                                    <li><a href="#">Front Link</a></li>                                    
                                    <li class="active">Ads Type</li>
                            </ol>
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
                                    <div class="panel-heading"><h3 class="panel-title">EDIT ADS TYPE</h3></div>
                                    <div class="panel-body">
                                        <div class="form">
                                            <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="<?php echo base_url('admin/ads/edit/'.$id);?>" novalidate="novalidate">
                                                <div class="form-group">
                                                    <label for="cname" class="control-label col-lg-2">Name</label>
                                                    <div class="col-lg-5">
                                                        <input class="form-control" id="name" name="name" value="<?php echo $Name?>" type="text" required="" aria-required="true">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="ccomment" class="control-label col-lg-2">Description</label>
                                                    <div class="col-lg-5">
                                                        <textarea class="form-control" value="" id="ccomment" name="comment" required="" aria-required="true"><?php echo $Description?></textarea>
														
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
                                                        <a class="btn btn-purple waves-effect" href="<?php echo base_url('admin/category');?>">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- .form -->
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->

                        </div> <!-- End row -->


                        <!-- Form-validation -->
			
