		
			$j = jQuery.noConflict();
			var sessionInfo = null;
			var host = window.location.host;
			var LOCAL = (host.indexOf("localhost") != -1) ||
						(host.indexOf("127.0.0.1") != -1);
		
			//var taskURL = "http://wlux.uw.edu/data/task.php";
			
			if (LOCAL) {
				taskURL = "/data/task.php";
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