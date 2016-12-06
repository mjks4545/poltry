     
    <style>
        td, th {
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
         
        <!-- Main content -->
    	 
        <section class="content" >
            <div class="row" >
             <div class="col-md-12">
             <!-- total weight view -->
                     
             </div>
                <?php if(!empty($flock_visit)) { ?>
                <div class="col-md-12"  >
                <!-- Add Record button -->
                            
              <!-- for search input box -->
                             
              <!-- for detail -->
                                
<?php //echo '<pre>'; print_r($flock_visit); die; ?>
<h1> for flock detail in future </h1>
                               
                            
                  </div><!-- /.md 12 -->
                  
                       
                         <div class="col-md-12"   >

                            <table  class="table table-striped  table-override" cellspacing="0" width="100%"   >
                                <thead class="table-heading">
                                <tr>
                                     <th>S.No</th>
                                    <th>vehicle Number</th>
                                    <th>Driver Name</th>
                                     <th>Phone</th>
                                      <th>current Rate</th>
                                      <th>Advance</th>
                                      <th>Empty Weight</th>
                                      <th>loaded weight</th>
                                     <th>Balance</th>
                                      
                                     <th>Edit Record</th>
                                      <th>Delete Record</th>
                                       
                                </tr>
                                </thead>
                                 
                               <tbody > 
   <?php foreach ($flock_visit as $row): ?>
    							<tr  >
                 <td>hhhh</td>
                  
                  
                  <td><?php echo $row->driver_name; ?></td>
                    
    							 </tr>
                   <?php endforeach; ?>
                   <?php } ;?>
    							 </tbody>
    							 
                            </table>
                      	</div>
                         
                      	
    <div class="col-md-12"  >
    <!-- 
    /////////////////////////
    Create visit Modal -->
    <div id="create-visit-Modal" class="modal fade" role="dialog" >
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" id="section-to-print">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class=" pull-left">ABC Chicken Zone</h4> 
          </div>
          <div class="modal-body" id="section-to-print">
           
            
            <form class="form-horizontal" role="form" autocomplete="off" >
                
                <input type="hidden" ng-model="id"/>
     
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Vehicle Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="vehicle_number" name="vehicle_number" id="Title"  required />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Driver Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_name" name="driver_name" id="Title"    />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Phone:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_cnic" name="driver_cnic" id="Title"   />
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Artee Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="broker_name" name="broker_name" id="Title"   />
                    </div>
                  </div>

                   <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Rate:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="rate" value="{{scope.rate}}" id="Title" disabled  />
                    </div>
                  </div>
   
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Empty Weight</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="empty_weight" name="empty_weight" id="Title"    />
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Loaded weight:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  ng-model="loaded_weight" name="loaded_weight" id="Title"  />
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Advance Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="advance" name="advance" id="Title"    />
                    </div>
                  </div>

                   
                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Balance:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="balance" name="balance" id="Title"    />
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Pay now:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="current_paid" name="current_paid" id="Title"    />
                    </div>
                  </div>
                
         
         <div class="modal-footer">
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" data-dismiss="modal" ng-click="createvisit()" ng-show="edit" class="btn btn-default">Close</button>
                       <button class="btn btn-success"  onclick="window.print();"> <i class="fa fa-print"></i> Print </button>
                      <button type="submit" data-dismiss="modal" ng-click="createvisit('update')" ng-hide="edit" class="btn btn-default">Update</button>
                      
                    </div>
                  </div>
           </div>
                </form>
            </div><!--modal body end-->
          </div>
        </div>
    </div>
    </div><!--col-md -12 --><!-- END Create visit Modal -->
    </div> <!-- row-->
     
    </section>
    </div> <!--end of main wrapper -->


     
     

