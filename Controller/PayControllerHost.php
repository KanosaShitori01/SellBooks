<?php   
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
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
            $checkGuest = (isset($_SESSION['user'])) ? "disabled" : "";
            if(isset($_SESSION['user'])){
                $myOrder = $this->cartController->findCart("id_user", $_SESSION['user']);
                $userInfor = $this->userController->findUserQ("id", $_SESSION['user'])[0];
            }else{
                $myOrder = $_SESSION['cart'];
                $userInfor = [
                    "tel" => "",
                    "gmail" => ""
                ];
            }
            $dis = "";
            $error = "";
            (empty($myOrder)) ? header("location: ./") : "";
            if(isset($_POST['pay_btn'])){
                $dis = "disabled";
                $content = "";
                $code = rand(111,999);
                $allTotal = 0;
                if(!is_numeric($_POST['fullname'])){
                    foreach($myOrder as $order){
                        $total = $order['price'] * $order['quantity'];
                        $tel = (!empty($checkGuest)) ? $userInfor['tel'] : $_POST['tel'];
                        $gmail = (!empty($checkGuest)) ? $userInfor['gmail'] : $_POST['gmail'];
                        $user = (!empty($checkGuest)) ? $_SESSION['user'] : rand(11,99);
                        $this->payController->addOrder([
                            "id_user" => $user,
                            "id_product" => $order['id_products'],
                            "name_user" => $_POST['fullname'],
                            "quantity" => $order['quantity'],
                            "totalmoney" => $total,
                            "address" => $_POST['address'],
                            "tel" => $tel,
                            "gmail" => $gmail,
                            "received" => 'false'
                        ]);
                        $allTotal += $total;
                        $content .= "<p>Tên người mua: ".$_POST['fullname']."</p>
                        <p>Tên sách: ${order['name']}</p>
                        <p>Số lượng: ${order['quantity']}</p>
                        Địa chỉ: ".$_POST['address']."
                        <p>Số điện thoại: <span class='price'>${tel}</span></p> 
                        <p>Gmail: ${gmail}</p>
                        <p>Tổng tiền: $total đ.</p> 
                        <hr>";
                    }
                    $this->sendCodeMail($gmail, "NEW ORDER OF GUEST KINHSACHKIMQUY $code", 
                       $content."<h1>Tổng Tiền: $allTotal</h1>"
                    );
                    if(!empty($checkGuest)) {
                        ($this->cartController->deleteCartUser("id_user", $_SESSION['user'])) ? $check = true : "";
                    }else{
                        ($this->cartController->deleteCartGuest()) ? $check = true : "";
                    }
                }
                else $error = "(*) Vui lòng nhập thông tin hợp lệ";
            }
            if(isset($_POST['pay_btn_cancel'])){
                header("location: ?controller=cart");
            }
            if($check){
                $output = "<div class='pay_box cart'>
                    <div class='pay_box__title cart__title'>
                        <h1>Đặt Hàng Thành Công</h1>
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
                                <input type='tel' placeholder='Vui lòng nhập số điện thoại' $checkGuest value='${userInfor['tel']}' maxlength='10' name='tel' required />
                            </div>
                        </div>
                        <div class='pay_box__report__input'>
                            <div class='pay_box__report__input__label'>
                                <label>Gmail: </label>
                            </div>
                            <div class='pay_box__report__input__tab'>
                                <input type='gmail' placeholder='Vui lòng nhập gmail' $checkGuest value='${userInfor['gmail']}' name='gmail' required />
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
                                    <h4>Tổng tiền: <span class='price'>${priceOrder}</span></h4>
                                    <h4>Số lượng: ${order['quantity']}</h4>
                                </div>
                            </div>";
                        }   
            $output .= "<h2 class='total'> - Tổng số tiền của đơn hàng : <span class='price'>".$totalOrder."</span> </h2>
                        <h2 class='total'> - Tổng số sách : $quantityOrder </h2>
                        <input type='text' value='$quantityOrder' name='total_quan' hidden/>
                        <input type='text' value='$totalOrder' name='total_money' hidden/>
                        ";         
                            
            $output .= "</div>
                    </div>
                    <div class='pay_box__btn'>
                        <input type='submit' $dis value='Giao Đến Địa Chỉ Này' name='pay_btn'/>
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