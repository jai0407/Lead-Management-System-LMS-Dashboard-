<?php
$this->load->view('layouts/header');
?>




<div class="container-fluid page-body-wrapper">
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">

        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row ">
                    <h4 class="card-title">Lead Information</h4>
                  </div>
                </div>
              
              </div>



              <?php if ($this->session->flashdata('data_error')) { ?>

                <div class="alert alert-danger">

                  <?php echo $this->session->flashdata('data_error') ?>

                </div>

              <?php } ?>

              <form action="<?php echo base_url(); ?>home/add_new_lead" method="POST" class="form-sample" id="registration">



                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Company</label>
                      <div class="col-sm-9">
                        <input type="text" id="company" name="company" class="form-control" placeholder="Enter your Company Name" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Lead Source</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="lead_source" id="lead_source">


                          <option value="">--- Select ----</option>
                          <option value="Website">Website</option>
                          <option value="Whatsapp">Whatsapp</option>
                          <option value="Call">Call</option>
                          <option value="Referral">Referral</option>
                          <option value="LinkedIn">LinkedIn</option>
                          <option value="Facebook">Facebook</option>
                          <option value="Cold">Cold</option>


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
                        <input class="form-control" type="date" name="date_of_inquiry" value="<?php echo date('Y-m-d'); ?>" />
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
                        <input type="text" name="name" class="form-control" placeholder="Enter Your Name" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number" />
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Address </label>
                      <div class="col-sm-9">
                        <input type="text" name="address" class="form-control" placeholder="Enter Your Address" />
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">City</label>
                      <div class="col-sm-9">
                        <input type="text" name="city" class="form-control" placeholder="Enter Your City" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Website</label>
                      <div class="col-sm-9">
                        <input type="text" name="website" class="form-control" placeholder="Enter Your Website" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Mobile No.</label>
                      <div class="col-sm-9">
                        <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile Number" />
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
                        <textarea type="text" name="description" class="form-control" placeholder="Write something..."></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Official Email Id</label>
                      <div class="col-sm-9">
                        <input type="email" name="official_email_id" class="form-control" placeholder="Enter Official Email Id" />
                      </div>
                    </div>



                    <br />
                    <br />
                  </div>
                </div>
                <button type="submit" value="Add lead" name="insert" id="success" role="alert" class="btn btn-primary mr-2 ">Submit</button>


              </form>
              <div class="col-md-12">
                  <div class="form-group row" style="float: right;">
                    <a href="<?php echo base_url(); ?>home/lead_list" class="auth-link text-black">Back..                
                    </a>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




  <script>
    $().ready(function() {
      // $("#registration").validate({


      var $registerForm = $('#registration');
      if ($registerForm.length) {
        $registerForm.validate({

          rules: {
            company: {
              required: true

            },
            // lead_source: {
            //   required: true

            // },
            date_of_inquiry: {
              required: true

            },
            name: {
              required: true

            },
            phone: {
              required: true

            },
            email: {
              required: true

            },
            address: {
              required: true

            },
            city: {
              required: true

            }
            // website: {
            //   required: true

            // },
            // description: {
            //   required: true

            // },
            // official_email_id: {
            //   required: true

            // }
          },
          messages: {
            company: {
              required: 'Please enter company!'
            },
            // lead_source: {
            //   required: 'Please enter Lead source!'
            // },
            date_of_inquiry: {
              required: 'Please enter date! '
            },
            name: {
              required: 'Please enter name! '
            },
            phone: {
              required: 'Please enter phone!'
            },
            email: {
              required: 'Email is mandatory! '
            },
            address: {
              required: 'Please enter address!'
            },
            city: {
              required: 'Please enter city!'
            }
            // website: {
            //   required: 'Please enter website!'
            // },
            // description: {
            //   required: 'Please enter description!'
            // },
            // official_email_id: {
            //   required: 'Official email is mandatory! '
            // }
          }



        })
      }
    })
  </script>



  <?php
  $this->load->view('layouts/footer');
  ?>