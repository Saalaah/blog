
## About the project

Blogs project(BY LARAVEL framework) contain of <br />
- Users <br />
- Posts <br />
- Comments <br />

## Used Packages
- Passport (For API Authentication) <br />

## How to Run
1-First clone the project <br />
2-Serve the project (PHP artisan serve) <br />
3-Open Postman <br />
4-Create user throw this route (http://127.0.0.1:8000/api/createUser)=>Post request<br />
example data : {"name":"salah","email":"salah@gmail.com","password":"12345678"}<br />
5-login throw this route (http://127.0.0.1:8000/api/login)=>Post request <br />
6-open new tab and use the token from the previuos step in headers like [Authorization : bearer dnsajdjskabdjskabdjkbad]<br />
now you are authorized to create Posts and add comments to them (+ editing and deleting)

## Project routes

1-/addPost     &nbsp; &nbsp;    =>Post=> ex:{"body":"first post"} <br />
2-/editPost/{id}  &nbsp; &nbsp;   =>Post=> ex:{"body":"first post edited"} <br />
3-/deletePost/{id}  &nbsp; &nbsp; =>get<br />
4-/all            &nbsp; &nbsp;   =>get &nbsp; &nbsp;//showing all the posts <br />
5-/post/{id}       &nbsp; &nbsp;  =>get&nbsp; &nbsp; //showing certain post by its id <br />

6-/addComment     &nbsp; &nbsp;   =>Post=> ex:{"comment_body":"first comment","post_id":1} <br />
7-/editComment/{id}  &nbsp; &nbsp;=>Post=> ex:{"comment_body":"first comment edited"} <br />
8-/deleteComment/{id} &nbsp; &nbsp;=>get
9-/postComment/{id} &nbsp; &nbsp;=>get&nbsp; &nbsp; //showing certain post comments <br />
