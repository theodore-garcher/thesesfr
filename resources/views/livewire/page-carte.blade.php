<div>
    <div id="map" style="height:650px;" class="mx-8"></div>
    <script>
        var map = L.map('map').setView([46.89132478194589, 2.4446100833731736], 6);
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{maxZoom:18, attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'}).addTo(map);
    </script>
</div>
