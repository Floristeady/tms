<div id="featured-products" class="content-center">

	<script type="text/html" data-template="featured-products">
	  %{items}
	    <li class="column fifth">
	      %{hasImage}
	      <span class="img">
	        <a href="%{ href }" class="button-img" title="%{ title }">
	          <img src="%{ image.sizes.small  }" />
	        </a>
	      </span>
	      %{/hasImage}
	      <div class="info">
	      	<div class="brand">%{ vendor }</div>
			<h3 class="clearfix"><a class="title" title="%{ title }" href="%{ href }">%{ title }</a></h3>
			%{hasType}
	        <p class="type">%{ type.name }</p>
	       %{/hasType}
	      </div>
	      %{hasPrice}
	      <p class="prices">
	          <span class="price">$%{ formatted_price }</span>
	           %{hasPrice_comparison}
		       <span class="price_comparison"><strike>$%{ price_comparison }</strike></span>
		       %{/hasPrice_comparison}
	      </p>
	      %{/hasPrice}
	    </li>
	  %{/items}
	</script>
	

	<?php //See http://bootic.github.io/bootic_search_widget.js for more options and examples ?>
	<ul class="clearfix products" 
	  data-bootic_widget="ProductSearch" 
	  data-template="featured-products" 
	  data-config_per_page="10" 
	  data-config_collections="destacados-sitio" 
	  data-config_shop_subdomains="portalcrianza"  
	  data-autoload="true">
	</ul>	
	
</div>
