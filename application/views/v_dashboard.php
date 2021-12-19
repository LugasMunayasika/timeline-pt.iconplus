<div class="row">
    <div class="page-title" style="padding: 8px">
        <div class="title_left">
            <h1><i class="fa fa-dashboard"></i>  Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                <div class="col-md-12 col-sm-12 col-xs-12 ">
                    <div class="x_panel">
                     <div class="col-md-6 col-sm-6 col-xs-6" id="lokasi3">di sini</div>
                     <div class="col-md-6 col-sm-6 col-xs-6" id="lokasi2">di sini</div>
                    </div>
                     
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">   
      <div class="col-md-12 col-lg-12">
         <div id="tracking-pre"></div>
         <div id="tracking">
            <div class="text-center tracking-status-intransit">
               <p class="tracking-status text-tight">Data Proyek PT Icon Plus</p>
            </div>
           
            <div class="tracking-list">
            <?php foreach ($list as $monitoringList) : ?>
               <div class="tracking-item">
                  <div class="tracking-icon status-intransit">
                     <svg class="svg-inline--fa fa-circle fa-w-16" width="20" height="20">
                     <text style="font-size:8px" x="60%" y="100%" text-anchor="middle"><?php echo $monitoringList->PROGRES ?>%</text>
                    </svg>
                     <!-- <i class="fas fa-circle"></i> -->
                  </div>
                  <div style="font-size:12px" class="tracking-date"><?php echo $monitoringList->TGL_AWAL ?><span style="font-size:12px"><?php echo $monitoringList->TGL_AKHIR ?></span></div>
                  <div style="font-size:15px" class="tracking-content"><?php echo $monitoringList->NAMA_PROGRAM ?><span style="font-size:12px"><?php echo $monitoringList->NAMA_PROYEK ?></span></div>
               </div>
               <?php endforeach;?>
         </div>
        
      </div>
   </div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/highcharts.js"></script>


