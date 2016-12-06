
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header lead"><?php echo $main; ?></h1>
    </div>
    <!-- /.col-sm-12 -->
</div>
<!-- /.row -->

<div ng-controller="subjectsCtrl">


<div class="row">
    <div class="col-sm-12">
    <!-- Trigger the modal with a button -->
     <button type="button" class="btn btn-info btn-sm" ng-click="editItem('new')" data-toggle="modal" data-target="#create-subject-Modal">Add New subject</button>
    
    </div>
    <!-- /.col-sm-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $main; ?>
        </div>  
      <!-- /.panel-heading -->
    <div class="panel-body"  >
    <div>
    <input type="search" ng-model="itemSearch" class="form-control" placeholder="Search Subjects" />
    <br />
    </div>
    
<table class="table table-striped">
   <thead>
    <tr>
       
        <th>ID</th>
        <th>Title</th>
        <th>Short Description</th>
       
        <th>Status</th>
        <th>Action</th>
    </tr>
   </thead>
   
   <tbody ng-init="getAllSubjects()" ng-cloak>
    <tr ng-repeat="subject in subjects | orderBy:'-name' | filter:itemSearch | limitTo:50" ng-cloak >
     
        <td>{{subject.id}}</td>
        <td>{{subject.subject_title}}</td>
        <td>{{subject.short_desc}}</td>
        
        <td>{{subject.status}}</td>
        
        <td>
            <div class="btn-group">
              <a class="btn btn-primary btn-sm" href="#">Options</a>
              <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="fa fa-caret-down"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="#" data-toggle="modal" ng-click="editItem(subject.id)" data-target="#create-subject-Modal"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
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
Create subject Modal -->
<div id="create-subject-Modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New subject</h4>
      </div>
      <div class="modal-body">
        <p><?php //echo  $this->load->view('pos/items/create'); ?></p>
        
        <form class="form-horizontal" role="form">
            
            <input type="hidden" ng-model="id"/>
            
             <div class="form-group" ng-init="getParentSubjects()">
                <label class="control-label col-sm-3" for="about">Parent:</label>
                <div class="col-sm-9">
                    <select class="form-control" ng-model="parent_id" ng-init="parent_id=0">
                        <option value="0">Please Select</option>
                        <option ng-repeat="parent in parentSubjects" value="{{parent.id}}">{{parent.subject_title}}</option>
                            
                    </select>
                    
                </div>
              </div>
            
             <div class="form-group">
                <label class="control-label col-sm-3" for="Title">Subject Title:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" ng-model="subject_title" id="Title" placeholder="Subject Name" />
                </div>
              </div>
              
            <div class="form-group">
                <label class="control-label col-sm-3" for="short_desc">Short Description:</label>
                <div class="col-sm-9">
                    <textarea class="form-control" ng-model="short_desc" id="short_desc"></textarea>
                  
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
              
      </div>
     
     <div class="modal-footer">
            <div class="form-group"> 
                <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" data-dismiss="modal" ng-click="createSubject()" ng-show="edit" class="btn btn-default">Save</button>
                  <button type="submit" data-dismiss="modal" ng-click="createSubject('update')" ng-hide="edit" class="btn btn-default">Update</button>
                  
                  <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                </div>
              </div>
            </form>
        
      </div>
    </div>
</div>
</div>
<!-- END Create subject Modal 
///////////////////////////////
//////////////////////////////
-->


</div><!-- /. ng-controller -->
