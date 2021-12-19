<body>
<div class="col-md-12 col-lg-12 col-xs-12">
	<div class="col-lg-5 col-md-5 col-xs-12">
		<img style="height: 230px;width: 200px" src="<?php echo base_url() ?>assets/images/upload/profile/<?php echo $detail->PHOTO ?>">
	</div>
	<div class="col-lg-7 col-md-7 col-xs-12">
		<label>Nama Lengkap</label>
        <label style="margin-left: 15px; margin-right:5px">:</label>
        <label><?php echo $detail->FULLNAME ?></label><br>
		<label>Username</label>
        <label style="margin-left: 43px; margin-right:5px">:</label>
        <label ><?php echo $detail->USERNAME ?></label><br>
        <label>Jenis Kelamin</label>
        <label style="margin-left: 20px; margin-right:5px">:</label>
        <?php if($detail->JENKEL == null){$jk='<i>Data Kosong</i>';}else{$jk=$detail->JENKEL;} ?>
        <label><?php echo $jk ?></label><br>
        <label>No Telp.</label>
        <label style="margin-left: 54px; margin-right:5px">:</label>
        <?php if($detail->NO_TELP == null){
                    $tl='<i>Data Kosong</i>';
                }
                else{
                    $tl=$detail->NO_TELP;
                } ?>
        <label><?php echo $tl ?></label><br>
        <label>Alamat</label>
        <label style="margin-left: 60px; margin-right:5px">:</label>
        <?php if($detail->ALAMAT == null){
                    $lm='<i>Data Kosong</i>';
                }
                else{
                    $lm=$detail->ALAMAT;
                } ?>
        <label><?php echo $lm ?></label><br><br>
        <a href="<?php echo base_url() ?>profil/edit?change_key=<?php echo $detail->ID_ADMIN ?>&signup=0" class="btn btn-success pull-right"><i class="fa fa-edit"></i>  Edit</a>
	</div>
</div>
</body>