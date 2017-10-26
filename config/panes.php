<?php
/**
 * Copyright 2014 David Persson. All rights reserved.
 * Copyright 2016 Atelier Disko. All rights reserved.
 *
 * Use of this source code is governed by a BSD-style
 * license that can be found in the LICENSE file.
 */

namespace cms_company_portfolio\config;

use base_core\extensions\cms\Panes;
use lithium\g11n\Message;

extract(Message::aliases());

Panes::register('cms.projects', [
	'title' => $t('Projects', ['scope' => 'cms_company_portfolio']),
	'url' => ['controller' => 'projects', 'action' => 'index', 'library' => 'cms_company_portfolio', 'admin' => true],
]);

?>