<?php
function show($array, $count, $flag)
{
    foreach ($array as $key => $value) {
        echo strtolower($key);
        if ($flag == 1 || is_object($value)){
            echo ":";
        }
        echo " $count \n";
        if (is_array($value)) {
            $count = $count + 1;
            $flag = 0;
            show($value, $count, $flag);
        }
        if (is_object($value)) {
            $count = $count + 1;
            $flag = 1;
            show($value, $count, $flag);
        }
    }
}
function printDepth($data)
{
  if(is_array($data))
    show($data, 1, 0);
  else if(is_object($data))
    show($data, 1, 1);
}
class Person {
  public function __construct($first_name, $last_name, $father) {
  $this->first_name = $first_name;
  $this->last_name = $last_name;
  $this->father = $father;
  }
}
$person_a = new Person(“User”, “1”, NULL);
$person_b = new Person(“User”, “2”, $person_a);
class PrintDepthTest extends \PHPUnit_Framework_TestCase {
  public function testprintDepth()
  {
	$expected = "key1 1\nkey2 1\nkey3 2\nuser: 2\nfirst_name: 3\nlast_name: 3\nfather: 3\nfirst_name: 4\nlast_name: 4\nfather: 4\n";
	$a = array("key1" => 1,"key2" => array("key3" => 1,“User” => $person_b));
        printDepth($a);
	$this->expectOutputString($expected);
  }
}
?>