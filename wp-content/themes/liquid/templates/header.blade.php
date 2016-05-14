{{-- DEFINE THE RANGE TO SHOW THE FULL MENU --}}
@define $breakpoint = 'medium'

{{-- MOBILE TOGGLE MENU --}}
<nav class="title-bar" data-responsive-toggle="top-bar-menu" data-hide-for="{{{ $breakpoint }}}">
	<div class="title-bar-left">
		<ul class="menu">
			<li>
				<a href="{{{ home_url() }}}"><img src="http://placehold.it/130x37&text=logo" alt="{{ bloginfo('name') }}"></a>
			</li>
		</ul>
	</div>
	
	@if (has_nav_menu('primary_navigation'))
		<div class="title-bar-right">
			<ul class="menu">
				<li class="menu-toggle-icon">
					<button class="menu-icon" type="button" data-toggle></button>
				</li>
			</ul>
		</div>
	@endif
</nav>

{{-- MAIN NAV MENU --}}
<nav class="top-bar" id="top-bar-menu">
	<div class="row">
	  <div class="top-bar-left show-for-{{{ $breakpoint }}}">
	    <ul class="menu menu-logo">
	      <li><a href="{{{ home_url() }}}"><img src="http://placehold.it/200x57&text=logo" alt="{{ bloginfo('name') }}"></a></li>
	    </ul>
	  </div>
	  <div class="top-bar-right">
    @if (has_nav_menu('primary_navigation'))
			{{ 
				wp_nav_menu([
					'container' => false,
					'menu_class' => 'vertical '.$breakpoint.'-horizontal menu menu-items',
					'items_wrap' => '<ul class="%2$s" data-responsive-menu="drilldown '.$breakpoint.'-dropdown">%3$s</ul>',
					'theme_location' => 'primary_navigation',
					'walker' => new LiquidNavigation()
				])	
			}}
	  @endif
	  </div>
	</div>
</nav>
