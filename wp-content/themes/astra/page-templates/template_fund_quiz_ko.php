<?php
include("./wp-load.php");
//global $wpdb;
/*
 Template Name: Fundamentals Quiz - KO
Template Post Type: sfwd-courses, sfwd-lessons, sfwd-topic, sfwd-quiz
*/

$advQuiz = do_shortcode('[ld_quiz quiz_id="118949"]');

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Macallan&reg;</title>
<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/astra/lite_academy/images/icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/wp-content/themes/astra/lite_academy/images/icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/astra/lite_academy/images/icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/wp-content/themes/astra/lite_academy/images/icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/astra/lite_academy/images/icons/favicon-16x16.png">
<link rel="manifest" href="/wp-content/themes/astra/lite_academy/images/icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/wp-content/themes/astra/lite_academy/images/icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<?php wp_head(); ?>
<link href="/wp-content/themes/astra/lite_academy/css/swiper.min.css" rel="stylesheet">
<link href="/wp-content/themes/astra/lite_academy/css/styles.css?ver=<?php echo rand(111,999)?>" rel="stylesheet">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<script src="/wp-content/themes/astra/lite_academy/scripts/swiper.min.js"></script>
<script src="/wp-content/themes/astra/lite_academy/scripts/misc.js"></script>
<style>
	.quizOverlay{
		display:none;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content{
		display:block;
		background:#000;
		width: 52%;
		margin: 0 auto;
		overflow: visible;
		display: flex;
		align-items: flex-start;
		justify-content: center;
		flex-direction: row-reverse;
		padding:0;
		font-family: 'AGaramondPro-Regular';
		color:#fff;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content > h2{
		display:none;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_text .wpProQuiz_button,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_button, 
	.quiz_continue_link a#quiz_continue_link{
		background: #000;
		color: #fff;
		border: 1px solid #fff;
		font-size: 20px;
		letter-spacing: 1px;
		margin: 0 auto;
		border-radius: 50px;
		font-family: 'Gotham-Bold';
		text-transform: uppercase;
		width: 359px;
		padding: 20px;
		box-sizing: border-box;
		height: auto;
		line-height: 1;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button{
		width:200px;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_text .wpProQuiz_button:hover,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button:hover,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_button:hover,
	.quiz_continue_link a#quiz_continue_link:hover{
		
		border: 1px solid #fff;
		background: #fff;
		color: #000;
	}
	
	,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .quiz_continue_link #quiz_continue_link{
		border:1px solid #fff;
		background:#000;
		color:#fff;
		font-family: 'AGaramondPro-Regular';
		font-size:26px;
		margin:0 auto;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_button:hover,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .quiz_continue_link #quiz_continue_link:hover{
		border-color:#000;
		color:#000;
		background:#fff;
	}
	
	.wpProQuiz_content .wpProQuiz_questionListItem input, .wpProQuiz_questionListItem label{
		cursor: pointer;
	}
	
	
	
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz{
		background:#000;
		color:#fff;
		width:100%;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list{
		list-style:none;
		
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem{
		list-style:none;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question_page{
		
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question_page .wpProQuiz_header,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_header{
		display:none;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_question_text p{
		font-size: 60px;
		line-height: 1.1;
		text-align: left;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList{
		background:transparent;
		color:#fff;
		border:none;
		margin-top: 60px;
    	margin-bottom: 40px;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem{
		font-size: 24px;
		font-family: 'Gotham-Bold';
		line-height: 1;
		text-transform: uppercase;
		letter-spacing: .1em;
		padding:0;
		padding-top: 8px;
		height:auto;
		overflow:visible;
		   
		margin-bottom: 30px;
        padding-bottom: 40px;
		border-bottom: 2px solid #fff;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem:last-of-type{
		border-bottom: none;
	}
	
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem .wpProQuiz_questionInput{
		
		height: 35px;
		width: 35px;
		position: relative;
		top: 8px;
		margin-right: 10px;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_sending{
		width:100%;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_sending .wpProQuiz_header{
		
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_sending div .course_progress{
		background:#000;
		border:1px solid #fff;
		height:100px;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_sending div .course_progress .course_progress_blue.sending_progress_bar{
		background-color:#fff;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results{
		width:100%;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_header{
		display:none !important;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
		font-size: 60px;
		line-height: 1.1;
		    font-size: 60px;
    line-height: 1.1;
    max-width: 60%;
    margin: 0 auto;
    padding: 0 40px;
    box-sizing: border-box;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time,
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points{
		font-size:50px;
		margin-top:20px;
		font-weight: normal;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results > div{
		text-align:center;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results input[name=reShowQuestion]{
		display:none;
	}
	
	
	
	.quizWrap .knowledgeMain{}
	input.wpProQuiz_button.wpProQuiz_QuestionButton{
		float: left !important;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time {
		margin: 80px auto;
		border-top: 2px solid #fff;
		border-bottom: 2px solid #fff;
		padding: 20px 0;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time span {
    	display: block;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question_page {
    	font-size: 16px;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_header {
		color: #fff;
		font-weight: bold;
		font-size: 24px;
		margin: 10px 0 40px;
	}
	input.wpProQuiz_questionInput:checked{
		opacity: 1 !important;
	}
	
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem label input{
		 opacity: .5;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem label:hover input{
		opacity: 1;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points{
		max-width: 450px;
		margin-bottom: 40px;
	}
	.quizContainer .moduleSection.quizWrap.neqz{
		padding-top: 50px;
	}
	.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_button,
	.quiz_continue_link a#quiz_continue_link{
		font-size: 12px;
		width: 180px;
		margin-top: 50px;
	}
	.quizWrap .quiz_continue_link {
    	margin: 60px 0 0;
	}
	@media screen and (max-width: 1280px){
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_text .wpProQuiz_button,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_button,
		.quiz_continue_link a#quiz_continue_link{
			font-size: 15px;
			padding:15px;
			width:250px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button{
			width:180px;
		}
	}
	@media screen and (max-width:1024px){
		.quizWrap .knowledgeMain .wpProQuiz_content{
			width:90%;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_question_text p,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
			font-size:48px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
			font-size:36px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem{
			font-size: 22px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time {
			margin: 50px auto;
		}
		
	}
	@media screen and (max-width: 767px){
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_text .wpProQuiz_button,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_button,
		.quiz_continue_link a#quiz_continue_link{
			font-size: 14px;
			padding:12px;
			width:200px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button{
			width:120px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_question_text p, .quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p {
    		font-size: 45px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem{
			font-size: 17px;
			padding-bottom: 20px;
    		margin-bottom: 15px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem .wpProQuiz_questionInput{
			width: 30px;
			height: 30px;
		}
		.wpProQuiz_results .quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
			font-size: 38px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time, .quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points {
    		font-size: 38px;
			}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
			font-size:36px;
		}
	}
	@media screen and (max-width: 680px){
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_text .wpProQuiz_button,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results .wpProQuiz_button,
		.quiz_continue_link a#quiz_continue_link{
			font-size: 12px;
			padding:10px;
			width:180px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_button{
			width:110px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_question_text p, .quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p {
    		font-size: 40px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem{
			font-size: 15px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem .wpProQuiz_questionInput{
			width: 25px;
			height: 25px;
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_header {
			color: #fff;
			font-weight: bold;
			font-size: 17px;
			margin: 0 0 20px;
		}
		.wpProQuiz_results .quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
			font-size: 30px;
				
		}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
			font-size:32px;
		}
		}
		
		@media screen and (max-width: 440px){
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_question_text p, .quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p {
    		font-size: 32px;
			}
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList .wpProQuiz_questionListItem{
			font-size: 11px;
			}
			.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_quiz_time,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p.wpProQuiz_points,
		.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_results p{
			font-size:29px;
		}
			.quizWrap .knowledgeMain .wpProQuiz_content .wpProQuiz_quiz .wpProQuiz_list .wpProQuiz_listItem .wpProQuiz_question .wpProQuiz_questionList{
				margin-top: 40px;
			}
		}
	
</style>
</head>
<body>
	<div class="pageContainer module-03 altmod quizContainer">
		<div class="quizOverlay">
			<div class="overlayInner">
				<div class="overlayHeader">
					<img src="/wp-content/themes/astra/lite_academy/images/logoBuilding.svg" alt="">
				</div>
				<div class="overlayMain">
					<div class="innerpad">
						<h3>축하합니다</h3>
						<p>맥캘란 아카데미 기초 프로그램을 완료하셨습니다. 이제 여러분은 위스키와 맥캘란, 그리고 탁월한 위스키 라인 '맥캘란 더블 캐스크'와 '맥캘란 셰리 오크'에 관한 실용적인 지식을 갖추셨습니다. 아래 인증서의 주인이 되셨습니다. 아래의 아이콘을 클릭하여 인증서를 인쇄하거나 다운로드하십시오.</p>
					</div>
					
					<?php echo do_shortcode('[uo_learndash_certificates]'); ?>
<!--					<img src="/wp-content/plugins/macallan-custom/assets/images/MAC_Global_Academy_Certificate_Icon_3.png" alt="">-->
<!--					<button class="sharebtn">Share</button>-->
<!--
					<div class="shareIcons" style="text-align:center;margin:30px 0;">
						<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//themacallanacademy.com/assets/Facebook.png" target="_blank"><img src="/wp-content/themes/astra/lite_academy/images/facebook.jpg" style="height:30px;width:30px;display:inline-block;background:#000;border-radius:10px;"/></a>
						<a href="https://twitter.com/intent/tweet?text=I%20successfully%20completed%20The%20Macallan%20Fundamentals%20and%20learned%20about%20this%20luxury%20brand%20of%20Scotch%20Whisky.%20https%3A//themacallanacademy.com/assets/Twitter.png" target="_blank"><img src="/wp-content/themes/astra/lite_academy/images/twitter.png" style="height:30px;width:30px;display:inline-block;border-radius:10px;"/></a>
						<a href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A//themacallanacademy.com/assets/LinkedIn.png&title=The%20Macallan%20Fundamentals&summary=I%20successfully%20completed%20The%20Macallan%20Fundamentals%20and%20learned%20about%20this%20luxury%20brand%20of%20Scotch%20Whisky.%20Click%20here%20to%20learn%20more.&source=" target="_blank"><img src="/wp-content/themes/astra/lite_academy/images/linkedin.png" style="height:30px;width:30px;display:inline-block;background:#000;border-radius:10px;"/></a>
					</div>
-->
					<div class="linkShare">
						<?php
							$userRole = get_user_meta(get_current_user_id(), 'user_role');
							if($userRole[0] == 'eaSales' || $userRole[0] == 'distributor'){
						?>
<!--								<p>Share Link:</p><input style="width:60%;margin-left:20%;" type="text" value="themacallanacademy.com/?9HACWc7P4D6F9r8d"/><br/><p>Copy and share this link so others can enjoy The Macallan Academy Lite Experience</p>-->
						
						<?php
							}else{
								
							}
						?>
					</div>
					<div class="graySection">
						<div class="innerpad">
							<span class="gsLabel gsLabelMain">추가 혜택</span>
							<div class="gsTwoColumn">
								<div class="gscol gscol1">
									<div class="flexGrp">
										<span class="gsLabel">맥캘란 아카데미 기초 자원</span>
										<p>맥캘란 기초 프로그램을 완료했다면 간단하게 참조할 수 있는 정보 카드를 다운로드할 수 있습니다. 개인 프로필 페이지에서 다운로드하시고 필요할 때마다 참고하세요.</p>
									</div>
									<ul style="list-style:none;margin-top:20px;">
										<li style="list-style:none;text-align:center;"><a href="/wp-content/themes/astra/lite_academy/resources/TheMacallan_FactCards_062521_Double Cask.pdf" target="_blank">더블 캐스크</a></li>
										<li style="list-style:none;text-align:center;"><a href="/wp-content/themes/astra/lite_academy/resources/TheMacallan_FactCards_062521_Casks.pdf" target="_blank">최상의 오크통</a></li>
										<li style="list-style:none;text-align:center;"><a href="/wp-content/themes/astra/lite_academy/resources/TheMacallan_FactCards_062521_Natural Colour.pdf" target="_blank">천연 색상</a></li>
										<li style="list-style:none;text-align:center;"><a href="/wp-content/themes/astra/lite_academy/resources/TheMacallan_FactCards_062521_Spiritual Home.pdf" target="_blank">맥캘란의 정신적 고향</a></li>
										<li style="list-style:none;text-align:center;"><a href="/wp-content/themes/astra/lite_academy/resources/TheMacallan_FactCards_062521_Scotch Whisky Types.pdf" target="_blank">스카치 위스키</a></li>
										<li style="list-style:none;text-align:center;"><a href="/wp-content/themes/astra/lite_academy/resources/TheMacallan_FactCardsScotchWMP_EN_KO_091721.pdf" target="_blank">위스키 제조 과정</a></li>
										<li style="list-style:none;text-align:center;"><a href="/wp-content/themes/astra/lite_academy/resources/TheMacallan_FactCardsWoodTypes_EN_KO_091721.pdf" target="_blank">나무 종류</a></li>
									</ul>
								</div>
								<div class="gscol gscol2">
									<div class="flexGrp">
										<span class="gsLabel">맥캘란 아카데미 전체 이용권한</span>
										<p>맥캘란 아카데미 기초 프로그램을 완료했다면 맥캘란 아카데미의 콘텐츠를 모두 이용할 수 있습니다. 맥캘란 아카데미는 맥캘란에 관한 모든 자원을 종합적으로 제공합니다.</p>
									</div>
									<a href="/" class="colBtn">들어가기</a>
								</div>
							</div>
							<style>
								.liteCerts h4{
									margin-top:40px;
								}
								.liteCerts div.certificate-list a{
									display:flex;
									flex-direction:row;
									justify-content:space-between;
								}
								.liteCerts div.certificate-list a img{
									width:200px;
									max-width:200px;
								}
							</style>
						</div>
					</div>
				</div>
				<div class="overlayFooter">
					<div class="overlayNav">
						<a href="/ko/courses/global-fundamentals-ko/">홈</a>
						<a href="/ko/profile/">프로필</a>
						<a href="/terms-of-use">이용약관</a>
						<a href="/privacy-policy">개인 정보 보호 정책</a>
					</div>
					<span>themacallan.com</span>
				</div>
			</div>
		</div>
		<header class="moduleHeader">
			<div>
				<span>맥캘란 아카데미 기초 퀴즈</span>
				<a href="#"><img src="/wp-content/themes/astra/lite_academy/images/logo.png" alt=""></a>
			</div>
		</header>
		<div class="moduleSection quizIntro">
			<div class="sectionContent">
				<h1>맥캘란 아카데미 기초 퀴즈</h1>
				<span>각 문항에 맞는 답을 선택하세요.</span>
			</div>
		</div>
		<img src="/wp-content/themes/astra/lite_academy/images/quizBG2.jpg" alt="">
		<div class="moduleSection quizWrap neqz">
			<div class="knowledgeMain">
				<?= $advQuiz ?>
<!--
				<div class="swiper-container">
					<div class="swiper-wrapper">
		        <div class="swiper-slide">
							<div class="sliderInner">
			        	<span class="question">The word whisky comes from the Gaelic word �uisge-beatha� or</span>
								<div class="answers">
									<label class="container"><span>Whisky Bottle</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight incorrect">Incorrect</span>
									</label>
									<label class="container"><span>Water Of Life</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight correct">Correct</span>
									</label>
									<label class="container"><span>Worldwide</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight incorrect">Incorrect</span>
									</label>
									<label class="container"><span>Barley Grain</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight incorrect">Incorrect</span>
									</label>
								</div>
							</div>
		        </div>
						<div class="swiper-slide">
							<div class="sliderInner">
			        	<span class="question">The Double Cask Range is the balanced influence of sherry seasoned, new ___ and European Oak.</span>
								<div class="answers">
									<label class="container"><span>Spanish</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight incorrect">Incorrect</span>
									</label>
									<label class="container"><span>American</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight correct">Correct</span>
									</label>
								</div>
							</div>
		        </div>
						<div class="swiper-slide">
							<div class="sliderInner">
			        	<span class="question">Double Cask 12 Years Old is a ___ yet approachable whisky.</span>
								<div class="answers">
									<label class="container"><span>Rare</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight incorrect">Incorrect</span>
									</label>
									<label class="container"><span>Complex</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight correct">Correct</span>
									</label>
								</div>
							</div>
		        </div>
						<div class="swiper-slide">
							<div class="sliderInner">
			        	<span class="question">The Sherry Oak Cask Range consists of ___ oak influenced whiskies.</span>
								<div class="answers">
									<label class="container"><span>European</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight correct">Correct</span>
									</label>
									<label class="container"><span>American</span>
									  <input type="radio" checked="checked" name="radio">
									  <span class="checkmark"></span>
										<span class="highlight incorrect">Incorrect</span>
									</label>
								</div>
							</div>
		        </div>
		    	</div>
					<div class="pagination-fraction">1/2</div>
					<div class="swiper-pagination"></div>
				</div>
-->
			</div>
		</div>
		<div class="moduleSection section17 knowledgeComplete">
			<div class="sectionContent">
				<h3>맥캘란 아카데미 기초</h3>
				<span>완료</span>
			</div>
		</div>
		<div class="moduleSection section18 footer">
			<img src="/wp-content/themes/astra/lite_academy/images/logo.png" alt="">
			<span>&copy; 2021 The Macallan Distillers Limited, The Macallan</span>
		</div>
	</div>
	<?php wp_footer(); ?>
	<script type="text/javascript">
	    var theUrl = window.location.href;
		theUrl = theUrl.split('?');
		theUrl = theUrl[1];
		theUrl = theUrl.split('=');
		if(theUrl[1] == "true"){
			jQuery('.quizOverlay').fadeIn();
		}
		
		var $certList = jQuery('.certificate-list');
		var certs = $certList.children('a');
		//console.log(certs);
		for(var x = 0; x < certs.length; x++){
			//console.log(certs[x]);
			if(jQuery(certs[x]).attr('href').includes('certificate-gold') || jQuery(certs[x]).attr('href').includes('certificate-silver')){
				jQuery(certs[x]).hide();
			}else{
				jQuery(certs[x]).html('<img src="/wp-content/plugins/macallan-custom/assets/images/MAC_Global_Academy_Certificate_Icon_3.png">');
			}

		}
		
	</script>
</body>
</html>
