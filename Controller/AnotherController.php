<?php 
    class AnotherController extends BaseController{
        public function index(){
            header("refresh: 0, url=./");
        }
        public function introduce(){
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Giới Thiệu</p>
                    </div>
                    <div class='main_page__content__intestine'>
                        <div class='main_page__content__intestine__text'>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Aperiam dolore ea itaque quas laudantium autem nisi doloremque accusamus! 
                            Cum quam, earum laudantium maxime distinctio non maiores ullam facilis cupiditate adipisci. </p>
                        </div>
                    </div>
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
                <div class='main_page__content__intestine'>
                    <div class='main_page__content__intestine__text'>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Aperiam dolore ea itaque quas laudantium autem nisi doloremque accusamus! 
                        Cum quam, earum laudantium maxime distinctio non maiores ullam facilis cupiditate adipisci. </p>
                    </div>
                </div>
            </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
        public function QaA(){
            $another_content = "
                <div class='main_page__box'>
                    <div class='main_page__content__title bigger'>
                        <p>Hỏi Đáp</p>
                    </div>
                    <div class='main_page__content__intestine'>
                        <div class='main_page__content__intestine__text'>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            Aperiam dolore ea itaque quas laudantium autem nisi doloremque accusamus! 
                            Cum quam, earum laudantium maxime distinctio non maiores ullam facilis cupiditate adipisci. </p>
                        </div>
                    </div>
                </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
        public function News(){
            $another_content = "
            <div class='main_page__box'>
                <div class='main_page__content__title bigger'>
                    <p>Tin Tức</p>
                </div>
                <div class='main_page__content__intestine'>
                    <div class='main_page__content__intestine__text'>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Aperiam dolore ea itaque quas laudantium autem nisi doloremque accusamus! 
                        Cum quam, earum laudantium maxime distinctio non maiores ullam facilis cupiditate adipisci. </p>
                    </div>
                </div>
            </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
        public function Contact(){
            $another_content = "
            <div class='main_page__box'>
                <div class='main_page__content__title bigger'>
                    <p>Liên Hệ</p>
                </div>
                <div class='main_page__content__intestine'>
                    <div class='main_page__content__intestine__text'>
                        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                        Aperiam dolore ea itaque quas laudantium autem nisi doloremque accusamus! 
                        Cum quam, earum laudantium maxime distinctio non maiores ullam facilis cupiditate adipisci. </p>
                    </div>
                </div>
            </div>
            ";
            return $this->loadView("FrontEnd.Another.index",[
                "another_content" => $another_content
            ]);
        }
    }
?>