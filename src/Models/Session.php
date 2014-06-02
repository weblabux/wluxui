<?php

/**
*Session class creates a session object
 */
class Session {
	
	public function __construct(
	$studyId = null, 
	$sessionName = null, 
	$sessionStartDateTime = null, 
	$sessionEndDateTime = null, 
	$active = null,
	$completed = null,
	$aborted = null) {
		$this -> setStudyId($studyId);
		$this -> setSessionName($sessionName);
		$this -> setSessionStartDateTime($sessionStartDateTime);
		$this -> setSessionEndDateTime($sessionEndDateTime);
		$this -> setActive($active);	
		$this -> setCompleted($completed);	
		$this -> setAborted($aborted);
	}
	
	public function setStudyId($studyId) {
		$this -> studyId = $studyId;
	}
	
	public function getStudyId() {
		return $this -> studyId;
	}

	public function setSessionName($sessionName) {
		$this -> sessionName = $sessionName;
	}
	
	public function getSessionName() {
		return $this -> sessionName;
	}

	public function setSessionStartDateTime($sessionStartDateTime) {
		$this -> sessionStartDateTime = $sessionStartDateTime;
	}

	public function getSessionStartDateTime() {
		return $this -> sessionStartDateTime;
	}

	public function setSessionEndDateTime($sessionEndDateTime) {
		$this -> sessionEndDateTime = $sessionEndDateTime;
	}
		
	public function getSessionEndDateTime() {
		return $this -> sessionEndDateTime;
	}

	public function setActive($active) {
		$this -> active = $active;
	}

	public function getActive() {
		return $this -> active;
	}

	public function setCompleted($completed) {
		$this -> completed = $completed;
	}

	public function getCompleted() {
		return $this -> completed;
	}

	public function setAborted($aborted) {
		$this -> aborted = $aborted;
	}

	public function getAborted() {
		return $this -> aborted;
	}
}
?>
