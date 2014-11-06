<?php echo $this->element('topoSistema');?>

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
					<?php foreach ($imovel as $imovel): ?>
						<div class="imovel-horizontal box-branco">
							<div class="col-md-5">
								<?php echo $this->Html->image('2.jpg');?>
							</div>
							<div class="col-md-4">
								<h3>R$ <?php echo $imovel['Imovel']['Valor_Aluguel']; ?></h3>
								<p><span style="font-weight: 700">Bairro:</span> <?php echo $imovel['Bairro']['descricao']; ?></p>
								<p><span style="font-weight: 700">Imóvel:</span> <?php echo $imovel['TipoImovel']['descricao']; ?></p>
								<p><span style="font-weight: 700">Vaga:</span> <?php echo $imovel['TiposQuarto']['descricao']; ?></p>
								<p><span style="font-weight: 700">Gênero:</span> <?php echo $imovel['TipoMoradia']['descricao']; ?></p>
							</div>
							<div class="col-md-3">
								
								<a data-toggle="modal" data-target="#imovel<?php echo $imovel['Imovel']['co_imovel']; ?>" class="btn btn-group-justified bgverde btn-primary"><span class="glyphicon glyphicon-search"></span>  Mais detalhes</a>

								<a data-toggle="modal" data-target="#locador<?php echo $imovel['Imovel']['co_imovel']; ?>" class="btn btn-group-justified bgverde btn-primary"><span class="glyphicon glyphicon-user"></span>  Perfil locador</a>

								<?php
								echo $this->Form->postLink(
									$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-remove')) . " Desistir anúncio",
									array('action' => 'delete', $imovel['Imovel']['co_imovel']),
									array('class' => 'btn btn-group-justified bgverde btn-danger', 'escape' => false),
									__('Você tem certeza de que deseja excluir esse imóvel?', $imovel['Imovel']['co_imovel'])
									);
									?>

								</div>
							</div>

							<!-- Modal imovel-->
							<div class="modal fade bs-example-modal-sm" id="imovel<?php echo $imovel['Imovel']['co_imovel']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog  modal-lg">
									<div class="modal-content">
										<div class="modal-header center color-default">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h3 class="modal-title" id="myModalLabel">Detalhes do imóvel</h3>
										</div>

										<div class="imovel">
											<div class="row">
												<div class="col-md-8">
													<img src="<?php echo $this->webroot;?>/img/1.jpg">
												</div>
												<div class="col-md-4">
													<h2>R$ <?php echo $imovel['Imovel']['Valor_Aluguel']; ?></h2>
													<p><span style="font-weight: 700">Bairro:</span> <?php echo $imovel['Bairro']['descricao']; ?></p>
													<p><span style="font-weight: 700">Imóvel:</span> <?php echo $imovel['TipoImovel']['descricao']; ?></p>
													<p><span style="font-weight: 700">Vaga:</span> <?php echo $imovel['TiposQuarto']['descricao']; ?></p>
													<p><span style="font-weight: 700">Gênero:</span> <?php echo $imovel['TipoMoradia']['descricao']; ?></p>
													<p><span style="font-weight: 700">Fumantes:</span> <?php echo $imovel['Imovel']['fumante']; ?></p>
													<p><span style="font-weight: 700">Animais:</span> <?php echo $imovel['Imovel']['animal']; ?></p>
													<p><span style="font-weight: 700">Mobília:</span> <?php echo $imovel['Imovel']['mobiliado']; ?></p>
													<a data-toggle="modal" data-target="#locador<?php echo $imovel['Imovel']['co_imovel']; ?>" class="btn btn-group-justified bgverde btn-danger"><span class="glyphicon glyphicon-remove"></span>  Desistir</a>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h3 class="panel-title">Descrição</h3>
														</div>
														<div class="panel-body">
															<p><?php echo $imovel['Imovel']['descricao']; ?></p>
														</div>
													</div>
												</div>          
											</div>
										</div>  
									</div><!-- end -->
								</div>
							</div>

							<!---Modal locador ---->
							<div class="modal fade bs-example-modal-sm" id="locador<?php echo $imovel['Imovel']['co_imovel'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
														<h3><?php echo $imovel['Pessoa']['nome']; ?> </h3>
														<h5><span style="font-weight: 700">Idade:</span><?php echo $imovel['Pessoa']['data_Nascimento']; ?></h5>
														<h5><span style="font-weight: 700">Contato:</span> <?php echo $imovel['Pessoa']['telefone']; ?> </h5>
														<h5><span style="font-weight: 700">Email:</span> <?php echo $imovel['Pessoa']['email']; ?> </h5>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h3 class="panel-title">Descrição</h3>
															</div>
															<div class="panel-body">
																<p><?php echo $imovel['Pessoa']['descricao']; ?></p>
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
	<?php include("includes/modal/modal-perfil.php"); ?>
