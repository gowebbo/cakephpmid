<?php
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AgeHelper extends Helper {

function calculateAge($birthdate){
		$birth_date = explode('-',$birthdate);
		$ageTime = mktime(0, 0, 0, $birth_date[1], $birth_date[2], $birth_date[0]); // Get the person's birthday timestamp
		$t = time(); // Store current time for consistency
	    $age = ($ageTime < 0) ? ( $t + ($ageTime * -1) ) : $t - $ageTime;
	    $year = 60 * 60 * 24 * 365;
	    $ageYears = $age / $year;
		return floor($ageYears);
	 }
}
