<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-tasks"></i>  Edit Program</h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Perbarui Data Program</h2>
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
                            <form method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>program/submits" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left ">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Program
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input readonly class="form-control col-md-7 col-xs-12" type="text" name="id" value="<?php echo $detail->ID_PROGRAM ?>">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >NO Surat
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="no_surat" value="<?php echo $detail->NO_SURAT ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Perihal
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="perihal" value="<?php echo $detail->PERIHAL ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Surat
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" name="tgl_surat" value="<?php echo $detail->TGL_SURAT ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nama Program
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="nama_program" value="<?php echo $detail->NAMA_PROGRAM ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Divisi
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php $divisi = $detail->DIVISI ?>
                                    <select class="form-control" name="divisi">
                                        <option value="" >Pilih Divisi</option>
                                        <option <?php if($divisi=='Divisi Lapangan'){echo 'selected="selected"';} ?> value="Divisi Lapangan" >Divisi Lapangan</option>
                                        <option <?php if($divisi=='Divisi Kelistrikan'){echo 'selected="selected"';} ?> value="Divisi Kelistrikan">Divisi Kelistrikan</option>
                                        <option <?php if($divisi=='Divisi Jaringan'){echo 'selected="selected"';} ?> value="Divisi Jaringan">Divisi Jaringan</option>
                                        <option <?php if($divisi=='Divisi Web'){echo 'selected="selected"';} ?> value="Divisi Web">Divisi Web</option>
                                        <option <?php if($divisi=='Divisi Intern'){echo 'selected="selected"';} ?> value="Divisi Intern ">Divisi Intern </option>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Pemberi Kerja
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php $pemberi_kerja = $detail->PEMBERI_KERJA ?>
                                    <select class="form-control" name="pemberi_kerja">
                                            <option <?php if($pemberi_kerja=='Dirut'){echo 'selected="selected"';} ?> value="Dirut">Dirut</option>
                                            <option <?php if($pemberi_kerja=='Direksi'){echo 'selected="selected"';} ?> value="Direksi">Direksi</option>
                                            <option <?php if($pemberi_kerja=='PLN Pusat'){echo 'selected="selected"';} ?> value="PLN Pusat">PLN Pusat</option>
                                            <option <?php if($pemberi_kerja=='Korporat/ Turunan Program Strategis'){echo 'selected="selected"';} ?> value="Korporat/ Turunan Program Strategis">Korporat/ Turunan Program Strategis</option>
                                            <option value="Pemegang Saham">Pemegang Saham</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php  $kategori = $detail->KATEGORI ?>
                                    <select class="form-control" name="kategori">
                                        <option value="" >Pilih Kategori</option>
                                        <option <?php if($kategori=='Program Strategis Diluar KPI'){echo 'selected="selected"';} ?> value="Program Strategis Diluar KPI">Program Strategis Diluar KPI</option>
                                        <option <?php if($kategori=='KPI Korporat'){echo 'selected="selected"';} ?> value="KPI Korporat">KPI Korporat</option>
                                        <option <?php if($kategori=='Arahan RUPS'){echo 'selected="selected"';} ?> value="Arahan RUPS">Arahan RUPS</option>
                                        <option <?php if($kategori=='Program Kerja Direktorat Divisi/SBU'){echo 'selected="selected"';} ?> value="Program Kerja Direktorat Divisi/SBU">Program Kerja Direktorat Divisi/SBU</option>
                                    </select>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tanggal Target Penyelesaian
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" name="tgl_selesai" value="<?php echo $detail->TGL_SELESAI ?>" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >Dokumen
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" name="dokumen" size="10000" required class="form-control col-md-7 col-xs-12"  />
                                </div>
                            </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-primary" href="<?php echo base_url() ?>program">Kembali</a>
                                        <input type="submit" class="btn btn-success" name="t" value="Simpan">
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
