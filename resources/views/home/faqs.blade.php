@extends('layouts.default')

@section('content')
<style type="text/css">
	 nav.navbar-webmaster ul.navbar-nav #active2 a { background:#e0e0e0; border: 2px 0px 2px 0px #779c19; color:#0089ca;}
</style>
<script>
	
	$(document).ready(function(){
		$(".fq").on(" click", function(){
			$(".fqa").not(this).hide(500);
			$(this).siblings(".fqa").show(500);
			
		});
	
	// $(document).ready(function(){
	// 	$(".fq").on("mouseover click", function(){
	// 		$(this).siblings(".fqa").show(500);
	// 		$(".fqa").not(this).sibling().hide(500);
	// 	});
		
  // $(".read_more_tag").click(function(){
             
  //          $(".post_body").not(this).hide(500);
  //          $(this).hide().siblings(".post_body").show(500);
  //          $(".read_more_tag").not(this).show(500);
     
  //   });
	});
</script>
	<div  class="container-fluid empty1"></div>
	<div  id="faq_header" class="container-fluid text-center"><h1>FAQ's</h1></div>
	<div  class="container-fluid empty1"></div>
	<div class="faq_body" >
		
		

		<div class ="faq_text">
			<div class="faq_text1">
				<h3> Client FAQ's</h3>
			</div>
			<div class="faq_text2">
				<div>
					<p class="fq">1. How J2W Premier Lounge helps my organization?</p>
					<p class="fqa">A. Premier Lounge is a dedicated platform for Senior & Niche talent hiring on different working models. Our focus is to help clients with the 30% positions that remain unfulfilled.
					<span class="text-center">
						<img src="/images/faq.png">
					</span></p><br />
				</div>
				<div>
					<p class="fq">2. How do I sign up to engage the Experts?</p>
					<p class="fqa">A. Send an email to info@joulestowatts.com with your requirements. Our team will reach out to you to brief the process.</p><br />
				</div>
				<div>
					<p class="fq">3. Can I have my team search for the profiles on the J2W Premier Lounge?</p>
					<p class="fqa">A. Yes, you will be provided with login and password to be able to search and also request for a specific candidates profile.</p><br />
				</div>
				<div>
					<p class="fq">4. Can I also get help with the consulting on how to pre-plan my upcoming niche skill requirements?</p>
					<p class="fqa">A. Our team has helped several clients with their planning. We perform market intelligence for the senior and niche requirements and help with the fulfillment plan.</p><br />
				</div>
				<div>
					<p class="fq">5. How different J2W Premier Lounge is from regular staffing?</p>
					<p class="fqa">A. Premier Lounge is an exclusive service for senior and niche talent. The complete approach is different. <br/>
					 - A dedicated senior IT specialist recruitment team is put in place.<br/>
					 - A senior manager is engaged in working with the candidates.<br/>
					 - Validated experts database used exclusively for Premier Lounge clients.<br/>
					 - Our partnership with several specialized boutique firms helps us serve through a large network of experts. J2W would be one stop solution.</p><br />
				</div>
				<div>
					<p class="fq">6. Can I engage talent on demand?</p>
					<p class="fqa">A. Yes, the platform is designed to provide On demand talent who can be engaged on different working models.</p><br />
				</div>
			</div>

		</div>

		<div class ="faq_text">
			<div class="faq_text1">
				<h3>  Boutique firms</h3>
			</div>
			<div class="faq_text2">
				<div>
					<p class="fq">1. Why do I become a J2W Premier Lounge Partner?</p>
					<p class="fqa">	A. J2W Premier Lounge provides wide range of opportunities for firms apart from several benefits. To name a few<br/>
							- Be part of the elite group of niche skills.<br/>
							- Get opportunity to engage with fortune 500 clients.<br/>
							- Make optimized use of your talent pool.<br/>
							- Less paperwork<br/>
							- First in the Market that helps achieve  competitive advantage</p><br />
				</div>
				<div>
					<p class="fq">2. How do I sign up my firm and become a partner for collaborative solutioning?</p>
					<p class="fqa">A. Click on sign-up on www.j2wpremierlounge.com or email to info@joulestowatts.com with the details of the specialized skills.</p><br />
				</div>
				<div>
					<p class="fq">3. What is the qualification process?</p>
					<p class="fqa">A. We have a very simple three step process <br/>
						- Fill out the questionnaire<br/>
						- Evaluation<br/>
						- MSA Signing</p><br />
				</div>
				<div>
					<p class="fq">4. Does my firm qualify?</p>
					<p class="fqa">A. If your answer is yes to any of the following, then you qualify -<br/>
					- Firms with specialized & niche skills<br/>
					- Firms looking for strategic engagement<br/>
					- Firms looking to expand their reach<br/>
					- Firms looking to reduce sales overheads<br/>
					- Firms looking to be part of large solutions<br/>
					- Firms looking for continuous business generation<br/>
					- Firms looking to work with fortune 500 client</p><br />
				</div>	
			</div>

		</div>

		<div class ="faq_text">
			<div class="faq_text1">
				<h3>  Professionals</h3>
			</div>
			<div class="faq_text2">
				<div>
					<p class="fq">1. Why J2W Premier Lounge?</p>
					<p class="fqa">	A. JoulestoWatts has designed this exclusive platform for experts in the Industry. It žis a platform for privileged elite members who possess specialized skills and for the senior talent. Specialized and Senior talent need very exclusive treatment and approach, which only J2W Premier Lounge service provides.
					</p><br />
				</div>
				<div>
					<p class="fq">2. What benefits do I get?</p>
					<p class="fqa">A. As a elite member of this platform and you being the wizard, you can<br/>
					 - Make high impact to the clients on high quality projects for global premium accounts<br/>
					 - Get opportunity to work with fortune 500 clients under one umbrella.<br/>
					 - Get connected to experts like yourself in varied domains.<br/>
					 - Most importantly, get to choose the way you want to work – consulting, part time, assignment etc.
					</p><br />
				</div>
				<div>
					<p class="fq">3. Will my data be confidential?</p>
					<p class="fqa">A. We take data confidentiality very seriously. We do not share your profile or data without your permission to any of our clients.</p><br />
				</div>
				<div>
					<p class="fq">4. How do I sign up?</p>
					<p class="fqa">A. You can sign up and upload your profile on www.j2wpremierlounge.com</p><br />
				</div>
			</div>

		</div>

	</div>
@endsection