<div class="bairros form">
<?php echo $this->Form->create('Bairro'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bairro'); ?></legend>
	<?php
		echo $this->Form->input('co_bairros');
		echo $this->Form->input('co_regionais');
		echo $this->Form->input('descricao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bairro.co_bairros')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Bairro.co_bairros'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bairros'), array('action' => 'index')); ?></li>
	</ul>
</div>
