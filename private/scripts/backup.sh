#!/bin/bash

LOG_PATH="/vagrant_data/eve/private/backups"
TIMESTAMP="$(date +%m-%d-%Y_%H\;%M\;%S)"

mysqldump -u root -p eve > "$LOG_PATH/$TIMESTAMP.sql"
