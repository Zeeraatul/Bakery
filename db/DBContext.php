<?php


namespace MyApp {
    class DBContext
    {
        protected $tableName = null;

        public function __construct($table)
        {
            if ($this->isTableExists($table)) {
                $this->tableName = $table;
            } else throw new \Exception("Error table selected");
        }

        private function isTableExists($table)
        {
            $result = $this->executeQuery("SHOW TABLES");
            foreach ($result as $key => $value) {
                if (strcasecmp($table, $value["Tables_in_" . DB_NAME]) == 0) {
                    return true;
                }
            }
            return false;
        }

        protected function executeQuery($query, $mode = "SELECT")
        {
            $conn = DBConnector::openConnection();
            $result = mysqli_query($conn, $query);

            switch ($mode) {
                case "SELECT":
                {
                    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    break;
                }
                default:
                {
                    $result = mysqli_affected_rows($conn);
                }
            }
            DBConnector::closeConnection();
            return $result;                 // [] - number affected rows
        }

        public function getOneRow($Id)
        {
            $res = $this->executeQuery("SELECT * FROM $this->tableName WHERE Id = $Id");
            return count($res) == 1 ? $res[0] : null;
        }

        public function getId($filter = [])
        {
            if (count($filter) > 0) {
                $query = "SELECT Id FROM $this->tableName WHERE ";
                foreach ($filter as $key => $value) {
                    if ($value == null) {
                        $query .= "$key IS NULL AND ";
                    } else {
                        $query .= "$key = '$value' AND ";
                    }
                }
                $query = mb_substr($query, 0, mb_strlen($query) - 4);
                $Id = $this->executeQuery($query);
                if (count($Id) == 1) {
                    return $Id[0]['Id'];
                } else {
                    return null;
                }
            } else throw  new \Exception("filter is Empty");
        }

        public function getManyRows($filter = [], $orderName = "Id", $orderMode = "ASC", $offset = 0, $rowsCount = 100)
        {
            $query = "SELECT * FROM $this->tableName ";
            if (count($filter) > 0) {
                $query .= " WHERE ";
                foreach ($filter as $key => $value) {
                    if ($value == null) {
                        $query .= "$key IS NULL AND ";
                    } else {
                        $query .= "$key = '$value' AND ";
                    }
                }
                $query = mb_substr($query, 0, mb_strlen($query) - 4);
            }
            $query .= " ORDER BY $orderName $orderMode LIMIT $offset, $rowsCount";
            return $this->executeQuery($query);
        }

        public function addOneRow($data = [])
        {
            if (count($data) > 0) {
                $query = "INSERT INTO $this->tableName (";
                $values = "";
                foreach ($data as $key => $value) {
                    $query .= "$key, ";
                    if($value == null){
                        $values .= "NULL, ";
                    } else {
                        $values .= "'$value', ";
                    }
                }
                $query = mb_substr($query, 0, mb_strlen($query) - 2);
                $query .= ") VALUES (";
                $values = mb_substr($values, 0, mb_strlen($values) - 2);
                $query .= $values . ")";
                return $this->executeQuery($query, "INSERT");
            } else throw  new \Exception("new data is Empty");
        }

        public function updateOneRow($Id, $data = [])
        {
            if (count($data) > 0) {
                $query = "UPDATE $this->tableName SET ";
                foreach ($data as $key => $value) {
                    if($value == null){
                        $query .= "`$key` = NULL, ";
                    } else {
                        $query .= "`$key` = '$value', ";
                    }
                }
                $query = mb_substr($query, 0, mb_strlen($query) - 2);
                $query .= " WHERE Id = $Id";
                return $this->executeQuery($query, "UPDATE");
            } else throw  new \Exception("new data is Empty");
        }

        public function deleteOneRow($Id)
        {
            return $this->executeQuery("DELETE FROM $this->tableName WHERE Id = $Id", "DELETE");
        }

        public function deleteManyRows($filter = [])
        {
            if (count($filter) > 0) {
                $query = "DELETE FROM $this->tableName WHERE ";
                foreach ($filter as $key => $value) {
                    if ($value == null) {
                        $query .= "$key IS NULL AND ";
                    } else {
                        $query .= "$key = '$value' AND ";
                    }
                }
                $query = mb_substr($query, 0, mb_strlen($query) - 4);
                return $this->executeQuery($query, "DELETE");
            } else throw  new \Exception("filter is Empty");
        }
    }
}