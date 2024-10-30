<?php

    class Validation {
        public $validations = [];
        public static function validate($rules, $data) {

            $validation = new self;

            foreach ($rules as $field => $ruleFromField) {
                foreach ($ruleFromField as $rule) {
                    $fieldValue = $data[$field];

                    if($rule == 'confirmed'){
                        $validation->$rule($field, $fieldValue, $data["{$field}_confirmacao"]);

                    } else if (str_contains($rule, ':')) {
                        $temp = explode(':', $rule);

                        $rule = $temp[0];
                        $ruleAr = $temp[1];

                        $validation->$rule($ruleAr, $field, $fieldValue);
                    }

                    else {
                        $validation->$rule($field, $fieldValue);
                    }


                }
            }

            return $validation;
        }

        private function unique($table, $field, $data) {
            if(strlen($data) == 0) {
                return;
            }

            $db = new DB(config('database'));

            $result = $db->query(
                query: "select * from $table where $field = :valor",
                params: ['valor' => $data],
            )->fetch();

            if ($result){
                $this->validations [] = "O $field já está sendo usado.";
            }
        }
        private function required($field, $data){

            if (strlen($data) == 0){
                $this->validations[] = "O campo $field é obrigatório.";
            }
        }

        private function email($field, $data){
            if (!filter_var($data, FILTER_VALIDATE_EMAIL)){
                $this->validations [] = "O $field é inválido.";

            }
        }

        private function confirmed($field, $data, $dataDeConfirmacao){

            if( $data != $dataDeConfirmacao ){
                $this->validations [] = "O $field de confirmação está diferente.";
            }
        }

        private function min($min, $field, $data){
            if (strlen($data) < 7){
                $this->validations [] = "A $field deve ter no mínimo $min caracteres";
            }
        }

        private function max($max, $field, $data){
            if (strlen($data) >= 30){
                $this->validations [] = "A $field deve ter no máximo $max caracteres";
            }
        }

        private function strong($field, $data){
            if (!strpbrk($data, '*-%^!@$')){
                $this->validations [] = "A $field precisa ter um caracter especial";
            }
        }

        public function notPassed($customName = null){

            $chave = 'validacoes';

            if ($customName) {
                $chave .= '_' . $customName;
            }

            flash()->push($chave, $this->validations);
            return sizeof($this->validations) > 0;
        }



    }

