<?php
$this->load->view('layouts/header');
?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper pb-0">
      <div class="page-header flex-wrap">
        <div class="header-right">
          <div class="d-flex align-items-center">
            <h5 class="m-0 pr-3" style="padding:5px">Dashboard </h5>
          </div>
        </div>

        <!-- Import and Export Lead Buttons -->
        <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
          <?php if ($this->session->userdata('user_role') == 'ADMIN') {
          ?>
            <div class="d-flex align-items-center">
              <a href="<?php echo base_url('ImportExport') ?>">
                <button type="button" style="background-color:#eb9008" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                  <i class="mdi mdi mdi-arrow-right-bold-circle " style=" background:#a9711c;"></i> Import bulk lead </button>
              </a>
            </div>
          <?php } ?>
          <a href="<?php echo base_url('home/create_lead') ?>">
            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" style="background-color:#eb9008">
              <i class="mdi mdi-plus-circle" style=" background:#a9711c;"></i> Create a lead </button>
          </a>
        </div>
      </div>

      <!-- Tabs here--->

      <div class="row">
        <div class="col-xl-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">View Leads</h4>
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home-1" role="tab" aria-controls="home" aria-selected="true">Today's List </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="new-tab" data-toggle="tab" href="#new-1" role="tab" aria-controls="new" aria-selected="true">New Opportunity</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " id="convert-tab" data-toggle="tab" href="#convert-1" role="tab" aria-controls="convert" aria-selected="true">Converted</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab" aria-controls="contact" aria-selected="false">Recently Modified</a>
                </li>
              </ul>

              <!--Today's List Tab Start -->
              <div class="tab-content">
                <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id='lead_today' class="table table-striped table-bordered" style="width:100%">
                        </br>
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>company</th>
                            <th>name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (!empty($lead_today)) {
                            foreach ($lead_today as $dashboard) : ?>
                              <tr>
                                <td>
                                  <a class="nav-link" href="<?php echo base_url('home/lead/') ?><?php echo $dashboard->id; ?>">
                                    <?php echo 'DLMS' . $dashboard->id; ?>

                                  </a>
                                </td>

                                <td>
                                  <?php
                                  echo $dashboard->company;
                                  ?>
                                </td>

                                <td>
                                  <?php
                                  echo $dashboard->name;
                                  ?>
                                </td>

                                <td>
                                  <?php
                                  echo $dashboard->phone;
                                  ?>
                                </td>


                                <td>
                                  <?php
                                  echo $dashboard->email;
                                  ?>
                                </td>

                                <td>
                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#TodayModal-<?= $dashboard->id; ?>">Remark</button>
                                  <!-- Remark Modal -->
                                  <div class="modal fade" id="TodayModal-<?= $dashboard->id; ?>" tabindex="-1" role="dialog" aria-labelledby="TodayModal-<?= $dashboard->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content" style="padding: 10px;">
                                        <form action="<?php echo base_url(); ?>home/add_remark/<?php echo $dashboard->id; ?>" method="post">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="TodayModal-<?= $dashboard->id; ?>"> Add Remark</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="col-xl-12 justify-content-center">
                                            <div class="form-group">
                                              <input class="form-control" type="hidden" name="lead_id" value="<?php echo $dashboard->id; ?>">
                                            </div>
                                            <div class="row">
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label" required>
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Call">Call</label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Email">Email</label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Message">Message</label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <hr />
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Date</label>
                                                <input class="form-control" type="date" name="follow_up_date" value="<?php echo date('Y-m-d'); ?>" required>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Time</label>
                                                <input class="form-control" type="time" name="follow_up_time" value="<?php echo date('H:i'); ?>" required>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Lead Status</label>

                                            <select class="form-control" name="lead_status" required>
                                              <option value="">--- Select ----</option>

                                              <?php foreach ($lead_status as $employees) : ?>
                                                <option value="<?php echo $employees->id; ?>">
                                                  <?php
                                                  echo $employees->name;
                                                  ?>
                                                </option>
                                              <?php endforeach ?>

                                            </select>

                                          </div>

                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Remark</label>
                                            <div class="col-sm-13">
                                              <textarea type="text" name="remark" placeholder="Type Here...." class="form-control" required></textarea>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" name="insert" value="Submit " class="btn btn-primary">
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Add Remark Modal End  -->


                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#TodayLastRemark-<?= $dashboard->id; ?>">Last Remark</button>
                                  <!-- Last Remark Modal Start -->
                                  <div class="modal fade" id="TodayLastRemark-<?= $dashboard->id; ?>" tabindex="-1" role="dialog" aria-labelledby="TodayLastRemarkLabel-<?= $dashboard->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="TodayLastRemark-<?= $dashboard->id; ?>"> Last Remark</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="col-xl-12 justify-content-center">
                                          <br />
                                          <form class="form-group">
                                            <div class="form-check form-check-flat form-check-primary ">
                                              <?php
                                              if ($dashboard->remark == true) { ?>
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <p style="color: red;"><strong style="font-size: 15px; color: #114ba3;"> Lead Id:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo 'DLMS' . $dashboard->id;
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Date:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $date = $dashboard->follow_up_date;
                                                      echo date("d F, Y", strtotime($date));
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Time:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $myTime = $dashboard->follow_up_time;
                                                      echo date('g:i A ', strtotime($myTime));
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Follow Up:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $dashboard->follow_up;
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Lead Status:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $dashboard->status_name;
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <p class="remark" style="white-space: initial;"><strong style="font-size: 18px; color: #114ba3;"> Remark:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $dashboard->remark;
                                                      ?>
                                                    </p>
                                                  </div>
                                                <?php
                                              } else {
                                                echo "There have no remarks";
                                              }
                                                ?>

                                                <hr />
                                                </div>

                                                <!-- Last Remark Modal End  -->

                                            </div>
                                            <div class="modal-footer" style="padding-bottom: 0px;">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>


                            <?php endforeach;
                          } else {
                            ?>
                            <td>
                            <?php
                            echo "There have no data...!";
                          } ?>
                            </td>
                        </tbody>
                      </table>
                    </div>
                   

                    <a class="text-black d-block pl-4 pt-2 pb-2 pb-lg-0 font-13 font-weight-bold" href="<?php echo base_url(); ?>Home/lead_list/">Show more</a>
                  </div>
                </div>
                 <!--Today's List Tab  End  -->

                <!---Opportunity Leads Tab Start --->
                <div class="tab-pane fade show " id="new-1" role="tabpanel" aria-labelledby="new-tab">
                  <div class="card-body p-0">
                    <div class="table-responsive">

                      <table id='lead_opportunity' class="table table-striped table-bordered" style="width:100%">
                        </br>

                        <thead>

                          <tr>
                            <th>ID</th>
                            <th>company</th>
                            <th>name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>Remark</th>
                          </tr>

                        </thead>
                        <tbody>
                          <?php


                          if (!empty($lead_Opportunity)) {

                            foreach ($lead_Opportunity as $Opportunity) : ?>

                              <tr>

                                <td>
                                  <a class="nav-link" href="<?php echo base_url('home/lead/') ?><?php echo $Opportunity->id; ?>">
                                    <?php echo 'DLMS' . $Opportunity->id; ?>
                                  </a>
                                </td>

                                <td>
                                  <?php
                                  echo $Opportunity->company;
                                  ?>
                                </td>


                                <td>
                                  <?php
                                  echo $Opportunity->name;
                                  ?>
                                </td>

                                <td>
                                  <?php
                                  echo $Opportunity->phone;
                                  ?>
                                </td>



                                <td>
                                  <?php
                                  echo $Opportunity->email;
                                  ?>
                                </td>


                                <td>

                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#OpportunityModal-<?= $Opportunity->id; ?>">Remark</button>
                                  <!--Add  Remark Modal -->

                                  <div class="modal fade" id="OpportunityModal-<?= $Opportunity->id; ?>" tabindex="-1" role="dialog" aria-labelledby="OpportunityModal-<?= $Opportunity->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content" style="padding: 10px;">
                                        <form action="<?php echo base_url(); ?>home/add_remark/<?php echo $Opportunity->id; ?>" method="post">

                                          <div class="modal-header">
                                            <h5 class="modal-title" id="OpportunityModal-<?= $Opportunity->id; ?>"> Add Remark</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>

                                          <div class="col-xl-12 justify-content-center">


                                            <div class="form-group">
                                              <input class="form-control" type="hidden" name="lead_id" value="<?php echo $Opportunity->id; ?>">
                                            </div>

                                            <div class="row">
                                              <div class="col-md-3">

                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label" required>
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Call">Call</label>
                                                </div>
                                              </div>

                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Email">Email</label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Message">Message</label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <hr />

                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Date</label>
                                                <input class="form-control" type="date" name="follow_up_date" value="<?php echo date('Y-m-d'); ?>" required>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Time</label>
                                                <input class="form-control" type="time" name="follow_up_time" value="<?php echo date('H:i'); ?>" required>
                                              </div>
                                            </div>
                                          </div>



                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Lead Status</label>

                                            <select class="form-control" name="lead_status" required>
                                              <option value="">--- Select ----</option>

                                              <?php foreach ($lead_status as $employees) : ?>
                                                <option value="<?php echo $employees->id; ?>">
                                                  <?php
                                                  echo $employees->name;
                                                  ?>
                                                </option>
                                              <?php endforeach ?>

                                            </select>

                                          </div>


                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Remark</label>
                                            <div class="col-sm-13">
                                              <textarea type="text" name="remark" placeholder="Type Here...." class="form-control" required></textarea>
                                            </div>
                                          </div>

                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" name="insert" value="Submit " class="btn btn-primary">
                                          </div>

                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!--Add  Remark Modal End -->


                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#OpportunityLastRemark-<?= $Opportunity->id; ?>">Last Remark</button>
                                  <!-- Last Remark Modal Start -->
                                  <div class="modal fade" id="OpportunityLastRemark-<?= $Opportunity->id; ?>" tabindex="-1" role="dialog" aria-labelledby="OpportunityLastRemarkLabel-<?= $Opportunity->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">

                                        <div class="modal-header">
                                          <h5 class="modal-title" id="OpportunityLastRemark-<?= $Opportunity->id; ?>"> Last Remark</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>



                                        <div class="col-xl-12 justify-content-center">
                                          <br />
                                          <form class="form-group">
                                            <div class="form-check form-check-flat form-check-primary ">
                                              <?php
                                              if ($Opportunity->remark == true) { ?>

                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <p style="color: red;"><strong style="font-size: 15px; color: #114ba3;"> Lead Id:</strong>&nbsp;&nbsp;

                                                      <?php
                                                      echo 'DLMS' . $Opportunity->id;
                                                      ?>
                                                    </p>
                                                  </div>



                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Date:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $date = $Opportunity->follow_up_date;
                                                      echo date("d F, Y", strtotime($date));
                                                      ?>
                                                    </p>
                                                  </div>


                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Time:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $myTime = $Opportunity->follow_up_time;
                                                      echo date('g:i A ', strtotime($myTime));
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Follow Up:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $Opportunity->follow_up;
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Lead Status:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $Opportunity->status_name;
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <p class="remark" style="white-space: initial;"><strong style="font-size: 18px; color: #114ba3;"> Remark:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $Opportunity->remark;
                                                      ?>
                                                    </p>
                                                  </div>

                                                <?php
                                              } else {
                                                echo "There have no data";
                                              } ?>

                                                <hr />
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="padding-bottom: 0px;">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>

                                          </form>
                                        </div>


                                      </div>
                                    </div>
                                  </div>

                                  <!-- Last Remark Modal End  -->

                                </td>
                              </tr>
                            <?php endforeach;
                          } else {
                            ?>
                            <td>
                            <?php
                            echo "There have no data...!";
                          } ?>
                            </td>
                        </tbody>
                      </table>

                    </div>
                    <a class="text-black d-block pl-4 pt-2 pb-2 pb-lg-0 font-13 font-weight-bold" href="<?php echo base_url(); ?>Home/lead_list/">Show more</a>
                  </div>
                </div>
                <!---Opportunity Leads Tab End --->

                <!---Converted Leads  Tab  Start --->
                <div class="tab-pane fade show " id="convert-1" role="tabpanel" aria-labelledby="convert-tab">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id='lead_convert' class="table table-striped table-bordered" style="width:100%">
                        </br>

                        <thead>

                          <tr>
                            <th>ID</th>
                            <th>company</th>
                            <th>name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>Remark</th>
                          </tr>

                        </thead>
                        <tbody>

                          <?php

                          if (!empty($lead_Convert)) {

                            foreach ($lead_Convert as $convert) : ?>

                              <tr>

                                <td>
                                  <a class="nav-link" href="<?php echo base_url('home/lead/') ?><?php echo $convert->id; ?>">
                                    <?php echo 'DLMS' . $convert->id; ?>
                                  </a>
                                </td>

                                <td>
                                  <?php
                                  echo $convert->company;
                                  ?>
                                </td>


                                <td>
                                  <?php
                                  echo $convert->name;
                                  ?>
                                </td>

                                <td>
                                  <?php
                                  echo $convert->phone;
                                  ?>
                                </td>



                                <td>
                                  <?php
                                  echo $convert->email;
                                  ?>
                                </td>


                                <td>
                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#ConvertModal-<?= $convert->id; ?>">Remark</button>

                                  <!--Add Remark Modal Start -->
                                  <div class="modal fade" id="ConvertModal-<?= $convert->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ConvertModal-<?= $convert->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content" style="padding: 10px;">
                                        <form action="<?php echo base_url(); ?>home/add_remark/<?php echo $convert->id; ?>" method="post">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="ConvertModal-<?= $convert->id; ?>"> Add Remark</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>

                                          <div class="col-xl-12 justify-content-center">


                                            <div class="form-group">
                                              <input class="form-control" type="hidden" name="lead_id" value="<?php echo $convert->id; ?>">
                                            </div>

                                            <div class="row">
                                              <div class="col-md-3">

                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label" required>
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Call">Call</label>
                                                </div>
                                              </div>

                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Email">Email</label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Message">Message</label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>

                                          <hr />

                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Date</label>
                                                <input class="form-control" type="date" name="follow_up_date" value="<?php echo date('Y-m-d'); ?>" required>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Time</label>
                                                <input class="form-control" type="time" name="follow_up_time" value="<?php echo date('H:i'); ?>" required>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Lead Status</label>

                                            <select class="form-control" name="lead_status" required>
                                              <option value="">--- Select ----</option>

                                              <?php foreach ($lead_status as $employees) : ?>
                                                <option value="<?php echo $employees->id; ?>">
                                                  <?php
                                                  echo $employees->name;
                                                  ?>
                                                </option>
                                              <?php endforeach ?>
                                            </select>
                                          </div>

                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Remark</label>
                                            <div class="col-sm-13">
                                              <textarea type="text" name="remark" placeholder="Type Here...." class="form-control" required></textarea>
                                            </div>
                                          </div>

                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" name="insert" value="Submit " class="btn btn-primary">
                                          </div>

                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!--Add Remark Modal End -->



                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#convertLastRemark-<?= $convert->id; ?>">Last Remark</button>
                                  <!-- Last Remark Modal Start -->
                                  <div class="modal fade" id="convertLastRemark-<?= $convert->id; ?>" tabindex="-1" role="dialog" aria-labelledby="convertLastRemarkLabel-<?= $convert->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">

                                        <div class="modal-header">
                                          <h5 class="modal-title" id="convertLastRemark-<?= $convert->id; ?>"> Last Remark</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="col-xl-12 justify-content-center">
                                          <br />
                                          <form class="form-group">
                                            <div class="form-check form-check-flat form-check-primary ">
                                              <?php
                                              if ($convert->remark == true) { ?>

                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <p style="color: red;"><strong style="font-size: 15px; color: #114ba3;"> Lead Id:</strong>&nbsp;&nbsp;

                                                      <?php
                                                      echo 'DLMS' . $convert->id;
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Date:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $date = $convert->follow_up_date;
                                                      echo date("d F, Y", strtotime($date));
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Time:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $myTime = $convert->follow_up_time;
                                                      echo date('g:i A ', strtotime($myTime));
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Follow Up:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $convert->follow_up;
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Lead Status:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $convert->status_name;
                                                      ?>
                                                    </p>
                                                  </div>

                                                  <div class="col-md-12">
                                                    <p class="remark" style="white-space: initial;"><strong style="font-size: 18px; color: #114ba3;"> Remark:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $convert->remark;
                                                      ?>
                                                    </p>
                                                  </div>

                                                <?php
                                              } else {
                                                echo "There have no data";
                                              }
                                                ?>
                                                <hr />
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="padding-bottom: 0px;">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>

                                          </form>
                                        </div>


                                      </div>
                                    </div>
                                  </div>

                                  <!-- Last Remark Modal End -->

                                </td>
                              </tr>
                            <?php endforeach;
                          } else {
                            ?>
                            <td>
                            <?php
                            echo "There have no data...!";
                          } ?>
                            </td>
                        </tbody>
                      </table>
                    </div>
                    <a class="text-black d-block pl-4 pt-2 pb-2 pb-lg-0 font-13 font-weight-bold" href="<?php echo base_url(); ?>Home/lead_list/">Show more</a>
                  </div>
                </div>
                <!---Converted Leads Tab  End  --->


                <!---Recently modified Leads Start --->
                <div class="tab-pane fade show " id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id='lead_recently' class="table table-striped table-bordered" style="width:100%">
                        </br>
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>company</th>
                            <th>name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>Remark</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (!empty($lead_recently)) {
                            foreach ($lead_recently as $recently) : ?>
                              <tr>
                                <td>
                                  <a class="nav-link" href="<?php echo base_url('home/lead/') ?><?php echo $recently->id; ?>">
                                    <?php echo 'DLMS' . $recently->id; ?>
                                  </a>
                                </td>

                                <td>
                                  <?php
                                  echo $recently->company;
                                  ?>
                                </td>

                                <td>
                                  <?php
                                  echo $recently->name;
                                  ?>
                                </td>

                                <td>
                                  <?php
                                  echo $recently->phone;
                                  ?>
                                </td>

                                <td>
                                  <?php
                                  echo $recently->email;
                                  ?>
                                </td>

                                <td>
                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#recentlyModal-<?= $recently->id; ?>">Remark</button>
                                  <!-- button Add  Remark Modal -->
                                  <div class="modal fade" id="recentlyModal-<?= $recently->id; ?>" tabindex="-1" role="dialog" aria-labelledby="recentlyModal-<?= $recently->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content" style="padding: 10px;">
                                        <form action="<?php echo base_url(); ?>home/add_remark/<?php echo $recently->id; ?>" method="post">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="recentlyModal-<?= $recently->id; ?>"> Add Remark</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="col-xl-12 justify-content-center">
                                            <div class="form-group">
                                              <input class="form-control" type="hidden" name="lead_id" value="<?php echo $recently->id; ?>">
                                            </div>
                                            <div class="row">
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label" required>
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Call">Call</label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Email">Email</label>
                                                </div>
                                              </div>
                                              <div class="col-md-3">
                                                <div class="form-check form-check-flat form-check-primary ">
                                                  <label class="form-check-label">
                                                    <input type="checkbox" name="follow_up[]" class="form-check-input" value="Message">Message</label>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <hr />
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Date</label>
                                                <input class="form-control" type="date" name="follow_up_date" value="<?php echo date('Y-m-d'); ?>" required>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Time</label>
                                                <input class="form-control" type="time" name="follow_up_time" value="<?php echo date('H:i'); ?>" required>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Lead Status</label>
                                            <select class="form-control" name="lead_status" required>
                                              <option value="">--- Select ----</option>
                                              <?php foreach ($lead_status as $employees) : ?>
                                                <option value="<?php echo $employees->id; ?>">
                                                  <?php
                                                  echo $employees->name;
                                                  ?>
                                                </option>
                                              <?php endforeach ?>
                                            </select>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-sm-3 col-form-label">Remark</label>
                                            <div class="col-sm-13">
                                              <textarea type="text" name="remark" placeholder="Type Here...." class="form-control" required></textarea>
                                            </div>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <input type="submit" name="insert" value="Submit " class="btn btn-primary">
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Add Remark Modal End   -->


                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#recentlyLastRemark-<?= $recently->id; ?>">Last Remark</button>
                                  <!-- Button  Last Remark Modal Start -->
                                  <div class="modal fade" id="recentlyLastRemark-<?= $recently->id; ?>" tabindex="-1" role="dialog" aria-labelledby="recentlyLastRemarkLabel-<?= $recently->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="recentlyLastRemark-<?= $recently->id; ?>"> Last Remark</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="col-xl-12 justify-content-center">
                                          <br />
                                          <form class="form-group">
                                            <div class="form-check form-check-flat form-check-primary ">
                                              <?php
                                              if ($recently->remark == true) { ?>
                                                <div class="row">
                                                  <div class="col-md-12">
                                                    <p style="color: red;"><strong style="font-size: 15px; color: #114ba3;"> Lead Id:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo 'DLMS' . $recently->id;
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Date:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $date = $recently->follow_up_date;
                                                      echo date("d F, Y", strtotime($date));
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Time:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      $myTime = $recently->follow_up_time;
                                                      echo date('g:i A ', strtotime($myTime));
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Follow Up:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $recently->follow_up;
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <p><strong style="font-size: 15px; color: #114ba3;"> Lead Status:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $recently->status_name;
                                                      ?>
                                                    </p>
                                                  </div>
                                                  <div class="col-md-12">
                                                    <p class="remark" style="white-space: initial;"><strong style="font-size: 18px; color: #114ba3;"> Remark:</strong>&nbsp;&nbsp;
                                                      <?php
                                                      echo $recently->remark;
                                                      ?>
                                                    </p>
                                                  </div>
                                                <?php
                                              } else {
                                                echo "There have no data";
                                              }
                                                ?>
                                                <hr />
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="padding-bottom: 0px;">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!--Last Remark Modal End   -->
                                </td>
                              </tr>
                            <?php endforeach;
                          } else {
                            ?>
                            <td>
                            <?php
                            echo "There have no data...!";
                          } ?>
                            </td>
                        </tbody>
                      </table>
                    </div>
                    <a class="text-black d-block pl-4 pt-2 pb-2 pb-lg-0 font-13 font-weight-bold" href="<?php echo base_url(); ?>Home/lead_list/">Show more</a>
                  </div>
                </div>
                <!---Recently modified Leads  Tab End --->


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Last Remark Modal  data Start -->
<div class="modal fade" id="appModal" tabindex="-1" role="dialog" aria-labelledby="NotificationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 750px;">
    <div class="modal-content" style="padding: 20px;">
      <div class="modal-header">
        <h5 class="modal-title" id="Notification">Daily Notification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <br />
      <div class="card-body p-0">
        <div class="table-responsive">

          <table class="table table-striped table-bordered">

            <thead>
              <tr>
                <th> Lead Id</th>
                <th>Date</th>
                <th>Time</th>
                <th>Follow Up</th>

              </tr>
            </thead>
            <tbody>
              <?php
              if (!empty($remark_date)) {
                foreach ($remark_date as $remark) : ?>
                  <tr>
                    <td>
                      <a class="nav-link" href="<?php echo base_url('home/lead/') ?><?php echo $remark->lead_id; ?>">

                        <p style="color: red;">
                          <?php
                          echo 'DLMS' . $remark->lead_id;
                          ?>
                        </p>
                      </a>
                    </td>
                    <td>
                      <p style="font-size: 15px; color: #114ba3;">

                        <?php
                        $date = $remark->follow_up_date;
                        echo date("d F, Y", strtotime($date));
                        ?>
                      </p>
                    </td>
                    <td>
                      <p style="font-size: 15px; color: #114ba3;">

                        <?php
                        $myTime = $remark->follow_up_time;
                        echo date('g:i A ', strtotime($myTime));
                        ?>
                      </p>
                    </td>
                    <td>
                      <p style="font-size: 15px; color: #114ba3;">

                        <?php
                        echo $remark->follow_up;
                        ?>
                      </p>
                    </td>

                  </tr>
              <?php endforeach;
              } else {
                echo "There have no data";
              } ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer   -->
<?php
$this->load->view('layouts/footer');
?>
<?php

if ($this->session->has_userdata('daily_notify') == FALSE) {
?>
  <script type="text/javascript">
    $(document).ready(function() {

      $.ajax({
        url: '<?= site_url('home/daily_notify'); ?>',
        type: 'POST',
        data: {},
        error: function() {
          // alert('Something is wrong');
        },
        success: function(data) {
          //alert("successfully");  
          $("#appModal").modal();
        }
      });

    });
  </script>
<?php
} ?>


<script>
  $(document).ready(function() {
    $('#lead_today').dataTable({
      "aaSorting": []
    });
  })
</script>

<script>
  $(document).ready(function() {
    $('#lead_opportunity').dataTable({
      "aaSorting": []
    });
  })
</script>

<script>
  $(document).ready(function() {
    $('#lead_convert').dataTable({
      "aaSorting": []
    });
  })
</script>


<script>
  $(document).ready(function() {
    $('#lead_recently').dataTable({
      "aaSorting": []
    });
  })
</script>