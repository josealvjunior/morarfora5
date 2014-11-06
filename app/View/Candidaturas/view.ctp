<div class="candidaturas view">
<h2><?php echo __('Candidatura'); ?></h2>
	<dl>
		<dt><?php echo __('Co Candidatura'); ?></dt>
		<dd>
			<?php echo h($candidatura['Candidatura']['co_candidatura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Co Imovel'); ?></dt>
		<dd>
			<?php echo h($candidatura['Candidatura']['co_imovel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Co Usuario'); ?></dt>
		<dd>
			<?php echo h($candidatura['Candidatura']['co_usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Registro'); ?></dt>
		<dd>
			<?php echo h($candidatura['Candidatura']['data_registro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Atualizacao'); ?></dt>
		<dd>
			<?php echo h($candidatura['Candidatura']['data_atualizacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Cancelamento'); ?></dt>
		<dd>
			<?php echo h($candidatura['Candidatura']['data_cancelamento']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Candidatura'), array('action' => 'edit', $candidatura['Candidatura']['co_candidatura'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Candidatura'), array('action' => 'delete', $candidatura['Candidatura']['co_candidatura']), array(), __('Are you sure you want to delete # %s?', $candidatura['Candidatura']['co_candidatura'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Candidaturas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidatura'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pessoas'); ?></h3>
	<?php if (!empty($candidatura['Pessoa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Co Usuario'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Senha'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Data Atualizacao'); ?></th>
		<th><?php echo __('Data Criacao'); ?></th>
		<th><?php echo __('Data Cancelamento'); ?></th>
		<th><?php echo __('Data Nascimento'); ?></th>
		<th><?php echo __('Co Perfil Psicologico'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Imagem'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($candidatura['Pessoa'] as $pessoa): ?>
		<tr>
			<td><?php echo $pessoa['co_usuario']; ?></td>
			<td><?php echo $pessoa['nome']; ?></td>
			<td><?php echo $pessoa['email']; ?></td>
			<td><?php echo $pessoa['senha']; ?></td>
			<td><?php echo $pessoa['telefone']; ?></td>
			<td><?php echo $pessoa['sexo']; ?></td>
			<td><?php echo $pessoa['data_atualizacao']; ?></td>
			<td><?php echo $pessoa['data_Criacao']; ?></td>
			<td><?php echo $pessoa['data_Cancelamento']; ?></td>
			<td><?php echo $pessoa['data_Nascimento']; ?></td>
			<td><?php echo $pessoa['co_perfil_psicologico']; ?></td>
			<td><?php echo $pessoa['descricao']; ?></td>
			<td><?php echo $pessoa['imagem']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pessoas', 'action' => 'view', $pessoa['co_usuario'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pessoas', 'action' => 'edit', $pessoa['co_usuario'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pessoas', 'action' => 'delete', $pessoa['co_usuario']), array(), __('Are you sure you want to delete # %s?', $pessoa['co_usuario'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
