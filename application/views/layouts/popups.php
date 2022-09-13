<?php 
   $this->load->view('layouts/header');
?>
                    <!-- Modal starts -->
                    <div class="text-center">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Click for demo<i class="mdi mdi-play-circle ml-1"></i></button>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button> -->
                          </div>
                          <div class="modal-body">
                          <form>
                          <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" name="name"  placeholder="enter your name" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label for="name">Salary</label>
                                  <input type="text" name="salary"  placeholder="enter your Salary" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label for="name">Work</label>
                                  <input type="text" name="work"  placeholder="enter your Work" class="form-control">
                              </div>

                              <div class="form-group">
                                  <label for="name">City</label>
                                  <input type="text" name="city"  placeholder="enter your City" class="form-control">
                              </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="insert" value="Add Employee" class="btn btn-info">
                            </div>

                        </form>  
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success">Submit</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Ends -->
 <?php 
   $this->load->view('layouts/footer');
?>
   