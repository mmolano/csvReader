
# CSV reader
<table>
<tr>
<td>
  This web application is used to insert in our Database every information found in a specific CSV (will not work with another one).
</td>
</tr>
</table>


## Built with

- ![Laravel](https://img.shields.io/badge/Laravel-16181D.svg?style=for-the-badge&logo=laravel&logoColor=#191A1A)
- ![PHP](https://img.shields.io/badge/php-16181D.svg?style=for-the-badge&logo=php&logoColor=blue)

## dependencies

- League CSV : https://csv.thephpleague.com/

### .env file

A `.env` file has to be created.
For that, you can copy / paste the `.env.example` to `.env`.
Make sure that the .env is linked to the database.

## Build Setup

```bash
# Install dependencies
$ composer i

# Create DB
$ php artisan migrate

# launch server
$ php artisan serve

# launch queues (since we will be using queues for that app)
$ php artisan queue:work
```

## Routes

```bash
# Upload CSV (you will be able to upload the CSV)
$ /csv

# You will be able to manage the data
$ /
```
