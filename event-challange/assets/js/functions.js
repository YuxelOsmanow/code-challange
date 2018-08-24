;(function( $, window, document, undefined ) {
	var $win = $( window);
	var $doc = $(document);

	$doc.on( 'ready', function() {

	});

	$win.on( 'load', function() {
        initMap();
	});

	$win.on( 'load resize', function() {

	});

    function initMap(){
        var $mapDiv = $( '.card-text .map-container div' );

        if ( $mapDiv.length ) {
            $mapDiv.each( function(){
                var $this = $(this);
                var mapID = $(this).attr( 'id' );
                var mapDiv = document.getElementById( mapID );
                var mapName = mapID;
                var $lat = parseInt( $this.attr( 'data-lat' ) );
                var $lng = parseInt ( $this.attr( 'data-lng' ) );
                var $info = $this.attr( 'data-info' );
                var myLatlng = new google.maps.LatLng( $lat, $lng);

                var mapName = new google.maps.Map( mapDiv, {
                    center: { lat: $lat, lng: $lng },
                    scrollwheel: false,
                    zoom: 7,
                    text: $info
                });

                var marker = new google.maps.Marker({
                    position: myLatlng,
                    title: $info
                });

                marker.setMap(mapName);
            });
        }
    }

})( jQuery, window, document );
