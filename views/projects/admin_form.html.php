<?php

$title = [
	'action' => ucfirst($this->_request->action === 'add' ? $t('creating') : $t('editing')),
	'title' => $item->title ?: $t('untitled'),
	'object' => [ucfirst($t('portfolio project')), ucfirst($t('portfolio projects'))]
];
$this->title("{$title['title']} - {$title['object'][1]}");

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">
	<h1 class="alpha">
		<span class="action"><?= $title['action'] ?></span>
		<span class="title"><?= $title['title'] ?></span>
	</h1>

	<?=$this->form->create($item) ?>
		<?= $this->form->field('title', ['type' => 'text', 'label' => $t('Title')]) ?>

		<?= $this->form->field('published', ['type' => 'date', 'label' => $t('Release Date')]) ?>
		<div class="help"><?= $t('Allows you to specify when the project was officially released.') ?></div>

		<?= $this->form->field('client', ['type' => 'text', 'label' => $t('Client')]) ?>

		<?= $this->form->field('urls', ['type' => 'textarea', 'value' => $item->urls(), 'label' => $t('Links')]) ?>
		<div class="help">
			<?= $t('Specify Links as URLs with leading protocol (i.e. `http://example.com`).') ?>
			<?= $t('Separate multiple links with newlines so that each one has its own line.') ?>
		</div>

		<?= $this->form->field('parts', ['type' => 'textarea', 'value' => $item->parts(), 'label' => $t('Parts')]) ?>
		<div class="help">
			<?= $t('Allows you to specify subtasks of the project.') ?>
			<?= $t('Separate multiple parts with newlines so that each one has its own line.') ?>
		</div>

		<div class="media-attachment use-media-attachment-direct">
			<?= $this->form->label('ProjectCoverMediaId', $t('Cover')) ?>
			<?= $this->form->hidden('cover_media_id') ?>
			<div class="selected"></div>
			<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
		</div>
		<div class="media-attachment use-media-attachment-joined">
			<?= $this->form->label('ProjectMedia', $t('Media')) ?>
			<?php foreach ($item->media() as $media): ?>
				<?= $this->form->hidden('media.' . $media->id . '.id', ['value' => $media->id]) ?>
			<?php endforeach ?>

			<div class="selected"></div>
			<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
		</div>

		<?= $this->form->field('teaser', [
			'type' => 'textarea',
			'label' => $t('Short Description'),
			'wrap' => ['class' => 'teaser use-editor editor-basic editor-link'],
		]) ?>
		<?= $this->form->field('body', [
			'type' => 'textarea',
			'label' => $t('Long Description'),
			'wrap' => ['class' => 'body use-editor editor-basic editor-headline editor-size editor-line editor-link editor-list editor-page-break']
		]) ?>

		<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'button large']) ?>
	<?=$this->form->end() ?>
</article>