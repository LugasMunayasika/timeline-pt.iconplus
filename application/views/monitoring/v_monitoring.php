<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-desktop"></i> Monitoring</h1>
        </div>
    </div>
    <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Supervisor') : ?>
        <a href="<?php echo base_url() ?>monitoring/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Monitoring</a>
        <?php endif; ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Monitoring</small></h2>
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
                                    <th>ID Proyek</th>
                                    <th width='15%'>Nama Program</th>
                                    <th width='15%'>Nama Proyek</th>
                                    <th width='10%'>Anggaran</th>
                                    <th>Tanggal</th>
                                    <th>Progres</th>
                                    <th width='12%'>Dana Turun</th>
                                    <th width='15%'>Selisih</th>

                                    <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Supervisor') : ?>
                                        <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>   
                                <?php foreach ($list as $monitoringList) : ?>
                                    <?php //foreach ($list1 as $monitoringList1) : ?>
                                    <tr>
                                        <!-- <td><?php //echo $monitoringList->NO_MONITORING  ?></td> -->
                                        <td><?php echo $no ?></td>
                                        <td width='9%'><?php echo $monitoringList->ID_PROYEK  ?></td>
                                        <td><?php echo $monitoringList->NAMA_PROGRAM  ?></td>
                                        <td><?php echo $monitoringList->NAMA_PROYEK  ?></td>
                                        <td>Rp. <?php echo $monitoringList->ANGGARAN  ?></td>
                                        <td width='8%'><?php echo $monitoringList->TANGGAL  ?></td>
                                        <td width='20%'>
                                        <div class="progress">
                                        <div 
                                        <?php if($monitoringList->PROGRES <= 33):?>
                                            class="progress-bar progress-bar-danger" 
                                        <?php endif; ?>
                                        <?php if($monitoringList->PROGRES > 33 && $monitoringList->PROGRES <= 66):?>
                                            class="progress-bar progress-bar-warning" 
                                        <?php endif; ?>
                                        <?php if($monitoringList->PROGRES > 66 && $monitoringList->PROGRES <= 99):?>
                                            class="progress-bar progress-bar-info" 
                                        <?php endif; ?>
                                        <?php if($monitoringList->PROGRES == 100):?>
                                            class="progress-bar progress-bar-success" 
                                        <?php endif; ?>
                                        aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $monitoringList->PROGRES ?>%"><p style="font-size: 10px;"><?php echo $monitoringList->PROGRES ?>%</div>
                                        </div>
                                            <?php //echo $monitoringList->PROGRES ?>
                                        </td>
                                        <td>Rp. <?php echo $monitoringList->DANA_TURUN ?></td>
                                        <td>Rp. <?php echo $monitoringList->ANGGARAN - $monitoringList->DANA_TURUN ?></td>
                                        <?php if ($this->session->userdata('jabatan') == 'Direktur' || $this->session->userdata('jabatan') == 'Manajer' || $this->session->userdata('jabatan') == 'Admin' || $this->session->userdata('jabatan') == 'Supervisor') : ?>
                                            <td width="6%">
                                                <a href="<?php echo base_url() ?>monitoring/update?id=<?php echo $monitoringList->NO_MONITORING ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a onclick="return confirm('Anda yakin ingin menghapus data monitoring ini?')" href="<?php echo base_url() ?>monitoring/delete/<?php echo $monitoringList->NO_MONITORING ?>" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                                <?php //endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    // function sweets() {
    //     swal({
    //             title: "Apakah anda yakin ingin menghapus data ?",
    //             text: "Data tidak bisa di kembalikan",
    //             type: "warning",
    //             showCancelButton: true,
    //             confirmButtonColor: "#DD6B55",
    //             confirmButtonText: "Delete",
    //             closeOnConfirm: false
    //         },
    //         function() {
    //             window.location.href = "<?php echo base_url() ?>monitoring/delete?rcgn=<?php echo $monitoringList->ID_TUGAS ?>";
    //         });
    // }
</script> -->