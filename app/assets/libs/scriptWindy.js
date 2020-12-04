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
    // listeDePoints.forEach(element => ajouterPoint(element, LL, M));
    // console.log("DEBUGGGGGGGGGGGGGGG!!!!!!!!!!");
    // console.log(listeDePoints);
    var markers = new L.layerGroup(listeDePoints.map(element => ajouterPoint(element, L)));

    console.log("DEEEEEEEEEEEEGGGGGGGGGGGGBBBBBBBBBBBBUGGGGGGGGGG");
    console.log(markers);
    return markers;
}

function ajouterPoint(dicoPoint){
    // LL.popup().setLatLng([dicoPoint['lat'], dicoPoint['lon']]).setContent(dicoPoint['content']).openOn(Map);
    // console.log("DEBUGGGG!!!!");
    // console.log(LL);
    // console.log(Map);
    //
    return new L.marker([dicoPoint['lat'], dicoPoint['lon']]).bindPopup(dicoPoint['content'])
}


var listeTestPoint = [{'lat': 48.76013, 'lon': 2.38690, 'content': "ICI c'est Thiais"},
    {'lat': 14.00336, 'lon': 120.59463, 'content': "L'île dans une île  dans une île"}]

// Initialize Windy API
windyInit(options, windyAPI => {
    // windyAPI is ready, and contain 'map', 'store',

    const {store} = windyAPI;

    const {map} = windyAPI;
    // .map is instance of Leaflet map

    ajouterPoints(listeTestPoint).addTo(map);

    // Pour mettre des commentaires sur la map   
    // L.popup()
    //     .setLatLng([48.76013, 3.38690])
    //     .setContent("Thiais c'est ici")
    //     .openOn(map);

    // console.log("AJOUTER POINT!!!!!!!!!!!!\nL");
    // console.log(L);
    // console.log("MAp:");
    // console.log(map);
    // ajouterPoint({'lat': 48.76013, 'lon': 4.38690, 'content': "ICI c'est Thiais"}, L, map);

});
