ECHO OFF
SET url=https://onfleet.com/api/v2/auth/test
SET apikey="cd3b3de84cc1ee040bf06512d233719c:"

ECHO ON

curl -o file1.txt -k -X GET "%url%" -u %apikey%

timeout /t 30