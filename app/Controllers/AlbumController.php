<?php namespace App\Controllers;

use App\Models\AlbumsModel;


class AlbumController extends BaseController
{
	public function index(){
		$am = new AlbumsModel();
		$result = $am->find();
		$parser = \Config\Services::parser();
		//var_dump($result);
		echo $parser->setData(['albums'=>$result,'base_url'=>base_url()])->render('Albums');
	}

	public function new(){

		$parser = \Config\Services::parser();
		$data['titulo']='New Genre';
		$data['base_url'] = base_url();
		echo $parser->setData($data)
		->render('new_album');
	}

	public function save(){
		if ($this->request->getMethod() === 'post' && $this->validate(['input_nameAlbum' => 'required|min_length[3]|max_length[255]',])
		)
		{
			$id = $this->request->getPost('id');
			$nameAlbum = $this->request->getPost('input_nameAlbum');
			$nameAuthor = $this->request->getPost('input_nameAuthor');
			$genreID = $this->request->getPost('input_idGnre');

			$am = new AlbumsModel();
			$am->save(['name'=>$nameAlbum,'author'=>$nameAuthor,'genre_id'=>$genreID]);
			$this->response->redirect(base_url().'/disco/public/AlbumController');
			//$this->response->redirect('index');
		}else{
			echo 'Verifique datos';
		}
	}

	public function edit($id){

		$am = new AlbumsModel();
		$gr = $am->find($id);
		$name = $gr->name;
		$nameAuthor = $gr->author;
		$genreID = $gr->genre_id;

		$parser = \Config\Services::parser();
		echo $parser->setData(['titulo'=>'Edit Genre','id'=>$id,'name'=>$name,'author'=>$nameAuthor,'genre_id'=>$genreID,'base_url'=>base_url()])
		->render('edit_album');
	}

	public function update(){
		if ($this->request->getMethod() === 'post' && $this->validate(['input_nameAlbum' => 'required|min_length[3]|max_length[255]','id'=>'required|integer']))
		{
			//Obtenemos valores de los inputs
			$id = $this->request->getPost('id');
			$nameAlbum = $this->request->getPost('input_nameAlbum');
			$nameAuthor = $this->request->getPost('input_nameAuthor');
			$genreID = $this->request->getPost('input_idGnre');

			//Instancia del modelo
			$am = new AlbumsModel();

			$am->update($id,['name'=>$nameAlbum,'author'=>$nameAuthor,'genre_id'=>$genreID]);
			$this->response->redirect(base_url().'/disco/public/AlbumController');

		}else{
			echo 'Verifique datos';
		}
	}

	public function delete($id){
		$am = new AlbumsModel();
		$am->delete($id);
		$this->response->redirect(base_url().'/disco/public/AlbumController');
	}//CLOSE FUNCTION

	public function albumsjs(){
		if($this->request->isAjax()){

			$am = new AlbumsModel();
			$result = $am->find();
			return  json_encode(["data"=>$result]);
		}else {
			$this->response->redirect(base_url().'/disco/public/AlbumController');
		}

	}
}
