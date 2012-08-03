<?php
	Class BooksController extends AppController{
		var $name = "Books";
		var $helpers = array('Html', 'Form', 'Xml'); 
		var $components = array('RequestHandler');
		
		function index(){
			$this->set('books', $this->Book->find('list', array('fields' => array(
			'Book.title', 'Book.author'),
			'recursive' => 0
			)));	
			$livros = array();
			foreach($this->viewVars['books'] as $k => $v){
				$livros[] = array('title' => $k, 'author' => $v);
			}
			$this->set('books', $livros);
			$this->view = 'Json';
			$this->set('json', 'books');
			
		}
		
		function view($id) {
			$livro = $this->Book->findById($id);
			$this->set('books', $livro["Book"]);
			$this->view = 'Json';
			$this->set('json', 'books');
		}
		
		function author($author){
			$autor = $this->Book->findByAuthor($author);
			$this->set('books', $autor["Book"]);
			$this->view = 'Json';
			$this->set('json', 'books');
		}
		
		function title($title){
			$title = $this->Book->findByTitle($title);
			$this->set('books', $title["Book"]);
			$this->view = 'Json';
			$this->set('json', 'books');
		}
 
	
	}