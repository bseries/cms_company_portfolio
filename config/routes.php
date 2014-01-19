<?php
/**
 * Bureau Agency Portfolio
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

use lithium\net\http\Router;

$persist = ['persist' => ['admin', 'controller']];

Router::connect('/admin/portfolio/projects/{:id:[0-9]+}', array(
	'controller' => 'projects', 'library' => 'cms_agency_portfolio', 'action' => 'view', 'admin' => true
), $persist);
Router::connect('/admin/portfolio/projects/{:action}', array(
	'controller' => 'projects', 'library' => 'cms_agency_portfolio', 'admin' => true
), $persist);
Router::connect('/admin/portfolio/projects/{:action}/{:id:[0-9]+}', array(
	'controller' => 'projects', 'library' => 'cms_agency_portfolio', 'admin' => true
), $persist);

?>