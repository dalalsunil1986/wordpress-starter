<?php
/**
 * Template Name: Page Home
 */
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

remove_action( 'genesis_loop','genesis_do_loop');

add_action( 'genesis_loop', 'logic_home_page_intro', 6 );
function logic_home_page_intro() {

    ?>
    <section class="home-page-intro">
        <div class="wrap">
            <h2 class="jumbo">Hey, I'm Calvin.</h2>
            <p class="lead">I'm a front-end developer with a focus on JavaScript, WordPress, and performance. I <a href="/blog/">blog</a> about lessons I learn, and spend a lot of time on my <a href="#starter-theme">side project</a>.
			<p>
				<a href="#" class="button button-primary show-popup">Get Code-Fuel Every Monday</a>
			</p>
        </div>
    </section>
	<section class="home-page-starter section" id="starter-theme">
		<div class="wrap">
			<div class="logo">
				<svg width="350px" height="350px">
					<image  x="0px" y="0px" width="350px" height="350px"  xlink:href="data:img/png;base64,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" />
				</svg>
			</div>
			<div class="message">
				<h2 class="jumbo">Starter Theme</h2>
				<p class="lead">Starter Theme (v2) is a powerful boilerplate for developing Genesis Framework child themes. Generate a new theme each time you need one — ready for development from the start, with SCSS, Gulp tools, and naming <strong>pre-configured</strong>.</p>
				</p>
				<p>
					Coming Soon: <a href="http://github.com/cjkoepke/genesis-starter-theme/" target="_blank">Watch on GitHub</a>
				</p>
			</div>
		</div>
	</section>
	<section class="home-page-blog section">
		<div class="wrap">
			<!-- <h2 class="jumbo">Recent Blog Posts</h2>
			<p class="lead">I write a semi-weekly feed of blog posts on things that I learn about front-end development and performance. These are a few of the most recent posts:</p> -->
			<div class="home-loop">
				<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 4,
					);
					remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );
					genesis_custom_loop( $args );
				?>
				<a href="/blog/" class="button button-primary">See the Full Archive</a> <a href="#search" class="button">Search for a Post</a>
			</div>
		</div>
	</section>
    <?php

}

genesis();
