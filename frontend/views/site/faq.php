<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	$this->title = "FAQ";
	$this->params['breadcrumbs'][] = $this->title;

?>
<style>
	#faqs, #features{
		background-color:#ff9f1c;
		padding:15px;
		border-radius: 10px;
	}
	hr{
		border-color:black;
		border-width: 2px;
	}
	#nav-anchor{
		background-color: black;
	}

</style>

<div class='site-faq'>
	<div class='container' style='padding-right:10px'>
		<div class='heading'>
			<center>
				<h2>
					<b><?php echo Html::encode($this->title) ?></b>
				</h2>
			</center>
		</div>
		<br/>

		<ul class="nav nav-pills nav-justified">
			<li class="active" id="li-features">
				<a data-toggle="pill" href="#features">
					<b>Website Overview</b>
				</a>
			</li>
			<li id="li-faqs">
				<a data-toggle="pill" href="#faqs">
					<b>FAQs</b>
				</a>
			</li>
		</ul>

		<br/>

		<div class="tab-content" style="margin-bottom:20px"> 
			<div id="features" class="tab-pane fade in active">

			<div class="nav nav-pills nav-justified">
			<li><a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#signup') ?>" style=" color: #ff9f1c">Signup</a></li>

			<li><a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#login') ?>" style=" color: #ff9f1c">Login</a></li>

			<li><a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#menu_bar') ?>" style=" color: #ff9f1c">Menu Bar</a></li>

			<li><a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#catalogue') ?>" style=" color: #ff9f1c">Catalogue</a></li>

			<li><a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#cart') ?>" style=" color: #ff9f1c">Cart</a></li>

			<li><a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#contact_us') ?>" style=" color: #ff9f1c">Contact Us</a></li>

			<li><a id="nav-anchor" href="<?= yii\helpers\Url::to('index.php?r=site%2Ffaq#about_us') ?>" style=" color: #ff9f1c">About Us</a></li>
			</div>
			<hr/>
				<b>Learn about the important features of this website.</b>
				<br/>


<!-- Signup -->
			<div class="signup" id="signup">
					<h4><b>Signup</b></h4>
					<div class=row>
					<div class="col-md-8">
						<p style="margin-top:10px">
							<h4><b><u>NOTICE</u> :</b></h4><br>
							<b><ul>
								<li>You're required to provide correct information while creating an account with Agnel-Online. Creating account with fake/incorrect information will have save serious consequences.</li>
								<li>Providing fake information will lead to immediate suspension of account.</li>
								<li>Using other student's information to create an account is one of the Cyber Offenses.<br/>
								Please note that, in such cases, <br/>
								<h4><b>STRICT LEGAL ACTIONS WILL BE TAKEN AGAINST THE OFFENDERS.</b></h4> </li>
							</ul></b>
							You need to create an account for using various services provided by <b>Agnel-Online</b>.
							Once, you are done with setting up your account, you can start ordering products from Canteen and the Central Store.
						</p>
						<p>
							Below is the detailed explanation about the various fields contained in the <b>Signup</b> form.
							<ul>
								<li><b>Roll No</b> : Enter the Roll Number assigned to you by the college. Your roll number is your idenitity.
								So, make sure that you enter the correct Roll Number.
								</li>
								<li><b>Name</b> : Enter your exact name that is registered with the college.</li> 
								<li><b>Branch</b> :	Select the Branch/Department to which you belong.</li>
								<li><b>Contact</b> : Enter a valid Mobile Number, so that you can be contacted whenever necessary.</li>
								<li><b>Email</b> : Enter a valid Email-ID, so that our Admin team can contact you or reply to your queries and suggestions.</li>
								<li><b>Password</b> : Select a strong password of length 6-32 characters.
							</ul>
						</p>
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<img src="<?= yii\helpers\Url::to('@web/images/signup.png') ?>" style= "width:100%">
					</div>
					</div>
				</div>
				<hr/>



<!--Login -->
				<div class="login" id="login">
					<h4><b>Login</b></h4>
					<div class=row>
					<div class="col-md-8">
						<p style="margin-top:10px">
							After you've created your account, you need to login to your account to begin the ordering process.
							To login, you need to click on the <b>LOGIN</b> button on the Menu Bar. You'll be redirected to the Login Page where you'll need to provide the appropriate account details.
							The account details required for login are :
							<ul>
								<li><b>Roll Number</b></li> : Enter the <b>Roll Number assigned to you by the college.</b>
								<li><b>Password</b> : Enter the password that you had entered during the <b>Signup</b> process.</li>
								<li><b>Remember Me</b> : Select this option if you wish to <b>stay logged in</b> even after you close the website. Not selecting this option will require you to login to your account everytime you visit the website.</li>
							</ul>
						</p>
						<p>
							<h4>FORGOT PASSWORD ?</h4>
							In case you forgot your password, you can always select a new password by clicking on the <b>RESET IT</b> link provided on the <b>login page</b>. <br/>
							<div class="col-md-5" style="margin-top:10px">
								<img src="<?= yii\helpers\Url::to('@web/images/pwd_reset.png') ?>" style= "width:100%">
							</div>
							<div class="col-md-7" style="margin-top:10px">
								<ul>
									<li>Enter your <b>Registered Email-ID</b>.</li>
									<li>Click on the <b>Send</b> button to send a Reset Password link to your email-id.</li>
									<li>Login to your email-id and search for the email-received from Agnel-Online.</li>
									<li>Open the email and click on the Reset password link provided in the Email.</li>
									<li>You'll be redirected to the <b>RESET PASSWORD</b> page where you'll have to enter your new password.</li>
									<li>Submit the new password.</li>
									<li>Login to your account using your new password to confirm the password change.</li>
								</ul>
							</div>
						</p>
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<center><b>Mobile Version</b></center>
						<img src="<?= yii\helpers\Url::to('@web/images/login.png') ?>" style= "width:100%">
					</div>
					</div>
				</div>
				<hr/>


<!-- Menu Bar -->
				<div class="menu_bar" id="menu_bar">
					<h4><b>Menu Bar</b></h4>
					<div class=row>
					<div class="col-md-8">
						<p style="margin-top:10px">
							The <b>Menu Bar</b> contains all the navigation options. Various options present on the Menu Bar are:
							<ul>
								<li><b>FAQ</b> : Find answers to most common questions.</li>
								<li><b>CART</b> : Add items to your cart for ordering.</li>
								<li><b>CATALOGUE</b> : Find all items available for you to order.</li>
								<li><b>CONTACT US</b> : Contact us if you have any suggestions or if you're facing any difficulty with the website.</li>
								<li><b>ABOUT US</b> : Get to know about the role and contribution of each developer behind this project.</li>
								<li><b>LOGIN</b> : Login to your account to make new orders and add balance to your wallet.</li>
								<li><b>SIGN UP</b> : New to AGNEL-ONLINE ? Use this option to create an account for yourself.</li>
								<li><b>LOGOUT</b> : Done with ordering ? Use this option to log out of your account.</li>
							</ul>
						</p>
							<center><b>Desktop Version</b></center>
							<img src="<?= yii\helpers\Url::to('@web/images/menu-des.png') ?>" style= "width:100%">
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<center><b>Mobile Version</b></center>
						<img src="<?= yii\helpers\Url::to('@web/images/menu-mob.png') ?>" style= "width:100%">
					</div>
					</div>
				</div>
				<hr/>
				

<!-- Catalogue -->
				<div class="catalogue" id='catalogue' >
					<h4><b>Catalogue</b></h4>
					<div class=row>
					<div class="col-md-8">
						<p style="margin-top:10px">
							The <b>Catalogue</b> contains all the items from the Canteen and the Central Store available for ordering. If you <b>havent logged in</b>, you <b>can only view</b> the items in the Catalogue and <b>not order them or add to your cart</b>. To do so, you'll either need to log in first or create a new account (if you haven't already created).
						</p>
						<h5><b><u>IMPORTANT</u>:</b></h5>
						<p><b>To successfully complete the ordering process, you must order Canteen Items and Store Items separately.</b></p>
						The <b>Catalogue</b> is divided into 3 parts.
						<ul>
							<li><b>Canteen : Regular</b> - This part of the catalogue contains all the regular food items available for sale.</li>
							<li><b>Canteen : Today's Special</b> - This part of the catalogue lists the special recepies of the day. These items are generally accompanied by good discounts</li>
							<li><b>The Central Store</b> - This part of the catalogue contains all the stationary items available for sale in the Central Store.</li>
							<br/>
						</ul>
						<h5><b><u>NOTE</u>:</b></h5>
						<h5><b>YOU CAN USE SEARCH BOX TO FILTER THE ITEMS & FIND THE DESIRED ITEM WITHOUT ANY SCROLLING</b></h5>
						<center><b>Search Box</b></center>
							<img src="<?= yii\helpers\Url::to('@web/images/searchbox.png') ?>" style= "width:100%">
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<img src="<?= yii\helpers\Url::to('@web/images/catalogue.png') ?>" style= "width:100%">
					</div>
					</div>
				</div>
				<hr/>


<!-- Cart -->
				<div class="cart" id="cart">
					<h4><b>Cart</b></h4>
					<div class=row>
					<div class="col-md-8">
						<p style="margin-top:10px">
							The <b>Cart</b> contains all the items that you wish to buy. You can click on the <b>garbage-can</b> icon to remove various items from the cart.	
						</p>
						<p>
							The <b>Cart Icon</b> <img src="<?= yii\helpers\Url::to('@web/images/cart_icon.png') ?>" > displays the 
						</p>
						<p>
							Please note that, you <b>CANNOT</b> order canteen items and stationary items together. You'll have to order them separately.
						</p>
						<p>
							After adding various items in your cart, you can proceed to the Order
							& Payment Confirmation Page by clicking on the <b>Order Now</b> button.
						</p>
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<img src="<?= yii\helpers\Url::to('@web/images/cart.png') ?>" style= "width:100%">
					</div>
					</div>
				</div>
				<hr/>


<!-- Contact Us -->
				<div class="contact_us" id="contact_us">
					<h4><b>Contact Us</b></h4>
					<div class=row>
					<div class="col-md-8">
						<p style="margin-top:10px">
							Feel free to write to us using the <b>Contact Us</b> form. You can write to us for any of the following reasons:
							<ul>
								<li>If you're facing any <b>technical difficulties</b> with the website or the user account.</li>
								<li>If you're facing any issues with <b>e-Wallet</b> or the <b>payment process</b>.</li>
								<li>If you've <b>request</b> for adding new features to the website.</li>
								<li>If you've any <b>complaints</b> regarding any of the features of the website.</li>
							</ul>
						</p>
						<p>Below is the detailed explanation about the various fields contained in the <b>Contact Us</b> form.
						<ul>
							<li><b>Name</b></li> : Enter your <b>name</b> so that the Administrators can identify you. If you're logged into your account, this field will be <b>already filled</b> for you.
							<li><b>Email</b></li> :	Enter your <b>email-id</b> so that the Administrators can reply to your complaints/suggestions/requests. If you're logged into your account, this field will be <b>already filled</b> for you. 
							<li><b>Subject</b></li> : Enter an appropriate <b>subject</b> which describes your complain/suggestion/request.
							<li><b>Body</b></li> : Enter the <b>main body</b> of your message in this field. Be as informative as possible regarding your complaints/suggestions/requests.
							<li><b>Verification Code</b></li> : Read the verification code from the image and enter it into the text-box provided. This verification is done to ensure that the actions are performed by humans and not by any robot/automatic system.
							<li><b>Submit</b></li> : After you're done with adding the details, click on this button to send an email to the Administration team.
						</ul>
						</p>
						<p><b>IMPORTANT : DEPENDING ON THE SEVERITY, IT MAY TAKE 2-5 DAYS TO RESPOND TO YOUR QUERIES AND PROVIDE YOU WITH A RESOLUTION.</b></p>
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<img src="<?= yii\helpers\Url::to('@web/images/contact_us.png') ?>" style= "width:100%">
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<img src="<?= yii\helpers\Url::to('@web/images/contact_us2.png') ?>" style= "width:100%">
					</div>
					</div>
				</div>
				<hr/>


<!-- About Us -->
				<div class="about_us" id="about_us">
					<h4><b>About Us</b></h4>
					<div class=row>
					<div class="col-md-8">
						<p style="margin-top:10px">
							This page contains important information about the awesome team members of <b>Agnel-Online</b> who worked really hard to bring this dream of <b>Automation</b> to reality.
						</p>
						<p>
							You can find the following information from the <b>About US</b> page:
							<ul>
								<li><b>Name</b> of the team-members.</li>
								<li><b>Branch</b> (Department) to which the team-members belong.</li>
								<li><b>Contct & Email-ID</b> of all the team-members involved in this project, so you can get in contact with specific person if any need arises.</li>
								<li><b>Role & Contribution </b> of each member towards the development of <b>Agnel-Online</b>.</li>
							</ul>
						</p>
					</div>
					<div class="col-md-4" style="margin-top:10px">
						<img src="<?= yii\helpers\Url::to('@web/images/about_us.png') ?>" style= "width:100%">
					</div>
					</div>
				</div>
				<hr/>


			</div>

			<div id="faqs" class="tab-pane fade">
				<b><u>Question 1</u> :</b>
				<b>I'm new to Agnel-Online. Can you please help me with setting up my account ?</b>
				</b><br/>
				<b><u>Answer</u> :</b>
			</div>
		</div>
	</div>
</div>

