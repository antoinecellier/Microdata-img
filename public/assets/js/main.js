$( document ).ready(function() {


//Fonction Google Maps
var longitude = 1.6988304;
var latitude = 48.5830055;
var containerMap = "carto";
var markersArray = [];
var markers = [];
var currentFilename;
var mapOptions = {
    center: new google.maps.LatLng(latitude, longitude),
    zoom: 2,
    scrollwheel: false,
};
var infowindow = new google.maps.InfoWindow({
	boxStyle: {
                opacity: 0.75,
                width: "280px",
                borderColor : "#ae082e"
        }
});
var geocoder = new google.maps.Geocoder();


    $.ajax({
      type: "GET",
      url: "imagesJSON",
      dataType: "json"
    }).done(function(data) {
        var map = new google.maps.Map(document.getElementById(containerMap), mapOptions);
        $.each(data, function(){
                    if(this.City != null)
                    {
                       var current = this;
                       geocoder.geocode( { 'address': this.City}, function(results, status) {
                            markersArray.push({
                                filename : current.FileName,
                                location : results[0].geometry.location
                            });
                            var i = 0;
                            $.each(markersArray, function(){
                                marker = new google.maps.Marker({
                                  position: markersArray[i].location, 
                                  map: map,
                                  title: markersArray[i].filename,

                                });
                                markers.push(marker);
                                 var contentString = "<a href='"+window.location.origin+"/Microdata-img/public/image/"+
                                                                 markersArray[i].filename+"'>"+
                                                     markersArray[i].filename+
                                                     "</a>";
                                
                                google.maps.event.addListener(marker, 'click', function() {
                                    infowindow.setContent(contentString);
                                    infowindow.open(map,this);
                                });

                               marker.setMap(map); 
                               i++;
                            });   
                       });

                    }
        });
    });

});