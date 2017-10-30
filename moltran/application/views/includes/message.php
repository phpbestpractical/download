<?php 


if($this->session->flashdata('flash_success_msg')){

echo '<div class="alert alert-success alert-dismissable">';
echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
echo $this->session->flashdata('flash_success_msg');
echo '</div>';
}
if($this->session->flashdata('flash_error_msg')){
										
echo  '<div class="alert alert-danger alert-dismissable">';
echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
echo $this->session->flashdata('flash_error_msg');
echo '</div>';
}
?>