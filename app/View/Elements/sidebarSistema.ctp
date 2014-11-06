<?php 

$combo = $this->requestAction('imovels/filtro');
$pessoas = $this->requestAction('pessoas/index');
$valor = $this->Session->read('Auth.User');  //Retorna o array com o id, nome do usuário e password.

?>

<div class="container-fluid">
	<div class="menu-vertical">
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a href="/morarfora4/imovels/">IMÓVEIS</a>
			</li>
			<li>
				<a data-toggle="modal" data-target="#perfil">MEU PERFIL</a>
			</li>
			<li>
				<a href="/morarfora4/candidaturas/">MINHAS CANDIDADURAS</a>
			</li>	
			<li>
				<a id="anuncio" href="#" data-toggle="collapse" data-target="#userMenu">
					MEUS ANÚNCIOS <i class="glyphicon glyphicon-chevron-down right"></i>
				</a>
				<ul class="collapse sub-level" id="userMenu">
					<a id="lista" href="/morarfora4/imovels/listaranuncios/"><i class="icon-home"></i><li>Listar anúncios</li></a>
					<a id="cadastro" href="/morarfora4/imovels/add/"><i class="icon-envelope-alt"></i><li>Cadastrar anúncio</li></a>
				</ul>
			</li>
			<li>
				<a href="#" data-toggle="collapse" data-target="#userMenu">
					PESQUISA <i class="glyphicon glyphicon-chevron-down right"></i></a>
				</li>
				<?php echo $this->Form->create('Busca', array('url' => '/imovels/buscaimoveisperfil', 'type' => 'get')); ?>
				<ul class="collapse sub-level-filtro in" id="userMenu">
					<li class="filtro-nlg">
						<?php echo $this->Form->input('co_faixa_preco', array('label' => false, 'empty' =>  'Faixa de preço', 'type' => 'select', 'options'=> $combo['faixasDePrecos'] )); ?>
					</li>
					
					<li class="filtro-nlg">
						<?php echo $this->Form->input('co_regionais', array('label' => false, 'empty' =>  'Regional', 'type' => 'select', 'options'=> $combo['regionais'] )); ?>
					</li>
					
					<li class="filtro-nlg">
						<?php echo $this->Form->input('co_bairros', array('label' => false, 'empty' =>  'Bairros', 'type' => 'select', 'options'=> $combo['bairros'] )); ?>	
					</li>
					
					<li class="filtro-nlg">
						<?php echo $this->Form->input('co_tipos_quartos', array('label' => false, 'empty' =>  'Tipo quarto', 'type' => 'select', 'options'=> $combo['tipoQuartos'] )); ?>	
					</li>
					
					<li class="filtro-nlg">
						<?php echo $this->Form->input('co_tipo_moradia', array('label' => false, 'empty' =>  'Perfil', 'type' => 'select', 'options'=> $combo['tipoMoradia'] )); ?>	
					</li>
					
					<li>
						<?php echo $this->Form->button('Buscar', array('class' => 'btn btn-sm btn-action btn-block')); ?>
					</li>
				</ul>
			</form>
		</ul>
	</div>
</div>

<div class="modal fade bs-example-modal-sm" id="perfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog  modal-md">
		<div class="modal-content">
			<div class="modal-header center color-default">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Perfil</h3>
			</div>
			<div class="modal-body">
				<div class="perfil">
					<div class="row">
						<div class="col-md-3">
							<img src="assets/img/perfil-2.jpg">
						</div>
						<div class="col-md-9">
							<h3><?php echo $valor['nome']; ?> </h3>
							<h5><span style="font-weight: 700">Idade:</span><?php echo $valor['data_Nascimento']; ?></h5>
							<h5><span style="font-weight: 700">Contato:</span> <?php echo $valor['telefone']; ?> </h5>
							<h5><span style="font-weight: 700">Email:</span> <?php echo $valor['email']; ?> </h5>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Descrição</h3>
								</div>
								<div class="panel-body">
									<p><?php echo $valor['descricao']; ?></p>
								</div>
							</div>
						</div>			
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
