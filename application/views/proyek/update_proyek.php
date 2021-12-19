<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i>  Edit Data Proyek</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Perbarui data Proyek</h2>
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
                            <form method="post" action="<?php echo base_url() ?>proyek/submits" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" autocomplete= "off" >
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >ID Proyek
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input readonly type="text" name="id"  class="form-control col-md-7 col-xs-12" value="<?php echo $detail->ID_PROYEK ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >PIC
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="pic" id="pic" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->PIC ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Awal
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->TGL_AWAL?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Akhir
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->TGL_AKHIR ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Durasi (Hari)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="integer" name="durasi" id="durasi" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->DURASI ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Program</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php  $program1 = $detail->ID_PROGRAM ?>
                                    <select name="id_program" class="form-control col-md-3 col-sm-3 col-xs-12">
                                        <option value="" >Pilih Nama Program</option>
                                        <?php foreach ($program as $pngsn) : ?>
                                            <?php  $program = $detail->ID_PROGRAM ?>
                                            <option <?php if($program==$program1){echo 'selected="selected"';} ?> value="<?php echo $pngsn->ID_PROGRAM ?>"><?php echo $pngsn->ID_PROGRAM ?></option>
                                        <?php endforeach; ?>
                                    
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Proyek
                                    </label>    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <!-- <input type="text" name="nama_proyek" id="nama_proyek" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->NAMA_PROYEK?>">   -->
                                        <textarea type="text" name="nama_proyek" id="nama_proyek" class="form-control col-md-7 col-xs-12"><?php echo $detail->NAMA_PROYEK?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Anggaran
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="integer" name="anggaran" id="anggaran" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->ANGGARAN ?>">
                                    </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url() ?>proyek">Kembali</a>
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
