     
    <style>
        td, th {
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
         
        <!-- Main content -->
        <?php if(!empty($advance_result)) { ?>
        <section class="content" ng-controller="advanceCtrl">
        <?php 
                            $rate = $advance_result[0]['rate'];
                            $total_bird = $advance_result[0]['total_bird'];
                            $remaining_weight = $advance_result[0]['total_weight'];
                            $actual_weight = $advance_result[0]['actual_weight'];
                            $sale_weight = $actual_weight-$remaining_weight;
                            $total_flock = (($actual_weight)/40)*$rate;
                            $paid_flock = $advance_result[0]['paid_flock'];
                            $balance = $total_flock-$paid_flock;
                            $missing_bird = $remaining_weight/$advance_result[0]['per_bird_weight'];

                            ?>
            <div class="row" >
            <div class="col-md-12">

            <div class="col-md-2">
            <h3><?php echo "Flock" .$advance_result[0]['f_id']; ?></h3>
            </div>

            <div class="col-md-2">
            <h3><?php echo $advance_result[0]['f_date']; ?></h3>
            </div>

            <div class="col-md-2">
            <h3><?php echo "Rate".":".$advance_result[0]['rate']; ?></h3>
            </div>

            <div class="col-md-3">
            <h3><?php echo "Total weight".":" .$advance_result[0]['actual_weight']."kg"; ?></h3>
            </div>

            <div class="col-md-3">
            <h3><?php echo "Sale Weight".":".$sale_weight."Kg"; ?></h3>
            </div>

             
            </div> <!-- heading md-12 end-->

             <div class="col-md-12">
             <!-- total weight view -->

                  <h2 class="pull-right"  >Remaining weight in Kg:&nbsp;&nbsp;&nbsp;<span><?php echo $remaining_weight;
                  $weight_mun = $remaining_weight/40;
                  ?></span></h2>

              </div>
              
               <div class="col-md-12">
                   <h2 class="pull-right">Remaining weight in Mun:&nbsp;&nbsp;&nbsp;<span><?php echo $weight_mun ;?></span></h2>
              </div>  
                
                <div class="col-md-12" ng-init="advanceGetdata( <?= $this->uri->segment(3); ?> )" >
                <!-- Add Record button -->
                            
              <!-- for search input box -->
                             <div class="col-md-4 col-md-offset-4 " style="padding:30px 0px; ">
                                  <h3>Search</h3>
                                  <input id="testing" type="search" ng-model="itemSearch" class="form-control report highlight" style="border: 3px solid #000" /> 
                                     
                                    <br />
                               </div>
              <!-- for detail -->
                  </div><!-- /.md 12 -->
                       
                         <div class="col-md-12"   >

                             <table id="customerDataView" class="table table-striped table-bordered" cellspacing="0" width="100%"  >
                                 <thead class="table-heading">
                                <tr>
                                    <th>S.No</th>
                                    <th>Driver Name</th>
                                    <th>vehicle Number</th>
                                    
                                     <th>phone</th>
                                     <th>Artee Name</th>
                                     <th colspan="2">Empty Weight in</th>
                                     <th colspan="2">loaded weight</th>
                                     <th colspan="2">Chicken weight</th>
                                     <th>Total</th>
                                     <th>Advance</th>
                                      
                                     <th>Paid</th> 
                                     <th>Balance</th>
                                     
                                    <th>Delete Record</th>
                                     
                                </tr>

                                </thead>
                                 
                                 <tr>
                                  <th colspan="5"></th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th colspan="5"></th>
                                 </tr> 
                                  
                                 
                               <tbody  ng-repeat="report in reports | orderBy: array('-visit_id','reverse' )|  filter:itemSearch "> 
   
                  <tr  >
                 <td>{{$index+1}}</td>
                 <td ><button type="button" id="test" ng-click="getAllreports(report.visit_id)"   class="btn btn-info btn-sm" data-toggle="modal" data-target="#create-report-Modal">{{report.driver_name}}</button></td> 
                  
                  <td> {{report.vehicle_number}}</td>
                  <td>{{report.driver_cnic}}</td>
                  <td>{{report.broker_name}}</td>
                  <td>{{report.chicken_weight}}</td>
                  <td>{{(report.paid_visit * 1)+(report.balance * 1)}}</td>
                   <td>{{report.paid_visit}}</td>
                    
                  <td>{{report.balance}}</td>
                   

                   </tr>
                   </tbody>
                   
                            </table>
                        </div>
                         
                        
    <div class="col-md-12"  >
    <!-- 
    /////////////////////////
    Create report Modal -->
    <div id="create-report-Modal" class="modal fade" role="dialog" >
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" id="section-to-print">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class=" pull-left">ABC Chicken Zone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$index+1}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<span><h4 class="pull-right"> {{time | date:'d-MM-y '}}</h4></span>
          </div>
          <div class="modal-body" id="section-to-print" ng-init="getAllreports()">
           <div ng-repeat= "result in results">
           
            
            <form class="form-horizontal" role="form" name="report" method="post" action="<?php echo site_url();?>/report/update_report">
                
                <input type="hidden" name="id" value="{{result.visit_id}}" />
                    <input type="hidden" name="f_id" value="{{result.f_id}}" />
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Vehicle Number</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="vehicle_number" ng-value="vehicle_number='{{result.vehicle_number}}'" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Driver Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_name" ng-value="driver_name='{{result.driver_name}}'" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Phone:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_cnic" ng-value="driver_cnic='{{result.driver_cnic}}'" disabled>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Artee Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="broker_name" ng-value="broker_name='{{result.driver_name}}'" disabled>
                    </div>
                  </div>

                   <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Rate:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="rate" ng-value="rate='{{result.rate}}'" disabled>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Advance Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="advance" ng-value="advance='{{result.advance}}'" disabled>
                    </div>
                  </div>
   
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Empty Weight</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="empty_weight" ng-value="empty_weight='{{result.empty_weight}}'" disabled >
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Loaded weight:</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="loaded_weight" ng-value="loaded_weight='{{result.loaded_weight}}'" disabled >
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Chicken Weight:</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="chicken_weight" ng-value="chicken_weight='{{result.chicken_weight}}'" disabled >
                    </div>
                  </div>
                   
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Paid:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="paid_result" ng-value="paid_result='{{result.paid_visit}}'" disabled >
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Balance:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="balance" ng-value="balance='{{result.balance}}'" disabled >
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Pay now:</label>
                   <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="current_paid" name="current_paid"  >
                    </div>
                  </div>
                
         
         <div class="modal-footer">
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-8">

                      
                       <button class="btn btn-default"  onclick="window.print();"> <i class="fa fa-print"></i> Print </button>

                      <button type="submit"   ng-hide="edit" class="btn btn-success bt-sm">Update</button>

                      <button type="submit"  data-dismiss="modal" ng-hide="edit" class="btn btn-default bt-sm">close</button>
                     
                      
                    </div>
                  </div>
           </div>
                </form>
                </div><!--ng repeat -->
            </div><!--modal body end-->
          </div>
        </div>
    </div>
    </div><!--col-md -12 --><!-- END Create report Modal -->
    </div> <!-- row-->
     
    </section>
     <?php  } else{ ?>
      <div class="col-md-4 col-md-offset-4">
      <h3 class="text-center"> No On Flock</h3>
      </div>
      <?php }?>
    </div> <!--end of main wrapper -->


     
     

