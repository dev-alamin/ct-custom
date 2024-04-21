<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */
?>
<footer>
    <?php if (get_theme_mod('footer_visibility', true)) : ?>
        <div class="container">
            <?php $copyright_text = get_theme_mod('copyright_text', __('Copyright @ coalictiontechnology 2024', 'ct-custom')); ?>
            <p><?php echo esc_html($copyright_text); ?></p>
        </div>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>