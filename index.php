<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Matt David Data Design</title>
	</head>
	<body>
		<h1>Data Design Project</h1>
		
		<img src="images/cleatus.jpg" alt="photo of Cleatus"/>

		<h2>Persona</h2>

		<p><strong>Name:</strong> Cleatus</p>

		<p><strong>Age:</strong> 42</p>

		<p><strong>Profession:</strong> Cellular Technician</p>

		<p><strong>Technologies:</strong> Gateway 2000 desktop and managed to get Windows 10 to run and Motorola
			"push to talk"</p>

		<p><strong>Attitude and Behaviors:</strong> Cleatus is a boisterous and friendly fellow that enjoys finding
		a reason to strike up a conversation with someone that cant leave like a gas station, bartender attendant or
			anyone working behind a counter. He is the classic "one upper" when it comes to story telling and
		knowing the latest and greatest in technology even though he cant afford any of it.</p>

		<p><strong>Frustrations and Needs:</strong> Cleatus must be the first to comment on anything. Since his
		trusty Gateway is so so slow he needs all functions on a site to be simple and accessible.</p>

		<p><strong>Goal:</strong> To chime in on anything Cellular related.</p>

		<p><strong>User Story:</strong> As a user Cleatus needs needs simple and easily accessible functions so he
		can comment as quickly as his computer will allow and a time stamp to know he was first to respond.</p>

		<h2>User Story</h2>
		<p> Cleatus is a registered user to the sight and would like to comment on the post.</p>

		<h2>Use Case/ Interaction Flow</h2>
		<P><strong>Story:</strong> As a registered user Cleatus would like to comment on the post.</P>

		<ol>
			<li>Cleatus clicks comment.</li>
			<li>The sight loads the post, all previous comments, and a comment input field.</li>
			<li>Cleatus clicks on the input field</li>
			<li>The sight displays a courser  in the text input field</li>
			<li>Cleatus types his comment and presses submit button</li>
			<li>The sight reloads to display original post, all previous comments including Cleatus's, and a
			clear comment input field.</li>
		</ol>

		<h2>Conceptual Model</h2>
			<h3>Profile</h3>
		<ul>
			<li>profileId (primary key)</li>
			<li>profileHandle</li>
			<li>profielEmail</li>
			<li>profilePhone</li>
			<li>profileHash</li>
			<li>profileSalt</li>
		</ul>

			<h3>Post</h3>
			<ul>
				<li>postId (primary key)</li>
				<li>postProfileId (foreign key)</li>
				<li>postTitle</li>
				<li>postContent</li>
				<li>postDate</li>
			</ul>

			<h3>Comment</h3>
		<ul>
			<li>commentId (primary)</li>
			<li>commentPostId(foreign)</li>
			<l>commentProfileId (foreign)</l>
			<li>commentDate</li>
			<li>commentContent</li>
			<li>commentCommentId (foreign)</li>
		</ul>
		<h2>Relation</h2>
		<ul>
			<li>One user can have many posts (1 to n)</li>
			<li>One post can have many comments (1 to n)</li>
			<li>One user can have many comments (1 to n)</li>
		</ul>

		<img src="images/erd.jpg" alt="erd model">
	</body>
</html>