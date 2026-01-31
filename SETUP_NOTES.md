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
