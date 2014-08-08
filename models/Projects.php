<?php
/**
 * Bureau Company Portfolio
 *
 * Copyright (c) 2014 Atelier Disko - All rights reserved.
 *
 * This software is proprietary and confidential. Redistribution
 * not permitted. Unless required by applicable law or agreed to
 * in writing, software distributed on an "AS IS" BASIS, WITHOUT-
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 */

namespace cms_company_portfolio\models;

use lithium\util\Validator;
use DateTime;

class Projects extends \cms_core\models\Base {

	protected $_meta = array(
		'source' => 'portfolio_projects'
	);

	public $belongsTo = [
		'CoverMedia' => [
			'to' => 'cms_media\models\Media',
			'key' => 'cover_media_id'
		]
	];

	protected static $_actsAs = [
		'cms_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'cover' => [
					'type' => 'direct',
					'to' => 'cover_media_id'
				],
				'media' => [
					'type' => 'joined',
					'to' => 'cms_media\models\MediaAttachments'
				]
			]
		],
		'cms_core\extensions\data\behavior\Timestamp',
		'cms_core\extensions\data\behavior\Serializable' => [
			'fields' => [
				'urls' => "\n",
				'parts' => "\n"
			]
		],
		'cms_core\extensions\data\behavior\Sortable' => [
			'field' => 'order',
			'cluster' => []
		]
	];

	public static function init() {
		$model = static::_object();

		$model->validates['title'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => 'Dieses Feld darf nicht leer sein.'
			]
		];
	}

	public function date($entity) {
		return DateTime::createFromFormat('Y-m-d H:i:s', $entity->created);
	}
}

Projects::init();

?>