<?php
/**
* Template Name: HSMC Home Page
*/
if ( is_active_sidebar( 'primary' ) ) : ?>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/right-sidebar.css">
<?php endif; ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/home.css">

<?php
get_header();

if ( is_active_sidebar( 'primary' ) ) : ?>
  <div id="calendar-sidebar" class="primary-sidebar widget-area clearfix" role="complementary">
    <?php dynamic_sidebar( 'primary' ); ?>
    <a href="/whats-on" class="read-more">See all activities &raquo;</a>
  </div><!-- #primary-sidebar -->
<?php endif; ?>

<main class="<?php echo omega_apply_atomic( 'main_class', 'content' );?>" <?php omega_attr( 'content' ); ?>>
	<?php
	do_action( 'omega_before_content' );
	do_action( 'omega_content' );
	do_action( 'omega_after_content' );
	?>
</main><!-- .content -->

<!-- <section id="christmas-events">
  <header><h1>Christmas at High Street</h1></header>
  <img src="/wp-content/uploads/2017/11/christmas-tree-word-cloud.png"
       class="tree-img"
       alt="Christmas Tree Word Cloud">
  <ul>
    <li>
      <b>Christmas Fayre</b> | Saturday 25<sup>th</sup> November 10:00 - 14:00<br>
      <small>Small entrance fee applies</small>
    </li>
    <li>
      <b>Messy Church</b> | Sunday 3<sup>rd</sup> December 15:30<br>
      <small>FREE</small>
    </li>
    <li>
      <b>Voices Anon Christmas Concert</b> | Thursday 7<sup>th</sup> December 19:30<br>
      <small>FREE | Doors open 19:15</small>
    </li>
    <li>
      <b>Carols by Candlelight</b> | Sunday 17<sup>th</sup> December 18:30
    </li>
    <li>
      <b>Christingle Celebration</b> | Christmas Eve 15:00
    </li>
    <li>
      <b>Midnight Communion</b> | Christmas Eve 23:30
    </li>
    <li>
      <b>Christmas Morning Service</b> | Christmas Day 10:30
    </li>
  </ul>
</section> -->


<?php if ( is_active_sidebar( 'home_centre_banner' ) ) : ?>
  <section id="promo_banner">
		<?php dynamic_sidebar( 'home_centre_banner' ); ?>
	</section><!-- #primary-sidebar -->
<?php endif; ?>

<section id="double_boxes" class="clearfix">
  <a class="double_box"
     href="<?=get_field('homepage_box_left');?>">
    <span class="title">About Us</span>
    Find out more about High St Methodist<br>
    <span class="cutout-btn">Find Out More</span>
  </a>
  <a class="double_box"
     href="<?=get_field('homepage_box_centre');?>">
    <span class="title">What's On</span>
    See what you can get involved with at High St Methodist<br>
    <span class="cutout-btn">Find Out More</span>
  </a>
</section>

<!--<section id="meet_the_minister">
  <img src="/wp-content/uploads/2016/12/RevGaryHomewood.jpg">

  <blockquote>
    You're very welcome to join us at High Street Methodist Church!<br>
    - <b>Rev. Gary Homewood, Minister</b>
  </blockquote>
</section>-->


<?php get_footer(); ?>
