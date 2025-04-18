class Node{

public $data;

public $frequency;

public $next;

function __construct($data, $next = null, $frequency = 1){

$this->data = $data; //英文字符串

$this->next = $next; //指向后继结点的指针

$this->frequency=$frequency; //英文字符串出现的次数

}

}

class LinkedList{

private $head; //单链表的头结点，不存储数据

function __construct(){//单链表的构造方法

//头结点的数据为"傀儡", 不代表 任何数据

$this->head = new Node("dummy 傀儡");

$this->first = null;

}

function isEmpty(){

return ($this->head->next == null);

}

/* orderInsert($data) 方法，

* 按给定字符串 $data 的大小, 将其安插到适当的位置，

* 以保证单链表中字符串的存储，始终是有序的。

*/

function orderInsert($data){

$p = new Node($data);

if($this->isEmpty()){

$this->head->next = $p;

}

else {

$node= $this->find($data);

if(!$node){

$q = $this->head;

while($q->next != NULL && strcmp($data, $q->next->data)> 0 ){

$q = $q->next;

}

$p->next = $q->next;

$q->next = $p;

}else

$node->frequency++;

}

}

function insertLast($data){//将字符串插到单链表的尾部

$p = new Node($data);

if($this->isEmpty()){

$this->head->next = $p;

}

else{

$q = $this->head->next;

while($q->next != NULL)

$q = $q->next;

$q->next = $p;

}

}

function find($value){//查询是否有给定的字符串

$q = $this->head->next;

while($q->next != null){

if(strcmp($q->data,$value)==0){

break;

}

$q = $q->next;

}

if ($q->data == $value)

return $q;

else

return null;

}

function traversal(){//遍历单链表

if(!$this->isEmpty()){

$p=$this->head->next;

echo "输出结果：

echo "

".$p->data."
出现次数：".$p->frequency."";
$n=1;

while($p->next != null){

$p=$p->next;

echo "

".$p->data."
出现次数：".$p->frequency."";
$n++;

if ($n%11==0) echo "

";
}

echo "

";
}else

echo "链表为空！";

}

function words_count(){

if($this->isEmpty())

echo "
没有储存字符串
";

else{

$counter=0;

$p=$this->head->next;

while($p->next != null){

$p=$p->next;

$counter++;

};
echo "***共有单词 ".$counter." 个***";
}
}}

?>