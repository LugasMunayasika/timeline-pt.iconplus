<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-users"></i> WBS</h1>
        </div>
    </div>
    <?php if($this->session->userdata('role')=='superadmin'){echo '<a href="'.base_url().'wbs/create" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Anggota</a>';} ?>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data <small>WBS</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <!-- Notif -->
                <?php $announce = $this->session->userdata('announce') ?>
                <?php if(!empty($announce)): ?>
                    <?php if($announce == 'Berhasil menyimpan data'): ?>
                    <div class="alert alert-success fade in"><?php echo $announce; ?></div>
                    <?php else: ?>
                    <div class="alert alert-danger fade in"><?php echo $announce; ?></div>
                    <?php endif; ?>
                <?php endif; ?>
                    <div class="row">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>WEB CODE</th>
                                    <th>PIC</th>
                                    <th>Tanggal Awal</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Durasi</th>
                                    <th>Nama Pekerjaan</th>
                                    <?php if($this->session->userdata('role')=='superadmin'){echo '<th>Action</th>';} ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($this->db->count_all('wbs') == 0){
                                        echo '
                                        <tr>
                                            <td colspan="6">
                                                <div class="alert alert-danger">
                                                    Tidak ada data
                                                </div>
                                            </td>
                                        </tr>
                                        ';
                                    }else{
                                        $no = 1;
                                        foreach ($list as $listWbs) {
                                            $gen = '';
                                            if($listWbs->GENDER == 'L'){
                                                $gen = 'Laki-laki';
                                            }else{
                                                $gen = 'Perempuan';
                                            }
                                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $listWbs->WEB_CODE ?></td>
                                    <td><a href="<?php echo base_url() ?>wbs/detail?idtf=<?php echo $listWbs->WEB_CODE ?>"><?php echo $listWbs->FULL_NAME ?></a></td>
                                    <td><?php echo $listWbs->PIS ?></td>
                                    <td><?php echo $listWbs->TGL_AWAL ?></td>
                                    <td><?php echo $listWbs->TGL_AKHIR ?></td>
                                    <td><?php echo $listWbs->DURASI ?></td>
                                    <td><?php echo $listWbs->NAMA_PEKERJAAN ?></td>
                                    <td><?php echo $gen ?></td>
                                    <?php if($this->session->userdata('role')=='superadmin'): ?>
                                        <td>
                                            <a href="<?php echo base_url() ?>wbs/detail?idtf=<?php echo $listWbs->WEB_CODE ?>" class="btn btn-info btn-xs">
                                                <i class="fa fa-list"> View</i>
                                            </a>
                                            <a href="<?php echo base_url() ?>wbs/edit?idtf=<?php echo $listWbs->WEB_CODE ?>" class="btn btn-success btn-xs">
                                                <i class="fa fa-edit"> Edit</i>
                                            </a>
                                                <a onclick="sweets()" class="btn btn-danger btn-xs">
                                                <i class="fa fa-trash"> Delete</i>
                                            </a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <?php
                                            $no++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
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
            window.location.href = "<?php echo base_url() ?>wbs/delete?rcgn=<?php echo $listWbs->WEB_CODE ?>";
        });
}
</script>

