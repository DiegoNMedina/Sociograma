<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    class Data extends CI_Model {
        public function __construct(){
            parent::__construct();
        }
        function query($table){
            $query = $this->db->get($table);
            return $query->result_array();
        }
        function insert($table, $data){
            $this->db->insert($table, $data);
        }
        function count($table){
            $query = $this->db->get($table);
            return $query->num_rows();
        }

        /** RETURN STUDENTS */
        function queryStudents($param) {
            $query = "SELECT * FROM alumnos WHERE grupo = '$param'";
            $result = $this->db->query(($query));
            return $result->result_array();
        }

        function queryStudentsName($param) {
            $query = "SELECT * FROM alumnos WHERE nombre = '$param'";
            $result = $this->db->query(($query));
            return $result->result_array();
        }

        /** REPORTS  */
        
        public function reportTeacher($asd) {
            $query = "SELECT alumnos.nombre, preguntas.pregunta, preguntas.tipo, puntos FROM resultados_a 
            INNER JOIN alumnos ON resultados_a.id = alumnos.id 
            INNER JOIN preguntas ON resultados_a.pregunta = preguntas.id 
            WHERE resultados_a.pregunta = 1";
            $result = $this->db->query($query); 
            return $result->result_array();
        }
        public function searchQuestion($where) {
            $query = "SELECT alumnos.nombre, preguntas.pregunta, puntos 
            FROM resultados_a 
            INNER JOIN alumnos ON resultados_a.alumno = alumnos.id 
            INNER JOIN preguntas ON resultados_a.pregunta = preguntas.id
            WHERE resultados_a.pregunta = $where 
            ORDER BY alumnos.nombre ASC";
            $result = $this->db->query($query); 
            return  json_encode($result->result_array());
        }

    }