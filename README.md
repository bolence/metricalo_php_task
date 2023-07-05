Your task is to develop a RESTful API for a blog application using Laravel.

The API should allow users to register, log in, create, view, update, and delete their own posts.

Logged-in users should be able to see posts from other users but should not be able to modify or delete
them.

The slug for each post should be unique and can be set during post creation or automatically generated
if not provided within the request.

Slugs can be modified even after the post has been created.

User registration and login should be implemented using Laravel Passport.

Endpoints for posts have to be covered with tests.

You shouldn't use any external library for this test.
