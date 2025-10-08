These are the commands needed to set up webserver and database VMs;
These will symlink the files from our repo (so they can be edited there and get changes pulled)
to the proper places we need them to be. This makes sure our files are always up to date
but still in the required places without needing to always copy/paste.

Should only need to be done once at the start, but it's here in case anything goes wrong :P

----------WEBSERVER----------
cd /etc/apache2/sites-available/
sudo ln -s [PROJECT_ROOT_DIR]/src/webserver/apache2/sites-available/005-proj.conf 005-proj.conf
cd /etc/apache2/sites-enabled/
sudo ln -s ../sites-available/005-proj.conf 005-proj.conf

cd /var/www/
sudo cp -rs [PROJECT_ROOT_DIR]/src/webserver/proj/ .
sudo cp -s [PROJECT_ROOT_DIR]/src/shared/* .

sudo systemctl restart apache2.service


----------DATABASE----------
mkdir [WHEREVER_YOU_WANT]
cd [WHEREVER_YOU_WANT]
sudo ln -s [PROJECT_ROOT_DIR]/src/database/database.php database.php
sudo cp -s [PROJECT_ROOT_DIR]/src/shared/* .
sudo chmod 777 database.php