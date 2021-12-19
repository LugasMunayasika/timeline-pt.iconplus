<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-file"></i> Laporan Mingguan</h1>
        </div>
    </div>
    <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Supervisor' || $this->session->userdata('jabatan') == 'Karyawan') : ?>
        <a href="<?php echo base_url() ?>laporan_mingguan/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Laporan Mingguan</a>
        <?php endif; ?>    
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Laporan Mingguan</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- Notif -->
                    <?php $announce = $this->session->userdata('announce') ?>
                    <?php if (!empty($announce)) : ?>
                        <?php if ($announce == 'Berhasil menyimpan data') : ?>
                            <div class="alert alert-success fade in"><?php echo $announce; ?></div>
                        <?php else : ?>
                            <div class="alert alert-danger fade in"><?php echo $announce; ?></div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <!-- Data -->
                    <?php if ($total == 0) : ?>
                        <div class="alert alert-danger">Tidak ada data</div>
                    <?php else : ?>
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <!-- <th>ID Laporan</th> -->
                                    <th width='10%'>ID Proyek</th>
                                    <th width='15%'>Nama Program</th>
                                    <th width='15%'>Nama Proyek</th>
                                    <th width='10%'>Tanggal</th>
                                    <th>File Laporan </th>
                                    <th>Kendala</th>
                                    <th>Catatan</th>
                                    <th>Status</th>
                                    <?php if (($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Supervisor' || $this->session->userdata('jabatan') == 'Karyawan')) : ?>
                                        <th>Action</th>
                                    <?php endif;?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($list as $laporanList) : ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <!-- <td><?php //echo $laporanList->ID_LAPORAN  ?></td> -->
                                        <td><?php echo $laporanList->ID_PROYEK  ?></td>
                                        <td><?php echo $laporanList->NAMA_PROGRAM  ?></td>
                                        <td><?php echo $laporanList->NAMA_PROYEK  ?></td>
                                        <td><?php echo $laporanList->TANGGAL  ?></td>
                                        <td width='10%'><a class="btn btn-primary fa fa-download"  href="<?php echo base_url() ?>assets/doc/upload/file_laporan/<?php echo $laporanList->FILE_LAPORAN ?>"> Unduh File</td>
                                        <td width='15%'><?php echo $laporanList->KENDALA  ?></td>
                                        <td width='15%'><?php echo $laporanList->CATATAN  ?></td>
                                        <td><?php echo $laporanList->STATUS  ?></td>
                                        <?php if (($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Supervisor' || $this->session->userdata('jabatan') == 'Karyawan')) : ?>
                                            <td width="6%">
                                                <a href="<?php echo base_url() ?>laporan_mingguan/update?id=<?php echo $laporanList->ID_LAPORAN ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data laporan mingguan ini?')" href="<?php echo base_url() ?>laporan_mingguan/delete/<?php echo $laporanList->ID_LAPORAN ?>" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    function sweets() {
        swal({
                title: "Apakah anda yakin ingin menghapus data ?",
                text: "Data tidak bisa di kembalikan",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Delete",
                closeOnConfirm: false
            },
            function() {
                window.location.href = "<?php echo base_url() ?>laporan/delete?rcgn=<?php echo $laporanList->ID_LAPORAN ?>";
            });
    }
</script> -->