#!/bin/sh 
# Filename: setup.sh
# Description: 
#       A script that can automate the creation of a database schema 
#       with initialized default values on the localhost. 
#       This shall run the .sql script

# Credentials
# App-name: inkdown-backend
# mysql://bfa9c2baab525d:5fe4b334@us-cdbr-east-06.cleardb.net/heroku_284b755129df15e?reconnect=true
host="us-cdbr-east-06.cleardb.net" 
user="bfa9c2baab525d"
password="5fe4b334"
database="heroku_284b755129df15e"

echo "Creating schema to the remote database!"
cat "schema.sql" | mysql -h "$host" -u "$user" "-p$password" "$database"