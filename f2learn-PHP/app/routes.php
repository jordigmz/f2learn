<?php
$router->get('', 'PagesController@index');

$router->get('about', 'PagesController@about');
$router->get('error', 'PagesController@error');
$router->get('faqs', 'PagesController@faqs');
$router->get('membership', 'PagesController@membership');

$router->get('portfolio', 'ImagenGaleriaController@portfolio');
$router->get('gallery-images', 'ImagenGaleriaController@gallery', 'ROLE_ADMIN');
$router->get('gallery-images/:id', 'ImagenGaleriaController@show', 'ROLE_USER');
$router->post('gallery-images/new', 'ImagenGaleriaController@newGalleryImage', 'ROLE_ADMIN');

$router->get('articulos', 'ArticuloController@articulos', 'ROLE_USER');
$router->get('articulos/:id', 'ArticuloController@show', 'ROLE_USER');
$router->post('articulos/nuevo', 'ArticuloController@nuevoArticulo', 'ROLE_USER');

$router->get('partners', 'AsociadoController@partners', 'ROLE_USER');
$router->post('partners/new', 'AsociadoController@newPartner', 'ROLE_ADMIN');

$router->get('contact', 'MensajeController@contact');
$router->post('contact/new', 'MensajeController@newMessage');

$router->get('our-courses', 'CursoController@ourCourses');
$router->get('courses', 'CursoController@courses', 'ROLE_ADMIN');
$router->get('courses/:id', 'CursoController@show', 'ROLE_USER');
$router->get('enroll/:id', 'CursoController@enroll', 'ROLE_USER');
$router->post('courses/new', 'CursoController@newCourse', 'ROLE_ADMIN');

$router->get('blog', 'BlogController@blogPosts');
$router->get('posts', 'BlogController@blog', 'ROLE_ADMIN');
$router->get('post/:id', 'BlogController@show');
$router->post('posts/new', 'BlogController@post', 'ROLE_ADMIN');

$router->get('profile', 'AuthController@profile', 'ROLE_USER');
$router->post('profile/edit', 'AuthController@editProfile', 'ROLE_USER');
$router->post('profile/password/new', 'AuthController@newPassword', 'ROLE_USER');
$router->get('users', 'AuthController@users', 'ROLE_ADMIN');
$router->get('users/:id/grant', 'AuthController@grant', 'ROLE_ADMIN');
$router->get('users/:id/ungrant', 'AuthController@ungrant', 'ROLE_ADMIN');
$router->get('users/:id/delete', 'AuthController@delete', 'ROLE_ADMIN');
$router->get('login', 'AuthController@login');
$router->post('check-login', 'AuthController@checkLogin');
$router->get('logout', 'AuthController@logout', 'ROLE_USER');
$router->get('register', 'AuthController@register');
$router->post('check-register', 'AuthController@checkRegister');