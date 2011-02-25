<div class="categories index">
	<h2><?php __('Categoría');?></h2>
	<table cellpadding="0" cellspacing="0" id="sortable" controller="categories">
	<tr class='ui-state-disabled'>	
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($categories as $category):
			$class =  ' class="ui-state-default "';
		if ($i++ % 2 == 0) {
			$class = ' class="altrow ui-state-default"';
		}
	?>
	<tr<?php echo $class;?> id="<?php echo $category['Category']['id'];?>">
		<td><?php echo $category['Category']['id']; ?>&nbsp;</td>
		<td><?php echo $category['Category']['nombre']; ?>&nbsp;</td>
		<td class="order"><?php echo $category['Category']['order']; ?>&nbsp;</td>
		<td class="actions">
		
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $category['Category']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $category['Category']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Categoría', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
	</ul>
</div>