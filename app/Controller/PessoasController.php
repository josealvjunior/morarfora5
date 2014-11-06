<?php
App::uses('AppController', 'Controller');
/**
 * Pessoas Controller
 *
 * @property Pessoa $Pessoa
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PessoasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */

	    
	public function index() {
		$this->Pessoa->recursive = 0;
		//$pessoas = $this->Paginator->paginate();

		$usuario = $this->Auth->user('co_usuario');
		$conditions =  array('Pessoa.co_usuario' => $usuario);
		//$conditions =  array('Pessoa.'. $this->Pessoa->primaryKey => $usuario);
		//$imoveis =  $this->Imovel->find('all', array( 'conditions' => $conditions ));

		//$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));

		$pessoas = $this->Pessoa->find('all', array('conditions' => $conditions));

		if ($this->request->is('requested')) {   //Se for requisição de outra view/element:
            return $pessoas;
        } else {  //Senão envia para a view padrão
            $this->set('pessoas', $pessoas);;
        }

        //compact('faixasDePrecos', 'regionais', 'bairros', 'tipoMoradia', 'tipoQuartos')
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('Invalid pessoa'));
		}
		$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
		$this->set('pessoa', $this->Pessoa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pessoa->create();
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('The pessoa has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pessoa could not be saved. Please, try again.'));
			}
		}
		$perfilPsicologicos = $this->Pessoa->PerfilPsicologico->find('list');
		$this->set(compact('perfilPsicologicos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pessoa->exists($id)) {
			throw new NotFoundException(__('Invalid pessoa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Pessoa->save($this->request->data)) {
				$this->Session->setFlash(__('The pessoa has been saved.'));
				return $this->redirect(array('action' => 'edit', 2));
			} else {
				$this->Session->setFlash(__('The pessoa could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Pessoa.' . $this->Pessoa->primaryKey => $id));
			$this->request->data = $this->Pessoa->find('first', $options);
		}
		$perfilPsicologicos = $this->Pessoa->PerfilPsicologico->find('list');
		$this->set(compact('perfilPsicologicos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Pessoa->id = $id;
		if (!$this->Pessoa->exists()) {
			throw new NotFoundException(__('Invalid pessoa'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Pessoa->delete()) {
			$this->Session->setFlash(__('The pessoa has been deleted.'));
		} else {
			$this->Session->setFlash(__('The pessoa could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
