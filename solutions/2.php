<?php
class Person
{
    public function __construct($first_name, $last_name, $father)
    {
        $this->first_name = $first_name;
        $this->last_name  = $last_name;
        $this->father     = $father;
    }
}
$person_a = new Person('User', '1', NULL);
$person_b = new Person('User', '2', $person_a);
$age      = array(
    "key1" => 1,
    "key2" => array(
        "key3" => 1,
        "key4" => array(
            "key5" => 4,
            "User" => $person_b
        )
    )
);
function show($array, $count)
{
    foreach ($array as $key => $value) {
        echo "$key $count \n";
        if (is_array($value) || is_object($value)) {
            $count = $count + 1;
            show($value, $count);
        }
    }
    ;
}
function printDepth($age)
{
    show($age, 1);
}
echo printDepth($age);
?>