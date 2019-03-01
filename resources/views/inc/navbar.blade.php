<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
	<li><a href="#!">one</a></li>
	<li><a href="#!">two</a></li>
	<li class="divider"></li>
	<li><a href="#!">three</a></li>
</ul>
<nav>
	<div class="nav-wrapper">
		<a href="/" class="brand-logo">Logo</a>
		<!-- activate side-bav in mobile view -->
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul class="right hide-on-med-and-down">
			<li><a href="/posts">Blog</a></li>
			<li><a href="/posts/create">Add Post</a></li>
			<!-- Dropdown Trigger -->
			<li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
		</ul>
		<!-- navbar for mobile -->
		<ul class="side-nav" id="mobile-demo">
			<li><a href="/posts">Blog</a></li>
			<li><a href="/posts/create">Add Post</a></li>
	</div>
</nav>
