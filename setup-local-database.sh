#!/bin/bash
docker run --name mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=secret -e MYSQL_DATABASE=iotdatareceiver -d mysql
