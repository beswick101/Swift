# Swift Technical Test - Neil Beswick

> Laravel project for Swift Dental to accept a number between 1-100,000 as either an integer or in Roman Numerals

This project runs with Laravel version 8.0.

## Getting started

Assuming you've already installed on your machine: PHP (>= 8.0.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org).

# Install dependencies

```bash
composer install
```

# create .env file and generate the application key

```bash
cp .env.example .env
php artisan key:generate
```

# To run the command :

```bash
php artisan app:accept-number <number>
```

## Licence

This software is licensed under the Apache 2 license, quoted below.

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this project except in compliance with the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
