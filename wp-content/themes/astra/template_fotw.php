<?php

/*

 Template Name: Fact of the Week

*/

get_header();


//get all the fact posts

$args = array(
	'post_type' => 'fact',
	'number_posts' => -1,
	'posts_per_page' => -1,
	'order_by' => 'post_date',
	'order' => 'DESC',	
);

$allFacts = get_posts($args);
$factDates = [];
$dateSortedList = [];

$todayDate = date('d/m/Y');
//var_dump($todayDate);

$counter = 0;
foreach($allFacts as $fact){
	array_push($factDates, array('date' => get_field('date', $fact->ID), 'post_id' => $fact->ID));
	
	//var_dump($fact->date);
	
//	$interval[] = abs(strtotime($todayDate) - strtotime($fact->date));
//	asort($interval);
//	$closest = key($interval);
//	$found = $allFacts[$closest];
//	var_dump($found);
//	//array_push($dateSortedList, get_post($found['post_id']));
//	
//	unset($allFacts[$counter]);
//	
//	array_values($allFacts);
//	
//	$counter++;
}

//var_dump($dateSortedList);

foreach($postDates as $date){
	
}


function sortDates($a){
	return strtotime($a) - date('d/m/Y');
}

function getClosestDate($dateList, $todayDate){
	foreach($dateList as $date){
		$interval[] = abs(strtotime($todayDate) - strtotime($date['date']));
	}
	
	asort($interval);
	$closest = key($interval);
	
	return $dateList[$closest];
}

//var_dump($allFacts);

$newestFactDate = getClosestDate($factDates, $todayDate);
//var_dump($newestFactDate);

$newestPost = $allFacts[0];

$postDate = date_create($newestFactDate->post_date);

//var_dump($newestPost);

?>

<div class="fotw-container">
  <div class="flex-container">
    <div class="flex-box box-pad">
        <div class="inner-border">
          <div class="box-head">
			<style>
				.inactiveLike{
					display:none !important;
				}
			</style>
            <span><?=date_format(date_create($newestPost->post_date), 'jS M Y')?></span>
            <div class="fav-btn" data-id="<?=$newestPost->ID?>" assoc-id="<?=get_current_user_id()?>">
				<?php
	
					$userId = get_current_user_id();
					$hasLiked = get_user_meta($userId, 'liked_fotw_'.$newestPost->ID, true);
				
					if($hasLiked){
						echo '<img src="/wp-content/plugins/macallan-custom/assets/images/fav-open.svg" alt="" class="fav-btn-img inactiveLike open" id="like" style="display:none;">';
						
						echo '<img src="/wp-content/plugins/macallan-custom/assets/images/fav-solid.svg" alt="" class="fav-btn-img solid activeLike" id="dislike">';
					}else{
						echo '<img src="/wp-content/plugins/macallan-custom/assets/images/fav-open.svg" alt="" class="fav-btn-img activeLike open" id="like">';
						
						echo '<img src="/wp-content/plugins/macallan-custom/assets/images/fav-solid.svg" alt="" class="fav-btn-img inactiveLike solid" id="dislike" style="display:none;">';
					}
				
					$postContent = str_replace(['<p>', '</p>'], '', $newestPost->post_content);
					$postContent = str_replace(['<!-- wp:paragraph -->', '<!-- /wp:paragraph -->'], '', $newestPost->post_content);
	
				?>
              
            </div>
          </div>
          <div class="box-main">
            <h2><?=$newestPost->post_title?></h2>
            <div class="box-img"><img src="<?=get_the_post_thumbnail_url($newestPost)?>" alt=""></div>
			<div class="box-content"><?=$postContent?></div>			  
          </div>
        </div>
    </div>
    <div class="flex-box box-list">
      <div class="box-list-sort">
        <span>Sort</span>
        <select id="sortVal">
          <option value="date">Date</option>
          <option value="likes">Likes</option>
        </select>
        <div class="sort-arrows">
          <div class="sort-down-btn sort-btn" data-val='desc'><img src="/wp-content/plugins/macallan-custom/assets/images/sort-arrow.svg" alt=""></div>
          <div class="sort-up-btn sort-btn" data-val='asc'><img src="/wp-content/plugins/macallan-custom/assets/images/sort-arrow.svg" alt=""></div>
        </div>
      </div>
      <div class="list-main">
        <ul>
			<?php
				$counter = 1;
				foreach($allFacts as $fact){
					$selected = '';
					$numLikes = get_post_meta($fact->ID, 'number_of_likes', true);
					if($counter <= 6){
						if($counter == 1){
							$selected = 'selected';
						}else
			?>
					<li class="factListItem activeFactTile" tile-id="<?=$counter?>">
						<a class="fact-selector <?=$selected?>" data-href="<?=$fact->ID?>" href="#">
							<span class="fact-title"><?=$fact->post_title?></span>
							<div class="fact-flex">
								<span class="fact-date"><?=date_format(date_create($fact->post_date), 'jS M Y')?></span>
								<?php
									if(!$numLikes){
										$numLikes = 0;
									}
								?>
								<span class="fact-like-count"><?=$numLikes?> Likes</span>
							</div>
						</a>
					</li>
			<?php	
								
					}else{
			?>
					<li class="factListItem" tile-id="<?=$counter?>" style="display:none">
						<a class="fact-selector" data-href="<?=$fact->ID?>" href="#">
							<span class="fact-title"><?=$fact->post_title?></span>
							<div class="fact-flex">
								<span class="fact-date"><?=date_format(date_create($fact->post_date), 'jS M Y')?></span>
								<?php
									if(!$numLikes){
										$numLikes = 0;
									}
								?>
								<span class="fact-like-count"><?=$numLikes?> Likes</span>
							</div>
						</a>
					</li>
					
			
			<?php						
					}
					
					$counter++;
				}
			?>
        </ul>
		<?php if($counter > 6){
		?>
			<button class="showMore">Show More</button>
		<?php 
			}
		?>
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		
		jQuery('.btn_secondary_header_back').click(function(e){
			e.preventDefault();
			window.location.href = 'https://themacallanacademy.com/';
		})
		
		jQuery( 'p:empty' ).remove();
		
		
		
		jQuery("#sortVal").change(function(){
			var value = jQuery(this).val();
			
			var data = {
				'value': value
			};
			
			var runFilter = jQuery.ajax({
				url: '/wp-content/plugins/macallan-custom/ajax/run_filter.php',
				data: data,
				dataType: 'JSON',
				method: 'POST'
			});
			
			runFilter.success(function(msg){
				console.log(msg);
				var counter = 1;
				var outputHTML = "";
				for(var x = 0; x < msg.length; x++){
					var selected = '';
					var likes = msg[x].likes;
					if(likes == ""){
						likes = 0;
					}
					if(counter <= 6){
						if(counter == 1){
							selected = 'selected';
						}
						
						outputHTML += '<li class="factListItem activeFactTile" tile-id="' + counter + '"><a class="fact-selector" data-href="' + msg[x].id + '" href="#"><span class="fact-title">' + msg[x].title + '</span><div class="fact-flex"><span class="fact-date">' + msg[x].date + '</span><span class="fact-like-count">' + likes + ' Likes</span></div></a></li>';
						
					}else{
						
						outputHTML += '<li class="factListItem activeFactTile" tile-id="' + counter + '" style="display:none;"><a class="fact-selector" data-href="' + msg[x].id + '" href="#"><span class="fact-title">' + msg[x].title + '</span><div class="fact-flex"><span class="fact-date">' + msg[x].date + '</span><span class="fact-like-count">' + likes + ' Likes</span></div></a></li>';
						
					}
					
					counter++;
				}
				
				jQuery('.list-main ul').html(outputHTML);
			})
			
			runFilter.error(function(msg){
				console.log(msg);
			})
			
		})
		
		jQuery('.sort-arrows').on('click', '.sort-btn', function(e){
			var filter = jQuery(this).attr('data-val');
			var dataValue = jQuery("#sortVal").val();
			
			var data = {
				'filter': filter,
				'dataValue': dataValue
			};
			
			var sortList = jQuery.ajax({
				url: '/wp-content/plugins/macallan-custom/ajax/sort_list.php',
				data: data,
				dataType: 'JSON',
				method: 'POST'
			});
			
			sortList.success(function(msg){
				console.log(msg);
				var counter = 1;
				var outputHTML = "";
				for(var x = 0; x < msg.length; x++){
					var selected = '';
					var likes = msg[x].likes;
					if(likes == ""){
						likes = 0;
					}
					if(counter <= 6){
						if(counter == 1){
							selected = 'selected';
						}
						
						outputHTML += '<li class="factListItem activeFactTile" tile-id="' + counter + '"><a class="fact-selector" data-href="' + msg[x].id + '" href="#"><span class="fact-title">' + msg[x].title + '</span><div class="fact-flex"><span class="fact-date">' + msg[x].date + '</span><span class="fact-like-count">' + likes + ' Likes</span></div></a></li>';
						
					}else{
						
						outputHTML += '<li class="factListItem activeFactTile" tile-id="' + counter + '" style="display:none;"><a class="fact-selector" data-href="' + msg[x].id + '" href="#"><span class="fact-title">' + msg[x].title + '</span><div class="fact-flex"><span class="fact-date">' + msg[x].date + '</span><span class="fact-like-count">' + likes + ' Likes</span></div></a></li>';
						
					}
					
					counter++;
				}
				
				jQuery('.list-main ul').html(outputHTML);
			})
			
			sortList.error(function(msg){
				console.log(msg);
			})
		})
		
		jQuery(".showMore").click(function(e){
			e.preventDefault();
			var numItems = jQuery('.factListItem').length;
			var $lastEl = jQuery('.activeFactTile').last();
			var startCount = $lastEl.attr('tile-id');
			startCount++;

			for(var x = 0; x <= 7; x++){
				var $target = jQuery('.factListItem[tile-id="' + startCount + '"]');
				if($target){
					$target.show();
					$target.addClass('activeFactTile');
					startCount++;
				}else{
					break;
				}
			}

			if(startCount > numItems){
				jQuery('.showMore').hide();
			}
		})
		
		jQuery('.list-main ul').on('click', 'a.fact-selector', function(e){
			e.preventDefault();
			var factId = jQuery(this).attr('data-href');
			
			jQuery('.selected').removeClass('selected');
			jQuery(this).addClass('selected');
			
			var data = {
				'factId': factId
			};
			
			var getNewFact = jQuery.ajax({
				url: '/wp-content/plugins/macallan-custom/ajax/swap_facts.php',
				data: data,
				dataType: 'JSON',
				method: 'POST'
			});
			
			getNewFact.success(function(msg){
				//console.log(msg.post.post_content);
				//console.log(msg.image);				
				jQuery( 'p:empty' ).remove();
				//need to add image swaps on the like vs no like
				jQuery('.box-main h2').text(msg.post.post_title);
				jQuery('.box-main .box-img img').attr('src', msg.image);
				jQuery('.box-main .box-content').html(msg.post.post_content);
				jQuery('.box-head span').text(msg.formatted_date);
				jQuery('.fav-btn').attr('data-id', msg.post.ID);
				
				//$( 'p:empty' ).remove();
				
				//console.log(msg.hasLiked);
				
				if(msg.hasLiked){
					console.log('has likes, remove on open, add on solid');
					jQuery('.open').hide();
					jQuery('.open').removeClass('active');
					jQuery('.open').addClass('inactiveLike');
					jQuery('.solid').show();
					jQuery('.solid').addClass('active');
					jQuery('.solid').removeClass('inactiveLike');
				}else{
					console.log('no likes, remove on closed, add on open');
					jQuery('.solid').hide();
					jQuery('.solid').removeClass('active');
					jQuery('.solid').addClass('inactiveLike');
					jQuery('.open').show();
					jQuery('.open').addClass('active');
					jQuery('.open').removeClass('inactiveLike');
				}
				
			});
			
			getNewFact.error(function(msg){
				alert('Something went wrong, please refresh the page and try again');
			});
		})
		
		
		jQuery('.fav-btn').on('click', '.fav-btn-img', function(e){
			
			var type = 'like';
			
			if(jQuery(this).attr('id') == 'dislike'){
				type = 'dislike';
			}
			
			var data = {
				'page_id': jQuery('.fav-btn').attr('data-id'),
				'type': type,
				'assoc_id': jQuery('.fav-btn').attr('assoc-id')
			};
			
			console.log(data);
			
			var updateLike = jQuery.ajax({
				url: '/wp-content/plugins/macallan-custom/ajax/update_likes_fotw.php',
				data: data,
				dataType: 'JSON',
				method: 'POST'
			});
			
			updateLike.success(function(msg){
				console.log(msg);
				if(msg.success == 'success' && data.type == 'like'){
					jQuery('.open').hide();
					jQuery('.open').removeClass('active');
					jQuery('.open').addClass('inactiveLike');
					jQuery('.solid').show();
					jQuery('.solid').addClass('active');
					jQuery('.solid').removeClass('inactiveLike');
					jQuery('a.fact-selector[data-href="' + msg.post_id + '"] .fact-like-count').text(msg.numLikes + ' Likes');
				}else{
					jQuery('.solid').hide();
					jQuery('.solid').removeClass('active');
					jQuery('.solid').addClass('inactiveLike')
					jQuery('.open').show();
					jQuery('.open').addClass('active');
					jQuery('.open').removeClass('inactiveLike');
					jQuery('a.fact-selector[data-href="' + msg.post_id + '"] .fact-like-count').text(msg.numLikes + ' Likes');
				}
			})
			
			updateLike.error(function(msg){
					alert('Something went wrong, please refresh the page and try again.');
			})
		})
	})
</script>

<?php

get_footer();

?>

