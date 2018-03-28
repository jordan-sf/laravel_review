## Overview
This application demonstrates an application written in PHP using the Laravel framework. It allows a site visitor to rate and review Things and to create new Things. The home page of the site lists all Things, ordered by rating (best to worst). From there, the user clicks on a Thing name to see all the reviews for that Thing, and then can click on an reviewer’s name to see just that review.
The application demonstrates various types of front-end and back-end validation. It assumes that the reviewer is already logged in somehow to the application.
A demo is available at http://ec2-35-153-175-172.compute-1.amazonaws.com/.

## Tests
(Behavior Driven Development style)

1. As a reviewer, in order to review a Thing, I need to create a new review for a Thing
2. As a reviewer, in order to review a Thing that doesn't exist in the system (uniqueness based on Thing name only), I need to be able to create Things
3. As a reviewer, in order to edit one of my reviews, I can navigate to an edit screen for a single review from the list of my reviews
4. As an administer, in order to help with content management, I need all reviews to be limited to 2000 characters
5. As a site visitor, in order to see a list of Things and the related reviews, I need an easy-to-use listing of all Things
6. As a site visitor, in order to find a Thing that I would be interested in, I need the Thing list to be sorted by rating
7. As an administer, in order to automatically show the edited review instead of the original, ensure all views show the edited/summarized reviews when applicable


### Future / Wish List Features

1. As a reviewer, in order to retract any of my reviews, I need to be able to delete a review I created
1. As a reviewer, in order to see which Things I've already reviewed, I need to see a list of all my own reviews only
1. As a reviewer, in order to edit one of my reviews, I can navigate to an edit screen for a single review from the list of my reviews 
1. As an administer, in order to prevent fraud, I need the application to enforce a deadline after which a review must not be able to edit an existing review
1. As an administer, in order to prevent fraud, I need the application to enforce a minimum time window between each review submission by the same reviewer
1. As an administer, in order to help with content management, I need all reviews to be limited to 2000 characters
1. As an administer, in order to ensure Things aren't inappropriately deleted, I need the application to only allow deleting a Thing if there are no reviews for it and ONLY allow deletion by the original creator
1. As a site visitor, in order to find a Thing that I would be interested in, I need the Thing list to be sortable by location
1. As a site visitor, in order to find a Thing that I would be interested in, I need the Thing list to be sortable by dates
1. As a site visitor, in order to find a Thing that I would be interested in, I need the Thing list to be sortable by rating
1. As a site visitor, in order to see if a review has been edited or not, I need to see some textual indicator of such
1. As a reviewer OR site visitor, in order to find a current Thing, I need the Thing list to be filterable by whether the Thing has ended or not
    - This helps focus social interest/excitement only on relevant Things
1. As an administer, in order to increase SEO and usability, I need urls to specific Things to use a slug instead of an id

<p align="center">Made with<br><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

