<?php
App::uses('AppModel', 'Model');
/**
 * Candidatura Model
 *
 * @property Pessoa $Pessoa
 */
class Candidatura extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'co_candidatura';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'co_candidatura' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'co_usuario' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */


	public $belongsTo = array(

		'Candidato' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'co_usuario',
			'dependent' => false,
			'type' => 'INNER',
			'conditions' => '',
			'fields' => array('nome','email','telefone','descricao'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),

		'Imovel' => array(
			'className' => 'Imovel',
			'foreignKey' => 'co_imovel',
			'dependent' => false,
			'type' => 'INNER',
			'conditions' => '',
			'fields' => array('co_imovel','Valor_Aluguel','co_usuario','imagem','fumante','animal','mobiliado', 'descricao'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),

	);

	public $hasOne = array(

		'TipoImovel' => array(
			'className' => 'TipoImovel',
			'foreignKey' => 'tipo_imovel_id',
			'conditions' => '',
			'fields' => 'descricao',
			'order' => ''
		),
		'Bairro' => array(
			'className' => 'Bairro',
			'foreignKey' => 'co_bairros',
			'conditions' => '',
			'fields' => 'descricao',
			'order' => ''
		),
		'TiposQuarto' => array(
			'className' => 'TiposQuarto',
			'foreignKey' => 'co_tipos_quartos',
			'conditions' => '',
			'fields' => 'descricao',
			'order' => ''
		),
		'TipoMoradia' => array(
			'className' => 'TipoMoradia',
			'foreignKey' => 'co_tipo_moradia',
			'conditions' => '',
			'fields' => 'descricao',
			'order' => ''
		),

		'Locador' => array(
			'className' => 'Pessoa',
			'foreignKey' => 'co_usuario',
			'dependent' => false,
			'type' => 'LEFT',
			'conditions' =>  array('Locador.co_usuario' => 'Imovel.co_usuario'),
			'fields' => array('nome','email','telefone','descricao', 'data_Nascimento'),
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		
	);

}
