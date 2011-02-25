<?php
class Product extends AppModel {
	var $name = 'Product';
	var $displayField = 'nombre';
	var $validate = array(
		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'manufacturer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'codigo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'costo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'valor_venta' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'estado_prod' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'rotacion' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'ficha_producto' => array(
        	'rule' => array('extension', array('doc', 'docx', 'pdf', 'xls', 'xlsx')),  
        	'allowEmpty' => true, 
        	'message' => 'Solo se permiten archivos .doc, .docx, .pdf, .xls, .xlsx'
    	), 
    	
	
		'imagen_listado' => array(
        	'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),  
        	'allowEmpty' => false, 'required' => true,
        	'message' => 'Debes ingresar una imagen, solo se permiten imagenes .gif, .jpeg, .png, .jpg'
    	), 
    	
		'imagen_principal' => array(
        	'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),  
        	'allowEmpty' => false, 'required' => true,
        	'message' => 'Debes ingresar una imagen, solo se permiten imagenes .gif, .jpeg, .png, .jpg'
    	), 
    	
		'imagen_destacar' => array(
        	'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),  
        	'allowEmpty' => false, 'required' => true,
        	'message' => 'Debes ingresar una imagen, solo se permiten imagenes .gif, .jpeg, .png, .jpg'
    	), 
    	
		'imagen_ficha_tecnica' => array(
        	'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),  
        	'allowEmpty' => true,
        	'message' => 'Solo se permiten imagenes .gif, .jpeg, .png, .jpg'
    	), 
    	
		 
		'tiempo_reposicion' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Manufacturer' => array(
			'className' => 'Manufacturer',
			'foreignKey' => 'manufacturer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Inventory' => array(
			'className' => 'Inventory',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'PhotoAlbum' => array(
			'className' => 'PhotoAlbum',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	function productosPromocionados($categoriaId=null){
		if($categoriaId){
			return $this->find("all",array("conditions"=>array("Product.promocionar"=>true,"Product.category_id"=>$categoriaId)));
		}else{
			return $this->find("all",array("conditions"=>array("Product.promocionar"=>true)));
		}
	}
	function productosDestacados($categoriaId=null){
		if($categoriaId){
			return $this->find("all",array("conditions"=>array("Product.destacar"=>true,"Product.category_id"=>$categoriaId)));
		}else{
			return $this->find("all",array("conditions"=>array("Product.destacar"=>true)));
		}
	}

}
?>