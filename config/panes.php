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

use cms_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

$base = ['controller' => 'projects', 'library' => 'cms_agency_portfolio', 'admin' => true];
Panes::registerActions('cms_agency_portfolio', 'authoring', [
	$t('List Projects') => ['action' => 'index'] + $base,
	$t('New Project') => ['action' => 'add'] + $base
]);

?>