echo "Press any key to continue Open the chrome browser "
rem runas /user:administrator "chrome --incognito --disable-translate www.fb.com"
start chrome --incognito --disable-translate http://localhost:8081
echo "Serveur start. open this link http://localhost:8081"
php artisan serve --port 8081
echo "Serveur shutdown"
echo "Press any key to exit"
pause