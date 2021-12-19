<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-tasks"></i> Tambah Data Monitoring</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Masukkan Data Monitoring</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <?php
                        $announce = $this->session->flashdata('announce');
                        if (!empty($announce)) {
                            if ($announce == 'Berhasil menyimpan data') {
                                echo '
                                        <div class="alert alert-success">
                                        ' . $announce . '
                                        </div>
                                    ';
                            } else {
                                echo '
                                        <div class="alert alert-danger">
                                        ' . $announce . '
                                        </div>
                                    ';
                            }
                        }
                        ?>
                        <form method="post" action="<?php echo base_url() ?>monitoring/submit" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Monitoring
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="no_monitoring" class="form-control col-md-7 col-xs-12">
                                </div>
                        </div> -->
                        <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Proyek</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="id_proyek" class="form-control col-md-3 col-sm-3 col-xs-12">
                                        <option value="" >Pilih ID Proyek</option>
                                        <?php foreach ($id_proyek as $pngsn) : ?>
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
                            
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Uraian Kegitan
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_proyek" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Progres(%)
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="integer" name="progres" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Dana Turun
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="integer" name="dana_turun" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>monitoring">Kembali</a>
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