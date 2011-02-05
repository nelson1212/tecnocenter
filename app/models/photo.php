<?php
class Photo extends AppModel {
	var $name = 'Photo';
	var $displayField = 'path';
	var $validate = array(
		'path' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PhotoAlbum' => array(
			'className' => 'PhotoAlbum',
			'foreignKey' => 'photo_album_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>