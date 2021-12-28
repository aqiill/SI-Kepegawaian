<?php 
   if ($this->session->flashdata('gagal')) { ?>
<div class="alert alert-danger" role="alert">
  <?php echo $this->session->flashdata('gagal'); ?> 
</div>
<?php   }
 ?>

<div class="main-content">
   <section class="section">
      <div class="row">

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmpegawai; ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Sekolah</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmunitkerja; ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-school fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Penghargaan Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmpeng; ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Hukuman Pegawai</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jlmhukuman; ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="row">
         <div class="col-6">
            <div class="card">
                  <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Data Pegawai Pensiun</h6>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-bordered" id="" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th class="text-center">
                                    #
                                 </th>
                                 <th>Nama Pegawai</th>
                                 <th>Unit Kerja</th>
                                 <th>Umur</th>
                                 <th>Detail</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              foreach ($pegawai as $value) {
                                 $tgllahir_pegawai = new DateTime($value->tgllahir_pegawai);
                                 $today = new DateTime("today");

                                 $tahun = $today->diff($tgllahir_pegawai)->y;

                                 if ($tahun >= 58 && $tahun <= 60) { ?>
                                    <tr>
                                       <td><?php echo $no++; ?></td>
                                       <td><?php echo ucwords($value->nama_pegawai); ?></td>
                                       <td><?php echo strtoupper($value->nama_unitkerja); ?></td>
                                       <td><?php echo $tahun; ?></td>
                                       <td><a href="<?php echo base_url('datapegawai/detailpegawai/') . $value->id_pegawai ?>" class="btn btn-outline-info"><i class="fas fa-info"></i></a></td>
                                    </tr>
                              <?php
                                 }
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-6">
               <div class="card">
                  <div class="card-header py-3">
                     <h6 class="m-0 font-weight-bold text-primary">Data KGB</h6>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th class="text-center">
                                    #
                                 </th>
                                 <th>Nama Pegawai</th>
                                 <th>Unit Kerja</th>
                                 <th>Detail</th>
                              </tr>
                           </thead>
                           <tbody>

                              <?php

                              $no = 1;
                              foreach ($kgb as $value) {
                                 $tgl1    = $value->tmt_kgb;
                                 $tgl2    = date('Y-m-d', strtotime('+720 days', strtotime($tgl1)));
                                 $tgl3    = date('Y-m-d', strtotime('+540 days', strtotime($tgl1)));
                                 $today   = date('Y-m-d');


                                 if ($today > $tgl3) { ?>
                                    <tr>
                                       <td><?php echo $no++; ?></td>
                                       <td><?php echo ucwords($value->nama_pegawai); ?></td>
                                       <td><?php echo strtoupper($value->nama_unitkerja); ?></td>
                                       <td><a href="<?php echo base_url('datapegawai/detailpegawai/') . $value->id_pegawai ?>" class="btn btn-outline-info"><i class="fas fa-info"></i></a></td>
                                    </tr>
                              <?php
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
   </section>
</div>