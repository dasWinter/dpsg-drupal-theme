<?php
// $Id: page.tpl.php,v 1.47 2010/11/05 01:25:33 dries Exp $

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).

 */
?>

<div id="page">

	<div id="header">
		<?php if ($logo): ?>
			<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
				<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
			</a>
		<?php endif; ?>

		<?php if ($site_name || $site_slogan): ?>
			<div id="name-and-slogan">
				<?php /* if ($site_name): ?>
					<?php if ($title): ?>
						<div id="site-name">
							<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
						</div>
					<?php else: ?>
						<h1 id="site-name">
							<a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a>
						</h1>
					<?php endif; ?>
				<?php endif; */?>
				<?php if ($site_slogan): ?>
					<div id="site-slogan"><?php print $site_slogan; ?></div>
				<?php endif; ?>
			</div> <!-- /#name-and-slogan -->
		<?php endif; ?>
		
		<div id="headerright">
			<?php if ($site_slogan): ?>
				<?php print render($page['header']); ?>
			<?php endif; ?>
		</div>
	</div> <!-- /#header -->
<div id="inner-page">
	<?php if ($main_menu): ?>
      	<div id="navigation">
      		<div id="main_mavigation">
      			<?php print theme('links__system_main_menu', array('links' => $main_menu)); ?>
      		</div>
      		<div id="search">
      			<?php print render($page['search']); ?>
      		</div> <!-- /#search -->
		</div> <!-- /#navigation -->
    <?php endif; ?>
	<?php if ($secondary_menu): ?>
        <div id="nav_context">
        	<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu)); ?>
        </div>
	<?php endif; ?>

	<?php if ($messages): ?>
		<div id="messages">
			<?php print $messages; ?>
		</div>
	<?php endif; ?>

	<div id="main">
		
		<div id="content">
			<?php if ($breadcrumb): ?>
				<div id="breadcrumb"><?php print $breadcrumb; ?></div>
				<hr />
			<?php endif; ?>
		
      		<div id="inner-content" class="column">
        		<a id="main-content"></a>
        		<?php print render($title_prefix); ?>
        		<?php if ($title): ?><h1 class="title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
        		<?php print render($title_suffix); ?>
        		<?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        		<?php print render($page['help']); ?>
        		<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        		<?php print render($page['content']); ?>
        		<?php print $feed_icons; ?>
      		</div> <!-- /#inner-content -->
		</div> <!-- /#content -->
    	
    	<?php if ($page['sidebar_first']): ?>
        	<div id="sidebar-first" class="column sidebar">      		
          		<?php print render($page['sidebar_first']); ?>
        	</div> <!-- /#sidebar-first -->
      	<?php endif; ?>

      	<?php if ($page['sidebar_second']): ?>
        	<div id="sidebar-second" class="column sidebar">
          		<?php print render($page['sidebar_second']); ?>
        	</div> <!-- /#sidebar-second -->
      	<?php endif; ?>

	</div><!-- /#main-->

	<div id="footer">
		<?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn'] || $page['footer_fourthcolumn']): ?>
		
			<div id="footer-firstcolumn" class="footer-column">
				<?php print render($page['footer_firstcolumn']); ?>
			</div><!-- /#footer-firstcolumn -->

		
			<div id="footer-secondcolumn" class="footer-column">
				<?php print render($page['footer_secondcolumn']); ?>
			</div><!-- /#footer-secondcolumn -->
		
			<div id="footer-thirdcolumn" class="footer-column">
				<?php print render($page['footer_thirdcolumn']); ?>
			</div><!-- /#footer-thirdcolumn -->
		
			<div id="footer-fourthcolumn" class="footer-column">
				<?php print render($page['footer_fourthcolumn']); ?>
			</div><!-- /#footer-fourthcolumn -->
			
		<?php endif; ?>
		
		<div id="footer-final">
			<div>
				<?php print render($page['footer']); ?>
			</div>
			<div id="footer-close">
				<?php print render($page['footer-close']); ?>
			</div>
		</div><!-- /#footer-final -->
		
	</div> <!-- /#footer -->
</div><!-- /#inner-page -->
</div> <!-- /#page -->
