<?php

class AppController extends Controller {
	
	var $uses=array("Category");	
	var $components=array("Acl","Session", "Auth");	
	
	function beforeFilter()
	{
		if($this->params["prefix"]=="admin") $this->layout="admin";
		$this->Auth->loginAction = array('controller'=>'users','action'=>'login');
		$this->Auth->allow('*');
		$this->Auth->redirectLogin = array('controller'=>'users','action'=>'index');

	}
	function beforeRender(){
		$menuCategories=$this->Category->find("all",array("limit"=>8,"order"=>"order"));
		$otherCategories=$this->Category->find("all",array("offset"=>8,"order"=>"order"));
		$this->set(compact("menuCategories","otherCategories"));
	}
}
