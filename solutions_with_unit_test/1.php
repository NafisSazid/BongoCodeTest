<?php
function show($array, $count)
{
    foreach ($array as $key => $value) {
        echo "$key $count\n";
        if (is_array($value)) {
            $count = $count + 1;
            show($value, $count);
        }
    }
}
function printDepth($data)
{
  show($data, 1);
}
class PrintDepthTest extends \PHPUnit_Framework_TestCase {
	public function testprintDepth()
	{
	    $expected = "key1 1\nkey2 1\nkey3 2\n";
	    $a = array("key1" => 1,"key2" => array("key3" => 1));
            printDepth($a);
	    $this->expectOutputString($expected);
	}
}
?> 