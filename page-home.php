<?php
/**
 * Template Name: Page Home
 */
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

add_action( 'wp_enqueue_scripts', 'logic_home_page_styles' );
function logic_home_page_styles() {

	$css = sprintf( '
		.site-inner {
			max-width: 100%%;
			margin-top: 0;
			padding: 68px 0;
		}
		.home-page-intro {
			overflow: hidden;
			position: relative;
			text-align: center;
		}
		.home-page-intro p.lead {
			max-width: 700px;
			margin-left: auto;
			margin-right: auto;
		}
		.site-inner section {
			padding: 15vh 0;
		}
		section h2 {
			margin-top: 0;
		}
		section > .wrap {
			margin-bottom: 0;
			margin-top: 0;
		}
		.home-page-starter {
			background: #CCD7E2;
			color: #183859;
			min-height: calc( 100vh - 68px );
		}
		.home-page-starter .wrap {
			position: relative;
		}
		.home-page-starter h2 {
			color: #fff;
		}
		.home-page-starter a:not(.button) {
			text-shadow: .03em 0 #183859, -.03em 0 #183859, 0 .03em #183859, 0 -.03em #183859, .06em 0 #183859, -.06em 0 #183859, .09em 0 #183859, -.09em 0 #183859, .12em 0 #183859, -.12em 0 #183859;
		}
		.home-page-starter a:not(.button):focus,
		.home-page-starter a:not(.button):hover {
			background-image: linear-gradient( #ffffff, #ffffff );
			color: #fff;
		}
		.home-page-starter svg {
			line-height: 1;
			width: 550px;
			height: 550px;
			opacity: .6;
			top: 0;
			right: 0;
			position: absolute;
		}
		.home-page-starter svg path {
			fill: #4381C1;
		}
		.home-page-starter .message {
			position: relative;
			z-index: 2;
		}
		.home-page-blog ul > li {
			margin-bottom: 1em;
		}
	' );

	wp_add_inline_style( 'logic', $css );

}

remove_action( 'genesis_loop','genesis_do_loop');

add_action( 'genesis_loop', 'logic_home_page_intro', 6 );
function logic_home_page_intro() {

    ?>
    <section class="home-page-intro">
		<!-- <svg class="svg-icon bg-svg" viewBox="0 0 20 20" id="cog-svg">
			<path fill="none" d="M10.032,8.367c-1.112,0-2.016,0.905-2.016,2.018c0,1.111,0.904,2.014,2.016,2.014c1.111,0,2.014-0.902,2.014-2.014C12.046,9.271,11.143,8.367,10.032,8.367z M10.032,11.336c-0.525,0-0.953-0.427-0.953-0.951c0-0.526,0.427-0.955,0.953-0.955c0.524,0,0.951,0.429,0.951,0.955C10.982,10.909,10.556,11.336,10.032,11.336z"></path>
			<path fill="none" d="M17.279,8.257h-0.785c-0.107-0.322-0.237-0.635-0.391-0.938l0.555-0.556c0.208-0.208,0.208-0.544,0-0.751l-2.254-2.257c-0.199-0.2-0.552-0.2-0.752,0l-0.556,0.557c-0.304-0.153-0.617-0.284-0.939-0.392V3.135c0-0.294-0.236-0.532-0.531-0.532H8.435c-0.293,0-0.531,0.237-0.531,0.532v0.784C7.582,4.027,7.269,4.158,6.966,4.311L6.409,3.754c-0.1-0.1-0.234-0.155-0.376-0.155c-0.141,0-0.275,0.055-0.375,0.155L3.403,6.011c-0.208,0.207-0.208,0.543,0,0.751l0.556,0.556C3.804,7.622,3.673,7.935,3.567,8.257H2.782c-0.294,0-0.531,0.238-0.531,0.531v3.19c0,0.295,0.237,0.531,0.531,0.531h0.787c0.105,0.318,0.236,0.631,0.391,0.938l-0.556,0.559c-0.208,0.207-0.208,0.545,0,0.752l2.254,2.254c0.208,0.207,0.544,0.207,0.751,0l0.558-0.559c0.303,0.154,0.616,0.285,0.938,0.391v0.787c0,0.293,0.238,0.531,0.531,0.531h3.191c0.295,0,0.531-0.238,0.531-0.531v-0.787c0.322-0.105,0.636-0.236,0.938-0.391l0.56,0.559c0.208,0.205,0.546,0.207,0.752,0l2.252-2.254c0.208-0.207,0.208-0.545,0.002-0.752l-0.559-0.559c0.153-0.303,0.285-0.615,0.389-0.938h0.789c0.295,0,0.532-0.236,0.532-0.531v-3.19C17.812,8.495,17.574,8.257,17.279,8.257z M16.747,11.447h-0.653c-0.241,0-0.453,0.164-0.514,0.398c-0.129,0.496-0.329,0.977-0.594,1.426c-0.121,0.209-0.089,0.473,0.083,0.645l0.463,0.465l-1.502,1.504l-0.465-0.463c-0.174-0.174-0.438-0.207-0.646-0.082c-0.447,0.262-0.927,0.463-1.427,0.594c-0.234,0.061-0.397,0.271-0.397,0.514V17.1H8.967v-0.652c0-0.242-0.164-0.453-0.397-0.514c-0.5-0.131-0.98-0.332-1.428-0.594c-0.207-0.123-0.472-0.09-0.646,0.082l-0.463,0.463L4.53,14.381l0.461-0.463c0.169-0.172,0.204-0.434,0.083-0.643c-0.266-0.461-0.467-0.939-0.596-1.43c-0.06-0.234-0.272-0.398-0.514-0.398H3.313V9.319h0.652c0.241,0,0.454-0.162,0.514-0.397c0.131-0.498,0.33-0.979,0.595-1.43c0.122-0.208,0.088-0.473-0.083-0.645L4.53,6.386l1.503-1.504l0.46,0.462c0.173,0.172,0.437,0.204,0.646,0.083c0.45-0.265,0.931-0.464,1.433-0.597c0.233-0.062,0.396-0.274,0.396-0.514V3.667h2.128v0.649c0,0.24,0.161,0.452,0.396,0.514c0.502,0.133,0.982,0.333,1.433,0.597c0.211,0.12,0.475,0.089,0.646-0.083l0.459-0.462l1.504,1.504l-0.463,0.463c-0.17,0.171-0.202,0.438-0.081,0.646c0.263,0.448,0.463,0.928,0.594,1.427c0.061,0.235,0.272,0.397,0.514,0.397h0.651V11.447z"></path>
		</svg> -->
        <div class="wrap">
            <h2 class="jumbo">All Things Front-End</h2>
            <p class="lead">I'm Calvin, a front-end developer with a focus on JavaScript, WordPress, and performance. I <a href="/blog/">blog</a> about what I learn,<br/> and spend a lot of time on <a href="#starter">my open-source project</a>.
			<p>
				<!-- Get Code-Fuel Every Monday -->
				<a href="#" class="button button-primary button-icon no-underline">Get Code Fuel Every Monday</a> &nbsp;
			</p>
        </div>
    </section>
	<section class="home-page-starter" id="starter">
		<div class="wrap">
			<div class="two-thirds first message">
				<h2 class="jumbo">Starter Theme 2.0</h2>
				<p class="lead">With Starter 2.0, you can customize the build process of the original Starter Theme to fit your preference. Choose from a growing list of pre-built recipes to fit your development style, from heavy automation to vanilla CSS.
				</p>
				<p>
					<a href="http://startertheme.io" target="_blank">Configure Package Download</a><br/>
					<a href="http://github.com/cjkoepke/starter-theme/" target="_blank">Fork on GitHub</a>
				</p>
			</div>
			<div class="one-third">
				<svg class="svg-icon">
					<path d="M466.875,311.250 L217.875,311.250 C200.685,311.250 186.750,297.315 186.750,280.125 L186.750,31.125 C186.750,13.935 200.685,0.000 217.875,0.000 L466.875,0.000 C484.065,0.000 498.000,13.935 498.000,31.125 L498.000,280.125 C498.000,297.315 484.065,311.250 466.875,311.250 ZM435.750,62.250 L249.000,62.250 L249.000,249.000 L435.750,249.000 L435.750,62.250 ZM62.250,435.750 L186.750,435.750 L249.000,435.750 L249.000,373.500 L311.250,373.500 L311.250,466.875 C311.250,484.065 297.315,498.000 280.125,498.000 L31.125,498.000 C13.935,498.000 0.000,484.065 0.000,466.875 L0.000,217.875 C0.000,200.685 13.935,186.750 31.125,186.750 L124.500,186.750 L124.500,249.000 L62.250,249.000 L62.250,435.750 Z"/>
				</svg>
			</div>
		</div>
	</section>
	<section class="home-page-blog">
		<div class="wrap">
			<h2 class="jumbo">Recent Blog Posts</h2>
			<p class="lead">I write a semi-weekly feed of blog posts on things that I learn about front-end development and performance. These are a few of the most recent posts:</p>
			<div class="home-loop">
				<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
					);
					remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
					genesis_custom_loop( $args );
				?>
			</div>
		</div>
	</section>
    <?php

}

genesis();
