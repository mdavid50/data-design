<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
	</head>
	<body>
		<h1>Data Design Project</h1>

		<h2>Persona</h2>

		<p>	Cleatus is a 42 year old male who has visited the Albuquerque area during Balloon Fiesta for
		10 years running. He is an avid promoter his favorite balloon gathering but has limited talent and abilities on
		his Gateway2000. </p>

		<h2>User Story</h2>
		<p> Cleatus is a registered user to the sight and would like to comment on the post.</p>

		<h2>Use Case/ Interaction Flow</h2>
		<P><strong>Story:</strong> As a registered user Cleatus would like to comment on the post.</P>

		<ol>
			<li>Cleatus clicks comment.</li>
			<li>The sight loads the post, all previous comments, and a comment input field.</li>
			<li>Cleatus clicks on the input field</li>
			<li>The sight displays a coursor  in the text input field</li>
			<li>Cleatus types his comment and presses submit button</li>
			<li>The sight reloads to display original post, all previous comments including Cleatus's, and a
			clear comment input field.</li>
		</ol>

		<h2>Conceptual Model</h2>
			<h3>Profile</h3>
		<ul>
			<li>postfieldId (primary key)</li>
			<li>postTitle</li>
			<li>postDate</li>
			<li>postProfile</li>
			<li>postContent</li>
			<li>postCommentsCount</li>
		</ul>

			<h3>Comment</h3>
		<ul>
			<li>commentId</li>
			<li>commentProfileId</li>
			<li>commentDate</li>
		</ul>
		<h2>Relation</h2>
		<ul>
			<li>One user can have many posts</li>
			<li>Many posts can have many comments</li>
			<li>Many users can have many comments</li>
		</ul>
	</body>
</html>