      
    <style>
      td, th {
          text-align: center;
      }
       @media print
      {
        .box {
     font-weight: 600;
     font-size: 18px;      
     margin-left:150px;
     margin-top: -200px;
     
          }
          .hidding{
            margin:0px;padding:0px;
          }
        
      }
    </style>
    
     <section  class="hidding" >

        <div class="row" >
        <?php //print_r($print_data); die; ?>

          <?php if(!empty($print_data)) { ?>
  
<!-- for print view -->
              <div class="col-md-12" >
                        <center id="section-to-print" class="box">
                          <table class="table table-striped" style="width:100%;">
                          <h4 style="margin-bottom:5px;">
                          Soria Khel Farm:&nbsp;&nbsp;&nbsp;<?php echo $print_data['visit_id'] ;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?php  echo date('d-m-Y');?></span></h4>
                                <tbody>
                                        <tr >
                                          <th style="border-top:3px;">Vehicle Number</th>
                                          <td style="border-top:3px;"> <?php echo $print_data['vehicle_number'] ?>  </td>
             
                                            </tr>
                                            <tr>
                                              <th>Driver Name</th>
                                              <td> <?php echo $print_data['driver_name'] ;?>  </td>
             
                                            </tr>
                                            <tr>
                                               <th>Phone</th>
                                              <td> <?php echo $print_data['driver_cnic'] ;?>  </td>
             
                                            </tr>
                                            <tr>
                                                <th>Artee Name</th>
                                              <td> <?php echo $print_data['broker_name'] ;?>  </td>
             
                                            </tr>
                                             <tr>
                                               <th>Empty Weight</th>
                                              <td> <?php echo $print_data['empty_weight'] ;?>  </td>
             
                                              </tr>
                                              <tr>
                                                 <th>Loaded Weight</th>
                                                  <td> <?php echo $print_data['loaded_weight'] ;?>  </td>
             
                                               </tr>
                                               <tr>
                                                 <th>Chicken Weight</th>
                                                 <td> <?php echo $print_data['chicken_weight'] ;?>  </td>
             
                                               </tr>
                                               <tr>
                                                  <th>Rate</th>
                                                 <td> <?php echo $print_data['rate'] ;?>  </td>
                                                </tr>
                                                  </tr>
                                               <tr>
                                                 <th>Total</th>
                                                 <td> <?php echo $print_data['total'] ;?>  </td>
             
                                               </tr>
                                               <tr>
                                                  <th>Advance</th>
                                                 <td> <?php echo $print_data['advance'] ;?>  </td>
                                                </tr>
                                                  </tr>
                                               <tr>
                                                 <th>Balance</th>
                                                 <td> <?php echo $print_data['balance'] ;?>  </td>
             
                                               </tr>
                                               <tr>
                                                  <th>Pay now</th>
                                                 <td> <?php echo $print_data['current_paid'] ;?>  </td>
                                                </tr>
       
                                    </tbody>
                            </table>
                            </center>
                      </div> <!-- md 12 end -->
                        <?php }?>

              </div> <!-- row end -->
              <!-- <button onclick="window.print()" >i am print</button> -->
    </section>

 
<script type="text/javascript">
        // Handler for .ready() called.
        window.print();
    </script>  