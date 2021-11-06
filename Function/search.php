<?php 
 (!isset($_SESSION['url_main'])) ? header("location: ./") : "";
    require "../Core/Database.php";
    require "../Model/BaseModel.php";
    if(isset($_POST['query'])){
        $Model = new BaseModel;
        $output = "<ul class='list_res'>";
        $DataProduct = $Model->Find("products", "", "name", "'%".$_POST['query']."%'");
        if(!empty($DataProduct)){
            foreach($DataProduct as $res){
                $output .= "<li>
                <div class='img'>
                    <img src='${res['image']}'/>
                </div>
                <div class='text'>
                   <p> ${res['name']} </p> 
                </div>
                
                </li>";
            }
        }
        else{
            $output .= "<li>Không Tìm Thấy Kết Quả Nào Tên : ".$_POST['query']."</li>";
        }
        $output .= "</ul>";
        echo $output;
    }
?>