<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i> Proyek</h1>
        </div>
    </div>
    <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin') : ?>
        <a href="<?php echo base_url() ?>proyek/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Proyek</a>
        <?php endif; ?>  
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Proyek</small></h2>
                    <a href="<?php echo base_url() ?>proyek/panggil_fpdf" class="btn btn-danger pull-right"><i class="fa fa-file"></i> PDF Data Proyek</a>
                    <a href="<?php echo base_url() ?>proyek/panggil_excel" class="btn btn-success pull-right"><i class="fa fa-file"></i> Excel Data Proyek</a>
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
                                    <th>ID Proyek</th>
                                    <th>PIC</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Durasi (Hari)</th>
                                    <th width='15%'>Nama Program</th>
                                    <th width='15%'>Nama Proyek</th>
                                    <th>Anggaran</th>
                                    <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin') : ?>
                                    <th>Action</th>
                                    <?php endif; ?>
                                    <?php if ($this->session->userdata('jabatan') == 'Karyawan' || $this->session->userdata('jabatan') == 'Supervisor') : ?>
                                    <th width ='5%'>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $WbsList) : ?>
                                    <tr>
                                    <td><?php echo $WbsList->ID_PROYEK ?></td>
                                        <td><?php echo $WbsList->PIC  ?></td>
                                        <td><?php echo $WbsList->TGL_AWAL  ?></td>
                                        <td><?php echo $WbsList->TGL_AKHIR ?></td>
                                        <td><?php echo $WbsList->DURASI	 ?></td>
                                        <td><?php echo $WbsList->NAMA_PROGRAM ?></td>
                                        <td><?php echo $WbsList->NAMA_PROYEK ?></td>
                                        <td>Rp. <?php echo $WbsList->ANGGARAN ?></td>
                                        <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin') : ?>
                                        <td width="12%">                                               
                                                <a href="<?php echo base_url() ?>proyek/update?id=<?php echo $WbsList->ID_PROYEK ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data proyek ini?')" href="<?php echo base_url() ?>proyek/delete/<?php echo $WbsList->ID_PROYEK ?>" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                                <a href="<?php echo base_url() ?>anggota_proyek/create?id=<?php echo $WbsList->ID_PROYEK ?>" class="btn btn-success btn-xs">
                                                    <i class="fa fa-user-plus"></i>
                                                </a>
                                                <a href="<?php echo base_url() ?>anggota_proyek?id=<?php echo $WbsList->ID_PROYEK ?>" class="btn btn-warning btn-xs">
                                                    <i class="fa fa-user"></i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                        
                                        <?php if ($this->session->userdata('jabatan') == 'Supervisor' || $this->session->userdata('jabatan') == 'Karyawan') : ?>
                                        <td width="5%">       
                                            <a href="<?php echo base_url() ?>anggota_proyek?id=<?php echo $WbsList->ID_PROYEK ?>" class="btn btn-warning btn-xs">
                                                    <i class="fa fa-user"></i>
                                            </a>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
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
                window.location.href = "<?php //echo base_url() ?>proyek/delete?rcgn=<?php //echo $WbsList->ID_PROYEK?>";
            });
    }
</script> -->