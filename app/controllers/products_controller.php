<?php
class ProductsController extends AppController {

	var $name = 'Products';
	
   function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('add','view','index','delete','edit','admin_index','admin_product_report');
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
		
		if (!empty($this->data)) 
		{
			//Imagenes
			//debug($this->data['Product']['ficha_producto']); exit;
			$fichaProducto = $this->data['Product']['ficha_producto'];
			$imgListado = $this->data['Product']['imagen_listado'];
			$imgPrincipal = $this->data['Product']['imagen_principal'];
			$imgDestacar = $this->data['Product']['imagen_destacar'];
			$imgFichaTecnica = $this->data['Product']['imagen_ficha_tecnica'];
		    
			//Por defecto vacios
			$this->data['Product']['ficha_producto']="";
			$this->data['Product']['imagen_ficha_tecnica']="";
			$this->data['Product']['imagen_listado']="";
			$this->data['Product']['imagen_principal']="";
			$this->data['Product']['imagen_destacar']="";
			
			//Validamos las imagenes opcionales, sino tienen errores entonces las subimos
			if($fichaProducto['error']==0)
			{
				$nombreOriginal=$fichaProducto['name'];
				$nombreRetornado = $this->uploadPicture($fichaProducto, $nombreOriginal);
				$this->data['Product']['ficha_producto']=$nombreRetornado;
			}
			
			if($imgFichaTecnica['error']==0)
			{
				$nombreOriginal=$imgFichaTecnica['name'];
				$nombreRetornado = $this->uploadPicture($imgFichaTecnica, $nombreOriginal);
				$this->data['Product']['imagen_ficha_tecnica']=$nombreRetornado;
			}
			
			//imagen_listado
			if($imgListado['error']==0)
			{
				$nombreOriginal=$imgListado['name'];
				$nombreRetornado = $this->uploadPicture($imgListado, $nombreOriginal);
				$this->data['Product']['imagen_listado']=$nombreRetornado;
			}
			
			//imagen_principal
			if($imgPrincipal['error']==0)
			{
				$nombreOriginal=$imgPrincipal['name'];
				$nombreRetornado = $this->uploadPicture($imgPrincipal, $nombreOriginal);
				$this->data['Product']['imagen_principal']=$nombreRetornado;
			}
			
			//imagen_destacar
			if($imgDestacar['error']==0)
			{
				$nombreOriginal=$imgDestacar['name'];
				$nombreRetornado = $this->uploadPicture($imgDestacar, $nombreOriginal);
				$this->data['Product']['imagen_destacar']=$nombreRetornado;
			}
			
			
		
			//debug($this->data); exit;
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
	

	function admin_product_report()
	{
		if(empty($this->data))
		{	
			$categorias = $this->Product->Category->find('list');
			$this->set(compact('categorias'));
		}
		else if($this->data)
		{
			//Parametros del reporte
			$categoria=$this->data['Reporte']['categoria'];
			$estado=$this->data['Reporte']['estado'];
				
			//Fecha 1	
		    $fecha1=$this->data['Reporte']['fecha_inicial'];
			
			//Fecha 2
		    $fecha2=$this->data['Reporte']['fecha_final'];
			
		    //Campos a mostrar en el reporte
		    $array=array();
			foreach($this->data['Product'] as $indice =>$valor)
			{
				if($valor==1)
				{
				    $array[] = $indice;
				}
			}
			//Filtros de la condición
			$reportes=array();
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
			if($fecha1!=null or $fecha2!=null)
			{	
				$fechas = array('Product.created between ? and ?'=>array($fecha1, $fecha2));	
				
				$fecha1=strtotime($fecha1);
				$fecha2=strtotime($fecha2);
			
				if($fecha1 > $fecha2)
				{
					$this->Session->setFlash(__('La fecha inicial debe ser menor o igual a la fecha final', true));
					$categorias = $this->Product->Category->find('list');
					$this->set(compact('categorias'));
					return;
				}
				
				array_push($condiciones,$fechas);
			}
			
			$reporte = $this->Product->find('all', array('fields'=>$array,
											'conditions'=>$condiciones));								
			
			$this->set(compact('reporte','array'));
		}
	}

	//$foto array del archivo
    //nombre_foto es igual al username ya que sera unico
	function uploadPicture($foto, $nombre_foto)
	{		
		//Caracteristicas de la imagen
		$nombre = $foto['name'];
		$tipo = $foto['type'];
		$tamano = $foto['size'];
		$nombre_foto=md5(sha1($nombre_foto));		
		
		//Comprobamos la extensión de la  imagen
		if(strpos($tipo, "gif")) {
			$nombre_foto=$nombre_foto.".gif";
		} else if(strpos($tipo, "jpeg")) {
		    $nombre_foto=$nombre_foto.".jpg";
		}else if(strpos($tipo, "png")) {
			$nombre_foto=$nombre_foto.".png";
		}
		
		//Directorio donde sera guardada la imagen
		$directorio = WWW_ROOT."img\\fotos\\".$nombre_foto;
		
			//Copiamos la imagen al directorio, especificado
	   		if (copy($foto["tmp_name"], $directorio))
	   		{
	   			//$this->directorioFoto=$directorio;
			   return $nombre_foto;  
	   		}
	   		else
	   		{ 
			   return 2; 
	   		}
	}
}
?>