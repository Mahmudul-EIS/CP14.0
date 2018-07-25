<script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('googleMap'), {
            mapTypeControl: false,
            center: {lat: 23.777176, lng: 90.399452},
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
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
                originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
                destinationInput, {placeIdOnly: true});

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
    }

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
            me.travelMode = 'DRIVING';
            me.route();
        });
    };

    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
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

    AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
            return;
        }
        var me = this;

        this.directionsService.route({
            origin: {'placeId': this.originPlaceId},
            destination: {'placeId': this.destinationPlaceId},
            travelMode: this.travelMode
        }, function(response, status) {
            if (status === 'OK') {
                me.directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    };
    $('#checkbox1').on('click',function (e) {
        e.preventDefault();
        $('#own-vehicle-green').addClass('add-green-color');
        $('#own-vehicle-red').removeClass('add-radio-color');
        $('#own-vehicle').val('yes');
    });
    $('#checkbox2').on('click',function (e) {
        e.preventDefault();
        $('#own-vehicle-red').addClass('add-radio-color');
        $('#own-vehicle-green').removeClass('add-green-color');
        $('#own-vehicle').val('no');
    });
    $('#checkbox3').on('click',function (e) {
        e.preventDefault();
        $('#pets-green').addClass('add-green-color');
        $('#pets-red').removeClass('add-radio-color');
        $('#pets').val('yes');
    });
    $('#checkbox4').on('click',function (e) {
        e.preventDefault();
        $('#pets-red').addClass('add-radio-color');
        $('#pets-green').removeClass('add-green-color');
        $('#pets').val('no');
    });
    $('#checkbox5').on('click',function (e) {
        e.preventDefault();
        $('#music-red').addClass('add-radio-color');
        $('#music-green').removeClass('add-green-color');
        $('#music').val('no');
    });
    $('#checkbox6').on('click',function (e) {
        e.preventDefault();
        $('#music-green').addClass('add-green-color');
        $('#music-red').removeClass('add-radio-color');
        $('#music').val('yes');
    });

    $('#checkbox7').on('click',function (e) {
        e.preventDefault();
        $('#smoking-red').addClass('add-radio-color');
        $('#smoking-green').removeClass('add-green-color');
        $('#smoking').val('no');
    });
    $('#checkbox8').on('click',function (e) {
        e.preventDefault();
        $('#smoking-green').addClass('add-green-color');
        $('#smoking-red').removeClass('add-radio-color');
        $('#smoking').val('yes');
    });

    $('#checkbox9').on('click',function (e) {
        e.preventDefault();
        $('#back-red').addClass('add-radio-color');
        $('#back-green').removeClass('add-green-color');
        $('#back').val('no');
    });
    $('#checkbox10').on('click',function (e) {
        e.preventDefault();
        $('#back-green').addClass('add-green-color');
        $('#back-red').removeClass('add-radio-color');
        $('#back').val('yes');
    });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSDYEWgbPh1YBGNEZoMye44-F9ugukmRo&libraries=places&callback=initMap"
        async defer></script>