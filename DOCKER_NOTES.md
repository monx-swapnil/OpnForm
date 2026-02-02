# Docker Research Notes

## What is Docker
Docker is a containerization platform that allows applications to run in isolated environments called containers.  
Containers package the application code along with its dependencies, ensuring consistency across different environments.

## Why Docker is Used
- Eliminates “works on my machine” issues
- Provides consistent development, testing, and production environments
- Simplifies setup for new developers
- Makes multi-service applications easier to manage

## Images vs Containers
- **Docker Image**: A read-only blueprint that defines how a container is built.
- **Docker Container**: A running instance of an image.

## What is a Dockerfile
A Dockerfile defines:
- The base image (e.g., PHP, Node, MySQL)
- Application dependencies
- Build steps
- Runtime configuration

It is used to build a Docker image.

## What is Docker Compose
Docker Compose is a tool used to define and run multi-container applications using a single configuration file (`docker-compose.yml`).

It allows defining:
- Multiple services (app, database, cache, etc.)
- Networking between services
- Volumes for data persistence
- Environment variables

## Docker in a Laravel Application
A typical Laravel Docker setup includes:
- **App container**: Runs PHP and the Laravel application
- **Database container**: MySQL or PostgreSQL
- **Cache container**: Redis
- (Optional) Web server container like Nginx

Each service runs in its own container and communicates over a Docker network.

## Benefits of Docker for This Project
- Backend, database, and cache run together in a controlled environment
- Removes dependency on local installations like XAMPP
- Makes application behavior consistent across machines
- Simplifies onboarding and deployment
