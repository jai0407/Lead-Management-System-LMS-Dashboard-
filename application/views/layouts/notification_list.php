<?php
$this->load->view('layouts/header');
?>

<br />

<div class="row justify-content-center">
    <div class="col-xl-9 grid-margin stretch-card ">
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

                <h2 class="card-title">Remark Leads</h2>

            

                <hr />
                <div class="tab-pane fade show active" id="notification-1" role="tabpanel" aria-labelledby="notification-tab">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id='order-listing' class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                    <tr>
                                        <th> Lead Id</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Follow Up</th>
                                        <th>Lead Status</th>
                                        <th>Remark</th>
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
                                                <td>
                                                    <p style="font-size: 15px; color: #114ba3;">

                                                        <?php
                                                        echo $remark->lead_status_name;
                                                        ?>
                                                    </p>
                                                </td>
                                                <td>
                                                    <p style="font-size: 15px; color: #114ba3;">

                                                        <?php
                                                        echo $remark->remark;
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-------Modal Start--->




<!-- Modal Ends -->




<!------Modal End --->
<?php
$this->load->view('layouts/footer');
?>