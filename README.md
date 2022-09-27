---
description: Project Documentation for user
---

# Talif Documentation

<p align="center"><img src="images/ninja-logo.png" alt="ninja-logo"Talif Web-Blog</p>

## AdminLTE - Talif Web-Blog

[![Codeship Status for arduino-uno/talif-blog](https://app.codeship.com/projects/ba4ba686cc925af9e9a06a472d8e06283574df8c/status?branch=main)](https://app.codeship.com/projects/312233)
[![php](https://img.shields.io/badge/php-7.2-brightgreen.svg?logo=php)](https://www.php.net)
[![mysql](https://img.shields.io/badge/mysql-8.0-brightgreen.svg?logo=mysql)](https://www.mysql.com)
[![License](https://img.shields.io/github/license/arduino-uno/talif-blog)](LICENSE.md)

Simple PHP blogging system.

* [Introduction](./#introduction)
  * [Demo](./#demo)
  * [Features](./#features)
* [Get started](./#get-started)
  * [Requirements](./#requirements)
* [Thank you, open source](./#thank-you-open-source)
* [License](./#license)

## Introduction

Talif is a simple CMS for easy blogging. It uses AdminLTE for Admin Panel & Dashboard. Talif is Easy to Install. You can login to the dashboard to do everything form creating a blog post or page to setting site preferences or even change your Blog Template. This is what it currently looks like:

![screen-shot](https://raw.githubusercontent.com/arduino-uno/talif-blog/main/images/screenshot.png)

### Demo

* Website: [http://sintara.co.id/talif-blog](http://sintara.co.id/talif-blog)
* App login: [http://sintara.co.id/talif-blog/login.php](http://sintara.co.id/talif-blog/login.php)

### Features

Modern Dashboard Secured Login Activity Logs of users Messaging Web Contents Management (Pages, Posts, Post Categories, Post Comments etc) Roles & Permissions Management Users Management Site Settings Site Template Options Easy to Install and Setup

## Get Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

### Requirements

If you want to host Talif yourself, you will need a server with:

```
[+] Minimum PHP v5.6
[+] Minimum MySQL v8.0
[+] mod_rewrite Apache
```

### Installation

1. Install XAMPP or WAMPP.
2. Open XAMPP Control panal and start \[apache] and \[mysql] .
3. Download and Unzipp the given files and moving them to htdocs `C:\xampp\htdocs`.
4. open link `localhost/phpmyadmin`.
5. click on new at side navbar.
6. give a database name as `blog_db` hit on create button.
7. after creating database name click on import.
8. browse the file in directory `talif-blog/database/blog_db.sql`.
9. open any browser and type `http://localhost/talif-blog`.
   * first register and then login
   * admin login details : **`Username`**`: admin |`**`Password`**`: admin`

## Thank you, open source

Hi, I always try to create the high quality PHP Projects for my customers. Please check my Updates Talif-Blog.
Thank you for your purchase!

## License

Copyright © 2022

Licensed under [the AGPL License](LICENSE.md).
