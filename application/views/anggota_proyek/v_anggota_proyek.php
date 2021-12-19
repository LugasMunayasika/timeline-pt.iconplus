<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-calendar"></i> Tim Kerja (Proyek)</h1>
        </div>
    </div>  
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>Tim Proyek</small></h2>
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
                                    <!-- <th>ID TIM </th> -->
                                    <th>Nama </th>
                                    <!-- <th>ID Proyek </th> -->
                                    <?php if ($this->session->userdata('jabatan') == 'Direktur') : ?>
                                    <th>Action</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($list as $TimWbsList) : ?>
                                    <tr width="50%">
                                        <td width="4%"><?php echo $no ?></td>
                                        <!-- <td><?php //echo $TimWbsList->ID_AP ?></td> -->
                                        <td width="35%"><?php echo $TimWbsList->FULLNAME?></td>
                                        <!-- <td><?php //echo $TimWbsList->ID_PROYEK ?></td> -->
                                        <?php if ($this->session->userdata('jabatan') == 'Direktur') : ?>
                                            <td width="5%">
                                                <!-- <a href="<?php echo base_url() ?>anggota_proyek/update?id=<?php echo $TimWbsList->ID_AP ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-edit">Edit</i>
                                                </a> -->
                                                <a onclick="return confirm('Anda yakin ingin menghapus data anggota proyek ini?')" href="<?php echo base_url() ?>anggota_proyek/delete/<?php echo $TimWbsList->ID_AP ?>" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"> Delete</i>
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