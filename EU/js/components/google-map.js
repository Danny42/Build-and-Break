'use strict';jQuery(document).ready(function($){var latitude=41.850,longitude=-73.961,map_zoom=6;var is_internetExplorer11=navigator.userAgent.toLowerCase().indexOf('trident')>-1;var marker_url=(is_internetExplorer11)?'img/widgets/gmap/cd-icon-location.png':'img/widgets/gmap/cd-icon-location.svg';var main_color='#f7f8fa',saturation_value=-70,brightness_value=40;var style=[{elementType:'labels',stylers:[{saturation:saturation_value}]},{featureType:'poi',elementType:'labels',stylers:[{visibility:'off'}]},{featureType:'road.highway',elementType:'labels',stylers:[{visibility:'off'}]},{featureType:'road.local',elementType:'labels.icon',stylers:[{visibility:'off'}]},{featureType:'road.arterial',elementType:'labels.icon',stylers:[{visibility:'off'}]},{featureType:'road',elementType:'geometry.stroke',stylers:[{visibility:'off'}]},{featureType:'transit',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'poi',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'poi.government',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'poi.sport_complex',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'poi.attraction',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'poi.business',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'transit',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'transit.station',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'landscape',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'road',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'road.highway',elementType:'geometry.fill',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]},{featureType:'water',elementType:'geometry',stylers:[{hue:main_color},{visibility:'on'},{lightness:brightness_value},{saturation:saturation_value}]}];var map_options={center:new google.maps.LatLng(latitude,longitude),zoom:map_zoom,panControl:!1,zoomControl:!1,mapTypeControl:!1,streetViewControl:!1,mapTypeId:google.maps.MapTypeId.ROADMAP,scrollwheel:!1,styles:style,}
var map=new google.maps.Map(document.getElementById('js__google-container'),map_options);var contentString='<div id="content">'+'<div id="siteNotice">'+'</div>'+'<h2 id="firstHeading" class="firstHeading">Brooklyn</h2>'+'<div id="bodyContent">'+'<p>277 Bedford Avenue, <br> Brooklyn, NY 11211, <br> New York, USA</p>'+'</div>'+'</div>';var infowindow=new google.maps.InfoWindow({content:contentString,maxWidth:300});var marker=new google.maps.Marker({position:new google.maps.LatLng(latitude,longitude),map:map,visible:!0,icon:marker_url,});marker.addListener('click',function(){infowindow.open(map,marker)})})