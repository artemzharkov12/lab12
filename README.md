# Sprawozdanie_Lab12

Ten projekt tworzy stos LEMP (Linux, Nginx, MySQL, PHP) z phpMyAdmin, używając Docker i Docker Compose. Zawiera przykładową aplikację PHP, która łączy się z bazą danych MySQL i wyświetla informacje o użytkownikach, z naciskiem na ochronę danych.

## File Tree
```
LAB12-MAIN/
├── app/
│   ├── db.php
│   ├── Dockerfile
│   ├── style.csv  
│ 
├── images/
│   ├── PhpAdmin.png
│   ├── RunResult.png
│   ├── WebResult.png
│
├── nginx/
│   ├── nginx.conf
│   └── default.conf
├── secrets/
│   ├── mysql_root_password.txt
│   └── mysql_user_password.txt
│
├── docker-compose.override.yml
├── docker-compose.yml
├── init.sql
└── README.md
```
## Tworzymy pliki 
```
echo -n "rootpassword" > secrets/mysql_root_password
echo -n "testpassword" > secrets/mysql_user_password
```
## Uruchomienie kontenerów
```
docker-compose up -d --build
```
![Docker Hub](images/RunResult.png)


## 1. Results PHP
Aplikacja PHP, która wyświetla informacje o użytkownikach z bazy danych MySQL.
![Docker Hub](images/WebResult.png)

## 2. Results PhpMyAdmin
Skorzystaj z poniższych danych logowania:
1.
```
Użytkownik: root
Hasło: rootpassword
```
2.
```
Użytkownik: user
Hasło: testpassword
```
![Docker Hub](images/PhpAdmin.png)
