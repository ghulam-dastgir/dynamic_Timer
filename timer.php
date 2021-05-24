<?php
session_start();
include("config.php");
$current_date = date("Y-m-d");
// Query To Get Agent Data(Attendence)
$getAgentData = "SELECT * FROM agent_attendence WHERE date = '$current_date' AND agent_id = {$_SESSION['agent_id']}";
$seconds = date("s");
$agentRes = $conn->query($getAgentData) or die("Query Failed");
if($agentRes->num_rows > 0){
	$row = $agentRes->fetch_assoc();
	$hours = $row['time_in_hr'];
	$minutes = $row['time_in_min'];
	if($seconds > 58){
	// Query To Upate Agent Time(Add) 
	$updateMint = "UPDATE agent_attendence SET time_in_min = time_in_min + 1 WHERE agent_id = {$_SESSION['agent_id']} AND date = '$current_date'";
	$updateMintRes = $conn->query($updateMint) or die("Query Failed");
	}
	if($minutes >= 60){
		$minutes = 0;
		// Query To Upate Agent Hours and minutes 
		$updateHour = "UPDATE agent_attendence SET time_in_hr = time_in_hr + 1, time_in_min = $minutes WHERE agent_id = {$_SESSION['agent_id']} AND date = '$current_date'";
		$updateHourRes = $conn->query($updateHour) or die("Query Failed");
	}
	echo $hours . " : " . $minutes . " : " . $seconds;
}else{
	$insert = "INSERT INTO agent_attendence(agent_id,date,time_in_hr,time_in_min) VALUES({$_SESSION['agent_id']},'$current_date',0,0)";
	$insert_res = $conn->query($insert);
}
?>
