    </div>

    <script src="<?=base_url('')?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('')?>assets/js/jquery.min.js"></script>
    <script src="<?=base_url('')?>assets/plugins/sweetalert/sweetalert2.min.js"></script>
    <script src="<?=base_url('')?>assets/js/custom.js"></script>

    <script src="<?=base_url('')?>assets/js/cookies-theme-switcher.js"></script>
    <script src="<?=base_url('')?>assets/plugins/metismenu/metisMenu.min.js"></script>
    <script src="<?=base_url('')?>assets/plugins/slick/slick.min.js"></script>
    <script src="<?=base_url('')?>assets/js/main.js"></script>
    <script src="<?=base_url('')?>assets/js/index.js"></script>
    <script src="<?=base_url('')?>assets/js/loader.js"></script>
    <script src="<?=base_url('')?>assets/js/show-hide-password.js"></script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.72.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script type="text/javascript">
        var map = L.map('map').setView([-6.586674786040669, 106.80608902528489],13);

        var basemap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: ''
        });
        basemap.addTo(map);

        L.control.locate({
            position: 'topleft',
            showCompass: true,
            showPopup: false,
            locateOptions: {
                enableHighAccuracy: true
            },
            strings: {
                title: "Tentukan lokasi Saya"
            }
        }).addTo(map);

        L.Control.geocoder({
            position: 'topleft',
            placeholder: 'Cari lokasi...',
        }).addTo(map);

        function onLocationFound(e) {
            var puncakmerapi = [-6.586674786040669, 106.80608902528489];

            var distance = (L.latLng(e.latlng).distanceTo(puncakmerapi) / 1000).toFixed(2);

            var radius = (e.accuracy / 2).toFixed(1);

            var tarif = ((L.latLng(e.latlng).distanceTo(puncakmerapi) / 1000).toFixed(2)) * (3000);
            document.getElementById("lokasi_user").value = e.latitude + "," + e.longitude;
            document.getElementById("harga").value = tarif;

            locationMarker = L.marker(e.latlng);
            locationMarker.addTo(map);
            locationMarker.bindPopup("<p class='text-center'> Anda berada <b>" + distance + " km</b><br>dari Sekolah Bisnis IPB University.<br>Akurasi GPS " + radius + " meter.</p>");
            locationMarker.openPopup();
            console.log("Your coordinate is: Lat: " + e.latitude + " Long: " + e.longitude + " Accuracy: " + e.accuracy + " Cost: " + tarif)

            var latlongline = [e.latlng,puncakmerapi];
            var polyline = L.polyline(latlongline, {
                color: 'red',
                weight: 5,
                opacity: 0.7,
            });
            polyline.addTo(map);
        }

        map.on('locationfound', onLocationFound);
    </script>
</body>
</html>