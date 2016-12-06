 

        
        var site_url = 'http://localhost:8079/poltry/index.php/';
 
        app.controller('reportCtrl', function($scope,$http,$timeout)
 {
     
    
    $scope.loader = true;//show loader gif
    
    //get all report
    $scope.getAllreport= function(id)
    {
        // alert(id);
        
        $http.get( site_url + "report/getAllreportJSON/" + id ).success(function(data)
        {
       
        $scope.loader = false;//hide loader gif
        $scope.reports = data;
 
    });
      }
       //get all report
    $scope.getAllreports = function( id )
    {
        
        $http.get( site_url + "report/getAllreportsJSON/" + id ).success(function(data)
        {
            $scope.results = data;
        });
    }

    $scope.updatefromvalue = function(){
        var name             = angular.element( $('#current_paid') ).val();
        var balance2         = angular.element( $('#balance2') ).val();
        var total_paid_money = angular.element( $('#total_paid2') ).val();
        console.log( balance2 - name );
        angular.element( $('#balance') ).val(balance2 - name);
        angular.element( $('#total_paid') ).val( parseInt( total_paid_money ) + parseInt( name ) )
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
            $scope.broker_name='';
            $scope.balance='';
             $scope.paid_report='';
             $scope.current_paid='';
            $scope.chicken_weight='';
          
    }
     // clear edit form values
    
    $scope.clearEditField = function()
    {
             
             $scope.current_paid='';
          
    }

    $scope.getTotalChickenWeight = function(){
      var total = 0;
      console.log($scope.reports);
       for( var i in $scope.reports){
          var product = $scope.reports[i];
          total += parseFloat(product.chicken_weight);
       }
       return total;
    }

    $scope.getTotalTotal = function(){
      var total = 0;
      console.log($scope.reports);
       for( var i in $scope.reports){
          var product = $scope.reports[i];
          total += parseInt(product.advance) + parseInt(product.paid_visit) + parseInt(product.balance);
       }
       return total;
    }
     
    $scope.getTotalAdvance = function(){
      var total = 0;
      console.log($scope.reports);
       for( var i in $scope.reports){
          var product = $scope.reports[i];
          total += parseInt(product.advance);
       }
       return total;
    } 

    $scope.getTotalPaid = function(){
      var total = 0;
      console.log($scope.reports);
       for( var i in $scope.reports){
          var product = $scope.reports[i];
          total += parseInt(product.paid_visit);
       }
       return total;
    } 

    $scope.getTotalBalance = function(){
      var total = 0;
      console.log($scope.reports);
       for( var i in $scope.reports){
          var product = $scope.reports[i];
          total += parseInt(product.balance);
       }
       return total;
    }
     
    // for create and update records
   
    //         $scope.editItem = function(id)
    //  {
        
    //         if(id === 'new')
    //     {
            
    //         $scope.edit = true;
    //         $scope.clearForm();
    //     }
    //     else
    //     {

    //          $scope.edit = false;
    //         // $scope.clearEditField();
    //         //search visit using visit id
            // var returnData = $.grep($scope.visits,function(element,index)
            // {
            //   return (element.visit_id == id);
            // })
           
          
    //         $scope.visit_id=parseInt(returnData[0].visit_id);
    //         $scope.empty_weight= returnData[0].empty_weight;
    //         $scope.rate = returnData[0].rate;
    //         $scope.advance=returnData[0].advance;
    //         $scope.vehicle_number=returnData[0].vehicle_number;
    //          $scope.driver_name=returnData[0].driver_name;
    //        $scope.driver_cnic=returnData[0].driver_cnic;
    //          $scope.loaded_weight=returnData[0].loaded_weight;
    //          $scope.balance=returnData[0].balance;
    //           $scope.broker_name=returnData[0].broker_name;
    //          $scope.paid_visit=returnData[0].paid_visit;
    //         $scope.chicken_weight=returnData[0].chicken_weight;
    //          $scope.total= ($scope.paid_visit *1 )+($scope.balance * 1);
    //     }
    // }
    
  //------------------------------------------  
    
});