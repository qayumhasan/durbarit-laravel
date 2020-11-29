	<!-- sidebar area -->
    <aside class="sidebar-wrapper ">
              <nav class="sidebar-nav">
             	 <ul class="metismenu" id="menu1">
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




	                </ul>
              </nav>
            </aside><!-- /sidebar Area-->

            <script>
              $(document).ready(function(){
	// preloader
	$(window).on("load", function(){
		$(".preloader").fadeOut();
	});

	
	$('.sidbar-toggler-btn').click(function(){
		$('.wrapper').toggleClass('wrapper_active');
		$('.sidebar-wrapper').toggleClass('active-nav-wrapper');
		$('.sidebar-wrapper').toggleClass(' active-sidbar');
		$('.single-nav-wrapper').toggleClass('single-nav-wrapper-active');
	});
	$('.responsive_menu_toggle').click(function(){
		$('.wrapper').toggleClass('wrapper_responsive_active');
	});


	  $('[data-toggle="tooltip"]').tooltip();
	
});
            </script>
