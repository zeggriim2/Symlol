/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.scss in this case)
import './styles/app.scss';


import { Tooltip, Toast, Popover } from 'bootstrap';

// start the Stimulus application
import './bootstrap';

$(document).ready(function() {
    $('#table_ladder').DataTable( {
        "pageLength": 20,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
        "paging":   true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    } );
} );

$(document).ready(function() {
    $('#table_league_summoner').DataTable( {
        "pageLength": -1,
        "order": [[ 2, "desc" ]],
        "paging":   false,
        "info":     false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
        }
    } );
} );
