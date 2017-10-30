<tr>
<?php 
if(!empty($htmldata))
{	
?>
<td><?php echo $htmldata['ServiceName'];?></td>
<td><?php echo $htmldata['AdsType'];?></td>
<td><?php echo $htmldata['deviceType'];?></td>
<td><?php echo $htmldata['appType'];?></td>
<?php 
if($adsid == '2' || $adsid == '3')
{
	echo '<td>'.$htmldata['OrderBy'].'</td>'; 
}
if($adsid == '2')
{
	echo '<td>'.$htmldata['Seconds'].'</td>'; 
}
?>
<td>
<a title="Delete" onclick="return confirm('Are you sure want to delete this record?');" href="<?php echo base_url("admin/serviceads/delete/".$htmldata['id'])?>" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
<?php 
if($adsid == '2')
{?>
<a title="update" href="<?php echo base_url("admin/serviceads/updateorder/".$htmldata['id'])?>" class="on-default remove-row"><i class="fa fa-flask"></i></a>

<?php }
if($adsid == '3')
{?>
<a title="Edit" href="<?php echo base_url("admin/serviceads/updateorderlist/".$htmldata['id'])?>" class="on-default remove-row"><i class="fa fa-flask"></i></a>
<?php }?>
</td>
<?php }
else{
?>
<td colspan="7"><?php echo 'No Record Found';?></td>
<?php }?>
</tr>
				

