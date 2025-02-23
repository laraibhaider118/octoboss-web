<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sego.dexignzone.com/xhtml/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Aug 2021 20:00:53 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sego - Restaurant Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
	<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="images/logo.png" alt="">
                <img class="logo-compact" src="images/logo-text.png" alt="">
                <img class="brand-title" src="images/logo-text.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#alerts">Alerts</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#chat">Chat</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Chat List</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
								<ul class="contacts">
									<li class="name-first-letter">A</li>
									<li class="active dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Archie Parker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Alfie Mason</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">B</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Bashid Samim</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Breddie Ronan</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Ceorge Carson</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">D</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Darry Parker</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Denry Hunter</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">J</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Jack Ronan</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/1.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Jacob Tucker</span>
												<p>Kalid is online</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/2.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>James Logan</span>
												<p>Taherah left 7 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/3.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon"></span>
											</div>
											<div class="user_info">
												<span>Joshua Weston</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">O</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/4.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oliver Acker</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
									<li class="dz-chat-user">
										<div class="d-flex bd-highlight">
											<div class="img_cont">
												<img src="images/avatar/5.jpg" class="rounded-circle user_img" alt=""/>
												<span class="online_icon offline"></span>
											</div>
											<div class="user_info">
												<span>Oscar Weston</span>
												<p>Rashid left 50 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="card chat dz-chat-history-box d-none">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)" class="dz-chat-history-back">
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"/><rect fill="#000000" opacity="0.3" transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000) " x="14" y="7" width="2" height="10" rx="1"/><path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/></g></svg>
								</a>
								<div>
									<h6 class="mb-1">Chat with Khelesh</h6>
									<p class="mb-0 text-success">Online</p>
								</div>							
								<div class="dropdown">
									<a href="javascript:void(0)" data-toggle="dropdown" ><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
										<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
										<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
										<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
									</ul>
								</div>
							</div>
							<div class="card-body msg_card_body dz-scroll" id="DZ_W_Contacts_Body3">
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Hi, how are you samim?
										<span class="msg_time">8:40 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Hi Khalid i am good tnx how about you?
										<span class="msg_time_send">8:55 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am good too, thank you for your chat template
										<span class="msg_time">9:00 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										You are welcome
										<span class="msg_time_send">9:05 AM, Today</span>
									</div>
									<div class="img_cont_msg">
								<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										I am looking for your next templates
										<span class="msg_time">9:07 AM, Today</span>
									</div>
								</div>
								<div class="d-flex justify-content-end mb-4">
									<div class="msg_cotainer_send">
										Ok, thank you have a good day
										<span class="msg_time_send">9:10 AM, Today</span>
									</div>
									<div class="img_cont_msg">
										<img src="images/avatar/2.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
								</div>
								<div class="d-flex justify-content-start mb-4">
									<div class="img_cont_msg">
										<img src="images/avatar/1.jpg" class="rounded-circle user_img_msg" alt=""/>
									</div>
									<div class="msg_cotainer">
										Bye, see you
										<span class="msg_time">9:12 AM, Today</span>
									</div>
								</div>
							</div>
							<div class="card-footer type_msg">
								<div class="input-group">
									<textarea class="form-control" placeholder="Type your message..."></textarea>
									<div class="input-group-append">
										<button type="button" class="btn btn-primary"><i class="fa fa-location-arrow"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="alerts" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notications</h6>
									<p class="mb-0">Show All</p>
								</div>
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body1">
								<ul class="contacts">
									<li class="name-first-letter">SEVER STATUS</li>
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">KK</div>
											<div class="user_info">
												<span>David Nester Birthday</span>
												<p class="text-primary">Today</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SOCIAL</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont success">RU<i class="icon fa-birthday-cake"></i></div>
											<div class="user_info">
												<span>Perfection Simplified</span>
												<p>Jame Smith commented on your status</p>
											</div>
										</div>
									</li>
									<li class="name-first-letter">SEVER STATUS</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont primary">AU<i class="icon fa fa-user-plus"></i></div>
											<div class="user_info">
												<span>AharlieKane</span>
												<p>Sami is online</p>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="img_cont info">MO<i class="icon fa fa-user-plus"></i></div>
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>Nargis left 30 mins ago</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="card-footer"></div>
						</div>
					</div>
					<div class="tab-pane fade" id="notes">
						<div class="card mb-sm-3 mb-md-0 note_card">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Notes</h6>
									<p class="mb-0">Add New Nots</p>
								</div>
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/><path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll" id="DZ_W_Contacts_Body2">
								<ul class="contacts">
									<li class="active">
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>New order placed..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Youtube, a video-sharing website..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>john just buy your product..</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
									<li>
										<div class="d-flex bd-highlight">
											<div class="user_info">
												<span>Athan Jacoby</span>
												<p>10 Aug 2020</p>
											</div>
											<div class="ml-auto">
												<a href="javascript:void(0)" class="btn btn-primary btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
												<a href="javascript:void(0)" class="btn btn-danger btn-xs sharp"><i class="fa fa-trash"></i></a>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--**********************************
            Chat box End
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Analytics
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item">
								<div class="input-group search-area d-xl-inline-flex d-none">
									<input type="text" class="form-control" placeholder="Search here...">
									<div class="input-group-append">
										<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#4C8147"/>
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">12</span>
                                </a>
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
											<li>
												<div class="timeline-panel">
													<div class="media mr-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-info">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-success">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											 <li>
												<div class="timeline-panel">
													<div class="media mr-2">
														<img alt="image" width="50" src="images/avatar/1.jpg">
													</div>
													<div class="media-body">
														<h6 class="mb-1">Dr sultads Send you Photo</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-danger">
														KG
													</div>
													<div class="media-body">
														<h6 class="mb-1">Resport created successfully</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
											<li>
												<div class="timeline-panel">
													<div class="media mr-2 media-primary">
														<i class="fa fa-home"></i>
													</div>
													<div class="media-body">
														<h6 class="mb-1">Reminder : Treatment Time!</h6>
														<small class="d-block">29 July 2020 - 02:26 PM</small>
													</div>
												</div>
											</li>
										</ul>
									</div>
                                    <a class="all-notification" href="javascript:void(0)">See all notifications <i class="ti-arrow-right"></i></a>
                                </div>
                            </li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell bell-link" href="javascript:void(0)">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.4604 3.84863H5.31685C4.64745 3.84937 4.00568 4.11561 3.53234 4.58895C3.059 5.06229 2.79276 5.70406 2.79202 6.37346V18.156C2.79276 18.8254 3.059 19.4672 3.53234 19.9405C4.00568 20.4138 4.64745 20.6801 5.31685 20.6808C5.54002 20.6809 5.75401 20.7697 5.91181 20.9275C6.06961 21.0853 6.15832 21.2993 6.15846 21.5224V23.3166C6.15846 23.6212 6.24115 23.9202 6.39771 24.1815C6.55427 24.4429 6.77882 24.6569 7.04744 24.8006C7.31605 24.9444 7.61864 25.0125 7.92295 24.9978C8.22726 24.9831 8.52186 24.8861 8.77536 24.7171L14.6173 20.8222C14.7554 20.7297 14.9179 20.6805 15.0841 20.6808H19.187C19.7383 20.6798 20.2743 20.4991 20.7137 20.1662C21.1531 19.8332 21.472 19.3661 21.6222 18.8357L24.8965 7.04986C24.9999 6.67457 25.0152 6.2805 24.9413 5.89831C24.8675 5.51613 24.7064 5.15615 24.4707 4.84638C24.235 4.53662 23.9309 4.28544 23.5823 4.11238C23.2336 3.93933 22.8497 3.84907 22.4604 3.84863ZM23.2733 6.6028L20.0006 18.3845C19.95 18.5612 19.8432 18.7166 19.6964 18.8272C19.5496 18.9378 19.3708 18.9976 19.187 18.9976H15.0841C14.5856 18.997 14.0981 19.1446 13.6836 19.4217L7.84168 23.3166V21.5224C7.84094 20.853 7.5747 20.2113 7.10136 19.7379C6.62802 19.2646 5.98625 18.9983 5.31685 18.9976C5.09368 18.9975 4.87969 18.9088 4.72189 18.7509C4.56409 18.5931 4.47537 18.3792 4.47524 18.156V6.37346C4.47537 6.15029 4.56409 5.9363 4.72189 5.7785C4.87969 5.6207 5.09368 5.53198 5.31685 5.53185H22.4604C22.5905 5.53218 22.7188 5.56252 22.8352 5.62052C22.9517 5.67851 23.0532 5.76259 23.1318 5.86621C23.2105 5.96984 23.2641 6.09021 23.2887 6.21797C23.3132 6.34572 23.3079 6.47742 23.2733 6.6028Z" fill="#4C8147"/>
										<path d="M7.84167 11.423H12.0497C12.2729 11.423 12.487 11.3343 12.6448 11.1765C12.8027 11.0186 12.8913 10.8046 12.8913 10.5814C12.8913 10.3581 12.8027 10.1441 12.6448 9.98625C12.487 9.82842 12.2729 9.73975 12.0497 9.73975H7.84167C7.61846 9.73975 7.4044 9.82842 7.24656 9.98625C7.08873 10.1441 7.00006 10.3581 7.00006 10.5814C7.00006 10.8046 7.08873 11.0186 7.24656 11.1765C7.4044 11.3343 7.61846 11.423 7.84167 11.423Z" fill="#4C8147"/>
										<path d="M15.4162 13.1064H7.84167C7.61846 13.1064 7.4044 13.1951 7.24656 13.3529C7.08873 13.5108 7.00006 13.7248 7.00006 13.9481C7.00006 14.1713 7.08873 14.3853 7.24656 14.5432C7.4044 14.701 7.61846 14.7897 7.84167 14.7897H15.4162C15.6394 14.7897 15.8534 14.701 16.0113 14.5432C16.1691 14.3853 16.2578 14.1713 16.2578 13.9481C16.2578 13.7248 16.1691 13.5108 16.0113 13.3529C15.8534 13.1951 15.6394 13.1064 15.4162 13.1064Z" fill="#4C8147"/>
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">5</span>
                                </a>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.625 6.12494H22.75V2.62494C22.75 2.47256 22.7102 2.32283 22.6345 2.19056C22.5589 2.05829 22.45 1.94807 22.3186 1.87081C22.1873 1.79355 22.0381 1.75193 21.8857 1.75007C21.7333 1.7482 21.5831 1.78616 21.4499 1.86019L14 5.99902L6.55007 1.86019C6.41688 1.78616 6.26667 1.7482 6.11431 1.75007C5.96194 1.75193 5.8127 1.79355 5.68136 1.87081C5.55002 1.94807 5.44113 2.05829 5.36547 2.19056C5.28981 2.32283 5.25001 2.47256 5.25 2.62494V6.12494H4.375C3.67904 6.1257 3.01181 6.40251 2.51969 6.89463C2.02757 7.38674 1.75076 8.05398 1.75 8.74994V11.3749C1.75076 12.0709 2.02757 12.7381 2.51969 13.2302C3.01181 13.7224 3.67904 13.9992 4.375 13.9999H5.25V23.6249C5.25076 24.3209 5.52757 24.9881 6.01969 25.4802C6.51181 25.9724 7.17904 26.2492 7.875 26.2499H20.125C20.821 26.2492 21.4882 25.9724 21.9803 25.4802C22.4724 24.9881 22.7492 24.3209 22.75 23.6249V13.9999H23.625C24.321 13.9992 24.9882 13.7224 25.4803 13.2302C25.9724 12.7381 26.2492 12.0709 26.25 11.3749V8.74994C26.2492 8.05398 25.9724 7.38674 25.4803 6.89463C24.9882 6.40251 24.321 6.1257 23.625 6.12494ZM21 6.12494H17.3769L21 4.11244V6.12494ZM7 4.11244L10.6231 6.12494H7V4.11244ZM7 23.6249V13.9999H13.125V24.4999H7.875C7.64303 24.4996 7.42064 24.4073 7.25661 24.2433C7.09258 24.0793 7.0003 23.8569 7 23.6249ZM21 23.6249C20.9997 23.8569 20.9074 24.0793 20.7434 24.2433C20.5794 24.4073 20.357 24.4996 20.125 24.4999H14.875V13.9999H21V23.6249ZM24.5 11.3749C24.4997 11.6069 24.4074 11.8293 24.2434 11.9933C24.0794 12.1574 23.857 12.2496 23.625 12.2499H4.375C4.14303 12.2496 3.92064 12.1574 3.75661 11.9933C3.59258 11.8293 3.5003 11.6069 3.5 11.3749V8.74994C3.5003 8.51796 3.59258 8.29558 3.75661 8.13155C3.92064 7.96752 4.14303 7.87524 4.375 7.87494H23.625C23.857 7.87524 24.0794 7.96752 24.2434 8.13155C24.4074 8.29558 24.4997 8.51796 24.5 8.74994V11.3749Z" fill="#4C8147"/>
									</svg>
									<span class="badge light text-white bg-primary rounded-circle">2</span>
                                </a>
								<div class="dropdown-menu dropdown-menu-right rounded">
									<div id="DZ_W_TimeLine11Home" class="widget-timeline dz-scroll style-1 p-3 height370 ps ps--active-y">
										<ul class="timeline">
											<li>
												<div class="timeline-badge primary"></div>
												<a class="timeline-panel text-muted" href="#">
													<span>10 minutes ago</span>
													<h6 class="mb-0">Youtube, a video-sharing website, goes live <strong class="text-primary">$500</strong>.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge info">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>20 minutes ago</span>
													<h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
													<p class="mb-0">Quisque a consequat ante Sit amet magna at volutapt...</p>
												</a>
											</li>
											<li>
												<div class="timeline-badge danger">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>30 minutes ago</span>
													<h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge success">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>15 minutes ago</span>
													<h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge warning">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
											<li>
												<div class="timeline-badge dark">
												</div>
												<a class="timeline-panel text-muted" href="#">
													<span>20 minutes ago</span>
													<h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <img src="images/profile/17.jpg" width="20" alt=""/>
									<div class="header-info">
										<span class="text-black"><strong>Brian Lee</strong></span>
										<p class="fs-12 mb-0">Admin</p>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="page-login.html" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="index.html">Dashboard</a></li>
							<li><a href="orders.html">Orders</a></li>
							<li><a href="order-id.html">Order ID</a></li>
							<li><a href="general-customers.html">General Customers</a></li>
							<li><a href="analytics.html">Analytics</a></li>
							<li><a href="reviews.html">Reviews</a></li>
						</ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Apps</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="app-profile.html">Profile</a></li>
                            <li><a href="post-details.html">Post Details</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                                <ul aria-expanded="false">
                                    <li><a href="email-compose.html">Compose</a></li>
                                    <li><a href="email-inbox.html">Inbox</a></li>
                                    <li><a href="email-read.html">Read</a></li>
                                </ul>
                            </li>
                            <li><a href="app-calender.html">Calendar</a></li>
							<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                                <ul aria-expanded="false">
                                    <li><a href="ecom-product-grid.html">Product Grid</a></li>
									<li><a href="ecom-product-list.html">Product List</a></li>
									<li><a href="ecom-product-detail.html">Product Details</a></li>
									<li><a href="ecom-product-order.html">Order</a></li>
									<li><a href="ecom-checkout.html">Checkout</a></li>
									<li><a href="ecom-invoice.html">Invoice</a></li>
									<li><a href="ecom-customers.html">Customers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Charts</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="chart-flot.html">Flot</a></li>
                            <li><a href="chart-morris.html">Morris</a></li>
                            <li><a href="chart-chartjs.html">Chartjs</a></li>
                            <li><a href="chart-chartist.html">Chartist</a></li>
                            <li><a href="chart-sparkline.html">Sparkline</a></li>
                            <li><a href="chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">Bootstrap</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="ui-accordion.html">Accordion</a></li>
                            <li><a href="ui-alert.html">Alert</a></li>
                            <li><a href="ui-badge.html">Badge</a></li>
                            <li><a href="ui-button.html">Button</a></li>
                            <li><a href="ui-modal.html">Modal</a></li>
                            <li><a href="ui-button-group.html">Button Group</a></li>
                            <li><a href="ui-list-group.html">List Group</a></li>
                            <li><a href="ui-media-object.html">Media Object</a></li>
                            <li><a href="ui-card.html">Cards</a></li>
                            <li><a href="ui-carousel.html">Carousel</a></li>
                            <li><a href="ui-dropdown.html">Dropdown</a></li>
                            <li><a href="ui-popover.html">Popover</a></li>
                            <li><a href="ui-progressbar.html">Progressbar</a></li>
                            <li><a href="ui-tab.html">Tab</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-pagination.html">Pagination</a></li>
                            <li><a href="ui-grid.html">Grid</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Plugins</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="uc-select2.html">Select 2</a></li>
                            <li><a href="uc-nestable.html">Nestedable</a></li>
                            <li><a href="uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="uc-toastr.html">Toastr</a></li>
                            <li><a href="map-jqvmap.html">Jqv Map</a></li>
                            <li><a href="uc-lightgallery.html">Lightgallery</a></li>
                        </ul>
                    </li>
                    <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Widget</span>
						</a>
					</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Forms</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="form-element.html">Form Elements</a></li>
                            <li><a href="form-wizard.html">Wizard</a></li>
                            <li><a href="form-editor-summernote.html">Summernote</a></li>
                            <li><a href="form-pickers.html">Pickers</a></li>
                            <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Table</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                            <li><a href="table-datatable-basic.html">Datatable</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">Pages</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="page-register.html">Register</a></li>
                            <li><a href="page-login.html">Login</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="page-error-400.html">Error 400</a></li>
                                    <li><a href="page-error-403.html">Error 403</a></li>
                                    <li><a href="page-error-404.html">Error 404</a></li>
                                    <li><a href="page-error-500.html">Error 500</a></li>
                                    <li><a href="page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                            <li><a href="page-lock-screen.html">Lock Screen</a></li>
                        </ul>
                    </li>
                </ul>
				<div class="add-menu-sidebar">
					<img src="images/food-serving.png" alt="">
					<p class="mb-3">Organize your menus through button bellow</p>
					<span class="fs-12 d-block mb-3">Lorem ipsum dolor sit amet</span>
					<a href="javascript:void(0)" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#addOrderModalside" >+Add Menus</a>
				</div>
				<div class="copyright">
					<p><strong>Sego Restaurant Admin Dashboard</strong> © 2021 All Rights Reserved</p>
					<p>Made with <span class="heart"></span> by DexignZone</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<!-- Add Order -->
				<div class="modal fade" id="addOrderModalside">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Menus</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Food Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Order Date</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Food Price</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="d-sm-flex d-block">
					<p class="fs-18 mr-auto mb-sm-4 mb-3">Here is your restaurant<br> summary with graph view</p>
					<div class="dropdown custom-dropdown mb-sm-4 mb-3">
						<div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" role="button" data-toggle="dropdown" aria-expanded="false">
							<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path></g></svg>
							<div class="text-left ml-3">
								<span class="d-block fs-16">Filter Periode</span>
								<small class="d-block fs-13">4 June 2020 - 4 July 2020</small>
							</div>
							<i class="fa fa-angle-down scale5 ml-3"></i>
						</div>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="#">4 June 2020 - 4 July 2020</a>
							<a class="dropdown-item" href="#">5 july 2020 - 4 Aug 2020</a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-9 col-xxl-12">
						<div class="card">
							<div class="card-header border-0 pb-2 d-lg-flex flex-wrap d-block">
								<div>
									<h4 class="card-title mb-2">Most Favorites Items</h4>
									<p class="fs-14 mb-0">Lorem ipsum dolor sit amet, consectetur</p>
								</div>
								<div class="card-action card-tabs mt-3 mt-3 mt-lg-0">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#all-categories" role="tab" aria-selected="true">
												All Categories
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#main-course" role="tab" aria-selected="false">
												Main Course
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#pizza" role="tab" aria-selected="false">
												Pizza
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#drink" role="tab">
												Drink
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#dessert" role="tab">
												Dessert
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#more" role="tab">
												More
											</a>
										</li>													
									</ul>
								</div>
							</div>
							<div class="card-body most-favourite-items pb-0">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="all-categories">
										<div class="row">
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic4.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Watermelon Juice with Ice</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
														<small>75%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic9.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Orange Juice Special Smoothy with Sugar</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
														<small>21%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic2.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Mozarella Pizza with Random Topping</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
														<small>85%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic8.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Extreme Deluxe Pizza Super With Mozarella</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
														<small>45%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic11.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
														<small>52%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic4.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Chicken Kebab from Turkish with Garlic</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
														<small>35%</small>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="main-course">
										<div class="row">
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic4.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Watermelon Juice with Ice</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
														<small>75%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic9.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Orange Juice Special Smoothy with Sugar</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
														<small>21%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3" src="images/card/pic2.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Mozarella Pizza with Random Topping</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
														<small>85%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic8.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Extreme Deluxe Pizza Super With Mozarella</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
														<small>45%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic11.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
														<small>52%</small>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="pizza">
										<div class="row">
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic9.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Orange Juice Special Smoothy with Sugar</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
														<small>21%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic2.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Mozarella Pizza with Random Topping</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
														<small>85%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic8.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Extreme Deluxe Pizza Super With Mozarella</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
														<small>45%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic11.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
														<small>52%</small>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="drink">
										<div class="row">
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic4.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Watermelon Juice with Ice</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
														<small>75%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic9.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Orange Juice Special Smoothy with Sugar</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
														<small>21%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic2.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Mozarella Pizza with Random Topping</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
														<small>85%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic8.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Extreme Deluxe Pizza Super With Mozarella</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
														<small>45%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic11.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
														<small>52%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic11.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
														<small>52%</small>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="dessert">
										<div class="row">
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic4.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Watermelon Juice with Ice</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
														<small>75%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic9.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Orange Juice Special Smoothy with Sugar</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
														<small>21%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic8.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Extreme Deluxe Pizza Super With Mozarella</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
														<small>45%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic11.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
														<small>52%</small>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade" id="more">
										<div class="row">
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic4.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Watermelon Juice with Ice</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
														<small>75%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic9.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Orange Juice Special Smoothy with Sugar</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
														<small>21%</small>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="media mb-4 align-items-center">
													<img class="rounded mr-3 food-img" src="images/card/pic11.jpg" alt="">
													<div class="media-body">
														<h5 class="mb-sm-4 mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="d-flex mb-2">
															<svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
																<rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
																<rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
																<rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
																<rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
															</svg>
															<span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
														</div>
														<div class="star-review2 d-flex align-items-center flex-wrap fs-12">
															<div class="mb-2">
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-orange"></i>
																<i class="fa fa-star text-gray"></i>
																<i class="fa fa-star text-gray"></i>
															</div>
															<span class="ml-3 text-dark mb-2">(454 revies)</span>
														</div>
													</div>
													<div class="d-inline-block relative donut-chart-sale">
														<span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
														<small>52%</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer border-0">
								<nav>
									<ul class="pagination style-1 mb-0">
										<li class="page-item page-indicator">
											<a class="page-link" href="javascript:void(0)">
												<i class="la la-angle-left"></i>
											</a>
										</li>
										<li>
											<ul>
												<li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
												<li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
												<li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
												<li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
											</ul>
										</li>
										<li class="page-item page-indicator">
											<a class="page-link" href="javascript:void(0)">
												<i class="la la-angle-right"></i>
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-12">
						<div class="card trending-menus">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="text-black fs-20">Daily Trending Menus</h4>
									<p class="fs-13 mb-0 text-black">Lorem ipsum dolor</p>
								</div>
							</div>
							<div class="card-body dz-scroll height500" id="dailyMenus">
								<div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
									<span class="num">#1</span>
									<div class="mr-auto pr-3">
										<a href="post-details.html"><h2 class="text-black fs-14">Medium Spicy Spagethi Italiano</h2></a>
										<span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
									</div>
									<img src="images/menus/9.png" alt="" width="60" class="rounded">
								</div>
								<div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
									<span class="num">#2</span>
									<div class="mr-auto pr-3">
										<a href="post-details.html"><h2 class="text-black fs-14">Watermelon juice with ice</h2></a>
										<span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
									</div>
									<img src="images/menus/10.png" alt="" width="60" class="rounded">
								</div>
								<div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
									<span class="num">#3</span>
									<div class="mr-auto pr-3">
										<a href="post-details.html"><h2 class="text-black fs-14">Chicken curry special with cucumber</h2></a>
										<span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
									</div>
									<img src="images/menus/11.png" alt="" width="60" class="rounded">
								</div>
								<div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
									<span class="num">#4</span>
									<div class="mr-auto pr-3">
										<a href="post-details.html"><h2 class="text-black fs-14">Italiano Pizza With Garlic</h2></a>
										<span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
									</div>
									<img src="images/menus/12.png" alt="" width="60" class="rounded">
								</div>
								<div class="d-flex tr-row align-items-center">
									<span class="num">#5</span>
									<div class="mr-auto pr-3">
										<a href="post-details.html"><h2 class="text-black fs-14">Tuna Soup spinach with himalaya salt</h2></a>
										<span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
									</div>
									<img src="images/menus/9.png" alt="" width="60" class="rounded">
								</div>
							</div>
							<div class="card-footer border-0 pt-0">
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0 d-sm-flex flex-wrap d-block">
										<div>
											<h4 class="card-title mb-1">Most Selling Items</h4>
											<small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
										</div>
										<div class="card-action card-tabs mt-3 mt-sm-0">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" data-toggle="tab" href="#monthly" role="tab">
														Monthly
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#weekly" role="tab">
														Weekly
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#today" role="tab">
														Today
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content">
										<div class="tab-pane fade show active" id="monthly">
											<div class="height500 dz-scroll loadmore-content" id="sellingItemsContent">
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic5.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Meidum Spicy Spagethi Italiano</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> BURGER</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$12.56</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic4.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Pizza Meal for Kids (Small size)</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> PIZZA</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic3.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> JUICE</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$11.21</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic2.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> PIZZA</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$8.15</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic1.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Watermelon juice with ice</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">BURGER</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="text-center bg-white pt-3">
												<a href="javascript:void(0);" class="btn-link dz-load-more"  rel="ajax/selling-items.html" id="sellingItems">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
											</div>
										</div>
										<div class="tab-pane fade" id="weekly">
											<div class="height500 dz-scroll loadmore-content" id="sellingItems2Content">
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic3.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Pizza Meal for Kids (Small size)</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">BURGER</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$11.21</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic2.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Meidum Spicy Spagethi Italiano</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$8.15</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic1.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> JUICE</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="text-center bg-white pt-3">
												<a href="javascript:void(0);" class="btn-link dz-load-more"  rel="ajax/selling-items.html" id="sellingItems2">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
											</div>
										</div>
										<div class="tab-pane fade" id="today">
											<div class="height500 dz-scroll loadmore-content" id="sellingItems3Content">
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic2.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> JUICE</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$8.15</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
												<div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
													<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic1.jpg" alt="DexignZone"></a>
													<div class="media-body col-6 px-0">
														<h5 class="mt-0 mb-1"><a class="text-black" href="ecom-product-detail.html">Watermelon juice with ice</a></h5>
														<small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
														<span class="text-secondary mr-2 fo"></span>
														<ul class="fs-14 list-inline">
															<li class="mr-3">Serves for 4 Person</li>
															<li>24mins</li>
														</ul>
													</div>
													<div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
														<h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
														<div class="dropdown ml-3 ">
															<button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
																<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="javascript:void(0);">Edit</a>
																<a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="text-center bg-white pt-3">
												<a href="javascript:void(0);" class="btn-link dz-load-more"  rel="ajax/selling-items.html" id="sellingItems3">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0 d-sm-flex d-block">
										<div>
											<h4 class="card-title mb-1">Trending Items</h4>
											<small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
										</div>
										<div class="dropdown mt-3 mt-sm-0">
											<button type="button" class="btn btn-primary dropdown-toggle light fs-14" data-toggle="dropdown" aria-expanded="false">
												Weekly
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="javascript:void(0);">Daily</a>
												<a class="dropdown-item" href="javascript:void(0);">Weekly</a>
												<a class="dropdown-item" href="javascript:void(0);">Monthly</a>
											</div>
										</div>
									</div>
									<div class="card-body p-0 pt-3">
										<div class="media items-list-1">
											<span class="number col-1 px-0 align-self-center">#1</span>
											<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic1.jpg" alt="DexignZone"></a>
											<div class="media-body col-sm-4 col-xxl-5 px-0">
												<h5 class="mt-0 mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
												<small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
											</div>
											<div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
												<div class="mr-3">
													<span class="peity-success" data-style="width:100%;" style="display: none;">0,2,1,4</span><svg class="peity" height="30" width="47"><polygon fill="rgba(48, 194, 89, .2)" points="0 28.5 0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5 47 28.5"></polygon><polyline fill="none" points="0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5" stroke="#30c259" stroke-width="3" stroke-linecap="square"></polyline></svg>
												</div>
												<div>
													<h3 class="mb-0 font-w600 text-black">524</h3>
													<span class="fs-14">Sales (12%)</span>
												</div>
											</div>
										</div>
										<div class="media items-list-1">
											<span class="number col-1 px-0 align-self-center">#2</span>
											<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic2.jpg" alt="DexignZone"></a>
											<div class="media-body col-sm-4 col-xxl-5 px-0">
												<h5 class="mt-0 mb-3 text-black"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
												<small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">JUICE</a></small>
											</div>
											<div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
												<div class="mr-3">
													<span class="peity-danger" data-style="width:100%;" style="display: none;">4,1,2,0</span><svg class="peity" height="30" width="47"><polygon fill="rgba(248, 79, 78, .2)" points="0 28.5 0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5 47 28.5"></polygon><polyline fill="none" points="0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5" stroke="#f84f4e" stroke-width="3" stroke-linecap="square"></polyline></svg>
												</div>
												<div>
													<h3 class="mb-0 font-w600 text-black">215</h3>
													<span class="fs-14">Sales (12%)</span>
												</div>
											</div>
										</div>
										<div class="media items-list-1">
											<span class="number col-1 px-0 align-self-center">#3</span>
											<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic3.jpg" alt="DexignZone"></a>
											<div class="media-body col-sm-4 col-xxl-5 px-0">
												<h5 class="mt-0 mb-3 text-black"><a class="text-black" href="ecom-product-detail.html">Chicken curry special with cucumber</a></h5>
												<small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
											</div>
											<div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
												<div class="mr-3">
													<span class="peity-success" data-style="width:100%;" style="display: none;">0,2,1,4</span><svg class="peity" height="30" width="47"><polygon fill="rgba(48, 194, 89, .2)" points="0 28.5 0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5 47 28.5"></polygon><polyline fill="none" points="0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5" stroke="#30c259" stroke-width="3" stroke-linecap="square"></polyline></svg>
												</div>
												<div>
													<h3 class="mb-0 font-w600 text-black">524</h3>
													<span class="fs-14">Sales (12%)</span>
												</div>
											</div>
										</div>
										<div class="media items-list-1">
											<span class="number col-1 px-0 align-self-center">#4</span>
											<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic4.jpg" alt="DexignZone"></a>
											<div class="media-body col-sm-4 col-xxl-5 px-0">
												<h5 class="mt-0 mb-3 text-black"><a class="text-black" href="ecom-product-detail.html">Watermelon juice with ice</a></h5>
												<small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
											</div>
											<div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
												<div class="mr-3">
													<span class="peity-success" data-style="width:100%;" style="display: none;">0,2,1,4</span><svg class="peity" height="30" width="47"><polygon fill="rgba(48, 194, 89, .2)" points="0 28.5 0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5 47 28.5"></polygon><polyline fill="none" points="0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5" stroke="#30c259" stroke-width="3" stroke-linecap="square"></polyline></svg>
												</div>
												<div>
													<h3 class="mb-0 font-w600 text-black">76</h3>
													<span class="fs-14">Sales (12%)</span>
												</div>
											</div>
										</div>
										<div class="media items-list-1">
											<span class="number col-1 px-0 align-self-center">#5</span>
											<a href="ecom-product-detail.html"><img class="img-fluid rounded mr-3" width="85" src="images/dish/pic5.jpg" alt="DexignZone"></a>
											<div class="media-body col-sm-4 col-xxl-5 px-0">
												<h5 class="mt-0 mb-3 text-black"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
												<small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">BURGER</a></small>
											</div>
											<div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
												<div class="mr-3">
													<span class="peity-danger" data-style="width:100%;" style="display: none;">4,1,2,0</span><svg class="peity" height="30" width="47"><polygon fill="rgba(248, 79, 78, .2)" points="0 28.5 0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5 47 28.5"></polygon><polyline fill="none" points="0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5" stroke="#f84f4e" stroke-width="3" stroke-linecap="square"></polyline></svg>
												</div>
												<div>
													<h3 class="mb-0 font-w600 text-black">180</h3>
													<span class="fs-14">Sales (12%)</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="row">
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0 d-sm-flex d-block">
										<div>
											<h4 class="card-title mb-1">Chart Orders</h4>
											<small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
										</div>
										<div class="dropdown mt-3 mt-sm-0">
											<button type="button" class="btn btn-primary dropdown-toggle light fs-14" data-toggle="dropdown" aria-expanded="false">
												Weekly
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="javascript:void(0);">Daily</a>
												<a class="dropdown-item" href="javascript:void(0);">Weekly</a>
												<a class="dropdown-item" href="javascript:void(0);">Monthly</a>
											</div>
										</div>
									</div>
									<div class="card-body revenue-chart px-3 pb-0">
											<div class="d-flex align-items-end pl-3">
												<div class="mr-4">
													<h3 class="font-w600 mb-0"><img src="images/svg/ic_stat3.svg" height="22" width="22" class="mr-2 mb-1" alt=""/>
														<span class="counter">257</span>k
													</h3>
													<small class="text-dark fs-14">Total Sales</small>
												</div>
												<div>
													<h3 class="font-w600 mb-0"><img src="images/svg/ic_stat3.svg" height="22" width="22" class="mr-2 mb-1" alt=""/><span class="counter">1,245</span></h3>
													<small class="text-dark fs-14">Avg. Sales per day</small>
												</div>
											</div>
										<div id="chartBar"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-12">
								<div class="card">
									<div class="card-header border-0 pb-0 d-sm-flex flex-wrap d-block">
										<div>
											<h4 class="card-title mb-1">Most Favorites Items</h4>
											<small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
										</div>
										<div class="card-action card-tabs">
											<ul class="nav nav-tabs" role="tablist">
												<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#monthly1" role="tab">Monthly</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#weekly1" role="tab">Weekly</a></li>
												<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#today1" role="tab">Today</a></li>
											</ul>
										</div>
									</div>
									<div class="card-body tab-content">
										<div class="tab-pane fade show active" id="monthly1">
											<div class="row height750 dz-scroll loadmore-content" id="favourite-itemsContent">
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic6.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="mb-3"><a class="text-black" href="ecom-product-detail.html">Meidum Spicy Spagethi Italiano</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic7.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Pizza Meal for Kids (Small size)</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic8.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Meidum Spicy Spagethi Italiano</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic9.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic10.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic11.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
											</div>
											<div class="bg-white pt-3 text-center">
												<a href="javascript:void(0);" class="btn-link dz-load-more" rel="ajax/favourite-items.html" id="favourite-items">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
											</div>
										</div>
										<div class="tab-pane fade" id="weekly1">
											<div class="row height750 dz-scroll loadmore-content" id="favourite-items2Content">
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic7.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Meidum Spicy Spagethi Italiano</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic9.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Pizza Meal for Kids (Small size)</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic10.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Meidum Spicy Spagethi Italiano</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic6.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
											</div>
											<div class="bg-white pt-3 text-center">
												<a href="javascript:void(0);" class="btn-link dz-load-more" rel="ajax/favourite-items.html" id="favourite-items2">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
											</div>
										</div>
										<div class="tab-pane fade" id="today1">
											<div class="row height750 dz-scroll loadmore-content" id="favourite-items3Content">
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic8.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic11.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic8.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Tuna soup spinach with himalaya salt</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
												<div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
													<div class="media mb-4">
														<a href="ecom-product-detail.html"><img src="images/dish/pic11.jpg" class="rounded w-100" alt=""></a>
													</div>
													<div class="info">
														<h5 class="text-black mb-3"><a class="text-black" href="ecom-product-detail.html">Medium Spicy Pizza with Kemangi Leaf</a></h5>
														<div class="star-review fs-14 mb-3">
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-orange"></i>
															<i class="fa fa-star text-gray"></i>
															<i class="fa fa-star text-gray"></i>
															<span class="ml-3 text-dark">451 reviews</span>
														</div>
														<a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
													</div>
												</div>
											</div>
											<div class="bg-white pt-3 text-center">
												<a href="javascript:void(0);" class="btn-link dz-load-more" rel="ajax/favourite-items.html" id="favourite-items3">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	
	<!-- Counter Up -->
    <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="vendor/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="js/dashboard/analytics.js"></script>
</body>

<!-- Mirrored from sego.dexignzone.com/xhtml/analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Aug 2021 20:00:57 GMT -->
</html>