---
description: Project Documentation for user
---

# Talif Documentation
<div align="
![ninja-logo](https://raw.githubusercontent.com/arduino-uno/talif-blog/main/images/ninja-logo.png)

## AdminLTE - Talif Web-Blog

[![Build Status](https://img.shields.io/github/workflow/status/monicahq/monica/Build?style=flat-square\&label=Build%20Status)](https://github.com/monicahq/monica/actions) [![Docker pulls](https://img.shields.io/docker/pulls/library/monica)](https://hub.docker.com/\_/monica/) ![Lines of code](https://img.shields.io/tokei/lines/github/monicahq/monica) [![Code coverage](https://img.shields.io/sonar/coverage/monica?server=https%3A%2F%2Fsonarcloud.io\&style=flat-square\&label=Coverage%20Status)](https://sonarcloud.io/project/activity?custom\_metrics=coverage\&graph=custom\&id=monica) [![License](https://img.shields.io/github/license/monicahq/monica)](https://github.com/monicahq/monica/blob/main/LICENSE.md)

Simple PHP blogging system.

* [Introduction](./#introduction)
  * [Purpose](./#purpose)
  * [Features](./#features)
  * [Who is it for?](./#who-is-it-for)
  * [What Monica isn’t](./#what-monica-isnt)
  * [Where does this tool come from?](./#where-does-this-tool-come-from)
* [Get started](./#get-started)
  * [Requirements](./#requirements)
  * [Update your instance](./#update-your-instance)
* [Contribute](./#contribute)
  * [Contribute as a community](./#contribute-as-a-community)
  * [Contribute as a developer](./#contribute-as-a-developer)
* [Principles, vision, goals and strategy](./#principles-vision-goals-and-strategy)
  * [Principles](./#principles)
  * [Vision](./#vision)
  * [Goals](./#goals)
  * [Strategy](./#strategy)
  * [Monetization](./#monetization)
  * [Why Open Source?](./#why-open-source)
  * [Patreon](./#patreon)
* [Contact](./#contact)
* [Team](./#team)
* [Thank you, open source](./#thank-you-open-source)
* [License](./#license)

### Introduction

Talif is a simple CMS for easy blogging. It uses AdminLTE for Admin Panel & Dashboard. Talif is Easy to Install. You can login to the dashboard to do everything form creating a blog post or page to setting site preferences or even change your Blog Template. This is what it currently looks like:

![screen-shot](https://raw.githubusercontent.com/arduino-uno/talif-blog/main/images/screenshot.png)

#### Demo

* Website: [http://sintara.co.id/talif-blog](http://sintara.co.id/talif-blog)
* App login: [http://sintara.co.id/talif-blog/login.php](http://sintara.co.id/talif-blog/login.php)

#### Features

Modern Dashboard
Secured Login
Activity Logs of users
Messaging
Web Contents Management (Pages, Posts, Post Categories, Post Comments etc)
Roles & Permissions Management
Users Management
Site Settings
Site Template Options
Easy to Install and Setup

#### Requirements

If you want to host Talif yourself, you will need a server with:

```
[+] Minimum PHP v5.6
[+] Minimum MySQL v8.0
[+] mod_rewrite Apache
```

#### Installation

* Install XAMPP or WAMPP.
* Open XAMPP Control panal and start \[apache] and \[mysql] .
* Download project from github(https://github.com/PuneethReddyHC/online-shopping-system-advanced.git).

OR follow gitbash commands

```
- cd C:\\xampp\htdocs\
- git clone https://github.com/PuneethReddyHC/online-shopping-system-advanced.git
```

1. extract files in C:\xampp\htdocs.
2. open link localhost/phpmyadmin
3. click on new at side navbar.
4. give a database name as (onlineshop) hit on create button.
5. after creating database name click on import.
6. browse the file in directory `"talif-blog/mysqldb`_`/`_`blog_db.sql"`.
7.  open any browser and type `"http://localhost/talif-blog"`.

    * first register and then login
    * admin login details :&#x20;

    &#x20;  `Username: admin | Password: admin`

### Contact

### Team

Our team is made of two core members:

* [Maazarin (djaiss)](https://github.com/djaiss)
* [Alexis Saettler (asbiin)](https://github.com/asbiin)

We are also fortunate to have an amazing [community of developers](https://github.com/monicahq/monica/graphs/contributors) who help us greatly.

### Thank you, open source

Monica uses a lot of open source projects and we thank them with all our hearts. We hope that providing Monica as an free, open source project will help other people the same way those softwares have helped us.

### License

Copyright © 2016–2022

Licensed under [the AGPL License](LICENSE.md).
