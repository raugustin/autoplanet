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

## Controller Structure

![controller_structure](https://user-images.githubusercontent.com/29182266/27509140-84470470-58f6-11e7-9d30-a20288199902.jpg)

## Security Architecture
### Data Integrity Controls
* Input vanitization: Remove/replace/escape/encode unwanted input  
* Input salidation: Reject unwanted input
* Prepared Statements: Prevent that user data can alter your SQL queries
* File upload validation: Don’t allow users to upload whatever they want




![data_integrity](https://user-images.githubusercontent.com/29182266/27455633-48a7cd0e-579e-11e7-95bc-b68476d3744a.jpg)
![data_access](https://user-images.githubusercontent.com/29182266/27455646-50bc6608-579e-11e7-8da2-baa6f5bfcb7c.jpg)
![data_protection](https://user-images.githubusercontent.com/29182266/27455656-573f4586-579e-11e7-8573-ef6cad6deceb.jpg)
![functionality](https://user-images.githubusercontent.com/29182266/27455663-5c5b89ee-579e-11e7-862a-c0f2896471a8.jpg)

More information to follow...
