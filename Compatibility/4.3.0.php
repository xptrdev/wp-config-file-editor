<?php

if ( ! function_exists( 'get_main_network_id' ) )
{
    
    /**
     * Get the main network ID.
     *
     * @since 4.3.0
     *
     * @global wpdb $wpdb WordPress database abstraction object.
     *
     * @return int The ID of the main network.
     */    
    function get_main_network_id() {
        global $wpdb;

        if ( ! is_multisite() ) {
            return 1;
        }

        if ( defined( 'PRIMARY_NETWORK_ID' ) ) {
            $main_network_id = PRIMARY_NETWORK_ID;
        } elseif ( 1 === (int) get_current_site()->id ) {
            // If the current network has an ID of 1, assume it is the main network.
            $main_network_id = 1;
        } else {
            $main_network_id = wp_cache_get( 'primary_network_id', 'site-options' );

            if ( false === $main_network_id ) {
                $main_network_id = (int) $wpdb->get_var( "SELECT id FROM {$wpdb->site} ORDER BY id LIMIT 1" );
                wp_cache_add( 'primary_network_id', $main_network_id, 'site-options' );
            }
        }

        /**
         * Filter the main network ID.
         *
         * @since 4.3.0
         *
         * @param int $main_network_id The ID of the main network.
         */
        return (int) apply_filters( 'get_main_network_id', $main_network_id );
    }
    
    
}
