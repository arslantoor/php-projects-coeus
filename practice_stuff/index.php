<!-- multi dimensional array -->
<?php
$cars = array (
  array(
      array("Volvo",22,18)
  ),
  array("BMW",15,13),
  array("Saab",5,2),

);
  
echo $cars[0][0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";

echo "<h1> time convention </h1>";
echo "time".date("Y-m-d h:i:sa");

$d=strtotime("10:30pm April 15 2014");
echo "<br>";
echo "Created date is " . date("Y-m-d h:i:sa", $d);
echo "<br>";
$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa");echo "<br>";
echo readfile('test.txt');
echo "<br>";
$myfile = fopen("test.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("test.txt"));
fclose($myfile);


echo "<br> cookies";
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/phpTraining/php-medium/index.php"); // 86400 = 1 day
?>

<?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
echo "<br> sessiona";
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";
echo "Session variables are set.".$_SESSION["favcolor"];
echo "<br>";
print_r($_SESSION);

echo " filters<br>";
$str = "<h1>Hello World!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING);
echo " filters<br>";

echo $newstr;$str = "<h1>Hello WorldÆØÅ!</h1>";

$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
echo $newstr;

echo "<h1>oop</h1> <br>";

class calaculation{
    public $a,$b,$c;

    function sum(){

        $this->c = $this->a +$this->b;
        return $this->c;
    }

}
$obj = new calaculation();
$obj->b=10;
$obj->a = 20;
echo "sum is".$obj->sum();

echo "<br> static";
class domain {
    protected static function getWebsiteName() {
      return "W3Schools.com";
    }
  }
  
  class domainW3 extends domain {
    public $websiteName;
    public function __construct() {
      $this->websiteName = parent::getWebsiteName();
    }
  }
  
  $domainW3 = new domainW3;
  echo $domainW3 -> websiteName;


  echo "<br> traits";
  trait message1 {
    public function msg1() {
      echo "OOP is fun! ";
    }
  }
  
  trait message2 {
    public function msg2() {
      echo "OOP reduces code duplication!";
    }
  }
  
  class Welcome {
    use message1;
  }
  
  class Welcome2 {
    use message1, message2;
  }
  
  $obj = new Welcome();
  $obj->msg1();
  echo "<br>";
  
  $obj2 = new Welcome2();
  $obj2->msg1();
  $obj2->msg2();

  echo "<br> namespace";

  require 'namespace_test1.php';
  require 'namespace_test2.php';
  $obj1 = new test\product();
  $obj1 = new test2\product();

?>