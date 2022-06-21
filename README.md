

## Requirements

In order to build the working environment, docker & docker-compose must be installed on your end



## Environment installation

Run make start - make migrate in the root folder.

Run docker exec -it my_frontend /bin/bash     to log into frontend console and then run npm run install and npm run dev


## How to run it

Frontend app link is http://localhost:8080/
Backend app api link is http://localhost/api/

## Current solution 

-Frontend
First time I'm using vite and I enjoyed it. I've seperated the frontend from the backend because in a big application things get messier. I've put them in the same folder to run the apps at the same time. Its under folder Frontend.
After creating fields for a subscription, subscriber fills the form with the added fields and the frontend app lists all the subscriptions. 

-Backend
We have Field, Subscriber and FieldValue models with resources and api routes. Field and Subscriber models have their own restful controllers. Just to show enum example, I've created SubscriberState helper and used it in the SubscriberController. 
I've created a rule to check whether any given email has valid domain and mx records which is called ValidDomain.
I've created factories and planted them in the database seeder as an example.
I haven't linked models in database level
I've created several tests but there is room for improvement

Routes
  GET|HEAD        api/fields ................... fields.index › Api\FieldController@index
  POST            api/fields ................... fields.store › Api\FieldController@store
  GET|HEAD        api/fields/{field} ............. fields.show › Api\FieldController@show
  PUT|PATCH       api/fields/{field} ......... fields.update › Api\FieldController@update
  DELETE          api/fields/{field} ....... fields.destroy › Api\FieldController@destroy
  GET|HEAD        api/subscribers .... subscribers.index › Api\SubscriberController@index
  POST            api/subscribers .... subscribers.store › Api\SubscriberController@store
  GET|HEAD        api/subscribers/{subscriber} subscribers.show › Api\SubscriberController@show
  PUT|PATCH       api/subscribers/{subscriber} subscribers.update › Api\SubscriberController@update
  DELETE          api/subscribers/{subscriber} subscribers.destroy › Api\SubscriberController@destroy




