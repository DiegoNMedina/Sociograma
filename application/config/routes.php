<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'sociograma';
$route['404_override'] = 'notfound/index';


/* STUDENT TEST */
//$route['novenoA'] = 'sociograma/novenoA';
//$route['novenoB'] = 'sociograma/novenoB';
//$route['novenoC'] = 'sociograma/novenoC';
//$route['novenoD'] = 'sociograma/novenoD';


/* TEACHER REPORTS */
$route['teacherReports'] = 'sociograma/TeacherReports';
$route['translate_uri_dashes'] = FALSE;