<?php
$this->load->view('layouts/header');
?>
<!-- <link rel="stylesheet" type="text/css" href="https://http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" /> -->


<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
   <!-- Import and Export Lead Buttons -->
                <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="header-left">
                            <div class="d-flex align-items-left">
                            <?php if ($this->session->userdata('user_role') =='ADMIN') {
               ?>
                                <a href="<?php echo base_url('ImportExport') ?>">
                                    <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" style="background-color:#eb9008">
                                        <i class="mdi mdi-arrow-right-bold-circle" style=" background:#a9711c;"></i>Import bulk lead </button> </a>
                                        <?php } ?>
                                        
                                <a href="<?php echo base_url('ImportExport/export_leads') ?>">
                                    <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" style="background-color:#eb9008">
                                        <i class="mdi mdi-arrow-left-bold-circle" style=" background:#a9711c;"></i> Export lead </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="header-right">
                            <!-- <button class="btn btn-primary mb-2 mb-md-0 mr-2" style="padding:10px"> Create a lead </button> -->
                        </div>
                    </div>
                    <a href="<?php echo base_url('home/create_lead') ?>">
                        <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" style="background-color:#eb9008">
                            <i class="mdi mdi-plus-circle" style=" background:#a9711c;"></i> Create a lead </button>
                    </a>
                </div>
            </div>
   <!-- Import and Export Lead Buttons End -->

   <!-- Lead data table start -->
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


                            <h2 class="card-title">All Leads</h2>
                            <hr />
                            <div class="tab-pane fade show active" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                                <div class="card-body p-0">
                                    <div class="table-responsive">

                                        <table id='lead-listing' name='lead-listing' class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th> Lead Id</th>
                                                    <th>Company</th>
                                                    <th>Lead Source</th>
                                                    <th>Lead Status</th>
                                                    <th>Date</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <!-- <th>Address</th> -->
                                                    <th>City</th>
                                                    <th>Website</th>
                                                    <!-- <th>Description</th> -->
                                                    <th>Official Email Id</th>
                                                    <th>Created at</th>
                                                    <!-- <th>Updated at</th> -->
                                                    <!-- <th>Remark</th> -->
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (!empty($lead)) {
                                                    foreach ($lead as $dashboard) : ?>
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
                                                                echo $dashboard->lead_source;
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                echo $dashboard->s_name;
                                                                ?>
                                                            </td>


                                                            <td>
                                                                <?php
                                                                $date = $dashboard->date_of_inquiry;
                                                                echo date("d F, Y", strtotime($date));

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
                                                                echo $dashboard->mobile;
                                                                ?>
                                                            </td>


                                                            <td>
                                                                <?php
                                                                echo $dashboard->email;
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                echo $dashboard->city;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                echo $dashboard->website;
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <?php
                                                                echo $dashboard->official_email_id;
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                $date = $dashboard->created_at;
                                                                echo date("d F, Y", strtotime($date));

                                                                ?>
                                                            </td>

                                                            <!-- <td>
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-warning mr-2" data-toggle="modal" data-target="#exampleModal-8">Remark</button>
                                                    </div>
                                                </td> -->
                                                            <td>
                                                                <div class="text-center">
                                                                    <a href="<?php echo base_url(); ?>Home/editLeads/<?php echo $dashboard->id; ?>" class="btn btn-#eb9008" style=" background:#eb9008;color:aliceblue">Edit</a>
                                                                </div>
                                                            </td>


                                                        </tr>
                                                <?php endforeach;
                                                } else {
                                                    echo "There have no data";
                                                } ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
               <!-- Lead data table End -->

        </div>

        <!------ Add Remark -Modal Start--->
        <div class="modal fade" id="exampleModal-8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-8" aria-hidden="true">

            <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-8"> Add Remark</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="col-xl-12 justify-content-center">
                        <br />
                        <form class="form-group">
                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">Call</label>
                            </div>

                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">Email</label>
                            </div>

                            <div class="form-check form-check-flat form-check-primary ">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input">Message</label>
                            </div>

                            <hr />
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Date</label>
                                <input class="form-control" type="date" name="date_of_inquiry" placeholder="dd/mm/yyyy">
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Lead Status</label>
                                <select class="form-control" name="lead_status">
                                    <option value="Website">Website</option>
                                    <option value="Whatsapp">Whatsapp</option>
                                    <option value="Call">Call</option>
                                    <option value="Referral">Referral</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Cold">Cold</option>

                                </select>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Remark</label>
                                <input type="text" name="remark" placeholder="Type Here...." class="form-control">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="insert" value="Submit " class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Add Remark Modal Ends -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#lead-listing').dataTable({
            "aaSorting": []
        });
    })
</script>

<?php
$this->load->view('layouts/footer');
?>