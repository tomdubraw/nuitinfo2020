const map = L.map('map').setView([47.30, 2.16], 6);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiYXNodXRhIiwiYSI6ImNraTlwNG5zMjBiMzQyc3JraGpleG81cjUifQ.Shiibjbp70qzNtwNzVO-Pg'
}).addTo(map);

const noDesc = document.createElement('em');
noDesc.textContent = 'Aucune description disponible';

function getCoordFromAddress(address) {
    const url = new URL("https://nominatim.openstreetmap.org/search");
    url.searchParams.append("q", address);
    url.searchParams.append("format", "json");
    url.searchParams.append("limit", "1");

    return fetch(url)
        .then(r => r.json())
        .then(e => L.latLng(Number(e[0].lat), Number(e[0].lon)));
}

function loadMarker(url, getCoord, getDesc) {
    const cluster = L.markerClusterGroup({ disableClusteringAtZoom: 14 }).addTo(map);
    fetch(url)
        .then(r => r.json())
        .then(data => {
            Promise.all(data.map(async entry => {
                const marker = L.marker(await getCoord(entry));
                marker.bindPopup(getDesc(entry) || noDesc);
                marker.addTo(cluster);
            }));
        });
}

loadMarker(
    "https://static.data.gouv.fr/resources/signalements-de-dechets-marins-sur-le-littoral/20200209-165312/reports.json",
    e => L.latLng(e.latitude, e.longitude),
    e => e.description
)

loadMarker(
    "/tripcities",
    e => getCoordFromAddress(e.city),
    () => null
);
