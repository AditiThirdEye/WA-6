<?php
class candi {
    public $fname;
    public $email;
    public $gender;
    public $about;

    private $conn;

    public function __construct($conn)
    {
        $this->conn=$conn;
        
    }
    public function adddetails($obj){
        $sql="INSERT INTO candi (fname,email,gender,about) VALUES('$obj->fname','$obj->email','$obj->gender','$obj->about');";
            $result=mysqli_query($this->conn,$sql);
            if($result==TRUE)
            {
                $msg=["Form successfully submitted"];
            }
            else
            {
                $msg=["Error occurred!!!"];
            }
            
            return json_encode($msg);
    }
    public function getData(){
        $sql="SELECT * FROM candi;";
        $result=mysqli_query($this->conn,$sql);
        $arr=array();
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_assoc($result))
            {
                $arr[]=$row;
            }
        }
        return json_encode($arr);      
    }

     public function ddata($obj) {
        $sql = "DELETE FROM candi WHERE id='$obj';";
        $result = mysqli_query($this->conn, $sql);

        if($result==TRUE)
        {
            $msg=["Delete Successfully!!!"];
        }
        else
        {
            $msg=["Error occurred!!!"];
        }

        return json_encode($msg);
    }

    public function udata($obj) {
        $sql = "UPDATE candi
                SET fname = '$obj->fname', email = '$obj->email', gender = '$obj->gender', about = '$obj->about'
                WHERE id = '$obj->id'; ";

        $result = mysqli_query($this->conn, $sql);

        if($result==TRUE)
        {
            $msg=["Update Successfully!!!"];
        }
        else
        {
            $msg=["Error occurred!!!"];
        }

        return json_encode($msg);
    }

    public function rdata($obj) {
        $sql = "SELECT * FROM candi WHERE id = '$obj';";
        $result=mysqli_query($this->conn, $sql);
        return json_encode(mysqli_fetch_assoc($result));
    }
}
?>