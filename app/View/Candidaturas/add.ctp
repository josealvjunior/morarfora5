<?php 
echo "<pre>";
print_r($imovel['Imovel']['co_imovel']);
//print_r($imovel);
echo "</pre>";
?>
<div class="candidaturas form">
<?php echo $this->Form->create('Candidatura'); ?>
	<fieldset>
		<legend><?php echo __('Add Candidatura'); ?></legend>
	<?php
		echo $this->Form->input('co_imovel');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Candidaturas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
