

## Requirements

In order to build the working environment, docker & docker-compose must be installed on your end



## Environment installation

Run make start - make migrate-fresh in the root folder.

Run docker exec -it my_frontend /bin/bash     to log into frontend console and then run 
cd test-assignment-frontend
npm run install
npm run dev

## How to run tests
make migrate-fresh
make test

## How to run it

Frontend app link is http://localhost:8080/
Backend app api link is http://localhost/api/

## Current solution 

-Frontend <br />
First time I'm using vite and I enjoyed it. I've seperated the frontend from the backend because in a big application things get messier. I've put them in the same folder to run the apps at the same time. Its under folder Frontend.
After creating fields for a subscription, subscriber fills the form with the added fields and the frontend app lists all the subscriptions. 
In a real world application, I would use a state manager like vuex, router and make the polling better by making different components talk with each other.

-Backend <br />
We have Field, Subscriber and FieldValue models with resources and api routes. Field and Subscriber models have their own restful controllers. Just to show enum example, I've created SubscriberState helper and used it in the SubscriberController. 
I've created a rule to check whether any given email has valid domain and mx records which is called ValidDomain.
I've created factories and planted them in the database seeder as an example.
I haven't linked models in database level
I created a basic exception handler.
I've created several tests but there is room for improvement

Routes
  GET|HEAD        api/fields ................... fields.index › Api\FieldController@index  <br />
  POST            api/fields ................... fields.store › Api\FieldController@store  <br />
  GET|HEAD        api/fields/{field} ............. fields.show › Api\FieldController@show  <br />
  PUT|PATCH       api/fields/{field} ......... fields.update › Api\FieldController@update  <br />
  DELETE          api/fields/{field} ....... fields.destroy › Api\FieldController@destroy  <br />
  GET|HEAD        api/subscribers .... subscribers.index › Api\SubscriberController@index  <br />
  POST            api/subscribers .... subscribers.store › Api\SubscriberController@store  <br />
  GET|HEAD        api/subscribers/{subscriber} subscribers.show › Api\SubscriberController@show <br />
  PUT|PATCH       api/subscribers/{subscriber} subscribers.update › Api\SubscriberController@update <br />
  DELETE          api/subscribers/{subscriber} subscribers.destroy › Api\SubscriberController@destroy <br />


## Final Notes
It took longer than I expected because I've just bought a new computer and started installing everything from scratch. Docker took a lot of my time and I also lost time configuring vite with docker. The new computer has a M1 chip which made things harder for me because normally I would use webdevops docker images for laravel but with M1 chip it failed to work. If you have any problems while setting up please contact. I would appreciate any kind of feedback