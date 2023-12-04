<?
class User extends Controller 
{
    function sign_up()
    {
        $model = $this->model(UserModel);
        $layout = $this->view("layouts/log", ["page" => "client/account/sign-up", "userModel" => $model]);
    }

    function sign_in()
    {
        $model = $this->model(UserModel);
        $layout = $this->view("layouts/log", ["page" => "client/account/sign-in", "userModel" => $model]);
    }

    function sign_out()
    {
        $model = $this->model(UserModel);
        $layout = $this->view("layouts/log", ["page" => "client/account/sign-out", "userModel" => $model]);
    }
}

?>