
	<div class="head" ng-controller="navCtrl">
	  	<div class="title"> 
	  		<button type="button" ng-click="toggleNav()" class="navbar-toggle" >
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
	  	 {{application_name}} </div>
	  	<div class="user">
	    	<div class="user_img"></div>
		    <ul>
		      	<li class="user_name">{{name}}</li>
		      	<li class="user_role">{{role}}</li>
		    </ul> 
	 	</div>
	</div>
	<div class="body" ng-controller="navCtrl">

		<ul id="accordion">
		    <li ng-repeat="nav in nav_links" class="panel">
		    	<a ng-href="{{nav.page_link}}"  data-toggle="collapse"  data-parent="#accordion"  data-target="#nav_{{nav.page_name}}" > 
		      	<i class="{{nav.page_icon}}"></i> {{nav.page_name}} <span class="caret pull-right" ng-if="nav.page_sublinks"></span></a> 

		      	<ul class="collapse nav_{{nav.page_name}}" id="nav_{{nav.page_name}}" ng-if="nav.page_sublinks">
			        <li><a ng-href="{{subnav.subpage_link}}" ng-repeat="subnav in nav.page_sublinks"> - &nbsp; {{subnav.subpage_name}}</a></li> 
			    </ul> 

		    </li>

		</ul>

	</div> 
