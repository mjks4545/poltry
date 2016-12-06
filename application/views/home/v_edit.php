
 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ABC <small>Chicken zone</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" action="<?php echo site_url();?>/home/update_flock" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                    <input type="hidden" name="update_id" value="<?php echo $flock[0]['f_id'];?>">

                    <!--  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Flock Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value="<?php echo $flock[0]['f_name'];?>" name="f_name"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> 
  
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value="<?php echo $flock[0]['status'];?>" name="status" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>-->
                      

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rate <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value="<?php echo $flock[0]['rate'];?>" name="rate" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Birds <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value="<?php echo $flock[0]['total_bird'];?>" name="total_bird" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Weight <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" value="<?php echo $flock[0]['total_weight'];?>" name="total_weight" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     
                       
                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="<?php echo site_url();?>/home/get_flock" type="submib" class="btn btn-primary">Cancel</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>