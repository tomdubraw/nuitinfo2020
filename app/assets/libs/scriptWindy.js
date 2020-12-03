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


// Initialize Windy API
windyInit(options, windyAPI => {
    // windyAPI is ready, and contain 'map', 'store',

    const {store} = windyAPI;

    const {map} = windyAPI;
    // .map is instance of Leaflet map

    // Pour mettre des commentaires sur la map   
    // L.popup()
    //     .setLatLng([48.76013, 2.38690])
    //     .setContent("Thiais c'est ici")
    //     .openOn(map);
});
