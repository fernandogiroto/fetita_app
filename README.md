<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/fernandogiroto/fetita_app/master/fetita_logo.jpg" width="400" alt="Fetita - Logo"></a></p>

<img src="https://raw.githubusercontent.com/fernandogiroto/fetita_app/master/fetita_login.png" alt="Fetita - Portal do Fetis" title="Fetita - Portal do Fetish" width="100%">

# FETITA - PORTAL DO FETISH

This was my first web app that I built from scratch. I started by using FIGMA to architect and map out what the project would look like, built the entire database architecture and used the languages PHP, Javascript, HTML, CSS, SASS and the frameworks/libraries: Laravel, Pusher, Vue & InertiaJs. The project is not yet completely finished but it is functional. The project is a fetish portal, where people can join and leave the portal's communities, search for users, chat online with active participants, edit their profile and much more.

<img src="https://raw.githubusercontent.com/fernandogiroto/fetita_app/master/fetita_dashboard.png" alt="Fetita - Portal do Fetish" title="Fetita - Portal do Fetish" width="100%">
<img src="https://raw.githubusercontent.com/fernandogiroto/fetita_app/master/fetita_sugar.png" alt="Fetita - Portal do Fetish" title="Fetita - Portal do Fetish" width="100%">

## Installation

Edit .ENV

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=databasename
DB_USERNAME=username
DB_PASSWORD=password
```

Install the dependencies and devDependencies

```sh
npm install
composer install
```


### Compile and Seed

```sh
php artisan migrate:refresh --seed    
php artisan serve 

```

## Languages and Frameworks used

![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![SASS](https://img.shields.io/badge/SASS-hotpink.svg?style=for-the-badge&logo=SASS&logoColor=white)
![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![VUEJS](https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vuedotjs&logoColor=4FC08D)
