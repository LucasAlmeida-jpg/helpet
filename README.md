# helPet (Sistema de PetShop)

## Clone o repositório
```
git clone https://github.com/LucasAlmeida-jpg/helpet.git
```

## Instale as dependencias usando composer
```
composer install
```

## Copie o exemplo env e mude a configuracao de acordo
```
cp .env.example .env
```
## Gere uma nova chave 
```
php artisan key:generate
```

## Instale a nova chave gerada

```
php artisan passport:install
```

## Rode as migrations
```
php artisan migrate
```

## Agora voce tem acesso ao server http://localhost:8080

### Compiles and hot-reloads for development
```
npm run serve
```

## To run backend
```
cd back
```
```
cd backend
```
```
php artisan serve
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).
