<?php
/**
 * Theme Footer Section for our theme.
 *
 * Displays all of the footer section and closing of the #main div.
 *
 * @package    ThemeGrill
 * @subpackage Spacious
 * @since      Spacious 1.0
 */
?>

</div><!-- .inner-wrap -->
</div><!-- #main -->
<?php do_action( 'spacious_before_footer' ); ?>

<footer id="colophon" class="clearfix">
	<?php get_sidebar( 'footer' ); ?>
    <div id="footer-body">
        
	    <div id="kontakt-info">
            <p>Nørrebro United </p>
            <p>Tlf nr. 60 79 61 40 </p>
            <p>kontor@nbunited.dk </p>
            
        </div>

        <div id="udmeld-info">
            <p> Klik HER for udmeldning </p>
            <p>Husumgade 44, baghuset - 2200 København N</p>
            <p>cvr. 32435327 - Bank reg nr. 1551 konto nr. 4190286185</p>
        </div>
    </div>
</footer>
<a href="#masthead" id="scroll-up"></a>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
