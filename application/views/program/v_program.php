<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-tasks"></i> Program</h1>
        </div>
    </div>
    <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin') : ?>
        <a href="<?php echo base_url() ?>program/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Program</a>
        <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Program</small></h2>
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
                                    <!-- <th>No</th> -->
                                    <th width ='10%'>ID Program</th>
                                    <th>No Surat</th>
                                    <th>Perihal</th>
                                    <th>Tgl Surat</th>
                                    <th>Nama Program</th>
                                    <th>Divisi</th>
                                    <th>Pemberi Kerja</th>
                                    <th width="15%">Kategori</th>
                                    <th>Target Selesai</th>
                                    <th>Dokumen</th>
                                    <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin') : ?>
                                        <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $programList) : ?>
                                    <tr>
                                        <td><?php echo $programList->ID_PROGRAM ?></td>
                                        <td width='10%'><?php echo $programList->NO_SURAT  ?></td>
                                        <td><?php echo $programList->PERIHAL  ?></td>
                                        <td width='8%'><?php echo $programList->TGL_SURAT ?></td>
                                        <td><?php echo $programList->NAMA_PROGRAM ?></td>
                                        <td><?php echo $programList->DIVISI ?></td>
                                        <td><?php echo $programList->PEMBERI_KERJA ?></td>
                                        <td width='10%'><?php echo $programList->KATEGORI ?></td>
                                        <td width='11%'><?php echo $programList->TGL_SELESAI ?></td>
                                        <!-- <td><a href="//<?php //echo base_url() ?>assets/doc/upload/<?php //echo $programList->DOKUMEN  ?>"><?php //echo $programList->DOKUMEN  ?></td> -->
                                        <td><a class="btn btn-primary fa fa-download" href="<?php echo base_url() ?>assets/doc/upload/<?php echo $programList->DOKUMEN  ?>"> Unduh</td>
                                        <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin') : ?>
                                            <td width="6%">
                                                <a href="<?php echo base_url() ?>program/update?id=<?php echo $programList->ID_PROGRAM ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data program ini?')" href="<?php echo base_url() ?>program/delete/<?php echo $programList->ID_PROGRAM ?>" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
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
                window.location.href = "<?php //echo base_url() ?>program/delete?rcgn=<?php //echo $programList->ID_PROGRAM ?>";
            });
    }
</script> -->