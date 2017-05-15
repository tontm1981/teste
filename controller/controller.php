<?php
namespace controller;

use Github\Client;

class Controller
{
	public function __construct($action) {
		if(empty($action)) {
			$action = 'list';
		}
		
		if (method_exists($this, $action.'Action')) {
			$metodo = $action.'Action';
			
			$this->{$metodo}();
		} else {
			$this->error('A ação não existe.');
		}
	}
	
	protected function listAction()
	{
		$model = new Client();
		$results = $model->api('repo')->find('symfony');
		return $this->render('list',['repos'=>$results['repositories']]);
	}
	
	protected function error($message)
	{
		if (strlen($message)<1) {
			$message = 'Erro não informado';
		}
		
		return $this->render('error',['message'=>$message]);
	}
	
	protected function render(string $view, array $params = [])
	{
		if (FALSE === file_exists('views/'.$view.'.php')) {
			if (FALSE === file_exists('views/error.php')) {
				throw new \Exception('View não encontrada');
			} else {
				$this->error('View não encontrada');
			}
		} else {
			if (!empty($params)) {
				foreach ($params AS $var => $val) { $$var = $val; }
				
				include_once 'views/header.php';
				include 'views/'.$view.'.php';
				include_once 'views/footer.php';
			}
		}
	}
}