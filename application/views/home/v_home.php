 
<style>
    td, th {
        text-align: center;
    }
</style>

<div class="content-wrapper">
     
    <!-- Main content -->
	 
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                 
                        <div class="col-md-2" style="padding:30px 0px;">  
                            <a href="<?php echo site_url();?>/home/create_flock" class="btn btn-primary">Make New flock</a>
                        </div>

                         
                        
                    </div><!-- /.box-header -->
                    <?php if(!empty($flock)) { ?>
                     <div class="col-md-12">
                         <table id="customerDataView" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                   <th>Serial No</th>
                                   <th>Flock Number</th>
                                   <th> date</th>
                                   <th>Total Birds</th>
                                   <th>total weight</th>
                                   <th>Remaining weight</th>
                                   <th> weight Sale</th>
                                   <th>Missing Birds</th>
                                    <th>Total Amount</th>
                                   <th>Paid Amount</th>
                                   <th>Balance</th>

                                   <th>Delete Flock</th> 
                                    <th>Edit Flock</th>
                                  
                            </tr>
                            </thead>
                             <?php $sno=1; ?>
                            <?php foreach($flock as $row): ?>
                            <tbody>
                            <?php 
                            $rate = $row['rate'];
                            $total_bird = $row['total_bird'];
                            $remaining_weight = $row['total_weight'];
                            $actual_weight = $row['actual_weight'];
                            $sale_weight = $actual_weight-$remaining_weight;
                            $total_flock = (($actual_weight)/40)*$rate;
                            $paid_flock = $row['paid_flock'];
                            $balance = $total_flock-$paid_flock;
                            $missing_bird = $remaining_weight/$row['per_bird_weight'];

                            ?>
			       
							<tr>
             
						 <td><?php echo $sno;?></td>
              <td><?php echo $row['f_id'];?></td>
						 <td><?php echo $row['f_date'];?></td>	
             <td><?php echo $total_bird;?></td>
             <td><?php echo $actual_weight;?></td>
             <td><?php echo $remaining_weight;?></td>
            <td><?php echo $sale_weight;?></td>
            <td><?php echo $missing_bird;?></td>
            <td><?php echo $total_flock;?></td>
            <td><?php echo $paid_flock;?></td>
            <td><?php echo $balance;?></td>


							 <td><a href="<?php echo site_url();?>/home/delete_flock/<?php echo $row['f_id'];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete Flock</a>
               </td>
 
                
               <td><a href="<?php echo site_url();?>/home/edit_flock/<?php echo $row['f_id'];?>" class="btn btn-primary">Edit Flock</a>
               </td>  
                <!-- detail button
               <td><a href="<?php// echo site_url();?>/home/flock_wise_visit/<?php// echo $row['f_id'];?>" class="btn btn-primary">View detail</a>
               </td>   -->
               
							 </tr>
               <?php $sno++ ; ?>
							 </tbody>

							<?php endforeach; ?>
                        </table>
                  	</div>
                  	<?php }else {?>
                  		<h3>No flock found</h3>
                  		<?php } ?><!-- end of if for empty data-->
                  	</div><!-- main row-->

    </section>
    </div><!-- main div -->
 

