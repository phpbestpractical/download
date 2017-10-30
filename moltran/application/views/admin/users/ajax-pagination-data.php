<?php if(!empty($users)): foreach($users as $data): ?>

                                <tr class="odd gradeX">
                                    <td><img src="<?= base_url()."uploads/users/thumb/".$data['profilePic'] ?>" class="img-circle" height="50" width="50" /></td>
                                    <td><?= $data['name'] ?> </td>
                                    <td><?= $data['email'] ?> </td>
                                    <td><?= $data['role'] ?> </td>
                                    <td><?= ($data['points'] != "")?$data['points']:"0" ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>admin/users/favouriteList/<?= $data['id'] ?>?is_fav=1">Favourite List</a><br>
                                        <a href="<?= base_url(); ?>admin/users/favouriteList/<?= $data['id'] ?>?is_fav=0">Wish List</a>
                                    </td>
                                    <td>
                                        <?php if($data['delStatus'] == "0") { ?>
                                            <a title="Block User" onclick="return confirm('Are you sure you want to block this user?')" href="<?= base_url() ?>admin/users/blockUser/<?= $data['id']?>?status=1"><i style="color: green" class="fa fa-check-circle-o fa-1x"></i></a>
                                        <?php } else { ?>
                                            <a title="Active User" onclick="return confirm('Are you sure you want to active this user?')" href="<?= base_url() ?>admin/users/blockUser/<?= $data['id']?>?status=0"><i style="color: darkred" class="fa fa-ban fa-1x"></i></a>
                                        <?php } ?>
                                    </td>
                                </tr>

                        <?php endforeach; else: ?>
                                <tr><td colspan="7" class="text-center"><b>User(s) not found.</b></td></tr>
                        <?php endif; ?>
                        <tr class="odd gradeX">
                            <td colspan="7">
                                <?php echo $this->ajax_pagination->create_links(); ?>
                            </td>
                        </tr>