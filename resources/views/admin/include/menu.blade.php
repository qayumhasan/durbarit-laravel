	<!-- sidebar area -->
	<aside class="sidebar-wrapper ">
		<nav class="sidebar-nav">
			<ul class="metismenu" id="menu1">

				<li class="single-nav-wrapper">
					<a href="" class="menu-item">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Deshboard</span>
					</a>
				</li>

				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Customers</span>
					</a>

					<ul class="dashboard-menu">
						<li><a href="{{route('admin.customar.create')}}">Add Customer</a></li>
						<li><a href="{{route('admin.customar.index')}}">Manage Customer</a></li>
					</ul>
				</li>



				<li class="single-nav-wrapper">

					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Purchase</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('admin.category.index')}}">Category</a></li>
						<li><a>Sub Category</a></li>
						<li><a href="{{route('admin.product.index')}}">Product List</a></li>
						<li><a>Stocks</a></li>
						<li><a>Supplier</a></li>
						<li><a>Add Purchase</a></li>
						<li><a>Product Receive List</a></li>
						<li><a>Product Issue</a></li>
						<li><a href="{{route('admin.order.index')}}">InHouse Orders</a></li>
						
					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Accounts</span>
					</a>

					<ul class="dashboard-menu">

						<li><a>Bank Accounts</a></li>
						<li><a>Payment Methods</a></li>
						<li><a>Chart Of Accounts</a></li>
						<li><a>Accounts</a></li>
						<li><a>Cost Center</a></li>
						<li><a>Daily Expense</a></li>
						<li><a>Expense</a></li>
						<li><a>Income</a></li>
						<li><a>Debit Credit Voucher</a></li>
						<li><a>Investment</a></li>
						<li><a>Transfer</a></li>

					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Invoice</span>
					</a>

					<ul class="dashboard-menu">
						<li><a href="{{route('admin.invoice.create')}}">Invoice Create</a></li>
						<li><a href="{{route('admin.invoice.list')}}">Invoice List</a></li>
						<li><a href="{{route('admin.invoice.setting')}}">Invoice Setting</a></li>
					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Quatations</span>
					</a>

					<ul class="dashboard-menu">

						<li><a>Add Quatation</a></li>
						<li><a>Quatation List</a></li>

					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Project</span>
					</a>
					<ul class="dashboard-menu">

						<li><a>My Task</a></li>
						<li><a href="{{route('admin.invoice.product.index')}}">Projects</a></li>
						<li><a href="{{route('admin.invoice.project.category.index')}}">Projects Category</a></li>
						<li><a>Teams</a></li>

					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Human Resources</span>
					</a>

					<ul class="dashboard-menu">

						<li><a href="{{route('admin.staff.index')}}">Staff Directory</a></li>
						<li><a href="{{route('admin.staff.attendance.index')}}">Staff Attendance</a></li>
						<li><a href="{{route('admin.staff.attendance.report.index')}}">Attendance Report</a></li>
						<li><a href="{{route('admin.payroll.index')}}">Payroll</a></li>
						<li><a>Payroll Reports</a></li>
						<li><a href="{{route('admin.staff.role.index')}}">Staff Role</a></li>
						<li><a href="{{route('admin.staff.designation.index')}}">Designation</a></li>
						<li><a href="{{route('admin.staff.department.index')}}">Department</a></li>
						<li><a>Cash Issue</a></li>


					</ul>

				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Leave Management</span>
					</a>
					<ul class="dashboard-menu">

					<li><a href="{{route('admin.leave.index')}}">Apply Leave</a></li>
						<li><a>Approve Leave Request</a></li>
						<li><a>Leave Define</a></li>
						<li><a href="{{route('admin.leave.type.index')}}">Leave Type</a></li>
					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Communication</span>
					</a>
					<ul class="dashboard-menu">

						<li><a>Notice Board</a></li>
						<li><a href="{{route('admin.sms.setting')}}">Send Email/SMS</a></li>
						<li><a>Email/SMS Logo</a></li>
						<li><a>Email/SMS Event</a></li>
					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Ticket</span>
					</a>
					<ul class="dashboard-menu">

						<li><a>Category</a></li>
						<li><a>Priority</a></li>
						<li><a>Ticket List</a></li>
					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Reports</span>
					</a>
					<ul class="dashboard-menu">

						<li><a>Profit Report</a></li>
						<li><a>User Log</a></li>
						<li><a>Cost Center Report</a></li>
						<li><a>Details Report</a></li>
						<li><a>Income Report</a></li>
						<li><a>Income Statement</a></li>
						<li><a>Ledger Report</a></li>
						<li><a>Bank Ledger</a></li>
						<li><a>Bank Book</a></li>
						<li><a>Purchase Report</a></li>
						<li><a>Sales Report</a></li>

					</ul>
				</li>


				<li class="single-nav-wrapper">
				<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">Frontend Settings</span>
					</a>

					<ul class="dashboard-menu">

						<li><a href="{{route('slider.index')}}">Slider/Banner</a></li>
						<li><a href="{{route('admin.aboutus.index')}}">About Us</a></li>
						<li><a href="{{route('admin.service.index')}}">Our Services</a></li>
						<li><a href="{{route('admin.whychoseus.index')}}">Why Choose Us</a></li>
						<li><a href="{{route('admin.strength.index')}}">Our Strengths</a></li>
						<li><a href="{{route('admin.video.index')}}">Video Section</a></li>
						<li><a href="{{route('admin.project.index')}}">Our Project</a></li>
						<li><a href="{{route('admin.client.index')}}">Our Client Say</a></li>
						<li><a href="{{route('admin.partner.index')}}">Our Partners</a></li>
						<li><a href="{{route('admin.career.index')}}">Career</a></li>
						<li><a href="{{route('admin.apply.index')}}">Apply Candidate</a></li>
	                	<li><a href="{{route('admin.team.index')}}">Our Teams</a></li>
						<li><a href="{{route('admin.page.index')}}">Pages</a></li>
						<li><a href="{{route('admin.social.index')}}">Social</a></li>
						<li><a href="{{route('admin.contactinformation')}}">Contact Information</a></li>
						<li><a href="{{route('admin.contactmessage.index')}}">Contact Message</a></li>
						<li><a href="{{route('admin.logo.index')}}">Site Logo</a></li>
						<li><a href="{{route('admin.subscriber.index')}}">Subscriber</a></li>
	                    
						
					</ul>

				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">System Settings</span>
					</a>
					<ul class="dashboard-menu">

						<li><a href="{{route('admin.seo.edit')}}">Seo Setting</a></li>
						<li><a>General Settings</a></li>
						<li><a>Manage currency</a></li>
						<li><a>Background Settings</a></li>
						<li><a>Role</a></li>
						<li><a>Base Setup</a></li>
						<li><a href="{{route('admin.payment.setting.index')}}">Payment Method Settings</a></li>
						<li><a>Holiday</a></li>
						<li><a>Email Settings</a></li>
						<li><a>Sms Settings</a></li>
						<li><a>Weekend</a></li>
						<li><a>Language Settings</a></li>
						<li><a>Language Settings</a></li>
						<li><a>Backup</a></li>


					</ul>
				</li>




<!-- 


				<li class="single-nav-wrapper">
					<a href="{{route('admin.home')}}" class="menu-item">
						<span class="left-icon"><i class="fas fa-home"></i></span>
						<span class="menu-text">home</span>
					</a>
				</li>
				<li class="single-nav-wrapper">
					<a href="{{route('admin.product.index')}}" class="menu-item">
						<span class="left-icon"><i class="fab fa-product-hunt"></i></span>
						<span class="menu-text">Product</span>
					</a>
				</li>
				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Services</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('admin.invoice.product.index')}}">Invoice Product</a></li>
						<li><a href="{{route('admin.invoice.project.category.index')}}">Category</a></li>
					</ul>
				</li>
				<li class="single-nav-wrapper">
					<a href="{{route('admin.category.index')}}" class="menu-item">
						<span class="left-icon"><i class="fab fa-cuttlefish"></i></span>
						<span class="menu-text">Category</span>
					</a>
				</li>

				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-laptop-code"></i></span>
						<span class="menu-text">Frontend Setup</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('slider.index')}}">Slider/Banner</a></li>
						<li><a href="{{route('admin.service.index')}}">Our Services</a></li>
						<li><a href="{{route('admin.video.index')}}">Video Section</a></li>
						<li><a href="{{route('admin.aboutus.index')}}">About Us</a></li>
						<li><a href="{{route('admin.project.index')}}">Our Project</a></li>
						<li><a href="{{route('admin.career.index')}}">Career</a></li>
						<li><a href="{{route('admin.team.index')}}">Our Teams</a></li>
						<li><a href="{{route('admin.client.index')}}">Our Client Say</a></li>
					</ul>
				</li>



				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Human resource</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('admin.staff.index')}}">Staff Directory</a></li>
						<li><a href="{{route('admin.staff.role.index')}}">Staff Role</a></li>
						<li><a href="{{route('admin.staff.department.index')}}">Staff Department</a></li>
						<li><a href="{{route('admin.staff.designation.index')}}">Staff Designation</a></li>
						<li><a href="{{route('admin.staff.attendance.index')}}">Staff Attendance</a></li>
						<li><a href="{{route('admin.staff.attendance.report.index')}}">Attendance Report</a></li>
						<li><a href="{{route('admin.payroll.index')}}">Payroll</a></li>
					</ul>
				</li>

				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Invoice</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('admin.invoice.create')}}">Invoice Create</a></li>
						<li><a href="{{route('admin.invoice.list')}}">Invoice List</a></li>
						<li><a href="{{route('admin.invoice.setting')}}">Invoice Setting</a></li>
					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Leave Management</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('admin.leave.index')}}">Apply Leave</a></li>
						<li><a href="{{route('admin.leave.type.index')}}">Leave Type</a></li>
					</ul>
				</li>


				<li class="single-nav-wrapper">
					<a href="{{route('admin.whychoseus.index')}}" class="menu-item">
						<span class="left-icon"><i class="fas fa-crop-alt"></i></span>
						<span class="menu-text">Whychoseus</span>
					</a>
				</li>
				<li class="single-nav-wrapper">
					<a href="{{route('admin.contactmessage.index')}}" class="menu-item">
						<span class="left-icon"><i class="far fa-comments"></i></span>
						<span class="menu-text">Contact Message</span>
					</a>
				</li>
				<li class="single-nav-wrapper">
					<a href="{{route('admin.apply.index')}}" class="menu-item">
						<span class="left-icon"><i class="far fa-comments"></i></span>
						<span class="menu-text">Apply Candidate</span>
					</a>
				</li>
				<li class="single-nav-wrapper">
					<a href="{{route('admin.order.index')}}" class="menu-item">
						<span class="left-icon"><i class="fa fa-shopping-basket"></i></span>
						<span class="menu-text">InHouse Orders</span>
					</a>
				</li>

				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-hammer"></i></span>
						<span class="menu-text">Footer</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('admin.partner.index')}}">Our Partners</a></li>
						<li><a href="{{route('admin.page.index')}}">Pages</a></li>
						<li><a href="{{route('admin.aboutus.index')}}">About Us</a></li>
						<li><a href="{{route('admin.social.index')}}">Social</a></li>
						<li><a href="{{route('admin.contactinformation')}}">ContactInformation</a></li>
					</ul>
				</li>

				<li class="single-nav-wrapper">
					<a class="has-arrow menu-item" href="#" aria-expanded="false">
						<span class="left-icon"><i class="fas fa-cogs"></i></span>
						<span class="menu-text">Setting</span>
					</a>
					<ul class="dashboard-menu">
						<li><a href="{{route('admin.seo.edit')}}">Seo</a></li>
						<li><a href="{{route('admin.subscriber.index')}}">Subscriber</a></li>
						<li><a href="{{route('admin.user.index')}}">Users</a></li>
						<li><a href="{{route('admin.sms.setting')}}">Sms Setting</a></li>
						<li><a href="{{route('admin.logo.index')}}">Site Logo</a></li>
						<li><a href="{{route('admin.payment.setting.index')}}">Payment Setting</a></li>


					</ul>
				</li>
 -->



			</ul>
		</nav>
	</aside><!-- /sidebar Area-->

	<script>
		$(document).ready(function() {
			// preloader
			$(window).on("load", function() {
				$(".preloader").fadeOut();
			});


			$('.sidbar-toggler-btn').click(function() {
				$('.wrapper').toggleClass('wrapper_active');
				$('.sidebar-wrapper').toggleClass('active-nav-wrapper');
				$('.sidebar-wrapper').toggleClass(' active-sidbar');
				$('.single-nav-wrapper').toggleClass('single-nav-wrapper-active');
			});
			$('.responsive_menu_toggle').click(function() {
				$('.wrapper').toggleClass('wrapper_responsive_active');
			});


			$('[data-toggle="tooltip"]').tooltip();

		});
	</script>