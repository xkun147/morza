<?php
/**
 * Cart totals
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

?>
<div class="cart_totals <?php if ( WC()->customer->has_calculated_shipping() ) echo 'calculated_shipping'; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>
	<div class="cart_totals_wrapper">  
		<?php if ( true ) : ?>
			
			<h2><?php _e( 'ORDER TOTAL', 'wpdance' ); ?></h2>

			<table cellspacing="0">
				<tbody>

					<tr class="cart-subtotal">
						<th><strong><?php _e( 'Subtotal', 'wpdance' ); ?></strong></th>
						<td><strong><?php wc_cart_totals_subtotal_html(); ?></strong></td>
					</tr>
					
					<?php foreach ( WC()->cart->get_coupons( 'order' ) as $code => $coupon ) : ?>
						<tr class="order-discount coupon-<?php echo esc_attr( $code ); ?>">
							<th><?php _e( 'Coupon:', 'wpdance' ); ?> <?php echo esc_html( $code ); ?></th>
							<td><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
						</tr>
					<?php endforeach; ?>
						
					<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

						<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

						<?php wc_cart_totals_shipping_html(); ?>

						<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

					<?php endif; ?>
					
					<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
						<tr class="fee fee-<?php echo $fee->id ?>">
							<th><?php echo esc_html( $fee->name ); ?></th>
							<td><?php wc_cart_totals_fee_html( $fee ); ?></td>
						</tr>
					<?php endforeach; ?>
					
					<?php if ( WC()->cart->tax_display_cart == 'excl' ) : ?>
						<?php if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) : ?>
							<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
								<tr class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
									<th><?php echo esc_html( $tax->label ); ?></th>
									<td><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr class="tax-total">
								<th><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
								<td><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></td>
							</tr>
						<?php endif; ?>
					<?php endif; ?>

					<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

					<tr class="total">
						<th><strong><?php _e( 'GrandTotal', 'wpdance' ); ?></strong></th>
						<td>
							<?php wc_cart_totals_order_total_html(); ?>
						</td>
					</tr>
					
					<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

				</tbody>
			</table>
			<form class="totals_form" action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">
				<a href="#" class="button wd_update_button_visible"><?php _e( 'Update Cart', 'wpdance' ); ?></a>
				<a href="#" class="checkout-button-visible button"><?php _e('Proceed to Checkout', 'wpdance' ); ?></a>
				<!--<input type="submit" class="button wd_update_button_visible" name="update_cart" value="<?php _e( 'Update Cart', 'wpdance' ); ?>" />-->
				<!--<input type="submit" class="checkout-button button alt hidden" name="proceed" value="<?php _e( 'Proceed to Checkout', 'wpdance' ); ?>" />		-->
				<?php $woocommerce->nonce_field('cart') ?>
			</form>
			<?php if ( WC()->cart->get_cart_tax() ) : ?>
				<p><small><?php

					$estimated_text = WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping()
						? sprintf( ' ' . __( ' (taxes estimated for %s)', 'wpdance' ), WC()->countries->estimated_for_prefix() . __( WC()->countries->countries[ WC()->countries->get_base_country() ], 'wpdance' ) )
						: '';

					printf( __( 'Note: Shipping and taxes are estimated%s and will be updated during checkout based on your billing and shipping information.', 'wpdance' ), $estimated_text );

				?></small></p>
			<?php endif; ?>

		<?php elseif( $woocommerce->cart->needs_shipping() ) : ?>

			<?php if ( ! $woocommerce->customer->get_shipping_state() || ! $woocommerce->customer->get_shipping_postcode() ) : ?>

				<div class="woocommerce-info">

					<p><?php _e( 'No shipping methods were found; please recalculate your shipping and enter your state/county and zip/postcode to ensure there are no other available methods for your location.', 'wpdance' ); ?></p>

				</div>

			<?php else : ?>

				<?php

					$customer_location = $woocommerce->countries->countries[ $woocommerce->customer->get_shipping_country() ];

					echo apply_filters( 'woocommerce_cart_no_shipping_available_html',
						'<div class="woocommerce-error"><p>' .
						sprintf( __( 'Sorry, it seems that there are no available shipping methods for your location (%s).', 'wpdance' ) . ' ' . __( 'If you require assistance or wish to make alternate arrangements please contact us.', 'wpdance' ), $customer_location ) .
						'</p></div>'
					);

				?>

			<?php endif; ?>
			
		<?php endif; ?>
	</div>
	<?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>