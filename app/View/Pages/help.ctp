<script>
$(function() {
	$( "#accordion" ).accordion({ collapsible: true, heightStyle: "content", active: false });
});
</script>
</head>
<body>

	<div id="accordion" style="font-size: 14px" class="prefix_2 grid_8 suffix_2">
		<h3>How it works</h3>
		<div>
			<p>
				Smart Meals is a revolutionary step in meal planning and inventory
				tracking. Before you can use Smart Meals you must completely update
				your settings. After navigating to the settings tab, three tables
				and two sliders will be displayed. The first table allows you to
				tell us what your favorite meals are; these will be kept in mind
				while generating your perfect meal schedule. We also need to know
				what meals you don't like so we can avoid them.
				<Assumption> We only filter on meals because we assume that if you
				don't like a foodItem you wont buy it </Assumption>
				The last table in the row asks you to tell us what culinary
				appliances you have at your disposal; that way we can make the best
				informed decision on what you can make, and can't. After updating
				all the tables you should notice two sliders at the one on the left
				is the deviation slider. The farther right you move the slider the
				more deviation you like in your meals. All the way to the left tells
				us that you like the same meal at the same time every day, inventory
				permitting. The slider to the right of devation slider is the skill
				level slider. If you leave the slider all the way to the left we
				interpret this as you saying I can barely make pb and j's. If you
				move it all the way to the right we will throw any recipe we got at
				you Emeril =).
			</p>
			<p>Once we have all your settings in our system you have one step
				left between you and the greatest, easiest meals of your life.
				Navigate to the inventory page and add all the food items you
				currently have.</p>
			<p>After you have completed both the above tasks, navigate to the
				schedule page and select the number of days you would like to have a
				schedule generate for, then press generate. Our engine will take
				into account your inventory, settings, and preferences; giving you a
				schedule. Under the schedule you will find an Advance button and a
				discard button. When you click the advance button it asks you how
				many days. After you select the number of days the engine advances
				and removes the fooditems that were supposed to be used on the days
				passed from your inventory. If you didn't follow your schedule or
				are unhappy, you may decide to discard your schedule. When you click
				the discard button the system deletes the schedule and does not
				update your inventory; you are then redirceted to the generate
				schedule screen again to create a new one.</p>
			<p>
				That was a quick and dirty tutorial to introduce to the concepts and
				systems that make up Smart Meals. If you have any other specific
				questions, feel free to browse the topics below that go into more
				detail. <br> <br> - Team Dreams
			</p>
		</div>
		<h3>Updating Inventory</h3>
		<div>
			<p>
				Navigate to the Inventory page and you should be presented with a
				table that looks like this <img
					src="C:\Users\Owner\Pictures\WebApp\inventorytable.png"
					alt="Image could not load"> You will notice that the table has a
				list of what you have in your fridge. If you want to add items to
				the current list click the add button. When you click the add button
				you will be presented with a screen that looks like this (image goes
				here) <br> Use the text field to filter the results of the foodItem
				you desire. After clicking the add button you should see the food
				item now in the inventory table
			</p>
		</div>
		<h3>Updating Settings</h3>
		<div>
			<p>
				Upon navigating to the Settings page you will be presented with
				three tables in a row and two sliders underneath the tables. The
				first table allows you to tell us what your favorite meals are these
				will be kept in mind while generating your perfect meal schedule. We
				also need to know what meals you dont like so we can avoid them
				<Assumption> we only filter on meals because we assume if you dont
				like a foodItem you wont buy it </Assumption>
				The last table in the row asks you to tell us what culinary
				appliances you have at your disposale that way we can make the best
				informed descion on what you can make and cant. After updating all
				the tables you should notice two sliders the one on the left is the
				deviation slider. The father right you move the slider the more
				deviation you like in your meals. All the way to the left tells us
				that you like the same meal at the same time every day inventory
				permitting. The slider to the right of devation slider is the skill
				level slider. If you leave the slider all the way to the left we
				interpret this as you saying I can barely make pb and j's. If you
				move it all the way to the right we will thrown any recipe we got at
				you. There is a field for updating your email and password below the
				sliders.
			</p>
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
		</div>
		<h3>Changing a Schedule</h3>
		<div>
			<p>Navigate to the Schedule tab. If you have a schedule currently it
				will be displayed else you will be presented with the generate
				screen. If you are on the generate screeen just select the desired
				length of the schedule and click generate. If you have a schedule
				then click discard, which will redirect you to the generate form.</p>
		</div>
		<h3>Advancing a schedule</h3>
		<div>
			<p>When you have a schedule generated you need to actually move
				through the days. For example if your schedule is for 5 days then
				after when day you need to click advance and select the value 1.
				This will delete what was listed to be eaten from your inventory. If
				you didnt follow your schedule you must discard and update your
				inventory according.
			
			
			<p>
		
		</div>
		<h3>Discarding a Schedule</h3>
		<div>
			<p>Clcik the discard button and you will be presented with generate
				field again</p>
		</div>
		<!-- 		<h3>FAQ</h3> -->
		<!-- 		<div> -->
		<!-- 			<p></p> -->
		<!-- 			<br> -->
		<!-- 			<ul> -->
		<!-- 				<li>List item one</li> -->
		<!-- 				<li>List item two</li> -->
		<!-- 				<li>List item three</li> -->
		<!-- 			</ul> -->
		<!-- 		</div> -->
	</div>


</body>
</html>
