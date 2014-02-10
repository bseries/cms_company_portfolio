<?php

$dateFormatter = new IntlDateFormatter(
	'de_DE',
	IntlDateFormatter::SHORT,
	IntlDateFormatter::SHORT
);

?>
<article class="view-<?= $this->_config['controller'] . '-' . $this->_config['template'] ?>">
	<h1 class="alpha"><?= $t('Portfolio Projects') ?></h1>

	<nav class="actions">
		<?= $this->html->link($t('new project'), ['action' => 'add', 'library' => 'cms_agency_portfolio'], ['class' => 'button']) ?>
	</nav>

	<?php if ($data->count()): ?>
		<table>
			<thead>
				<tr>
					<td><?= $t('publ.?') ?>
					<td><?= $t('prom.?') ?>
					<td>
					<td><?= $t('Title') ?>
					<td><?= $t('Created') ?>
					<td><?= $t('Modified') ?>
					<td>
			</thead>
			<tbody class="use-manual-sorting">
				<?php foreach ($data as $item): ?>
				<tr data-id="<?= $item->id ?>">
					<td>
						<?= ($item->is_published ? '✓' : '╳') ?>
					<td>
						<?= ($item->is_promoted ? '✓' : '╳') ?>
					<td>
						<?php if (($media = $item->cover()) && ($version = $media->version('fix3'))): ?>
							<?= $this->media->image($version->url('http'), ['class' => 'media']) ?>
						<?php endif ?>
					<td><?= $item->title ?>
					<td>
						<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $item->created) ?>
						<time datetime="<?= $date->format(DateTime::W3C) ?>"><?= $dateFormatter->format($date) ?></time>
					<td>
						<?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $item->modified) ?>
						<time datetime="<?= $date->format(DateTime::W3C) ?>"><?= $dateFormatter->format($date) ?></time>
					<td>
						<nav class="actions">
							<?= $this->html->link($t('delete'), ['id' => $item->id, 'action' => 'delete', 'library' => 'cms_agency_portfolio'], ['class' => 'button']) ?>
							<?= $this->html->link($item->is_promoted ? $t('unpromote') : $t('promote'), ['id' => $item->id, 'action' => $item->is_promoted ? 'unpromote': 'promote', 'library' => 'cms_agency_portfolio'], ['class' => 'button']) ?>
							<?= $this->html->link($item->is_published ? $t('unpublish') : $t('publish'), ['id' => $item->id, 'action' => $item->is_published ? 'unpublish': 'publish', 'library' => 'cms_agency_portfolio'], ['class' => 'button']) ?>
							<?= $this->html->link($t('edit'), ['id' => $item->id, 'action' => 'edit', 'library' => 'cms_agency_portfolio'], ['class' => 'button']) ?>
						</nav>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php else: ?>
		<div class="none-available"><?= $t('No projects available, yet.') ?></div>
	<?php endif ?>
</article>