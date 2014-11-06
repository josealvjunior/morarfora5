<div class="candidaturas form">
<?php echo $this->Form->create('Candidatura'); ?>
	<fieldset>
		<legend><?php echo __('Edit Candidatura'); ?></legend>
	<?php
		echo $this->Form->input('co_candidatura');
		echo $this->Form->input('co_imovel');
		echo $this->Form->input('co_usuario');
		echo $this->Form->input('data_registro');
		echo $this->Form->input('data_atualizacao');
		echo $this->Form->input('data_cancelamento');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Candidatura.co_candidatura')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Candidatura.co_candidatura'))); ?></li>
		<li><?php echo $this->Html->link(__('List Candidaturas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
