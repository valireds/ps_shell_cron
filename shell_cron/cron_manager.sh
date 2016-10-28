#!/usr/bin/env bash

MODULE=$1
CRONNAME=$2
PRESTASHOP_DIR=$(dirname $(dirname $(dirname ${BASH_SOURCE[0]})))

if [ -z "$MODULE" ]; then
    echo "Please set module name"
    exit 1
fi

if [ -z "$CRONNAME" ]; then
    echo "Please set cron name"
    exit 1
fi

exec php -q "$PRESTASHOP_DIR"/modules/shell_cron/cron_manager.php --module "$MODULE" --job "$CRONNAME" --prestashop "$PRESTASHOP_DIR"
exit
