<?php  $valor = $this->Session->read('Auth.User'); ?> 

<div id="header" class="Anonymous" role="navigation">
	<div class="container2">
		<div class="navbar-collapse collapse">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a id="logo" class="navbar-brand" href="/morarfora4/imovels/"><?php echo $this->Html->image('logo.png'); ?></a>
			<ul id="logo" class="nav navbar-nav navbar-right">
				<li><img class="img-perfil-sm" src="#"></li>
				<li><a href="/morarfora4/imovels/"><span class="glyphicon  glyphicon-home"></span> Início</a></li>
				<li>

				<?php
					echo $this->Html->link(
					$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-cog')) . " Configurações",
					array(
						'controller' => 'pessoas',
						'action' => 'edit', $valor['co_usuario']),
					array('escape' => false)
				);?>

				</li>
				<li><a href="/morarfora4/users/logout"><span class="glyphicon glyphicon-share-alt"></span> Sair</a></li>
			</ul>
		</div>
	</div>
</div>