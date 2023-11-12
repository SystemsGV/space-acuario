<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Iniciar-Sesion'] = 'site/login';


/* ROUTES LOGIN */

$route['AuthUser'] = 'Site/authUser';


/* ROUTES ADMIN */

$route['Acuario/Cerrar-Sesion'] = 'aquarium/dashboard/session_destroy';
$route['Acuario/Inicio'] = 'aquarium/dashboard';
$route['Acuario/Dashboard-Temperatura'] = 'aquarium/dashboard';
$route['Acuario/Dashboard-Especies'] = 'aquarium/DSpecies';


/* ROUTES SPECIES */
$route['Acuario/Especies'] = 'aquarium/species';
$route['Acuario/API-SPECIES'] = 'aquarium/species/getSpecies';
$route['Acuario/API-SPECIE'] = 'aquarium/species/getSpecie';
$route['Acuario/save-specie'] = 'aquarium/species/create';
$route['Acuario/edit-specie'] = 'aquarium/species/update';
$route['Acuario/delete-specie'] = 'aquarium/species/delete';
$route['Acuario/update-quantity'] = 'aquarium/species/updateQuantity';
$route['Acuario/update-minus'] = 'aquarium/species/minusQuantity';


/* ROUTES FISHBOWL */
$route['Acuario/Peceras'] = 'aquarium/fishbowls';
$route['Acuario/API-FISHBOWLS'] = 'aquarium/fishbowls/getFishbowls';
$route['Acuario/API-LOGSBOWLS/(:any)'] = 'aquarium/fishbowls/logsFishbowls/$1';
$route['Acuario/save-fishbowl'] = 'aquarium/fishbowls/create';
$route['Acuario/edit-fishbowl'] = 'aquarium/fishbowls/update';
$route['Acuario/delete-fishbowl'] = 'aquarium/fishbowls/delete';
$route['Acuario/new-specie-fisbowl'] = 'aquarium/fishbowls/add_specie';
$route['Acuario/ammon-specie-fisbowl'] = 'aquarium/fishbowls/ammon_bowl';
$route['Acuario/dissmis-specie-fisbowl'] = 'aquarium/fishbowls/dissmis_bowl';
$route['Acuario/API-PIE'] = 'aquarium/fishbowls/graphicBowl';


/* CONTROL BOWLS */

$route['Acuario/Control-Temperatura'] = 'aquarium/control';
$route['Acuario/API-EDITABLE'] = 'aquarium/control/fillTableTemp';
$route['Acuario/API-EDIT-CELL'] = 'aquarium/control/editCell';


/* REPORTS */

$route['Acuario/Report-Temp'] = 'aquarium/dashboard/reportBowlsTemp';
$route['Acuario/Report-Bowls'] = 'aquarium/DSpecies/graphicBowl';

$route['Acuario/Reporte-Temperatura'] = 'aquarium/reports';
$route['Acuario/API-REPORT-TEMPERATURE'] = 'aquarium/reports/getTableData';
$route['Acuario/Reporte-PDF'] = 'aquarium/reports/reportPDFTemperature';
$route['Acuario/Ver-Reporte-PDF'] = 'aquarium/reports/ViewPDF';


/*  USER ROUTES */
$route['Acuario/Usuarios'] = 'aquarium/User';
$route['Acuario/save-user'] = 'aquarium/User/create';
$route['Acuario/update-user'] = 'aquarium/User/update';


//USERS
$route['Acuario/API-USERS'] = 'aquarium/user/getUsers';


//APIS
$route['Acuario/species-select'] = 'aquarium/species/speciesSelect';
$route['Acuario/species-checkout/(:any)'] = 'aquarium/species/getCheckout/$1';
$route['Acuario/getJsonSpecies'] = 'aquarium/species/getJsonSpecies';
$route['Acuario/Load-Notifications'] = 'aquarium/dashboard/loadNotifications';
