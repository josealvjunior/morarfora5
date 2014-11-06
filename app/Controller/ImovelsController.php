<?php
App::uses('AppController', 'Controller');
/**
 * Imovels Controller
 *
 * @property Imovel $Imovel
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ImovelsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

	public function filtro(){

		 $faixasDePrecos = $this->Imovel->FaixaPreco->find('list', array('fields' => array('co_faixa_preco', 'descricao'), 
				'order'  => array('min_Valor')
		 ));

		 $regionais = $this->Imovel->Bairro->RegionaisBairro->find('list', array('fields' => array('co_regionais', 'descricao'),
													'order' => array('descricao') ));

		 $bairros = $this->Imovel->Bairro->find('list', array('fields' => array('co_bairros', 'descricao'),
													'order' => array('descricao') ));

		 $tipoQuartos = $this->Imovel->TiposQuarto->find('list', array('fields' => array('co_tipos_quartos', 'descricao'),
													'order' => array('descricao') ));

		 $tipoMoradia = $this->Imovel->TipoMoradia->find('list', array('fields' => array('co_tipo_moradia', 'descricao'),
													'order' => array('descricao') ));

		 $this->set(compact('faixasDePrecos', 'regionais', 'bairros', 'tipoMoradia', 'tipoQuartos'));
		 
		if ($this->request->is('requested')) {   //Se for requisição de outra view/element:
            return compact('faixasDePrecos', 'regionais', 'bairros', 'tipoMoradia', 'tipoQuartos');
        } else {  //Senão envia para a view padrão
            $this->set('tipoMoradia', $tipoMoradia);
        }

	}

	public function busca(){

		$conditions = array();

		if(!empty($this->request->query['co_faixa_preco'])){
			$conditions['Imovel.co_faixa_preco'] = $this->request->query['co_faixa_preco'];
		}	

		if(!empty($this->request->query['co_regionais'])){
			$conditions['Bairro.co_regionais'] = $this->request->query['co_regionais'];
		}	

		if(!empty($this->request->query['co_bairros'])){
			$conditions['Imovel.co_bairros'] = $this->request->query['co_bairros'];
		}

		if(!empty($this->request->query['co_tipos_quartos'])){
			$conditions['Imovel.co_tipos_quartos'] = $this->request->query['co_tipos_quartos'];
		}


		if(!empty($this->request->query['co_tipo_moradia'])){
			$conditions['Imovel.co_tipo_moradia'] = $this->request->query['co_tipo_moradia'];
		}

		$imoveis =  $this->Imovel->find('all', array( 'conditions' => $conditions ));

		$result = Set::sort($imoveis, '{n}.Imovel.co_imovel', 'desc');

		if ($this->request->is('requested')) {   //Se for requisição de outra view/element:
            return $result;
        } else {  //Senão envia para a view padrão
            $this->set('imoveis', $result);
        }

	}

	public function buscaimoveisperfil(){

		$conditions = array();

		if(!empty($this->request->query['co_faixa_preco'])){
			$conditions['Imovel.co_faixa_preco'] = $this->request->query['co_faixa_preco'];
		}	

		if(!empty($this->request->query['co_regionais'])){
			$conditions['Bairro.co_regionais'] = $this->request->query['co_regionais'];
		}	

		if(!empty($this->request->query['co_bairros'])){
			$conditions['Imovel.co_bairros'] = $this->request->query['co_bairros'];
		}

		if(!empty($this->request->query['co_tipos_quartos'])){
			$conditions['Imovel.co_tipos_quartos'] = $this->request->query['co_tipos_quartos'];
		}


		if(!empty($this->request->query['co_tipo_moradia'])){
			$conditions['Imovel.co_tipo_moradia'] = $this->request->query['co_tipo_moradia'];
		}

		$imoveis =  $this->Imovel->find('all', array( 'conditions' => $conditions ));

		$result = Set::sort($imoveis, '{n}.Imovel.co_imovel', 'desc');

		if ($this->request->is('requested')) {   //Se for requisição de outra view/element:
            return $result;
        } else {  //Senão envia para a view padrão
            $this->set('imoveis', $imoveis);
        }

	}

	/*public function logar(){

		$this->Session->write('user', array('nome' => 'Lucas', 'id'=> 60) );
	}

	public function deslogar(){

		$this->Session->write('user', null );
		$this->Session->delete('user' );
	}*/


/**
 * index method
 *
 * @return void
 */
	public function index() {

		/*$user = $this->Session->read('user');
		
		if( !empty($user) ){
			$conditions =  array('Imovel.co_usuario' => '3', 'Imovel.co_perfil_psicologico' => '1');
			$imoveis =  $this->Imovel->find('all', array( 'conditions' => $conditions ));
			$this->set('imovels', $imoveis);
			//$this->Imovel->recursive = 0;
			//$this->set('imovels', $this->Paginator->paginate());
		} else {
			//echo 'Você não possui permissões'; exit;
			$this->Session->setFlash('Você não possui permissões');
			$this->redirect('/');
		}*/

		$usuario = $this->Auth->user('co_perfil_psicologico');

		$conditions =  array('Imovel.co_perfil_psicologico' => $usuario);
		$imoveis =  $this->Imovel->find('all', array( 'conditions' => $conditions ));
		$this->set('imovels', $imoveis);

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Imovel->exists($id)) {
			throw new NotFoundException(__('Invalid imovel'));
		}
		$options = array('conditions' => array('Imovel.' . $this->Imovel->primaryKey => $id));
		$this->set('imovel', $this->Imovel->find('first', $options));
	}

	public function listar($id = null) {
		if (!$this->Imovel->exists($id)) {
			throw new NotFoundException(__('Invalid imovel'));
		}
		$options = array('conditions' => array(
			'Imovel.' . $this->Imovel->primaryKey => $id,
			'Candidato.co_imovel = Imovel.co_imovel'));
		$this->set('imovel', $this->Imovel->find('first', $options));
	}


	public function listarAnuncios() {

		$usuario = $this->Auth->user('co_usuario');
		$conditions =  array('Imovel.co_usuario' => $usuario);

		$imoveis =  $this->Imovel->find('all', array( 'conditions' => $conditions ));

		$this->set('imovel', $imoveis);

	}

	public function candidaturas() {
		
		$imovel = $this->Imovel->find('all');
		$this->set('imovel', $imovel);

		if ($this->request->is('requested')) {   //Se for requisição de outra view/element:
            return $imovel;
        } else {  //Senão envia para a view padrão
            $this->set('imovel', $this->Imovel->find('all'));
        }
	}

	public function imoveisperfil() {

		$this->set('imovel', $this->Imovel->find('all'));
	}


/**
 * add method
 *
 * @return void
 */
	public function add () {

		if ($this->request->is('post')) {

			$this->Imovel->create();

			$this->request->data['Imovel']['co_usuario'] = $this->Auth->user('co_usuario');

			if($this->request->data['Imovel']['Valor_Aluguel'] < 400){
				$this->request->data['Imovel']['co_faixa_preco'] = 1;
			} else if($this->request->data['Imovel']['Valor_Aluguel'] < 600 ){
				$this->request->data['Imovel']['co_faixa_preco'] = 2;
			}else if($this->request->data['Imovel']['Valor_Aluguel'] < 800 ){
				$this->request->data['Imovel']['co_faixa_preco'] = 3;
			} else{
				$this->request->data['Imovel']['co_faixa_preco'] =4;
			}

			if ($this->Imovel->save($this->request->data)) {
				$this->Session->setFlash(__('The imovel has been saved.'));
				return $this->redirect(array('action' => 'listaranuncios'));
			} else {
				$this->Session->setFlash(__('The imovel could not be saved. Please, try again.'));
			}

		}

		$usuario = $this->Auth->user('co_usuario');

		$tipoImovels = $this->Imovel->TipoImovel->find('list', array('fields' => array('tipo_imovel_id', 'descricao'),
													'order' => array('descricao') ));
		$tipoQuartos = $this->Imovel->TiposQuarto->find('list', array('fields' => array('co_tipos_quartos', 'descricao'),
													'order' => array('descricao') ));
		$bairros = $this->Imovel->Bairro->find('list', array('fields' => array('co_bairros', 'descricao'),
													'order' => array('descricao') ));
		$tipoMoradia = $this->Imovel->TipoMoradia->find('list', array('fields' => array('co_tipo_moradia', 'descricao'),
													'order' => array('descricao') ));
		$perfilPsicologico = $this->Imovel->PerfilPsicologico->find('list', array('fields' => array('co_perfil_psicologico', 'Descricao'),
													'order' => array('Descricao') ));
		$fumante = $this->Imovel->find('list', array('fields' => array('fumante'),
													'order' => array('fumante') ));
		$animal = $this->Imovel->find('list', array('fields' => array('animal'),'order' => array('animal') ));
		
		$mobiliado = $this->Imovel->find('list', array('fields' => array('mobiliado'),'order' => array('mobiliado') ));

		$this->set(compact('usuario','tipoImovels', 'tipoQuartos', 'bairros', 'tipoMoradia', 'perfilPsicologico', 'fumante', 'animal', 'mobiliado'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Imovel->exists($id)) {
			throw new NotFoundException(__('Invalid imovel'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->request->data['Imovel']['Valor_Aluguel'] < 400){
				$this->request->data['Imovel']['co_faixa_preco'] = 1;
			} else if($this->request->data['Imovel']['Valor_Aluguel'] < 600 ){
				$this->request->data['Imovel']['co_faixa_preco'] = 2;
			}else if($this->request->data['Imovel']['Valor_Aluguel'] < 800 ){
				$this->request->data['Imovel']['co_faixa_preco'] = 3;
			} else{
				$this->request->data['Imovel']['co_faixa_preco'] =4;
			}
			if ($this->Imovel->save($this->request->data)) {
				$this->Session->setFlash(__('O imóvel foi editado com sucesso.'));
				return $this->redirect(array('action' => 'listaranuncios'));
			} else {
				$this->Session->setFlash(__('The imovel could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Imovel.' . $this->Imovel->primaryKey => $id));
			$this->request->data = $this->Imovel->find('first', $options);
		}
		
		
		$tipoImovels = $this->Imovel->TipoImovel->find('list', array('fields' => array('tipo_imovel_id', 'descricao'),
													'order' => array('descricao') ));
		$tipoQuartos = $this->Imovel->TiposQuarto->find('list', array('fields' => array('co_tipos_quartos', 'descricao'),
													'order' => array('descricao') ));
		$bairros = $this->Imovel->Bairro->find('list', array('fields' => array('co_bairros', 'descricao'),
													'order' => array('descricao') ));
		$tipoMoradia = $this->Imovel->TipoMoradia->find('list', array('fields' => array('co_tipo_moradia', 'descricao'),
													'order' => array('descricao') ));
		$perfilPsicologico = $this->Imovel->PerfilPsicologico->find('list', array('fields' => array('co_perfil_psicologico', 'Descricao'),
													'order' => array('Descricao') ));
		$fumante = $this->Imovel->find('list', array('fields' => array('fumante'),
													'order' => array('fumante') ));
		$animal = $this->Imovel->find('list', array('fields' => array('animal'),'order' => array('animal') ));
		
		$mobiliado = $this->Imovel->find('list', array('fields' => array('mobiliado'),'order' => array('mobiliado') ));

		$this->set(compact('tipoImovels', 'tipoQuartos', 'bairros', 'tipoMoradia', 'perfilPsicologico', 'fumante', 'animal', 'mobiliado'));
	}


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Imovel->id = $id;
		if (!$this->Imovel->exists()) {
			throw new NotFoundException(__('Invalid imovel'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Imovel->delete()) {
			$this->Session->setFlash(__('O imóvel foi deletado.'));
		} else {
			$this->Session->setFlash(__('The imovel could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'listaranuncios'));
	}
}
