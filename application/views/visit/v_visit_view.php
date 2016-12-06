     
    <style>
      td, th {
          text-align: center;
      }
      
    </style>

    <div class="content-wrapper">
         <?php //echo '<pre>';print_r($visit_data); ?>
        <!-- Main content -->
    	 <?php if(!empty($current_flock)) { ?>
        <section class="content" ng-controller="visitCtrl">

         <?php 
                            $rate = $current_flock[0]['rate'];
                            $total_bird = $current_flock[0]['total_bird'];
                            $remaining_weight = $current_flock[0]['total_weight'];
                            $actual_weight = $current_flock[0]['actual_weight'];
                           // $sale_weight = $actual_weight-$remaining_weight;
                            $total_flock = (($actual_weight)/40)*$rate;
                            $paid_flock = $current_flock[0]['paid_flock'];
                            $balance = $total_flock-$paid_flock;
                            //$missing_bird = $remaining_weight/$current_flock[0]['per_bird_weight'];

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
                                    <td><?php echo $current_flock[0]['f_id']; ?></td>
                                     <td><?php echo $current_flock[0]['f_date']; ?></td>
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
                                  <td><?php echo $current_flock[0]['rate']; ?></td>
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
                  </div> <!-- col md 12 end -->
            <div class="col-md-12">       
            <div class="col-md-1">
            <h4><?php //echo "Flock".$current_flock[0]['f_no']; ?></h4>
            </div>
            <!--
            <div class="col-md-2">
            <h4><?php //echo $current_flock[0]['f_date']; ?></h4>
            </div>-->
            <!--
            <div class="col-md-1">
            <h4><?php //echo "Rate"."&nbsp;:&nbsp;".$current_flock[0]['rate']; ?></h4>
            </div>
            <div class="col-md-2">
            <h4><?php // echo "Total Birds"."&nbsp;:&nbsp;".$total_bird; ?></h4>
            </div>
            <div class="col-md-3">
            <?php //$actual_weight = $current_flock[0]['actual_weight']; ?>
            <h4><?php //echo "Total weight"."&nbsp;:&nbsp;" . $actual_weight ." kg " . $actual_weight/40 . " Mann"; ?></h4>
            </div>
             <?php //if(!empty($visit_data)){ $remaining_weight=($actual_weight)-($visit_data * 40);?>
            <div class="col-md-3">
            <h4><?php //echo "Remaining weight"."&nbsp;:&nbsp;" .$remaining_weight." "."kg " . $remaining_weight/40 . " Mann"; ?></h4>
            </div>
            <?php //} else{?>
              <div class="col-md-3">
            <h4><?php //echo "Remaining weight"."&nbsp;:&nbsp;" .$actual_weight." "."kg " . $actual_weight/40 . " Mann"; ?></h4>
            </div>
            <?php //}?>
            </div> --><!-- heading md-12 end-->
                <div class="col-md-12" ng-init="getAllvisit()" >
                <!-- Add Record button -->
                            <div class="col-md-2" style="padding:30px 0px;" >  
                                 <button type="button"  class="btn btn-info " ng-click="editItem('new')" data-toggle="modal" data-target="#create-visit-Modal">Add  Record</button>
                                 &nbsp;&nbsp;&nbsp;<span style="font-size:18px"> Search</span>
                            </div>
              <!-- for search input box -->
                             <div class="col-md-4 " style="padding:30px 0px; ">
                                  
                                  <input id="testing" type="search" ng-model="itemSearch" class="form-control report highlight" style="border: 3px solid #000" />
                                    
                               </div>

                               <div class="col-md-6 " style="padding:30px 0px; ">
                                  
                                   <span class="pull-right"><a href="<?php echo site_url();?>/visit/close_flock/<?php echo $current_flock[0]['f_id'];?>" class="btn btn-danger">Close Flock</a></span>  
                                      
                               </div>
      
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
                                     
                                    <th rowspan="2">Delete Record</th>
                                     
                                </tr>

                                
                                 
                                 <tr>
<!--                                  <th colspan="5"></th>-->
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <!--<th colspan="5"></th>-->
                                 </tr> 
                                  
                                 
                               <tbody  ng-repeat="visit in visits | orderBy: array('-visit_id','reverse' )|  filter:itemSearch "> 
   
    							<tr  >
                 <td>{{$index+1}}</td>
                 <td ><button type="button" id="test" ng-click="editItem(visit.visit_id)"   class="btn btn-info btn-sm" data-toggle="modal" data-target="#create-visit-Modal">{{visit.driver_name}}</button></td> 
                 
                  <td> {{visit.vehicle_number}}</td>
                  <td>{{visit.driver_cnic}}</td>
                  <td>{{visit.broker_name}}</td>
                  <td>{{visit.empty_weight/40}} </td> <td>{{visit.empty_weight}}</td>
                  <td>{{visit.loaded_weight/40}}</td> <td>{{visit.loaded_weight}} </td>
                    
                  <td>{{visit.chicken_weight}} </td> <td> {{visit.chicken_weight * 40}}</td>
                   <td ng-show="visit.loaded_weight.length">{{(visit.advance * 1) + (visit.paid_visit * 1)+(visit.balance * 1)}}</td>
                   <td ng-hide="visit.loaded_weight.length"></td>
                  <td>{{visit.advance}}</td>
                   
    							 <td>{{visit.paid_visit}}</td>
                  <td>{{visit.balance}}</td>
    							 
                    <td> <button type="button" class="btn btn-danger btn-sm" ng-click="deletevisit(visit.visit_id)"  >Delete visit</button>
                    </td> 

    							 </tr>
    							 </tbody>
                   <tfoot>
                     <tr>
                      <td></td>
                      <td>Total</td>
                      <td colspan="7"></td>

                      <td>{{ getTotalChickenWeight() }}</td> <td> {{ getTotalChickenWeight() * 40 }}</td>
                      <td>{{ getTotalTotal() }}</td>
                      <td>{{ getTotalAdvance() }}</td>
                      <td>{{ getTotalPaid() }}</td>
                      <td>{{ getTotalBalance() }}</td>
                      <td></td>
                     </tr>
                   </tfoot>
    							 
                            </table>
                      	</div>
                         
                      	
    <div class="col-md-12"  >
    <!-- 
    /////////////////////////
    Create visit Modal -->
    <div id="create-visit-Modal" class="modal fade" role="dialog" >
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content" ng-init="editItem('new')" >
          <div class="modal-header" id="section-to-print">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class=" pull-left">Soria Khel Farm&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{visit_id_new}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<span><h4 class="pull-right"> {{time | date:'d-MM-y '}}</h4></span>
          </div>
          <div class="modal-body" id="section-to-print">
           
            
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url();?>/visit/print_slip" >
                <!-- input hidden fields for print -->
                <input type="hidden" ng-model="id"/>
                
                <input type = "hidden" name="visit_id" ng-model="visit_id" value="{{visit_id}}">
                <input type = "hidden" name="vehicle_number" ng-model="vehicle_number" value="{{vehicle_number}}">
                <input type = "hidden" name="driver_name" ng-model="driver_name" value="{{driver_name}}">
                <input type = "hidden" name="driver_cnic" ng-model="driver_cnic" value="{{driver_cnic}}">
                <input type = "hidden" name="broker_name" ng-model="broker_name" value="{{broker_name}}">
                <input type = "hidden" name="empty_weight" ng-model="empty_weight" value="{{empty_weight}}">
                <input type = "hidden" name="loaded_weight" ng-model="loaded_weight" value="{{loaded_weight}}">
                <input type = "hidden" name="chicken_weight" ng-model="chicken_weight" value="{{chicken_weight}}">
                <input type = "hidden" name="rate" ng-model="rate" value="{{rate}}">
                <input type = "hidden" name="total" ng-model="total" value="{{total}}">
                <input type = "hidden" name="advance" ng-model="advance" value="{{advance}}">
                <input type = "hidden" name="balance" ng-model="balance" value="{{balance}}">
                <input type = "hidden" name="current_paid" ng-model="current_paid" value="{{current_paid}}">
                <!-- input hidden end -->

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

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Empty Weight</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="empty_weight" ng-model="empty_weight" name="empty_weight" id="Title"    />
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Loaded weight:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="loaded_weight" ng-change="createvisit('loaded_weight')" ng-model="loaded_weight" name="loaded_weight" id="Title"  />
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Chicken Weight:</label>
                    <div class="col-sm-9" >
                      <input type="text" class="form-control" ng-model="chicken_weight"  
                      name="chicken_weight" id="chicken_weight" disabled />
                        
                    </div>
                    </div>
                    
                   <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Rate:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" n name="rate" value="<?php echo $rate ?>" id="Title" disabled  />
                    
                  </div>

                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Total:</label>
                    <div class="col-sm-9"   >
                      <input type="text" class="form-control" ng-model="total"  
                      name="total" id="total" disabled />
                        
                    </div>

                  </div>
 
                    <input type="hidden" class="form-control" ng-model="advance2" name="advance2" id="Title"    />

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Advance Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-change="createvisit('thishowwedo')" ng-model="advance" name="advance" id="current_paid"    />
                    </div>
                  </div>
    
                      <input type="hidden" class="form-control" ng-model="paid_visit" name="paid_visit" id="Title"    />
                      <input type="hidden" class="form-control" ng-model="paid_visit2" name="paid_visit2" id="Title"    />
                      

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Balance:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="balance" name="balance" id="balance"    />
                    </div>
                  </div>
                  <input type = "hidden" ng-model="balance2" ng-value="0" id="balance2" />

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Pay now:</label>
                    <div class="col-sm-9">
                      <input type="text" ng-change="createvisit('new')" class="form-control" ng-model="current_paid" name="current_paid" id="paynow"    />
                    </div>
                  </div>
                
         
         <div class="modal-footer">
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-8">

                      <button type="button" data-dismiss="modal" ng-click="createvisit()" ng-show="edit" class="btn btn-primary">Close</button>

                       <button type="submit" class="btn btn-default" > <i class="fa fa-print"></i> Print </button>

                      <button type="button"  ng-click="createvisit('update')" ng-hide="edit" class="btn btn-success bt-sm disabled-on-print">Update</button>

                      <button type="button"  data-dismiss="modal" ng-hide="edit" class="btn btn-default bt-sm">close</button>
                        
                      
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
    <?php  } else{ ?>
      <div class="col-md-4 col-md-offset-4">
      <h3 class="text-center"> No On Flock</h4>
      </div>
      <?php }?>
    </div> <!--end of main wrapper -->

     
     

