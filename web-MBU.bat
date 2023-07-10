@echo off
echo Menjalankan kode CMD...
start "Figma" https://www.figma.com/file/gAPIg48PMj1PeKokLeupfA/MONITORING-BEASISWA-UG?type=design&node-id=0-1&mode=design
C:\xampp\
start C:\xampp\xampp-control.exe
apache_start

cd C:\xampp\htdocs\codeigniter-MBUG
php spark serve

start http://localhost:8080/dashboard
code .
