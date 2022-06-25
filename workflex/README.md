## Installation

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
