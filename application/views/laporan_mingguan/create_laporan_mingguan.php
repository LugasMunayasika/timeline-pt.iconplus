<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-file"></i>  Tambah Laporan Mingguan</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Masukkan Laporan Mingguan</h2>
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
                            <form method="post" action="<?php echo base_url() ?>laporan_mingguan/submit" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                             <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Laporan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="id_laporan" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> -->
                            <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Proyek</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_proyek" class="form-control col-md-3 col-sm-3 col-xs-12">
                                        <option value="" >Pilih ID Proyek</option>    
                                        <?php foreach ($proyek as $pngsn) : ?>
                                            <option value="<?php echo $pngsn->ID_PROYEK ?>"><?php echo $pngsn->ID_PROYEK ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tanggal" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">File Laporan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="file_laporan" name="file_laporan" size="10000" class="form-control col-md-7 col-xs-12" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Catatan
                                </label>    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="catatan" class="form-control col-md-7 col-xs-12" rows="3" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kendala
                                </label>    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="kendala" class="form-control col-md-7 col-xs-12" rows="3" ></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Status
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="status">
                                        <option value="">Pilih Status</option>
                                        <option value="Belum Dimulai">Belum Dimulai</option>
                                        <option value="Dalam Pekerjaan">Dalam Pekerjaan</option>
                                        <option value="Selesai">Selesai</option>
                                    </select>
                            </div>
                            </div>
                            
                            <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url('laporan_mingguan') ?>">Kembali</a>
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