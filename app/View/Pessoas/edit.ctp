<?php echo $this->element('topoSistema'); ?>

<div class="sub-header-1 center">
	<div class="container">
		<div>
			<h3>Configurações</h3>
		</div>	
	</div>
</div>
<div class="row">
	<div class="container centralizar box-branco">
		<h3>Informações básicas.</h3> 
		<?php echo $this->Form->create('Pessoa', array('type' => 'file')); ?>
		<fieldset>
			<?php echo $this->Form->input('co_usuario');?>
			<div class="form-group">
				<?php echo $this->Form->input('nome', array('class' => 'form-control', 'label' => 'Nome'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'Email'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('senha', array('class' => 'form-control', 'label' => 'Senha'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('telefone', array('class' => 'form-control', 'label' => 'Telefone'));?>
			</div>
			
			<h3>Perfil</h3>
			<p>Aqui começam as informações para mapearmos o seu perfil. Escolha as opções que melhor representam a sua personalidade.</p>

			<div class="form-group">

				<label>Quais são seus pontos fortes?</label>
				<?php 

				$options=array(
					'1'=>'Raciocínio, estratégia e lógica.',
					'2'=>'Seriedade e estabilidade.',
					'3'=>'Confiança pessoal e ousadia.',
					'4'=>'Otimismo, fé e persistência.');
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
			<div class="form-group">

				<label>Qual é seu ponto fraco?</label>
				<?php 

				$options=array(
					'1'=>'Meu lado emocional é fraco.',
					'2'=>'Não sou muito aberto à novidades.',
					'3'=>'Não tenho muita disciplina.',
					'4'=>'Meu humor é instável.');
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
			<div class="form-group">

				<label>Qual é o seu maior objetivo de vida?</label>
				<?php 

				$options=array(
					'1'=>'Ser o melhor no que faço.',
					'2'=>'Melhorar meu padrão de vida.',
					'3'=>'Não tenho muita disciplina.',
					'4'=>'Ser uma pessoa melhor.');
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
			<div class="form-group">

				<label>Sou uma pessoa muito:</label>
				<?php 

				$options=array(
					'1'=>'Pensadora.',
					'2'=>'Sensitiva.',
					'3'=>'Perceptiva.',
					'4'=>'Sentimental.');
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
			<div class="form-group">
				<label>Descrição: escreva um pouco sobre você.</label>
				<div class="form-group">
					<?php echo $this->Form->input('descricao', array('type' => 'textarea','class' => 'form-control','label' => false));?>
				</div>
			</div>
			<div class="form-group">
				<label for="exampleInputFile">Insira um foto para o seu perfil.</label>
				<?php echo $this->Form->input('Pessoa.imagem',array('type' => 'file'));?>
			</div>
		</fieldset>
		<?php echo $this->Form->button('SALVAR', array('type'=>'submit', 'class' => 'btn btn-md btn-default btn-block')); ?>
		<?php echo $this->Form->end(); ?>			
</div>
<?php echo $this->element('footer');?>


