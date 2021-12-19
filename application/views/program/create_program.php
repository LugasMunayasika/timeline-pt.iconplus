<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-tasks"></i> Tambah Program    </h1>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> Masukkan Data Program</h2>
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
                       <form method="post" action="<?php echo base_url() ?>program/submit" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                            <!-- <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">ID Program
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="id_program" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">NO Surat
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="no_surat" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Perihal
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="perihal" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Surat
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tgl_surat" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Program
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_program" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Divisi
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="divisi">
                                        <option value="" >Pilih Divisi</option>
                                        <option value="Divisi Lapangan" >Divisi Lapangan</option>
                                        <option value="Divisi Kelistrikan">Divisi Kelistrikan</option>
                                        <option value="Divisi Jaringan">Divisi Jaringan</option>
                                        <option value="Divisi Web">Divisi Web</option>
                                        <option value="Divisi Intern ">Divisi Intern </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Pemberi Kerja
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="pemberi_kerja">
                                        <option value="Dirut">Dirut</option>
                                        <option value="Direksi">Direksi</option>
                                        <option value="PLN Pusat">PLN Pusat</option>
                                        <option value="Korporat/ Turunan Program Strategis">Korporat/ Turunan Program Strategis</option>
                                        <option value="Pemegang Saham">Pemegang Saham</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="kategori">
                                        <option value="" >Pilih Kategori</option>
                                        <option value="Program Strategis Diluar KPI">Program Strategis Diluar KPI</option>
                                        <option value="KPI Korporat">KPI Korporat</option>
                                        <option value="Arahan RUPS">Arahan RUPS</option>
                                        <option value="Program Kerja Direktorat Divisi/SBU">Program Kerja Direktorat Divisi/SBU</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Tgl Target Penyelesaian
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" name="tgl_selesai" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Dokumen
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" name="dokumen" class="form-control col-md-7 col-xs-12" required>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" href="<?php echo base_url() ?>program">Kembali</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
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