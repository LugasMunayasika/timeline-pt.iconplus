<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-file"></i> Edit Laporan Mingguan</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Perbarui Laporan Mingguan</h2>
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
                        <form method="post" action="<?php echo base_url() ?>laporan_mingguan/submits" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input readonly class="form-control col-md-7 col-xs-12" type="hidden" name="id" value="<?php echo $detail->ID_LAPORAN ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Proyek
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input readonly class="form-control col-md-7 col-xs-12" type="text" name="id_proyek" value="<?php echo $detail->ID_PROYEK ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tanggal" class="form-control col-md-7 col-xs-12" value="<?php echo $detail->TANGGAL?>">
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
                                <textarea type="text" name="catatan" class="form-control col-md-7 col-xs-12" rows="3" ><?php echo $detail->CATATAN?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kendala
                                </label>    
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="kendala" class="form-control col-md-7 col-xs-12" rows="3" ><?php echo $detail->KENDALA?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Status
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php  $status = $detail->STATUS ?>
                                    <select class="form-control" name="status">
                                        <option value="">Pilih Status</option>
                                        <option <?php if($status=='Belum Dimulai'){echo 'selected="selected"';} ?> value="Belum Dimulai">Belum Dimulai</option>
                                        <option <?php if($status=='Dalam Pekerjaan'){echo 'selected="selected"';} ?>  value="Dalam Pekerjaan">Dalam Pekerjaan</option>
                                        <option <?php if($status=='Selesai'){echo 'selected="selected"';} ?>  value="Selesai">Selesai</option>
                                    </select>
                            </div>
                            </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url() ?>laporan_mingguan">Kembali</a>
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