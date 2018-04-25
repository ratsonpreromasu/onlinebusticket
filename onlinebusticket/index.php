<?php
require_once './class/viewBus.php';
$viewBus = new viewBus();
$query_result = $viewBus->select_all_bus_info();
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Online Bus Ticket Service</title>
        <link href="asset/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <link rel="stylesheet" href="asset/css/styles.css">


        <style>
            /* Always set the map height explicitly to define the size of the div
             * element that contains the map. */
            #map {
                height: 100%;
            }
            /* Optional: Makes the sample page fill the window. */
            html, body {
                height: 100%;
                margin: 0px;
                padding: 0;
            }
            .controls {
                margin-top: 10px;
                border: 1px solid transparent;
                border-radius: 2px 0 0 2px;
                box-sizing: border-box;
                -moz-box-sizing: border-box;
                height: 32px;
                outline: none;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            }

            #origin-input,
            #destination-input {
                background-color: #fff;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 300;
                margin-left: 12px;
                padding: 0 11px 0 13px;
                text-overflow: ellipsis;
                width: 300px;
            }

            #origin-input:focus,
            #destination-input:focus {
                border-color: #4d90fe;
            }

            #mode-selector {
                color: #fff;
                background-color: #4d90fe;
                margin-left: 12px;
                padding: 5px 11px 0px 11px;
            }

            #mode-selector label {
                font-family: Roboto;
                font-size: 13px;
                font-weight: 300;
            }

        </style>
    </head>

    <body>

        <div class="container main_body padding_0">
            <header>
                <div id='cssmenu'>
                    <ul>
                        <li class='active'><a href='index.php'>Home</a></li>
                        <li><a href='#'>How to Buy</a></li>
                        <li><a href='#'>Company</a></li>
                        <li><a href='contact_us.php'>Contact</a></li>
                        <li><a href='login.php'>Log in</a></li>
                        <li><a href='signup.php'>Sign up</a></li>
                    </ul>
                </div>
            </header>

            <div class="container choosing_destination">
                <div class="row">
                    <div class="col-md-6 total_border">
                        <div class="row">
                            <div class="col-md-12 text-center total_text">
                                <h3>Buy bus tickets in 3 easy steps</h3>
                            </div>
                        </div>
                        <div class="row icon_text">
                            <div class="col-md-4">
                                <div class="col-md-6 search_icon">
                                    <i class="fa fa-search"></i>
                                </div>
                                <div class="col-md-6 search_details">
                                    <h4>Search</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-6 search_icon">
                                    <i class="fa fa-bus"></i>
                                </div>
                                <div class="col-md-6 search_details">
                                    <h4>Select Bus</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-6 search_icon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="col-md-6 search_details">
                                    <h4>Payment</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center secure-payment">
                            <div class="col-md-12 secure-payment_aa">
                                <div class="secure-payment_bb">
                                    <i class="fa fa-lock"></i>
                                    Safe and Secure online payments</div>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">
                        <form name="bussearch" id="bussearch" onsubmit="return validateBusForm(this)">
                            <ul class="list-inline">
                                <div class="form-group hide" style="font-size:21px;color:#000;"><!-- Eid Change : Added hide class -->
                                    Lowest prices guaranteed on Bus Tickets 
                                </div>  
                                <div class="form-group">
                                    <label for="dest_from">From</label>
                                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" class="form-control jqchars  ui-autocomplete-input" id="dest_from" name="dest_from" placeholder="Enter City" maxlength="15" value="" autocomplete="off">
                                </div> 
                                <div class="form-group">
                                    <label for="dest_to">To</label>
                                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" class="form-control jqchars ui-autocomplete-input" id="dest_to" name="dest_to" placeholder="Enter City" maxlength="15" value="" autocomplete="off">
                                </div> 
                                
                                
                                <div class="row">
                                    <div class="col-md-6">                             
                                        <div class="form-group">
                                            <label for="doj">Date of Journey</label>
                                            <input type="text" class="datepicker form-control hasDatepicker" id="doj" name="doj" data-date-format="dd/mm/yyyy" placeholder="Pick a date" value="" readonly="true"><img class="ui-datepicker-trigger" src="/img/calendar.png" alt="..." title="...">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="doj">Date of Return<span> (Optional)</span></label>
                                            <input type="text" class="datepicker form-control  hasDatepicker" id="dor" name="dor" data-date-format="dd/mm/yyyy" placeholder="Pick a date" value=""><img class="ui-datepicker-trigger" src="/img/calendar.png" alt="..." title="...">
                                        </div>
                                    </div>                        
                                </div>
                                <div class="row" style="margin-top:50px;"><!-- Eid Change : margin top made 50px from 25px. -->
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-default btn-block"><span class="glyphicon glyphicon-search"></span> Search Buses </button>
                                    </div>
                                    <!--                        <div class="col-md-12">
                                                                <div class="col-md-12 bg-warning" style="padding:5px 5px;margin-top:20px;border:1px solid #F79331;">
                                                                    <b style="color:#fc0202;">Important Notice:</b> Bus Operators may decide to cancel the scheduled trips at the last moment due to the current political situation. In such cases, Shohoz.com may not be able to notify users beforehand. Trip operations/ scheduling is at the complete discretion of the bus operators.                            </div>
                                                            </div>-->
                                </div>

                                <!---bKas Modal  --->



                            </ul>
                        </form>
                    </div>
                    <!--
                    <div class="col-md-4">
                        
                        
                                 <div class="trafficlight">
                                    <div class="side-bars"></div>
                                    <div class="side-bars"></div>
                                    <div class="side-bars"></div>
                                    <div class="red"></div>
                                    <div class="yellow"></div>
                                    <div class="green"></div>
                                </div>
                       
                        
                    </div>
                    -->
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">



                        <input id="origin-input" class="controls" type="text"
                               placeholder="Enter an origin location">

                        <input id="destination-input" class="controls" type="text"
                               placeholder="Enter a destination location">

                        <div id="mode-selector" class="controls">
                            <input type="radio" name="type" id="changemode-walking" checked="checked">
                            <label for="changemode-walking">Walking</label>

                            <input type="radio" name="type" id="changemode-transit">
                            <label for="changemode-transit">Transit</label>

                            <input type="radio" name="type" id="changemode-driving">
                            <label for="changemode-driving">Driving</label>
                        </div>

                        <div id="map"></div>





                        <script>
                            // This example requires the Places library. Include the libraries=places
                            // parameter when you first load the API. For example:
                            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                            function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    mapTypeControl: false,
                                    center: {lat: -33.8688, lng: 151.2195},
                                    zoom: 13
                                });

                                new AutocompleteDirectionsHandler(map);
                            }

                            /**
                             * @constructor
                             */
                            function AutocompleteDirectionsHandler(map) {
                                this.map = map;
                                this.originPlaceId = null;
                                this.destinationPlaceId = null;
                                this.travelMode = 'WALKING';
                                var originInput = document.getElementById('origin-input');
                                var destinationInput = document.getElementById('destination-input');
                                var modeSelector = document.getElementById('mode-selector');
                                this.directionsService = new google.maps.DirectionsService;
                                this.directionsDisplay = new google.maps.DirectionsRenderer;
                                this.directionsDisplay.setMap(map);

                                var originAutocomplete = new google.maps.places.Autocomplete(
                                        originInput, {placeIdOnly: true});
                                var destinationAutocomplete = new google.maps.places.Autocomplete(
                                        destinationInput, {placeIdOnly: true});

                                this.setupClickListener('changemode-walking', 'WALKING');
                                this.setupClickListener('changemode-transit', 'TRANSIT');
                                this.setupClickListener('changemode-driving', 'DRIVING');

                                this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
                                this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

                                this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
                                this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
                                this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
                            }

                            // Sets a listener on a radio button to change the filter type on Places
                            // Autocomplete.
                            AutocompleteDirectionsHandler.prototype.setupClickListener = function (id, mode) {
                                var radioButton = document.getElementById(id);
                                var me = this;
                                radioButton.addEventListener('click', function () {
                                    me.travelMode = mode;
                                    me.route();
                                });
                            };

                            AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (autocomplete, mode) {
                                var me = this;
                                autocomplete.bindTo('bounds', this.map);
                                autocomplete.addListener('place_changed', function () {
                                    var place = autocomplete.getPlace();
                                    if (!place.place_id) {
                                        window.alert("Please select an option from the dropdown list.");
                                        return;
                                    }
                                    if (mode === 'ORIG') {
                                    me.originPlaceId = place.place_id;
                                    } else {
                                    me.destinationPlaceId = place.place_id;
                                    }
                                    me.route();
                                });

                            };

                            AutocompleteDirectionsHandler.prototype.route = function () {
                                if (!this.originPlaceId || !this.destinationPlaceId) {
                                    return;
                                }
                                var me = this;

                                this.directionsService.route({
                                    origin: {'placeId': this.originPlaceId},
                                    destination: {'placeId': this.destinationPlaceId},
                                    travelMode: this.travelMode
                                }, function (response, status) {
                                    if (status === 'OK') {
                                        me.directionsDisplay.setDirections(response);
                                    } else {
                                        window.alert('Directions request failed due to ' + status);
                                    }
                                });
                            };

                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVn_NQiHTHbGyr5Iejwi5uDl2h3f-Pvyc
                                &libraries=places&callback=initMap"
                        async defer></script>

                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="text-center text-success"><?php //echo $message;            ?></h3>
                        <div class="well">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Bus Name</th>
                                </tr>
                                <?php while ($student_info = mysqli_fetch_assoc($query_result)) { ?>
                                    <tr>
                                        <td><?php echo $student_info['bus_name']; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>



            <footer class="container footer text-center">
                <p>&copy; Online Bus Ticket Service</p>
            </footer>

        </div>

        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="asset/js/bootstrap.min.js"></script>
        <script src="asset/js/script.js"></script>

    </body>
</html>
