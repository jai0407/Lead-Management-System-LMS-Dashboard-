<?php
$this->load->view('layouts/header');
?>

<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <div class="col-md-3"></div>
        <div class="col-6 grid-margin">
          <div class="card">
            <div class="card-body">

              <div class="float-left">
                <h4 class="card-title">Import Lead</h4>
              </div>
              <div class="float-right">
                 <a href="<?=base_url('ImportExport/sample_download');?>"><button class="btn btn-light">Sample Download</button></a>
                 <a href="<?=base_url('home/lead_list');?>"><button class="btn btn-light">Cancel</button></a>
              </div>

              <div class="clearfix"></div>

              <hr /><br />

              <?php if ($this->session->flashdata('data_error')) { ?>

                <div class="alert alert-danger">

                  <?php echo $this->session->flashdata('data_error') ?>

                </div>

              <?php } ?>

              <form action="<?php echo base_url(); ?>ImportExport/import_leads" method="POST" enctype='multipart/form-data' class="form-sample" id="import">

                <div class="row">
                 
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">File (CSV)</label>
                      <div class="col-sm-9">
                        <input type="file" name="csv_file" id="csv_file" class="form-control-file border" accept=".csv">
                      </div>
                    </div>
                    <div class="form-group text-center">
                    <button type="submit" value="Add lead" name="insert" id="success" role="alert" class="btn btn-primary mr-2 ">Import</button>
                    </div>
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </div>




  <script>
    $().ready(function() {

      var $Form = $('#import');
      if ($Form.length) {
        $Form.validate({

          rules: {
            csv_file: {
              required: true

            }
          
          }
        })
      }
    })
  </script>



  <?php
  $this->load->view('layouts/footer');
  ?>