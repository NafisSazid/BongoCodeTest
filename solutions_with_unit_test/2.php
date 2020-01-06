<?php
function show($array, $count)
{
    foreach ($array as $key => $value) {
        echo "$key $count \n";
        if (is_array($value) || is_object($value)) {
            $count = $count + 1;
            show($value, $count);
        }
    }
}
function printDepth($age)
{
  show($age, 1);
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
	$expected = "key1 1\nkey2 1\nkey3 2\nUser 2\nfirst_name 3\nlast_name 3\nfather 3\nfirst_name 4\nlast_name 4\nfather 4\n";
	$a = array("key1" => 1,"key2" => array("key3" => 1,“User” => $person_b));
        printDepth($a);
	$this->expectOutputString($expected);
  }
}
?>