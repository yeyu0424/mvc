<?php
//封装PDO
class Model
{
    public $tableName = null;
    public $pdo = null;
    public $pk = "id";
    public $fields = array();

    public function __construct($tableName)
    {
        $this->tableName = $tableName;
        $this->pdo = new PDO(DSN,USER,PASS);
        $this->loadFields();
    }

    private function loadFields()
    {
        $sql = "desc {$this->tableName}";
        $list = $this->pdo->query($sql);
        foreach($list as $vo){
            $this->fields[] = $vo['Field'];
            if($vo['Key']=="PRI"){
                $this->pk = $vo['Field'];
            }
        }
    }

    public function query($sql)
    {
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select()
    {
        $sql = "select * from {$this->tableName}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $sql = "select * from {$this->tableName} where {$this->pk}={$id}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function del($id)
    {
        $sql = "delete from {$this->tableName} where {$this->pk}={$id}";
        return $this->pdo->exec($sql);
    }

    public function insert($data=array())
    {
        if(empty($data)){
            $data = $_POST;
        }
        $fieldlist = array();
        $valuelist = array();
        foreach($data as $k=>$v){
            if(in_array($k,$this->fields)){
                $fieldlist[] = $k;
                $valuelist[] = "'".$v."'";
            }
        }
        $sql ="insert into {$this->tableName}(".implode(",",$fieldlist).") values(".implode(",",$valuelist).")";
        return $this->pdo->exec($sql);
    }

    public function update($data=array())
    {
        if(empty($data)){
            $data = $_POST;
        }
        $fieldlist = array();
        foreach($data as $k=>$v){
            if(in_array($k,$this->fields) && $k!=$this->pk){
                $fieldlist[]= "{$k}='{$v}'";
            }
        }
        $sql = "update {$this->tableName} set ".implode(",",$fieldlist)." where {$this->pk}={$data[$this->pk]}";
        return $this->pdo->exec($sql);
    }
}