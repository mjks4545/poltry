 

        
        var site_url = 'http://localhost:8079/poltry/index.php/';
 
        app.controller('advanceCtrl', function($scope,$http,$timeout)
 {
     
      // clear form

       $scope.clearForm = function()
    {
            $scope.empty_weight='';
            $scope.rate= '';
            $scope.advance='';
            $scope.vehicle_number='';
            $scope.driver_name='';
            $scope.driver_cnic='';
            $scope.loaded_weight='';
            $scope.broker_name='';
            $scope.balance='';
            $scope.paid_visit='';
            $scope.current_paid='';
            $scope.chicken_weight='';
            $scope.total='';
    }

    $scope.updatefromvalue = function(){
        var name     = angular.element( $('#current_paid') ).val();
        var balance2 = angular.element( $('#balance2') ).val();
        angular.element( $('#balance') ).val(balance2 - name);
    }      
       // create new or upadte visit 
    $scope.advancePostdata = function(id)
    {
           if(id === 'success')
        {
            
            $scope.searchForm = true;
             
        }
        else
        {
          $scope.searchForm = false;
            
          }
          var file = site_url+'report/advancePostdataJSON';
         
        // fields in key-value pairs
        $http.post(file, {
                 
                  'vehicle_number' : $scope.vehicle_number,
                  'f_id'           : $scope.f_id,
                  'driver_cnic'    : $scope.driver_cnic,
                  'driver_name'    : $scope.driver_name,
                  'broker_name'    : $scope.broker_name,
                  'from_date'      : $scope.from_date,
                  'to_date'        : $scope.to_date,
            }
        ).success(function (data, status, headers, config)
         {
            $scope.clearForm();

            $scope.searchs= data;

        }).error(function(data){
            alert('error no data inserted'); 
        });
    }
       // search edit
            $scope.editSearch = function(id)
     {
         
             $scope.edit = false;
             
            var returnData = $.grep($scope.searchs,function(element,index)
            {
              return (element.visit_id == id);
            })
           
          
            $scope.visit_id=parseInt(returnData[0].visit_id);
            $scope.empty_weight= returnData[0].empty_weight;
            $scope.rate = returnData[0].rate;
            $scope.advance=returnData[0].advance;
            $scope.vehicle_number=returnData[0].vehicle_number;
             $scope.driver_name=returnData[0].driver_name;
           $scope.driver_cnic=returnData[0].driver_cnic;
             $scope.loaded_weight=returnData[0].loaded_weight;
             $scope.balance=returnData[0].balance;
             $scope.balance2=returnData[0].balance;
              $scope.broker_name=returnData[0].broker_name;
             $scope.paid_visit=returnData[0].paid_visit;
            $scope.chicken_weight=returnData[0].chicken_weight;
             $scope.total= ($scope.paid_visit *1 )+($scope.balance * 1);
        }
     $scope.getTotalChickenWeight = function(){
      var total = 0;
      console.log($scope.searchs);
       for( var i in $scope.searchs){
          var product = $scope.searchs[i];
          total += parseFloat(product.chicken_weight);
       }
       return total;
    }

    $scope.getTotalTotal = function(){
      var total = 0;
      console.log($scope.searchs);
       for( var i in $scope.searchs){
          var product = $scope.searchs[i];
          total += parseInt(product.advance) + parseInt(product.paid_visit) + parseInt(product.balance);
       }
       return total;
    }
     
    $scope.getTotalAdvance = function(){
      var total = 0;
      console.log($scope.searchs);
       for( var i in $scope.searchs){
          var product = $scope.searchs[i];
          total += parseInt(product.advance);
       }
       return total;
    } 

    $scope.getTotalPaid = function(){
      var total = 0;
      console.log($scope.searchs);
       for( var i in $scope.searchs){
          var product = $scope.searchs[i];
          total += parseInt(product.paid_visit);
       }
       return total;
    } 

    $scope.getTotalBalance = function(){
      var total = 0;
      console.log($scope.searchs);
       for( var i in $scope.searchs){
          var product = $scope.searchs[i];
          total += parseInt(product.balance);
       }
       return total;
    }
    //------------- update function
      $scope.updateSearch = function()
      {
     var file = site_url+'report/updateSearchJson';
         
        // fields in key-value pairs
        $http.post(file, {
                'visit_id' : $scope.visit_id,
                'empty_weight' : $scope.empty_weight,
                'rate' : $scope.rate,
                'advance' : $scope.advance,
                  'vehicle_number' : $scope.vehicle_number,
                'driver_name' : $scope.driver_name,
                'driver_cnic' : $scope.driver_cnic,
                'loaded_weight' : $scope.loaded_weight,
                'balance' : $scope.balance,
                'balance2' : $scope.balance2,
                'current_paid' : $scope.current_paid,
                'broker_name' : $scope.broker_name,
                'paid_visit'   : $scope.paid_visit,
                'chicken_weight'  : $scope.chicken_weight
            }
        ).success(function (data, status, headers, config)
         {
            
           advancePostdata();
           
        }).error(function(data){
            alert('error no data inserted'); 
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
     
    
    
  //------------------------------------------  
    
});