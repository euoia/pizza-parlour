#!/bin/bash
cat database/DROP_DATABASE.sql | mysql -u root
cat database/TABLES.sql | mysql -u root
