<?php
$this->load->view('layouts/header');
?>




<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper pb-0">
      <div class="page-header flex-wrap">
        <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
          <div class="d-flex align-items-center">
            <div class="header-left">
              <div class="d-flex align-items-left">
                <h5 class="m-0 pr-3" style="padding:5px">Dashboard </h5>

                <!-- Import and Export Lead Buttons -->
                <a href="<?php echo base_url('ImportExport') ?>">
                  <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" style="background-color:#eb9008">
                    <i class="mdi mdi-arrow-right-bold-circle" style=" background:#a9711c;"></i>Import bulk lead </button> </a>
              </div>
            </div>
          </div>
        </div>

        <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
          <div class="d-flex align-items-center">
            <div class="header-right">
            </div>
          </div>
          <a href="<?php echo base_url('home/create_lead') ?>">
            <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" style="background-color:#eb9008">
              <i class="mdi mdi-plus-circle" style=" background:#a9711c;"></i> Create a lead </button>
          </a>
        </div>
      </div>

      <br />

      <!---- Sessions for success and error notificatin start-->
      <?php
      if ($this->session->flashdata('success')) :
      ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php

          echo ($this->session->flashdata('success')); ?>

        </div>
      <?php endif; ?>

      <!---- Session call end -->

      <!----Lead details Table start-->
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card1">
            <div class="card-body">
              <h4 class="card-title" style="text-align:center">Lead Information</h4>

              <hr /><br />
              <div class="row">
                <div class="col-md-6">
                  <p><strong>Lead ID:</strong> &nbsp;&nbsp;
                    <?php
                    echo  'DLMS' . $lead->id;
                    ?>
                  </p>
                </div>

                <div class="col-md-6 ">
                  <p><strong>Created Date:</strong>&nbsp;&nbsp;
                    <?php
                    $date = $lead->created_at;
                    echo date("d F, Y", strtotime($date));
                    ?></p>
                </div>


                <div class="col-md-6 ">
                  <p><strong>Lead Source:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->lead_source;
                    ?></p>
                </div>


                <div class="col-md-6 ">
                  <p><strong> Date:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->date_of_inquiry;
                    ?></p>
                </div>


                <div class="col-md-6 ">
                  <p><strong>Lead Status:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->s_name;
                    ?></p>
                </div>



                <div class="col-md-6 ">
                  <p><strong> Updated Date:</strong>&nbsp;&nbsp;
                    <?php
                    $date = $lead->updated_at;
                    echo date("d F, Y", strtotime($date));

                    ?></p>
                </div>

                <!----Remark Follow date and time  start-->
                <?php
                if (!empty($lead_remarks)) {
                  $lead_remarks ?>

                  <div class="col-md-6 ">
                    <p><strong> Follow up Date:</strong>&nbsp;&nbsp;
                      <?php
                      $date = $lead_remarks[0]->follow_up_date;
                      echo date("d-M-Y", strtotime($date));
                      ?>
                    </p>
                  </div>

                  <div class="col-md-6 ">
                    <p><strong> Follow Up Time:</strong>&nbsp;&nbsp;
                      <?php
                      $myTime = $lead_remarks[0]->follow_up_time;
                      echo date('g:i A ', strtotime($myTime));
                      ?>
                    </p>
                  </div>
                <?php
                } else {
                  echo "There have no remarks";
                } ?>
                <!---- Remark End -->
              </div>

            </div>
          </div>
        </div>

        <!----Contact Information  start-->
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card1">
            <div class="card-body">
              <h4 class="card-title" style="text-align:center">Contact Information</h4>


              <hr />

              <div class="row">


                <div class="col-md-6 ">
                  <p><strong> Name:</strong>&nbsp;&nbsp;
                    <?php

                    echo $lead->name;

                    ?></p>
                </div>


                <div class="col-md-6 ">
                  <p><strong> Phone:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->phone;

                    ?></p>
                </div>

                <div class="col-md-6 ">
                  <p><strong> City:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->city;

                    ?></p>
                </div>
                <div class="col-md-6 ">
                  <p><strong>Company:</strong>&nbsp;&nbsp;
                    <?php echo $lead->company; ?>
                  </p>
                </div>

                <div class="col-md-12 ">
                  <p><strong> Website:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->website;
                    ?></p>
                </div>

                <div class="col-md-12 ">
                  <p><strong>Email:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->email;

                    ?></p>
                </div>


                <div class="col-md-12 ">
                  <p><strong> Address:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->address;

                    ?></p>
                </div>
              </div>

              <!----Contact Information  End-->
              <br />


              <!----Additional Information  start-->
              <h4 class="card-title" style="text-align:center">Additional Information</h4>

              <hr />
              <div class="row">
                <div class="col-md-12 ">
                  <p><strong>Official Email Id :</strong>&nbsp;&nbsp;
                    <?php
                    echo  $lead->official_email_id;

                    ?></p>
                </div>

                <div class="col-md-12 ">
                  <p><strong> Description:</strong>&nbsp;&nbsp;
                    <?php
                    echo $lead->description;
                    ?></p>
                </div>

                <!----Information  start-->
              </div>
            </div>
          </div>
        </div>

      </div>
      <!---End Partials--->

      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- <h4 class="card-title">Lead</h4>
            <p class="card-description">Basic nav pills</p> -->
            <ul class="nav nav-pills nav-pills-success" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Lead Remarks</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Lead Tasks</a>
              </li>
              <!-- <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                      </li> -->
            </ul>

            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <br />
                <!------- Remark modal  Start ------->
                <div class="col-xl-12 grid-margin stretch-card">
                  <div class="card ol-xl-12 ">

                    <div class="card-body">
                      <div class="text-right">
                        <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#exampleModal-5"> + Add Remark</button>
                      </div>

                      <div class="row">
                        <div class="modal fade" id="exampleModal-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-5" aria-hidden="true">

                          <div class="modal-dialog" role="document">

                            <div class="modal-content" style="padding: 10px;">

                              <form action="<?php echo base_url(); ?>home/add_remark/<?php echo $lead->id; ?>" method="post">

                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel-5"> Add Remark</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                                <div class="col-xl-12 justify-content-center">


                                  <div class="form-group">
                                    <input class="form-control" type="hidden" name="lead_id" value="<?php echo $lead->id; ?>">
                                  </div>


                                  <div class="row">
                                    <div class="col-md-3">

                                      <div class="form-check form-check-flat form-check-primary ">
                                        <label class="form-check-label">
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
                                  <textarea type="text" name="remark" placeholder="Type Here...." class="form-control"></textarea>

                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="submit" name="insert" value="Submit" class="btn btn-primary">
                                </div>

                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <h4 class="card-title">Remark Lists</h4>

                      <!-- Remark Lists  data Start  -->

                      <?php

                      if (!empty($lead_remarks)) {

                        foreach ($lead_remarks as $lead) :

                      ?>
                          <div class="card card-inverse-secondary mb-5">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-4 ">
                                  <p><strong> Lead Id:</strong>&nbsp;&nbsp;
                                    <?php
                                    echo 'DLMS' . $lead->lead_id;
                                    ?>
                                  </p>
                                </div>


                                <div class="col-md-4 ">
                                  <p><strong> Date:</strong>&nbsp;&nbsp;
                                    <?php
                                    $date = $lead->follow_up_date;
                                    echo date("d F, Y", strtotime($date));
                                    ?>
                                  </p>
                                </div>

                                <div class="col-md-4 ">
                                  <p><strong> Time:</strong>&nbsp;&nbsp;
                                    <?php
                                    $myTime = $lead->follow_up_time;
                                    echo date('g:i A ', strtotime($myTime));
                                    ?>
                                  </p>
                                </div>
                              </div>



                              <p><strong> Follow Up:</strong>&nbsp;&nbsp;

                                <?php
                                echo $lead->follow_up;
                                ?>




                              <p><strong> Remark:</strong>&nbsp;&nbsp;
                                <?php
                                echo $lead->remark;
                                ?>
                              </p>

                              <!-- <button class="btn btn-success mb-0 mb-xl-0">Edit</button> -->
                              <a href="<?php echo base_url(); ?>home/deleteRemark/<?php echo $lead->id; ?>/<?php echo $lead->lead_id; ?>">
                                <button type="submit" name="delete" value="Delete" onclick="return confirmDelete();" class="btn btn-#eb9008" style=" background:#eb9008;color:#ffffff" onclick="return confirmDelete();">Delete
                                </button></a>

                              <script type="text/javascript">
                                function confirmDelete() {
                                  return confirm('Are you sure you want to delete this Remark?');
                                }
                              </script>
                              <hr />
                            </div>
                          </div>


                      <?php endforeach;
                      } else {
                        echo "There have no remarks";
                      }

                      ?>


                    </div>
                  </div>
                </div>
              </div>

              <!------- Remark modal  End ------->


              <!--- Task modal Start-->
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <br />
                <div class="col-xl-12 grid-margin stretch-card">
                  <div class="card ol-xl-12 ">

                    <div class="card-body">
                      <div class="text-right">
                        <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#TaskModel-1"> + Add Task</button>
                      </div>

                      <div class="row">
                        <div class="modal fade" id="TaskModel-1" tabindex="TaskModel-1" role="dialog" aria-labelledby="TaskModel-1" aria-hidden="true">

                          <div class="modal-dialog" role="document">

                            <div class="modal-content" style="padding: 10px;">

                              <form action="<?php echo base_url(); ?>home/add_task/<?php echo $lead->lead_id; ?>" method="POST" class="form-sample" id="TaskModel-1">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="TaskModel-1"> Add Task</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>

                                <div class="col-xl-12 justify-content-center">

                                  <div class="form-group">
                                    <input class="form-control" type="hidden" name="lead_id" value="<?php echo $lead->lead_id; ?>">
                                  </div>

                                  <br />
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="col-sm-6 col-form-label">Start Date</label>
                                        <input class="form-control" type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" required>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="col-sm-6 col-form-label">End Date</label>
                                        <input class="form-control" type="date" name="end_date" value="<?php date('Y-m-d'); ?>" required>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="col-sm-12 col-form-label">Task Name</label>
                                        <input class="form-control" type="text" name="task_name" placeholder="Enter Task Name" required>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="col-sm-12 col-form-label">Task Description</label>
                                        <textarea type="text" name="notes" placeholder="Type Here...." class="form-control"></textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <input type="submit" name="insert" value="Submit" class="btn btn-primary">
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <h4 class="card-title">Tasks Lists</h4>



                      <?php
                      if (!empty($lead_tasks)) {

                        foreach ($lead_tasks as $task) :

                      ?>
                          <div class="card card-inverse-secondary mb-5">
                            <div class="card-body">


                              <p><strong style="color: red"> Lead Id:</strong>&nbsp;&nbsp;
                                <?php
                                echo 'DLMS' .  $lead->lead_id;
                                ?>
                              </p>

                              <div class="row">
                                <div class="col-md-4 ">
                                  <p><strong> Task Id:</strong>&nbsp;&nbsp;
                                    <?php
                                    echo  $task->task_id;
                                    ?>
                                  </p>
                                </div>


                                <div class="col-md-4 ">
                                  <p><strong> Start Date:</strong>&nbsp;&nbsp;
                                    <?php
                                    $date = $task->start_date;
                                    echo date("d F, Y", strtotime($date));
                                    ?>
                                  </p>
                                </div>

                                <div class="col-md-4 ">
                                  <p><strong>End Date:</strong>&nbsp;&nbsp;
                                    <?php
                                    $date = $task->end_date;
                                    echo date("d F, Y", strtotime($date));
                                    ?>
                                  </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4 ">
                                  <p><strong> Task Name:</strong>&nbsp;&nbsp;

                                    <?php
                                    echo $task->task_name;
                                    ?>
                                  </p>
                                </div>

                                <div class="col-md-4 ">
                                  <p><strong> Task Status:</strong>&nbsp;&nbsp;

                                    <?php
                                    echo $task->task_status;
                                    ?>
                                  </p>
                                </div>
                              </div>

                              <p><strong> Task Description:</strong>&nbsp;&nbsp;
                                <?php
                                echo $task->notes;
                                ?>
                              </p>
                              <!-- task  modal End  -->


                              <!-- task comment modal start -->
                              <div class="row">
                                <div class="text-left col-md-4">
                                  <button type="submit" class="btn btn-#eb9008 mr-2" style="background-color:#eb9008;color:#ffffff" data-toggle="modal" data-target="#EditTaskModel-1"> Edit Task</button>
                                </div>

                                <div class="text-right col-md-8">
                                  <a type="submit" name="comment" value="insert" class="btn btn-#eb9008" style="background:#eb9008;color:#ffffff" data-toggle="modal" data-target="#TaskStatusModal-1"> + Add Task Status</a>


                                  <a type="submit" name="comment" value="insert" class="btn btn-#eb9008" style="background:#eb9008;color:#ffffff" data-toggle="modal" data-target="#CommentModal-1"> + Add Comment</a>
                                </div>

                              </div>



                              <div class="row">
                                <div class="modal fade" id="CommentModal-1" tabindex="CommentModal-1" role="dialog" aria-labelledby="CommentModal-1" aria-hidden="true">

                                  <div class="modal-dialog" role="document">

                                    <div class="modal-content" style="padding: 10px;">

                                      <form action="<?php echo base_url(); ?>home/add_comment/<?php echo $task->task_id; ?>/<?php echo $lead->lead_id; ?>" method="POST" class="form-sample" id="CommentModal-1">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="CommentModal-1"> Add New Comment</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>

                                        <div class="col-xl-12 justify-content-center">

                                          <div class="form-group">
                                            <input class="form-control" type="hidden" name="lead_id" value="<?php echo $lead->lead_id; ?>">
                                          </div>

                                          <div class="form-group">
                                            <input class="form-control" type="hidden" name="task_id" value="<?php echo $task->task_id; ?>">
                                          </div>

                                          <div class="row">
                                            <label class="col-sm-12 col-form-label">Comment</label>
                                            <textarea type="text" name="comment" placeholder="Type Here...." class="form-control"></textarea>
                                          </div>
                                        </div>
                                        <br />
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <input type="submit" name="insert" value="Submit" class="btn btn-primary">
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="modal fade" id="TaskStatusModal-1" tabindex="TaskStatusModal-1" role="dialog" aria-labelledby="TaskStatusModal-1" aria-hidden="true">

                                  <div class="modal-dialog" role="document">

                                    <div class="modal-content" style="padding: 10px;">

                                      <form action="<?php echo base_url(); ?>home/add_task_status/<?php echo $task->task_id; ?>" method="POST" class="form-sample" id="TaskStatusModal-1">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="TaskStatusModal-1">Choose Task Status</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>

                                        <div class="col-xl-12 justify-content-center">

                                          <label class="col-form-label" style="color: black;">Task Status :</label>
                                          <!-- <select class="form-control" name="task_status" id="task_status">
                                            <option value="pending">Pending</option>
                                            <option value="hold">Hold</option>
                                            <option value="process">Process</option>
                                            <option value="complete">Complete</option>
                                          </select> -->

                                          <!-- <div class="row">
                                            <br />
                                            <div class="col-md-3 ">
                                              <input type="radio" id="pending" name="task_status" value="pending">
                                              <label for="pending">Pending</label>
                                            </div>
                                            <div class="col-md-3 ">
                                              <input type="radio" id="hold" name="task_status" value="hold">
                                              <label for="hold">Hold</label>
                                            </div>

                                            <div class="col-md-3">
                                              <input type="radio" id="process" name="task_status" value="process">
                                              <label for="process">Process</label>
                                            </div>

                                            <div class="col-md-43">
                                              <input type="radio" id="complete" name="task_status" value="complete">
                                              <label for="complete">Complete</label>
                                            </div>
                                          </div> -->


                                          <!-- task Staus modal start -->
                                          <div class="form-group">
                                            <label class="col-sm-12 col-form-label">Task Status</label>

                                            <select class="form-control" name="task_status" id="task_status">

                                              <option value="pending" <?php if ('pending' == $task->task_status) {
                                                                        echo 'selected';
                                                                      }
                                                                      ?>>Pending </option>

                                              <option value="hold" <?php if ('hold' == $task->task_status) {
                                                                      echo 'selected';
                                                                    }
                                                                    ?>>Hold </option>

                                              <option value="process" <?php if ('process' == $task->task_status) {
                                                                        echo 'selected';
                                                                      }
                                                                      ?>>Process </option>
                                              <option value="complete" <?php if ('complete' == $task->task_status) {
                                                                          echo 'selected';
                                                                        }
                                                                        ?>>Complete </option>
                                            </select>
                                            <!-- <input type="text" name="task_status" class="form-control" value="<?php //echo $task->task_status; 
                                                                                                                    ?>"> -->
                                          </div>
                                        </div>
                                        <br />
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <input type="submit" name="insert" value="Submit" class="btn btn-primary">
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- task Status modal End -->

                              <!--Edit  task modal Start -->
                              <div class="row">
                                <div class="modal fade" id="EditTaskModel-1" tabindex="EditTaskModel-1" role="dialog" aria-labelledby="EditTaskModel-1" aria-hidden="true">

                                  <div class="modal-dialog" role="document">

                                    <div class="modal-content" style="padding: 10px;">

                                      <form action="<?php echo base_url('home/update_task/'); ?><?php echo $task->task_id; ?>" method="POST" class="form-sample" id="EditTaskModel-1">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="EditTaskModel-1">Edit Task </h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>

                                        <div class="col-xl-12 justify-content-center">

                                          <br />

                                          <div class="form-group">
                                            <input class="form-control" type="hidden" name="task_id" value="<?php echo $task->task_id; ?>">
                                          </div>


                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">Start Date</label>
                                                <input class="form-control" type="date" name="start_date" placeholder="dd/mm/yyyy" value="<?php echo  $task->start_date; ?>">
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label class="col-sm-6 col-form-label">End Date</label>
                                                <input class="form-control" type="date" name="end_date" placeholder="dd/mm/yyyy" value="<?php echo $task->end_date; ?>">
                                              </div>
                                            </div>
                                          </div>



                                          <div class="form-group">
                                            <label class="col-sm-12 col-form-label">Task Name</label>
                                            <input class="form-control" type="text" name="task_name" value="<?php echo $task->task_name; ?>">

                                          </div>

                                          <div class="form-group">
                                            <label class="col-sm-12 col-form-label">Task Status</label>

                                            <select class="form-control" name="task_status" id="task_status">

                                              <option value="pending" <?php if ('pending' == $task->task_status) {
                                                                        echo 'selected';
                                                                      }
                                                                      ?>>Pending </option>

                                              <option value="hold" <?php if ('hold' == $task->task_status) {
                                                                      echo 'selected';
                                                                    }
                                                                    ?>>Hold </option>

                                              <option value="process" <?php if ('process' == $task->task_status) {
                                                                        echo 'selected';
                                                                      }
                                                                      ?>>Process </option>
                                              <option value="complete" <?php if ('complete' == $task->task_status) {
                                                                          echo 'selected';
                                                                        }
                                                                        ?>>Complete </option>
                                            </select>

                                            <!-- <input type="text" name="task_status" class="form-control" value="<?php //echo $task->task_status; 
                                                                                                                    ?>"> -->
                                          </div>

                                          <div class="form-group">
                                            <label class="col-sm-12 col-form-label">Task Description</label>
                                            <input type="text" name="notes" class="form-control" value="<?php echo $task->notes; ?>">
                                          </div>

                                        </div>
                                        <br />
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <input type="submit" name="insert" value="Submit" class="btn btn-primary">
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--Edit  task modal End -->


                              <hr />
                              <!--Comment  task DAta  -->

                              <?php
                              if (!empty($task->lead_comments)) {

                                foreach ($task->lead_comments as $comments) :
                              ?>
                                  <div class="row">
                                    <div class="col-md-12 ">
                                      <p><strong style="color:blue"> Comments:</strong>&nbsp;&nbsp;
                                        <?php
                                        echo  $comments->comment;
                                        ?>
                                      </p>
                                    </div>
                                  </div>

                              <?php endforeach;
                              } else {
                                echo "There have no comments..!";
                              } ?>
                            </div>
                          </div>

                      <?php endforeach;
                      } else {
                        echo "There have no Task";
                      } ?>

                    </div>
                  </div>
                </div>

              </div>
              <!--- Task modal End-->

            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <!--------end------>
</div>

<?php
$this->load->view('layouts/footer');
?>