<?php
function depth($node)
{
    $d = -1;
    while ($node != NULL) {
        $d    = $d + 1;
        $node = $node->parent;
    }
    return $d;
}
function lca($node1, $node2)
{
    $d1   = depth($node1);
    $d2   = depth($node2);
    $diff = $d1 - $d2;
    if ($diff < 0) {
        $temp  = $node1;
        $node1 = $node2;
        $node2 = $temp;
        $diff  = -$diff;
    }
    while ($diff != 0) {
        $node1 = $node1->parent;
        $diff  = $diff - 1;
    }
    while ($node1 != NULL && $node2 != NULL) {
        if ($node1 == $node2) {
            return $node1->value;
        }
        $node1 = $node1->parent;
        $node2 = $node2->parent;
    }
    return NULL;
}
class Node{
  public function __construct($value, $parent) {
  $this->value = $value;
  $this->parent = $parent;
  }
}
$node_a = new Node(1, NULL);
$node_b = new Node(2, $node_a);
$node_c = new Node(3, $node_a);
$node_d = new Node(4, $node_b);
class LCATest extends \PHPUnit_Framework_TestCase {
  public function testLCA()
  {
     $expected = 2;
     $output = lca($node_b, $node_d);	
     $this->assertEquals($output, $expected);
  }
}
?>

Runtime and Memory Requirements:
Time Complexity is O(h) where O(h) is the height of the tree.
To calculate the depth of each node from root at most h traversals will occur and then again to finally find the lca another atmost h
traversals will occur. So, in total at most 3h traversals occur. So, time complexity is O(h).
Memory Complexity is O(1) because no extra memory space is needed.

