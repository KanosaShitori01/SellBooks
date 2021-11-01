<?php 
    class BaseModel extends Database{
        protected $conn; 
        public function __construct()
        {
            $this->conn = $this->Connection();
        }
        public function Query($sql){
            return mysqli_query($this->conn, $sql);
        }
        // Functions :
        // 1. Lấy toàn bộ dữ liệu
        public function getAll($tb, $select = ["*"], $orderBy = []){
            // var_dump($select);
            $column = implode(", ", $select);
            $orderBySome = implode(" ", $orderBy);
            if($orderBySome){
                $sql = "SELECT $column FROM $tb ORDER BY $orderBySome";
            } else $sql = "SELECT $column FROM $tb";
            // echo $sql;
            $query = $this->Query($sql);
            if(!$query) return "";
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row);
            }
            return $data;
        }
        // 2. Tìm dữ liệu 
        public function Find($tb, $id = "", $key = "", $value = ""){
            // var_dump($find);
            if($key === "" || $value === ""){
            $sql = "SELECT * FROM $tb WHERE id=$id";
            }
            else
            $sql = "SELECT * FROM $tb WHERE $key LIKE $value";
            $query = $this->Query($sql);
            if(!$query) return "";
            $data = [];
            while($row = mysqli_fetch_assoc($query)){
                array_push($data, $row);
            }
            // var_dump($data);
            return $data ?? "";
        }
        // 3. Thay đổi dữ liệu 
        public function Update($tb, $id, $key = "", $value = "", $data = []){
            $setData = [];
            foreach($data as $dataKey => $dataVal){
                array_push($setData, "$dataKey = '".$dataVal."'");
            }
            $setData = implode(", ", $setData);
            if($key === "" || $value === "")
            $sql = "UPDATE $tb SET $setData WHERE id=$id";
            else 
            $sql = "UPDATE $tb SET $setData WHERE $key=$value";
            // echo $sql;
            return $this->Query($sql) ?? "";
        }
        // 4. Thêm dữ liệu 
        public function toAdd($tb, $data){
            $column = implode(", ", array_keys($data));
            $perVal = array_map(function($values){
                return "'".$values."'";
            }, array_values($data));
            $perVal = implode(", ", $perVal);
            $sql = "INSERT INTO $tb(id, $column) VALUES(NULL, $perVal)";
            return $this->Query($sql) ?? "";
        }
        // 5. Xóa dữ liệu 
        public function Delete($tb, $id){
            $sql = "DELETE FROM $tb WHERE id=$id";
            return $this->Query($sql) ?? "";
        }   
        // 6. Nhảy dữ liệu 
        public function Join($tb, $data){
            
        }
        // 7. Thêm cột 
        public function Alter($tb, $column, $var){
            $sql = "ALTER TABLE $tb ADD $column $var";
            return $this->Query($sql);
        }   
    }
?>