<?php
defined( 'ABSPATH' ) || exit;
get_template_part( 'template-parts/layout/header');
?>



<main id="archive-product" class="archive-product">
    <header class="woocommerce-products-header">
        <div class="woocommerce-products-header__breadcrumb-container"><?php woocommerce_breadcrumb();?></div>
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php do_action( 'woocommerce_archive_description' ); ?>
    </header>

    <section class="lister container">
        <aside class="lister__sidebar">
            <div class="product-filter">
                <span id="filter-btn" class="product-filter__label accordion" onclick="displayFilter()">
                    Filter
                </span>
                <div class="content">
                    <div>
                        <?php echo do_shortcode('[searchandfilter id="product_filter"]'); ?>
                    </div>
                </div>
            </div>
        </aside>

        <div class="lister__results">
            <?php
				if ( woocommerce_product_loop() ) {
			?>
            <!-- Result count and catalog ordering -->
            <div class="lister__sort-count-wrapper">
                <?php do_action( 'woocommerce_before_shop_loop' ); ?>
            </div>
            <?php
					// Shop loop
					woocommerce_product_loop_start();
					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();
							do_action( 'woocommerce_shop_loop' );
							wc_get_template_part( 'content', 'product' );
						}
					}
					woocommerce_product_loop_end();

					// Pagination
					do_action( 'woocommerce_after_shop_loop' );
				} else {
					do_action( 'woocommerce_no_products_found' );
				}
				// outputs closing divs for the content
				do_action( 'woocommerce_after_main_content' );
			?>
        </div>
    </section>
</main>
<?php get_template_part( 'template-parts/layout/footer');?>