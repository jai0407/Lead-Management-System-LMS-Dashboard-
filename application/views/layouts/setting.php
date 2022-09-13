<?php
$this->load->view('layouts/header');
?>

<br />



<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper pb-0">
      <div class="page-header flex-wrap">

        <div class="header-left">
          <div class="d-flex align-items-left">
         
          </div>
        </div>
        <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
          <div class="d-flex align-items-center">
          
          </div>
            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" style="background-color:#eb9008"  data-toggle="modal" data-target="#exampleModal">
              <i class="mdi mdi-plus-circle"  style=" background:#a9711c;"></i> Add lead status </button>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-12 grid-margin stretch-card ">
          <div class="card">
            <div class="card-body">


              <?php
              if ($this->session->flashdata('success')) :
              ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <?php

                  echo ($this->session->flashdata('success')); ?>

                </div>
              <?php endif; ?>

              <h3 class="card-title" style=" margin-left:2%"> Lead Status</h3>

              <hr />

              <div class="table-responsive">

                <table id='order-listing' class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>S.no</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>

                  </thead>

                  <tbody>
                    <?php foreach ($lead_status as $sno => $employees) : ?>

                      <tr>

                        <td>
                          <?php

                          echo $sno = $sno + 1;
                          ?>

                        </td>

                        <td>
                          <?php
                          echo $employees->name;
                          ?>
                        </td>

                        <td>
                          <?php
                          $val = $employees->is_active;
                          if ($val == '1') {
                            echo "Active";
                          } else {
                            echo "In-Active";
                          }
                          //echo $employees->is_active;
                          ?>
                        </td>

                        <td>
                          <?php
                          $date = $employees->created_at;
                          echo date("d F, Y", strtotime($date));
                          ?>
                        </td>

                        <td>

                          <?php
                          if (($sno !== 1) && ($sno !== 2)) {
                          ?>
                            <button type="button" class="btn btn-#eb9008 editbtn"  style=" background:#eb9008;color:#ffffff" data-toggle="modal" data-target="#exampleModal-<?= $employees->id; ?>">Edit</button>
                          <?php
                          }
                          ?>

                          <!--Edit  Modal starts -->

                          <div class="modal fade" id="exampleModal-<?= $employees->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-<?= $employees->id; ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel-<?= $employees->id; ?>">Edit lead Status</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="col-xl-12 justify-content-center">

                                  <form action="<?php echo base_url(); ?>home/update/<?= $employees->id; ?>" method="POST">
                                    <!-- <input type="hodden" name="update_id" id="update_id"> -->
                                    <div class="form-group">
                                      <label class="col-sm-3 col-form-label">Status title</label>
                                      <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="<?= $employees->name; ?>" required>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-sm-3 col-form-label">Status</label>
                                      <div class="col-sm-12">
                                        <select class="form-control" name="status" id="status" required>
                                          <option value="Active" <?php if ('1' == $employees->is_active) {
                                                                    echo 'selected';
                                                                  }
                                                                  ?>>Active </option>
                                          <option value="In-Active" <?php if ('0' == $employees->is_active) {
                                                                      echo 'selected';
                                                                    }
                                                                    ?>>In-Active </option>
                                        </select>
                                      </div>
                                    </div>



                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <input type="submit" name="update" value="Update " class="btn btn-info">
                                    </div>

                                  </form>
                                </div>



                              </div>
                            </div>
                          </div>
                          <!-- Modal Ends -->
                        </td>
                      </tr>



                    <?php endforeach ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>





        <!-- Add Status Modal starts -->



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="col-xl-12 justify-content-center">
                <br />
                <form action="<?php echo base_url(); ?>home/addLeadToDB" method="POST">
                  <div class="form-group">
                    <label for="name">Status title</label>
                    <input type="text" name="name" placeholder="name" class="form-control" required>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="insert" value="Add Status " class="btn btn-info">
              </div>
              </form>
            </div>

          </div>



        </div>

      </div>


    </div>
  </div>
</div>


<?php

$this->load->view('layouts/footer');

?>