/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';


import Places from 'places.js';

import L from "leaflet";

let map = document.querySelector('#map')

if (map !== null) {


    // function initMap() {

    // }

    window.onload = function () {
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
        let lat = map.dataset.lat;
        let lng = map.dataset.lng;
        map = L.map('map').setView([lat, lng], 13)
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(map);
        var marqeur = L.marker([lat, lng]).addTo(map);
    };
}


let inputAddress = document.querySelector('#gite_address')
if (inputAddress !== null) {
    let place = Places({
        container: inputAddress
    })

    place.on('change', function (e) {
        document.querySelector('#gite_city').value = e.suggestion.city;
        document.querySelector('#gite_postal_code').value = e.suggestion.postcode;
        document.querySelector('#gite_lat').value = e.suggestion.latlng.lat
        document.querySelector('#gite_lng').value = e.suggestion.latlng.lng

    })
}


let btnSearch = document.querySelector('#btn-search');
if (btnSearch !== null) {
    btnSearch.addEventListener('click', function () {

        let formSearch = document.querySelector('#form-search');

        formSearch.classList.replace('d-none', 'd-inline-block');
        btnSearch.classList.add('d-none');
    });
}



let btnContact = document.querySelector('#btn-contact');
if (btnContact !== null) {
    btnContact.addEventListener('click', function () {

        let asideLeft = document.querySelector('#aside-left');
        let asideCenter = document.querySelector('#aside-center');
        let asideRight = document.querySelector('#aside-right');

        asideLeft.classList.replace('col-md-5', 'col-md-4');
        asideCenter.classList.replace('col-md-6', 'col-md-3');
        asideRight.classList.replace('col-md-1', 'col-md-4');

        let formContact = document.querySelector('#form-contact');

        formContact.classList.replace('d-none', 'd-inline-block');
        btnContact.classList.add('d-none');
    });
}