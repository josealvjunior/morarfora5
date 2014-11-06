<?php echo $this->element('topoSistema');?>

<div class="sub-header-2">
	<div class="container">
		<div class="navbar-header">
			<h3>Cadastro de imóvel</h3>	
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
					<div class="box-branco">
						<h3>Cadastre seu imóvel</h3>
						<p>Por favor, preencha as informações de maneira correta para que possamos encontrar a pessoa ideal para o seu imóvel.</p>
						<?php echo $this->Form->create('Imovel', array('type' => 'file')); ?>
							<fieldset>
								<div class="form-group">
									<?php echo $this->Form->input('Valor_Aluguel', array('class' => 'form-control', 'label' => 'Valor'));?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('co_bairros', array('class' => 'form-control', 'label' => 'Bairro', 'options' => $bairros));?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('tipo_imovel_id', array('class' => 'form-control', 'label' => 'Tipo de imóvel', 'options' => $tipoImovels));?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('co_tipos_quartos', array('class' => 'form-control', 'label' => 'Tipo de quarto', 'options' => $tipoQuartos));?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('co_tipo_moradia', array('class' => 'form-control', 'label' => 'Perfil', 'options' => $tipoMoradia));?>
								</div>
								<div class="form-group">
									<label>Aceita fumantes?</label>
									<?php 

										$options=array('S'=>'Sim','N'=>'Não');
										echo $this->Form->input('fumante', array( 'type' => 'radio',
		                                     'separator'=> '<div></div>',
		                                     'before' => '<div>',
		                                     'after' => '</div>',
		                                     'options' =>  $options,
		                                     "legend" => false
		                                   )
		                                );

									?>

								</div>
								<div class="form-group">

									<label>Aceita animais?</label>
									<?php 

										$options=array('S'=>'Sim','N'=>'Não');
										echo $this->Form->input('animal', array( 'type' => 'radio',
		                                     'separator'=> '<div></div>',
		                                     'before' => '<div>',
		                                     'after' => '</div>',
		                                     'options' =>  $options,
		                                     "legend" => false
		                                   )
		                                );

									?>
									
								</div>
								<div class="form-group">

									<label>O imóvel é mobiliado?</label>
									<?php 

										$options=array('S'=>'Sim','N'=>'Não');
										echo $this->Form->input('mobiliado', array( 'type' => 'radio',
		                                     'separator'=> '<div></div>',
		                                     'before' => '<div>',
		                                     'after' => '</div>',
		                                     'options' =>  $options,
		                                     "legend" => false
		                                   )
		                                );

									?>
									
								</div>
								<h3>Perfil de morador</h3>
								<div class="form-group radio-label">

									<?php 

									$options=array(
										'1'=>'Inteligentes, concentradaos, estudiosos mesmo que sejam reservados e tenham dificuldades em lidar com outras pessoas.',
										'2'=>'Sérios, determinados, que tenham estabilidade financeira, que busquem seus objetivos mesmo que tenham dificuldade em aceitar novas ideias e opiniões diferentes.',
										'3'=>'Extrovertidos, originais, com bom relacionamento interpessoal e que gostem de aproveitar a vida, com festas, música alta e um pouco de bagunça.',
										'4'=>'Otimistas, prestativos, capazes de ajudar os outros mesmo que tenham um humor volúvel e fiquem mal humorados as vezes.');
									$attributes=array('legend'=>false);

									echo $this->Form->input('co_perfil_psicologico', array( 'type' => 'radio',
		                                     'separator'=> '<div></div>',
		                                     'before' => '<div>',
		                                     'after' => '</div>',
		                                     'options' =>  $options,
		                                     "legend" => false
		                                   )
		                                );

									?>
								</div>
								<h3>Outros detalhes</h3>
								<div class="form-group">
									<?php echo $this->Form->input('descricao', array('type' => 'textarea','class' => 'form-control'));?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('Imovel.imagem',array('type' => 'file'));?>
								</div>

							</fieldset>
							<?php echo $this->Form->button('ENVIAR', array('type'=>'submit', 'class' => 'btn btn-md btn-default btn-block')); ?>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo $this->element('footer');?>
<?php include("includes/modal/modal-perfil.php"); ?>

<div class="imovels form">
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Imovels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tipo Imovels'), array('controller' => 'tipo_imovels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo Imovel'), array('controller' => 'tipo_imovels', 'action' => 'add')); ?> </li>
	</ul>
</div>
