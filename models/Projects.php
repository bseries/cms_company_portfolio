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

namespace cms_company_portfolio\models;

use DateTime;

class Projects extends \base_core\models\Base {

	protected $_meta = [
		'source' => 'portfolio_projects'
	];

	public $belongsTo = [
		'CoverMedia' => [
			'to' => 'base_media\models\Media',
			'key' => 'cover_media_id'
		]
	];

	public $actsAs = [
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'cover' => [
					'type' => 'direct',
					'to' => 'cover_media_id'
				],
				'media' => [
					'type' => 'joined',
					'to' => 'base_media\models\MediaAttachments'
				]
			]
		],
		'base_core\extensions\data\behavior\Timestamp',
		'base_core\extensions\data\behavior\Serializable' => [
			'fields' => [
				'urls' => "\n",
				'parts' => "\n"
			]
		],
		'base_core\extensions\data\behavior\Sortable' => [
			'field' => 'order',
			'cluster' => []
		],
		'base_core\extensions\data\behavior\Searchable' => [
			'fields' => [
				'title',
				'client',
				'published'
			]
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