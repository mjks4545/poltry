 
<style>
    td, th {
        text-align: center;
    }
</style>

<div class="content-wrapper" ng-controller="reportCtrl">
     
    <!-- Main content -->
   
    <section class="content" >
        <div class="row" id="flock" ng-hide="edit">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                 
                        <div class="col-md-4 col-md-offset-4" style="padding:30px 0px;">  
                             <h1 class="text-center">All Flocks</h1>
                        </div>                        
                    </div><!-- /.box-header -->
                    <?php if(!empty($complete)) { ?>
                     <div class="col-md-12">
                        <table  class="table table-striped  table-override" cellspacing="0" width="100%"   >
                               
                            <tr>
                                   <th rowspan="2">Serial No</th>
                                   <th rowspan="2">Flock Number</th>
                                   <th rowspan="2"> date</th>
                                    <th rowspan="2">Rate</th>
                                   <th rowspan="2">Total Birds</th>
                                   <th colspan="2">total weight</th>
                                   
                                   <th colspan="2"> Sale weight</th>
                                   <th colspan="2">Remaining weight</th>
                                   <th rowspan="2">Missing Birds</th>
                                   <th rowspan="2">Total Amount</th>
                                   <th rowspan="2">Paid Amount</th>
                                   <th rowspan="2">Balance</th>
 
                            </tr>
                            
                             <tr>
                                 <!-- <th colspan="4"></th> -->
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                <!--  <th colspan="5"></th> -->
                                 </tr>
                              <!-- for sub total -->    
                             <?php $sno=1; 
                                   $sub_total_bird = 0;
                                   $sub_remaining_weight = 0;
                                   $sub_actual_weight = 0;
                                   $sub_sale_weight = 0;
                                   $sub_total_flock = 0;
                                   $sub_paid_flock = 0;
                                   $sub_balance = 0;
                                   $sub_missing_bird = 0;
                             ?>
                             <!-- sub total end --> 
                            <?php foreach($complete as $row): ?>
                            
                            <tbody>
                            <?php 
                            $rate = $row->rate;
                            $total_bird = $row->total_bird;
                            $sub_total_bird +=$total_bird;
                            $remaining_weight = $row->remaning;
                             $sub_remaining_weight += $remaining_weight;
                            $actual_weight = $row->actual_weight;
                             $sub_actual_weight += $actual_weight;
                            $sale_weight = $row->sum;
                             $sub_sale_weight += $sale_weight;
                            $total_flock = (($actual_weight)/40)*$rate;
                            $sub_total_flock += $total_flock;
                            $paid_flock = $row->paid_flock;
                             $sub_paid_flock += $paid_flock;
                            $balance = $total_flock-$paid_flock;
                            $sub_balance += $balance;
                            $missing_bird = $remaining_weight/$row->per_bird_weight;
                            $sub_missing_bird += $missing_bird;
                            ?>
             
              <tr>
             
             <td><?php echo $sno;?></td>
              <td><a href="<?php echo site_url();?>/report/flock_detail/<?php echo $row->f_id;?>" class="btn btn-primary" > <?php echo $row->f_id;?> </a></td>
             <td><?php echo $row->f_date;?></td>
             <td><?php echo $row->rate;?></td>  
             <td><?php echo $total_bird;?></td>
             <td><?php echo ($actual_weight/40);?></td> <td><?php echo $actual_weight;?></td>
             <td><?php echo ($sale_weight/40);?></td>  <td><?php echo ($sale_weight);?></td>
             <td><?php echo ($remaining_weight/40);?></td> <td><?php echo $remaining_weight;?></td>
            
            <td><?php echo (int)$missing_bird;?></td>
            <td><?php echo $total_flock;?></td>
            <td><?php echo $paid_flock;?></td>
            <td><?php echo (($total_flock)-($paid_flock));?></td>
   
               </tr>
               <?php $sno++ ; ?>
               </tbody>

              <?php endforeach; ?>
              
                    <tr>
                      <td colspan="4"></td>

                      <td><?php echo $sub_total_bird; ?> </td> 
                      <td><?php echo ($sub_actual_weight/40); ?> </td> <td><?php echo $sub_actual_weight; ?> </td>
                      <td><?php echo ($sub_sale_weight/40); ?> </td> <td><?php echo $sub_sale_weight; ?></td>
                      <td><?php echo ($sub_remaining_weight/40); ?> </td> <td><?php echo $sub_remaining_weight; ?> </td>
                      <td> <?php echo (int)($sub_missing_bird); ?> </td>
                      <td> <?php echo $sub_total_flock; ?> </td>
                      <td> <?php echo $sub_paid_flock; ?> </td>
                      <td> <?php echo $sub_balance; ?> </td>
                       
                    </tr>
                   
                        </table>
                    </div>
                    <?php }else {?>
                      <h3>No flock found</h3>
                      <?php } ?><!-- end of if for empty data-->
                    </div><!-- main row-->

    </section>



    <style>
        td, th {
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
         
        <!-- Main content -->
       
        <section class="content" >
            <div class="row" id="visit" ng-show="edit" >
             
                
                <div class="col-md-12" ng-init="getAllreport()" >
                <!-- Add Record button -->
                            
              <!-- for report input box -->
                             <div class="col-md-4 col-md-offset-4" style="padding:30px 0px; ">
                                  
                                  
                                     
                                    <br />
                               </div>
              <!-- for detail -->
                    
                     <div class="col-md-12"   >

                       <table id="customerDataView" class="table table-striped table-bordered" cellspacing="0" width="100%"  >
                                <thead>
                                <tr>
                                     <th>S.No</th>
                                     <th>Driver Name</th>
                                    <th>Vehicle Number</th>
                                    
                                     <th>phone</th>
                                      <th>current Rate</th>
                                      <th>Advance</th>
                                      <th>Empty Weight</th>
                                      <th>loaded weight</th>
                                     <th>Paid</th> 
                                     <th>Balance</th>
                                                 
                                </tr>
                                </thead>
                                 
              <tbody  ng-repeat="report in reports "> 
   
                <tr >
                 <td>{{$index+1}}</td>
                 <td ><button type="button" id="test" ng-click="editItem(report.visit_id)"   class="btn btn-info btn-sm" data-toggle="modal" data-target="#create-report-Modal">{{report.driver_name}}</button></td> 
                 
                  <td> {{report.vehicle_number}}</button></td>
                  <td>{{report.driver_cnic}}</td>
                  <td>{{report.rate}}</td>
                  <td>{{report.advance}}</td>
                  <td>{{report.empty_weight}}</td>
                   <td>{{report.loaded_weight}}</td>
                   <td>{{report.paid_visit}}</td>
                  <td>{{report.balance}}</td>
                   
              </tr>
           </tbody>
                   
        </table>
      </div>
    </div><!-- /.md 12 -->
                         
                        
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
          <div class="modal-body" id="section-to-print">
           
            
            <form class="form-horizontal" role="form" >
                
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
                    <label class="control-label col-sm-3" for="Title">phone:</label>
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
                    <label class="control-label col-sm-3" for="Title">Advance Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="advance" name="advance" id="Title"    />
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
                    <label class="control-label col-sm-3" for="Title">Paid:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="paid_report" name="paid_report" id="Title"    />
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

                      <button type="submit" data-dismiss="modal" ng-click="createreport()" ng-show="edit" class="btn btn-primary">Close</button>

                       <button class="btn btn-default"  onclick="window.print();"> <i class="fa fa-print"></i> Print </button>

                      <button type="submit"  ng-click="createreport('update')" ng-hide="edit" class="btn btn-success bt-sm">Update</button>

                      <button type="submit"  data-dismiss="modal" ng-hide="edit" class="btn btn-default bt-sm">close</button>
                       
                    </div>
                  </div>
               </div>
              </form>
            </div><!--modal body end-->
          </div>
        </div>
    </div>
   </div><!--col-md -12 --><!-- END Create report Modal -->
  </div> <!-- row-->
  </section>
</div> <!--end of main wrapper -->


     
     


    </div><!-- main div -->
 

