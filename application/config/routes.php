<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'website';
$route['404_override'] = 'website/Not_found';
$route['translate_uri_dashes'] = FALSE;

$route['about-us']       	= 'website/about_us';
$route['reports']       	= 'website/reports';
$route['publication']       = 'website/publication';
$route['registration']      = 'website/registration';
$route['quizresult']        = 'website/quizresult';


$route['compile-code']        = 'website/compiler';

// $route['course-details/(:any)']    = 'website/coursedetails';
$route['course-details/(:any)'] = 'website/coursedetails/$1';
$route['course-details/(:any)/(:any)'] = 'website/coursedetails/$1/$2';
$route['quizlist/(:any)'] = 'website/quizlist/$1';

// $route['quiza/(:any)'] = 'website/quiza/$1';
$route['quiza/(:any)'] = 'quiz/indexa/$1';
$route['quiza'] = 'quiz/indexa';

$route['userlogin']      	= 'website/userlogin';
$route['research']       	= 'website/research';
$route['for-individuals']   = 'website/for_individuals';
$route['for-organisations'] = 'website/for_organisations';
$route['for-policymakers']  = 'website/for_policymakers';
$route['wellbeing-hub']     = 'website/wellbeing_hub';
$route['csr-partnerships']  = 'website/csr_partnerships';
$route['contact']       	= 'website/contact';
$route['become-a-member']   = 'website/become_a_member';
$route['mr-alok-ranjan']    = 'website/mr_alok_ranjan';
$route['deepali-hacker']    = 'website/deepali_kacker';
$route['professor-madhurima-pradhan'] = 'website/professor_madhurima_pradhan';
$route['join-as-member']    = 'website/join_as_member';
$route['masterclass-in-happiness']	= 'website/masterclass_in_happiness';
$route['daily-mindfulness-well-being-practices-free-guided-exercises'] = 'website/daily_mindfulness_well_being_practices_free_guided_exercises';

$route['personal-happiness-coaching']	= 'website/personal_happiness_coaching';

$route['corporate-well-being-certification-happiness-at-work']  = 'website/corporate_well_being_certification_happiness_at_work';

$route['employee-happiness-audits-measure-improve-well-being-metrics']  = 'website/employee_happiness_audits_measure_improve_well_being_metrics';

$route['leadership-and-emotional-intelligence-training-for-executives-hr-teams']  = 'website/leadership_and_emotional_intelligence_training_for_executives_hr_teams';

$route['happiness-policy-advisory']						= 'website/happiness_policy_advisory';
$route['city-nationwide-happiness-surveys']				= 'website/city_nationwide_happiness_surveys';
$route['public-well-being-programs-scaling-impactful-happiness-initiatives'] = 'website/public_well_being_programs_scaling_impactful_happiness_initiatives';
$route['DetailPage/(:any)']    	= 'website/DetailPage/$1';
$route['article/(:any)']    	= 'website/article/$1';