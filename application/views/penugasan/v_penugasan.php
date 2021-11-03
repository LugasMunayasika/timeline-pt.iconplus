<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-tasks"></i> Data Penugasan</h1>
        </div>
    </div>
    <?php if ($this->session->userdata('role') == 'superadmin') : ?>
        <a href="<?php echo base_url() ?>penugasan/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Data Penugasan</a>
    <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Penugasan</small></h2>
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
                                    <th>ID Tugas</th>
                                    <th>No Surat</th>
                                    <th>Perihal</th>
                                    <th>Tgl Surat</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Pemberi Kerja</th>
                                    <th>Kategori</th>
                                    <th>PIC</th>
                                    <th>Target Selesai</th>
                                    <th>Dokumen</th>

                                    <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                                        <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($list as $penugasanList) : ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $penugasanList->ID_TUGAS ?></td>
                                        <td><?php echo $penugasanList->NO_SURAT  ?></td>
                                        <td><?php echo $penugasanList->PERIHAL  ?></td>
                                        <td><?php echo $penugasanList->TGL_SURAT ?></td>
                                        <td><?php echo $penugasanList->NAMA_PEKERJAAN ?></td>
                                        <td><?php echo $penugasanList->PEMBERI_KERJA ?></td>
                                        <td><?php echo $penugasanList->KATEGORI ?></td>
                                        <td><?php echo $penugasanList->PIC ?></td>
                                        <td><?php echo $penugasanList->TGL_SELESAI ?></td>
                                        <!-- <td><a href="<?php echo base_url() ?>assets/doc/upload/<?php echo $penugasanList->DOKUMEN  ?>"><?php echo $penugasanList->DOKUMEN  ?></td> -->
                                        <td><a href="<?php echo base_url() ?>assets/doc/upload/<?php echo $penugasanList->DOKUMEN  ?>"><?php echo $penugasanList->DOKUMEN  ?></td>
                                        <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                                            <td width="6%">
                                                <a href="<?php echo base_url() ?>penugasan/update?id=<?php echo $penugasanList->ID_TUGAS ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button class="btn btn-danger btn-xs" onclick="sweets()">
                                                    <i class="fa fa-trash"></i>
                                                </button>
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

<script>
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
                window.location.href = "<?php echo base_url() ?>penugasan/delete?rcgn=<?php echo $penugasanList->ID_TUGAS ?>";
            });
    }
</script>