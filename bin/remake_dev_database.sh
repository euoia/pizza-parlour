#!/bin/bash
remake_database.sh
cat database/data/dev.sql | mysql -u root
