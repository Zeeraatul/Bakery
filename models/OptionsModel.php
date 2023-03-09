<?php


namespace MyApp {
    class OptionsModel extends DBContext
    {
        public function __construct()
        {
            parent::__construct("options");         //вызов конструктора базового класса
        }

        public function getAllOptions()
        {
            return $this->getManyRows();
        }

        public function getOption($optName)
        {
            $result = $this->getManyRows(['option_name' => $optName], "Id", "ASC", 0, 1);
            if (count($result) == 1) {
                return $result[0];
            }
            return null;
        }

        public function createOption($optionName, $optionValue, $optionGroup = NULL)
        {
            return $this->addOneRow([
                    'option_name' => $optionName,
                    'option_value' => $optionValue,
                    'option_group' => $optionGroup
                ]) == 1;
        }

        public function updateOption($id, $name, $value, $group)
        {
            return $this->updateOneRow($id, [
                'name' => $name,
                'value' => $value,
                'group' => $group
            ]) == 1;
        }
        public function removeOption($optionId) {
            return $this->executeQuery("DELETE FROM `". $this->tableName."` WHERE options.id = $optionId AND options.isSystem = 0", "DELETE") == 1;
        }
    }
}