<?php 
    class PayController extends BaseController{
        private $payController;
        private $cartController;
        private $userController;
        public function __construct()
        {
            $this->loadModel("PayModel");
            $this->loadModel("CartModel");
            $this->loadModel("SignModel");
            $this->payController = new PayModel;
            $this->cartController = new CartModel;
            $this->userController = new SignModel;
        }
        public function index(){
            $check = false;
            $myOrder = $this->cartController->findCart("id_user", $_SESSION['user']);
            $userInfor = $this->userController->findUserQ("id", $_SESSION['user'])[0];
            $dis = "";
            $error = "";
            (empty($myOrder)) ? header("location: ./") : "";
            if(isset($_POST['pay_btn'])){
                if(!is_numeric($_POST['fullname'])){
                    $this->payController->addOrder([
                        "id_user" => $_SESSION['user'],
                        "id_cart" => $myOrder[0]['id_products'],
                        "name_user" => $_POST['fullname'],
                        "quantity" => $_POST['total_quan'],
                        "totalmoney" => $_POST['total_money'],
                        "address" => $_POST['address'],
                        "tel" => $userInfor['tel'],
                        "gmail" => $userInfor['gmail']
                    ]);
                   ($this->cartController->deleteCartUser("id_user", $_SESSION['user'])) ? $check = true : "";
                }
                else $error = "(*) Vui lòng nhập thông tin hợp lệ";
                // var_dump($_POST['total_quan']);
            }
            if(isset($_POST['pay_btn_cancel'])){
                header("location: ?controller=cart");
            }
            if($check){
                $output = "<div class='pay_box cart'>
                    <div class='pay_box__title cart__title'>
                        <h1>Thanh Toán Thành Công</h1>
                        <a href='./'>Quay về</a>
                    </div>
                </div>";
            }else {
            $output = "
                <form action='?controller=pay' method='post'>
                    <div class='pay_box cart'>
                        <div class='pay_box__title cart__title'>
                            <h1>Thanh Toán</h1>
                        </div>
                    <div class='pay_box__report'>
                        <div class='pay_box__report__input'>
                            <div class='pay_box__report__input__label'>
                                <label>Họ và Tên: </label>
                            </div>
                            <div class='pay_box__report__input__tab'>
                                <input type='text' placeholder='Vui lòng nhập họ tên đầy đủ' name='fullname' required />
                                <span style='color: red;'>$error</span>
                            </div>
                        </div>
                        <div class='pay_box__report__input'>
                            <div class='pay_box__report__input__label'>
                                <label>Số điện thoại: </label>
                            </div>
                            <div class='pay_box__report__input__tab'>
                                <input type='tel' disabled value='${userInfor['tel']}' maxlength='10' name='tel' required />
                            </div>
                        </div>
                        <div class='pay_box__report__input'>
                            <div class='pay_box__report__input__label'>
                                <label>Gmail: </label>
                            </div>
                            <div class='pay_box__report__input__tab'>
                                <input type='gmail' disabled value='${userInfor['gmail']}' name='gmail' required />
                            </div>
                        </div>
                        <div class='pay_box__report__input'>
                            <div class='pay_box__report__input__label'>
                                <label>Địa chỉ giao hàng: </label>
                            </div>
                            <div class='pay_box__report__input__tab'>
                                <input type='text' placeholder='Vui lòng nhập tên thành phố, tên đường, số nhà, vv...' name='address' required />
                            </div>
                        </div>
                    </div>
                    <div class='pay_box__infor'>
                        <div class='pay_box__infor__title'>
                            <p>Thông tin đơn hàng</p>
                        </div>
                        <div class='pay_box__infor__content'>";
                        $priceOrder = 0;
                        $totalOrder = 0;
                        $quantityOrder = 0;
                        foreach($myOrder as $order){
                            $priceOrder = $order['price'] * $order['quantity'];
                            $totalOrder += $priceOrder;
                            $quantityOrder += $order['quantity'];
                            $output .= "
                            <div class='pay_box__infor__tab'>
                                <div class='pay_box__infor__tab_name'>
                                    <h3>${order['name']}</h3>
                                </div>
                                <div class='pay_box__infor__tab_more'>
                                    <h4>Tổng tiền: ${priceOrder}đ</h4>
                                    <h4>Số lượng: ${order['quantity']}</h4>
                                </div>
                            </div>";
                        }   
            $output .= "<h2 class='total'> - Tổng số tiền của đơn hàng : ".$totalOrder."đ </h2>
                        <h2 class='total'> - Tổng số sách : $quantityOrder </h2>
                        <input type='text' value='$quantityOrder' name='total_quan' hidden/>
                        <input type='text' value='$totalOrder' name='total_money' hidden/>
                        ";         
                            
            $output .= "</div>
                    </div>
                    <div class='pay_box__btn'>
                        <input type='submit' $dis value='Giao Hàng' name='pay_btn'/>
                        <input type='submit' $dis value='Hủy Bỏ' name='pay_btn_cancel'/>
                    </div>
                </div>
                </form>
                ";
            }
            return $this->loadView("FrontEnd.Pay.index",[
                "pay_form" => $output,
            ]);
           
        }
    }
?>