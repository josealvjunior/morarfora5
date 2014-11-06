<?php
App::uses('AppController', 'Controller');
/**
 * Candidaturas Controller
 *
 * @property Candidatura $Candidatura
 * @property PaginatorComponent $Paginator
 */
class CandidaturasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
 * index method
 *
 * @return void
 */
	public function index() {
	

		$usuario = $this->Auth->user('co_usuario');
		
		//$conditions1 =  array('Candidatura.co_usuario' => $usuario);
		//$candidaturas = $this->Candidatura->find('all', array( 'conditions' => $conditions1 ));

		$conditions1 =  array(
			"Candidato.co_usuario" => $usuario, 	

			);

		$conditions2 =  array(
			'Imovel.co_usuario' => 3

			);

		$candidaturas = $this->Candidatura->find('all', array( 'conditions' => $conditions1 ));

		$imovel = $this->Candidatura->find('all', array(
		    'conditions' => $conditions2, //array com condições
		    //'recursive' => 1, //int, recursividade
		    'fields' => array('Locador.nome', 'Locador.email')
			)
		);

		//$this->set('candidaturas', $candidaturas);
		$this->set(compact('imovel', 'candidaturas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Candidatura->exists($id)) {
			throw new NotFoundException(__('Invalid candidatura'));
		}
		$options = array('conditions' => array('Candidatura.' . $this->Candidatura->primaryKey => $id));
		$this->set('candidatura', $this->Candidatura->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Candidatura->create();
			$this->request->data['Candidatura']['co_usuario'] = $this->Auth->user('co_usuario');
			if ($this->Candidatura->save($this->request->data)) {
				$this->Session->setFlash(__('The candidatura has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The candidatura could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Candidatura->exists($id)) {
			throw new NotFoundException(__('Invalid candidatura'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Candidatura->save($this->request->data)) {
				$this->Session->setFlash(__('The candidatura has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The candidatura could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Candidatura.' . $this->Candidatura->primaryKey => $id));
			$this->request->data = $this->Candidatura->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Candidatura->id = $id;
		if (!$this->Candidatura->exists()) {
			throw new NotFoundException(__('Invalid candidatura'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Candidatura->delete()) {
			$this->Session->setFlash(__('The candidatura has been deleted.'));
		} else {
			$this->Session->setFlash(__('The candidatura could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
