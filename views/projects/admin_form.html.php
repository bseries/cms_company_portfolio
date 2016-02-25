<?php

use lithium\g11n\Message;

$t = function($message, array $options = []) {
	return Message::translate($message, $options + ['scope' => 'cms_company_portfolio', 'default' => $message]);
};

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
<article>
	<?=$this->form->create($item) ?>
		<div class="grid-row">
			<div class="grid-column-left">
				<?= $this->form->field('title', ['type' => 'text', 'label' => $t('Title')]) ?>
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('published', ['type' => 'date', 'label' => $t('Release Date')]) ?>
				<div class="help"><?= $t('Allows you to specify when the project was officially released.') ?></div>
				<?= $this->form->field('tags', [
					'value' => $item->tags(),
					'label' => $t('Tags'),
					'placeholder' => 'foo, bar',
					'class' => 'input--tags'
				]) ?>
				<?= $this->form->field('client', ['type' => 'text', 'label' => $t('Client')]) ?>
				<?= $this->form->field('url', ['type' => 'url', 'label' => $t('Link')]) ?>
				<div class="help">
					<?= $t('Specify Link as URL with leading protocol (i.e. `http://example.com`).') ?>
				</div>
			</div>
		</div>
		<div class="grid-row">
			<div class="grid-column-left">
			</div>
			<div class="grid-column-right">
				<?= $this->form->field('tasks', [
					'label' => $t('Tasks'),
					'value' => $item->tasks(),
					'type' => 'textarea'
				]) ?>
				<div class="help">
					<?= $t('Tasks for the project (i.e. `art direction`), one per line.') ?>
				</div>
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
			<div class="bottom-actions__left">
				<?php if ($item->exists()): ?>
					<?= $this->html->link($t('delete'), [
						'action' => 'delete', 'id' => $item->id
					], ['class' => 'button large delete']) ?>
				<?php endif ?>
			</div>
			<div class="bottom-actions__right">
				<?php if ($item->exists()): ?>
					<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish'], ['class' => 'button large']) ?>
					<?= $this->html->link($item->is_promoted ? $t('unpromote') : $t('promote'), ['id' => $item->id, 'action' => $item->is_promoted ? 'unpromote': 'promote'], ['class' => 'button large']) ?>
				<?php endif ?>
				<?= $this->form->button($t('save'), [
					'type' => 'submit',
					'class' => 'button large save'
				]) ?>
			</div>
		</div>

	<?=$this->form->end() ?>
</article>