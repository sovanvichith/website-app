# Deployment

This project is a Laravel app with a static frontend copy in `public/frontend`.

## Backend on Render

Use the Git repository root `website-app/website-app` when creating the Render service.

The included `render.yaml` can be used as a Render Blueprint. It creates:

- Docker web service: `website-app-backend`
- Generated Laravel app secret: `RENDER_APP_SECRET`

Render does not provide managed MySQL. Use an external MySQL database and set the MySQL environment variables in Render.

Local MySQL settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=website_app
DB_USERNAME=root
DB_PASSWORD=
```

These values work only on your local machine. On Render, `127.0.0.1` means the Render container itself, not your computer, so production needs a MySQL host that Render can reach.

Aiven MySQL settings for Render:

```env
DB_CONNECTION=mysql
DB_HOST=mysql-24c7b82c-tk-06c9.f.aivencloud.com
DB_PORT=20604
DB_DATABASE=defaultdb
DB_USERNAME=avnadmin
DB_PASSWORD=<your Aiven password>
```

Remove `DATABASE_URL` from Render unless you prefer using the full Aiven service URI. Do not commit the service URI or password to Git.

1. Create a new Render Web Service.
2. Set the runtime to Docker, or create a Blueprint from `render.yaml`.
3. Set the Dockerfile path to `Dockerfile`.
4. Add environment variables:
   - `APP_NAME=Build Bright University`
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_KEY=<output of php artisan key:generate --show>` if you are not using the Blueprint-generated `RENDER_APP_SECRET`.
   - `APP_URL=https://your-render-service.onrender.com`
   - `ASSET_URL=https://your-render-service.onrender.com`
   - `DB_CONNECTION=mysql`
   - `DATABASE_URL=<database connection URL>` if your MySQL provider gives one.
   - `DB_HOST=<database host>`
   - `DB_PORT=3306`
   - `DB_DATABASE=<database name>`
   - `DB_USERNAME=<database user>`
   - `DB_PASSWORD=<database password>`
   - `SESSION_DRIVER=database`
   - `CACHE_STORE=database`
   - `QUEUE_CONNECTION=database`
5. Deploy the service. The container runs `php artisan migrate --force` on startup.

Render services have an ephemeral filesystem. User uploads saved under `public/images` or `storage/app/public` can disappear after redeploys unless you add persistent storage or move uploads to object storage.

## Frontend on Vercel

Use the same Git repository root `website-app/website-app` when importing the project.

The included `vercel.json` publishes `public/frontend` as a static site and disables the build/install steps.

Vercel settings:

- Framework Preset: Other
- Build Command: leave empty
- Output Directory: `public/frontend`
- Install Command: leave empty

## Notes

The Laravel-rendered homepage at `/` is served by Render. The Vercel site serves only the static files in `public/frontend`.
