app.directive('expensesDirective', [
  '$http',
  '$state',
  '$stateParams',
  '$rootScope',
  'appModule',
  function directive($http,$state,$stateParams,$rootScope,appModule) {
    return {
      restrict: "A",
      scope: true,
      link: function link( scope, element, attributeSet )
      {
        console.log( "expensesDirective Runinng !" );

        scope.weekdays_long = [ 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' ];
        scope.weekdays_short = [ 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' ];

        scope.full_date_today = moment( ).format( 'MMMM DD, YYYY' );
        scope.month_today = moment( scope.full_date_today ).format( 'MMMM' );
        scope.day_today = moment( scope.full_date_today ).format( 'DD' );
        scope.year_today = moment( scope.full_date_today ).format( 'YYYY' );

        scope.startDayOfMonth = moment( scope.full_date_today ).startOf("month").format( 'd' );
        scope.startOfMonth = moment( scope.full_date_today ).startOf("month").format( 'DD' );
        scope.endOfMonth = moment( scope.full_date_today ).endOf("month").format( 'DD' );

        scope.calendar_arr = [];
        scope.expenses_arr = [];



        scope.initializeCalendar = ( picked_date ) =>{
          scope.full_date_today = moment( picked_date ).format( 'MMMM DD, YYYY' );
          scope.month_today = moment( picked_date ).format( 'MMMM' );
          scope.day_today = moment( picked_date ).format( 'DD' );
          scope.year_today = moment( picked_date ).format( 'YYYY' );

          scope.startDayOfMonth = moment( picked_date ).startOf("month").format( 'd' );
          scope.startOfMonth = moment( picked_date ).startOf("month").format( 'DD' );
          scope.endOfMonth = moment( picked_date ).endOf("month").format( 'DD' );

          var date_ctr = 0;
          var weekday_ctr = scope.startDayOfMonth == 0 ? 7 : scope.startDayOfMonth;
          var week_ctr = 1;
          var temp_expense_arr = [];
          var date_expenses_total = 0;

          scope.calendar_arr.push({ week : [] });
          for(var i = weekday_ctr; i != 1; i--){
            scope.calendar_arr[week_ctr-1].week.push({
              enabled : false
            });
          }

          while( date_ctr != scope.endOfMonth ){
            date_ctr++;

            angular.forEach( scope.expenses_arr, function( value, key ){
              var expense_date = moment( value.full_date ).format('MMMM DD, YYYY');
              var compare_date = moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('MMMM DD, YYYY');
              if( expense_date == compare_date ){
                
                temp_expense_arr.push(value);
                date_expenses_total+= value.value;
                console.log(date_expenses_total);
              }
            });

            scope.calendar_arr[week_ctr-1].week.push({
              date : moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('MMMM DD, YYYY'),
              date_number : moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('DD'),
              date_month : moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('MMMM'),
              date_year : moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('YYYY'),
              day_name_short : moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('ddd'),
              day_name_long : moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('dddd'),
              day_number : moment( scope.month_today + ' ' + date_ctr + ', ' + scope.year_today ).format('d'),
              enabled : true,
              expenses_list : temp_expense_arr,
              expenses_total : date_expenses_total
            });

            temp_expense_arr = [];
            date_expenses_total = 0;

            if( weekday_ctr < 7 ){
              weekday_ctr++;
            }else{
              weekday_ctr = 1;
              week_ctr++;
              
              if( date_ctr != scope.endOfMonth ){
                scope.calendar_arr.push({ week : [] });
              }
            }
            
          }

          for(var i = (weekday_ctr-1); i < 7; i++){
            scope.calendar_arr[week_ctr-1].week.push({
              enabled : false
            });
          }

          console.log( scope.calendar_arr );
        }

        scope.initializeChart = ( ) =>{
          scope.expensesChartLabels = ['A','B','C','D','E'];
          scope.expensesChartData = [1,2,3,4,5];

          scope.expensesChartOptions = {
            legend: {
              display: true,
              position: 'left',
              labels: {
                  // fontColor: 'rgb(255, 99, 132)'
                  fontStyle: 'bold',
                  fontSize: 14,
                  boxWidth: 10,
              },
            },
          }
        }

        scope.fetchExpenses = ( ) =>{
          var data = {
            start : moment( scope.full_date_today ).startOf("month").format( 'MMMM DD, YYYY' ),
            end : moment( scope.full_date_today ).endOf("month").format( 'MMMM DD, YYYY' )
          }

          appModule.getExpensesPerMonth( data )
            .then(function(response){
              console.log(response);
              scope.expenses_arr = response.data.expenses;
              scope.initializeChart();
              scope.initializeCalendar( scope.full_date_today );
            });
        }

        scope.onLoad = ( ) =>{
          scope.fetchExpenses( scope.full_date_today );
        }

        scope.onLoad();

      }
    }


  }
])