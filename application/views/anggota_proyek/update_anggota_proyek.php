<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i>  Edit Data Anggota Proyek</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perbarui Data Anggota Proyek</h2>
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
                            <form method="post" action="<?php echo base_url() ?>anggota_proyek/submits" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" autocomplete= "off" >
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >ID TIM
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input readonly type="text" name="id"  class="form-control col-md-7 col-xs-12" value="<?php echo $detail->ID_AP ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >ID Proyek
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input readonly type="text" name="id_proyek" id="id_proyek" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->ID_PROYEK ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="fullname"  class="form-control col-md-7 col-xs-12">
                                        <option value="" >Pilih Nama</option>
                                        <?php foreach ($list as $pngsn) : ?>
                                            <option value="<?php echo $pngsn->FULLNAME ?>"><?php echo $pngsn->FULLNAME ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url() ?>anggota_proyek">Kembali</a>
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
