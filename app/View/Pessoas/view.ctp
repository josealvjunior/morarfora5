<div class="pessoas view">
<h2><?php echo __('Pessoa'); ?></h2>
	<dl>
		<dt><?php echo __('Co Usuario'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['co_usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Senha'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['senha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['sexo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Atualizacao'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['data_atualizacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Criacao'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['data_Criacao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Cancelamento'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['data_Cancelamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Nascimento'); ?></dt>
		<dd>
			<?php echo h($pessoa['Pessoa']['data_Nascimento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Perfil Psicologico'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pessoa['PerfilPsicologico']['Descricao'], array('controller' => 'perfil_psicologicos', 'action' => 'view', $pessoa['PerfilPsicologico']['co_perfil_psicologico'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pessoa'), array('action' => 'edit', $pessoa['Pessoa']['co_usuario'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pessoa'), array('action' => 'delete', $pessoa['Pessoa']['co_usuario']), array(), __('Are you sure you want to delete # %s?', $pessoa['Pessoa']['co_usuario'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pessoas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pessoa'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Perfil Psicologicos'), array('controller' => 'perfil_psicologicos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Perfil Psicologico'), array('controller' => 'perfil_psicologicos', 'action' => 'add')); ?> </li>
	</ul>
</div>
