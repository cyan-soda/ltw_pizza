<?
class User extends Controller 
{
    function sign_up()
    {
        $model = $this->model("UserModel");
        $layout = $this->view("layouts/log", ["log_page" => "client/account/sign-up", "model" => $model]);
    }

    function sign_in()
    {
        $model = $this->model("UserModel");
        $layout = $this->view("layouts/log", ["log_page" => "client/account/sign-in", "model" => $model]);
    }

    function sign_out()
    {
        $model = $this->model("UserModel");
        $layout = $this->view("layouts/log", ["log_page" => "client/account/sign-out", "model" => $model]);
    }
}

?>