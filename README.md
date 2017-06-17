# Autoplanet
MVC based procedural PHP web app and secure coding exercise

## Background info
As security professional I was involved with website security testing, reporting vulnerabilities to web developers and verifying if these were properly fixed. As I was interested in how vulnerabilities can get into web applications and how to prevent them I thought the best way to find out is making (secure) websites myself. Therefore I started two projects: autoworld and autoplanet. Both are car trading websites, based on PHP and MySQL: Users can sell cars (after signing in) and can search and buy cars. Autoworld was written from scratch with no plan, little knowledge of programming and therefore full of vulnerabilities. Autoplanet is the second project and an attempt to do a better job by using MVC architecture, code design priciples (dry, kiss, yagni, name conventions, etc.) and secure coding practices. As I hadn't any experience with OOP both sites were programmed in procedural PHP, to my opinion this shouldn't be an issue as you can write good and secure sites also in procedural programming. 

![autoplanet home page](https://user-images.githubusercontent.com/29182266/27202001-262ad6e6-5220-11e7-8f87-f305af62187a.jpg)

## Directory Structure

    \webroot
        \public
            \carimages
            \css
            \images
            index.php
            .htaccess
         \application           
            \controllers
            \models
            \helpers
            \views

## MVC Components

![autoplanet_mvc_components](https://user-images.githubusercontent.com/29182266/27253226-ee0cba52-5370-11e7-84bc-ecfd91651f78.jpg)

More information to follow...
