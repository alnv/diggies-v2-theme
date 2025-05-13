# The diggies v2 Contao Theme

Instructions for installation:

1. Create repository

   ``git clone https://github.com/raufeld/diggies-v2-theme``


2. Create public directory

   ``mkdir public/``


3. Download Contao Manager

   Download Contao-Manager (https://contao.org/de/download.html) and put the contao-manager.phar file into the public/ folder. Rename the contao-manager.phar file to __contao-manager.phar.php__.


4. Rename _composer.json to __composer.json__

        config/ 
        contao/
        layout/
        src/
        templates/
        public/
        composer.json


5. Set up your local server.

   Use MAMP or a server of your choice. The web directory must point to the public/ folder.


6. Create database

   You can find the database in the development environment or the live environment. Log in to the backend (https://dev.xxx.de/contao) and go to System -> Backup Database -> Download MySQL Backup and download the SQL dump. You can get access data from Alex Naumov or Alex Nuijen.


7. Open Contao Manager and install Contao

   You can open the Contao Manager with your browser: https://diggies2:8890/contao-manager.phar.php (Domain may look different for you. See point 5)

### More info:

About the Contao Manager: https://docs.contao.org/manual/de/installation/contao-manager/

About Conato: https://docs.contao.org/manual/de/installation/
