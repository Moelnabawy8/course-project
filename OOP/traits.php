<?php 
trait media{
public function uploadphotov1(){
    echo "upload photo from media";

}
public function uploadexcelv1(){
    echo "upload excel v1 from media";

}


}
trait media2{
    public function uploadphotov2(){
        echo "upload photo from media2";
    }
    public function uploadexcelv1(){
        echo "upload excel v1 from media2" . "<br>";
    
    }

}
class user{
use media,media2 {
    media::uploadexcelv1 as uploadexcelfrommediatrait;
    media2::uploadexcelv1 insteadof media;
}


}
$newuser=new user;
$newuser->uploadexcelv1();
$newuser->uploadexcelfrommediatrait();


?>