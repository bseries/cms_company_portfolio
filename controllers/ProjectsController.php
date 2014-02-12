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

namespace cms_agency_portfolio\controllers;

use cms_agency_portfolio\models\Projects;

class ProjectsController extends \cms_core\controllers\BaseController {

	use \cms_core\controllers\AdminAddTrait;
	use \cms_core\controllers\AdminEditTrait;
	use \cms_core\controllers\AdminDeleteTrait;

	use \cms_core\controllers\AdminOrderTrait;
	use \cms_core\controllers\AdminPublishTrait;
	use \cms_core\controllers\AdminPromoteTrait;

	public function admin_index() {
		$data = Projects::find('all', [
			'order' => ['order' => 'DESC']
		]);
		return compact('data');
	}
}

?>