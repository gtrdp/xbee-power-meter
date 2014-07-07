            <footer>
                <p>XBee Control Panel<br>
                &copy; <a target="_blank" href="http://twitter.com/gunturdputra">Guntur D Putra</a> 2014</p>
            </footer>
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/bootstrap-switch.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script src="vendors/raphael-min.js"></script>
        <script src="vendors/morris.min.js"></script>

        <?php if ($page == 'dashboard' || $page == 'xbee' || $page == 'profile'): ?>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script type="text/javascript" src="vendors/chartjs/knockout-3.0.0.js"></script>
        <script type="text/javascript" src="vendors/chartjs/globalize.min.js"></script>
        <script type="text/javascript" src="vendors/chartjs/dx.chartjs.js"></script>
    
        <script>
        $(function() {

            //boostrap-switch
            $('.button-relay').on('switch-change', function () {
                // Get the address and relay ID
                var address = $(this).attr('address');
                var relayID = $(this).attr('relay-id');

                //Ajax to change the XBee's relay
                var status = $(this).find('.relay-checkbox').is(':checked')? 'on': 'off';
                // $.get('script/action.php?status=' + status + '&relay=' + relayID + '&atmy=' + atmy);
                console.log('script/action.php?status=' + status + '&relay=' + relayID + '&address=' + address);
            });
        });
        </script>

        <script type="text/javascript">
            $(".temperatureGauge").dxCircularGauge({
                scale: {
                    startValue: 0,
                    endValue: 60,
                    majorTick: {
                        color: 'black',
                        tickInterval : 10
                    },
                    minorTick: {
                        visible: true,
                        color: 'black',
                        tickInterval : 1
                    }
                },
                rangeContainer: {
                    backgroundColor: 'none',
                    ranges: [
                        {
                            startValue: 0,
                            endValue: 20,
                            color: 'blue'
                        },
                        {
                            startValue: 20,
                            endValue: 40,
                            color: 'green'
                        },
                        {
                            startValue: 40,
                            endValue: 60,
                            color: 'red'
                        }
                    ],
                    offset: 5,
                },
                subvalueIndicator: {
                    type: 'textcloud',
                    color: 'powderblue',
                    text: {
                        format: 'fixedPoint',
                        precision: 1,
                        font: {
                            color: 'white'
                        }
                    }
                },
                value: 27,
                subvalues: [27]
            });
        </script>

        <!-- For Morris Graph-->
        <script type="text/javascript">
            var graph = Morris.Line({
              // ID of the element in which to draw the chart.
              element: 'powerchart',
              // Chart data records -- each entry in this array corresponds to a point on
              // the chart.
              data: [
                    { time: '2014-05-17 15:34:37', watt: 14.10, energy: 0.07},
                    { time: '2014-05-17 15:34:34', watt: 14.24, energy: 0.07},
                    { time: '2014-05-17 15:34:31', watt: 13.98, energy: 0.07},
                    { time: '2014-05-17 15:34:29', watt: 14.11, energy: 0.06},
                    { time: '2014-05-17 15:34:26', watt: 14.07, energy: 0.06},
                    { time: '2014-05-17 15:34:23', watt: 14.18, energy: 0.06},
                    { time: '2014-05-17 15:34:20', watt: 14.23, energy: 0.06},
                    { time: '2014-05-17 15:34:18', watt: 14.39, energy: 0.06},
                    { time: '2014-05-17 15:34:15', watt: 14.07, energy: 0.06},
                    { time: '2014-05-17 15:34:12', watt: 13.99, energy: 0.06},
                    { time: '2014-05-17 15:34:10', watt: 14.26, energy: 0.06},
                    { time: '2014-05-17 15:34:07', watt: 14.19, energy: 0.06},
                    { time: '2014-05-17 15:34:04', watt: 13.97, energy: 0.06},
                    { time: '2014-05-17 15:34:01', watt: 13.97, energy: 0.06},
                  ],
              // The name of the data record attribute that contains x-values.
              xkey: 'time',
              // A list of names of data record attributes that contain y-values.
              ykeys: ['watt', 'energy'],
              // Labels for the ykeys -- will be displayed when you hover over the
              // chart.
              labels: ['Power (Watt)', 'Energy'],

            lineColors: ['#00991A', '#FFB114']
            });
        </script>

        
        <?php endif; ?>
    </body>

</html>