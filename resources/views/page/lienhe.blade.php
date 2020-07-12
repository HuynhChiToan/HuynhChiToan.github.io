@extends('master')
@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Contact Form</h2>
					<div class="space20">&nbsp;</div>
					
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Your Name (required)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Your Email (required)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Subject">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Your Message"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Send Message <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Contact Information</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Đại học Bách Khoa,<br>
						Thủ Đức,  <br>
						TP.Hồ Chí Minh
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Liên lạc</h6>
					<p>
						Liên hệ với chúng tôi qua hotline: 0382698208, <br>
						hoặc 0919606132. <br>
						<a href="mailto:biz@betadesign.com">biz@betadesign.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Employment</h6>
					<p>
						Chúng tôi hân hạnh chào đón thành viên vào team <br>
						<a href="toan.huynh2000@hcmut.edu.vn">toan.huynh2000@hcmut.edu.vn</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection