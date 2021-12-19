<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i>  Tambah Proyek</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Masukkan data Proyek</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <!-- Notif -->
                        <?php $announce = $this->session->userdata('announce') ?>
                        <?php if(!empty($announce)): ?>
                            <?php if($announce == 'Berhasil menyimpan data'): ?>
                            <div class="alert alert-success"><?php echo $announce; ?></div>
                            <?php else: ?>
                            <div class="alert alert-danger"><?php echo $announce; ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                            <form method="post" action="<?php echo base_url() ?>proyek/submit" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <!-- <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >WEB CODE
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="id_proyek" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >PIC
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="pic" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Awal
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Akhir
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Durasi (Hari)
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="integer" name="durasi" id="durasi" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Program</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_program" class="form-control col-md-3 col-sm-3 col-xs-12">
                                        <option value="" >Pilih ID Program</option>
                                        <?php foreach ($id_program as $pngsn) : ?>
                                            <option value="<?php echo $pngsn->ID_PROGRAM ?>"><?php echo $pngsn->ID_PROGRAM ?></option>
                                        <?php endforeach; ?>
                                    
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Proyek
                                    </label>    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="text" name="nama_proyek" class="form-control col-md-7 col-xs-12" id="nama_proyek" rows="3" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Anggaran
                                    </label>    
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea type="integer" name="anggaran" class="form-control col-md-7 col-xs-12" id="anggaran" rows="3" ></textarea>
                                    </div>
                                </div>
                              
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url('proyek') ?>">Kembali</a>
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
