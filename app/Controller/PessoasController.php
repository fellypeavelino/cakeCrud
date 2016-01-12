<?
class PessoasController extends AppController{
	public $helpers = array("Form", "Html", "Session"); 
	public $uses = array('Pessoa', 'Post');
	
	function lista2(){
        $posts = $this->Post->find("all",array(
                "joins" => array(
                    array(
                        "table" => "pessoas",
                        "alias" => "Pessoa",
                        "type" => "INNER",
                        "conditions" => array("Pessoa.id = Post.pessoa_id")
                    )
                )
            )
        );
		$this->set("posts",$posts);
    }

	function lista(){
        $posts = $this->Pessoa->find("all",array(
                "joins" => array(
                    array(
                        "table" => "posts",
                        "alias" => "Post",
                        "type" => "INNER",
                        "conditions" => array("Pessoa.id = Post.pessoa_id")
                    )
                )
            ));
		$this->set("posts",$posts);
    }
	
	/*public function post(){
		$this->set('title', 'Adicionar Post');
		
		if ($this->request->is("post")) { 
			$this->Post->create(); 

			if ($this->Post->saveAssociated($this->request->data)) { 
				$this->Session->setFlash(__("Registro salvo com sucesso.")); 
				$this->redirect(array("action" => '/post/')); 
			} else { 
				$this->Session->setFlash(__("Erro: não foi possível salvar o registro.")); 
				$this->redirect(array("action" => '/post/')); 
			} 
		}		
	}*/
	
	public function adicionar() { 
		$this->set('title', 'Adicionar Pessoa');
		if ($this->request->is("post")) { 
			$this->Pessoa->create(); 

			if ($this->Pessoa->saveAssociated($this->request->data)) { 
				$this->Session->setFlash(__("Registro salvo com sucesso."));
				$this->Session->write('pessoaID', $this->Pessoa->id);

				$this->redirect(array("action" => '/adicionar/')); 
			} else { 
				$this->Session->setFlash(__("Erro: não foi possível salvar o registro.")); 
				$this->redirect(array("action" => '/adicionar/')); 
			} 
		} 
	}

}