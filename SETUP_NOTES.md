# OPN Form – Local Setup & Learning Notes

## Task 1: Repository Exploration
- Explored overall project structure and organization.
- Backend implemented using Laravel, with core logic in `app/`, routing in `routes/`, and configuration in `config/`.
- Frontend handled using modern JavaScript tooling.
- Environment and application configuration managed via `.env` and framework config files.

## Task 2: Backend Dependency Setup
- Verified PHP version compatibility with the project.
- Installed backend dependencies using Composer.
- Enabled required PHP extensions.
- Generated the Laravel application key successfully.

## Task 3: Frontend Dependency Setup
- Verified Node.js and npm versions.
- Installed frontend dependencies.
- Ran development/build commands without errors.

## Task 4: Environment Configuration
- Created a local `.env` file from `.env.example`.
- Configured database credentials for local development.
- Verified that the application successfully connects to the database.

## Task 5: Migrations & Seeders
- Executed database migrations successfully.
- Ran seeders to populate demo/sample data.
- Verified created tables and data directly in the database.

## Environment Configuration Observation
- The default `.env` configuration was set to PostgreSQL:
  - `DB_CONNECTION=pgsql`
  - `DB_PORT=5432`

- The local setup uses MySQL via XAMPP.
- Updated the local `.env` configuration to MySQL:
  - `DB_CONNECTION=mysql`
  - `DB_PORT=3306`

- This change was required for migrations and seeders to run successfully.
- The `.env` file was kept local and not committed to the repository, following security and best-practice guidelines.

## Task 6: Run Application Locally

- Started the Laravel backend server from the `api/` directory using `php artisan serve`.
- Started the Nuxt frontend development server from the `client/` directory using `npm run dev`.
- Verified that the frontend was accessible at `http://localhost:3000` and the backend was reachable at `http://127.0.0.1:8000`.

### Observations
- The frontend initially displayed the Nuxt loading (splash) screen.
- Browser console showed repeated `503 Service Unavailable` responses during initial load, including requests such as `/favicon.ico`.
- Confirmed that the backend server was running and responding to requests, and that the backend is API-only (no route defined for `/`).

### Understanding
- Identified that the Nuxt frontend depends on backend API availability and application bootstrap.
- The `503` responses indicate temporary unavailability during application initialization rather than server downtime.
- This behavior is expected during early local setup of this API-driven application and does not indicate a failed setup.

## Task 7: Complete Local Setup Documentation

This section documents the full local setup process to allow reproducibility.

### Prerequisites
- PHP (compatible version as per project requirements)
- Composer
- Node.js and npm
- MySQL (via XAMPP)
- Git

### Repository Setup
- Cloned the official OPN Form repository.
- Opened the project in VS Code and reviewed the folder structure.

### Backend Setup (Laravel)
- Navigated to the `api/` directory.
- Installed PHP dependencies using `composer install`.
- Created `.env` from `.env.example`.
- Generated application key using `php artisan key:generate`.
- Updated database configuration to use MySQL for local setup.
- Ran database migrations and seeders successfully.

### Frontend Setup (Nuxt)
- Navigated to the `client/` directory.
- Installed frontend dependencies using `npm install`.
- Encountered a Windows-specific issue due to Unix-style `export` command in npm scripts.
- Resolved the issue by updating the dev script to use `cross-env`.
- Started the frontend dev server using `npm run dev`.

### Running the Application
- Started backend server using `php artisan serve` from the `api/` directory.
- Started frontend dev server using `npm run dev` from the `client/` directory.
- Accessed the application via `http://localhost:3000`.

### Common Issues & Fixes
- **Database mismatch**: Default configuration used PostgreSQL, while local setup used MySQL. Fixed by updating local `.env`.
- **Windows npm script issue**: `export` command not recognized. Fixed using `cross-env`.
- **503 Service Unavailable during frontend load**: Identified as expected behavior during application bootstrap in an API-driven setup.

## Task 9: Docker Compose Configuration

- The project already includes a comprehensive `docker-compose.yml` file.
- The compose file defines multiple services required to run the application:
  - `api`: Laravel backend container
  - `api-worker`: Background queue worker
  - `api-scheduler`: Laravel scheduler
  - `ui`: Nuxt frontend application
  - `db`: PostgreSQL database
  - `redis`: Redis cache and queue backend
  - `ingress`: Nginx reverse proxy

- Service dependencies are defined using `depends_on` with health checks to ensure correct startup order.
- Environment variables are provided via `.env` files and Docker environment configuration.
- Docker volumes are used to persist database data, Redis data, and application storage.
- This setup allows the entire application stack to be run consistently using Docker Compose.

## Task 10: Verify Docker Setup

- Ran the full application stack using `docker compose up`.
- Verified all core services (API, UI, database, Redis, ingress) were running and healthy.
- Observed temporary 502 errors during initial startup due to API initialization behind the ingress, which resolved as services became healthy.
- Noted that the scheduler container reported an unhealthy status in local setup, which does not block application functionality.
- Confirmed the application is accessible via `http://localhost` and runs fully inside Docker.

