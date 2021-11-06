<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    class AnotherController extends BaseController{
        private $anotherController;
        public function __construct()
        {
            $this->loadModel("AnotherModel");
            $this->anotherController = new AnotherModel;
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
            $contentANO = $this->anotherController->getAllAN(["howtoBuy"]);
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Hướng Dẫn Mua Hàng</p>
                    </div>
                    <div class='main_page__content__intestine'>";
                    if(!empty($contentANO))
                        foreach($contentANO as $ano){
                        $another_content .= "<div class='main_page__content__intestine__text'>
                            <p> ${ano['howtoBuy']}</p>
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
            $contentANO = $this->anotherController->getAllAN(["contact"]);
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Tin Tức</p>
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
        public function Contact(){
            $contentANO = $this->anotherController->getAllAN(["introduce"]);
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Liên Hệ</p>
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
    }
?>