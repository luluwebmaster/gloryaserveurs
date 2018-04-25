<?php

/**
 * Class for check if user has vote
 */
class GLoryaVote {

	// Class vars
	public $_url = NULL,
			 $_key = NULL,
			 $_id = NULL,
			 $_ip = NULL;

	// Method for call API
	private function call() {

		// Check vars values
		if($this->_url !== NULL && $this->_key !== NULL && $this->_id !== NULL && $this->_ip !== NULL) {

			// Call en return API response
			return json_decode(file_get_contents($this->_url."?key=".$this->_key."&id=".$this->_id."&ip=".$this->_ip), true);
		} else {

			// Return success status
			return false;
		}
	}

	// Method for check if use have vote
	public function hasVote() {

		// Call API
		$status = $this->call();

		// If success vote
		if($status && $status['success'] == true) {

			// Return vote true
			return true;
		} else {

			// Return vote false
			return false;
		}
	}
}

/**
 * Use class
 */
$canVote = new GloryaVote;
$canVote->_url = "https://www.gloryaserveurs.com/publics/ajax/votes/has-vote.json";
$canVote->_key = "{api-key}";
$canVote->_id = "{server-id}";
$canVote->_ip = "{client-ip}";

// Check if user has vote
if($canVote->hasVote()) {

	// Execute next code ...
	echo("Le client a voté.");
} else {

	// Execute next code ...
	echo("Le client n'a pas voté.");
}
?>
