        
         
            <h2 class="alert-danger pull-left "><?php echo $this->session->flashdata('msg');?></h2> &nbsp;&nbsp;&nbsp;<span>  <h1 class="text-center ">Advance Search</h1></span>
            
            <div class="box-body" ng-controller="advanceCtrl">
      <div class="box-header">
              <a href="<?= site_url()?>/report/complete_report" class="btn btn-primary"> All Flocks</a>
              </div>
              <form ng-hide="searchForm" role="form" method="post" action="<?php echo site_url()?>/report/unpaid_search">
              <div class="row" >

                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Driver Name</label>
                    <input type="text" name="driver_name" ng-model="driver_name"  class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div><!-- /.col -->

               <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="driver_cnic" ng-model="driver_cnic" id="cnic" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                </div>

               <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Vehicle Number</label>
                    <input type="text" name="vehicle_number" ng-model="vehicle_number" id="vehicle" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>

                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Broker Name</label>
                    <input type="text" name="broker_name" ng-model="broker_name" id="broker" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>

               <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Flock Number</label>
                    <input type="text" id="flock" name="f_id" ng-model="f_id" class="form-control" style="width: 100%;">
                  </div><!-- /.form-group -->
                 </div>
 
             <!--  <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>Weapon</label>
                   <select name="adv_weapon" class="form-control" style="width: 100%;">
                      <option value="">Select Weapon</option>
                      <option value="self">SELF</option>
                      <option value="club">CLUB</option>
                   </select>
                  </div><!-- /.form-group 
                </div> -->
         
               <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>From</label>
                    <input type="date" name="from_date" ng-model="from_date" class="form-control" style="width: 100%;">
                   </div><!-- /.form-group -->
                </div>
              <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <label>To</label>
                    <input type="date" name="to_date" ng-model="to_date" class="form-control" style="width: 100%;">
                   </div><!-- /.form-group -->
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 col-xs-offset-3">
                  <div class="form-group">
                    <input   value="Search" ng-click="advancePostdata('success')" class="btn btn-success" style="width: 50%;"> <span class="pull-right"> 
                    <input type="submit" value=" unpaid" name="unpaid" class="btn btn-info" style="width: 100%;"></span>
                      
                  </div><!-- /.form-group -->
                  
                </div>
        
              </div><!-- /.row -->
            </form>

                <div class="col-md-12" ng-show="searchForm"  ng-init="advancePostdataJSON()" >

                               <div  class="col-md-4 col-md-offset-4" style="width:50%, margin-bottom:20px; padding-bottom:30px;">
                                  
                                  <input id="testing" type="search" ng-model="advanceSearch" class="form-control report highlight" style="border: 3px solid #000" />
                                    
                               </div>

                               <div class="col-md-12">

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
                                   
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                  <th>Mann</th>
                                  <th>Kg</th>
                                   
                                 </tr> 

                                 
                               <tbody  ng-repeat="search in searchs | orderBy: array('-visit_id','reverse' )|  filter:advanceSearch"> 
                             
                  <tr >
                 <td>{{$index+1}}</td>
                 <td ><button type="button" id="test" ng-click="editSearch(search.visit_id)"   class="btn btn-info btn-sm" data-toggle="modal" data-target="#create-visit-Modal">{{search.driver_name}}</button></td> 
                 
                  <td>{{search.vehicle_number}}</td>
                  <td>{{search.driver_cnic}}</td>
                  <td>{{search.broker_name}}</td>
                  <td>{{search.rate}}</td>
                  <td>{{search.empty_weight/40}}</td><td>{{search.empty_weight}}</td>
                  <td>{{search.loaded_weight/40}}</td><td>{{search.empty_weight}}</td>
                  <td >{{search.chicken_weight}}</td><td >{{search.chicken_weight * 40}}</td>
                     
                   <td >{{(search.chicken_weight * 1)*(search.rate * 1)}}</td>
                    
                  <td>{{search.advance}}</td>
                   
                   <td>{{search.paid_visit}}</td>
                  <td>{{search.balance}}</td>
                     
                   </tr>
                   </tbody>
                   <tfoot>
                     <tr>
                      <td></td>
                      <td>Total</td>
                      <td colspan="8"></td>

                      <td>{{ getTotalChickenWeight() }}</td> <td> {{ getTotalChickenWeight() * 40 }}</td>
                      <td>{{ getTotalTotal() }}</td>
                      <td>{{ getTotalAdvance() }}</td>
                      <td>{{ getTotalPaid() }}</td>
                      <td>{{ getTotalBalance() }}</td>
                      
                     </tr>
                   </tfoot>
                
                  </table>
              </div><!--md-12 table-->
         </div>

                        <!-- after view table -->
                       <div class="col-md-12"  >
    <!-- //////////////////////// Create visit Modal -->
    
    <div id="create-visit-Modal" class="modal fade" role="dialog" >
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" id="section-to-print">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class=" pull-left">ABC Chicken Zone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{index+1}}</h4>&nbsp;&nbsp;&nbsp;&nbsp;<span><h4 class="pull-right"> {{time | date:'d-MM-y '}}</h4></span>
          </div>
          <div class="modal-body" id="section-to-print">
           
            
            <form class="form-horizontal" role="form" >
                
                <input type="hidden" ng-model="id"/>
                      <input type="hidden" name="visit_id" value="{{search.visit_id}}">
                       <input type="hidden" name="f_id" value="{{search.f_id}}">
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Vehicle Number</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="vehicle_number" name="vehicle_number" id="Title"  disabled />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Driver Name:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_name" name="driver_name" id="Title"  disabled  />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Phone:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="driver_cnic" name="driver_cnic" id="Title"  disabled />
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Artee Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="broker_name" name="broker_name" id="Title" disabled  />
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Empty Weight</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="empty_weight" name="empty_weight" id="Title" disabled   />
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Loaded weight:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  ng-model="loaded_weight" name="loaded_weight" id="Title" disabled />
                    </div>
                  </div>

                  <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Chicken Weight:</label>
                    <div class="col-sm-9"   >
                      <input type="text" class="form-control" ng-model="chicken_weight"  
                      name="chicken_weight" id="Title" disabled />
                        
                    </div>

                  </div>

                   <div class="form-group" >
                    <label class="control-label col-sm-3" for="Title">Rate:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control"  name="rate" ng-model="rate" id="Title" disabled  />
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Total:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="total" name="total" id="Title"  disabled  />
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Advance Amount:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="advance" name="advance" id="Title"  disabled  />
                    </div>
                  </div>
   
                 
                   
                    <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Paid:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="paid_visit" name="paid_visit" id="Title"  disabled  />
                    </div>
                  </div> 

                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Balance:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-model="balance" name="balance" id="balance"  disabled  />
                    </div>
                  </div>
                  <input type="text" class="form-control" ng-model="balance2" name="balance2" id="balance2" disabled />
                   <div class="form-group">
                    <label class="control-label col-sm-3" for="Title">Pay now:</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" ng-change="updatefromvalue()" ng-model="current_paid" name="current_paid" id="current_paid"    />
                    </div>
                  </div>
                
         
         <div class="modal-footer">
                <div class="form-group"> 
                    <div class="col-sm-offset-4 col-sm-8">

                       
                       <button class="btn btn-default"  onclick="window.print();"> <i class="fa fa-print"></i> Print </button>

                      <button type="submit"  ng-click="updateSearch()" ng-hide="edit" class="btn btn-success bt-sm">Update</button>

                      <button type="submit"  data-dismiss="modal" ng-hide="edit" class="btn btn-default bt-sm">close</button>
                      
                      
                    </div>
                  </div>
           </div>
                </form>
            </div><!--modal body end-->
          </div>
        </div>
    </div>
    </div><!--col-md -12 --><!-- END Create visit Modal -->

            </div><!-- /.box-body -->
           
           
        
   
        