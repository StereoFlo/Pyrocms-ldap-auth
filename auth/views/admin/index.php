<section class="title">
	<h4><?= lang('auth:admin:config:title'); ?></h4>
</section>

<section class="item">
	<div class="content">
	<?php if (!empty($items)): ?>
	
		<table>
			<thead>
				<tr>
					<th><?= lang('auth:admin:config:name'); ?></th>
					<th><?= lang('auth:admin:config:enable'); ?></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach( $items as $item ): ?>
				<tr>
					<td><?php echo $item->name; ?></td>
					<td><?php echo $item->default_config; ?></td>
					<td class="actions">
						<?php echo
						anchor('admin/auth/edit/'.$item->id, lang('global:edit'), 'class="button"').' '.
						anchor('admin/auth/delete/'.$item->id, lang('global:delete'), array('class'=>'button')); ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	<?php else: ?>
		<div class="no_data"><?php echo lang('auth:admin:config:no_items'); ?></div>
	<?php endif;?>
	</div>
</section>