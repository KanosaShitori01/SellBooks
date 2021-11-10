<?php 
    (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    if(!isset($_SESSION['user'])){
        header('location: ./');
    }
    class UserController extends BaseController{
        private $userController; // user 
        private $orderController; // admin/user
        private $productController; // admin/user
        private $authorController; // admin 
        private $categoryController; // admin
        private $anotherController; // admin
        private $newsController;
        private $cartController;
        // dữ liệu chung
        private $user;
        private $url = "?controller=user";
        public function __construct()
        {  
            $this->loadModel("SignModel");
            $this->loadModel("PayModel");
            $this->loadModel("ProductModel");
            $this->loadModel("CategoryModel");
            $this->loadModel("AuthorModel");
            $this->loadModel("AnotherModel");
            $this->loadModel("NewsModel");
            $this->loadModel("CartModel");
            $this->userController = new SignModel; // user/admin
            $this->orderController = new PayModel; // user/admin
            $this->productController = new ProductModel; // user/admin
            $this->authorController = new AuthorModel; // admin
            $this->categoryController = new CategoryModel; // admin
            $this->anotherController = new AnotherModel; // admin
            $this->newsController = new NewsModel; // admin
            $this->cartController = new CartModel; // admin
            $this->user = $this->userController->showInfor($_SESSION['user'])[0];
        }
        private function checkDataU($key, $value){
            $userPresent = $this->userController->findUserQ("id", $_SESSION['user'])[0];
            if($userPresent['username'] == $value || $userPresent['gmail'] == $value 
            || $userPresent['tel'] == $value) 
            return true;
            if(empty($this->userController->findUserQ($key, $value))) 
                return true;
            else return false;
        }
        public function index(){
            $error_text = "";
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
                    if($this->checkDataU("username",$_POST['username']) && $this->checkDataU("gmail", $_POST['gmail']) &&
                    $this->checkDataU("tel", $_POST['tel']) && strlen($_POST['tel']) == 10 && $this->emailValid($_POST['gmail'])){
                        $pass = md5($_POST['password']);
                        if($this->user['password'] === $pass) {
                        $this->userController->UpdateUser($this->user['id'], [
                            "username" => $_POST['username'],
                            "gmail" => $_POST['gmail'], 
                            "tel" => $_POST['tel']
                        ]);
                        (isset($_POST['address'])) ? $this->userController->Update("address", 1, "", "", [
                            "address" => $_POST['address']
                        ]) : "";
                        header("location: ?controller=user");
                        }
                        else $error_text = "(*) Sai mật khẩu";
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
            $userData = [
                "username" => $this->user['username'],
                "gmail" => $this->user['gmail'],
                "tel" => $this->user['tel']
            ];
            $output = "
            <form action='$this->url' method='post'>
            <div class='main_page__manager__infor'>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Tên tài khoản: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='text' value='${userData['username']}' $close name='username' required>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Gmail: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='gmail' value=${userData['gmail']} $close name='gmail' required>
                    </div>
                </div>
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Số điện thoại: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='tel' maxlength='10' value='${userData['tel']}' $close name='tel' required>
                    </div>
                </div>";
            if($this->user['admin'] == 1){
                $address = $this->userController->getAll("address")[0];
                $output .= "
                <div class='main_page__manager__infor__tab'>
                    <div class='tab__label'>
                        <label for=''>Địa chỉ: </label>
                    </div>
                    <div class='tab__input'>
                        <input type='address' value='${address['address']}' $close name='address' required>
                    </div>
                </div>
                ";
            }
            $output .= "
                ${confirm['output']}
            </div>
            <div class='main_page__manager__change'>".
                $confirm['confirm_btn'].   
            "</div>
            </form>
            ";
            return $this->outputDataView("Thông tin cá nhân", $output, $this->list($this->user));
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
            // var_dump($dataOrder);
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
                        $productsOf = ($this->productController->findProductBID($order['id_product'])[0]) ?? "";
                        $process = ($order == 1) ? "Đã nhận hàng" : "Đang giao hàng";
                        if(!empty($productsOf))
                        $output .= "
                            <div class='main_page__manager__card'>
                                <div class='main_page__manager__card__img'>
                                    <img src='${productsOf['image']}' />
                                </div>
                                <div class='main_page__manager__card__content'>
                                    <div class='main_page__manager__card__content__text'>
                                        <p>${productsOf['name']}</p>
                                        <p>Giá: <span class='price'>${order['totalmoney']}</span></p>
                                        <p>Số lượng: ${order['quantity']}</p>
                                    </div>
                                    <div class='main_page__manager__card__content__process'>
                                        $process
                                    </div>
                                </div>
                            </div>
                        ";
                    }
            $output .= "</div>";
            }
            return $this->outputDataView("Lịch sử đơn hàng", $output, $this->list($this->user));
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
            return $this->outputDataView("Đổi mật khẩu", $output, $this->list($this->user));
        }
        public function admincontrol(){
            $title = "";
            $output = "";
            if(isset($_GET['qlnd'])){ 
                $title = "Quản Lý Nội Dung";
                $output = $this->QLND($output);
            }else if(isset($_GET['qldm'])){
                $title = "Quản Lý Danh Mục";
                $output = $this->QLDM($output);
            }else if(isset($_GET['qlsp'])){
                $title = "Quản Lý Sản Phẩm";
                $output = $this->QLSP($output);
            }else if(isset($_GET['qldh'])){
                $title = "Quản Lý Đơn Hàng";
                $output = $this->QLDH($output);
            }else if(isset($_GET['qltt'])){
                $title = "Quản Lý Tin Tức";
                $output = $this->QLTT($output);
            }
            return ($this->user['admin'] == 1) ? 
            $this->outputDataView($title, $output, $this->list($this->user)) : 
            header("location: ?controller=user");
        }

        // Chức năng hỗ trợ
        private function outputDataView($title, $output, $list = ""){
            $dataOut = [
                "title" => $title,
                "list" => $list,
                "output" => $output
            ];
            return $this->loadView("FrontEnd.User.index", [
                "output" => $dataOut
            ]);
        }
        private function list($dataU){
           return ($dataU['admin'] == 1) ? 
           "<li><a href='?controller=user'>Thông tin cá nhân</a></li>
            <li><a href='?controller=user&action=admincontrol&qlnd'>Quản lý nội dung</a></li>
            <li><a href='?controller=user&action=admincontrol&qldm'>Quản lý danh mục</a></li>
            <li><a href='?controller=user&action=admincontrol&qlsp'>Quản lý sản phẩm</a></li>
            <li><a href='?controller=user&action=admincontrol&qldh'>Quản lý đơn hàng</a></li>
            <li><a href='?controller=user&action=admincontrol&qltt'>Quản lý tin tức</a></li>
            <li><a href='?controller=user&action=security'>Đổi mật khẩu</a></li>
           " : 
           "<li><a href='?controller=user'>Thông tin cá nhân</a></li>
            <li><a href='?controller=user&action=myorder'>Lịch sử đơn hàng</a></li>
            <li><a href='?controller=user&action=security'>Đổi mật khẩu</a></li>";
        }
        private function QLND($output){
            $alert = "";
            $dataANO = $this->anotherController->findAN(2);
            if(isset($_POST['manag_cont'])){
                ($this->anotherController->updateANO($dataANO[0]['id'], [
                    "introduce" => nl2br($_POST['introduce']),
                    "QaA" => nl2br($_POST['QaA']),
                    "contact" => nl2br($_POST['contact'])
                ])) ? $alert = "<div class='alert_manager'>
                    <h2>Cập Nhật Thành Công</h2>
                </div>" : "";
            }
            $output .= "<form action='?controller=user&action=admincontrol&qlnd' method='post'>
            <div class='main_page__manager__control'>$alert";
                foreach($dataANO as $data){
                    $output .= "    
                    <div class='main_page__manager__control__box'>
                        <div class='main_page__manager__control__box__title'>
                            <h2>- Giới Thiệu</h2>
                        </div>
                        <div class='main_page__manager__control__box__content'>
                            <textarea name='introduce' placeholder='Nhập nội dung giới thiệu' required>".str_replace("<br />", " ",$data['introduce'])."</textarea>
                        </div>  
                    </div>
                    <div class='main_page__manager__control__box'>
                        <div class='main_page__manager__control__box__title'>
                            <h2>- Hỏi Đáp</h2>
                        </div>
                        <div class='main_page__manager__control__box__content'>
                            <textarea name='QaA' placeholder='Nhập nội dung hỏi đáp' required>".str_replace("<br />", " ",$data['QaA'])."</textarea>
                        </div>
                    </div>
                    <div class='main_page__manager__control__box'>
                        <div class='main_page__manager__control__box__title'>
                            <h2>- Liên Hệ</h2>
                        </div>
                        <div class='main_page__manager__control__box__content'>
                            <textarea name='contact' placeholder='Nhập nội dung liên hệ' required>".str_replace("<br />", " ",$data['contact'])."</textarea>
                        </div>
                    </div>
                    <div class='main_page__manager__control__btn'>
                        <input type='submit' value='Tiếp Tục' name='manag_cont' />
                    </div>
                    ";
                }
            $output .="</div>
            </form>
            ";
            return $output;
        }
        private function QLDM($output){
            $alert = "";
            $createBox = "";
            $categoryB = $this->categoryController->getAllCategory();
            $authorB = $this->authorController->getAllAu();
            if(isset($_POST['add_cate'])){
                $createBox = "<div class='main_page__manager__control__ebox small'>
                    <h2>Thêm loại sách</h2>
                    <input type='text' placeholder='Nhập tên loại sách...' required name='cate' />
                    <input type='submit' name='add_cate_ok' value='Tiếp tục'/>
                    <a href='?controller=user&action=admincontrol&qldm'>Hủy</a>
                </div>";
            }
            if(isset($_POST['add_cate_ok'])){
               if($this->checkData($categoryB, $_POST['cate'])){
                    $this->categoryController->addCategory([
                            "name" => $_POST['cate']
                    ]);
                    header("location: ?controller=user&action=admincontrol&qldm");
                }
               else{
                $alert = "<div class='alert_manager'>
                            <h2>".$_POST['cate']." đã tồn tại</h2>
                        </div>"; 
                }
            }
            if(isset($_POST['edit_cate'])){
                $createBox = "<div class='main_page__manager__control__ebox small'>
                    <h2>Sửa loại sách</h2>
                    <select name='cate_list' id=''>";
                        foreach($categoryB as $cate){
                            $createBox .= "<option value='${cate['id']}'>${cate['name']}</option>";
                        } 
                $createBox .= "</select>
                    <input type='text' name='edit_cate_val'/>
                    <input type='submit' name='edit_cate_ok' value='Sửa'/>
                    <a href='?controller=user&action=admincontrol&qldm'>Hủy</a>
                </div>";
            }
            if(isset($_POST['edit_cate_ok'])){
                if($this->checkData($categoryB, $_POST['edit_cate_val'])){
                     $this->categoryController->editCategory($_POST['cate_list'],[
                        "name" => $_POST['edit_cate_val']
                     ]);
                     header("location: ?controller=user&action=admincontrol&qldm");
                 }
                else{
                 $alert = "<div class='alert_manager'>
                             <h2>".$_POST['edit_cate_val']." đã tồn tại</h2>
                         </div>"; 
                 }
            }
            if(isset($_POST['del_cate'])){
                $createBox = "<div class='main_page__manager__control__ebox small'>
                    <h2>Xóa tác giả</h2>
                    <select name='cate_list' id=''>";
                        foreach($categoryB as $cate){
                            $createBox .= "<option value='${cate['id']}'>${cate['name']}</option>";
                        } 
                $createBox .= "</select>
                    <input type='submit' name='del_cate_ok' value='Xóa'/>
                    <a href='?controller=user&action=admincontrol&qldm'>Hủy</a>
                </div>";
            }
            if(isset($_POST['del_cate_ok'])){
                $this->categoryController->deleteCategory($_POST['cate_list']);
                header("location: ?controller=user&action=admincontrol&qldm");
            }
            // Tác giả
            if(isset($_POST['add_au'])){
                $createBox = "<div class='main_page__manager__control__ebox small'>
                    <h2>Thêm tác giả</h2>
                    <input type='text' placeholder='Nhập tên loại sách...' required name='au' />
                    <input type='submit' name='add_au_ok' value='Tiếp tục'/>
                    <a href='?controller=user&action=admincontrol&qldm'>Hủy</a>
                </div>";
            }
            if(isset($_POST['add_au_ok'])){
               if($this->checkData($authorB, $_POST['au'])){
                    $this->authorController->addAu([
                            "name" => $_POST['au']
                    ]);
                    header("location: ?controller=user&action=admincontrol&qldm");
                }
               else{
                $alert = "<div class='alert_manager'>
                            <h2>".$_POST['au']." đã tồn tại</h2>
                        </div>"; 
                }
            }
            if(isset($_POST['edit_au'])){
                $createBox = "<div class='main_page__manager__control__ebox small'>
                    <h2>Sửa tên tác giả</h2>
                    <select name='au_list' id=''>";
                        foreach($authorB as $au){
                            $createBox .= "<option value='${au['id']}'>${au['name']}</option>";
                        } 
                $createBox .= "</select>
                    <input type='text' name='edit_au_val'/>
                    <input type='submit' name='edit_au_ok' value='Sửa'/>
                    <a href='?controller=user&action=admincontrol&qldm'>Hủy</a>
                </div>";
            }
            if(isset($_POST['edit_au_ok'])){
                if($this->checkData($authorB, $_POST['edit_au_val'])){
                     $this->authorController->editAu($_POST['au_list'],[
                        "name" => $_POST['edit_au_val']
                     ]);
                     header("location: ?controller=user&action=admincontrol&qldm");
                }
                else{
                 $alert = "<div class='alert_manager'>
                             <h2>".$_POST['edit_au_val']." đã tồn tại</h2>
                         </div>"; 
                 }
            }
            if(isset($_POST['del_au'])){
                $createBox = "<div class='main_page__manager__control__ebox small'>
                    <h2>Xóa tác giả</h2>
                    <select name='au_list' id=''>";
                        foreach($authorB as $au){
                            $createBox .= "<option value='${au['id']}'>${au['name']}</option>";
                        } 
                $createBox .= "</select>
                    <input type='submit' name='del_au_ok' value='Xóa'/>
                    <a href='?controller=user&action=admincontrol&qldm'>Hủy</a>
                </div>";
            }
            if(isset($_POST['del_au_ok'])){
                $this->authorController->deleteAu($_POST['au_list']);
                header("location: ?controller=user&action=admincontrol&qldm");
            }
            $output .= "<form action='?controller=user&action=admincontrol&qldm' method='post'>
                    $alert
                    <div class='main_page__manager__control'>
                        $createBox
                        <div class='main_page__manager__control__list'>
                            <div class='main_page__manager__control__list__title'>
                                <h2>Danh Mục Của Tôi</h2>
                            </div>
                            <div class='main_page__manager__control__list__boxs'>";
                $output .= "<div class='main_page__manager__control__list__box'>
                                <div class='main_page__manager__control__boxs__function'>
                                    <input type='submit' name='add_cate' value='Thêm' />
                                    <input type='submit' name='edit_cate' value='Sửa'  />
                                    <input type='submit' name='del_cate' value='Xóa Một Mục'  />
                                </div>
                                <div class='main_page__manager__control__boxs__title'>
                                    <h3>Sách</h3>
                                </div>
                                <div class='main_page__manager__control__boxs__content'>
                                    <ul>";                  
                                    foreach($categoryB as $cate){
                                    $output .= "<li>".$cate['name']."</li>";
                                    }
                        $output .= "</ul>
                                </div>
                            </div>";
                $output .= "<div class='main_page__manager__control__list__box'>
                                <div class='main_page__manager__control__boxs__function'>
                                    <input type='submit' name='add_au' value='Thêm' />
                                    <input type='submit' name='edit_au' value='Sửa'  />
                                    <input type='submit' name='del_au' value='Xóa Một Mục'  />
                                </div>
                                <div class='main_page__manager__control__boxs__title'>
                                    <h3>Tác giả</h3>
                                </div>
                                <div class='main_page__manager__control__boxs__content'>
                                    <ul>";                  
                                    foreach($authorB as $au){
                                    $output .= "<li>".$au['name']."</li>";
                                    }
                        $output .= "</ul>
                                </div>
                            </div>";                    
                $output .= "</div>
                        </div>
                    </div>
                </form>";
                return $output;
            }
            private function QLSP($output){
                $createBox = "";
                $alert = "";
                $products = $this->productController->getAllProduct();
                $cate = $this->categoryController->getAllCategory();
                $au = $this->authorController->getAllAu();
                // Thêm Sản Phẩm
                if(isset($_POST['add_product'])){
                    $createBox = "<div class='main_page__manager__control__ebox'>
                        <h2 class='title_ebox'>Thêm Sản Phẩm</h2>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Tên Sản Phẩm: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='text' required name='name_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Hình Ảnh: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='file' required name='img_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Nội dung: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <textarea required name='des_prod'></textarea>
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Giá: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='text' required oninput='OnlyNum(this,999)' name='price_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Số lượng: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='number' oninput='OnlyNum(this,999)' required name='quan_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Tác giả: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <select name='cate_prod'>";
                                foreach($cate as $cateD){
                                    $createBox .= "<option value='${cateD['id']}'>${cateD['name']}</option>";
                                }
                $createBox .=  "</select>
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Thể loại: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <select name='author_prod'>";
                                foreach($au as $auD){
                                    $createBox .= "<option value='${auD['id']}'>${auD['name']}</option>";
                                }
                $createBox  .= "</select>
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__submit'>
                                <input type='submit' name='add_prod_sub' value='Xác Nhận' />
                                <a href='?controller=user&action=admincontrol&qlsp'>Hủy Bỏ</a>
                            </div>
                        </div>
                        </div>
                    ";
                }
                if(isset($_POST['add_prod_sub'])){
                    $today = date("Y-m-d");
                    $img_prod = $this->UploadImg($_FILES['img_prod'], "add_prod_sub");
                    if($this->checkData($products, $_POST['name_prod']) !== false && $img_prod !== false){
                        $this->productController->addProduct([
                            "name" => $_POST['name_prod'],
                            "image" => $img_prod,
                            "price" => $_POST['price_prod'],
                            "description" => nl2br($_POST['des_prod']),
                            "id_author" => $_POST['author_prod'],
                            "id_category" => $_POST['cate_prod'],
                            "quantity" => $_POST['quan_prod'],
                            "created_day" => $today
                        ]);
                        header("location: ?controller=user&action=admincontrol&qlsp");
                    }
                   else{
                    $alert = "<div class='alert_manager err'>
                                <h2>".$_POST['name_prod']." đã tồn tại hoặc tệp hình ảnh bị sai</h2>
                            </div>"; 
                    }
                }
                // ==========================
                if(isset($_GET['edit_product'])){
                    $Iprod = ($this->productController->findProductBID($_GET['edit_product'])[0]) ?? "";
                    if(!empty($Iprod)){
                    $Ides = str_replace("<br />", "", $Iprod['description']);
                    $createBox = "<div class='main_page__manager__control__ebox'>
                        <h2 class='title_ebox'>Sửa Sản Phẩm</h2>
                        <input type='text' hidden value='${Iprod['id']}' name='id_prod' />
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Tên Sản Phẩm: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='text' hidden value='${Iprod['name']}' name='name_prod_o' />
                                <input type='text' required value='${Iprod['name']}' name='name_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Hình Ảnh: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='text' hidden name='img_prod_old' value='${Iprod['image']}' />
                                <input type='file' name='img_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Nội dung: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <textarea required name='des_prod'>${Ides}</textarea>
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Giá: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='text' required value='${Iprod['price']}' oninput='OnlyNum(this,999)' name='price_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Số lượng: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <input type='number' value='${Iprod['quantity']}' required name='quan_prod' />
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Tác giả: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <select name='author_prod'>";
                                foreach($au as $auD){
                                    if($Iprod['id_author'] == $auD['id'])
                                    $createBox .= "<option selected value='${auD['id']}'>${auD['name']}</option>";
                                    else $createBox .= "<option value='${auD['id']}'>${auD['name']}</option>";
                                }
                $createBox .=  "</select>
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__tab'>
                                <label>Thể loại: </label>
                            </div>
                            <div class='main_page__manager__control__ebox__tab'>
                                <select name='cate_prod'>";
                                foreach($cate as $cateD){
                                    if($Iprod['id_category'] == $cateD['id'])
                                    $createBox .= "<option selected value='${cateD['id']}'>${cateD['name']}</option>";
                                    else $createBox .= "<option value='${cateD['id']}'>${cateD['name']}</option>";
                                }
                $createBox  .= "</select>
                            </div>
                        </div>
                        <div class='main_page__manager__control__ebox__input'>
                            <div class='main_page__manager__control__ebox__submit'>
                                <input type='submit' name='edit_prod_sub' value='Xác Nhận' />
                                <a href='?controller=user&action=admincontrol&qlsp'>Hủy Bỏ</a>
                            </div>
                        </div>
                    </div>";
                    }
                }
                if(isset($_POST['edit_prod_sub'])){
                    $img_prod = ($this->UploadImg($_FILES['img_prod'], "edit_prod_sub")) ?? false;
                    if($this->checkData($cate, $_POST['name_prod'], $_POST['name_prod_o'])){
                        if(!empty($_FILES['img_prod']) && $img_prod !== false){
                            unlink($_POST['img_prod_old']);
                            $this->productController->editProduct($_POST['id_prod'],[
                                "name" => $_POST['name_prod'],
                                "price" => $_POST['price_prod'],
                                "image" => $img_prod,
                                "description" => nl2br($_POST['des_prod']),
                                "id_category" => $_POST['cate_prod'],
                                "id_author" => $_POST['author_prod'],
                                "quantity" => $_POST['quan_prod']
                            ]);
                            header("location: ?controller=user&action=admincontrol&qlsp");
                        }else{
                            $this->productController->editProduct($_POST['id_prod'],[
                                "name" => $_POST['name_prod'],
                                "price" => $_POST['price_prod'],
                                "description" => nl2br($_POST['des_prod']),
                                "id_category" => $_POST['cate_prod'],
                                "id_author" => $_POST['author_prod'],
                                "quantity" => $_POST['quan_prod']
                            ]);
                            header("location: ?controller=user&action=admincontrol&qlsp");
                        }
                    }else{
                        $alert = "<div class='alert_manager err'>
                        <h2>".$_POST['name_prod']." đã tồn tại hoặc tệp hình ảnh bị sai</h2>
                        </div>"; 
                    }
                }
                if(isset($_GET['del_product'])){
                    $img = ($this->productController->findProductBID($_GET['del_product'])[0]['image']) ?? "";
                    $this->productController->deleteProduct($_GET['del_product'], $img);
                    $this->cartController->deleteCart("", true, "id_products", $_GET['del_product']);
                    header("location: ?controller=user&action=admincontrol&qlsp");
                }

                // Xuất Dữ Liệu
                $output .= "
                <form action='?controller=user&action=admincontrol&qlsp' method='post' enctype='multipart/form-data'>
                <div class='main_page__manager__control'>
                    $alert
                    <div class='main_page__manager__control__functions'>
                        <input type='submit' name='add_product' value='Thêm Sản Phẩm'/>
                    </div>
                    $createBox
                    <div class='main_page__manager__control__list'>
                        <div class='main_page__manager__control__list__title'>
                            <h2>Sản Phẩm Của Tôi</h2>
                        </div>
                        <div class='main_page__manager__control__list__products'>";
                            foreach($products as $prod){
                                $cate = ($this->categoryController->findCategory($prod['id_category'])[0]['name']) ?? "";
                                $au = ($this->authorController->findAu($prod['id_author'])[0]['name']) ?? "";
                                // var_dump($prod['id_author']);
                                $output .= "
                                <div class='main_page__manager__control__list__product'>
                                    <div class='control__list__product__left'>
                                        <div class='main_page__manager__control__list__product_img'>
                                            <img src='${prod['image']}'/>
                                        </div>
                                        <div class='main_page__manager__control__list__product_infor'>
                                            <h3>Sách: ${prod['name']}</h3>
                                            <p>Giá: <span class='price'>${prod['price']}</span></p>
                                            <p>Thể loại: ${cate}</p>
                                            <p>Tác giả: ${au}</p>
                                            <p>Ngày tạo: ${prod['created_day']}</p>
                                            <p class='descrip'>Nội dung: ${prod['description']} </p>
                                        </div>
                                    </div>      
                                    <div class='control__list__product__right'>
                                        <a href='?controller=user&action=admincontrol&qlsp&edit_product=${prod['id']}'>
                                        Sửa sản phẩm</a>
                                        <a href='?controller=user&action=admincontrol&qlsp&del_product=${prod['id']}'>
                                        Xóa sản phẩm</a>
                                    </div>
                                </div>";
                            }
                           
                $output .= "</div>                  
                        </div>
                    </div>
                </form>";
            return $output;
        }
        private function QLDH($output){
            if(isset($_GET['del_ord'])){
                $id = $_GET['del_ord'];
                $this->orderController->CancelOrder($id);
                header("location: ?controller=user&action=admincontrol&qldh");
            }
            $allOrder = $this->orderController->showOrder();
            $countOrd = count($allOrder);
            $output .= "<div class='main_page__manager__control'>
                <div class='main_page__manager__control__count'>
                    <h2>Tổng số đơn hàng: $countOrd</h2>
                </div>
                <div class='main_page__manager__control__orders'>
                <div class='main_page__manager__control__order'>
                    <div class='main_page__manager__control__infor'>
                        <div class='main_page__manager__control__infor__img'>
                            <img src='' />
                        </div>
                        <div class='main_page__manager__control__infor__text'>
                            <p>Tên Người Đặt: </p>
                            <p>Tên Sách: </p>
                            <p>Số Lượng: </p>
                            <p>Tổng Tiền: <span class='price'></span></p>
                            <p>Địa chỉ: </p>
                            <p>Số điện thoại: </p>
                            <p>Gmail:</p>
                        </div>
                    </div>
                    <div class='main_page__manager__control__done'>
                        <a href=''>Xóa Đơn Hàng</a>
                    </div>
                </div>
                ";
                
                    if(!empty($allOrder)){
                        foreach($allOrder as $order){
                        if($order['received'] == 0){
                            $productOrd = $this->productController->findProductBID($order['id_product'])[0];
                        if(!empty($productOrd))
                $output .= "<div class='main_page__manager__control__order'>
                                <div class='main_page__manager__control__infor'>
                                    <div class='main_page__manager__control__infor__img'>
                                        <img src='${productOrd['image']}' />
                                    </div>
                                    <div class='main_page__manager__control__infor__text'>
                                        <p>Tên Người Đặt: ${order['name_user']}</p>
                                        <p>Tên Sách: ${productOrd['name']}</p>
                                        <p>Số Lượng: ${order['quantity']}</p>
                                        <p>Tổng Tiền: <span class='price'>${order['totalmoney']}</span></p>
                                        <p>Địa chỉ: ${order['address']}</p>
                                        <p>Số điện thoại: ${order['tel']}</p>
                                        <p>Gmail: ${order['gmail']}</p>
                                    </div>
                                </div>
                                <div class='main_page__manager__control__done'>
                                    <a href='?controller=user&action=admincontrol&qldh&del_ord=${order['id']}'>Xóa Đơn Hàng</a>
                                </div>
                            </div>
                            ";
                        else {$this->orderController->CancelOrder($order['id']);
                        header("location: ?controller=user&action=admincontrol&qldh");}
                            }
                        }
                    }
            $output .= "</div>
            </div>";
            return $output;
        }
        private function QLTT($output){
            $alert = "";
            $createBox = "";
            $news = $this->newsController->getAllNews();
            if(isset($_POST['add_news'])){
                $createBox = "<div class='main_page__manager__control__ebox'>
                    <h2 class='title_ebox'>Thêm Tin Tức</h2>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__tab'>
                            <label>Tên Tiêu Đề: </label>
                        </div>
                        <div class='main_page__manager__control__ebox__tab'>
                            <input type='text' required name='name_news' />
                        </div>
                    </div>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__tab'>
                            <label>Hình Ảnh: </label>
                        </div>
                        <div class='main_page__manager__control__ebox__tab'>
                            <input type='file' required name='img_news' />
                        </div>
                    </div>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__tab'>
                            <label>Nội dung: </label>
                        </div>
                        <div class='main_page__manager__control__ebox__tab'>
                            <textarea required name='des_news'></textarea>
                        </div>
                    </div>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__submit'>
                            <input type='submit' name='add_news_sub' value='Xác Nhận' />
                            <a href='?controller=user&action=admincontrol&qltt'>Hủy Bỏ</a>
                        </div>
                    </div>
                </div>";
            }
            if(isset($_POST['add_news_sub'])){
                $img_prod = $this->UploadImg($_FILES['img_news'], "add_news_sub");
                if($this->checkData($news, $_POST['name_news']) !== false && $img_prod !== false){
                    $this->newsController->addNews([
                        "name" => $_POST['name_news'],
                        "image" => $img_prod,
                        "description" => nl2br($_POST['des_news'])
                    ]);
                    header("location: ?controller=user&action=admincontrol&qltt");
                }
               else{
                $alert = "<div class='alert_manager err'>
                            <h2>".$_POST['name_news']." đã tồn tại hoặc tệp hình ảnh bị sai</h2>
                        </div>"; 
                }
            }
            // Thêm tin tức trang chủ
            if(isset($_POST['add_news_ind'])){
                $createBox = "<div class='main_page__manager__control__ebox'>
                    <h2 class='title_ebox'>Thêm Tin Tức Trang Chủ</h2>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__tab'>
                            <label>Số lượng ảnh: </label>
                        </div>
                        <div class='main_page__manager__control__ebox__tab'>
                            <input type='number' oninput='OnlyNum(this,10)' onkeyup='quanIM()' id='quant' required name='quantity_news_ind' />
                        </div>
                    </div>
                    <div class='main_page__manager__control__ebox__input res'>
                        
                    </div>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__submit'>
                            <input type='submit' name='add_news_ind_sub' value='Xác Nhận' />
                            <a href='?controller=user&action=admincontrol&qltt'>Hủy Bỏ</a>
                        </div>
                    </div>
                </div>";
            }
            if(isset($_POST['add_news_ind_sub'])){
                $length = $_POST['quantity_news_ind'];
                for($i = 0; $i < $length; $i++){
                    $num = $i + 1;
                    $img = $_FILES['img_news_ind_'.$num];
                    $img_prod = $this->UploadImg($img, "add_news_ind_sub");
                    if($img_prod !== false){
                        $this->newsController->addNews([
                            "name" => "Tin tức trang chủ",
                            "image" => $img_prod,
                            "indexp" => 1
                        ]);
                        header("location: ?controller=user&action=admincontrol&qltt");
                    }
                    else{
                        $alert = "<div class='alert_manager err'>
                                <h2>Tệp hình ảnh bị sai hoặc đã tồn tại</h2>
                            </div>"; 
                    }
                }
            }
            // Sửa tin tức
            if(isset($_GET['edit_news'])){
                $Inews = ($this->newsController->findNews($_GET['edit_news'])[0]) ?? "";
                if(!empty($Inews)){
                $Ides = str_replace("<br />", " ", $Inews['description']);
                $createBox = "<div class='main_page__manager__control__ebox'>
                    <h2 class='title_ebox'>Sửa Tin Tức</h2>
                    <input type='text' hidden value='${Inews['id']}' required name='id_news' />
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__tab'>
                            <label>Tên Tiêu Đề: </label>
                        </div>
                        <div class='main_page__manager__control__ebox__tab'>
                            <input type='text' hidden value='${Inews['name']}' required name='name_news_o' />
                            <input type='text' value='${Inews['name']}' required name='name_news' />
                        </div>
                    </div>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__tab'>
                            <label>Hình Ảnh: </label>
                        </div>
                        <div class='main_page__manager__control__ebox__tab'>
                            <input type='text' hidden name='img_news_o' value='${Inews['image']}' />
                            <input type='file' name='img_news' />
                        </div>
                    </div>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__tab'>
                            <label>Nội dung: </label>
                        </div>
                        <div class='main_page__manager__control__ebox__tab'>
                            <textarea required name='des_news'>${Ides}</textarea>
                        </div>
                    </div>
                    <div class='main_page__manager__control__ebox__input'>
                        <div class='main_page__manager__control__ebox__submit'>
                            <input type='submit' name='edit_news_sub' value='Xác Nhận' />
                            <a href='?controller=user&action=admincontrol&qltt'>Hủy Bỏ</a>
                        </div>
                    </div>
                </div>";
                }
            }
            if(isset($_POST['edit_news_sub'])){
                $img_news = ($this->UploadImg($_FILES['img_news'], "edit_news_sub")) ?? false;
                if($this->checkData($news, $_POST['name_news'], $_POST['name_news_o'])){
                    if(!empty($_FILES['img_news']) && $img_news !== false){
                        unlink($_POST['img_news_o']);
                        $this->newsController->updateNews($_POST['id_news'],[
                            "name" => $_POST['name_news'],
                            "image" => $img_news,
                            "description" => nl2br($_POST['des_news'])
                        ]);
                        header("location: ?controller=user&action=admincontrol&qltt");
                    }else{
                        $this->newsController->updateNews($_POST['id_news'],[
                            "name" => $_POST['name_news'],
                            "description" => nl2br($_POST['des_news'])
                        ]);
                        header("location: ?controller=user&action=admincontrol&qltt");
                    }
                }else{
                    $alert = "<div class='alert_manager err'>
                    <h2>".$_POST['name_prod']." đã tồn tại hoặc tệp hình ảnh bị sai</h2>
                    </div>"; 
                }
            }

            if(isset($_GET['del_news'])){
                $img = ($this->newsController->findNews($_GET['del_news'])[0]['image']) ?? "";
                $this->newsController->deleteNews($_GET['del_news'], $img);
                header("location: ?controller=user&action=admincontrol&qltt");
            }
            $output .= "
            <form action='?controller=user&action=admincontrol&qltt' method='post' enctype='multipart/form-data'>
            <div class='main_page__manager__control'>
                $alert
                $createBox
                <div class='main_page__manager__control__functions'>
                    <input type='submit' name='add_news' value='Thêm Tin Tức'/>
                    <input type='submit' name='add_news_ind' value='Thêm Tin Tức Trang Chủ'/>
                </div>
                <div class='main_page__manager__control__list'>
                    <div class='main_page__manager__control__list__title'>
                        <h2>Tin Tức Của Tôi</h2>
                    </div>
                    <div class='main_page__manager__control__list__products'>";
                        foreach($news as $post){
                            $output .= "
                            <div class='main_page__manager__control__list__product'>
                                    <div class='control__list__product__left'>
                                        <div class='main_page__manager__control__list__product_img news'>
                                            <img src='${post['image']}'/>
                                        </div>
                                        <div class='main_page__manager__control__list__product_infor'>
                                            <p class='title'>${post['name']}</p>
                                            <p class='descrip'>${post['description']}</p>
                                        </div>
                                    </div>      
                                    <div class='control__list__product__right'>
                                        <a href='?controller=user&action=admincontrol&qltt&edit_news=${post['id']}'>
                                        Sửa sản phẩm</a>
                                        <a href='?controller=user&action=admincontrol&qltt&del_news=${post['id']}'>
                                        Xóa sản phẩm</a>
                                    </div>
                            </div>";
                        }
            $output .= "</div>                  
                    </div>
                </div>
            </form>";
            return $output;
        }

        private function checkData($dataM, $dataC, $temp = ""){
            if($temp === $dataC) return true;
            foreach($dataM as $data){
                if($data['name'] === $dataC){
                    return false;
                    break;
                }
            }
            return true;
        }
        private function UploadImg($img, $post){
            $target_dir = "Images/";
            $target_file = $target_dir . basename($img["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["$post"])) {
                // File Exists
              if (file_exists($target_file)) {
                return false;
                $uploadOk = 0;
              }
              
              // Check file size
              if ($img["size"] > 500000) {
                return false;
                $uploadOk = 0;
              }
              
              // Allow certain file formats
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                  return false;
                $uploadOk = 0;
              }
              $check = (!empty($img["tmp_name"])) ? getimagesize($img["tmp_name"]) : false;
              $uploadOk = 1;
              if($check !== false) {
                if ($uploadOk == 0) {
                    return false;
                  // if everything is ok, try to upload file
                  } else {
                    if (move_uploaded_file($img["tmp_name"], $target_file)) {
                        return $target_file;
                    } else {
                        return false;
                    }
                }
              } else {
                return false;
                $uploadOk = 0;
              }
              
            }
        }
    }
?>