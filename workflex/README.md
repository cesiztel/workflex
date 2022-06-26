## Installation

I used laravel sail to run the laravel application inside a container. You can easily can run the application
running `sail up`

## Data modeling

In this example application we are going to use the following database model.
I omit the primary keys and relationship keys for simplicity:

```
user
    email
    profile_id
    profile_type
workers:
    attributes:
        - first_name
        - last_name
    relationships:
        - gig_applications: A worker has many applications
        - ratings: A worker has many ratings
companies:
    attributes:
        - name
        - description
        - location
    relationships:
        - gigs: A company has many gig_offers
        - ratings: A company has many ratings
gig_categories:
    attributes:
        - name
    relationships:
        - gig_subcategories: A category has many subcategories
gig_subcategories:
    attributes:
        - name
    relationships:
        - gig_categories: A subcategory has one category
shifts:
    attributes:
        - started_at
        - ends_at
        - payment: rate hourly
    relationships:
        - gigs: A gig_shift has one gig
gigs:
    attributes:
        - description
        - language_requirements: JSON field
        - skills_requirements: JSON field
        - etiquette_requirements: JSON field
        - status: Draft, Publish, Allocated, WorkDone, Closed
        - allocated_at
        - published_at
        - done_at
        - closed_at
    relationships:
        - companies: A gig has been published by one company
        - shifts: A gig has many shifts
        - gig_applications: A gig has many applications
gig_applications:
    attributes:
        - status: Submitted, Allocated, Rejected
        - allocated_at
        - rejected_at
    relationships:
        - gigs: An application has one gig
        - workers: An application has one worker
        - shifts: An allocated application has one shift
ratings:
    attributes:
        - rateable_id: The ID of the worker or the company
        - rateable_type: worker, company
        - gig_id
        - rate: from 1 to 5 number
```

## Project structure

This project represents the structure that almost any Laravel projects starts with
some additions:

- I assumed that I want to use the same API for the regular decoupled front-end UI
  and also for the admin panel, that's why I separated the endpoints of the API in three
  files:

```
- admin.company.api
- admin.worker.api
- api
```

To achieve that I changed the `RouteServiceProvider to accomodate that three routes, depending on the route prefix.
Check the documentation of Laravel to have the ability to do the same on domain layer.

- Creation of regular `migrations`, `seeds` and `factories`
- The main `app` folder is divided on:

- Data: value objects directly map from from the request. Use the library [spatie laravel-data](https://spatie.be/docs/laravel-data/v1/as-a-resource/from-data-to-resource)
- Http\Api: where all the controlers are going to live for the API. There is one folder called `Shared` created for the
  `AuthenticationController` for conveniency. The Api folder is divided by `Admin` and `Controllers`. Admin has it's own
  Controller. Controllers will have the minimun code as possible that's why the duplication on certain cases is insignificant
  in comparison with the benefit of dividing the controllers.
- Repositories: Using repository pattern which is easy to test and even adding an extra laying to interact with the business logic
  allow clear separation of responsibilities.
- Services: Using this classes to encapsulate all the third party activities. Authentication is consider a third party activity because
  can be easily re-implement with other technique.
- tests: Unit tests and Feature tests. Unit should represents the same structure as the same app folder. So I created a Repositories
  folder and one unit test per each one, using `Mockery` and using testing patter Arrange - Action - Assert

### Controllers

Controller has the minimun code as possible. So, we use the service container to inject the repositories by constructor or via method
injection. Ex:

```
class GigCategoryController extends Controller
{
    public function index(GigCategoryRepositoryInterface $repository)
    {
        return $repository->all();
    }
}
```

### Repositories

All concrete repositories implements it's own repository interface which allow to use it in the app binding.
That interface extends for more abstract interface which includes the main methods every repository should
implement:

```
interface RepositoryInterface
{
    public function all();

    public function create(Data  $data);

    public function update(Data $data, $id);

    public function delete($id);

    public function find($id);
}
```

### Authentication

Simple authentication with Laravel Sactum. To encapsulate the generation of tokens, create an `AuthServiceToken` which
executes the main logic

### Work in progress

- Adding swagger API documention.
- Adding Grafana to the container for monitoring an logging
- Adding events to trigger actions for create more complex flows.
- Adding the Docker image to ECS and deploy in AWS using ECR and Github Actions.
