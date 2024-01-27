![Logo](https://github.com/hamid1ganeh/7learn/blob/main/logo.jpeg)

# 7learn
Firsrt of all you need to clone the project from this repository.
Then run 2 below conmmand:
```bash
git clone https://github.com/hamid1ganeh/7learn
```

In order to Integration laravel with ElasticSearch you can use  [laravel scout package](https://laravel.com/docs/10.x/scout) but in this project I prefred make a costomize class and use elasticsearch functions as oop.
furthermore in the docker-compose.yml file there are elasticsearch and kibana images but in this project I didn't use them. because I made my elasticsearch connection directly in a clud system. If you sign up in [elastic.co](https://www.elastic.co) you can use it free trial for two weeks. acording to this [document](https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/connecting.html) after making you'r deployment you can set you'r ELASTICSEARCH_ENDPOINT and ELASTICSEARCH_API_KEY in .env file.

After the indexing of the posts in Elasticsearch is finished, a sms will send to number that you set OWNER_MOBILE in .env file and also I use [Candoo](http://my.candoosms.com)  sms service that you have to signu up and set SMS_NUMBER,SMS_USERNAME and SMS_PASSWORD in .env file.


 
After taht in order to dawnload docker images execut docker, run follow commands:
```bash
docker-compose build app
```
and then run:
```bash
docker-compose up -d
```
Now you can execute project on [localhost:1370](localhost:1370) 

It's time to data entry in database and ElasticSearch by runing the following conmmand:
```bash
docker-compose exec app php artisan migrate --seed
```
It takes a long time. because last seeder is createing 1 milion record in databae and elasticsearch. but don't wory you can use the system in same time.

Also for any seson if elasticseach datas destoryed don'n wory. that's enough jus run following command:
```bash
docker-compose exec app php artisan elastic-syncer
```
After running  above command you can observe the result in you'r teminal and finally in the end of this proccess a sms will send to number wich you set as OWNER_MOBILE in the .env file.

Finally I define a hepler function with a unit test that you cas pass it by the following comand:
```bash
docker-compose exec app php artisan test
```


## Technologies used

php 8.2

[laravel 10](https://laravel.com/docs/10.x)

[ElasticSearch](https://www.elastic.co/)

[Candoo SMS Service](http://my.candoosms.com/)

[Queue & job](https://laravel.com/docs/10.x/queues)
 




## Authors

- [@Hamid1ganeh2st](https://github.com/hamid1ganeh)

