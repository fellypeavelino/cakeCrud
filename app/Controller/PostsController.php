<?
class PostsController extends AppController{
    public $helpers = array("Form", "Html", "Session"); 
	
	public function adicionar() { 
		$this->set('title', 'Adicionar Post');
		
		if ($this->request->is("post")) { 
			$this->Post->create(); 

			if ($this->Post->saveAssociated($this->request->data)) { 
				$this->Session->setFlash(__("Registro salvo com sucesso.")); 
				$this->redirect(array("action" => '/adicionar/')); 
			} else { 
				$this->Session->setFlash(__("Erro: não foi possível salvar o registro.")); 
				$this->redirect(array("action" => '/adicionar/')); 
			} 
		} 
	}

}