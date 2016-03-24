<?php if(is_single()) { ?>
	<aside id="sidebar-products">
			<h1 class="title">En la Tienda</h1>
			<!-- Product results template -->
			<script type="text/html" data-template="sidebar_products_single">
			  %{items}
			    <li class="">
			      %{hasImage}
			      <span class="img">
			        <a href="%{ href }" class="button-img" title="%{ title }">
			          <img src="%{ image.sizes.small }" />
			        </a>
			      </span>
			      %{/hasImage}
			      <div class="info">
			      	<div class="brand">%{ vendor }</div>
					<h3 class="clearfix"><a class="title" title="%{ title }" href="%{ href }">%{ title }</a></h3>
					<p class="prices">
			          <span class="price">$%{ formatted_price }</span>
			          %{hasPrice_comparison}
				       <span class="price_comparison"><strike>$%{ price_comparison }</strike></span>
				       %{/hasPrice_comparison}
			       </p>
			      </div>
			      
			    </li>
			  %{/items}
			</script>
	
	<!-- Search form widget
	 See http://bootic.github.io/bootic_search_widget.js for more options and examples
	------------------------------------------------------->
	<ul class="clearfix products" 
	  data-bootic_widget="ProductSearch" 
	  data-template="sidebar_products_single" 
	  data-config_per_page="4" 
	  data-config_collections="destacados-lateral-articulos" 
	  data-config_shop_subdomains="portalcrianza"  
	  data-autoload="true">
	</ul>
					
</aside>	
<?php } else { ?>	

	<aside id="sidebar-products">
			<h1 class="title">En la Tienda</h1>
			<!-- Product results template -->
			<script type="text/html" data-template="sidebar_products_blog">
			  %{items}
			    <li class="">
			      %{hasImage}
			      <span class="img">
			        <a href="%{ href }" class="button-img" title="%{ title }">
			          <img src="%{ image.sizes.small }" />
			        </a>
			      </span>
			      %{/hasImage}
			      <div class="info">
			      	<div class="brand">%{ vendor }</div>
					<h3 class="clearfix"><a class="title" title="%{ title }" href="%{ href }">%{ title }</a></h3>
					<p class="prices">
			          <span class="price">$%{ formatted_price }</span>
			          %{hasPrice_comparison}
					  <span class="price_comparison"><strike>$%{ price_comparison }</strike></span>
					  %{/hasPrice_comparison}
			       </p>
			      </div>
			      
			    </li>
			  %{/items}
			</script>
	
	<!-- Search form widget
	 See http://bootic.github.io/bootic_search_widget.js for more options and examples
	------------------------------------------------------->
	<ul class="clearfix products" 
	  data-bootic_widget="ProductSearch" 
	  data-template="sidebar_products_blog" 
	  data-config_per_page="4" 
	  data-config_collections="destacados-lateral-blog" 
	  data-config_shop_subdomains="portalcrianza"  
	  data-autoload="true">
	</ul>
					
</aside>	

<?php } ?>