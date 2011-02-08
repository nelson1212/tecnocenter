<?php
class ProductsController extends AppController {

	var $name = 'Products';


   function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('add','view','index','delete','edit','admin_index');
	}
	
	
	function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}
	function admin_activar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
 		$this->Product->id=$id;
    	$this->Product->saveField("estado_prod",true);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_desactivar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("estado_prod",false);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_destacar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("destacar",true);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_nodestacar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("destacar",false);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_promocionar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("promocionar",true);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_nopromocionar($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Product->id=$id;
    	$this->Product->saveField("promocionar",false);
		$this->Session->setFlash(__('La información del producto se ha actualizado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('The product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$categories = $this->Product->Category->find('list');
		$manufacturers = $this->Product->Manufacturer->find('list');
		$this->set(compact('categories', 'manufacturers'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
		//Hora inicio 9.10 pm
	function admin_product_report()
	{
		if(empty($this->data))
		{	
			//debug($this->data);
			$categorias = $this->Product->Category->find('list');
			$this->set(compact('categorias'));
		}
		else if($this->data)
		{
			//debug($this->data);
			//Parametros del reporte
			$categoria=$this->data['Reporte']['categoria'];
			$estado=$this->data['Reporte']['estado'];
				
			//Fecha 1	
			$ano = $this->data['Reporte']['fecha_inicial']['year'];
			$mes = $this->data['Reporte']['fecha_inicial']['month'];
			$dia = $this->data['Reporte']['fecha_inicial']['day'];
		    $fecha1= $ano."-".$mes."-".$dia;
			//Fecha 2
			$ano = $this->data['Reporte']['fecha_final']['year'];
			$mes = $this->data['Reporte']['fecha_final']['month'];
			$dia = $this->data['Reporte']['fecha_final']['day'];
		    $fecha2= $ano."-".$mes."-".$dia;
			
		    //Campos a mostrar en el reporte
			foreach($this->data['Product'] as $indice =>$valor)
			{
				if($valor==1)
				{
				    $array[] = $indice;
				}
			}
			//Filtros de la condición
			$reportes=array('Product.category_id'=>$categoria, 
							'Product.estado_prod'=>$estado);	
			
			//Array de condiciones	
			$condiciones=array();
			foreach($reportes as $indice => $valor)
			{
				if($valor!="")
				{
					array_push($condiciones, array($indice=>array($valor)));
				}
			}
			
			//Si las fechas son diferentes de vacia
			if($fecha1!='0-0-0' or $fecha2!='0-0-0')
			{	
				$fechas = array('Product.created between ? and ?'=>array($fecha1, $fecha2));	
				
				$fecha1=strtotime($fecha1);
				$fecha2=strtotime($fecha2);
			
				if($fecha1 > $fecha2)
				{
					$this->Session->setFlash(__('La fecha inicial debe ser menor o igual a la fecha final', true));
					return;
					
				}

				array_push($condiciones,$fechas);
			}
			
			$reporte = $this->Product->find('all', array('fields'=>$array,
											'conditions'=>$condiciones));
			//debug($reporte);													
			$this->set(compact('reporte'));
		}
	}
}
?>