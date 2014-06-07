curl --header "Authorization: Basic ZGVmYXVsdFJlc2VhcmNoZXI6MVBhc3N3b3Jk" -g http://localhost/wluxui/data/session.php?bad[some]=stuff >> session_test_results.txt
curl -g http://localhost/wluxui/data/session.php?config[some]=stuff >> session_test_results.txt
curl -g http://localhost/wluxui/data/session.php?currentStep[some]=stuff >> session_test_results.txt
curl -X POST -d "bad[some]=stuff" -g http://localhost/wluxui/data/session.php >> session_test_results.txt
curl -X POST -d "start[some]=stuff" -g http://localhost/wluxui/data/session.php >> session_test_results.txt
curl -X POST -d "startNextStepsome]=stuff" -g http://localhost/wluxui/data/session.php >> session_test_results.txt
curl -X POST -d "finishCurrentStep[some]=stuff" -g http://localhost/wluxui/data/session.php >> session_test_results.txt
curl -X PATCH --header "Content-Length: 0" -g http://localhost/wluxui/data/session.php?start[some]=stuff >> session_test_results.txt
