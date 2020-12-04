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

function distance(position1, position2) {
    var lat1 = position1[0], lon1 = position1[1], lat2 = position2[0], lon2 = position2[1];
    if ((lat1 == lat2) && (lon1 == lon2)) {
        return 0;
    }
    else {
        var radlat1 = Math.PI * lat1/180;
        var radlat2 = Math.PI * lat2/180;
        var theta = lon1-lon2;
        var radtheta = Math.PI * theta/180;
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        if (dist > 1) {
            dist = 1;
        }
        dist = Math.acos(dist);
        dist = dist * 180/Math.PI;
        dist = dist * 60 * 1.1515;
        dist = dist * 1.609344
        return dist;
    }
}

function geoLocBase() {
    var ObjPosition = new ol.Feature();
    var geolocation = new ol.Geolocation({
        tracking: true,
    });

    var getPosition = [49.24046277613983, 4.061726162584737, "Ancien local de l'équipe StackOverflow Driven Development..."];

    try {
        var gl = geolocation.getPosition();
        getPosition[0] = gl[0];
        getPosition[1] = gl[1];
        getPosition[2] = "Votre Position";
    } catch (error) {
        console.log("Erreur de localisation!! ");
    }

    return getPosition;
}

/**
 *
 * @param listeDePoints Array
 */
function ajouterPoints(listeDePoints) {
    var markers = new L.layerGroup(listeDePoints.map(element => ajouterPoint(element, L)));
    return markers;
}

function ajouterPoint(dicoPoint) {
    return new L.marker([dicoPoint['lat'], dicoPoint['lon']]).bindPopup(dicoPoint['content'])
}

// var listeTestPoint = [{'lat': 48.76013, 'lon': 2.38690, 'content': "ICI c'est Thiais!"},
//     {'lat': 14.00336, 'lon': 120.59463, 'content': "L'île dans une île  dans une île!"},
//     {'lat': 1.00336, 'lon': 10.59463, 'content': "Lol"}]

var listeTestPoint = [];

fetch(route)
    .then(response => response.json())
    .then(json => {
        // todo faire les points
    });


// Initialize Windy API
windyInit(options, windyAPI => {
    // windyAPI is ready, and contain 'map', 'store',

    const {store} = windyAPI;

    const {map} = windyAPI;
    // .map is instance of Leaflet map
    var gl = geoLocBase(),str = "", dp = 0;

    for (point of listeTestPoint) {
        dp = distance([gl[0], gl[1]], [point['lat'], point['lon']]).toFixed(2);
        if(dp > 1000){
            str = "Votre empreinte Carbone est très mauvaise!"
        }else if (dp > 500){
            str = "Votre empreinte Carbone est mauvaise."
        }else if (dp > 100){
            str = "Votre empreinte Carbone est moyenne."
        }else{
            str = "Votre empreinte Carbone est bonne!"
        }
        point['content'] += " Distance de la position: " +dp + "Km.  " + str;
    }

    listeTestPoint.push({'lat': gl[0], 'lon': gl[1], 'content': gl[2]});

    ajouterPoints(listeTestPoint).addTo(map);
});
