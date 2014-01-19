
<?php ob_start() ?>
<script>
require([
	'editor',
	'editor-media',
	'editor-page-break',
	'media-attachment',
	],
	function(
		Editor,
		EditorMedia,
		EditorPageBreak,
		MediaAttachment
	) {
		<?php $url = ['controller' => 'files', 'library' => 'cms_media', 'admin' => true] ?>

		var endpoints = {
			index: '<?= $this->url($url + ['action' => 'api_index']) ?>',
			view: '<?= $this->url($url + ['action' => 'api_view', 'id' => '__ID__']) ?>',
			transfer: '<?= $this->url($url + ['action' => 'api_transfer']) ?>'
		};

		var editorMedia = (new EditorMedia()).init({endpoints: endpoints});
		var editorPageBreak = new EditorPageBreak();

		Editor.make('form .teaser textarea', ['basic']);
		Editor.make('form .body textarea', [
			'basic', 'headline', 'size', 'line', 'link', 'list',
			editorMedia,
			editorPageBreak
		]);

		MediaAttachment.direct('form .cover.media-attachment', {endpoints: endpoints});
		MediaAttachment.joined('form .media.media-attachment', {endpoints: endpoints});
});
</script>

<?php $this->scripts(ob_get_clean()) ?>

<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">
	<h1 class="alpha"><?= $this->title($t('Portfolio Project')) ?></h1>

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

		<div class="cover media-attachment">
			<?= $this->form->label('PostsCoverMediaId', $t('Cover')) ?>
			<?= $this->form->hidden('cover_media_id') ?>
			<div class="selected"></div>
			<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
		</div>
		<div class="media media-attachment">
			<?= $this->form->label('PostsMedia', $t('Media')) ?>
			<?php foreach ($item->media() as $media): ?>
				<?= $this->form->hidden('media.' . $media->id . '.id', ['value' => $media->id]) ?>
			<?php endforeach ?>

			<div class="selected"></div>
			<?= $this->html->link($t('select'), '#', ['class' => 'button select']) ?>
		</div>
		<?= $this->form->field('teaser', [
			'type' => 'textarea',
			'label' => $t('Short Description'),
			'wrap' => ['class' => 'teaser'],
		]) ?>
		<?= $this->form->field('body', ['type' => 'textarea', 'label' => $t('Long Description'), 'wrap' => ['class' => 'body']]) ?>

		<?= $this->form->button($t('save'), ['type' => 'submit', 'class' => 'button large']) ?>
	<?=$this->form->end() ?>
</article>