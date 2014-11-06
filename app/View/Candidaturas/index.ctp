<?php echo $this->element('topoSistema');
echo "<pre>";
print_r($candidaturas);
//print_r($imovel);
echo "</pre>";
?>

<div class="sub-header-2">
	<div class="container">
		<div class="navbar-header">
			<h3>Minhas candidaturas</h3>	
		</div>		
	</div>
</div>
<div class="container2">
	<div class="row">
		<div class="col-md-3">
			<div class="row">
				<?php echo $this->element('sidebarSistema');?>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<?php foreach ($candidaturas as $candidatura): ?>
						<div class="imovel-horizontal box-branco">
							<div class="col-md-5">
								<?php echo $this->html->image('uploads/'.$candidatura['Imovel']['imagem']);?>
							</div>
							<div class="col-md-4">
								<h3>R$ <?php echo $candidatura['Imovel']['Valor_Aluguel']; ?></h3>
								<p><span style="font-weight: 700">Bairro:</span> <?php echo $candidatura['Bairro']['descricao']; ?></p>
								<p><span style="font-weight: 700">Imóvel:</span> <?php echo $candidatura['TipoImovel']['descricao']; ?></p>
								<p><span style="font-weight: 700">Vaga:</span> <?php echo $candidatura['TiposQuarto']['descricao']; ?></p>
								<p><span style="font-weight: 700">Gênero:</span> <?php echo $candidatura['TipoMoradia']['descricao']; ?></p>
							</div>
							<div class="col-md-3">
								
								<a data-toggle="modal" data-target="#imovel<?php echo $candidatura['Imovel']['co_imovel']; ?>" class="btn btn-group-justified bgverde btn-primary"><span class="glyphicon glyphicon-search"></span>  Mais detalhes</a>

								<a data-toggle="modal" data-target="#locador<?php echo $candidatura['Imovel']['co_imovel']; ?>" class="btn btn-group-justified bgverde btn-primary"><span class="glyphicon glyphicon-user"></span>  Perfil locador</a>

								<?php
								echo $this->Form->postLink(
									$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Desistir anúncio",
									array('action' => 'delete', $candidatura['Candidatura']['co_candidatura']),
									array('class' => 'btn btn-group-justified bgverde btn-danger', 'escape' => false),
									__('Você tem certeza de que deseja desistir desse imóvel?', $candidatura['Candidatura']['co_candidatura'])
									);
								?>

								</div>
							</div>

							<!-- Modal imovel-->
							<div class="modal fade bs-example-modal-sm" id="imovel<?php echo $candidatura['Imovel']['co_imovel']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog  modal-lg">
									<div class="modal-content">
										<div class="modal-header center color-default">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h3 class="modal-title" id="myModalLabel">Detalhes do imóvel</h3>
										</div>

										<div class="imovel">
											<div class="row">
												<div class="col-md-8">
													<?php echo $this->html->image('uploads/'.$candidatura['Imovel']['imagem']);?>
												</div>
												<div class="col-md-4">
													<h2>R$ <?php echo $candidatura['Imovel']['Valor_Aluguel']; ?></h2>
													<p><span style="font-weight: 700">Bairro:</span> <?php echo $candidatura['Bairro']['descricao']; ?></p>
													<p><span style="font-weight: 700">Imóvel:</span> <?php echo $candidatura['TipoImovel']['descricao']; ?></p>
													<p><span style="font-weight: 700">Vaga:</span> <?php echo $candidatura['TiposQuarto']['descricao']; ?></p>
													<p><span style="font-weight: 700">Gênero:</span> <?php echo $candidatura['TipoMoradia']['descricao']; ?></p>
													<p><span style="font-weight: 700">Fumantes:</span> <?php echo $candidatura['Imovel']['fumante']; ?></p>
													<p><span style="font-weight: 700">Animais:</span> <?php echo $candidatura['Imovel']['animal']; ?></p>
													<p><span style="font-weight: 700">Mobília:</span> <?php echo $candidatura['Imovel']['mobiliado']; ?></p>
													<a data-toggle="modal" data-target="#locador<?php echo $candidatura['Imovel']['co_imovel']; ?>" class="btn btn-group-justified bgverde btn-danger"><span class="glyphicon glyphicon-remove"></span>  Desistir</a>

												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h3 class="panel-title">Descrição</h3>
														</div>
														<div class="panel-body">
															<p><?php echo $candidatura['Imovel']['descricao']; ?></p>
														</div>
													</div>
												</div>          
											</div>
										</div>  
									</div><!-- end -->
								</div>
							</div>

							<!---Modal locador ---->
							<div class="modal fade bs-example-modal-sm" id="locador<?php echo $candidatura['Imovel']['co_imovel'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog  modal-md">
									<div class="modal-content">
										<div class="modal-header center color-default">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h3 class="modal-title">Perfil locador</h3>
										</div>
										<div class="modal-body">
											<div class="perfil">
												<div class="row">
													<div class="col-md-3">
														<img src="assets/img/perfil-2.jpg">
													</div>
													<div class="col-md-9">
														<h3><?php echo $candidatura['Locador']['nome']; ?> </h3>
														<h5><span style="font-weight: 700">Idade:</span><?php echo $candidatura['Locador']['data_Nascimento']; ?></h5>
														<h5><span style="font-weight: 700">Contato:</span> <?php echo $candidatura['Locador']['telefone']; ?> </h5>
														<h5><span style="font-weight: 700">Email:</span> <?php echo $candidatura['Locador']['email']; ?> </h5>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h3 class="panel-title">Descrição</h3>
															</div>
															<div class="panel-body">
																<p><?php echo $candidatura['Locador']['descricao']; ?></p>
															</div>
														</div>
													</div>			
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('footer');?>


<div class="candidaturas index">
	<h2><?php echo __('Candidaturas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('co_candidatura'); ?></th>
			<th><?php echo $this->Paginator->sort('co_imovel'); ?></th>
			<th><?php echo $this->Paginator->sort('co_usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('data_registro'); ?></th>
			<th><?php echo $this->Paginator->sort('data_atualizacao'); ?></th>
			<th><?php echo $this->Paginator->sort('data_cancelamento'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($candidaturas as $candidatura): ?>
	<tr>
		<td><?php echo h($candidatura['Candidatura']['co_candidatura']); ?>&nbsp;</td>
		<td><?php echo h($candidatura['Candidatura']['co_imovel']); ?>&nbsp;</td>
		<td><?php echo h($candidatura['Candidatura']['co_usuario']); ?>&nbsp;</td>
		<td><?php echo h($candidatura['Candidatura']['data_registro']); ?>&nbsp;</td>
		<td><?php echo h($candidatura['Candidatura']['data_atualizacao']); ?>&nbsp;</td>
		<td><?php echo h($candidatura['Candidatura']['data_cancelamento']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $candidatura['Candidatura']['co_candidatura'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $candidatura['Candidatura']['co_candidatura'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $candidatura['Candidatura']['co_candidatura']), array(), __('Are you sure you want to delete # %s?', $candidatura['Candidatura']['co_candidatura'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Candidatura'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Pessoas'), array('controller' => 'pessoas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pessoa'), array('controller' => 'pessoas', 'action' => 'add')); ?> </li>
	</ul>
</div>
