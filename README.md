### Docker

- Run `docker-compose up -d` to up docker container
- Run `docker-compose exec app bash` - to enter docker container

### Init project

- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`

### Env variables

- `GITHUB_USERNAME` - GitHub username for API auth
- `GITHUB_TOKEN` - GitHub personal token for API auth
