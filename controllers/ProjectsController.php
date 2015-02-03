<?php
/**
 * CMS Company Portfolio
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

namespace cms_company_portfolio\controllers;

use cms_company_portfolio\models\Projects;

class ProjectsController extends \base_core\controllers\BaseController {

	use \base_core\controllers\AdminIndexOrderedTrait;
	use \base_core\controllers\AdminAddTrait;
	use \base_core\controllers\AdminEditTrait;
	use \base_core\controllers\AdminDeleteTrait;

	use \base_core\controllers\AdminOrderTrait;
	use \base_core\controllers\AdminPublishTrait;
	use \base_core\controllers\AdminPromoteTrait;
}

?>