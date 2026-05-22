#!/usr/bin/env bash
set -e

if [ -z "${APP_KEY:-}" ] && [ -n "${RENDER_APP_SECRET:-}" ]; then
    export APP_KEY="base64:${RENDER_APP_SECRET}"
fi

php artisan storage:link || true
php artisan config:cache
php artisan migrate --force

exec "$@"
