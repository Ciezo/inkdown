#!/bin/sh 
# Filename: setup.sh
# Description: 
#       Another script to hard embed (code) the account credentials for the administrator account

# Credentials
# App-name: inkdown-backend
# mysql://bfa9c2baab525d:5fe4b334@us-cdbr-east-06.cleardb.net/heroku_284b755129df15e?reconnect=true
host="us-cdbr-east-06.cleardb.net" 
user="bfa9c2baab525d"
password="5fe4b334"
database="heroku_284b755129df15e"

echo "Setting up administrator account!"
cat "register_admin.sql" | mysql -h "$host" -u "$user" "-p$password" "$database"