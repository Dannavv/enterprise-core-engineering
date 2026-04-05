#!/bin/bash
# Lab 19: Automated Restore Script 🕒

# Configuration
DB_CONTAINER="erp_lab19_db"
DB_USER="root"
DB_PASS="my_secure_backup_pass_123"
DB_NAME="erp_database"

# Ensure a file was provided as an argument
if [ -z "$1" ]; then
    echo "❌ USAGE: ./restore.sh <path_to_backup.sql>"
    exit 1
fi

echo "🕒 Starting database restoration from $1..."

# Pipe the backup file from the host INTO the docker container's mysql tool
cat "$1" | docker exec -i $DB_CONTAINER mysql -h 127.0.0.1 -u$DB_USER -p$DB_PASS $DB_NAME

if [ $? -eq 0 ]; then
    echo "✅ SUCCESS: Database has been restored to the exact state of $1"
else
    echo "❌ FAILED: Could not restore database."
fi
