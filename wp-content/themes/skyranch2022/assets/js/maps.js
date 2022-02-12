var winW = window.innerWidth;
var zoom;
var icon;
var center;
if(winW <= 576){
	zoom = 11.5;
	icon = .5;
	center = [-104.662134, 39.735];
} else if(winW > 576 && winW < 992){
	zoom = 12.5;
	icon = 1;
	center = [-104.662134, 39.735];
} else {
	zoom = 12.5;
	icon = 1;
	center = [-104.711254, 39.735];
}

mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrcTQwbDR4NTByZGgycG56N3pkMDB1NGMifQ.5qgmUy3sOAsi5vEhcV3Rmg';

var skyranch = [-104.662134, 39.735];
//create map
var map = new mapboxgl.Map({
	container: 	'locationMap',
	style: 			'mapbox://styles/bpdavis81/ckzcvv86d002p16ru8fh6f80y',
	zoom:				zoom,
	center:			center
});
var nav = new mapboxgl.NavigationControl();
map.scrollZoom.disable();

var markerWidth =  245;
var markerHeight = 35;
var markerRadius = 10;
var linearOffset = 25;

var popup = new mapboxgl.Popup({
	offset: {
		'top':					[0,0],
		'top-left':			[0,0],
		'top-right':		[0,0],
		'bottom':				[0, -markerHeight],
		'bottom-left': 	[linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
    'bottom-right': [-linearOffset, (markerHeight - markerRadius + linearOffset) * -1],
    'left': 				[markerRadius, (markerHeight - markerRadius) * -2],
    'right': 				[-markerRadius, (markerHeight - markerRadius) * -1]
	}
})
.setHTML(
	'<h1 class="map-title">Visit Sky Ranch</h1>' +
	'<a href="" class="btn outline-btn white-btn" target="_blank">Get Directions</a>'
);


map.on('click', function(e){
	popup.setLngLat(skyranch).addTo(map);
});
