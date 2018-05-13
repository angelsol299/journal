# journal
Journal blog

Student project for a Jouney blog. It has the following characteristics:

*Session expire (5MINS)
*login/log out
*CRUD Post
*User registration
*Responsive design



Database on MySQL with the following characteristics:

DB:entries

 entryID	title	content	createdAt	userID
INT (AI)(PK)	VARCHAR(100)	VARCHAR(1000)	DATETIME	INT
users

 userID	username	password
INT (AI)(PK)	VARCHAR(50)	VARCHAR(200)
