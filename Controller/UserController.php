<?php 
    if(!isset($_SESSION['user'])){
        header('location: ./');
    }
    class UserController extends BaseController{
        private $userController;
        private $orderController;
        private $url = "?controller=user";
        public function __construct()
        {  
            $this->loadModel("SignModel");
            $this->loadModel("PayModel");
            $this->userController = new SignModel;
            $this->orderController = new PayModel;
        }
        private function checkDataU($key, $value){
            return ($this->userController->findUserQ($key, $value)) ? true : false;
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
                    if($this->checkDataU("username",$_POST['username']) && $this->checkDataU("gmail", $_POST['gmail'])
                    && strlen($_POST['tel']) == 10 && $this->emailValid($_POST['gmail'])){
                        $pass = md5($_POST['password']);
                        if($user['password'] === $pass) {
                        $this->userController->UpdateUser($user['id'], [
                            "username" => $_POST['username'],
                            "gmail" => $_POST['gmail'], 
                            "tel" => $_POST['tel']
                        ]);
                        header("location: ?controller=user");
                        } else $error_text = "(*) Sai mật khẩu";
                    }
                    else{
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
                        <input type='text' value='${user['username']}' $close name='username' required>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Gmail: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='gmail' value=${user['gmail']} $close name='gmail' required>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Số điện thoại: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='tel' maxlength='10' value='${user['tel']}' $close name='tel' required>
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
            $myCart = $this->orderController->findOrder("id_user", $_SESSION['user']);
            $dataOrder = [];
            if(!empty($myCart)){
                foreach($myCart as $cart){
                    array_push($dataOrder, $cart);
                }
            }
            var_dump($dataOrder);
            if(empty($dataOrder))
            $output = "
            <div class='main_page__manager__order'>
                <div class='main_page__manager__order__fail'>
                    <h1>Bạn chưa có đơn hàng cả</h1>
                </div>
            </div>
            ";  else{
            $output .= "<div class='main_page__manager__order'>";
                    foreach($dataOrder as $order){
                    $process = ($order['orderU'] == 1) ? "Đã nhận hàng" : "Đang giao hàng";
                    // $output .= "
                    //     <div class='main_page__manager__card'>
                    //         <div class='main_page__manager__card__img'>
                    //             <img src='${order['image']}' />
                    //         </div>
                    //         <div class='main_page__manager__card__content'>
                    //             <div class='main_page__manager__card__content__text'>
                    //                 <p>${order['name']}</p>
                    //                 <p>Giá: ${order['price']}đ</p>
                    //                 <p>Số lượng: ${order['quantity']}</p>
                    //             </div>
                    //             <div class='main_page__manager__card__content__process'>
                    //                 $process
                    //             </div>
                    //         </div>
                    //     </div>
                    // ";
                    }
            $output .= "</div>";
            }
            return $this->outputDataView("Lịch sử đơn hàng", $output);
        }
        public function security(){
            $error = "";
            $success = "";
            $pass = $this->userController->showInfor($_SESSION['user'])[0]['password'];
            if(isset($_POST['changepass'])){
                if($pass === md5($_POST['password_old'])){
                    if($_POST['password_new'] === $_POST['re_password_new']){
                        $this->userController->UpdateUser($_SESSION['user'], [
                            "password" => md5($_POST['password_new'])
                        ]); 
                        $success = "Đổi mật khẩu thành công.";
                    }
                    else $error = "(*) Mật khẩu không trùng khớp";
                }
                    else{
                    $error = "(*) Sai mật khẩu hiện tại";
                }
            }
            $output = "
            <form action='$this->url&action=security' method='post'>
            <div class='main_page__manager__infor'>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Mật khẩu hiện tại: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='password' value='' name='password_old' id='' required>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Mật khẩu mới: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='password' value='' name='password_new' id='' required>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Nhập lại mật khẩu mới: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='password' value='' name='re_password_new' id='' required>
                        <p class='error_text'>$error</p>
                        <p class='error_text' style='color: green;'>$success</p>
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