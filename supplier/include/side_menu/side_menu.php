
<div class="sidebar-menu">

	<header class="logo-env">

		<!-- logo -->
		<div class="logo">
			<a href="dashboard.php">
				<h3 style="color:#fff;">Tourbookings</h3>
			</a>
		</div>

				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>


		<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>

	</header>


	<ul id="main-menu" class="">
		<li style="display:none;" id="search">
			<form method="get" action="#">
				<input type="text" name="q" class="search-input" placeholder="Search something..." />
				<button type="submit"><i class="entypo-search"></i></button>
			</form>
		</li>
		<li class="opened active">
			<a href="dashboard.php"><i class="entypo-gauge"></i><span>Dashboard</span></a>
		</li> 
		<li>
			<a href=""><i class="entypo-layout"></i><span>Tour</span></a>
			<ul>
				<li>
					<a href="supplier_create_tour.php"><span>Create Tour</span></a>
				</li>
				<li>
					<a href="show_tour.php"><span>Show Tour</span></a>
				</li>
			</ul>
		</li>

		<li style="display:none;">
			<a href="membership.php"><i class="entypo-layout"></i><span>Membership</span></a>


		</li>
		<li>
			<a href=""><i class="entypo-layout"></i><span>B2C Booking</span></a>
			<ul>
			<!--	<li>
					<a href="today_booking.php"><span>Today's Booking</span></a>
				</li>	-->
				<li>
					<a href="recent_booking.php"><span>Pending Booking</span></a>
				</li>
				<li>
					<a href="confirm_booking.php"><span>Confirm Booking</span></a>
				</li>
				<li>
					<a href="cancel_booking.php"><span>Cancel Booking</span></a>
				</li>
				<!--<li>
					<a href="booking_list.php"><span>Booking List</span></a>
				</li>	-->
			</ul>
		</li>
		<li>
			<a href=""><i class="entypo-layout"></i><span>B2B Booking</span></a>
			<ul>	
				<!--<li>
					<a href="today_booking.php"><span>Today's Booking</span></a>
				</li>-->		
				<li>
					<a href="supplier_pending_booking.php"><span>Pending Booking</span></a>
				</li>			
				<li>
					<a href="supplier_confirm_booking.php"><span>Confirm Booking</span></a>
				</li>				
				<li>
					<a href="supplier_cancel_booking.php"><span>Cancel Booking</span></a>
				</li>	
			</ul>
		</li>

		<li>
			<a href=""><i class="entypo-layout"></i><span>Account</span></a>
				<ul>
					<li>
						<a href="my_balance.php"><span>My Transactions</span></a> 
					</li>
					<li>
						<a href="payment_due.php"><span>My Earnings</span></a>
					</li>
					<li>
						<a href="payment_deposit.php"><span>Deposit</span></a>
					</li>
					<li>
						<a href="cc_paypal_payment_deposit.php"><span>CreditCard/ Paypal Deposit</span></a>
					</li>
					<li>
						<a href="withdraw.php"><span>Withdraw</span></a>
					</li>
					<li>
						<a href="account_list.php"><span>Bank Account</span></a>
					</li>
					<li>
						<a href="changepassword.php"><span>Account Details</span></a>
					</li>
					
				</ul>

		</li>
		<li>
			<a href=""><i class="entypo-layout"></i><span>My Shop</span></a>
				<ul>
					<li>
						<a href="myshop_tours.php"><span>Tours</span></a>
					</li>
					<li>
						<a href="voucher.php"><span>Voucher</span></a>
					</li>
				</ul>

		</li>

	</ul>

</li>


		</ul>


</div>
