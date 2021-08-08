<?php
require_once(" ../../model/model.php");

function fetchAllProfiles(){
	return showAllProfiles();

}
function fetchProfile($id){
	return showProfile($id);

}
