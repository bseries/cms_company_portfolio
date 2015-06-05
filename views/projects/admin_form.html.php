<?php

$this->set([
	'page' => [
		'type' => 'single',
		'title' => $item->title,
		'empty' => $t('untitled'),
		'object' => $t('project')
	],
	'meta' => [
		'is_published' => $item->is_published ? $t('published') : $t('unpublished'),
		'is_promoted' => $item->is_promoted ? $t('promoted') : $t('unpromoted')
	]
]);

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">

	<?=$this->form->create($item) ?>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->form->field('title', ['type' => 'text', 'label' => $t('Title')]) ?>
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('published', ['type' => 'date', 'label' => $t('Release Date')]) ?>
				<div class="help"><?= $t('Allows you to specify when the project was officially released.') ?></div>
				<?= $this->form->field('client', ['type' => 'text', 'label' => $t('Client')]) ?>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->form->field('urls', ['type' => 'textarea', 'value' => $item->urls(), 'label' => $t('Links')]) ?>
				<div class="help">
					<?= $t('Specify Links as URLs with leading protocol (i.e. `http://example.com`).') ?>
					<?= $t('Separate multiple links with newlines so that each one has its own line.') ?>
				</div>
			</div>
			<div class="grid-column-right">
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->media->field('cover_media_id', [
					'label' => $t('Cover'),
					'attachment' => 'direct',
					'value' => $item->cover()
				]) ?>
			</div>
			<div class="grid-column-right">
				<?= $this->media->field('media', [
					'label' => $t('Media'),
					'attachment' => 'joined',
					'value' => $item->media()
				]) ?>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->editor->field('teaser', [
					'label' => $t('Teaser'),
					'size' => 'gamma',
					'features' => 'minimal'
				]) ?>
			</div>
			<div class="grid-column-right"></div>
		</div>

		<div class="grid-row grid-row-last">
			<?= $this->editor->field('body', [
				'label' => $t('Content'),
				'size' => 'beta',
				'features' => 'full'
			]) ?>
		</div>

		<div class="bottom-actions">
			<?php if ($item->exists()): ?>
				<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_company_portfolio'], ['class' => 'button large']) ?>
				<?= $this->html->link($item->is_promoted ? $t('unpromote') : $t('promote'), ['id' => $item->id, 'action' => $item->is_promoted ? 'unpromote': 'promote', 'library' => 'cms_company_portfolio'], ['class' => 'button large']) ?>
			<?php endif ?>
			<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'large save']) ?>
		</div>
	<?=$this->form->end() ?>
</article>