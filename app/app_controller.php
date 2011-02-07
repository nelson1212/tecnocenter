<?php

class AppController extends Controller {
	
	var $uses=array("Category","Service","Product");	
	var $components=array("Acl","Session", "Auth");	
	
	function beforeFilter()
	{
		if(isset($this->params["prefix"])&&$this->params["prefix"]=="admin") $this->layout="admin";
		$this->Auth->loginAction = array('controller'=>'users','action'=>'login');
		$this->Auth->allow('*');
		$this->Auth->redirectLogin = array('controller'=>'users','action'=>'index');
		$this->categorias();
	}
	
	function categorias()
	{
		 $menuCategories=$otherCategories=$otherServices=$menuServices=array();
		$categories=$this->Category->find("all");
		$count=0;
		foreach($categories as $category){
			if($count<8){
				$menuCategories[]=$category;
			}else{
				$otherCategories[]=$category;
			}
			$count++;
		}
		$count=0;	
		$services=$this->Service->find("all");
		foreach($services as $service){
			if($count<3){
				$menuServices[]=$service;
			}else{
				$otherServices[]=$service;
			}
			$count++;
		}
		$productosPromocionados=$this->Product->productosPromocionados();
		$productosDestacados=$this->Product->productosDestacados();
		//debug($productosPromocionados);
		//debug($productosDestacados);
		$this->set(compact("menuCategories","otherCategories","menuServices","otherServices","productosPromocionados","productosDestacados"));
	}

}
