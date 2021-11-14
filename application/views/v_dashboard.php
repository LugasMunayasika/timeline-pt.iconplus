<div class="">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-dashboard"></i>  Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                <div class="col-md-6 col-sm-6 col-xs-12 ">
                    <div class="x_panel">
                     <div id="lokasi3">di sini</div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>
<div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-list"></i> Data Admin</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <label>Nama Admin</label>
                    <p>&emsp;&nbsp;
                        <?php echo $this->db->get('admin')->row('FULLNAME') ?>
                    </p>
                    <label>Alamat</label>
                    <p>&emsp;&nbsp;
                        <?php echo $this->db->get('admin')->row('ALAMAT') ?>
                    </p>
                    <label>Jenis Kelamin</label>
                    <p>&emsp;&nbsp;
                        <?php echo $this->db->get('admin')->row('JENKEL') ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-flag"></i>  Statistik Admin</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                    <script type="text/javascript">
        // FusionCharts.ready(function () {
        //     var G1 = new FusionCharts({
        //         "type": "column3d",
        //         "renderAt": "lokasi",
        //         "width": "500",
        //         "height": "300",
        //         "dataFormat": "jsonurl",
        //         "dataSource": "assets/vendors/grafik/db_to_json_admin.php"
        //     }
        //     );
        //     G1.render();
        // }
        // );
        // FusionCharts.ready(function () {
        //     var G1 = new FusionCharts({
        //         "type": "line",
        //         "renderAt": "lokasi2",
        //         "width": "500",
        //         "height": "300",
        //         "dataFormat": "jsonurl",
        //         "dataSource": "grafik/db_to_json_progress.php"
        //     }
        //     );
        //     G1.render();
        // }
        // );

        FusionCharts.ready(function () {
            var G1 = new FusionCharts({
                "type": "pie2d",
                "renderAt": "lokasi3",
                "width": "500",
                "height": "300",
                "dataFormat": "jsonurl",
                "dataSource": "assets/vendors/grafik/db_to_json_admin.php"
            }
            )
            G1.render();
        }
        )

    </script>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Pie Chart
                </div>
                <div id="lokasi3">di sini</div>
            </div>
        </div>
        <!-- <div class="col-md-5 col-sm-5 col-xs-5">
            <?php
                $query1 = $this->db->select_sum('ROLE', 'role')->get('admin')->result();
                $rst1 = $query1[0]->role;
                $query2 = $this->db->select_sum('JENKEL', 'jenkel')->get('admin')->result();
                $rst2 = $query2[0]->jenkel;
                $min = (int)$rst1 - (int)$rst2;
            ?>
            <div style="padding-top: 23px; padding-left: 20px">
            <?php echo '<h4>Total User : <b>'.$rst1.'</b></h6>'; ?>
            <?php echo '<h4>User Pria : <b>'.$rst2.'</b></h6>'; ?>
            <?php echo '<h4>User Wanita : <b>'.$min.'</b></h6>'; ?>
            </div>
        </div> -->
                    </div>  
                </div>
            </div>
        </div>
    </div>