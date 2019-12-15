# lumen-mongodb
Lumen Project with MongoDB Configration

# Installation
In your root folder use the command to clone the repository:
```
git clone https://github.com/3bdullahg97/lumen-mongodb.git
```
Create a `.env` file to configure your project using this command
```
cp .env.example .env
```
From `.env` file edit database configration
```
DB_CONNECTION=mongodb
DB_HOST=<Your MongoDB Host>
DB_PORT=27017
DB_DATABASE=<Your DB>
DB_USERNAME=<DB name>
DB_PASSWORD=<DB Password>
```

# Setup MongoDB root user
From **Mongo Shell** you can add a user with root roles using this command:
```
> use admin
> db.createUser({
    user: "<root user>",
    pwd: "<root password>",
    roles: roles["userAdminAnyDatabase", "dbAdminAnyDatabase", "readWriteAnyDatabase"]
    
   })
```
