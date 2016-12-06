     
    <style>
        td, th {
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
         
       <?php //echo '<pre>';print_r($visit_data); ?>
        <!-- Main content -->
       <?php if(!empty($specific_flock)) { ?>
        <section class="content" ng-controller="reportCtrl">

         <?php 
                            $rate = $specific_flock[0]['rate'];
                            $total_bird = $specific_flock[0]['total_bird'];
                            $remaining_weight = $specific_flock[0]['total_weight'];
                            $actual_weight = $specific_flock[0]['actual_weight'];
                           // $sale_weight = $actual_weight-$remaining_weight;
                            $total_flock = (($actual_weight)/40)*$rate;
                            $paid_flock = $specific_flock[0]['paid_flock'];
                            $balance = $total_flock-$paid_flock;
                            //$missing_bird = $remaining_weight/$specific_flock[0]['per_bird_weight'];

                            ?>
            <div class="row" >

            <div class="col-md-12">
              <div class="col-md-3">
                   <table  class="table table-striped  table-override" cellspacing="0" width="100%"   >
                              
                                <tr>
                                  <th>Flock No</th>
                                  <th>Date</th>  
                                </tr>
                                <tr>
                                    <td><?php echo $specific_flock[0]['f_id']; ?></td>
                                     <td><?php echo $specific_flock[0]['f_date']; ?></td>
                                </tr>
                               
                    </table>  
              </div> <!-- table one end-->
              <div class="col-md-3">
                 <table  class="table table-striped  table-override" cellspacing="0" width="100%"   >
                                 <tr>
                                    <th>Rate</th>
                                     <th>Total Birds</th>
                                </tr>
                                <tr>
                                  <td><?php echo $specific_flock[0]['rate']; ?></td>
                                  <td><?php echo $total_bird; ?></td>  
                                </tr>
                               
                                 
                    </table>
                   </div> <!-- table two end-->
                   <div class="col-md-3">
                 <table  class="table table-striped  table-override" cellspacing="0" width="100%" >
                              
                                <tr>
                                  <th colspan="2">Total Weight in</th>
                                  <tr><th>Kg</th>
                                  <th>Mann</th> 
                                  </tr>
                                  <tr><td><?php echo $actual_weight; ?></td>
                                  <td><?php echo ($actual_weight/40); ?></td> 
                                  </tr>
                                   
                                </tr>
                                 
                    </table>
                   </div> <!-- table three end-->
                    <div class="col-md-3">
                 <table  class="table table-striped  table-override" cellspacing="0" width="100%" >
                              
                                <tr>
                                  <th colspan="2">Remaining Weight in</th>
                                  <tr><th>Kg</th>
                                      <th>Mann</th>
                                   
                                  </tr>
                                  <tr> 
                                  <?php if(!empty($visit_data)){ $remaining_weight=($actual_weight)-($visit_data * 40);?>
                                  <td><?php echo  $remaining_weight; ?></td>
                                  <?php }else{?> 
                                  <td><?php echo $actual_weight; ?></td>
                                  <?php }?>
                                   <?php if(!empty($visit_data)){ $remaining_weight=(($actual_weight)-($visit_data * 40))/40;?>
                                  <td><?php echo  $remaining_weight; ?></td>
                                  <?php }else{?> 
                                  <td><?php echo ($actual_weight/40); ?></td>
                                  <?php }?>
                                  </tr>
                                   
                                </tr>
                                 
                    </table>
                   </div> <!-- table 4 end-->
                  </div> <!-- col md 12 end --> <!-- heading md-12 end-->
 
                <div class="col-md-12" ng-init="getAllreport( <?= $this->uri->segment(3); ?> )" >
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

                             <table  class="table table-striped  table-override" cellspacing="0" width="100%"   >
                                
                                <tr>
                                    <th rowspan="2">S.No</th>
                                    <th rowspan="2">Driver Name</th>
                                    <th rowspan="2">vehicle Number</th>
                                    
                                     <th rowspan="2">phone</th>
                                     <th rowspan="2">Artee Name</th>
                                     <th colspan="2">Empty Weight in</th>
                                     <th colspan="2">loaded weight in</th>
                                     <th colspan="2">Chicken weight in</th>
                                     <th rowspan="2">Total</th>
                                     <th rowspan="2">Advance</th>
                                      
                                     <th rowspan="2">Paid</th> 
                                     <th rowspan="2">Balance</th>
                                      
                                </tr>
                                
                                  <tr>
                                   
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  
                                 </tr> 
                               <tbody  ng-repeat="report in reports | orderBy: array('-visit_id','reverse' )|  filter:itemSearch "> 
   
                  <tr  >
                 <td>{{$index+1}}</td>
                 <td ><button type="button" id="test" ng-click="getAllreports(report.visit_id)"   class="btn btn-info btn-sm" data-toggle="modal" data-target="#create-report-Modal">{{report.driver_name}}</button></td> 
                  
                  <td> {{report.vehicle_number}}</td>
                  <td>{{report.driver_cnic}}</td>
                  <td>{{report.broker_name}}</td>
                  <td>{{report.empty_weight/40}} </td> <td> {{report.empty_weight}} </td>
                  <td>{{report.loaded_weight/40}} </td> <td> {{report.loaded_weight}}</td>
                  <td>{{report.chicken_weight}} </td> <td> {{report.chicken_weight * 40}}</td>
                  <td>{{(report.chicken_weight * 1)*(report.rate * 1)}}</td>
                  <td>{{report.advance}}</td>
                  <td>{{report.paid_visit}}</td>
                    
                  <td>{{report.balance}}</td>
                   

                   </tr>
                   </tbody>
                   <tfoot>
                     <tr>
                      <td></td>
                      <td>Total</td>
                      <td colspan="7"></td>
                      
                      <td>{{ getTotalChickenWeight() }}</td> <td> {{ getTotalChickenWeight() * 40 }} </td>
                      <td>{{ getTotalTotal() }}</td>
                      <td>{{ getTotalAdvance() }}</td>
                      <td>{{ getTotalPaid() }}</td>
                      <td>{{ getTotalBalance() }}</td>
                     </tr>
                   </tfoot>
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

                   <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Rate:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="rate" ng-value="rate='{{result.rate}}'" disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Total:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="total" ng-value="total='{{(result.balance * 1)+(result.paid_visit * 1)}}'" disabled>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Advance Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="advance" ng-value="advance='{{result.advance}}'" disabled>
                    </div>
                  </div>                 
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Paid:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="paid_result" ng-value="paid_result='{{result.paid_visit}}'" id="total_paid" disabled >
                      <input type="text" class="form-control" ng-model="paid_result2" ng-value="paid_result='{{result.paid_visit}}'" id="total_paid2" disabled >
                    </div>
                  </div> 

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Balance:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="balance" ng-model="balance" ng-value="balance='{{result.balance}}'" disabled >
                    </div>
                      <input type="hidden" class="form-control" id="balance2" ng-model="balance2" ng-value="balance='{{result.balance2}}'" disabled >
                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Pay now:</label>
                   <div class="col-sm-9">
                      <input type="text" class="form-control" id="current_paid" ng-change="updatefromvalue()" ng-model="current_paid" name="current_paid">
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


     
     

