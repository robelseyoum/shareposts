<?php 


    class Pages extends Controller {

        public function __construct(){

            //$this->postModel = $this->model('Post');

        }

        public function index(){

            if(isLoggedIn()){
                redirect('posts');
            }

            //$posts = $this->postModel->getPosts();

            $data = [
                'title' => 'SharePosts',
                //'posts' => $posts
                'description' => 'Simple social network built on the RobelMVC PHP framework'
            ];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'About Us',
                'description' => 'App to share posts with other users'
            ];

            $this->view('pages/about', $data);
        }
    }


 ?>