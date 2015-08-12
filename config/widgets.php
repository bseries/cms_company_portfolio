<?php
/**
 * CMS Company Portfolio
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * Licensed under the AD General Software License v1.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *
 * You should have received a copy of the AD General Software
 * License. If not, see http://atelierdisko.de/licenses.
 */

namespace cms_company_portfolio\config;

use lithium\g11n\Message;
use base_core\extensions\cms\Widgets;
use cms_company_portfolio\models\Projects;

extract(Message::aliases());

Widgets::register('authoring',  function() use ($t) {
	return [
		'data' => [
			$t('Projects', ['scope' => 'cms_company_portfolio']) => Projects::find('count')
		]
	];
}, [
	'type' => Widgets::TYPE_TABLE,
	'group' => Widgets::GROUP_DASHBOARD
]);


?>