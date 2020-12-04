const map = L.map('map').setView([47.30, 2.16], 6);
map.addLayer(new L.StamenTileLayer("watercolor"));
const cluster = L.markerClusterGroup({ disableClusteringAtZoom: 14 }).addTo(map);

const noDesc = document.createElement('em');
noDesc.textContent = 'Aucune description disponible';

fetch("https://static.data.gouv.fr/resources/signalements-de-dechets-marins-sur-le-littoral/20200209-165312/reports.json")
    .then(r => r.json())
    .then(data => {
        for (const entry of data) {
            const marker = L.marker([entry.latitude, entry.longitude]);
            marker.bindPopup(entry.description || noDesc);
            marker.addTo(cluster);
        }
    });