<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class AnotherController extends BaseController{
        private $anotherController;
        private $newsController;
        public function __construct()
        {
            $this->loadModel("AnotherModel");
            $this->loadModel("NewsModel");
            $this->anotherController = new AnotherModel;
            $this->newsController = new NewsModel;
        }
        public function index(){
            header("refresh: 0, url=./");
        }
        public function introduce(){
            $contentANO = $this->anotherController->getAllAN(["introduce"]);
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Giới Thiệu</p>
                    </div>
                    <div class='main_page__content__intestine'>";
                    if(!empty($contentANO))
                        foreach($contentANO as $ano){
                        $another_content .= "<div class='main_page__content__intestine__text'>
                            <p> ${ano['introduce']}</p>
                            </div>";
                        }
                    else $another_content .= "<div class='main_page__content__intestine__text empty'>
                    <p>Rỗng</p>
                    </div>";
            $another_content .="</div>
                </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
        public function HowtoBuy(){
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Hướng Dẫn Mua Hàng</p>
                    </div>
                    <div class='main_page__content__intestine' style='color: black;'>
                        <h1>Bước 1: Chọn Sách Bạn Muốn Mua </h1>
                        <h1>Bước 2: Lựa Chọn Số Lượng Sách Bạn Muốn Mua </h1>
                        <h1>Bước 3: Nhấn Mua </h1>
                        <h1>Bước 4: Xác Thực Lại Số Lượng Sách và Sách Ở Giỏ Hàng</h1>
                        <h1>Bước 5: Nhấn Thanh Toán</h1>
                        <h1>Bước 6: Nhập Địa Chỉ và Họ Tên</h1>
                        <h1>Bước 7: Nhấn Vào Nút 'Giao Đến Địa Chỉ Này'</h1>
                    </div>
                </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
        public function QaA(){
            $contentANO = $this->anotherController->getAllAN(["QaA"]);
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Hỏi Đáp</p>
                    </div>
                    <div class='main_page__content__intestine'>";
                    if(!empty($contentANO))
                        foreach($contentANO as $ano){
                        $another_content .= "<div class='main_page__content__intestine__text'>
                            <p> ${ano['QaA']}</p>
                            </div>";
                        }
                    else $another_content .= "<div class='main_page__content__intestine__text empty'>
                    <p>Rỗng</p>
                    </div>";
            $another_content .="</div>
                </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
        public function News(){
            $news = $this->newsController->getAllNews();
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Tin Tức</p>
                    </div>
                    <div class='main_page__content__intestine'>
                        <div class='main_page__content__intestine__news'>";
                            foreach($news as $post){
                                if($post['indexp'] == 0)
                    $another_content .= "<div class='main_page__content__intestine__news__box'>
                                <div class='main_page__content__intestine__news__box__img'>
                                    <img src='${post['image']}' />
                                </div>
                                <div class='main_page__content__intestine__news__box__content'>
                                    <div class='main_page__content__intestine__news__box__content__title'>
                                        <h2>${post['name']}<h2>
                                    </div>
                                    <div class='main_page__content__intestine__news__box__content__text'>
                                        <p>${post['description']}<p>
                                    </div>
                                </div>
                            </div>
                            ";
                            }
                           
            $another_content .= "</div>
                    </div>
                </div>";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
        public function Contact(){
            $contentANO = $this->anotherController->getAllAN(["contact"]);
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Liên Hệ</p>
                    </div>
                    <div class='main_page__content__intestine'>";
                    if(!empty($contentANO))
                        foreach($contentANO as $ano){
                        $another_content .= "<div class='main_page__content__intestine__text'>
                            <p> ${ano['contact']}</p>
                            </div>";
                        }
                    else $another_content .= "<div class='main_page__content__intestine__text empty'>
                    <p>Rỗng</p>
                    </div>";
            $another_content .="</div>
                </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
    }
?>