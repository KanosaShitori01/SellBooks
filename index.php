<?php 
    session_start();
    require "./Controller/BaseController.php";
    require "./Core/Database.php";
    require "./Model/BaseModel.php";
    if(isset($_SESSION['userZ'])) header("location: Sign/user_otp.php");
    if(isset($_GET['controller'])){
        $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? "Welcome"))."Controller";
        $actionName = strtolower($_REQUEST['action'] ?? 'index');
        if (file_exists("./Controller/$controllerName.php") && $controllerName !== "SignController") 
            require "./Controller/$controllerName.php";
        else
            header("refresh: 0, url=./");
        
        try{
            $controllerObj = new $controllerName;
            $controllerObj->$actionName();
        }catch (Throwable $e) {
            header("refresh:0, url=./");
        }
    }else{
        $_SESSION['url_main'] = $_SERVER['PHP_SELF'];
        DeleteErr();
    }
    function DeleteErr(){
        $Prod = new BaseModel;
        $Reprod = $Prod->getAll("products");
        $Recart = $Prod->getAll("carts");
        foreach($Reprod as $prod){
            $Prod->Update("products", $prod['id'], "", "", [
                "error" => ""
            ]);
        }
        foreach($Recart as $cart){
            $Prod->Update("carts", $cart['id'], "", "", [
                "error" => ""
            ]);
        }
    }
    $controllerObj = new BaseModel;
    $Product = $controllerObj->getAll("products");
    $Author = $controllerObj->getAll("author");
    $AdminD = $controllerObj->Find("users", "", "admin", 1, true);
    $Address = $controllerObj->getAll("address");
    $today = date("Y-m");
    $newProducts = $controllerObj->Find("products", "", "created_day", "'%".$today."%'");
    if(empty($newProducts)){
        $newProducts = $controllerObj->getAll("products");
    }
    $Category = $controllerObj->getAll("categories");
    if(isset($_SESSION['user'])){
        $Cart = $controllerObj->Find("carts", "", "id_user", $_SESSION['user'], true);
    }
    $cart_count = (isset($Cart) && isset($_SESSION['user'])) ? count($Cart) : "0"; 
    $choice = ["", ""]; 
    $selected = "SP";
   if(isset($_POST['change_cate'])){
        if(!empty($_POST['category'])) {
            $_SESSION["selected"] = $_POST['category'];
            if($_SESSION["selected"] == "SP"){
                $choice[0] = "selected";
                $choice[1] = "";
            }else{
                $choice[1] = "selected";
                $choice[0] = "";
            }
            
        } else {
            echo 'Please select the value.';
        }
   }
   if(isset($_POST['submit_search'])){
       if(isset($_POST['namebook'])){
           $_SESSION['namebook'] = $_POST['namebook'];
           header("location: ?controller=products&action=find&name=".$_SESSION['namebook']);
       }
       else{
           header("refresh:0, url=./");
       }
   }
   if(isset($_POST['submit_buy'])){
       if(isset($_POST['quantity'])){
            $id = $GLOBALS['product_one'][0]['id'];
            $quantity = $_POST['quantity'];
            header("location: ?controller=products&action=buy&id=$id&quantity=$quantity");
       }
   }
   if(isset($_POST['update_cart'])){
       $res = "";
       $resSec = "";
       foreach($Cart as $idprod){
           if(isset($_POST["quantity_${idprod['id_products']}"])){
               $change_val = $_POST["quantity_${idprod['id_products']}"];
                $res .= "$change_val,";
                $resSec .= $idprod["id"].",";
           }
       }
       $setResSec = rtrim($resSec, ",");
       $setRes = rtrim($res, ",");
       header("location: ?controller=cart&action=update&id=$setResSec&change=$setRes");
   }
   if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        header("location: ./");
   }
   function FindAuthor($id, $author){
        $res = "";
        foreach($author as $au){
            if($au["id"] === $id){
                $res = $au["name"];
                break;
            }
        }
        return $res;
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinh Sách Kim Quy</title>
    <link rel="stylesheet" href="Public/assets/style.css">
    <script src="https://kit.fontawesome.com/728b560bcb.js" crossorigin="anonymous"></script>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="Nivo/themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="Nivo/themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="Nivo/themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="Nivo/themes/bar/bar.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="Nivo/nivo-slider.css" type="text/css" media="screen" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>
<body>

    <header class="heading_page">
        <?php
            if(!isset($_SESSION['user'])){
                echo "
                <div class='heading_page__navhead'>
                    <div class='heading_page__navhead__log login'> 
                        <a href='Sign/login.php'><i class='fas fa-user'></i> Đăng Nhập</a>
                    </div>
                    <div class='heading_page__navhead__log register'>
                        <a href='Sign/register.php'><i class='fas fa-key'></i> Đăng Ký</a>
                    </div>
                </div>
                ";
            }
            else{
                echo "
                <div class='heading_page__navhead'>
                    <div class='heading_page__navhead__log login'> 
                        <a href='?controller=user'><i class='fas fa-user-circle'></i> Tài khoản</a>
                    </div>
                    <div class='heading_page__navhead__log register'>
                        <a href='?logout'><i class='fas fa-door-open'></i> Đăng Xuất</a>
                    </div>
                </div>
                ";
            }
        ?>
       
        <div class="heading_page__headmain">
            <div class="heading_page__headmain__logo">
                <a href="./"><img src="Public/img/LogoKQ.png" width="100%" height="100%" alt="" srcset=""></a>
            </div>
            <div class="heading_page__headmain__functions">
                <div class="heading_page__headmain__functions__function hotline">
                    <p><i class="fas fa-phone-alt"></i> Hotline : <?= $AdminD[0]['tel'] ?> </p>
                </div>
                <div class="heading_page__headmain__functions__function cart">
                    <div class="quantily"><span><?= $cart_count; ?></span></div>
                    <a href="?controller=cart"><i class="fas fa-shopping-cart"></i> Giỏ Hàng</a>
                </div>
            </div>
            <div class="heading_page__headmain__search">
                <!-- <div class="heading_page__headmain__search__select">
                    <select name="" id="">
                        <option value="0" selected>Tất cả sản phẩm</option>
                       
                            // foreach($Category as $cate){
                            //     echo "<option value='${cate['id']}'>${cate['name']}</option>";
                            // }
                       
                    </select>
                </div> -->
                <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
                    <div class="heading_page__headmain__search__input">
                        <input id="findbooks" type="text" name="namebook" required placeholder="Nhập tên sách bạn cần tìm..." id="">
                        <div class="heading_page__headmain__search__res" id="result">
                        </div>
                    </div>
                    <div class="heading_page__headmain__search__submit">
                        <button type="submit" name="submit_search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>                 
                </form>
            </div>
        </div>
            <div class="heading_page__instruction">
                <div class="heading_page__instruction__menu">
                    <?php 
                    // $viewContent = $controllerObj->
                    echo "<ul>
                        <li><a href='./'>Trang Chủ</a></li>
                        <li><a href='?controller=another&action=introduce'>Giới Thiệu</a></li>
                        <li><a href='?controller=products'>Sách</a></li>
                        <li><a href='?controller=another&action=HowtoBuy'>Hướng Dẫn Mua Hàng</a></li>
                        <li><a href='?controller=another&action=QaA'>Hỏi Đáp</a></li>
                        <li><a href='?controller=another&action=News'>Tin Tức</a></li>
                        <li><a href='?controller=another&action=Contact'>Liên Hệ</a></li>
                    </ul>"
                    ?>
                </div>
            </div>
        </div>
    </header>
    <main class="main_page">
        <?php 
            if(!isset($_GET['controller'])){
                echo "
                <div class='main_page__slider'>
                    <div id='slider' class='main_page__slider__card'> 
                        <img src='Public/img/245079935_955571495026459_4502308963599472870_n.jpg' data-thumb='Public/img/245079935_955571495026459_4502308963599472870_n.jpg' alt='' /> 
                        <img src='Public/img/245185246_955571501693125_8276774198587732744_n.jpg' data-thumb='Public/img/245185246_955571501693125_8276774198587732744_n.jpg' alt='' />
                        <img src='Public/img/246634284_955571515026457_4363408423091032081_n.jpg' data-thumb='Public/img/246634284_955571515026457_4363408423091032081_n.jpg' alt='' data-transition='slideInLeft' /> 
                        <img src='Public/img/246947917_955571511693124_1134443736739023420_n.jpg' data-thumb='Public/img/246947917_955571511693124_1134443736739023420_n.jpg' alt='' /> 
                    </div>
                </div>
                ";         
            }
        ?>
        <div class="main_page__part">
            <?php 
                if(!isset($_GET['controller']) || $_GET['controller'] == "products" 
                || $_GET['controller'] == "category" || $_GET['controller'] == "author")
                {
                    echo '
                    <div class="main_page__left">
                        <div class="main_page__category">
                            <div class="main_page__category__title">
                                <p><i class="fas fa-bars"></i> Danh Mục:
                                <form action="'.$_SERVER["PHP_SELF"].'" method="post">
                                    <select name="category" id="">';
                                if(isset($_SESSION["selected"])){
                                    if($_SESSION["selected"] == "SP"){
                                    echo    "<option value='SP' selected>Sách</option>";
                                    echo    "<option value='TG' >Tác Giả</option>";
                                    }
                                    else{
                                    echo    "<option value='SP' >Sách</option>";
                                    echo    "<option value='TG' selected>Tác Giả</option>";
                                    }
                                }
                                else{
                                    echo    "<option value='SP' selected>Sách</option>";
                                    echo    "<option value='TG' >Tác Giả</option>";
                                }
                    echo            '</select>
                                    <input type="submit" value="Reset" name="change_cate" />
                                </form>    
                                </p>
                            </div>
                            <div class="main_page__category__list">
                                <ul>';
                                // var_dump();
                                if(!empty($selected)){
                                    if(isset($_SESSION["selected"])){
                                    if($_SESSION["selected"] == "SP"){
                                        foreach($Category as $cate){
                                            echo "<li><a href='?controller=category&action=show&id=${cate['id']}'>${cate['name']}</a></li>";
                                        }
                                    }
                                    else{
                                        foreach($Author as $au){
                                            echo "<li><a href='?controller=author&action=show&id=${au['id']}'>${au['name']}</a></li>";
                                        }
                                    }
                                    }else{
                                        foreach($Category as $cate){
                                            echo "<li><a href='?controller=category&action=show&id=${cate['id']}'>${cate['name']}</a></li>";
                                        }
                                    }
                                }
                                    
                    echo '      </ul>
                            </div>
                        </div>
                    </div>
                    ';
                }
            ?>
          
            <div class="main_page__content">
                <?php 
                    if(!isset($_GET['controller'])){
                        DeleteErr();
                        echo '
                            <div class="main_page__box">
                                <div class="main_page__content__title">
                                    <p>Sách Mới</p>
                                </div>
                                <div class="main_page__content__intestine">
                                    <div class="main_page__content__intestine__products">';
                                    $count = 0;
                                        foreach($newProducts as $prod){
                                            echo "
                                            <div class='main_page__content__product'>
                                                <a href='?controller=products&action=show&id=${prod['id']}'><div class='main_page__content__product__pic'>
                                                    <img src='${prod['image']}' alt='' srcset=''>
                                                </div>
                                                <div class='main_page__content__product__content'>
                                                    <div class='product__content__name sp'>
                                                        <p>${prod['name']}</p>
                                                    </div>
                                                    <div class='product__content__author sp'>
                                                        <p>".FindAuthor($prod['id_author'], $Author)."</p>
                                                    </div>
                                                    <div class='product__content__price money sp'>
                                                        <p class='price'>${prod['price']}đ</p>
                                                    </div>
                                                </div></a>
                                            </div>
                                            ";
                                            $count++;
                                            if($count > 14){
                                                break;
                                            }
                                        }
                        echo       '</div>
                                </div>
                            </div>
                        ';
                        foreach($Category as $cate){
                            DeleteErr();
                            echo '
                            <div class="main_page__box">
                                <div class="main_page__content__title">
                                    <p>'.$cate['name'].'</p>
                                </div>';
                            echo  '<div class="main_page__content__intestine">
                                    <div class="main_page__content__intestine__products">';
                                            foreach($Product as $prod){
                                                if($cate['id'] === $prod['id_category']){
                                                    echo "
                                                    <div class='main_page__content__product'>
                                                        <a href='?controller=products&action=show&id=${prod['id']}'><div class='main_page__content__product__pic'>
                                                            <img src='${prod['image']}' alt='' srcset=''>
                                                        </div>
                                                        <div class='main_page__content__product__content'>
                                                            <div class='product__content__name sp'>
                                                                <p>${prod['name']}</p>
                                                            </div>
                                                            <div class='product__content__author sp'>
                                                                <p>".FindAuthor($prod['id_author'], $Author)."</p>
                                                            </div>
                                                            <div class='product__content__price money sp'>
                                                                <p class='price'>${prod['price']}đ</p>
                                                            </div>
                                                        </div></a>
                                                    </div>
                                                    ";
                                                }
                                            }
                            echo       '</div>
                                    </div>
                                </div>
                            ';
                        }
                        
                        // foreach($Product as $val){
                        //     var_dump($val);
                        // }
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "products" && isset($GLOBALS['key_products'])){
                        DeleteErr();
                        foreach($GLOBALS['key_products'] as $product){
                            echo '
                            <div class="main_page__box">
                                <div class="main_page__content__title">
                                    <p>'.$product['name'].'</p>
                                </div>';
                            echo  '<div class="main_page__content__intestine">
                                    <div class="main_page__content__intestine__products">';
                                            foreach($GLOBALS['products'] as $prod){
                                                if($product['id'] === $prod['id_category']){
                                                    echo "
                                                    <div class='main_page__content__product'>
                                                        <a href='?controller=products&action=show&id=${prod['id']}'><div class='main_page__content__product__pic'>
                                                            <img src='${prod['image']}' alt='' srcset=''>
                                                        </div>
                                                        <div class='main_page__content__product__content'>
                                                            <div class='product__content__name sp'>
                                                                <p>${prod['name']}</p>
                                                            </div>
                                                            <div class='product__content__author sp'>
                                                                <p>".FindAuthor($prod['id_author'], $Author)."</p>
                                                            </div>
                                                            <div class='product__content__price money sp'>
                                                                <p class='price'>${prod['price']}đ</p>
                                                            </div>
                                                        </div></a>
                                                    </div>
                                                    ";
                                                }
                                            }
                            echo       '</div>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "products" && $_GET['action'] == "find"){
                        DeleteErr();
                        echo "
                        <div class='main_page__box'>
                            <div class='main_page__content__title'>
                                <p>Kết quả tìm kiếm : ".$_SESSION['namebook']."</p>
                            </div>
                            <div class='main_page__content__intestine'>
                                <div class='main_page__content__intestine__products'>";
                                    foreach($GLOBALS['products_show'] as $prod){
                                        echo "
                                        <div class='main_page__content__product'>
                                            <a href='?controller=products&action=show&id=${prod['id']}'><div class='main_page__content__product__pic'>
                                                <img src='${prod['image']}' alt='' srcset=''>
                                            </div>
                                            <div class='main_page__content__product__content'>
                                                <div class='product__content__name sp'>
                                                    <p>${prod['name']}</p>
                                                </div>
                                                <div class='product__content__author sp'>
                                                    <p>".FindAuthor($prod['id_author'], $Author)."</p>
                                                </div>
                                                <div class='product__content__price money sp'>
                                                    <p class='price'>${prod['price']}đ</p>
                                                </div>
                                            </div></a>
                                        </div>
                                        ";
                                    }
                        echo       '</div>
                                </div>
                            </div>
                        ';
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "products" && $_GET['action'] == "show"){
                        $infor_prod = $GLOBALS['product_one'][0];
                        echo "<div class='main_page__box'>
                            <div class='main_page__content__title'>
                                <p>Thông tin về Sách</p>
                            </div>
                            <div class='main_page__content__intestine'>
                                <div class='main_page__content__infor'>
                                    <div class='main_page__content__infor__pic'>
                                        <img src='${infor_prod['image']}' alt='' srcset=''>
                                    </div>
                                    <div class='main_page__content__infor__content'>
                                        <div class='infor__content__name sp'>
                                            <p>${infor_prod['name']}</p>
                                        </div>
                                        <div class='infor__content__author sp'>
                                            <p>Tác giả : ".FindAuthor($infor_prod['id_author'], $Author)."</p>
                                        </div>
                                        <div class='infor__content__description sp'>
                                            <p>${infor_prod['description']}</p>
                                        </div>
                                        <div class='infor__content__price money sp'>
                                            <p>Giá bán: </p>
                                            <p class='price'>${infor_prod['price']} đ</p>
                                        </div>
                                        <form action='?controller=products&action=show&id=${infor_prod['id']}' method='post'>
                                        <div class='infor__content__buy sp'>
                                            <label>Số lượng : </label>
                                            <div class='snipper'>
                                                <div class='prev'><i class='fas fa-minus'></i></div>
                                                <div class='next'><i class='fas fa-plus'></i></div>
                                                <input type='number' value='1' name='quantity'
                                                oninput='OnlyNum(this, ${infor_prod['quantity']})'>   
                                            </div>
                                             <input name='submit_buy' type='submit' class='btn_ok' value='Đặt Mua' /> 
                                        </div>
                                        <div class='error_content'>
                                            <p>${infor_prod['error']}</p>
                                        </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>";
                       
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "category"){
                        DeleteErr();
                        echo '
                        <div class="main_page__box">
                            <div class="main_page__content__title">
                                <p>'.$GLOBALS['category_main'][0]['name'].'</p>
                            </div>
                            <div class="main_page__content__intestine">
                                <div class="main_page__content__intestine__products">';
                            foreach($GLOBALS['products_follow'] as $product_f){
                                    echo "
                                    <div class='main_page__content__product'>
                                        <a href='?controller=products&action=show&id=${product_f['id']}'><div class='main_page__content__product__pic'>
                                            <img src='${product_f['image']}' alt='' srcset=''>
                                        </div>
                                        <div class='main_page__content__product__content'>
                                            <div class='product__content__name sp'>
                                                <p>${product_f['name']}</p>
                                            </div>
                                            <div class='product__content__author sp'>
                                                <p>".FindAuthor($product_f['id_author'], $Author)."</p>
                                            </div>
                                            <div class='product__content__price money sp'>
                                                <p class='price'>${product_f['price']}đ</p>
                                            </div>
                                        </div></a>
                                    </div>
                                    ";
                        echo       '</div>
                                </div>
                            </div>
                        ';
                        }
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "cart"){
                        $totalmoney = 0;
                        $manysp = 0;
                        echo "
                        <div class='cart'>
                            <div class='cart__title'>
                                <h1>Giỏ Hàng</h1>
                            </div>
                            <div class='cart__content'>
                                <div class='cart__content__btn'>
                                    <label class='btn' for='update_cart'><p>Cập nhật giỏ hàng</p></label>
                                    <label class='btn'><a href='./'>Tiếp tục mua hàng</a><label>
                                </div>
                                <div class='cart__content__products'>";
                                if(!empty($GLOBALS['cart'])){
                                    $quantityProd = $GLOBALS['quantityProd'];
                                    echo "<form action='?controller=cart' method='post'>";
                                    foreach($GLOBALS['cart'] as $cart){
                                        $totalquantity = $cart['price'] * $cart['quantity'];
                                        $manysp += $cart['quantity'];
                                        $totalmoney += $totalquantity;
                                        // $max = $quantityProd[$cart['id_products']];
                                        echo "
                                        <div class='cart__content__products__product'>
                                            <div class='cart__content__product__left'>
                                                    <div class='cart__content__product__img'>
                                                        <img src='${cart['image']}' alt='' srcset=''>
                                                    </div>
                                                    <div class='cart__content__product__intro'>
                                                        <div class='cart__content__product__intro__name'>
                                                            <p>${cart['name']}</p>
                                                        </div>
                                                        <div class='cart__content__product__intro__price money'>
                                                            <p class='price'>${cart['price']}đ</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class='cart__content__product__right'>
                                                <input type='submit' id='update_cart' name='update_cart' hidden/>
                                                <div class='cart__content__product__quantity'>
                                                    <div class='snipper'>
                                                        <div class='prev cart_p'><i class='fas fa-minus'></i></div>
                                                        <div class='next cart_n'><i class='fas fa-plus'></i></div>
                                                        <input type='number' onchange='alert('oke')' value='${cart['quantity']}' name='quantity_${cart['id_products']}' />   
                                                    </div>
                                                </div>
                                                <div class='cart__content__product__total'>
                                                    <p>Thành Tiền</p>
                                                    <p>${totalquantity}đ</p>
                                                </div>
                                            </div>
                                            <div class='error_content'>
                                                <p>${cart['error']}</p>
                                            </div>
                                            <div class='cart__content__product__delete'>
                                                <a href='?controller=cart&action=delete&id=${cart['id']}'><i class='fas fa-times'></i></a>
                                            </div>
                                        </div>         
                                        ";
                                    }   
                                    echo "</form>";    
                                }else{
                                    echo "<div class=''>
                                    </div>
                                    ";
                                }
                                    
                        echo   "</div>
                        <div class='cart__content__pay'>
                                    <div class='cart__content__pay__box'>
                                        <div class='cart__content__pay__tab'>
                                            <p>Sản phẩm : $manysp</p>
                                        </div>
                                    <div class='cart__content__pay__tab'>
                                        <p>Tổng tiền : $totalmoney đ</p>
                                    </div>
                                    </div>";
                           echo (empty($manysp)) ? "<a href='./' class='cart__content__pay__btn'>Mua Hàng</a>" : "<a href='?controller=pay' class='cart__content__pay__btn'>Thanh Toán</a>"; 
                        echo    "</div>
                            </div>
                        </div>
                        ";
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "pay"){
                        echo $GLOBALS['pay_form'];
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "author" && $_GET['action'] == "show"){
                        DeleteErr();
                        foreach($GLOBALS['name_author'] as $author_name){
                            echo '
                            <div class="main_page__box">
                                <div class="main_page__content__title">
                                    <p>'.$author_name['name'].'</p>
                                </div>';
                            echo  '<div class="main_page__content__intestine">
                                    <div class="main_page__content__intestine__products">';
                                            foreach($GLOBALS['products_author'] as $prod){
                                                echo "
                                                <div class='main_page__content__product'>
                                                    <a href='?controller=products&action=show&id=${prod['id']}'><div class='main_page__content__product__pic'>
                                                        <img src='${prod['image']}' alt='' srcset=''>
                                                    </div>
                                                    <div class='main_page__content__product__content'>
                                                        <div class='product__content__name sp'>
                                                            <p>${prod['name']}</p>
                                                        </div>
                                                        <div class='product__content__author sp'>
                                                            <p>${author_name['name']}</p>
                                                        </div>
                                                        <div class='product__content__price money sp'>
                                                            <p class='price'>${prod['price']}đ</p>
                                                        </div>
                                                    </div></a>
                                                </div>
                                                ";
                                            }
                            echo       '</div>
                                    </div>
                                </div>
                            ';
                        }
                    }
                    else if(isset($_GET['controller']) && $_GET['controller'] == "user"){
                        $user = $GLOBALS['user'];
                        // var_dump($user);
                        echo "
                        <div class='main_page__manager'>
                            <div class='main_page__manager__list'>
                                <ul>
                                <li class='title_list'><i class='fas fa-user-circle'></i> <span> Tài khoản </span></li>
                                    ${user['list']}
                                </ul>
                            </div>
                            <div class='main_page__manager__box'>
                                <div class='main_page__manager__title'>
                                    <h2>${user['title']}</h2>
                                </div>
                                <div class='main_page__manager__content'>
                                    ${user['output']}
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    else{
                        echo $GLOBALS['introduce'];  
                    }
                ?>
            </div>
        </div>
    </main>
    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
    <footer class="footer_page">
        <div class="footer_page__top">
            <div class="footer_page__informations">
                <div class="footer_page__information">
                    <div class="footer_page__information__title">
                        <p>Thông tin liên hệ</p>
                    </div>
                    <div class="footer_page__information__content">
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i><?= $Address[0]['address'] ?></li>
                            <li><a href="tel:<?= $AdminD[0]['tel'] ?>"><i class="fas fa-phone-alt"></i><?= $AdminD[0]['tel'] ?></a></li>
                            <li><a href="mailto:<?= $AdminD[0]['gmail'] ?>"><i class="far fa-envelope"></i><?= $AdminD[0]['gmail'] ?></a></li>
                        </ul>
                    </div>
                 </div>
                 <div class="footer_page__information">
                    <div class="footer_page__information__title">
                        <p>Thông tin hữu ích</p>
                    </div>
                    <div class="footer_page__information__content">
                        <ul class="supp">
                            <li><a href=""><i class="fas fa-long-arrow-alt-right"></i>Giao hàng tận nơi</a></li>
                            <li><a href=""><i class="fas fa-long-arrow-alt-right"></i>Tài khoản và đơn hàng</a></li>
                            <li><a href=""><i class="fas fa-long-arrow-alt-right"></i>Hình thức thanh toán</a></li>
                            <li><a href=""><i class="fas fa-long-arrow-alt-right"></i>Hướng dẫn mua hàng</a></li>
                            <li><a href=""><i class="fas fa-long-arrow-alt-right"></i>Tận tâm phụng sự</a></li>
                        </ul>
                    </div>
                 </div>
                <div class="footer_page__information">
                     <div class="footer_page__information__title">
                        <p>Thống kê truy cập</p>
                     </div>
                     <div class="footer_page__information__content">
                         <div class="footer_page__information__content__item">
                            <span class="til">Trực tuyến:</span><span>29</span>
                         </div>
                         <div class="footer_page__information__content__item">
                            <span class="til">Tổng truy cập:</span><span>758881</span>
                         </div>
                         <div class="footer_page__information__content__item">
                            <p class="title">Cập nhật thông tin khuyến mãi</p>
                            <div class="tab_send">
                                <input type="text" name="" id="">
                                <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                            </div>
                         </div>
                     </div>
                  </div>
            </div>
            <div class="footer_page__plugin">
                <iframe data-width="170" height="300px" 
                src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkinhsachkimquy&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
        </div>
        <div class="footer_page__copyright">
           <p> &copy; Copyright 2021 <a href="https://kinhsachkimquy.com/">kinhsachkimquy.com</a> Designed by <a href="">Thanh Mây</a></p>
        </div>
        </footer>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="Nivo/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function () {
      $("#slider").nivoSlider({
            effect: 'random',               // Specify sets like: 'fold,fade,sliceDown'
            slices: 15,                     // For slice animations
            boxCols: 10,                     // For box animations
            boxRows: 4,                     // For box animations
            animSpeed: 500,                 // Slide transition speed
            pauseTime: 5000,                // How long each slide will show
            startSlide: 0,                  // Set starting Slide (0 index)
            directionNav: true,             // Next & Prev navigation
            controlNav: true,               // 1,2,3... navigation
            controlNavThumbs: false,        // Use thumbnails for Control Nav
            pauseOnHover: false,             // Stop animation while hovering
            manualAdvance: false,           // Force manual transitions
            prevText: 'Prev',               // Prev directionNav text
            nextText: 'Next',               // Next directionNav text
            randomStart: true,             // Start on a random slide
            beforeChange: function(){},     // Triggers before a slide transition
            afterChange: function(){},      // Triggers after a slide transition
            slideshowEnd: function(){},     // Triggers after all slides have been shown
            lastSlide: function(){},        // Triggers when last slide is shown
            afterLoad: function(){}         // Triggers when slider has loaded
        });
    });
  </script>
  <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
<script src="Public/assets/js.js"></script>
</html>
