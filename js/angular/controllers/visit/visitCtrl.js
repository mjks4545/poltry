 

        var app = angular.module('myApp', []);
        var site_url = 'http://localhost:8079/poltry/index.php/';
 
        app.controller('visitCtrl', function($scope,$http,$timeout)
 {
    // enter keypress
    
    
    $scope.loader = true;//show loader gif
    
    //get all visit
    $scope.getAllvisit = function()
    {
     
        $http.get(site_url+'visit/getAllvisitJSON').success(function(data)
        {
         
         $scope.visits = data;
         
        // for getting time
     
    });
      }
      
      // time function

            $scope.time = new Date();
             $scope.runTimer = function () 
    {
            $scope.time = new Date();
            mytimer = $timeout($scope.runTimer, 1000);
     }
            var mytimer = $timeout($scope.runTimer, 1000); 
     
    // clear variable / form values
             $scope.clearForm = function()
    {
            $scope.empty_weight='';
            $scope.rate= '';
            $scope.advance='';
            $scope.vehicle_number='';
            $scope.driver_name='';
            $scope.driver_cnic='';
            $scope.loaded_weight='';
           // $scope.broker_name='';
            $scope.balance='';
            $scope.balance2='';
            $scope.paid_visit='';
            $scope.current_paid='';
            $scope.chicken_weight='';
            $scope.total='';
          
    }
     // clear edit form values
    $scope.clearEditField = function()
    {
             
             $scope.current_paid='';
          
    }
    
    
    // for create and update records
    
            $scope.editItem = function(id)
     {
        
            if(id === 'new')
        {
            
            $scope.edit = true;
            $scope.clearForm();
            $http.post( site_url + 'visit/get_serail_no','').success(function (data, status, headers, config)
            {
                // alert(data);
                $scope.visit_id_new = data;
            }).error(function(data){
                alert('error no data inserted'); 
            });
        }
        else
        {
           
             $scope.edit = false;
            // $scope.clearEditField();
            //search visit using visit id
            var returnData = $.grep($scope.visits,function(element,index)
            {
              return (element.visit_id == id);
            })
           
            $scope.visit_id_new = parseInt(returnData[0].visit_id);
            $scope.visit_id=parseInt(returnData[0].visit_id);
            $scope.empty_weight= returnData[0].empty_weight;
            $scope.rate = returnData[0].rate;
            $scope.advance=returnData[0].advance;
             $scope.advance2=returnData[0].advance;
            $scope.vehicle_number=returnData[0].vehicle_number;
             $scope.driver_name=returnData[0].driver_name;
           $scope.driver_cnic=returnData[0].driver_cnic;
             $scope.loaded_weight=returnData[0].loaded_weight;
             $scope.balance=returnData[0].balance;
             $scope.balance2=returnData[0].balance;
              $scope.broker_name=returnData[0].broker_name;
             $scope.paid_visit=returnData[0].paid_visit;
             $scope.paid_visit2=returnData[0].paid_visit;             
            $scope.chicken_weight=returnData[0].chicken_weight;
            $scope.total= ($scope.advance * 1 )+($scope.paid_visit * 1 )+($scope.balance * 1);
             $scope.v_status = returnData[0].v_status;
        }
    }
    
     // create new or upadte visit 
    $scope.createvisit = function(type)
    {
           
            if(type === 'update')
         {
            var file = site_url+'visit/ngEdit';
         }else if(type === "loaded_weight") {

          var loaded_weight  = angular.element( $('#loaded_weight') ).val();
          var empty_weight   = angular.element( $('#empty_weight') ).val();
          var check          = loaded_weight - empty_weight;
          var chicken_weight =  check /40;
          var total          = chicken_weight  * $scope.rate;
          var balance        = total - angular.element( $('#current_paid') ).val();
          balance            = balance - angular.element( $('#paynow') ).val();

          if( check < 0 ){
            angular.element( $('#chicken_weight') ).val( 0 );
            angular.element( $('#total') ).val( 0 );
            angular.element( $('#balance') ).val( 0 );
          }else{
            angular.element( $('#chicken_weight') ).val( chicken_weight );
            angular.element( $('#total') ).val( total );
            angular.element( $('#balance') ).val( balance );
          }
          var file = site_url+'visit/ngcallitwhenupdate';
         
         }else if(type === "new") {
        
          var $var = $scope.balance2;
          $scope.balance =  $var - $scope.current_paid;
          var file = site_url+'visit/ngcallitwhenupdate';

         }else if( type === 'thishowwedo' ) {
            //if there was some problem we will check
            //$scope.balance =  $scope.balance2 - $scope.advance;
            var name     = angular.element( $('#current_paid') ).val();
            var balance2 = angular.element( $('#balance2') ).val();
            // console.log( name + '    ' + balance2 );
            // angular.element( $('#balance') ).val(balance2 - name);  
            $scope.balance = balance2 - name;
            var file = site_url+'visit/iamnewfunction';
          
          }else if( type === 'vehicle' ) {
            var file = site_url+'visit/vehicle';
          }else if( type === 'name' ) {
            var file = site_url+'visit/name';
          }else if( type === 'cnic' ) {
            var file = site_url+'visit/cnic';
          }else if( type === 'broker' ) {
            var file = site_url+'visit/broker';
          }else if( type === 'emptys' ) {
            var file = site_url+'visit/empty';
          }else if( type === 'loaded' ) {
            var file = site_url+'visit/loaded';
          }

        else
        { 
            //alert("hi i am ngCreate");
            var file = site_url+'visit/ngCreate';  
        }
        
        // fields in key-value pairs
        $http.post(file, {
                'visit_id'      : $scope.visit_id,
                'empty_weight'  : $scope.empty_weight,
                'rate'          : $scope.rate,
                'advance'       : $scope.advance,
                'advance2'      : $scope.advance,
                'vehicle_number' : $scope.vehicle_number,
                'driver_name'    : $scope.driver_name,
                'driver_cnic'    : $scope.driver_cnic,
                'loaded_weight'  : $scope.loaded_weight,
                'balance'        : $scope.balance,
                'balance2'       : $scope.balance,
                'current_paid'   : $scope.current_paid,
                'broker_name'    : $scope.broker_name,
                'paid_visit'     : $scope.paid_visit,
                'paid_visit2'    : $scope.paid_visit,
                'chicken_weight' : $scope.chicken_weight,
                'v_status'       : $scope.v_status 
            }
        ).success(function (data, status, headers, config)
         {  
             if( type == 'update'){
                $scope.clearEditField(); 
             } 
             $scope.getAllvisit();
        }).error(function(data){
            alert('error no data inserted'); 
        });
    }

    $scope.getTotalChickenWeight = function(){
      var total = 0;
     // console.log($scope.visits);
       for( var i in $scope.visits){
          var product = $scope.visits[i];
          total += parseFloat(product.chicken_weight);
       }
       return total;
    }

    $scope.getTotalTotal = function(){
      var total = 0;
     // console.log($scope.visits);
       for( var i in $scope.visits){
          var product = $scope.visits[i];
          total += parseInt(product.advance) + parseInt(product.paid_visit) + parseInt(product.balance);
       }
       return total;
    }
     
    $scope.getTotalAdvance = function(){
      var total = 0;
     // console.log($scope.visits);
       for( var i in $scope.visits){
          var product = $scope.visits[i];
          total += parseInt(product.advance);
       }
       return total;
    } 

    $scope.getTotalPaid = function(){
      var total = 0;
     //console.log($scope.visits);
       for( var i in $scope.visits){
          var product = $scope.visits[i];
          total += parseInt(product.paid_visit);
       }
       return total;
    } 

    $scope.getTotalBalance = function(){
      var total = 0;
     // console.log($scope.visits);
       for( var i in $scope.visits){
          var product = $scope.visits[i];
          total += parseInt(product.balance);
       }
       return total;
    } 
     
    // delete function
    
    $scope.deletevisit = function(v_id)
    {

    if (confirm("sure to delete")) {
         
     var file = site_url+'visit/delete';

            $http.post(file,{
                'v_id' : v_id,
                
            })
        
            .success(function (data, status, headers, config) {
              
             $scope.getAllvisit();
            
        }).error(function(data){
            //alert(data); 
        });
    } 
    }
    //------------------------------
    
  //------------------------------------------  
    
});