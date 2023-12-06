<?

namespace App\Controllers;

class User extends Controller 
{
    public function sign_up()
    {
        $model = $this->model("UserModel");
        $layout = $this->view("layouts/log", ["log_page" => "client/account/sign-up", "model" => $model]);
        echo $layout;
    }

    public function sign_in()
    {
        $model = $this->model("UserModel");
        $layout = $this->view("layouts/log", ["log_page" => "client/User/sign-in", "model" => $model]);
        echo $layout;
    }

    public function sign_out()
    {
        $model = $this->model("UserModel");
        $layout = $this->view("layouts/log", ["log_page" => "client/account/sign-out", "model" => $model]);
        echo $layout;
    }
}

?>