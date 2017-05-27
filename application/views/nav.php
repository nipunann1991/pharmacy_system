<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Project name</a>
</div>
<div class="navigation_items pull-right">
     <!-- Right aligned menu below button --> 
     <ul>
      <li>
        <button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">
      <i class="icon-two-cogwheels-configuration-interface-symbol"></i>
    </button>

    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
        for="demo-menu-lower-right">
      <li class="mdl-menu__item">Settings</li> 
      <li class="mdl-menu__item">Logout</li>
    </ul>
      </li>
      <li></li>
      <li></li>
     </ul>

</div><!--/.nav-collapse -->
</div>
<div class="left_nav">
<div class="head">
  <div class="title">
    Zigma POS
  </div>
  <div class="user">
    <div class="user_img"></div>
    <ul>
      <li class="user_name">Nipuna Nanayakkara</li>
      <li class="user_role">Admin</li>
    </ul> 
  </div>
</div>
<div class="body">
  <ul>
    <li>
      <a href="javascript:void(0)" class="mdl-js-ripple-effect active  mdl-js-button" data-href="dashboard"> 
      <i class="icon-dashboard"></i> Dashboard</a>
    </li>

     <li>
      <a href="javascript:void(0)" class="mdl-js-ripple-effect  mdl-js-button " data-href="category"> 
      <i class="icon-category"></i> Categories</a>
    </li>
    

    <li>
      <a href="javascript:void(0)" class="mdl-js-ripple-effect heading mdl-js-button" data-href="items" data-toggle="collapse"  data-target=".nav_items" > 
      <i class="icon-shopping-basket"></i> Items <span class="caret pull-right"></span></a> 
      <ul class="collapse nav_items">
        <li><a  href="javascript:void(0)" data-href="items"> - &nbsp; View Items</a></li>
        <li><a href="javascript:void(0)" data-href="add_items"> - &nbsp; Add Items</a></li> 
        <li><a href="javascript:void(0)" data-href="edit_items"> - &nbsp; Edit Items</a></li> 
      </ul> 
    </li>
    <li>
      <a href="javascript:void(0)" class="mdl-js-ripple-effect heading mdl-js-button" data-href="supplier" data-toggle="collapse" data-target=".nav_supplier"> 
      <i class="icon-worker-loading-boxes"></i> Supplier <span class="caret pull-right"></span></a> 
      <ul class="collapse nav_supplier">
        <li><a  href="javascript:void(0)" data-href="supplier"> - &nbsp; View Supplier</a></li>
        <li><a href="javascript:void(0)" data-href="add_supplier"> - &nbsp; Add Supplier</a></li> 
        <li><a href="javascript:void(0)" data-href="edit_supplier"> - &nbsp; Edit Supplier</a></li> 
      </ul>   
    </li>
   

  </ul>
</div>
 
</div>