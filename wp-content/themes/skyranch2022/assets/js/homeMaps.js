var winW = window.innerWidth;
var center;
var size;

if(winW <= 570){
	center = [-104.653378, 39.729410];
	size = .5
} else {
	center = [-104.6776, 39.7291];
}

mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrcTQwbDR4NTByZGgycG56N3pkMDB1NGMifQ.5qgmUy3sOAsi5vEhcV3Rmg';

var skyranch = [-104.653378, 39.728975];

var homeMap = new mapboxgl.Map({
	container:	'homepageMap',
	style: 			'mapbox://styles/bpdavis81/ckzcvv86d002p16ru8fh6f80y',
	zoom:				12.5,
	center:			center
});
var homeNav = new mapboxgl.NavigationControl();
homeMap.scrollZoom.disable();

var markerWidth =  245;
var markerHeight = 35;
var markerRadius = 10;
var linearOffset = 25;

var popup = new mapboxgl.Popup({ offset: 35 })
	.setHTML(
		'<h1 class="map-title">Visit Sky Ranch</h1>' +
		'<a href="" class="btn outline-btn white-btn" target="_blank">Get Directions</a>'
	);


homeMap.on('click', function(e){
	popup.setLngLat(skyranch).addTo(homeMap);
});
