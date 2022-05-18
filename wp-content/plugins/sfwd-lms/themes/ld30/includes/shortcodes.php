<?php
/**
 * LearnDash LD30 shortcodes functions
 *
 * @package LearnDash
 */

/**
 * Shortcode handler function for [learndash_login].
 *
 * @param array  $atts Array of shortcode parameters.
 * @param string $content Content to append to and return.
 * @return string $content.
 */
function learndash_login_shortcode( $atts = array(), $content = '' ) {
	if ( ! in_array( get_post_type(), learndash_get_post_types( 'course' ), true ) ) {
		learndash_30_template_assets();
	}

	$atts = shortcode_atts(
		array(
			'login_model'      => LearnDash_Settings_Section::get_section_setting( 'LearnDash_Settings_Theme_LD30', 'login_mode_enabled' ),
			'url'              => false,
			'label'            => false,
			'icon'             => false,
			'placement'        => false,
			'class'            => false,
			'button'           => false,

			'login_url'        => '',
			'login_label'      => __( 'Login', 'learndash' ),
			'login_icon'       => 'login',
			'login_placement'  => 'left',
			'login_class'      => 'ld-login',
			'login_button'     => 'true',

			'logout_url'       => '',
			'logout_label'     => __( 'Logout', 'learndash' ),
			'logout_icon'      => 'arrow-right',
			'logout_placement' => 'right',
			'logout_class'     => 'ld-logout',
			'logout_button'    => '',

			'preview_action'   => '',
			'return'           => '',

		),
		$atts
	);

	$atts['action'] = '';
	if ( ( empty( $atts['action'] ) ) || ( ! in_array( $atts['action'], array( 'login', 'logout' ), true ) ) ) {
		if ( is_user_logged_in() ) {
			$atts['action'] = 'logout';
		} else {
			$atts['action'] = 'login';
		}
	}

	if ( ( ! empty( $atts['preview_action'] ) ) && ( in_array( $atts['preview_action'], array( 'login', 'logout' ), true ) ) ) {
		$atts['action'] = $atts['preview_action'];
	}

	$atts = apply_filters( 'learndash_login_shortcode_atts', $atts );

	$filter_args = array();
	if ( 'logout' === $atts['action'] ) {
		$filter_action = 'learndash-login-shortcode-logout';

		if ( false === (bool) $atts['url'] ) {
			if ( ! empty( $atts['logout_url'] ) ) {
				$atts['logout_url'] = esc_url_raw( $atts['logout_url'] );
				$filter_args['url'] = wp_logout_url( $atts['logout_url'] );
			} else {
				$filter_args['url'] = wp_logout_url( get_permalink() );
			}
		} else {
			$filter_args['url'] = wp_logout_url( $atts['url'] );
		}

		if ( false === (bool) $atts['label'] ) {
			if ( ! empty( $atts['logout_label'] ) ) {
				$filter_args['label'] = $atts['logout_label'];
			} else {
				$filter_args['label'] = __( 'Logout', 'learndash' );
			}
		} else {
			$filter_args['label'] = $atts['label'];
		}

		if ( false === (bool) $atts['icon'] ) {
			if ( ! empty( $atts['logout_icon'] ) ) {
				$filter_args['icon'] = $atts['logout_icon'];
			} else {
				$filter_args['icon'] = 'arrow-right';
			}
		} else {
			$filter_args['icon'] = $atts['icon'];
		}

		if ( false === (bool) $atts['placement'] ) {
			if ( ! empty( $atts['logout_placement'] ) ) {
				$filter_args['placement'] = $atts['logout_placement'];
			} else {
				$filter_args['placement'] = 'right';
			}
		} else {
			$filter_args['placement'] = $atts['placement'];
		}

		if ( false === (bool) $atts['class'] ) {
			if ( ! empty( $atts['logout_class'] ) ) {
				$filter_args['class'] = 'ld-logout ' . $atts['logout_class'];
			} else {
				$filter_args['class'] = 'ld-logout';
			}
		} else {
			$filter_args['class'] = $atts['class'];
		}

		if ( false === (bool) $atts['button'] ) {
			if ( ! empty( $atts['logout_button'] ) ) {
				$filter_args['button'] = $atts['logout_button'];
			} else {
				$filter_args['button'] = 'true';
			}
		} else {
			$filter_args['button'] = $atts['button'];
		}
	} elseif ( 'login' === $atts['action'] ) {
		$filter_action = 'learndash-login-shortcode-login';

		if ( false === (bool) $atts['url'] ) {
			if ( ! empty( $atts['login_url'] ) ) {
				$atts['login_url']  = esc_url_raw( $atts['login_url'] );
				$filter_args['url'] = $atts['login_url'];
			} else {
				if ( 'yes' === $atts['login_model'] ) {
					$filter_args['url'] = '#login';
				} else {
					$filter_args['url'] = wp_login_url( get_permalink() );
				}
			}
		} else {
			$filter_args['url'] = $atts['url'];
		}

		if ( false === (bool) $atts['label'] ) {
			if ( ! empty( $atts['login_label'] ) ) {
				$filter_args['label'] = $atts['login_label'];
			} else {
				$filter_args['label'] = __( 'Login', 'learndash' );
			}
		} else {
			$filter_args['label'] = $atts['label'];
		}

		if ( false === (bool) $atts['icon'] ) {
			if ( ! empty( $atts['login_icon'] ) ) {
				$filter_args['icon'] = $atts['login_icon'];
			} else {
				$filter_args['icon'] = 'login';
			}
		} else {
			$filter_args['icon'] = $atts['icon'];
		}

		if ( false === (bool) $atts['placement'] ) {
			if ( ! empty( $atts['login_placement'] ) ) {
				$filter_args['placement'] = $atts['login_placement'];
			} else {
				$filter_args['placement'] = 'left';
			}
		} else {
			$filter_args['placement'] = $atts['placement'];
		}

		if ( false === (bool) $atts['class'] ) {
			if ( ! empty( $atts['login_class'] ) ) {
				$filter_args['class'] = 'ld-login ' . $atts['login_class'];
			} else {
				$filter_args['class'] = 'ld-login';
			}
		} else {
			$filter_args['class'] = $atts['class'];
		}

		if ( false === (bool) $atts['button'] ) {
			if ( ! empty( $atts['login_button'] ) ) {
				$filter_args['button'] = $atts['login_button'];
			} else {
				$filter_args['button'] = 'true';
			}
		} else {
			$filter_args['button'] = $atts['button'];
		}
	}

	$filter_args['url'] = apply_filters( 'learndash_login_url', $filter_args['url'], $atts['action'], $atts );

	$filter_args = apply_filters( $filter_action, $filter_args, $atts );

	$filter_args['class'] .= ' ld-login-text ld-login-button ' . ( isset( $filter_args['button'] ) && 'true' == $filter_args['button'] ? 'ld-button' : '' );

	$icon = ( isset( $filter_args['icon'] ) ? '<span class="ld-icon ld-icon-' . $filter_args['icon'] . ' ld-icon-' . $filter_args['placement'] . '"></span>' : '' );

	if ( empty( $atts['return'] ) ) {
		ob_start();

		echo '<div class="learndash-wrapper"><a class="' . esc_attr( $filter_args['class'] ) . '" href="' . esc_attr( $filter_args['url'] ) . '">';

		if ( 'left' === $filter_args['placement'] ) {
			echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Outputting HTML for an icon
		}

		echo esc_html( $filter_args['label'] );

		if ( 'right' === $filter_args['placement'] ) {
			echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Outputting HTML for an icon
		}

		echo '</a></div>';

		if ( ! in_array( get_post_type(), learndash_get_post_types( 'course' ), true ) && ! is_user_logged_in() && 'yes' === $atts['login_model'] ) {
			learndash_load_login_modal_html();
		}

		$content .= ob_get_clean();
	} else {
		$content = maybe_serialize( $filter_args );
	}

	return $content;
}
add_shortcode( 'learndash_login', 'learndash_login_shortcode' );

function learndash_user_status_shortcode( $atts = array() ) {

	if ( isset( $atts['user_id'] ) && ! empty( $atts['user_id'] ) ) {

		$user_id = intval( $atts['user_id'] );
		unset( $atts['user_id'] );

	} else {

		$current_user = wp_get_current_user();

		if ( empty( $current_user->ID ) ) {
			return;
		}

		$user_id = $current_user->ID;

	}

	if ( empty( $atts ) ) {
		$atts = array( 'return' => true );
	} elseif ( ! isset( $atts['return'] ) ) {
		$atts['return'] = true;
	}

	$course_info = SFWD_LMS::get_course_info( $user_id, $atts );

	learndash_get_template_part(
		'shortcodes/user-status.php',
		array(
			'course_info'    => $course_info,
			'shortcode_atts' => $atts,
		),
		true
	);

}
add_shortcode( 'learndash_user_status', 'learndash_user_status_shortcode' );
