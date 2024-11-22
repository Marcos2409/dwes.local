<?php
$router->get ('', 'PagesController@index');

$router->get ('about', 'PagesController@about');
$router->get('asociados', 'app/controllers/asociados.php');
$router->get ('blog', 'PagesController@blog');
$router->get('contact', 'ContactController@index');

$router->get ('post', 'PagesController@post');
$router->post('asociados/nuevo', 'app/controllers/asociados_nuevo.php');
$router->post('contact/enviar', 'contactController@enviar');

$router->get ('login', 'AuthController@login');
$router->post('check-login', 'AuthController@checkLogin');
$router->get ('logout', 'AuthController@logout');

$router->get ('galeria', 'GaleriaController@index', 'ROLE_USER');
$router->get ('galeria/:id', 'GaleriaController@show', 'ROLE_USER');
$router->post('galeria/nueva', 'GaleriaController@nueva', 'ROLE_ADMIN');

$router->get ('registro', 'AuthController@registro');
$router->post('check-registro', 'AuthController@checkRegistro');