<?php 
    if(!isset($_SESSION['user'])){
        header('location: ./');
    }
    class UserController extends BaseController{
        private $userController;
        private $url = "?controller=user";
        public function __construct()
        {  
            $this->loadModel("SignModel");
            $this->userController = new SignModel;
        }
        public function index(){
            $error_text = "";
            $user = $this->userController->showInfor($_SESSION['user'])[0];
            $close = "disabled";
            $confirm = [
                "output" => "",
                "confirm_btn" => "<input type='submit' name='change_infor' value='Thay đổi'>"
            ];
            
            if(isset($_POST['change_infor']) || isset($_POST['confirm_change'])){
                $close = "";
                $confirm["confirm_btn"] = "<input type='submit' name='confirm_change' value='Tiếp tục'>
                <input type='submit' name='cancel' value='Hủy'>
                ";
                if(isset($_POST['confirm_change'])){
                    if(!empty($_POST['password']) && !empty($_POST['username']) && !empty($_POST['gmail'])
                    && !empty($_POST['tel']) && strlen($_POST['tel']) == 10 && $this->emailValid($_POST['gmail'])){
                        $pass = md5($_POST['password']);
                        if($user['password'] === $pass) { 
                        $this->userController->UpdateUser($user['id'], [
                            "username" => $_POST['username'],
                            "gmail" => $_POST['gmail'], 
                            "tel" => $_POST['tel']
                        ]);
                        header("location: ?controller=user");
                        } else $error_text = "(*) Sai mật khẩu";
                    }else{
                        $error_text = "(*) Vui lòng nhập thông tin hợp lệ";
                    }
                }
                $confirm["output"] = "
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Xác nhận mật khẩu: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='password' name='password' id=''>
                        <p class='error_text'>$error_text</p>
                    </div>
                </div>
                ";
            }
            if(isset($_POST['cancel'])){
                header("location: ?controller=user");
            }
           
            $output = "
            <form action='$this->url' method='post'>
            <div class='main_page__manager__infor'>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Tên tài khoản: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='text' value='${user['username']}' $close name='username' id=''>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Gmail: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='gmail' value=${user['gmail']} $close name='gmail' id=''>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Số điện thoại: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='tel' value='${user['tel']}' $close name='tel' id=''>
                    </div>
                </div>
                ".
                $confirm['output']
            ."</div>
            <div class='main_page__manager__change'>".
                $confirm['confirm_btn'].   
            "</div>
            </form>
            ";
            return $this->outputDataView("Thông tin cá nhân", $output);
        }
        public function myorder(){
            $output = "";
            return $this->outputDataView("Đơn hàng của tôi", $output);
        }
        public function security(){
            $pass = $this->userController->showInfor($_SESSION['user'])[0];
            if(isset($_POST['changepass'])){
            
            }
            $output = "
            <form action='$this->url' method='post'>
            <div class='main_page__manager__infor'>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Mật khẩu hiện tại: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='password' value='' name='username' id=''>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Mật khẩu mới: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='password' value='' name='gmail' id=''>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Nhập lại mật khẩu mới: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='password' value='' name='tel' id=''>
                    </div>
                </div>
            </div>
            <div class='main_page__manager__change'>
                <input type='submit' name='changepass' value='Tiếp tục'>
            </div>
            </form>
            ";
            return $this->outputDataView("Đổi mật khẩu", $output);
        }
        private function emailValid($string) 
        { 
            if (preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $string)) 
            return true; 
        } 
        private function outputDataView($title, $output){
            $dataOut = [
                "title" => $title,
                "output" => $output
            ];
            return $this->loadView("FrontEnd.User.index", [
                "output" => $dataOut
            ]);
        }
    }
?>