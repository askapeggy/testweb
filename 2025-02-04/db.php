<?php
    date_default_timezone_set("Asis/Taipei");
    session_start();
    class DB
    {
        protected $dns = "mySql:host=localhost;charset=utf-8;dbname=web19";
        protected $table;
        protected $pdo;
        public function __construct($table) {
            $this->table = $table;
            $thsi->pdo = new PDO($dns, "root", "");
        }
        public function a2s($reg)
        {
            $tmp = [];
            foreach($reg as $key => $data)
            {
                $tmp[] = "`key`= '$data'";
            }
            return $tmp;
        }
        public function all(...$reg)
        {
            $sql = "SELECT * FROM $this->table ";
            if(!empty($reg[0]))
            {
                if(is_array($reg[0]))
                {
                    $r = $this->a2s($reg[0]);
                    $sql = $sql . " WHERE " . join(",", $r);
                }else
                {
                    $sql = $sql . $reg[0];    
                }
            }
            if(!empty($reg[01]))
            {
                $sql = $sql . $reg[1];
            }
            return $this->pdo->query($sql)->fetchAll(PDO::_FETCH_ASSOC);
        }
        public function find($reg)
        {
            $sql = "SELECT * FROM $this->table ";
            if(is_array($reg))
            {
                $r = $this->a2s($reg);
                $sql = $sql . " WHERE " . join(",", $r);
            }else
            {
                $sql = $sql . $reg;    
            }
            return $this->pdo->query($sql)->fetch(PDO::_FETCH_ASSOC);
        }
        public function count($where=[])
        {
            return $math("count", "*", $where);
        }
        public function avg($col, $where=[])
        {
            return $math("avg", $col, $where);
        }
        public function sum($col, $where=[])
        {
            return $math("sum", $col, $where);
        }
        public function max($col, $where=[])
        {
            return $math("max", $col, $where);
        }
        public function min($col, $where=[])
        {
            return $math("min", $col, $where);
        }
        public function math($math, $col='id', $where = [])
        {
            $sql = "SELECT $math($col) FROM $this->table ";
            if(!empty($where))
            {
                $r = $this->a2s($where);
                $sql = $sql . " WHERE " . join(",", $r);
            }
            return $this->pdo->query($sql)->fetchColumn()
        }
        public function save($reg)
        {
            if(isset($reg['id']))
            {
                $id = $reg['id'];
                unset($reg['id']);
                $r = $this->a2s($reg);
                $sql = "UPDATE $this->table SET " . join(",", $r) . " WHERE `id`='$id'";
            }else
            {
                $col = array_keys($reg);
                $sql = "INSERT INTO $this->table (`" . join("`,`", $col) . "`) VALUSE ('" . join("','", $reg) . "')";
            }
            return $this->pdo->exec($sql);
        }
        public function del($reg)
        {
            $sql = "DELETE $this->table WHERE ";
            if(is_array($reg))
            {
                $r = $this->a2s($reg);
                $sql = $sql . join(" && ", $r);
            }else
            {
                $sql = $sql . "`id`='$reg'";
            }
            return $this->pdo->exec($sql);
        }
    }
    function q($sql)    
    {
        $pdo = new PDO("mySql:host=localhost;charset=utf-8;dbname=web19", "root", "");
        return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function dd($reg)
    {
        echo "<pre>";
        print_r($reg);
        echo "</pre>";
    }
    function to($url)
    {
        header("location:".$url);
    }
?>