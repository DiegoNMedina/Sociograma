<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sociograma extends CI_Controller {

	/*VISTAS */
	public function index()
	{
		
		
		$correct = 'https://diegomedina.ml/';
		redirect($correct, 'refresh');
	}
	/*ALUMNOS */
	public function novenoA() {
		$grupo = 'A';
		$results['querys'] = $this->data->queryStudents($grupo);
		$this->load->view('head');
		$this->load->view('body', $results);
		$this->load->view('footer');
	}

	public function novenoB() {
		$grupo = 'B';
		$results['querys'] = $this->data->queryStudents($grupo);
		$this->load->view('head');
		$this->load->view('body', $results);
		$this->load->view('footer');
	}

	public function novenoC() {
		$grupo = 'C';
		$results['querys'] = $this->data->queryStudents($grupo);
		$this->load->view('head');
		$this->load->view('body', $results);
		$this->load->view('footer');
	}

	public function novenoD() {
		$grupo = 'D';
		$results['querys'] = $this->data->queryStudents($grupo);
		$this->load->view('head');
		$this->load->view('body', $results);
		$this->load->view('footer');
	}

	/* SESION PARA INICIAR TEST */
	public function generateSession() {
		$name = $this->input->post('fullName');
		$dataQuery = $this->data->queryStudentsName($name);
		$sessionUser = array(
			'fullname' => $name,
			'log' => true
		);
		foreach($dataQuery as $key) {
			$grupo = $key['grupo'];
		}
		if($grupo === 'A') {
			$this->session->set_userdata($sessionUser);
			$correct = base_url('/novenoA');
			redirect($correct, 'refresh');
		} else if($grupo === 'B') {
			$this->session->set_userdata($sessionUser);
			$correct = base_url('/novenoB');
			redirect($correct, 'refresh');
		} else if($grupo === 'C') {
			$this->session->set_userdata($sessionUser);
			$correct = base_url('/novenoC');
			redirect($correct, 'refresh');

		} else if($grupo === 'D') {
			$this->session->set_userdata($sessionUser);
			$correct = base_url('/novenoD');
			redirect($correct, 'refresh');
			
		}
	}

	/** CLOSE SESION */
	function closeSession() {
		$this->session->sess_destroy();
		$correct = base_url('/teacherReports');
			redirect($correct, 'refresh');
	}

	function endTest() {
		$name = $this->session->userdata('fullname');
		$dataQuery = $this->data->queryStudentsName($name);
		foreach($dataQuery as $key) {
			$grupo = $key['grupo'];
		}
		if($grupo === 'A') {
			$this->session->sess_destroy();
			$correct = base_url('/novenoA');
			redirect($correct, 'refresh');
		} else if($grupo === 'B') {
			$this->session->sess_destroy();
			$correct = base_url('/novenoB');
			redirect($correct, 'refresh');
		} else if($grupo === 'C') {
			$this->session->sess_destroy();
			$correct = base_url('/novenoC');
			redirect($correct, 'refresh');

		} else if($grupo === 'D') {
			$this->session->sess_destroy();
			$correct = base_url('/novenoD');
			redirect($correct, 'refresh');
		}
	}

	/*PROFESOR */
	public function TeacherReports() {
		/** */
		$group = $this->session->userdata('group');
		$select = $this->input->post('query-question');
		$results['questions'] = $this->data->query('preguntas');
		if($select > 0) {
			$results['qresults'] = $this->data->returnStudentsByGroup($select, $group);
		} 
		$this->load->view('teacher/head');
		$this->load->view('teacher/body', $results);
		$this->load->view('teacher/footer');
	}

	public function generateSessionTeacher() {
		$group = $this->input->post('group');
		$sessionUser = array(
			'group' => $group,
			'log' => true
		);
			$this->session->set_userdata($sessionUser);
			$correct = base_url('/teacherReports');
			redirect($correct, 'refresh');
	}
	
	/* CUESTIONARIOS */
	public function answerEfectiva() {
		$table = 'resultados_a';
		$One = 1;
		$Two = 2;
		$Three = 3;
		/* TEST EFECTIVAS */
		/* QUESTION 1 */
		/* $qOneR1 == idStudent $valueOneR1 = questionValue*/
		$dataOneR1 = array(
			'alumno' => $this->input->post('efectiva-q1-r1'),
			'pregunta' => 1,
			'puntos' => $Three
		);
		$dataOneR2 = array(
			'alumno' => $this->input->post('efectiva-q1-r2'),
			'pregunta' => 1,
			'puntos' => $Two
		);
		$dataOneR3 = array(
			'alumno' =>  $this->input->post('efectiva-q1-r3'),
			'pregunta' => 1,
			'puntos' => $One
		);

		/* QUESTION 2 */
		$dataTwoR1 = array(
			'alumno' => $this->input->post('efectiva-q2-r1'),
			'pregunta' => 2,
			'puntos' => $Three
		);
		$dataTwoR2 = array(
			'alumno' => $this->input->post('efectiva-q2-r2'),
			'pregunta' => 2,
			'puntos' => $Two
		);
		$dataTwoR3 = array(
			'alumno' => $this->input->post('efectiva-q2-r3'),
			'pregunta' => 2,
			'puntos' => $One
		);

		/* QUESTION 3 */
		$dataThreeR1 = array(
			'alumno' => $this->input->post('efectiva-q3-r1'),
			'pregunta' => 3,
			'puntos' => $Three
		);
		$dataThreeR2 = array(
			'alumno' => $this->input->post('efectiva-q3-r2'),
			'pregunta' => 3,
			'puntos' => $Two
		);
		$dataThreeR3 = array(
			'alumno' => $this->input->post('efectiva-q3-r3'),
			'pregunta' => 3,
			'puntos' => $One
		);

		/* QUESTION 4 */
		$dataFourR1 = array(
			'alumno' => $this->input->post('efectiva-q4-r1'),
			'pregunta' => 4,
			'puntos' => $Three
		);
		$dataFourR2 = array(
			'alumno' => $this->input->post('efectiva-q4-r2'),
			'pregunta' => 4,
			'puntos' => $Two
		);
		$dataFourR3 = array(
			'alumno' => $this->input->post('efectiva-q4-r3'),
			'pregunta' => 4,
			'puntos' => $One
		);

		/* QUESTION 5 */
		$dataFiveR1 = array(
			'alumno' => $this->input->post('efectiva-q5-r1'),
			'pregunta' => 5,
			'puntos' => $Three
		);
		$dataFiveR2 = array(
			'alumno' => $this->input->post('efectiva-q5-r2'),
			'pregunta' => 5,
			'puntos' => $Two
		);
		$dataFiveR3 = array(
			'alumno' => $this->input->post('efectiva-q5-r3'),
			'pregunta' => 5,
			'puntos' => $One
		);

		/* QUESTION 6 */
		$dataSixR1 = array(
			'alumno' => $this->input->post('efectiva-q6-r1'),
			'pregunta' => 6,
			'puntos' => $Three
		);
		$dataSixR2 = array(
			'alumno' => $this->input->post('efectiva-q6-r2'),
			'pregunta' => 6,
			'puntos' => $Two
		);
		$dataSixR3 = array(
			'alumno' => $this->input->post('efectiva-q6-r3'),
			'pregunta' => 6,
			'puntos' => $One
		);

		/* QUESTION 7 */
		$dataSevenR1 = array(
			'alumno' => $this->input->post('efectiva-q7-r1'),
			'pregunta' => 7,
			'puntos' => $Three
		);
		$dataSevenR2 = array(
			'alumno' => $this->input->post('efectiva-q7-r2'),
			'pregunta' => 7,
			'puntos' => $Two
		);
		$dataSevenR3 = array(
			'alumno' => $this->input->post('efectiva-q7-r3'),
			'pregunta' => 7,
			'puntos' => $One
		);

		/* QUESTION 8 */
		$dataEightR1 = array(
			'alumno' => $this->input->post('efectiva-q8-r1'),
			'pregunta' => 8,
			'puntos' => $Three
		);
		$dataEightR2 = array(
			'alumno' => $this->input->post('efectiva-q8-r2'),
			'pregunta' => 8,
			'puntos' => $Two
		);
		$dataEightR3 = array(
			'alumno' => $this->input->post('efectiva-q8-r3'),
			'pregunta' => 8,
			'puntos' => $One
		);
		/* QUESTION 9 */
		$dataNineR1 = array(
			'alumno' => $this->input->post('efectiva-q9-r1'),
			'pregunta' => 9,
			'puntos' => $Three
		);
		$dataNineR2 = array(
			'alumno' => $this->input->post('efectiva-q9-r2'),
			'pregunta' => 9,
			'puntos' => $Two
		);
		$dataNineR3 = array(
			'alumno' => $this->input->post('efectiva-q9-r3'),
			'pregunta' => 9,
			'puntos' => $One
		);

		/* QUESTION 10 */
		$dataTenR1 = array(
			'alumno' => $this->input->post('efectiva-q10-r1'),
			'pregunta' => 10,
			'puntos' => $Three
		);
		$dataTenR2 = array(
			'alumno' => $this->input->post('efectiva-q10-r2'),
			'pregunta' => 10,
			'puntos' => $Two
		);
		$dataTenR3 = array(
			'alumno' => $this->input->post('efectiva-q10-r3'),
			'pregunta' => 10,
			'puntos' => $One
		);

		/* AFECTIVAS TEST */
		/* QUESTION 1 */
		$afectivaOneR1 = array(
			'alumno' => $this->input->post('afectiva-q1-r1'),
			'pregunta' => 11,
			'puntos' => $Three
		);
		$afectivaOneR2 = array(
			'alumno' => $this->input->post('afectiva-q1-r2'),
			'pregunta' => 11,
			'puntos' => $Two
		);
		$afectivaOneR3 = array(
			'alumno' =>  $this->input->post('afectiva-q1-r3'),
			'pregunta' => 11,
			'puntos' => $One
		);
	
		/* QUESTION 2 */
		$afectivaTwoR1 = array(
			'alumno' => $this->input->post('afectiva-q2-r1'),
			'pregunta' => 12,
			'puntos' => $Three
		);
		$afectivaTwoR2 = array(
			'alumno' => $this->input->post('afectiva-q2-r2'),
			'pregunta' => 12,
			'puntos' => $Two
		);
		$afectivaTwoR3 = array(
			'alumno' => $this->input->post('afectiva-q2-r3'),
			'pregunta' => 12,
			'puntos' => $One
		);
	
		/* QUESTION 3 */
		$afectivaThreeR1 = array(
			'alumno' => $this->input->post('afectiva-q3-r1'),
			'pregunta' => 13,
			'puntos' => $Three
		);
		$afectivaThreeR2 = array(
			'alumno' => $this->input->post('afectiva-q3-r2'),
			'pregunta' => 13,
			'puntos' => $Two
		);
		$afectivaThreeR3 = array(
			'alumno' => $this->input->post('afectiva-q3-r3'),
			'pregunta' => 13,
			'puntos' => $One
		);
	
		/* QUESTION 4 */
		$afectivaFourR1 = array(
			'alumno' => $this->input->post('afectiva-q4-r1'),
			'pregunta' => 14,
			'puntos' => $Three
		);
		$afectivaFourR2 = array(
			'alumno' => $this->input->post('afectiva-q4-r2'),
			'pregunta' => 14,
			'puntos' => $Two
		);
		$afectivaFourR3 = array(
			'alumno' => $this->input->post('afectiva-q4-r3'),
			'pregunta' => 14,
			'puntos' => $One
		);
	
		/* QUESTION 5 */
		$afectivaFiveR1 = array(
			'alumno' => $this->input->post('afectiva-q5-r1'),
			'pregunta' => 15,
			'puntos' => $Three
		);
		$afectivaFiveR2 = array(
			'alumno' => $this->input->post('afectiva-q5-r2'),
			'pregunta' => 15,
			'puntos' => $Two
		);
		$afectivaFiveR3 = array(
			'alumno' => $this->input->post('afectiva-q5-r3'),
			'pregunta' => 15,
			'puntos' => $One
		);
	
		/* QUESTION 6 */
		$afectivaSixR1 = array(
			'alumno' => $this->input->post('afectiva-q6-r1'),
			'pregunta' => 16,
			'puntos' => $Three
		);
		$afectivaSixR2 = array(
			'alumno' => $this->input->post('afectiva-q6-r2'),
			'pregunta' => 16,
			'puntos' => $Two
		);
		$afectivaSixR3 = array(
			'alumno' => $this->input->post('afectiva-q6-r3'),
			'pregunta' => 16,
			'puntos' => $One
		);
	
		/* QUESTION 7 */
		$afectivaSevenR1 = array(
			'alumno' => $this->input->post('afectiva-q7-r1'),
			'pregunta' => 17,
			'puntos' => $Three
		);
		$afectivaSevenR2 = array(
			'alumno' => $this->input->post('afectiva-q7-r2'),
			'pregunta' => 17,
			'puntos' => $Two
		);
		$afectivaSevenR3 = array(
			'alumno' => $this->input->post('afectiva-q7-r3'),
			'pregunta' => 17,
			'puntos' => $One
		);
	
		/* QUESTION 8 */
		$afectivaEightR1 = array(
			'alumno' => $this->input->post('afectiva-q8-r1'),
			'pregunta' => 18,
			'puntos' => $Three
		);
		$afectivaEightR2 = array(
			'alumno' => $this->input->post('afectiva-q8-r2'),
			'pregunta' => 18,
			'puntos' => $Two
		);
		$afectivaEightR3 = array(
			'alumno' => $this->input->post('afectiva-q8-r3'),
			'pregunta' => 18,
			'puntos' => $One
		);
		/* QUESTION 9 */
		$afectivaNineR1 = array(
			'alumno' => $this->input->post('afectiva-q9-r1'),
			'pregunta' => 19,
			'puntos' => $Three
		);
		$afectivaNineR2 = array(
			'alumno' => $this->input->post('afectiva-q9-r2'),
			'pregunta' => 19,
			'puntos' => $Two
		);
		$afectivaNineR3 = array(
			'alumno' => $this->input->post('afectiva-q9-r3'),
			'pregunta' => 19,
			'puntos' => $One
		);
	
		/* QUESTION 10 */
		$afectivaTenR1 = array(
			'alumno' => $this->input->post('afectiva-q10-r1'),
			'pregunta' => 20,
			'puntos' => $Three
		);
		$afectivaTenR2 = array(
			'alumno' => $this->input->post('afectiva-q10-r2'),
			'pregunta' => 20,
			'puntos' => $Two
		);
		$afectivaTenR3 = array(
			'alumno' => $this->input->post('afectiva-q10-r3'),
			'pregunta' => 20,
			'puntos' => $One
		);

		/* INSERT EFECTIVAS TEST */
		$this->data->insert($table, $dataOneR1);
		$this->data->insert($table, $dataOneR2);
		$this->data->insert($table, $dataOneR3);
		
		$this->data->insert($table, $dataTwoR1);
		$this->data->insert($table, $dataTwoR2);
		$this->data->insert($table, $dataTwoR3);

		$this->data->insert($table, $dataThreeR1);
		$this->data->insert($table, $dataThreeR2);
		$this->data->insert($table, $dataThreeR3);

		$this->data->insert($table, $dataFourR1);
		$this->data->insert($table, $dataFourR2);
		$this->data->insert($table, $dataFourR3);

		$this->data->insert($table, $dataFiveR1);
		$this->data->insert($table, $dataFiveR2);
		$this->data->insert($table, $dataFiveR3);

		$this->data->insert($table, $dataSixR1);
		$this->data->insert($table, $dataSixR2);
		$this->data->insert($table, $dataSixR3);

		$this->data->insert($table, $dataSevenR1);
		$this->data->insert($table, $dataSevenR2);
		$this->data->insert($table, $dataSevenR3);

		$this->data->insert($table, $dataEightR1);
		$this->data->insert($table, $dataEightR2);
		$this->data->insert($table, $dataEightR3);

		$this->data->insert($table, $dataNineR1);
		$this->data->insert($table, $dataNineR2);
		$this->data->insert($table, $dataNineR3);

		$this->data->insert($table, $dataTenR1);
		$this->data->insert($table, $dataTenR2);
		$this->data->insert($table, $dataTenR3);

		/* INSERT AFECTIVAS TEST */
		$this->data->insert($table, $afectivaOneR1);
		$this->data->insert($table, $afectivaOneR2);
		$this->data->insert($table, $afectivaOneR3);
		
		$this->data->insert($table, $afectivaTwoR1);
		$this->data->insert($table, $afectivaTwoR2);
		$this->data->insert($table, $afectivaTwoR3);

		$this->data->insert($table, $afectivaThreeR1);
		$this->data->insert($table, $afectivaThreeR2);
		$this->data->insert($table, $afectivaThreeR3);

		$this->data->insert($table, $afectivaFourR1);
		$this->data->insert($table, $afectivaFourR2);
		$this->data->insert($table, $afectivaFourR3);

		$this->data->insert($table, $afectivaFiveR1);
		$this->data->insert($table, $afectivaFiveR2);
		$this->data->insert($table, $afectivaFiveR3);

		$this->data->insert($table, $afectivaSixR1);
		$this->data->insert($table, $afectivaSixR2);
		$this->data->insert($table, $afectivaSixR3);

		$this->data->insert($table, $afectivaSevenR1);
		$this->data->insert($table, $afectivaSevenR2);
		$this->data->insert($table, $afectivaSevenR3);

		$this->data->insert($table, $afectivaEightR1);
		$this->data->insert($table, $afectivaEightR2);
		$this->data->insert($table, $afectivaEightR3);

		$this->data->insert($table, $afectivaNineR1);
		$this->data->insert($table, $afectivaNineR2);
		$this->data->insert($table, $afectivaNineR3);

		$this->data->insert($table, $afectivaTenR1);
		$this->data->insert($table, $afectivaTenR2);
		$this->data->insert($table, $afectivaTenR3);

		$name = $this->session->userdata('fullname');
		$dataQuery = $this->data->queryStudentsName($name);
		foreach($dataQuery as $key) {
			$grupo = $key['grupo'];
		}
		if($grupo === 'A') {
			echo "<script>alert('Gracias por contestar.');</script>";
			$this->session->sess_destroy();
			$correct = base_url('/novenoA');
			redirect($correct, 'refresh');
		} else if($grupo === 'B') {
			echo "<script>alert('Gracias por contestar.');</script>";
			$this->session->sess_destroy();
			$correct = base_url('/novenoB');
			redirect($correct, 'refresh');
		} else if($grupo === 'C') {
			echo "<script>alert('Gracias por contestar.');</script>";
			$this->session->sess_destroy();
			$correct = base_url('/novenoC');
			redirect($correct, 'refresh');

		} else if($grupo === 'D') {
			echo "<script>alert('Gracias por contestar.');</script>";
			$this->session->sess_destroy();
			$correct = base_url('/novenoD');
			redirect($correct, 'refresh');
			echo "<script>alert('Gracias por contestar.');</script>";
		}
	}

	/** AGREGAR ESTUDIANTE */
	public function addStudent(){
		$table = 'alumnos';
        $student = array(
            "nombre" => $this->input->post('studentName')
        );
        $this->data->insert($table, $student);
        $correct = base_url('/');
		redirect($correct, 'refresh');
	}
}