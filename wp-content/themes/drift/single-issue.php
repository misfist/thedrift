<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header();
 global $theme_option;
 $issue_color = $theme_option["issue_color"];
?>

<style type="text/css">
.com_heading01 .cfs-hyperlink span{ color: #000; } 
h4 {
    font-size: 22px;
    letter-spacing: 0px;
    font-weight: 400;
    line-height: 1.2;
    position: relative;
    padding: 0px 0 0px;
    text-align: left;
    color: #303030;
    margin: 0;
    font-family: proxy-nova;
}
.com_heading01 span{
    font-family: Avenir-Next-Thin;
    font-size: 17px;
    position: relative;
    top: -3px;
    font-weight: 500;
	color: <?php echo $issue_color; ?>;;
}
.com_heading01 h4 b {
    font-weight: 600;
    font-family: Adobe-Caslon;
    
}
.com_heading01 p{
    font-size: 17px;
    letter-spacing: 0px;
    line-height: 1.6em;
    margin-bottom: 25px;
}

.cus_post_hea h6{
	font-size: 17px;
    letter-spacing: 0px;
    line-height: 1.6em;
    margin-bottom: 15px;
    color: <?php echo $issue_color; ?>;
    font-weight: 700;
    text-transform: uppercase;
  	font-family: proxy-nova;
}

.bredcrum01{
	position: relative;
	height: 120px;
	background-repeat: no-repeat; 
	background-image: url( '<?php echo site_url(); ?>/wp-content/uploads/2020/04/bredcrum01.png '); 
    background-size: cover;
    background-position: center;
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}
.bredcrum01::after {
    display: block;
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.75);
}
.bredcrum01 .container{
	position: relative;
	z-index: 99;
}
.bredcrum01 h2 {
    font-size: 50px;
    font-weight: 700;
    font-family: Adobe-Caslon;
    line-height: 1em;
    margin: 0;
    padding: 10px 0 0 0;
    color: #303030;
}
.bredcrum01 h4 {
    font-size: 25px;
    font-weight: 500;
    font-family: proxy-nova;
    line-height: 1em;
    margin: 0 0 5px 0;
    padding: 0;
    color: #303030;
}
.issue_container {
    margin-top: 20px;
}
</style>
<?php 
  $pageID = get_the_id();
  $issue_subtitle = get_post_meta($pageID, "issue_subtitle_acf", true);  

  $bread_imageID = get_post_thumbnail_id($pageID);
  if($bread_imageID != "")
  {
  	$bread_imageURL = wp_get_attachment_image_src($bread_imageID, "full");
  	$bread_imageURL = $bread_imageURL[0];
  }  
  else
  {
  	$bread_imageURL = site_url()."/wp-content/uploads/2020/04/bredcrum01.png";
  }
?>

<div class="bredcrum01 main_container_custom" style="background: url(<?php echo $bread_imageURL; ?>)">
	<div class="container">	
		<h2><?php echo get_the_title(); ?></h2>
		<?php 
		 if($issue_subtitle != "")
		 {
		 	?>
		 	<h4><?php echo $issue_subtitle; ?></h4>
		 	<?php
		 }
		?>
</div>
</div>

<section class="cus_post_outer">
	<div class="container">

		<div class="cus_post">
<?php 
$sectionLoop = get_field('section_acf');
foreach($sectionLoop as $sectionVal)
{
	
	$section_name = $sectionVal["section_name_acf"];
	$add_article = $sectionVal["add_article_acf"];
	$colorPick = get_post_meta($pageID, "color_for_current_issue", true);
?>
		  <div class="issue_container">

			<div class="cus_post_hea">
				<h6 style=" <?php if($colorPick != "") {?>color:  <?php echo $colorPick; } ?>"><?php echo $section_name; ?></h6>
			</div>

		<?php 
		foreach($add_article as $articleValue){							
			$issueid = $articleValue["article_link_acf"]->ID;

			$issuePermalink = get_the_permalink($issueid);
			$issueTitle = get_the_title($issueid);
		?>
			<div class="com_heading01">  
				<h4><b><a href="<?php echo $issuePermalink; ?>"><?php echo $articleValue["title_acf"]; ?></a></b>​ <span class="single_issue_pipe" style="color: <?php echo $colorPick; ?>"> | </span> <a href="<?php echo $issuePermalink; ?>"> <?php echo $articleValue["subtitle_acf"]; ?> </a></h4>


   <?php $post_authors = get_the_terms( $issueid, 'authors' );
 			 $loopNum = 0;
 			 foreach($post_authors as $post_author)
 			 {
 			 	$loopNum++;
 			 	$author_id = $post_author->term_id;
 			 	
 			 	$author_link = get_term_link($post_author);
 			 	$author_name = $post_author->name;
 			 	$author_description = $post_author->description;
 			 	
 			 	if($loopNum == 1)
 			 	{
 			 		?>
 			 		<a href="<?php echo $author_link; ?>">
						<?php echo $author_name;?>
					</a>
 			 		<?php
 			 	}
 			 	else
 			 	{
 			 		?>
	 			 		<a href="<?php echo $author_link; ?>">
							<?php echo $author_name;?>
						</a>, 
 			 		<?php
 			 	}
 			 }
		
?>



			</div>
		<?php } ?>

		</div>
<?php } ?>			 
			
<?php 
$mentionIDs = get_post_meta($pageID, "select_mentions_acf", true);
?>
	<div class="com_heading01">  
		<?php 
		  foreach($mentionIDs as $mentionID)
		  {
		?>
		<style type="text/css">
			.com_heading01 h4#mention_<?php echo $mentionID; ?>   a:hover{ color: <?php echo $colorPick; ?>; }			
		</style>
		  <h4 id="mention_<?php echo $mentionID; ?>"><b style="color:<?php echo $colorPick; ?>;"> Extremely Abbreviated Reviews</b>​ <span style="color: <?php echo $colorPick; ?>">|</span> <a href="<?php echo get_the_permalink($mentionID);?>"><?php echo get_the_title($mentionID); ?></a> </h4>
		<?php
		  }
		?>
	</div>
		</div>	
	</div>	

</section>
<?php
get_footer();
?>