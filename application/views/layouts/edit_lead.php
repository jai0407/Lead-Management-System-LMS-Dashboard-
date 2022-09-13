<?php
$this->load->view('layouts/header');
?>

<!--Edit Leads starts -->

<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">



                            <h4 class="card-title">Lead Information</h4>
                            <hr /><br />



                            <?php if ($this->session->flashdata('data_error')) { ?>

                                <div class="alert alert-danger">

                                    <?php echo $this->session->flashdata('data_error') ?>

                                </div>

                            <?php } ?>

                            <form action="<?php echo base_url('home/updateLeads/'); ?><?php echo $singleLeads->id; ?>" method="post">



                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Company</label>
                                            <div class="col-sm-9">
                                                <input type="text" id="company" name="company" class="form-control" value="<?php echo $singleLeads->company; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Lead Source</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="lead_source" id="lead_source">

                                                    <option value="Website" <?php if ('Website' == $singleLeads->lead_source) {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>Website </option>

                                                    <option value="Call" <?php if ('Call' == $singleLeads->lead_source) {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>Call </option>

                                                    <option value="Referral" <?php if ('Referral' == $singleLeads->lead_source) {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>Referral </option>

                                                    <option value="LinkedIn" <?php if ('LinkedIn' == $singleLeads->lead_source) {
                                                                                    echo 'selected';
                                                                                }
                                                                                ?>>LinkedIn </option>
                                                    <option value="Whatsapp" <?php if ('Whatsapp' == $singleLeads->lead_source) {
                                                                                    echo 'selected="selected"';
                                                                                }
                                                                                ?>>Whatsapp </option>

                                                    <option value="Facebook" <?php if ('Facebook' == $singleLeads->lead_source) {
                                                                                    echo 'selected="selected"';
                                                                                }
                                                                                ?>>Facebook </option>
                                                    <option value="Cold" <?php if ('Cold' == $singleLeads->lead_source) {
                                                                                echo 'selected';
                                                                            }
                                                                            ?>>Cold </option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Date of Inquiry</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="date" name="date_of_inquiry" placeholder="dd/mm/yyyy" value="<?php echo $singleLeads->date_of_inquiry; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <br /> <br />
                                <h4 class="card-title">Contact Information</h4>
                                <hr /><br />

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label"> Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" value="<?php echo $singleLeads->name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="phone" class="form-control" value="<?php echo $singleLeads->phone; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" value="<?php echo $singleLeads->email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Address </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address" class="form-control" value="<?php echo $singleLeads->address; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">City</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="city" class="form-control" value="<?php echo $singleLeads->city; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Website</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="website" class="form-control" value="<?php echo $singleLeads->website; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Mobile No.</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="mobile" class="form-control" value="<?php echo $singleLeads->mobile;?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br /> <br />
                                <h4 class="card-title">Additional Information</h4>
                                <hr /><br />

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description</label>


                                            <div class="col-sm-9">
                                                <input type="text" name="description" class="form-control" placeholder="Write something..." style="display: block;padding: 45px;" value="<?php echo $singleLeads->description; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Official email Id</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="official_email_id" class="form-control" value="<?php echo $singleLeads->official_email_id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div><br /><br />
                                <button type="submit" name="edit" value="Update" class="btn btn-primary">Update</button>
                                <!-- <button type="close" name="back" value="close" class="btn btn-outline-primary">Back</button> -->
                                <!-- <input type="button" value="Go Back From Whence You Came!" onclick="history.back(-1)" /> -->
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Edit Leads Ends -->

    <?php
    $this->load->view('layouts/footer');
    ?>