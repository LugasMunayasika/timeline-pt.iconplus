<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i> Tambah Tim Proyek</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Masukkan Data Tim Proyek</h2>
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
                            <form method="post" action="<?php echo base_url() ?>timproyek/submit" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="nama_tim" class="form-control col-md-3 col-sm-3 col-xs-12">
                                    <option value="" >Masukkan Nama</option>
                                    <?php foreach ($user as $usr) : ?>
                                        <option value="<?php echo $usr->FULLNAME?>"><?php echo $usr->FULLNAME?></option>
                                    <?php endforeach; ?>
                                </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >ID Tim
                                    </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="id_tim" class="form-control col-md-7 col-xs-12">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >ID Proyek
                                    </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="id_proyek" class="form-control col-md-7 col-xs-12">
                                </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url('proyek/tim') ?>">Kembali</a>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <input type="submit" class="btn btn-success" name="submit" value="Simpan">
                                    </div>
                                </div>
                               </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
