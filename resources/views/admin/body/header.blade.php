<!--start header -->
<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li>

							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">{{ auth()->user()->unreadNotifications->count() }}</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto" onclick="markAllNotificationsAsRead()">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										@foreach(auth()->user()->notifications as $notification)
                                            @if($notification->notifiable_type === 'App\Models\User')
                                                @if($notification->notifiable_id === auth()->user()->id)
												<a class="dropdown-item" href="javascript:;">
													<div class="d-flex align-items-center">
														<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
														</div>
														<div class="flex-grow-1">
															<h6 class="msg-name">{{ $notification->data['subject'] }}<span class="msg-time float-end">  {{ $notification->created_at->diffForHumans() }}
													</span></h6>
															<p class="msg-info">{{ $notification->data['content'] }}</p>
														</div>
													</div>
												</a>   
                                                @endif
                                            @endif
                                        @endforeach

									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
							<div class="header-message-list d-none"></div>
							{{-- <li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
									<i class='bx bx-comment'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Messages</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-message-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="user-online">
													<img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
												ago</span></h6>
													<p class="msg-info">The standard chunk of lorem</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Messages</div>
									</a>
								</div>
							</li> --}}
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ Auth::user()->photo }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">{{ Auth::user()->name }}</p>
								{{-- <p class="designattion mb-0">Web Designer</p> --}}
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li><a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="bx bx-user"></i><span>Profile</span></a>
							</li>
							<li><a class="dropdown-item" href="{{ route('admin.change_password') }}"><i class="bx bx-user"></i><span>change password</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a>
							</li>
							{{-- <li><a class="dropdown-item" href="javascript:;"><i class='bx bx-home-circle'></i><span>Dashboard</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-dollar-circle'></i><span>Earnings</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class='bx bx-download'></i><span>Downloads</span></a>
							</li> --}}
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li>
							<li><a class="dropdown-item" href="{{ route('admin.logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
</header>
<!--end header -->
<script type="text/javascript">

	function markAllNotificationsAsRead() {

			 $.ajax({
				type: "PUT",
				dataType : 'json',
				data:{
					_token: '{{ csrf_token() }}',
				},
				url: "/mark-all-notifications-as-read",
				success:function(data){
					// Start Message 
					const Toast = Swal.mixin({
				   toast: true,
				   position: 'top-end',
				   icon: 'success', 
				   showConfirmButton: false,
				   timer: 3000 
			 })
			 if ($.isEmptyObject(data.error)) {
					 
					 Toast.fire({
					 type: 'success',
					 title: data.success, 
					 })
			 }else{
				
			Toast.fire({
					 type: 'error',
					 title: data.error, 
					 })
				 }
				  
			   // End Message  
			 }
			 });
	 }
  
 </script>