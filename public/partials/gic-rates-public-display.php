<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Gic_Rates
 * @subpackage Gic_Rates/public/partials
 */
?>

<div class="gic_rates">
    <?php
    $year1 = null;
    $year2 = null;
    $year3 = null;
    $year4 = null;
    $year5 = null;

    $request = wp_remote_post( "https://cashiq.ca/Home/GetTopRates/true",  array(
        'headers'     => array('Content-Type' => 'application/json; charset=utf-8')
    ));
    if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
        return false;
    }
    $response = wp_remote_retrieve_body( $request );
    if(json_decode($response)->Success){
        $rates = (array) json_decode($response)->rates;
        $year1 = $rates['1year'];
        $year2 = $rates['2year'];
        $year3 = $rates['3year'];
        $year4 = $rates['4year'];
        $year5 = $rates['5year'];
    }
    ?>

    <div class="gic_contents">
        <h3 class="gic_title">Today's Top GIC Rates</h3>
        <div class="gic_boxes">
            <div class="gic_box">
                <p class="year_label">1 Year Fixed</p>
                <h1><?php echo $year1 ?></h1>
                <a target="_self" href="<?php echo esc_url_raw( get_option('first_year_link') ) ?>" class="get_rate_btn">Get this Rate</a>
            </div>
            <div class="gic_box">
                <p class="year_label">2 Year Fixed</p>
                <h1><?php echo $year2 ?></h1>
                <a target="_self" href="<?php echo esc_url_raw( get_option('second_year_link') ) ?>" class="get_rate_btn">Get this Rate</a>
            </div>
            <div class="gic_box">
                <p class="year_label">3 Year Fixed</p>
                <h1><?php echo $year3 ?></h1>
                <a target="_self" href="<?php echo esc_url_raw( get_option('third_year_link') ) ?>" class="get_rate_btn">Get this Rate</a>
            </div>
            <div class="gic_box">
                <p class="year_label">4 Year Fixed</p>
                <h1><?php echo $year4 ?></h1>
                <a target="_self" href="<?php echo esc_url_raw( get_option('fourth_year_link') ) ?>" class="get_rate_btn">Get this Rate</a>
            </div>
            <div class="gic_box">
                <p class="year_label">5 Year Fixed</p>
                <h1><?php echo $year5 ?></h1>
                <a target="_self" href="<?php echo esc_url_raw( get_option('fifth_year_link') ) ?>" class="get_rate_btn">Get this Rate</a>
            </div>
        </div>
    </div>
</div>
