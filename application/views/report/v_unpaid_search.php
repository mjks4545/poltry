     
    <style>
        td, th {
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
         
        <!-- Main content -->
        <?php if(!empty($advance_result)) { ?>
        <section class="content" ng-controller="unpaidCtrl">
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
             <!--
            <div class="col-md-12">
             
            <div class="col-md-2">
            <h3><?php //echo "Flock" .$advance_result[0]['f_id']; ?></h3>
            </div>

            <div class="col-md-2">
            <h3><?php //echo $advance_result[0]['f_date']; ?></h3>
            </div>

            <div class="col-md-2">
            <h3><?php //echo "Rate".":".$advance_result[0]['rate']; ?></h3>
            </div>

            <div class="col-md-3">
            <h3><?php //echo "Total weight".":" .$advance_result[0]['actual_weight']."kg"; ?></h3>
            </div>

            <div class="col-md-3">
            <h3><?php //echo "Sale Weight".":".$sale_weight."Kg"; ?></h3>
            </div>

             
            </div> <!-- heading md-12 end-->

             <div class="col-md-12">
             <!-- total weight view 

                  <h2 class="pull-right"  >Remaining weight in Kg:&nbsp;&nbsp;&nbsp;<span><?php// echo $remaining_weight;
                  $weight_mun = $remaining_weight/40;
                  ?></span></h2>
                  -->
              </div>
              <!--
               <div class="col-md-12">
                   <h2 class="pull-right">Remaining weight in Mun:&nbsp;&nbsp;&nbsp;<span><?php //echo $weight_mun ;?></span></h2>
              </div>  
                -->
                <div class="col-md-12" ng-init="getAllunpaid()" >
                <!-- Add Record button -->
                            
              <!-- for search input box -->
                             <div class="col-md-4 col-md-offset-4 " style="padding:30px 0px; ">
                                  <h3>Search</h3>
                                  <input id="testing" type="search" ng-model="unpaidSearch" class="form-control report highlight" style="border: 3px solid #000" /> 
                                     
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
                                     <th rowspan="2">Rate</th>
                                     <th colspan="2">Empty Weight in</th>
                                     <th colspan="2">loaded weight in</th>
                                     <th colspan="2">Chicken weight in</th>
                                     <th rowspan="2">Total</th>
                                     <th rowspan="2">Advance</th>
                                      
                                     <th rowspan="2">Paid</th> 
                                     <th rowspan="2">Balance</th>
                                      
                                </tr>
 
                                 <tr>
                                 
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                 
                                 </tr> 

                                 
                               <tbody  ng-repeat="unpaid in unpaids | orderBy: array('-visit_id','reverse' )|  filter:unpaidSearch "> 
   
                  <tr  >
                 <td>{{$index+1}}</td>
                 <td ><button type="button" id="test" ng-click="editUnpaid(unpaid.visit_id)"   class="btn btn-info btn-sm" data-toggle="modal" data-target="#create-unpaid-Modal">{{unpaid.driver_name}}</button></td> 
                  
                 <td> {{unpaid.vehicle_number}}</td>
                 <td>{{unpaid.driver_cnic}}</td>
                 <td>{{unpaid.broker_name}}</td>
                 <td>{{unpaid.rate}}</td>
                 <td>{{unpaid.empty_weight * 40}}</td><td>{{unpaid.empty_weight}}</td>
                 <td>{{unpaid.loaded_weight * 40}}</td><td>{{unpaid.loaded_weight}}</td>
                  <td>{{unpaid.chicken_weight * 40}}</td> <td>{{unpaid.chicken_weight}}</td> 
                 <td>{{(unpaid.chicken_weight * 1)*(unpaid.rate * 1)}}</td>
                 <td>{{unpaid.advance}}</td>
                 <td>{{unpaid.paid_visit}}</td>
                    
                 <td>{{unpaid.balance}}</td>
                   

                   </tr>
                   </tbody>
                    <tfoot>
                     <tr>
                      <td></td>
                      <td>Total</td>
                      <td colspan="8"></td>
                      <td>{{ getTotalChickenWeight() * 40 }}</td>
                      <td>{{ getTotalChickenWeight() }}</td> 
                      
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
    Create unpaid Modal -->
    <div id="create-unpaid-Modal" class="modal fade" role="dialog" >
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" id="section-to-print">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class=" pull-left">ABC Chicken Zone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$index+1}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<span><h4 class="pull-right"> {{time | date:'d-MM-y '}}</h4></span>
          </div>
          <div class="modal-body" id="section-to-print" >
           <div  >
           
            
            <form class="form-horizontal" role="form"  >
                
                 
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Vehicle Number</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="vehicle_number"   disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Driver Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_name"   disabled>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">phone:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_cnic"   disabled>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Artee Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="broker_name"   disabled>
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Empty Weight</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="empty_weight"   disabled >
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Loaded weight:</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="loaded_weight"   disabled >
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Chicken Weight:</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="chicken_weight"   disabled >
                    </div>
                  </div>

                   <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Rate:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="rate"   disabled>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Advance Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="advance"   disabled>
                    </div>
                  </div>
   
                
                   
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Paid:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="paid_result"   disabled >
                    </div>
                  </div> 

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Balance:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="balance" ng-model="balance"   disabled >
                    </div>
                      <input type="text" class="form-control" id="balance2" ng-model="balance2"   disabled >

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Pay now:</label>
                   <div class="col-sm-9">
                      <input type="text" class="form-control" ng-change="updatefromvalue()" id="current_paid" ng-model="current_paid" name="current_paid"  >
                    </div>
                  </div>
                
         
         <div class="modal-footer">
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-8">

                      
                       <button class="btn btn-default"  onclick="window.print();"> <i class="fa fa-print"></i> Print </button>

                      <button type="submit" ng-click="updateUnpaid()"  ng-hide="edit" class="btn btn-success bt-sm">Update</button>

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
    </div><!--col-md -12 --><!-- END Create unpaid Modal -->
    </div> <!-- row-->
     
    </section>
     <?php  } else{ ?>
      <div class="col-md-4 col-md-offset-4">
      <h3 class="text-center"> No On Flock</h3>
      </div>
      <?php }?>
    </div> <!--end of main wrapper -->


     
     

