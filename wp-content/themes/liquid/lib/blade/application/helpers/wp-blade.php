<?php

class WP_Blade {


	protected static $compilers = array(
		'wpquery',
		'wpposts',
		'wpempty',
		'wpend',
		'debug',
		'acfrepeater',
		'acfend',
		'define',
		'ifgf'
	);


	public static function compile_acfrepeater( $value ){
		$pattern = '/(\s*)@acfrepeater\(((\s*)(.+))\)/';
		$replacement = '$1<?php if ( have_rows( $2 ) ) : ';
		$replacement .= 'while ( have_rows( $2 ) ) : the_row(); ?>';

		return preg_replace( $pattern, $replacement, $value );
	}

	public static function compile_acfend( $value ){

		return str_replace('@acfend', '<?php endwhile; endif; ?>', $value);
	}

	/**
	 *
	 */
	public static function compile_string( $value, $view = null ) {

		foreach (static::$compilers as $compiler)
		{
			$method = "compile_{$compiler}";

			$value = static::$method($value, $view);
		}

		return $value;
	}

	/**
	 *
	 */
	protected static function compile_wpposts( $value ) {

		return str_replace('@wpposts', '<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>', $value);
	}

	/**
	 *
	 */
	protected static function compile_wpquery( $value ) {

		$pattern = '/(\s*)@wpquery(\s*\(.*\))/';
		$replacement  = '$1<?php $wp_query = null; ?>';
		$replacement  = '$1<?php $wp_query = new WP_Query$2; ';
		$replacement .= 'if ( $wp_query->have_posts() ) : ';
		$replacement .= 'while ( $wp_query->have_posts() ) : ';
		$replacement .= '$wp_query->the_post(); ?> ';

		return preg_replace( $pattern, $replacement, $value );
	}

	/**
	 *
	 */
	protected static function compile_wpempty( $value ) {

		return str_replace('@wpempty', '<?php endwhile; ?><?php else: ?>', $value);
	}

	/**
	 *
	 */
	protected static function compile_wpend( $value ) {

		return str_replace('@wpend', '<?php endif; wp_reset_postdata(); ?>', $value);
	}

	/**
	 *
	 */
	protected static function compile_debug( $value ) {

		// Done last
		if( strpos( $value, '@debug' ) )
			die( $value );
		return $value;
	}

	/**
	 *
	 */
	protected static function compile_define( $value ) {

		return preg_replace('/\@define(.+)/', '<?php ${1}; ?>', $value);
	}
	
	public static function compile_ifgf( $value ){
		$pattern = '/(\s*)@ifgf\(((\s*)(.+))\)/';
		$replacement = '$1<?php if ( get_field( $2 ) ) : ?>';

		return preg_replace( $pattern, $replacement, $value );
	}

}
