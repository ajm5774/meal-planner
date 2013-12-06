<script>
$(function() {
	$( "#accordion" ).accordion({ collapsible: true, heightStyle: "content", active: false });
});
</script>
</head>
<body>

	<div id="accordion" style="font-size: 14px"
		class="prefix_4 grid_16 suffix_4">
		<h3>How it works</h3>
		<div>
			<p>Smart Meals is a revolutionary step in meal planning and inventory
				tracking. Upon first registering your account you will be directed
				through a two part set up phase.</p>
			<br>
			<p>
				<b>Phase 1 (Skills, Inventory, and Appliances)</b> Once you have
				registered you will be taken through the following screen <br> <img
					src="\images\setup1.png" align="middle"> <br> After filling out the
				form click the submit button at which time you will be presented
				with the following screen. <br> <b>Phase 2 (Favorites and Dislikes)</b>
				<br> <img src="\images\setup2.png" align="middle"> <br> After
				completing the last form and submiting you should now be redirected
				to the generate the schedule screen. You should now be completely
				set up.

			</p>
			<p>You may update these settings at anytime by clicking on them
				appropriate tab. Once directed you shall be presented with correct
				form to edit and update the desired field</p>
		</div>
		<h3>Meal Creation</h3>
		<div>
			<p>Under the hood Smart Meals uses a special creation algorithum that
				takes into account the following items:
			
			
			<ul>
				<li><b>Deviation</b><br>
					<p>The Deviation slider tells us how you like you meals to be
						structured Do you like having the same thing every day? If so
						slide the slider all the way to the left. If you like something
						completely different slide the slider to right.</p></li>
				<li><b>Skill Level</b><br>
					<p>The skill slider is ment to represent your skill level at
						cooking. Move the slider all the way to the left to indicit that
						you struggle making PB&J. Move the slider all the way to the right
						to indicate there is no recipe that you fear.</p></li>
				<li><b>Favorite Meals</b><br>
					<p>This is table containing all the recipes we can think of. We
						only worry about recipes becuase we assume you wont buy anthing
						that you dont like.</p>
				
				<li><b>Disliked Meals</b><br>
					<p>This table represents all the recipes that you dont enjoy. Any
						recipe you specify here will be avoid when making your
						personalized schedule.</p>
				
				<li><b>Appliances Available</b><br>
					<p>Think of this as your kitchen. List all cooking items that you
						have and are comfortable using. This will allow us to further
						refine our meal creation results for you.</p>
				
				<li></li>
			</ul>
			</p>
		</div>
		<h3>Updating Inventory</h3>
		<div>
			<p>
				Navigate to the Inventory page and you should be presented with a
				table that looks like this<br> <img src="\images\add.png"
					align="middle"> <br> You will notice that the table has a list of
				what you have in your fridge. Use the text field to filter the
				results of the foodItem you desire. After clicking the add button
				you should see the food item now in the inventory table
			</p>
		</div>
		<h3>Updating Settings</h3>
		<div>
			<p>Upon navigating to the Settings page you will be presented with a
				form on the left. The form has a field for email and two sliders for
				skill and deviation. The changes wont be persisted until you click
				the submit button. This also has the appliances table. This table
				works the same as all the others</p>
			<br> <img src="\images\settings.png" align="middle">
		</div>
		<h3>Create a Schedule</h3>
		<div>
			<p>To create a schedule navigate to the schedule page. If you already
				have a schedule then you will be presented with it. To create a new
				schedule click the discard button. This will then take you to the
				generate page which will present you with a numerical select box.
				Select the number of days you would like the schedule to be gnerated
				for and click generate. You will be presented with a status bar
				indicating that the system is working on schedule. If the system was
				able to generate a Schedule it will be rendered for you to work with
				or discard.</p>
			<br> <img src="\images\generate.png" align="middle">
		</div>
		<h3>Changing a Schedule</h3>
		<div>
			<p>Navigate to the Schedule tab. If you have a schedule currently it
				will be displayed else you will be presented with the generate
				screen. If you are on the generate screeen just select the desired
				length of the schedule and click generate. If you have a schedule
				then click discard, which will redirect you to the generate form.</p>
			<br> <img src="\images\schedule.png" align="middle">
		</div>
		<h3>Advancing a schedule</h3>
		<div>
			<p>
				Smart Meals allows you to choose what meals you ate. The schedule
				has the make meal button associated with each meal of the day.
				Clicking this button removes the meal from the schedule and also
				removes the ingrediants from your inventory. <br> <img
					src="\images\schedule.png" align="middle">
			
			
			<p>
		
		</div>
		<h3>Discarding a Schedule</h3>
		<div>
			<p>Clcik the discard button and you will be presented with generate
				field again</p>
			<br> <img src="\images\schedule.png" align="middle">
		</div>
	</div>


</body>
</html>
