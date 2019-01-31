<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the class=site-inner div and all content after
 *
 * @package Omega
 */
?>
		<?php do_action( 'omega_after_main' ); ?>
	</div><!-- .site-inner -->
  <footer id="footer" class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
    <div class="wrap">

			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-menu' ) ); ?>


      <div class="footer-content footer-insert">
				<p class="footer-contact">
					<span>High Street Methodist Church, King Street, Maidenhead SL6 1EF</span><br>
					<!--<span>t: <a href="tel:01628 626668">01628 626668</a></span>--><span>e: <a href="mailto:office@methodistmaidenhead.org.uk">office@methodistmaidenhead.org.uk</a></span>
				</p>
				<br><br>
				<p class="copyright"><small>Copyright &copy; <?=date("Y");?> High Street Methodist Church</small></p>
        <p class="charity-details"><small>Registed Charity No. 1129473</small></p>
        <p class="CCLI-details"><small>CCLI licence no: CCL4890</small></p>
      </div>
    </div>
  </footer>
</div><!-- .site-container -->
<?php do_action( 'omega_after' ); ?>
<?php wp_footer(); ?>
</body>
</html>
