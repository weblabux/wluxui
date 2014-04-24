<?php

/**
 * Modified by Mark Stamnes Winter 2014. COnstructor is a closer match to the graphic
 * layout page design (see photoshop page layout designs)
 */
class Study {
	
	public function __construct(
	$status = null, 
	$name = null, 
	$researcherEmail = null, 
	$description = null,
	$dateCreated = null,
	$dateModified = null) {
		$this -> setStatus($status);
		$this -> setName($name);
		$this -> setResearcherEmail($researcherEmail);
		$this -> setDescription($description);	
		$this -> setDateCreated($dateCreated);	
		$this -> setDateModified($dateModified);
	}
	public function getDateModified() {
		return $this -> dateModified;
	}

	public function setDateModified($dateModified) {
		$this -> dateModified = $dateModified;
	}
		
	public function getDateCreated() {
		return $this -> dateCreated;
	}

	public function setDateCreated($dateCreated) {
		$this -> dateCreated = $dateCreated;
	}

	public function getDescription() {
		return $this -> Description;
	}

	public function setDescription($description) {
		$this -> description = $description;
	}

	public function getStatus() {
		return $this -> status;
	}

	public function setStatus($status) {
		$this -> status = $status;
	}

	public function getName() {
		return $this -> name;
	}

	public function setName($name) {
		$this -> name = $name;
	}

	public function getResearcherEmail() {
		return $this -> researcherEmail;
	}

	public function setResearcherEmail($researcherEmail) {
		$this -> researcherEmail = $researcherEmail;
	}
}
?>