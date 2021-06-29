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

        let formContact = document.querySelector('#form-contact');

        formContact.classList.replace('d-none', 'd-inline-block');
        btnContact.classList.add('d-none');
    });
}