<br>
<div class="row">
    <div class="col-xs-12">
        <a href="javascript:history.go(-1)" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h1 class="page-header"><?= $user['name'] ?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <img src="<?= base_url() ?>uploads/users/thumb/<?= $user['profilePic']?>" class="img-circle" width="100" height="100">
    </div>
    <div class="col-md-10">
        <h4>Contact Information</h4>
        <div class="row">
            <div class="col-md-4">
              Email:
            </div>
            <div class="col-md-8">
              <a href="mailto:<?= $user['email'] ?>"><?= $user['email'] ?></a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                Phone Number:
            </div>
            <div class="col-md-8">
                <?= ($user['mobno'] != "" && $user['mobno'] != "0")?$user['mobno']:"-" ?>
            </div>
        </div>
        <hr>
        <h4>General Information</h4>
        <div class="row">
            <div class="col-md-4">
                Name:
            </div>
            <div class="col-md-8">
                <?= $user['name'] ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                Date Of Birth:
            </div>
            <div class="col-md-8">
                <?= ($user['dob'] != "0000-00-00")?date('d M Y',strtotime($user['dob'])):" - " ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                Address:
            </div>
            <div class="col-md-8">
                <?php if($user['address_line1'] != "") { ?>
                <?= $user['address_line1'] ?>,<br>
                <?= $user['address_line2'] ?>,<br>
                <?= $user['state'].','.$user['city'].','.$user['country'].' - '.$user['zipcode'] ?>
                <?php } else { echo "-"; } ?>
            </div>
        </div>
    </div>
</div>