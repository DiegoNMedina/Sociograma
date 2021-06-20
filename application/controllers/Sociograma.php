<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sociograma extends CI_Controller {

	/*VISTAS */
	public function index()
	{
		$table = 'Alumnos';
		$results['querys'] = $this->data->query($table);
		$this->load->view('head');
		$this->load->view('body', $results);
		$this->load->view('footer');
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
		}
	}

	/** CLOSE SESION */
	function closeSession() {
		$this->session->session_unset();
		$this->session->sess_destroy();
	}

	function dominio() {
		
		$url= $_SERVER["REQUEST_URI"];
		if($url == '/utp/novenoA') {
			$correct = base_url('/novenoA');
			redirect($correct, 'refresh');

		} else if($url = '/utp/novenoB'){
			$correct = base_url('/novenoB');
			redirect($correct, 'refresh');
		}
		echo $url;
		echo "<br>";
	}

	/*PROFESOR */
	public function TeacherReports() {
		/** */
		$select = $this->input->post('query-question');
		$results['questions'] = $this->data->query('preguntas');
		if($select > 0) {
			$results['qresults'] = $this->data->searchQuestion($select);

		} 
		/**/ 
		$this->load->view('teacher/head');
		$this->load->view('teacher/body', $results);
		$this->load->view('teacher/footer');
	}
	
	public function queryQuestion() {
		$select = $this->input->post('query-question');
		$results['questions'] = $this->data->query('preguntas'); 
		$results['qresults'] = $this->data->searchQuestion($select);
		$this->load->view('teacher/head');
		$this->load->view('teacher/body', $results);
		$this->load->view('teacher/footer');
		/* $results['qresults'] = $this->data->searchQuestion($select); */
		
	}

	
	/* CUESTIONARIOS */
	public function answerEfectiva() {
		$table = 'resultados_a';
		$One = 1;
		$Two = 2;
		$Three = 3;
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

		/* $sessionUser = array(
			'efectiva' => true
		);
		$this->session->set_userdata($sessionUser); */
	}

	public function answerAfectiva() {
		$table = 'resultados_a';
		$One = 1;
		$Two = 2;
		$Three = 3;
		/* QUESTION 1 */
		/* $qOneR1 == idStudent $valueOneR1 = questionValue*/
		$dataOneR1 = array(
			'alumno' => $this->input->post('afectiva-q1-r1'),
			'pregunta' => 1,
			'puntos' => $Three
		);
		$dataOneR2 = array(
			'alumno' => $this->input->post('afectiva-q1-r2'),
			'pregunta' => 1,
			'puntos' => $Two
		);
		$dataOneR3 = array(
			'alumno' =>  $this->input->post('afectiva-q1-r3'),
			'pregunta' => 1,
			'puntos' => $One
		);

		/* QUESTION 2 */
		$dataTwoR1 = array(
			'alumno' => $this->input->post('afectiva-q2-r1'),
			'pregunta' => 2,
			'puntos' => $Three
		);
		$dataTwoR2 = array(
			'alumno' => $this->input->post('afectiva-q2-r2'),
			'pregunta' => 2,
			'puntos' => $Two
		);
		$dataTwoR3 = array(
			'alumno' => $this->input->post('afectiva-q2-r3'),
			'pregunta' => 2,
			'puntos' => $One
		);

		/* QUESTION 3 */
		$dataThreeR1 = array(
			'alumno' => $this->input->post('afectiva-q3-r1'),
			'pregunta' => 3,
			'puntos' => $Three
		);
		$dataThreeR2 = array(
			'alumno' => $this->input->post('afectiva-q3-r2'),
			'pregunta' => 3,
			'puntos' => $Two
		);
		$dataThreeR3 = array(
			'alumno' => $this->input->post('afectiva-q3-r3'),
			'pregunta' => 3,
			'puntos' => $One
		);

		/* QUESTION 4 */
		$dataFourR1 = array(
			'alumno' => $this->input->post('afectiva-q4-r1'),
			'pregunta' => 4,
			'puntos' => $Three
		);
		$dataFourR2 = array(
			'alumno' => $this->input->post('afectiva-q4-r2'),
			'pregunta' => 4,
			'puntos' => $Two
		);
		$dataFourR3 = array(
			'alumno' => $this->input->post('afectiva-q4-r3'),
			'pregunta' => 4,
			'puntos' => $One
		);

		/* QUESTION 5 */
		$dataFiveR1 = array(
			'alumno' => $this->input->post('afectiva-q5-r1'),
			'pregunta' => 5,
			'puntos' => $Three
		);
		$dataFiveR2 = array(
			'alumno' => $this->input->post('afectiva-q5-r2'),
			'pregunta' => 5,
			'puntos' => $Two
		);
		$dataFiveR3 = array(
			'alumno' => $this->input->post('afectiva-q5-r3'),
			'pregunta' => 5,
			'puntos' => $One
		);

		/* QUESTION 6 */
		$dataSixR1 = array(
			'alumno' => $this->input->post('afectiva-q6-r1'),
			'pregunta' => 6,
			'puntos' => $Three
		);
		$dataSixR2 = array(
			'alumno' => $this->input->post('afectiva-q6-r2'),
			'pregunta' => 6,
			'puntos' => $Two
		);
		$dataSixR3 = array(
			'alumno' => $this->input->post('afectiva-q6-r3'),
			'pregunta' => 6,
			'puntos' => $One
		);

		/* QUESTION 7 */
		$dataSevenR1 = array(
			'alumno' => $this->input->post('afectiva-q7-r1'),
			'pregunta' => 7,
			'puntos' => $Three
		);
		$dataSevenR2 = array(
			'alumno' => $this->input->post('afectiva-q7-r2'),
			'pregunta' => 7,
			'puntos' => $Two
		);
		$dataSevenR3 = array(
			'alumno' => $this->input->post('afectiva-q7-r3'),
			'pregunta' => 7,
			'puntos' => $One
		);

		/* QUESTION 8 */
		$dataEightR1 = array(
			'alumno' => $this->input->post('afectiva-q8-r1'),
			'pregunta' => 8,
			'puntos' => $Three
		);
		$dataEightR2 = array(
			'alumno' => $this->input->post('afectiva-q8-r2'),
			'pregunta' => 8,
			'puntos' => $Two
		);
		$dataEightR3 = array(
			'alumno' => $this->input->post('afectiva-q8-r3'),
			'pregunta' => 8,
			'puntos' => $One
		);
		/* QUESTION 9 */
		$dataNineR1 = array(
			'alumno' => $this->input->post('afectiva-q9-r1'),
			'pregunta' => 9,
			'puntos' => $Three
		);
		$dataNineR2 = array(
			'alumno' => $this->input->post('afectiva-q9-r2'),
			'pregunta' => 9,
			'puntos' => $Two
		);
		$dataNineR3 = array(
			'alumno' => $this->input->post('afectiva-q9-r3'),
			'pregunta' => 9,
			'puntos' => $One
		);

		/* QUESTION 10 */
		$dataTenR1 = array(
			'alumno' => $this->input->post('afectiva-q10-r1'),
			'pregunta' => 10,
			'puntos' => $Three
		);
		$dataTenR2 = array(
			'alumno' => $this->input->post('afectiva-q10-r2'),
			'pregunta' => 10,
			'puntos' => $Two
		);
		$dataTenR3 = array(
			'alumno' => $this->input->post('afectiva-q10-r3'),
			'pregunta' => 10,
			'puntos' => $One
		);

		$sessionUser = array(
			'afectiva' => true
		);
		$this->session->set_userdata($sessionUser);
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
