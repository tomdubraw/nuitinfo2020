const options = {
    // API key à personaliser, elle marche en local host celle là.
    key: 'nhMZCCAbIQeZEL97f0QPeLf16OkTLRgs',

    // Put additional console output
    verbose: true,

    // Optional: Initial state of the map
    lat: 48.76013,
    lon: 2.38690,
    zoom: 7,

    // Paramètres divers
    timestamp: Date.now(),
    englishLabels: false,
    // lang : 'auto',
    numDirection: true,
    hourFormat: '24h',
    graticule: false,
};

/**
 *
 * @param listeDePoints Array
 * @param LL
 * @param M
 */
function ajouterPoints(listeDePoints) {
    var markers = new L.layerGroup(listeDePoints.map(element => ajouterPoint(element, L)));
    return markers;
}

function ajouterPoint(dicoPoint){
    return new L.marker([dicoPoint['lat'], dicoPoint['lon']]).bindPopup(dicoPoint['content'])
}


var listeTestPoint = [{'lat': 48.76013, 'lon': 2.38690, 'content': "ICI c'est Thiais"},
    {'lat': 14.00336, 'lon': 120.59463, 'content': "L'île dans une île  dans une île"},
    {'lat': 1.00336, 'lon': 10.59463, 'content': "Lol"}]

// Initialize Windy API
windyInit(options, windyAPI => {
    // windyAPI is ready, and contain 'map', 'store',

    const {store} = windyAPI;

    const {map} = windyAPI;
    // .map is instance of Leaflet map

    ajouterPoints(listeTestPoint).addTo(map);
});
