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

        var lc = L.control.locate({
            position: 'topleft',
            showCompass: true,
            showPopup: false,
            // locateOptions: {
            //     enableHighAccuracy: true
            // },
            strings: {
                title: "Tentukan lokasi Saya"
            }
        }).addTo(map);

        // L.Control.geocoder({
        //     position: 'topleft',
        //     placeholder: 'Cari lokasi...',
        // }).addTo(map);

        function onLocationFound(e) {
            var nama_fakultas = document.getElementById("lokasi_akhir");
            var lokasi_fakultas = nama_fakultas.value;
            if(lokasi_fakultas == 'sekolah-bisnis') {
                var lokasi_fakultas = "Sekolah Bisnis";
                var fakultas = [-6.586674786040669, 106.80608902528489];
            } else if(lokasi_fakultas == 'sekolah-vokasi') {
                var lokasi_fakultas = "Sekolah Vokasi";
                var fakultas = [-6.589090625741272, 106.80609333877949];
            } else {
                var fakultas = [e.latitude, e.longitude];
            }

            var distance = (L.latLng(e.latlng).distanceTo(fakultas) / 1000).toFixed(2);

            var radius = (e.accuracy / 2).toFixed(1);

            if (distance < 3.00 && distance != 0.00) {
                var tarif = 6000;
            } else if (distance > 3.00){
                var tarif = ((6000 * 1) + (distance * 1500)).toFixed(0);
            } else {
                var tarif = 0;
            }

            // var tarif = (distance * 3000);
            document.getElementById("lokasi_user").value = e.latitude + "," + e.longitude;
            document.getElementById("harga").value = tarif;

            var locationMarker;
            map.on('click', function(e) {
                if (locationMarker != null) {
                    map.removeLayer(locationMarker);
                }

                var nama_fakultas = document.getElementById("lokasi_akhir");
                var lokasi_fakultas = nama_fakultas.value;
                if(lokasi_fakultas == 'sekolah-bisnis') {
                    var lokasi_fakultas = "Sekolah Bisnis";
                    var fakultas = [-6.586674786040669, 106.80608902528489];
                } else if(lokasi_fakultas == 'sekolah-vokasi') {
                    var lokasi_fakultas = "Sekolah Vokasi";
                    var fakultas = [-6.589090625741272, 106.80609333877949];
                } else {
                    var fakultas = [e.latitude, e.longitude];
                }

                var distance = (L.latLng(e.latlng).distanceTo(fakultas) / 1000).toFixed(2);

                var radius = (e.accuracy / 2).toFixed(1);

                if (distance < 3.00 && distance != 0.00) {
                    var tarif = 6000;
                } else if (distance > 3.00){
                    var tarif = ((6000 * 1) + (distance * 1500)).toFixed(0);
                } else {
                    var tarif = 0;
                }

                document.getElementById("lokasi_user").value = e.latitude + "," + e.longitude;
                document.getElementById("harga").value = tarif;

                locationMarker = new L.marker(e.latlng);
                locationMarker.bindPopup("<p class='text-center'> Anda berada <b>" + distance + " km</b><br>dari " + lokasi_fakultas + ".</p>");
                locationMarker.openPopup();
                locationMarker.addTo(map);
                console.log("Your coordinate is: Lat: " + e.latlng['lat'] + " Long: " + e.latlng['lng'] + " Accuracy: " + e.accuracy + " Distance: " + distance + " Cost: " + tarif);
            });
            console.log("Your coordinate is: Lat: " + e.latlng['lat'] + " Long: " + e.latlng['lng'] + " Accuracy: " + e.accuracy + " Distance: " + distance + " Cost: " + tarif);

            // var latlongline = [e.latlng,fakultas];
            // var polyline = L.polyline(latlongline, {
            //     color: 'transparent',
            //     weight: 5,
            //     opacity: 0.7,
            // });
            // polyline.addTo(map);
        }
        map.on('locationfound', onLocationFound);
        lc.stopFollowing();
    </script>
    <script type="text/javascript">
        function opsi(value){
            var sw = $("#setwaktu").val();
            if(sw == "berangkat"){
                document.getElementById("waktu-berangkat").disabled = false;
                document.getElementById("waktu-pulang").disabled = true;
            } else if(sw == "pulang") {
                document.getElementById("waktu-berangkat").disabled = true;
                document.getElementById("waktu-pulang").disabled = false;
            } else if(sw == "keduanya") {
                document.getElementById("waktu-berangkat").disabled = false;
                document.getElementById("waktu-pulang").disabled = false;
            } else {
                document.getElementById("waktu-berangkat").disabled = true;
                document.getElementById("waktu-pulang").disabled = true;
            }
        }
    </script>
</body>
</html>