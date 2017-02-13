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
			<span class="starter-icon alignleft">S</span>
			<div class="message">
				<h2 class="jumbo">Starter Theme</h2>
				<p class="lead">Starter Theme (v2) is an opinionated boilerplate for developing Genesis Framework child themes. It comes bundled with everything you need to ship fast, quality, and standard code to production. Starter is open-source and free to download.</p>
				</p>
				<p>
					<a href="http://startertheme.io" target="_blank">Configure Package Download</a><br/>
					<a href="http://github.com/cjkoepke/starter-theme/" target="_blank">Fork on GitHub</a>
				</p>
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
