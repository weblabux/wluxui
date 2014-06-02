		

$j = jQuery.noConflict();
var host = window.location.host;
var LOCAL = (host.indexOf("localhost") != -1) ||
            (host.indexOf("127.0.0.1") != -1);

var sessionURL = "http://wlux.uw.edu/data/session.php";

var taskURL = "http://wlux.uw.edu/data/task.php";

if (LOCAL) {
    sessionURL = "/data/session.php";
}

/***************************************************************
 *                   Function Definitions                      *
 **************************************************************/

			function getSession () {
				// get session info
				$j.ajaxSetup({async: false}); //
				 // if undefined, use ""
				if (1234 > 0) {
					var postResult = $j.post (sessionURL, {"start": {"studyId" : 1234}},"json");
					
					postResult.done (function (response) {
							if (response.data !== undefined) {
								// alert("Going to: " + nextPage);
								$j("#sessionField").attr("value", response.data.sessionId.toString());
								$j("#continueBtn").attr("disabled",false);
							} else {
								$j("#textDiv").html("Study 1234 could not be found.Try again with another study ID.");
							}
						});			
				} else {
					$j("#textDiv").html("<p>No study was specified</p>");
				}
			}
			
			function finishSession () {
				// get session info
				$j.ajaxSetup({async: false});
				 // if undefined, use ""
				if (1392425966 > 0) {
					var finishResult = $j.post (sessionURL, {"finish": {"sessionId" : 1392425966}},"json");
					var configResult = $j.get (sessionURL, {"config": {"sessionId" : 1392425966, "taskId": -1}},"json")
					configResult.done (function (response) {
							$j("#studyField").attr("value",response.data.studyId);
							// logged the finish so enable the button to exit
							$j("#showMeDiv").html("<p><a href=\"http://wlux.uw.edu/data/log.php?sessionId=" + response.data.sessionId + "\" target=\"_blank\">View the log file</a></p>");
							$j("#continueBtn").attr("disabled",false);
							$j("#prompt").css("display","block");
						});			
				} else {
					$j("#textDiv").html("<p>No study session was specified</p>");
				}
			}
			function getTask () {
				// get session info
				$j.ajaxSetup({async: false}); //
				 // if undefined, use ""
				if (1392425966 > 0) {
					// start the task and get the configuration info
					var postResult = $j.post (taskURL, {"start": {"sessionId" : 1392425966}},"json");
					
					postResult.done (function (response) {
							if (response.data !== undefined) {
								sessionInfo = response.data;
								// alert("Going to: " + nextPage);
								$j("#pageHeading").text("Task "+ sessionInfo.taskId);							
								$j("#taskInstructions").html("<p>SessionId: "+ 
									sessionInfo.sessionId + "<br/>StartTime: " + 
									sessionInfo.startTime + "</p><h2>Task Instructions:</h2>" +
									sessionInfo.startPageHtml);
								$j("#sessionField").attr("value", sessionInfo.sessionId.toString());
								// $j("#taskField").attr("value", response.data.taskId.toString());
								if ("external" == sessionInfo.taskType) {
									if (sessionInfo.startPageNextUrl.length > 0) {
										$j("#continueForm").attr("action", sessionInfo.startPageNextUrl);
										$j("#continueForm").attr("method", "GET");
									}
								} else if ("single" == sessionInfo.taskType) {
									if (sessionInfo.finishPageNextUrl.length > 0) {
										$j("#continueForm").attr("action", sessionInfo.finishPageNextUrl);
										$j("#continueForm").attr("method", "POST");
									}
								}
								$j("#continueBtn").attr("disabled",false);
							} else {
								if (response.error.lastTask !== undefined) {
									//display last task message
									$j("#pageHeading").text("Finished");	
									$j("#taskInstructions").html("<p>" + response.error.lastTask + "<br/>Press <strong>Continue</strong> to finish.</p>");
									$j("#continueBtn").attr("disabled",false);
									$j("#continueForm").attr("action","study-end.php");
								}
							} 
					});
				} else {
					$j("#textDiv").html("<p>No session was specified</p>");}
			}