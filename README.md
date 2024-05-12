# Cipat

## Installation

```sh
git clone https://github.com/holiq/uts-pemrograman4.git
cd uts-pemrograman4
cp env .env
php spark key:generate

# setting database on .env
# run migration for create tables
php spark migrate
#run seed for insert dummy data
php spark db:seed Seed

# run server
php spark serve

# u&pass admin:admin123
```
