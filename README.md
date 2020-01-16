### Endpoints

`GET` - `/api/users` - retrieve first page of users list from GitHub API with their followers and repos. 
To extract additional field I've used `GuzzleRequest::sendAsync` method. 

### Docker

- Run `docker-compose up -d` to up docker container
- Run `docker-compose exec app bash` - to enter docker container

### Init project

- `composer install`
- `cp envexample .env`
- `php artisan key:generate`

### Env variables

- `GITHUB_USERNAME` - GitHub username for API auth
- `GITHUB_TOKEN` - GitHub personal token for API auth
