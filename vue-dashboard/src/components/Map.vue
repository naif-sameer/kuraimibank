<script setup lang="ts">
import { onBeforeUnmount, onMounted, ref, reactive, watch } from 'vue';
import { useI18n } from 'vue-i18n';
import axios from 'axios';
import L from 'leaflet';

import 'leaflet/dist/leaflet.css';

import Card from './Card.vue';

let { t } = useI18n();
let map = ref();

type AddressDetailsType = {
  country: string;
  city: string;
  road: string;
  district: string;
};

type LatLonType = { lat: number; lon: number };

interface IAddress {
  city_code: string;
  country_code: string;

  country_name: { ar: string; en: string };
  city_name: { ar: string; en: string };
}

type PropsType = {
  updateMapLocation?: ({}: LatLonType, {}: IAddress) => void;
  address: LatLonType;
};
const props = defineProps<PropsType>();

const mapLines = reactive({ lat: 15.351734, lon: 44.208295, zoom: 9 });

const addressDetails = reactive<AddressDetailsType>({
  country: '',
  city: '',
  road: '',
  district: '',
});

let marker = ref();

const setMarker = ({ lat, lon }: LatLonType) => {
  // remove old marker if exist
  if (marker.value) map.value.removeLayer(marker.value);

  // add new marker
  marker.value = L.marker([lat, lon]).addTo(map.value);

  // change map view
  map.value.setView([lat, lon], map.value.getZoom());
};

onMounted(() => {
  map.value = L.map('mapContainer');

  map.value.setView([mapLines.lat, mapLines.lon], mapLines.zoom);

  L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { attribution: 'bank map' }).addTo(map.value);

  if (props.updateMapLocation) {
    map.value.on('click', onMapClick);
  }

  // delay render marker point to fetch api data
  setTimeout(() => {
    if (props.address.lat && props.address.lon) setMarker(props.address);
  }, 500);
});

const onMapClick = (e: any) => {
  console.log('You clicked the map at ', e.latlng);

  axios
    .get(
      `http://nominatim.openstreetmap.org/reverse?format=json&accept-language=ar&lat=${e.latlng.lat}&lon=${e.latlng.lng}`
    )
    .then(({ data }) => {
      addressDetails.country = data.address?.country;
      addressDetails.city = data.address.city ?? data.address?.state;
      addressDetails.road = data.address?.road;
      addressDetails.district = data.address?.district;

      props.updateMapLocation?.(
        { lat: e.latlng.lat, lon: e.latlng.lng },
        {
          city_code: data.address['ISO3166-2-lvl4'],
          country_code: data.address.country_code,
          country_name: { ar: addressDetails.country, en: addressDetails.country },
          city_name: { ar: addressDetails.city, en: addressDetails.city },
        }
      );

      setMarker({ lat: data.lat, lon: data.lon });
    });
};

onBeforeUnmount(() => {
  if (map.value) map.value.remove();
});
</script>
<template>
  <section>
    <div id="mapContainer" class="rounded-lg"></div>

    <!------ address details ------>
    <Card v-if="addressDetails.country">
      <h3 class="text-lg font-semibold">{{ t('address-details') }}</h3>

      <div class="flex gap-6 mt-2">
        <!-- country -->
        <div class="space-x-2" v-if="addressDetails.country">
          <span class="text-sm text-gray-400"> {{ t('country') }}: </span>
          <span class="text-md font-semibold"> {{ addressDetails.country }} </span>
        </div>

        <!-- city -->
        <div class="space-x-2" v-if="addressDetails.city">
          <span class="text-sm text-gray-400"> {{ t('city') }}: </span>
          <span class="text-md font-semibold"> {{ addressDetails.city }} </span>
        </div>

        <!-- road -->
        <div class="space-x-2" v-if="addressDetails.road">
          <span class="text-sm text-gray-400"> {{ t('road') }}: </span>
          <span class="text-md font-semibold"> {{ addressDetails.road }}</span>
        </div>

        <!-- district -->
        <div class="space-x-2" v-if="addressDetails.district">
          <span class="text-sm text-gray-400"> {{ t('district') }}: </span>
          <span class="text-md font-semibold"> {{ addressDetails.district }}</span>
        </div>
      </div>
    </Card>
  </section>
</template>

<style scoped>
.combobox {
  z-index: 9999;
}

#mapContainer {
  width: 100%;
  height: 50vh;
}
</style>
