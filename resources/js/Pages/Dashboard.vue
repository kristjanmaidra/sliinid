<template>
  <div class=" w-full h-[750px]">
    <div class="h-[750px]" id="map" ref="map"></div>
  </div>
</template>

<script>
export default { layoutName: "Authenticated" };
</script>

<script setup>
import { Loader } from "@googlemaps/js-api-loader";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

let map = ref(null);

const addNewMarker = (location, id) => {
  var marker = new google.maps.Marker({
    map: map,
    position: location,
  });
  marker.addListener(`click`, () => {

  });
};

const locations = [
  { lat: 58.577789, lng: 23.394445, title: 'Kuivastu' },
  { lat: 58.573087, lng: 23.509238, title: 'Virtsu'},
  { lat: 58.229675, lng: 22.50256, title: 'Roomassaare' },
  { lat: 57.781036, lng: 23.269485, title: 'Ringsu' },
  { lat: 58.371905, lng: 21.861695, title: 'Vikati' },
  { lat: 58.693004, lng: 22.522061, title: 'Sõru' },
  { lat: 58.591242, lng: 22.71573, title: 'Triigi' },
  { lat: 58.906453, lng: 23.423498, title: 'Rohuküla' },
  { lat: 58.864124, lng: 23.045871, title: 'Heltermaa' },
  { lat: 58.230393, lng: 24.116447, title: 'Munalaiu' },
  { lat: 58.222236, lng: 24.125197, title: 'Manilaiu' },
  { lat: 58.360156, lng: 21.986782, title: 'Papissaare' },
  { lat: 58.376586, lng: 27.511793, title: 'Piirissaare' },
  { lat: 58.338118, lng: 27.416663, title: 'Laaksaare' },
  { lat: 58.970906, lng: 23.312678, title: 'Sviby' },
  { lat: 59.558448, lng: 24.551146, title: 'Naissaare' },
  { lat: 58.14127, lng: 24.020995, title: 'Kihnu' },
  { lat: 58.162381, lng: 22.525179, title: 'Abruka' },
]

const loader = new Loader({
  apiKey: "",
  version: "weekly",
});
loader.load().then(() => {
  
  map = new google.maps.Map(map.value, {
    zoom: 8,
    scaleControl: false,
    fullscreenControl: false,
    gestureHandling: "none",
    zoomControl: false,
    mapTypeId: "terrain",
    center: {lat: 58.712253, lng: 24.88934},
  });

locations.forEach(location => {
  new google.maps.Marker({
    position: {lat: location.lat, lng: location.lng},
    map,
    title: location.title,
  });

})


  // 
  const infowindow = new google.maps.InfoWindow();

  //   marker.addListener("click", () => {
  //     infowindow.open({
  //       anchor: marker,
  //     map,
  //     shouldFocus: false,
  //   });
  // });

  // window.initMap = initMap;
});
</script>

