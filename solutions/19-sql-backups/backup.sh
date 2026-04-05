#!/bin/bash
# Lab 19: Automated Backup Script 💾

# Configuration
DB_CONTAINER="erp_lab19_db"
DB_USER="root"
DB_PASS="my_secure_backup_pass_123"
DB_NAME="erp_database"
BACKUP_FILE="backup_$(date +%Y%m%d_%H%M%S).sql"

echo "🚀 Starting database backup for $DB_NAME..."

# Execute mysqldump inside the container and pipe it to a file on host
docker exec $DB_CONTAINER mysqldump -h 127.0.0.1 -u$DB_USER -p$DB_PASS $DB_NAME > $BACKUP_FILE

if [ $? -eq 0 ]; then
    echo "✅ SUCCESS: Database saved to $BACKUP_FILE"
    echo "Summary: $(ls -lh $BACKUP_FILE)"
else
    echo "❌ FAILED: Could not create backup."
fi
