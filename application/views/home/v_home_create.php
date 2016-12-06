
 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 <!-- <div class="x_title highlight">
                    <h2>Punjab Chick zone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span ><?php echo $this->session->flashdata('msg'); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>
                    <?php if(!empty($active_flock)){ ?>
                    Flock&nbsp;<?php echo $active_flock[0]['f_id'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php echo $active_flock[0]['f_date'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Rate&nbsp;<?php echo $active_flock[0]['rate'];?></span></h2> 
                    <?php } ?>
                    <div class="clearfix"></div>

                  </div>-->
                  <div class="x_content">
                    <br>
                    <form id="demo-form2" action="<?php echo site_url();?>/home/insert_flock" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">

                     <!-- <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Flock Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="f_name"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>-->

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Birds <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="total_bird"  class="form-control col-md-7 col-xs-12"  />
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Weight in Grams   
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="total_weight"  class="form-control col-md-7 col-xs-12"  />
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rate <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="rate"  class="form-control col-md-7 col-xs-12" ng-required="true" />
                        </div>
                      </div>
                       
                       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                         
                          <button type="submit" class="btn btn-success">Save</button>
                           <a href="<?php echo site_url();?>/visit" type="submit" class="btn btn-primary">Cancel</a>
                           
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>