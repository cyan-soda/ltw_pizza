<?php

    class Home extends Controller
    {
        public function index()
        {
            $layout = $this->view("layouts/client", ["page"=>"client/Home/index", "header"=>"components/header", "footer"=>"components/footer"]);
        }

        public function sign_in()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/sign_in", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }

        public function sign_up()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/sign_up", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }

        public function sign_out()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/sign_out", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }

        public function info()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/info", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }

        public function address()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/address", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }

        public function history()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/history", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }

        public function changepw()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/changepw", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }
        public function voucher()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/voucher", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }

        public function editInfo()
        {
            $model = $this->model("UserModel");
            $layout = $this->view("layouts/client", ["page" => "client/Home/editInfo", "header"=>"components/header", "footer"=>"components/footer", "model" => $model]);
            echo $layout;
        }
    }

?>