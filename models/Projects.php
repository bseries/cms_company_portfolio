<?php
/**
 * Copyright 2014 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_company_portfolio\models;

use DateTime;
use lithium\g11n\Message;

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

	protected $_actsAs = [
		'base_media\extensions\data\behavior\Coupler' => [
			'bindings' => [
				'cover' => [
					'type' => 'direct',
					'to' => 'cover_media_id'
				],
				'media' => [
					'type' => 'joined',
					'to' => 'base_media\models\MediaAttachments'
				],
				'bodyMedia' => [
					'type' => 'inline',
					'to' => 'body'
				]
			]
		],
		'base_core\extensions\data\behavior\Sluggable',
		'base_core\extensions\data\behavior\Timestamp',
		'base_core\extensions\data\behavior\Serializable' => [
			'fields' => [
				'tasks' => "\n"
			]
		],
		'base_core\extensions\data\behavior\Sortable' => [
			'field' => 'order',
			'cluster' => []
		],
		'li3_taggable\extensions\data\behavior\Taggable' => [
			'field' => 'tags',
			'tagsModel' => 'base_tag\models\Tags',
			'filters' => ['strtolower']
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
		extract(Message::aliases());
		$model = static::_object();

		$model->validates['title'] = [
			[
				'notEmpty',
				'on' => ['create', 'update'],
				'message' => 'Dieses Feld darf nicht leer sein.'
			]
		];
		$model->validates['tags'] = [
			[
				'noSpacesInTags',
				'on' => ['create', 'update'],
				'message' => $t('Tags cannot contain spaces.', ['scope' => 'cms_company_portfolio'])
			]
		];

	}

	public function date($entity) {
		if ($entity->published) {
			return DateTime::createFromFormat('Y-m-d', $entity->published);
		}
		return DateTime::createFromFormat('Y-m-d H:i:s', $entity->created);
	}
}

Projects::init();

?>