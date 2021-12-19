<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-users"></i>  Edit user</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perbarui data user</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <?php
                            $announce = $this->session->flashdata('announce');
                            if(!empty($announce)){
                                if($announce == 'Berhasil menyimpan data'){
                                    echo '
                                        <div class="alert alert-success">
                                        '.$announce.'
                                        </div>
                                    ';
                                }else{
                                    echo '
                                        <div class="alert alert-danger">
                                        '.$announce.'
                                        </div>
                                    ';
                                }
                            }
                        ?>
                            <form method="post" action="<?php echo base_url() ?>user/submits" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" autocomplete= "off" >
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >ID User
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input readonly type="text" name="ids" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->ID_ADMIN ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Lengkap
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="fullname" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->FULLNAME ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Jabatan
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php $jabatan = $detail->JABATAN ?>
                                        <select class="form-control" name="jabatan">
                                            <option <?php if($jabatan=='Admin'){echo 'selected="selected"';} ?> value="Admin">Admin</option>
                                            <option <?php if($jabatan=='Direktur'){echo 'selected="selected"';} ?> value="Direktur">Direktur</option>
                                            <option <?php if($jabatan=='Manajer'){echo 'selected="selected"';} ?> value="Manajer">Manajer</option>
                                            <option <?php if($jabatan=='Supervisor'){echo 'selected="selected"';} ?> value="Supervisor">Supervisor</option>
                                            <option <?php if($jabatan=='Karyawan'){echo 'selected="selected"';} ?> value="Karyawan">Karyawan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Username
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="username" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->USERNAME ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <button class="btn btn-link" type="button" onclick="hea()">Change Password</button>
                                        <script type="text/javascript">
                                            function hea() {
                                                $('#pw').css('display','block'); 
                                            }
                                        </script>
                                    </div>
                                </div>

                                <div id="pw" style="display: none">
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >New Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="password" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Confirm Password
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" name="cpassword" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url() ?>user">Kembali</a>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
