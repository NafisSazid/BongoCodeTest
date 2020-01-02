 <?php
$data = array(
    "key1" => 1,
    "key2" => array(
        "key3" => 1,
        "key4" => array(
            "key5" => 4
        )
    )
);
function show($array, $count)
{
    foreach ($array as $key => $value) {
        echo "$key $count";
        echo "\n";
        if (is_array($value)) {
            $count = $count + 1;
            show($value, $count);
        }
    }
    ;
}
function printDepth($data)
{
    show($data, 1);
}
echo printDepth($data);
?> 