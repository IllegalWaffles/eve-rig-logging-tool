#!/bin/bash

LOG_PATH="/var/www/html/ts3.tootallgaming.com/public_html/kgas/private/backups"
TIMESTAMP="$(date +%m-%d-%Y_%H\;%M\;%S)"
DB_USER="kgas"
DB_PASS="Kgas123"
DB="kgas_database"

mysqldump -u $DB_USER -p$DB_PASS $DB > "$LOG_PATH/$TIMESTAMP.sql"

echo -e "New backup created at $LOG_PATH/$TIMESTAMP.sql\n"
