
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header lead"><?php echo $main; ?></h1>
    </div>
    <!-- /.col-sm-12 -->
</div>
<!-- /.row -->

<div ng-controller="teachersCtrl">

<div class="row"  >
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $main; ?>
        </div>  
      <!-- /.panel-heading -->
    <div class="panel-body"  >
    
    <?php if($uploads)
    {
    ?>
    <table class="table table-striped">
       <thead>
        <tr>
           
            <th>ID</th>
            <th>Document Title</th>
            <th>Document Link</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
       </thead>
       <tbody>
       
    <?php
        foreach($uploads as $values):
    ?>
    
     <tr>
         
            <td><?php echo $values['id'] ?></td>
            <td><?php echo $values['title'] ?></td>
            <?php //echo anchor('assets/teachers/'.$values['doc_name'],$values['doc_name'],'target="_blank"'); ?>
            <td><a href="<?php echo base_url('assets/teachers/'.$values['doc_name']); ?>" target="_blank"><?php echo $values['doc_name']; ?></a></td>
            <td><?php echo $values['status'] ?></td>
            
            <td>
                <div class="btn-group">
                  <a class="btn btn-primary btn-sm" href="#">Options</a>
                  <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" href="#">
                    <span class="fa fa-caret-down"></span></a>
                  <ul class="dropdown-menu">
                    
                    <li><a href="#" ng-click="activateUploads(<?php echo $values['id'] ?>)" ><i class="fa fa-pencil fa-fw"></i> Activate</a></li>
                    <li><a href="#" ng-click="inActivateUploads(<?php echo $values['id'] ?>)" ><i class="fa fa-pencil fa-fw"></i> Inactivate</a></li>
                    <li><a href="#" ng-click="rejectUploads(<?php echo $values['id'] ?>)" ><i class="fa fa-pencil fa-fw"></i> Rejected</a></li>
                    
                  </ul>
                </div>
            </td>
        </tr>
    <?php
        endforeach;
    } 
    ?>
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

</div><!-- /. ng-controller -->
