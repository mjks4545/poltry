     
    <style>
        td, th {
            text-align: center;
        }
    </style>

    <div class="content-wrapper">
         
        <!-- Main content -->
       
        <section class="content" ng-controller="reportCtrl">
            <div class="row" >
             
                
                <div class="col-md-12" ng-init="getAllreport()" >
                <!-- Add Record button -->
                            
              <!-- for report input box -->
                             <div class="col-md-4 col-md-offset-4" style="padding:30px 0px; ">
                                  
                                  <input id="testing" type="report" ng-model="itemreport" class="form-control report highlight" style="border: 3px solid #000" /> 
                                     
                                    <br />
                               </div>
              <!-- for detail -->
                          
                            
                  </div><!-- /.md 12 -->
                       
                         <div class="col-md-12"   >

                             <table  class="table table-striped  table-override" cellspacing="0" width="100%"   >
                                <thead class="table-heading">
                                <tr>
                                     <th>S.No</th>
                                     <th>Driver Name</th>
                                    <th>Vehicle Number</th>
                                    
                                     <th>phone</th>
                                      
                                     <th>Paid</th> 
                                     <th>Balance</th>
                                     
                                       
                                </tr>
                                </thead>
                                 
                               <tbody  ng-repeat="report in reports | orderBy: array('-report_id','reverse' )|  filter:itemreport "> 
   
                  <tr  >
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
                         
                      <!--
                      <button type="submit" data-dismiss="modal"  ng-click="createreport('unpaid')" ng-hide="edit" class="btn btn-danger bt-sm pull-left">unpaid</button>
                     -->
                      
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


     
     

