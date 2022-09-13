<?php
$this->load->view('layouts/header');
?>
</br>
<div id="page-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <h2><i class="mdi mdi-account"></i> Chanage Password </h2>
        </div>
    </div>
    <hr style="width:80%">
    </br></br>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <?php if ($error = $this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> <?= $error ?>
                </div>
            <?php endif; ?>
         
            <?php if ($error = $this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= $error ?>
                </div>
            <?php endif; ?>
            <?php if ($error = $this->session->flashdata('data_error')) : ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?= $error ?>
                </div>
            <?php endif; ?>
            

            <div class="panel panel-green">
                <div class="panel-heading" style="background-color:#2879c1; color:white ; padding:10px;border-radius:5px">
                    <i class="mdi mdi-key"></i> Chanage Password
                </div>
                <br />
                <br />
                <div class="panel-body">
                    <form action="<?php echo base_url(); ?>home/update_password" method="POST" class="form-sample" id="change_pass">
                        <div class="row" style="padding:5px">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="old_pass" id="old_pass" class="form-control"  placeholder="Enter Old Password">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="new_pass" id="new_pass" class="form-control"  placeholder="Enter New Password">

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Repeat New Password</label>
                                    <input type="password" name="rep_new_pass" id="rep_new_pass" class="form-control"  placeholder="Repeat New Password">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color:#eb9008"><i class="mdi mdi-key"></i> Chanage Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<br />


 <script>
    $().ready(function() {
        // $("#registration").validate({


        var $change_password = $('#change_pass');
        if ($change_password.length) {
            $change_password.validate({

                rules: {
                    old_pass: {
                        required: true

                    },
                    new_pass: {
                        required: true

                    },
                    rep_new_pass: {
                        required: true                    

                    },
                    messages: {
                        old_pass: {
                            required: 'Please enter old password!'
                        },
                        new_pass: {
                            required: 'Please enter new password!'
                        },
                        rep_new_pass: {
                            required: 'Please enter repeat new password! '
                        },
                    }
                }

            })
        }
    })
</script> 

<?php
$this->load->view('layouts/footer');
?>