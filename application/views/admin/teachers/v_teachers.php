
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header lead"><?php echo $main; ?></h1>
    </div>
    <!-- /.col-sm-12 -->
</div>
<!-- /.row -->

<div ng-controller="teachersCtrl">


<div class="row">
    <div class="col-sm-12">
    <!-- Trigger the modal with a button -->
     <button type="button" class="btn btn-info btn-sm" ng-click="editItem('new')" data-toggle="modal" data-target="#create-Teacher-Modal">Add New Teacher</button>
    
    </div>
    <!-- /.col-sm-12 -->
</div>
<!-- /.row -->

<div class="row"  >
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $main; ?>
        </div>  
      <!-- /.panel-heading -->
    <div class="panel-body"  >
    <div>
    <input type="search" ng-model="itemSearch" class="form-control" placeholder="Search Teacher" />
    <br />
    </div>
    
<table class="table table-striped">
   <thead>
    <tr>
       
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
   </thead>
   
   <tbody ng-init="getAllTeachers()" ng-cloak>
    <tr ng-repeat="teacher in teachers | orderBy:'-name' | filter:itemSearch | limitTo:50" ng-cloak >
     
        <td>{{teacher.id}}</td>
        <td><a href="<?php echo site_url('admin/Teachers/uploads/') ?>/{{teacher.id}}">{{teacher.name}}</a></td>
        <td>{{teacher.email}}</td>
        <td>{{teacher.address}}</td>
        <td>{{teacher.city}}</td>
        <td>{{teacher.country}}</td>
        <td>{{teacher.status}}</td>
        
        <td>
            <div class="btn-group">
              <a class="btn btn-primary btn-sm" href="#">Options</a>
              <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="fa fa-caret-down"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="#" data-toggle="modal" ng-click="editItem(teacher.id)" data-target="#create-Teacher-Modal"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
                <li><a href="<?php //echo site_url('pos/items/delete/'.$list['item_id']) ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
                
              </ul>
            </div>
        </td>
    </tr>
   </tbody> 
   
</table>

</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>
    <!-- /.col-sm-12 -->
</div>
<!-- /.row -->

<!-- 
/////////////////////////
Create Teacher Modal -->
<div id="create-Teacher-Modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New Teacher</h4>
      </div>
      <div class="modal-body">
        <p><?php //echo  $this->load->view('pos/items/create'); ?></p>
        
        <form class="form-horizontal" role="form">
            
            <input type="hidden" ng-model="id"/>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="name">Teacher Name:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="name" id="name" placeholder="Teacher Name" />
                </div>
              </div>
              
            <div class="form-group">
                <label class="control-label col-sm-3" for="sername">Username:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="username" id="Username" placeholder="Username" />
                </div>
              </div>
            
             <div class="form-group">
                <label class="control-label col-sm-3" for="Password">Password:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="password" id="Password" placeholder="Password" />
                </div>
              </div>
            
             <div class="form-group">
                <label class="control-label col-sm-3" for="confirm_password">Confirm Password:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                </div>
              </div>
            
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Email:</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" ng-model="email" id="email" placeholder="Teacher Email" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-3" for="country">Country:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="country" id="country" placeholder="Country" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-3" for="city">City:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="city" id="city" placeholder="City" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-3" for="address">Address:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="address" id="address" placeholder="Address" />
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-3" for="about">About Yourself:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" id='about' placeholder="About Yourself" ng-model="about"></textarea>
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-sm-3" for="about">Status:</label>
                <div class="col-sm-9">
                    <select class="form-control" name="status" ng-model="status" ng-init="status='inactive'">
                        <option value="0">Please Select</option>
                        <option value="active">Active</option>
                         <option value="inactive">Inactive</option>
                    </select>
                    
                </div>
              </div>
              <!--
              <div class="form-group">
                <label class="control-label col-sm-3" for="reorder_level">Min Stock:</label>
                <div class="col-sm-9"> 
                  <input type="number" class="form-control" ng-model="reorder_level" id="" placeholder="Minimum Stock" />
                </div>
              </div>
               
            </form> -->
      </div>
     
     <div class="modal-footer">
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" data-dismiss="modal" ng-click="createTeacher()" ng-show="edit" class="btn btn-default">Save</button>
                  <button type="submit" data-dismiss="modal" ng-click="createTeacher('update')" ng-hide="edit" class="btn btn-default">Update</button>
                  
                  <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        
      </div>
    </div>
</div>
</div>
<!-- END Create Teacher Modal 
///////////////////////////////
//////////////////////////////
-->


</div><!-- /. ng-controller -->
