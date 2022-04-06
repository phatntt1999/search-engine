<?php
	/**
		* Class and Function List:
		* Function list:
		* - scrap_display_settings_page()
		* Classes list:
	*/
	function scrap_display_settings_page()
	{

		header('X-Frame-Options: GOFORIT');

	?>
    <script>
        jQuery(document).ready(function () {

            jQuery(".scrap_clear").click(function () {
                jQuery('#scrapform')[0].reset();
			});
			jQuery('#section1').click(function() {

	            jQuery('#section1').addClass('active');
	            jQuery('#section2').removeClass('active');
	            jQuery('#scrap_section').addClass('active');
	            jQuery('#setting_section').removeClass('active');
	            jQuery('#scrap_section').css('display','block');
	            jQuery('#setting_section').css('display','none');
			});
		    jQuery('#section2').click(function() {
		    	jQuery('#section1').removeClass('active');
	            jQuery('#section2').addClass('active');
	            jQuery('#scrap_section').removeClass('active');
	            jQuery('#setting_section').addClass('active');
	            jQuery('#scrap_section').css('display','none');
	            jQuery('#setting_section').css('display','block');
			});
		});
	</script>
    <div class="wrapper">
        <div class="header">
        	<style type="text/css">
        		.left .active { background: #007cba; }
        		.left .active .temp1, .left .active .temp2{ color: #fff !important; }
        		.notice.notice-success.is-dismissible, .notice.notice-error.is-dismissible{float: left;width: 85%;}
			</style>
			<div class="left" style="float: left; width: 72%; background: #8080804f">

				<div class="col-md-6 active" id="section1" style="float: left; width: 50%;cursor: pointer;"><h1 class="temp1 " style="color:#007eba; text-align: center;">Scrap</h1></div>
				<div class="col-md-6" id="section2" style="float: left; width: 50%;cursor: pointer;"><h1 class="temp2" style="color:#007eba; text-align: center;"> Settings</h1></div>
			</div>

		</div>
		<div class="content">
			<form id="scrapform" name="validation" onsubmit="return validate()"
			method="post">
				<div class="right1 active" id="scrap_section">


					<table cellspacing="1cm" cellpadding="8cm">
						<tr style="float: left; width: 850px;">
							<td style="font-size:20px;width: 50px;float: left;width: 18%;"><b>Product Link</b></td>
							<td style=" float: left; width: 60%;"><input class="scrap_url" tabindex="101" style="width: 505px;" name="scrap_url"
							value="<?php if (isset($_POST['scrap_url'])){ echo $_POST['scrap_url']; } ?>" type="text"/></td>
							<td style="float: left;">
								<div class="scrap_clear" style="background-color: #007eba;padding: 5px 20px;color: white;cursor: pointer;">
									Clear
								</div>
							</td>
						</tr>

						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;">Height</td>
							<td style=" float: left; width: 25%;"><input class="height" tabindex="102" style="width:200px;" name="height" value="<?php if (isset($_POST['height'])){ echo $_POST['height']; } ?>" type="number" step="any"/><span style="font-size: 18px; margin-left: 5px;">in</span></td>
							<td style="font-size:18px; float: left; width: 13%;">Weight</td>
							<td style=" float: left; width: 25%;"><input class="weight" tabindex="107" style="width:200px;" name="weight" value="<?php if (isset($_POST['weight'])){ echo $_POST['weight']; } ?>" type="number" step="any"/><span style="font-size: 18px; margin-left: 5px;">oz</span></td>
						</tr>

						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;">Width</td>
							<td style=" float: left; width: 25%;"><input class="width" tabindex="103" style="width:200px;" name="width" value="<?php if (isset($_POST['width'])){ echo $_POST['width']; } ?>" type="number" step="any"/><span style="font-size: 18px; margin-left: 5px;">in</span></td>

							<td style="font-size:18px; float: left; width: 13%;">Shipping Class</td>
							<td style="float: left; width: 25%;">
								<style type="text/css">#product_shipping_class{width:200px;}</style>
								<div class="options_group" >
									<?php
										$args = array(
										'taxonomy'         => 'product_shipping_class',
										'hide_empty'       => 0,
										'show_option_none' => __( 'No shipping class', 'woocommerce' ),
										'name'             => 'product_shipping_class',
										'id'               => 'product_shipping_class',
										'class'            => 'select short',
										'orderby'          => 'name',
										'tab_index'			=> 108,
										);
									?>
									<p class="form-field shipping_class_field"  style="margin: 0;">
										<?php wp_dropdown_categories( $args ); ?>
										<?php echo wc_help_tip( __( 'Shipping classes are used by certain shipping methods to group similar products.', 'woocommerce' ) ); ?>
									</p>
									<?php do_action( 'woocommerce_product_options_shipping' ); ?>
								</div>
							</td>

						</tr>

						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;">Length</td>
							<td style=" float: left; width: 25%;"><input class="length" tabindex="104" style="width:200px;" name="length" value="<?php if (isset($_POST['length'])){ echo $_POST['length']; } ?>" type="number" step="any"/><span style="font-size: 18px; margin-left: 5px;">in</span></td>


							<td style="font-size:18px; float: left; width: 13%;">Category</td>
							<td style=" float: left; width: 25%;">
								<?php $taxonomy     = 'product_cat';
									$orderby      = 'name';
									$show_count   = 0;      // 1 for yes, 0 for no
									$pad_counts   = 0;      // 1 for yes, 0 for no
									$hierarchical = 1;      // 1 for yes, 0 for no
									$title        = '';
									$empty        = 0;

									$args = array(
									'taxonomy'     => $taxonomy,
									'orderby'      => $orderby,
									'show_count'   => $show_count,
									'pad_counts'   => $pad_counts,
									'hierarchical' => $hierarchical,
									'title_li'     => $title,
									'hide_empty'   => $empty
									);
								?>
								<select name="product_cat[]" tabindex="109" id="cateogry" style="width:200px;">
									<option value="">Select Category</option>
									<?php
										$all_categories = get_categories( $args );
										foreach ($all_categories as $cat) {
											if($cat->category_parent == 0) {
												$category_id = $cat->term_id;
											?>
											<option value="<?php echo $category_id; ?>"> <?php echo $cat->name; ?></option>
											<?php
												$args2 = array(
												'taxonomy'     => $taxonomy,
												'child_of'     => 0,
												'parent'       => $category_id,
												'orderby'      => $orderby,
												'show_count'   => $show_count,
												'pad_counts'   => $pad_counts,
												'hierarchical' => $hierarchical,
												'title_li'     => $title,
												'hide_empty'   => $empty
												);
												$sub_cats = get_categories( $args2 );
												if($sub_cats) {
													foreach($sub_cats as $sub_category) { ?>
													<option value="<?php echo $$sub_category->term_id; ?>"> <?php echo $sub_category->name; ?></option>
													<?php
													}
												}
											}
										}
									?>
								</select>

							</td>


						</tr>
						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;"># of stock</td>
							<td style=" float: left; width: 25%;"><input class="stock" tabindex="105" style="width:200px;" name="stock" value="<?php if (isset($_POST['stock'])){ echo $_POST['stock']; } ?>" type="number" required/><span style="font-size: 18px; margin-left: 5px;">unit(s)</span></td>
							<td style="font-size:18px; float: left; width: 13%;">Sale Date</td>
							<td style=" float: left; width: 25%;"><input type="date" tabindex="110" name="date" id="date" value="2021-01-01" style="width:200px;"></td>

						</tr>


						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;"># of book in a set</td>
							<td style=" float: left; width: 25%;"><input style="width:200px;" tabindex="106" class="no_of_book_in_set" name="no_of_book_in_set" placeholder="1" value="<?php if (isset($_POST['no_of_book_in_set'])){ echo $_POST['no_of_book_in_set']; } ?>" type="number"/></td>
							<td style="font-size:18px; float: left; width: 13%;">Vendor</td>
							<td style=" float: left; width: 25%;">
								<?php
							        global $user_ID;

							        $admin_user = get_user_by( 'id', $user_ID );
							        $selected   = empty( $post->ID ) ? $user_ID : $post->post_author;
							        $vendors = dokan()->vendor->all(
									[
									'number' => -1,
									'role__in' => [ 'seller' ],
									]
							        );
								?>
								<label class="screen-reader-text" for="dokan_product_author_override"><?php esc_html_e( 'Vendor', 'dokan-lite' ); ?></label>
								<select name="dokan_product_author_override" tabindex="111" id="dokan_product_author_override" class="" style="width:200px;">
									<?php if ( empty( $vendors ) ) : ?>
									<option value="<?php echo esc_attr( $admin_user->ID ); ?>"><?php echo esc_html( $admin_user->display_name ); ?></option>
									<?php else : ?>
									<option value="<?php echo esc_attr( $user_ID ); ?>" <?php selected( $selected, $user_ID ); ?>><?php echo esc_html( $admin_user->display_name ); ?></option>
									<?php foreach ( $vendors as $key => $vendor ) : ?>
									<option value="<?php echo esc_attr( $vendor->get_id() ); ?>" <?php selected( $selected, $vendor->get_id() ); ?>><?php echo ! empty( $vendor->get_shop_name() ) ? esc_html( $vendor->get_shop_name() ) : esc_html( $vendor->get_name() ); ?></option>
									<?php endforeach ?>
									<?php endif ?>
								</select>
							</td>
						</tr>



						<tr >

							<td colspan="2"><input style="background-color: #007eba;
								cursor: pointer; border: none;
								color: white;
								padding: 8px 30px;
								text-align: center;
								text-decoration: none;
								display: inline-block;
							font-size: 16px;" name="goto" type="submit" value="Scrap"></td>

						</tr>


					</table>
					<!-- </form> -->
				</div>

				<div class="right1" id="setting_section" style="display: none;">

					<!-- <form id="scrapform" name="validation" onsubmit="return validate()"
					method="post"> -->
					<table cellspacing="1cm" cellpadding="8cm" style="float: left; width: 80%;">

						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;">Constant</td>
							<td style=" float: left; width: 25%;"><input class="constant" style="width:200px;" name="constant" value="<?php if (isset($_POST['constant'])){ echo $_POST['constant']; } ?>" type="number"/></td>
							<td style="font-size:18px; float: left; width: 13%;">ExchangeRate</td>
							<td style=" float: left; width: 25%;"><input class="exchangerate" style="width:200px;" name="exchangerate" value="<?php if (isset($_POST['exchangerate'])){ echo $_POST['exchangerate']; } ?>" type="number"/></td>
						</tr>
						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;">MinDiscount</td>
							<td style=" float: left; width: 25%;"><input class="mindiscount" style="width:200px;" name="mindiscount" value="<?php if (isset($_POST['mindiscount'])){ echo $_POST['mindiscount']; } ?>" type="number"/></td>
							<td style="font-size:18px; float: left; width: 13%;">MaxDiscount</td>
							<td style=" float: left; width: 25%;"><input class="maxdiscount" style="width:200px;" name="maxdiscount" value="<?php if (isset($_POST['maxdiscount'])){ echo $_POST['maxdiscount']; } ?>" type="number"/></td>
						</tr>
						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;">PayPalPercent</td>
							<td style=" float: left; width: 25%;"><input class="paypalpercentage" style="width:200px;" name="paypalpercentage" value="<?php if (isset($_POST['paypalpercentage'])){ echo $_POST['paypalpercentage']; } ?>" type="number"/></td>
							<td style="font-size:18px; float: left; width: 13%;">KlarnaFee</td>
							<td style=" float: left; width: 25%;"><input class="klarnafee" style="width:200px;" name="klarnafee" value="<?php if (isset($_POST['klarnafee'])){ echo $_POST['klarnafee']; } ?>" type="number"/></td>
						</tr>
						<tr style="float: left; width: 100%;">
							<td style="font-size:18px; float: left; width: 13%;">ShippingFee</td>
							<td style=" float: left; width: 25%;"><input class="shippingfee" style="width:200px;" name="shippingfee" value="<?php if (isset($_POST['shippingfee'])){ echo $_POST['shippingfee']; } ?>" type="number"/></td>
							<td style="font-size:18px; float: left; width: 13%;">Kg2oz</td>
							<!-- <td style=" float: left; width: 25%;"><input class="kgoz" style="width:200px;" name="kgoz" value="<?php if (isset($_POST['kgoz'])){ echo $_POST['kgoz']; } ?>" type="number"/></td> -->
							<td style=" float: left; width: 25%;"><input class="oz" style="width:200px;" name="oz" value="<?php if (isset($_POST['oz'])){ echo $_POST['oz']; } ?>" type="text"/></td>
						</tr>
						<tr >

							<!-- <td colspan="2"><input style="background-color: #007eba;
								cursor: pointer; border: none;
								color: white;
								padding: 8px 30px;
								text-align: center;
								text-decoration: none;
								display: inline-block;
							font-size: 16px;" name="save" type="submit" value="Save"></td> -->

						</tr>
					</table>


				</div>
			</form>
		</div>

	</div>


	<?php

		if (isset($_POST['goto']))
		{
			if (!$_POST["scrap_url"] == null)
			{
				$height                = $_POST["height"];
				$width                 = $_POST["width"];
				$length                = $_POST["length"];
				$weight                = $_POST["weight"];
				$no_of_book_in_set     = $_POST["no_of_book_in_set"];
				if(empty($no_of_book_in_set)){
					$no_of_book_in_set = 1;
				}
				$product_shipping_class     = $_POST["product_shipping_class"];
				$dokan_product_author_override     = $_POST["dokan_product_author_override"];

				$exchange_rate        = (isset($_POST["exchangerate"]) && $_POST["exchangerate"] > 0) ? $_POST["exchangerate"] : 22700;
				$constant             = (isset($_POST["constant"]) && $_POST["constant"]  > 0) ? $_POST["constant"] : 7;
				$pf 				  = (isset($_POST["paypalpercentage"]) && $_POST["paypalpercentage"] > 0) ? $_POST["paypalpercentage"] : 5;
				$paypal_fee           = $pf/100;
				$shipping_fee         = (isset($_POST["shippingfee"]) && $_POST["shippingfee"] > 0) ? $_POST["shippingfee"] : 10;
				$kc 				  = (isset($_POST["klarnafee"]) && $_POST["klarnafee"] > 0) ? $_POST["klarnafee"] : 50;
				$klarna_constant      = $kc/100;
				$Kg2oz				  = (isset($_POST["oz"]) && $_POST["oz"] > 0) ? $_POST["oz"] : 35.274;
				$MinDiscount		  = (isset($_POST["mindiscount"]) && $_POST["mindiscount"] > 0) ? $_POST["mindiscount"] : 15;
				$MaxDiscount		  = (isset($_POST["maxdiscount"]) && $_POST["maxdiscount"] > 0) ? $_POST["maxdiscount"] : 38;
				$basePrice			  = "";

				if($weight){
					//$weight = number_format((float)$weight/$Kg2oz, 2, '.', '');
				}

				$cateogry              = $_POST["product_cat"];

				$stock                 = ($_POST["stock"] > 0) ? $_POST["stock"] : 1;
				$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
				$prev_date = date('Y-m-d', strtotime($date .' -1 day'));

				$url                   = $_POST["scrap_url"];
				$url_without_last_part = substr($url, 0, strrpos($url, "/"));

				if ($url_without_last_part == 'https://www.vinabook.com')
				{

					$base                  = $url;
					$curl                  = curl_init();
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($curl, CURLOPT_HEADER, false);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt($curl, CURLOPT_URL, $base);
					curl_setopt($curl, CURLOPT_REFERER, $base);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					$str = curl_exec($curl);
					curl_close($curl);

					$html_base = new simple_html_dom();
					$html_base->load($str);

					$book_category = '';
					foreach ($html_base->find('ul[class=breadcrumb]') as $element)
					{
						$flag = 0;
						foreach ($element->find('span') as $cat)
						{
							if ($flag == 2)
							{
								$book_category = $cat->plaintext;
								$term          = wp_insert_term($cat->plaintext, 'product_cat', ['description' => '', 'slug' => $cat->plaintext]);
								// print_r($term['term_id']) ;
								$flag++;
								} else {
								$flag++;
							}

						}

					}

					/*****price*********/
					$scrap_tac_gia        = '';
					foreach ($html_base->find('div[class=float-left product-prices]') as $element)
					{

						foreach ($element->find('span[class=price]') as $element1)
						{

							$scrap_tac_gia = trim(str_replace("₫", "", $element1->plaintext));
						}
					}

					$sku = '';
					foreach ($html_base->find('div[id=product-sku]') as $element)
					{
						foreach ($element->find('p') as $element1)
						{
							$sku  = $element1->plaintext;
						}
					}

					$sku            = str_replace(" ", "", $sku);


					//$term_tac_gia   = wp_insert_term($scrap_tac_gia, 'pa_tac-gia', ['description'                      => '', 'slug'                      => $scrap_tac_gia]);

					/**************/
					$scrap_title          = '';
					foreach ($html_base->find('h1') as $element)
					{
						$scrap_title = $element->plaintext;
					}
					$scrap_price          = '';
					$gia_hien_tai         = ""; // current price
					$basePrice			  = "";

					////////////////////id=span-list-price -> Gia bia ////////////////////////
					foreach ($html_base->find('span[class=strike]') as $element)
					{
						$gia_hien_tai         = $element->plaintext;
						$gia_hien_tai         = str_replace('₫', '', $gia_hien_tai);
						$basePrice = $gia_hien_tai;
					}

					if($basePrice != ""){
						number_format((float)$basePrice, 2, '.', '');
						$BasePrice = (floatval($basePrice)/$exchange_rate)+$weight*10+$no_of_book_in_set*$constant;
					}
					//echo $BasePrice;exit;
					$discountPrice = '';
					$regulerPrice = '';

					$discountPrice1 = $BasePrice+$BasePrice*$paypal_fee+$klarna_constant;
					$discountPrice = number_format((float)$discountPrice1, 2, '.', '');
					$regulerPrice1 = $discountPrice+$discountPrice*(rand($MinDiscount, $MaxDiscount)/100);
					$regulerPrice = number_format((float)$regulerPrice1, 2, '.', '');

					// echo "BasePrice".$BasePrice;
					// echo "<br/>";
					// echo "discountPrice".$discountPrice;
					// echo "<br/>";
					// echo "regulerPrice".$regulerPrice;
					// echo "<br/>";
					// die;
					// if ($gia_hien_tai != "")
					// {
					// 	$scrap_price1         = ((floatval($gia_hien_tai) / $exchange_rate + $constant) * $paypal_fee) + $klarna_constant;
					// 	$temp                 = number_format((float)$scrap_price1, 2, '.', '');
					// 	$scrap_price          = $temp;

					// } else	{
					// 	///////// id=span-price --> Gia da giam tiki //////////
					// 	foreach ($html_base->find('span[class=strike]') as $element)
					// 	{
					// 		$scrap_price1         = ((floatval($element->plaintext) / $exchange_rate + $constant) * $paypal_fee) + $klarna_constant;

					// 		$temp                 = number_format((float)$scrap_price1, 2, '.', '');
					// 		$scrap_price          = $temp;
					// 	}
					// }

					$tien_giam_gia        = $scrap_price;
					//echo $tien_giam_gia;exit;
					$scrap_featured_image = '';
					foreach ($html_base->find('div[class=bk-cover]') as $element)
					{
						foreach ($element->find('img') as $imgs)
						{
							$scrap_featured_image .= $imgs->src;
						}
					}

					$product_gallery   = array();

					foreach ($html_base->find('div[class=image-thumbnail-block]') as $horizontal)
					{
						foreach ($horizontal->find('span.thumb-item') as $img)
						{
							foreach ($img->find('img') as $src)
							{
								$product_gallery[]  = str_replace("75x75", "550x550", $src->src);

							}
						}

					}

					$scrap_discription = '';
					foreach ($html_base->find('div[class=product-feature]') as $contents)
					{
						$theData           = array();
						foreach ($contents->find('li') as $cell)
						{
							$theData[]   = $cell->innertext;
						}
						$scrap_discription .= "<ul>";
						foreach ($theData as $row)
						{
							$scrap_discription .= "<li>" . $row . "</li>";
						}
						$scrap_discription .= "</ul>";

					}
					$scrap_full = '';
					foreach ($html_base->find('div[class=full-description]') as $content)
					{
						foreach ($content->find('p') as $left)
						{

							$scrap_full .= $left->plaintext . "<br>";

						}

					}

					if ($scrap_full == '')
					{
						foreach ($html_base->find('div[class=full-description') as $discription)
						{
							foreach ($discription->find('p') as $dis)
							{
								$scrap_full .= strip_tags($dis->plaintext);
							}
						}
					}
					if ($scrap_full){
						$scrap_full = str_replace('Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', '', $scrap_full);
					}
					$author_name     = '';
					foreach ($html_base->find('a[class=author]') as $auth)
					{

						$author_name     = $auth->plaintext;

					}

					$dublicate_check = trim($scrap_title);
					$page            = get_page_by_title($dublicate_check, OBJECT, 'product');
					$page_id         = $page->ID;

					global $wpdb;

					$post_if = $wpdb->get_var("SELECT count(post_title) FROM $wpdb->posts WHERE post_title like '$dublicate_check' AND post_status like 'publish' ");

					if ($post_if < 1)
					{



						$post_id = wp_insert_post(array(
						'post_title'    => $scrap_title,
						'post_content'  => $scrap_full,
						'post_status'   => 'publish',
						'post_excerpt'  => $scrap_discription,
						'post_type'     => "product",
						));
						if(!empty($cateogry)){
							wp_set_post_terms( $post_id, $cateogry, 'product_cat', true );
						}

						/*$thedata = Array(
							'pa_tac-gia' => Array(
							'name' => 'pa_tac-gia',
							'value' => $scrap_tac_gia,
							'is_visible' => '1',
							'is_taxonomy' => '1'
							)
						);*/
						//update_post_meta($post_id, '_product_attributes', $thedata);

						wp_set_object_terms( $post_id, $author_name, 'pa_tac-gia', true );

						$att_color = Array('pa_tac-gia' =>Array(
						'name'=>'pa_tac-gia',
						'value'=>$author_name,
						'is_visible' => '1',
						'is_taxonomy' => '1'
						));

						update_post_meta( $post_id, '_product_attributes', $att_color);

						// $gia_km              = "";

						// $gia_km              = $scrap_price + $scrap_price * 0.01;
						// $gia_km              = number_format((float)$gia_km, 2, '.', '');
						//$MinDiscount		 = 15;
						//$MaxDiscount		 = 38;
						//$gia_km              = "";

						/*wp_set_object_terms( $post_id, 'Admin', 'author_name', true );

							$att_author = Array('author_name' =>Array(
							'name'=>'author_name',
							'value'=> $author_name,
							'is_visible' => '1',
							'is_taxonomy' => '1'
						));*/
						wp_set_object_terms( $post_id, '', 'no_of_book_in_set', true );

						$att_book = Array('no_of_book_in_set' =>Array(
						'name'=>'no_of_book_in_set',
						'value'=> $no_of_book_in_set,
						'is_visible' => '1',
						'is_taxonomy' => '1'
						));
						$product          = wc_get_product( $post_id );
						$posted_vendor_id = ! empty( $_POST['dokan_product_author_override'] ) ? intval( $_POST['dokan_product_author_override'] ) : 0; // WPCS: CSRF ok.

						if(!empty($posted_vendor_id)){
							dokan_override_product_author( $product, $posted_vendor_id );
						}
						if(!empty($product_shipping_class)){
							$product = wc_get_product( $post_id );
							$product->set_shipping_class_id( $product_shipping_class );
							$product->save();
						}
						///////////Lay gia chua co khuyen mai /////////////////
						//$gia_km              = $scrap_price + $scrap_price * rand($MinDiscount, $MaxDiscount) * 0.01;
						//$gia_km              = number_format((float)$gia_km, 2, '.', '');

						//update_post_meta($post_id, '_regular_price', $regulerPrice);
						//update_post_meta($post_id, '_price', $regulerPrice);
						//update_post_meta($post_id, '_sale_price', $discountPrice);
						update_post_meta($post_id, '_sale_price_dates_from', $prev_date);
						update_post_meta($post_id, 'tac-gia', $author_name);
						update_post_meta($post_id, 'no_of_book_in_set', $no_of_book_in_set);
						update_post_meta($post_id, '_stock', $stock);
						update_post_meta($post_id, '_manage_stock', 'yes');
						update_post_meta($post_id, '_sku', $sku);
						update_post_meta($post_id, '_weight', $weight);
						update_post_meta($post_id, '_length', $length);
						update_post_meta($post_id, '_width', $width);
						update_post_meta($post_id, '_height', $height);
						if(!empty($regulerPrice)){
							$product = wc_get_product( $post_id );
							$product->set_regular_price( $regulerPrice );
							$product->set_sale_price( $discountPrice );
							$product->save();
						}
						if(!empty($author_name)){
							//update_field('field_600b9f7e5760e',$author_name, $post_id);
						}

						$image_url        = $scrap_featured_image;
						$image_name       = 'pi.jpg';
						$upload_dir       = wp_upload_dir();
						$image_data       = file_get_contents($image_url);
						$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
						$filename         = basename($unique_file_name);

						if (wp_mkdir_p($upload_dir['path']))
						{
							$file = $upload_dir['path'] . '/' . $filename;
							} else {
							$file = $upload_dir['basedir'] . '/' . $filename;
						}

						file_put_contents($file, $image_data);

						$wp_filetype = wp_check_filetype($filename, null);

						$attachment  = array(
						'post_mime_type' => $wp_filetype['type'],
						'post_title'     => sanitize_file_name($filename) ,
						'post_content'   => '',
						'post_status'    => 'inherit'
						);

						$attach_id   = wp_insert_attachment($attachment, $file, $post_id);

						require_once (ABSPATH . 'wp-admin/includes/image.php');

						$attach_data = wp_generate_attachment_metadata($attach_id, $file);

						wp_update_attachment_metadata($attach_id, $attach_data);

						set_post_thumbnail($post_id, $attach_id);
						$themedia         = array();
						foreach ($product_gallery as $src)
						{
							$image_url        = $src;

							$image_name       = 'pi.jpg';
							$upload_dir       = wp_upload_dir();

							$image_data       = @file_get_contents($image_url);

							$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
							$filename         = basename($unique_file_name);

							if (wp_mkdir_p($upload_dir['path']))
							{
								$file  = $upload_dir['path'] . '/' . $filename;
								} else {
								$file  = $upload_dir['basedir'] . '/' . $filename;
							}

							file_put_contents($file, $image_data);

							$wp_filetype = wp_check_filetype($filename, null);

							$attachment  = array(
							'post_mime_type'             => $wp_filetype['type'],
							'post_title'             => sanitize_file_name($filename) ,
							'post_content'             => '',
							'post_status'             => 'inherit'
							);

							$attach_id   = wp_insert_attachment($attachment, $file, $post_id);

							require_once (ABSPATH . 'wp-admin/includes/image.php');

							$attach_data = wp_generate_attachment_metadata($attach_id, $file);

							wp_update_attachment_metadata($attach_id, $attach_data);

							$themedia[] = $attach_id;

						}

						add_post_meta($post_id, '_product_image_gallery', implode(',', $themedia));
						echo '<div class="notice notice-success is-dismissible">
						<p>Product created successfully. <a href="' . get_permalink($post_id) . '">View Product</a> or <a href="' . site_url() . '/wp-admin/post.php?post=' . $post_id . '&action=edit">Edit Product</a></p>
						</div>';
						} else {
						echo '<div class="notice notice-error is-dismissible">
						<p>Product Name:<span style="color: red"> ' . $dublicate_check . '</span> already created, <a href="' . site_url() . '/wp-admin/post.php?post=' . $page_id . '&action=edit">Edit Product</a></p>
						</div>';
					}

					$html_base->clear();
					unset($html_base);

				}
				else if (($url_without_last_part == 'https://bookbuy.vn/sach') || ($url_without_last_part == 'http://bookbuy.vn/sach'))
				{
					$base = $url;

					$curl = curl_init();
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($curl, CURLOPT_HEADER, false);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt($curl, CURLOPT_URL, $base);
					curl_setopt($curl, CURLOPT_REFERER, $base);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					$str = curl_exec($curl);
					curl_close($curl);

					$html_base = new simple_html_dom();

					$html_base->load($str);

					$book_category = '';
					foreach ($html_base->find('ul[class=breadcrumb]') as $element)
					{
						$flag          = 0;
						foreach ($element->find('span') as $cat)
						{
							if ($flag == 2)
							{
								$book_category = $cat->plaintext;
								$term          = wp_insert_term($cat->plaintext, 'product_cat', ['description' => '', 'slug' => $cat->plaintext]);
								$flag++;
								} else {
								$flag++;
							}

						}

					}

					/*****tac_gia*********/
					$scrap_tac_gia        = '';
					foreach ($html_base->find('div[class=brand-block-row]') as $element)
					{
						foreach ($element->find('a[target=_blank]') as $element1)
						{
							$scrap_tac_gia  = $element1->plaintext;
						}

					}

					$sku = '';
					foreach ($html_base->find('div[id=product-sku]') as $element)
					{
						foreach ($element->find('p') as $element1)
						{
							$sku  = $element1->plaintext;
						}
					}

					$sku = str_replace(" ", "", $sku);

					$term_tac_gia = wp_insert_term($scrap_tac_gia, 'pa_tac-gia', ['description' => '', 'slug' => $scrap_tac_gia]);

					/**************/

					$scrap_title          = '';
					foreach ($html_base->find('h1') as $element)
					{
						$scrap_title = $element->plaintext;
					}
					// $scrap_price          = '';
					// $gia_hien_tai         = "";
					// $exchange_rate        = get_field('exchange_rate_bookbuy', 'options');
					// $constant             = get_field('constant_bookbuy', 'options');
					// $paypal_fee           = get_field('paypal_fee_bookbuy', 'options');
					// $klarna_constant      = get_field('klarna_constant_bookbuy', 'options');

					$scrap_price          = '';
					$gia_hien_tai         = ""; // current price


					////////////////////id=span-list-price -> Gia bia ////////////////////////
					foreach ($html_base->find('p[class=m-price]') as $element)
					{
						$gia_hien_tai         = $element->plaintext;
						$gia_hien_tai         = str_replace('Giá thị trường:', '', $gia_hien_tai);
						$gia_hien_tai         = str_replace('đ', '', $gia_hien_tai);
						$basePrice = $gia_hien_tai;
					}


					if($basePrice != ""){
						number_format((float)$basePrice, 2, '.', '');
						$BasePrice = (floatval($basePrice)/$exchange_rate)+$weight*10+$no_of_book_in_set*$constant;
					}
					//echo $BasePrice;exit;
					$discountPrice = '';
					$regulerPrice = '';

					$discountPrice1 = $BasePrice+$BasePrice*$paypal_fee+$klarna_constant;
					$discountPrice = number_format((float)$discountPrice1, 2, '.', '');
					$regulerPrice1 = $discountPrice+$discountPrice*(rand($MinDiscount, $MaxDiscount)/100);
					$regulerPrice = number_format((float)$regulerPrice1, 2, '.', '');

					// if ($gia_hien_tai != "")
					// {
					// 	$scrap_price1 = ((floatval($gia_hien_tai) / $exchange_rate + $constant) * $paypal_fee) + $klarna_constant;
					// 	$temp         = number_format((float)$scrap_price1, 2, '.', '');
					// 	$scrap_price  = $temp;
					// } else {
					// 	///////// id=span-price --> Gia da giam tiki //////////
					// 	foreach ($html_base->find('p[class=m-price]') as $element)
					// 	{
					// 		$scrap_price1         = ((floatval($element->plaintext) / $exchange + $constant) * $paypal_fee) + $klarna_constant;
					// 		$temp                 = number_format((float)$scrap_price1, 2, '.', '');
					// 		$scrap_price          = $temp;
					// 	}
					// }

					$tien_giam_gia = $scrap_price;

					$scrap_featured_image = '';
					foreach ($html_base->find('img[class=product-zoom slimmage]') as $element)
					{
						$scrap_featured_image .= 'https://bookbuy.vn' . $element->src;
					}

					$product_gallery   = array();

					foreach ($html_base->find('div[class=image-thumbnail-block]') as $horizontal)
					{
						foreach ($horizontal->find('span.thumb-item') as $img)
						{
							foreach ($img->find('img') as $src)
							{
								$product_gallery[]                   = str_replace("75x75", "550x550", $src->src);
							}
						}
					}

					$scrap_discription = '';
					foreach ($html_base->find('div[class=bbook-detail-left]') as $content)
					{
						foreach ($content->find('div[class=bbook-detail-left-1-1]') as $left)
						{
							$theData           = array();
							foreach ($left->find('li') as $cell)
							{
								$theData[]  = $cell->innertext;
							}
							$scrap_discription .= "<ul>";
							foreach ($theData as $row)
							{
								$scrap_discription .= "<li>" . $row . "</li>";
							}
							$scrap_discription .= "</ul>";

						}

					}

					$scrap_full = '';
					foreach ($html_base->find('div[class=b-description]') as $content)
					{
						foreach ($content->find('div[class=des-des]') as $left)
						{
							$scrap_full = $left->plaintext;
							$scrap_full = str_replace(array(
							"Mua",
							"online",
							"sách",
							"tại",
							"Bookbuy.vn",
							"và",
							"nhận",
							"nhiều",
							"ưu",
							"đãi"
							) , array(
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							"",
							""
							) , $scrap_full);
							$scrap_full = str_replace('đãi', '', $scrap_full);

						}

					}

					if ($scrap_full == '')
					{
						foreach ($html_base->find('div[class=b-description]') as $discription)
						{
							foreach ($discription->find('div[class=des-des]') as $dis)
							{
								$scrap_full .= strip_tags($dis->plaintext);
							}

						}

					}
					if ($scrap_full){
						$scrap_full = str_replace('Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', '', $scrap_full);
					}
					$author_name     = '';
					foreach ($html_base->find('h2[class=author]') as $auth)
					{
						$author_name = $auth->plaintext;

					}

					$dublicate_check = trim($scrap_title);
					$page            = get_page_by_title($dublicate_check, OBJECT, 'product');
					$page_id         = $page->ID;
					global $wpdb;

					$post_if = $wpdb->get_var("SELECT count(post_title) FROM $wpdb->posts WHERE post_title like '$dublicate_check' AND post_status like 'publish' ");

					if ($post_if < 1)
					{
						if(empty($sku)){
							//$sku = str_replace(' ', '-', strtolower($scrap_title));
						}
						$post_id = wp_insert_post(array(
						'post_title'         => $scrap_title,
						'post_content'         => $scrap_full,
						'post_status'         => 'publish',
						'post_excerpt'         => $scrap_discription,
						'post_type'         => "product",
						));
						if(!empty($cateogry)){
							wp_set_post_terms( $post_id, $cateogry, 'product_cat', true );
						}
						if(!empty($product_shipping_class)){
							$product = wc_get_product( $post_id );
							$product->set_shipping_class_id( $product_shipping_class );
							$product->save();
						}
						// $term    = get_term_by('name', $book_category, 'product_cat');
						// wp_set_object_terms($post_id, $term->term_id, 'product_cat');

						// $term_tac_gia = get_term_by('name', $scrap_tac_gia, 'pa_tac-gia');
						// wp_set_object_terms($post_id, $term_tac_gia->term_id, 'pa_tac-gia');


						$gia_km              = "";

						wp_set_object_terms( $post_id, $author_name, 'pa_tac-gia', true );

						$att_color = Array('pa_tac-gia' =>Array(
						'name'=>'pa_tac-gia',
						'value'=>$author_name,
						'is_visible' => '1',
						'is_taxonomy' => '1'
						));

						update_post_meta( $post_id, '_product_attributes', $att_color);
						wp_set_object_terms( $post_id, '', 'no_of_book_in_set', true );

						$att_book = Array('no_of_book_in_set' =>Array(
						'name'=>'no_of_book_in_set',
						'value'=> $no_of_book_in_set,
						'is_visible' => '1',
						'is_taxonomy' => '1'
						));
						$product          = wc_get_product( $post_id );
						$posted_vendor_id = ! empty( $_POST['dokan_product_author_override'] ) ? intval( $_POST['dokan_product_author_override'] ) : 0; // WPCS: CSRF ok.

						if(!empty($posted_vendor_id)){
							dokan_override_product_author( $product, $posted_vendor_id );
						}
						///////////Lay gia chua co khuyen mai /////////////////
						//$gia_km              = $scrap_price + $scrap_price * rand($MinDiscount, $MaxDiscount) * 0.01;
						//$gia_km              = number_format((float)$gia_km, 2, '.', '');

						//update_post_meta($post_id, '_regular_price', $regulerPrice);
						//update_post_meta($post_id, '_price', $regulerPrice);
						//update_post_meta($post_id, '_sale_price', $discountPrice);
						update_post_meta($post_id, '_sale_price_dates_from', $prev_date);
						update_post_meta($post_id, 'no_of_book_in_set', $no_of_book_in_set);
						update_post_meta($post_id, '_stock', $stock);
						update_post_meta($post_id, '_manage_stock', 'yes');
						update_post_meta($post_id, '_sku', $sku);
						update_post_meta($post_id, '_weight', $weight);
						update_post_meta($post_id, '_length', $length);
						update_post_meta($post_id, '_width', $width);
						update_post_meta($post_id, '_height', $height);
						if(!empty($regulerPrice)){
							$product = wc_get_product( $post_id );
							$product->set_regular_price( $regulerPrice );
							$product->set_sale_price( $discountPrice );
							$product->save();
						}
						if(!empty($author_name)){
							//update_field('field_600b9f7e5760e',$author_name, $post_id);
						}


						$image_url        = $scrap_featured_image;
						$image_name       = 'pi.jpg';
						$upload_dir       = wp_upload_dir();
						$image_data       = file_get_contents($image_url);
						$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
						$filename         = basename($unique_file_name);

						if (wp_mkdir_p($upload_dir['path']))
						{
							$file = $upload_dir['path'] . '/' . $filename;
							} else {
							$file = $upload_dir['basedir'] . '/' . $filename;
						}

						file_put_contents($file, $image_data);

						$wp_filetype = wp_check_filetype($filename, null);

						$attachment  = array(
						'post_mime_type'             => $wp_filetype['type'],
						'post_title'             => sanitize_file_name($filename) ,
						'post_content'             => '',
						'post_status'             => 'inherit'
						);

						$attach_id   = wp_insert_attachment($attachment, $file, $post_id);

						require_once (ABSPATH . 'wp-admin/includes/image.php');

						$attach_data = wp_generate_attachment_metadata($attach_id, $file);

						wp_update_attachment_metadata($attach_id, $attach_data);

						set_post_thumbnail($post_id, $attach_id);
						$themedia         = array();
						foreach ($product_gallery as $src)
						{
							$image_url        = $src;

							$image_name       = 'pi.jpg';
							$upload_dir       = wp_upload_dir();

							$image_data       = @file_get_contents($image_url);

							$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
							$filename         = basename($unique_file_name);

							if (wp_mkdir_p($upload_dir['path']))
							{
								$file  = $upload_dir['path'] . '/' . $filename;
								} else {
								$file   = $upload_dir['basedir'] . '/' . $filename;
							}

							file_put_contents($file, $image_data);

							$wp_filetype = wp_check_filetype($filename, null);

							$attachment  = array(
							'post_mime_type'             => $wp_filetype['type'],
							'post_title'             => sanitize_file_name($filename) ,
							'post_content'             => '',
							'post_status'             => 'inherit'
							);

							$attach_id   = wp_insert_attachment($attachment, $file, $post_id);

							require_once (ABSPATH . 'wp-admin/includes/image.php');

							$attach_data = wp_generate_attachment_metadata($attach_id, $file);

							wp_update_attachment_metadata($attach_id, $attach_data);

							$themedia[] = $attach_id;
						}

						add_post_meta($post_id, '_product_image_gallery', implode(',', $themedia));
						echo '<div class="notice notice-success is-dismissible">
						<p>Product created successfully. <a href="' . get_permalink($post_id) . '">View Product</a> or <a href="' . site_url() . '/wp-admin/post.php?post=' . $post_id . '&action=edit">Edit Product</a></p>
						</div>';
						} else {
						echo '<div class="notice notice-error is-dismissible">
						<p>Product Name:<span style="color: red"> ' . $dublicate_check . '</span> already created, <a href="' . site_url() . '/wp-admin/post.php?post=' . $page_id . '&action=edit">Edit Product</a></p>
						</div>';
					}

					$html_base->clear();
					unset($html_base);

				} else if ($url_without_last_part == 'https://tiki.vn')
				{
					$base = $url;

					$curl = curl_init();
					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($curl, CURLOPT_HEADER, false);
					curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt($curl, CURLOPT_URL, $base);
					curl_setopt($curl, CURLOPT_REFERER, $base);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					$str = curl_exec($curl);
					curl_close($curl);

					libxml_use_internal_errors(true);
					$saleprice = '';
					$baseprice = '';
					$saleprice = getPrice($str,'"price":"', '","priceCurrency"');


					if($saleprice == ''){
						$saleprice = getPrice($str,'","price":', ',"list_price"');
					}
					if($baseprice == ''){
						$baseprice = getPrice($str,'"list_price":', ',"price_usd"');
					}
					$html_base = new simple_html_dom();

					$html_base->load($str);

					$book_category = '';
					foreach ($html_base->find('ul[class=breadcrumb]') as $element)
					{
						$flag          = 0;
						foreach ($element->find('span') as $cat)
						{
							if ($flag == 2)
							{
								$book_category = $cat->plaintext;

								$term          = wp_insert_term($cat->plaintext, 'product_cat', ['description' => '', 'slug' => $cat->plaintext]);
								// print_r($term['term_id']) ;
								$flag++;
								} else {
								$flag++;
							}
						}
					}

					/*****tac_gia*********/
					$scrap_tac_gia        = '';
					foreach ($html_base->find('div[class=brand-block-row]') as $element)
					{
						foreach ($element->find('a[target=_blank]') as $element1)
						{
							$scrap_tac_gia = $element1->plaintext;
						}

					}

					$sku                  = '';
					foreach ($html_base->find('div[class=brand]') as $element)
					{

						foreach ($element->find('h6') as $element1)
						{
							foreach ($element1->find('span') as $element2)
							{
								$sku = $element2->plaintext;
							}
						}
					}

					$sku                  = str_replace(" ", "", $sku);
					$term_tac_gia         = wp_insert_term($scrap_tac_gia, 'pa_tac-gia', ['description'                      => '', 'slug'                      => $scrap_tac_gia]);
					$scrap_title          = '';
					foreach ($html_base->find('h1') as $element)
					{
						$scrap_title          = $element->plaintext;

					}
					// $scrap_price          = '';
					// $gia_hien_tai         = "";
					// $exchange_rate        = get_field('exchange_rate_tiki', 'options');
					// $constant             = get_field('constant_tiki', 'options');
					// $paypal_fee           = get_field('paypal_fee_tiki', 'options');
					// $klarna_constant      = get_field('klarna_constant_tiki', 'options');

					$scrap_price          = '';
					$gia_hien_tai         = ""; // current price


					//error_log($html_base->find('meta [attribute=itemprop]')); die;
					////////////////////id=span-list-price -> Gia bia ////////////////////////
					// $array1 = array();
					// foreach ($html_base->find('meta *[itemprop]') as $element)
					// {
					// 	// if($element->find('*[itemprop]')){
					// 	// 	print_r($element->find('*[itemprop]'));die;
					// 	// }
					// 	error_log($element);
					// 	$array1[] = $element->find('*[itemprop]');
					// 	die('ddd');
					// 	$gia_hien_tai         = $element->plaintext;
					// 	$gia_hien_tai         = str_replace('Giá thị trường:', '', $gia_hien_tai);
					// 	$gia_hien_tai         = str_replace('₫', '', $gia_hien_tai);
					// }
					$gia_hien_tai = $baseprice;

					$BasePrice = '';
					if($gia_hien_tai != ""){
						number_format((float)$gia_hien_tai, 2, '.', '');
						$BasePrice = (floatval($gia_hien_tai)/$exchange_rate)+$weight*10+$no_of_book_in_set*$constant;
					}
					//echo $BasePrice;exit;
					$discountPrice = '';
					$regulerPrice = '';


					$discountPrice1 = $BasePrice+$BasePrice*$paypal_fee+$klarna_constant;
					$discountPrice = number_format((float)$discountPrice1, 2, '.', '');
					$regulerPrice1 = $discountPrice+$discountPrice*(rand($MinDiscount, $MaxDiscount)/100);
					$regulerPrice = number_format((float)$regulerPrice1, 2, '.', '');
					// if ($gia_hien_tai != "")
					// {
					// 	$scrap_price1         = ((floatval($gia_hien_tai) / $exchange_rate + $constant) * $paypal_fee) + $klarna_constant;
					// 	$temp                 = number_format((float)$scrap_price1, 2, '.', '');
					// 	$scrap_price          = $temp;
					// } else {
					// 	///////// id=span-price --> Gia da giam tiki //////////
					// 	foreach ($html_base->find('div[class=product-price__list-price]') as $element)
					// 	{
					// 		$scrap_price1         = ((floatval($element->plaintext) / $exchange_rate + $constant) * $paypal_fee) + $klarna_constant;

					// 		$temp                 = number_format((float)$scrap_price1, 2, '.', '');
					// 		$scrap_price          = $temp;

					// 	}
					// }

					// $tien_giam_gia        = $scrap_price;

					$scrap_featured_image = '';
					foreach ($html_base->find('div[class=thumbnail]') as $element)
					{
						foreach ($element->find('img') as $element1)
						{
							$scrap_featured_image .= $element1->src;
						}
					}

					$product_gallery   = array();

					foreach ($html_base->find('div[class=review-images__list]') as $horizontal)
					{
						// foreach ($horizontal->find('span[class=thumb-item]') as $element) {
						foreach ($horizontal->find('a') as $img)
						{
							foreach ($img->find('img') as $src)
							{
								$product_gallery[]                   = str_replace("w64", "w444", $src->src);

							}
						}
					}

					$scrap_discription = '';
					$skuArray = array();
					foreach ($html_base->find('div[class=content has-table]') as $content)
					{
						foreach ($content->find('table') as $table)
						{
							$theData           = array();
							foreach ($table->find('tr') as $row)
							{
								$rowData           = array();
								foreach ($row->find('td') as $cell)
								{
									$rowData[]  = $cell->innertext;

								}
								$skuArray[] = $rowData;
								$theData[] = $rowData;
							}


							$scrap_discription .= "<table>";
							foreach ($theData as $row)
							{
								$scrap_discription .= "<tr>";
								foreach ($row as $column)
								{
									$scrap_discription .= "<td>" . strip_tags($column) . "</td>";
								}
								$scrap_discription .= "</tr>";
							}
							$scrap_discription .= "</table>";

						}

					}

					if(!empty($skuArray)){
						foreach ($skuArray as $value) {
							if($value[0] == 'SKU'){
								$sku = $value[1];
							}

						}
					}
					if(empty($sku)){
						//$sku = 'TI'.rand(100000, 999999);
					}

					$scrap_full = '';

					foreach ($html_base->find('div[class=content]') as $left2)
					{
						$scrap_full = $left2->plaintext;
					}

					if ($scrap_full == '')
					{
						foreach ($html_base->find('div[class=ToggleContent__View-sc-12qfla5-0]') as $discription)
						{
							foreach ($discription->find('div') as $dis)
							{
								$scrap_full .= strip_tags($dis->plaintext);
							}

						}
					}
					$author_name     = '';
					foreach ($html_base->find('span[class=brand-and-author no-after] a') as $auth)
					{

						$author_name     = $auth->plaintext;

						$author_name     = str_replace('Tác giả:', '', $author_name);
						// $author_name     = str_replace('Bìa mềm', '', $author_name);
						// $author_name     = str_replace('SKU:', '', $author_name);
						// $author_name     = str_replace($sku, '', $author_name);

					}
					//$author_name = $html_base->find("a[data-view-id='pdp_details_view_author']", 0)->content;
					//echo "dd".$author_name;exit;
					if ($scrap_full){
						$scrap_full = str_replace('Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Tuy nhiên tuỳ vào từng loại sản phẩm hoặc phương thức, địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, ...', '', $scrap_full);
					}
					$dublicate_check = trim($scrap_title);
					$page            = get_page_by_title($dublicate_check, OBJECT, 'product');
					$page_id         = $page->ID;
					global $wpdb;

					$post_if = $wpdb->get_var("SELECT count(post_title) FROM $wpdb->posts WHERE post_title like '$dublicate_check' AND post_status like 'publish' ");

					if ($post_if < 1)
					{

						$post_id = wp_insert_post(array(
						'post_title'         => $scrap_title,
						'post_content'         => $scrap_full,
						'post_status'         => 'draft',
						'post_excerpt'         => $scrap_discription,
						'post_type'         => "product",

						));
						if(!empty($cateogry)){
							wp_set_post_terms( $post_id, $cateogry, 'product_cat', true );
						}

						wp_set_object_terms( $post_id, $author_name, 'pa_tac-gia', true );

						$att_color = Array('pa_tac-gia' =>Array(
						'name'=>'pa_tac-gia',
						'value'=>$author_name,
						'is_visible' => '1',
						'is_taxonomy' => '1'
						));

						update_post_meta( $post_id, '_product_attributes', $att_color);

						$gia_km              = "";

						///////////Lay gia chua co khuyen mai /////////////////
						//$gia_km              = $scrap_price + $scrap_price * rand($MinDiscount, $MaxDiscount) * 0.01;
						//$gia_km              = number_format((float)$gia_km, 2, '.', '');

						wp_set_object_terms( $post_id, '', 'no_of_book_in_set', true );

						$att_book = Array('no_of_book_in_set' =>Array(
						'name'=>'no_of_book_in_set',
						'value'=> $no_of_book_in_set,
						'is_visible' => '1',
						'is_taxonomy' => '1'
						));

						$product          = wc_get_product( $post_id );
						$posted_vendor_id = ! empty( $_POST['dokan_product_author_override'] ) ? intval( $_POST['dokan_product_author_override'] ) : 0; // WPCS: CSRF ok.

						if(!empty($posted_vendor_id)){
							dokan_override_product_author( $product, $posted_vendor_id );
						}
						if(!empty($product_shipping_class)){
							$product = wc_get_product( $post_id );
							$product->set_shipping_class_id( $product_shipping_class );
							$product->save();
						}


						//update_post_meta($post_id, '_product_attributes', $att_author);
						//update_post_meta($post_id, '_regular_price', $regulerPrice);
						//update_post_meta($post_id, '_price', $regulerPrice);
						update_post_meta($post_id, '_sale_price', $discountPrice);
						update_post_meta($post_id, '_sale_price_dates_from', $prev_date);
						update_post_meta($post_id, 'no_of_book_in_set', $no_of_book_in_set);
						update_post_meta($post_id, '_stock', $stock);
						update_post_meta($post_id, '_manage_stock', 'yes');
						update_post_meta($post_id, '_sku', $sku);
						update_post_meta($post_id, '_weight', $weight);
						update_post_meta($post_id, '_length', $length);
						update_post_meta($post_id, '_width', $width);
						update_post_meta($post_id, '_height', $height);
						if(!empty($regulerPrice)){
							$product = wc_get_product( $post_id );
							$product->set_regular_price( $regulerPrice );
							$product->set_sale_price( $discountPrice );
							$product->save();
						}
						if(!empty($author_name)){
							//update_field('field_600b9f7e5760e',$author_name, $post_id);
						}

						$image_url        = $scrap_featured_image;
						$image_name       = 'pi.jpg';
						$upload_dir       = wp_upload_dir();
						$image_data       = file_get_contents($image_url);
						$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
						$filename         = basename($unique_file_name);

						if (wp_mkdir_p($upload_dir['path']))
						{
							$file  = $upload_dir['path'] . '/' . $filename;
							} else {
							$file    = $upload_dir['basedir'] . '/' . $filename;
						}

						file_put_contents($file, $image_data);

						$wp_filetype = wp_check_filetype($filename, null);

						$attachment  = array(
						'post_mime_type'   => $wp_filetype['type'],
						'post_title'       => sanitize_file_name($filename) ,
						'post_content'     => '',
						'post_status'      => 'inherit'
						);

						$attach_id   = wp_insert_attachment($attachment, $file, $post_id);

						require_once (ABSPATH . 'wp-admin/includes/image.php');

						$attach_data = wp_generate_attachment_metadata($attach_id, $file);

						wp_update_attachment_metadata($attach_id, $attach_data);

						set_post_thumbnail($post_id, $attach_id);
						$themedia         = array();
						foreach ($product_gallery as $src)
						{
							$image_url        = $src;

							$image_name       = 'pi.jpg';
							$upload_dir       = wp_upload_dir();

							$image_data       = @file_get_contents($image_url);

							$unique_file_name = wp_unique_filename($upload_dir['path'], $image_name);
							$filename         = basename($unique_file_name);

							if (wp_mkdir_p($upload_dir['path']))
							{
								$file = $upload_dir['path'] . '/' . $filename;
								} else {
								$file  = $upload_dir['basedir'] . '/' . $filename;
							}

							file_put_contents($file, $image_data);

							$wp_filetype = wp_check_filetype($filename, null);

							$attachment  = array(
							'post_mime_type'             => $wp_filetype['type'],
							'post_title'             => sanitize_file_name($filename) ,
							'post_content'             => '',
							'post_status'             => 'inherit'
							);

							$attach_id   = wp_insert_attachment($attachment, $file, $post_id);

							require_once (ABSPATH . 'wp-admin/includes/image.php');

							$attach_data = wp_generate_attachment_metadata($attach_id, $file);

							wp_update_attachment_metadata($attach_id, $attach_data);

							$themedia[] = $attach_id;

							//set_post_thumbnail($post_id, $attach_id);

						}

						add_post_meta($post_id, '_product_image_gallery', implode(',', $themedia));
						echo '<div class="notice notice-success is-dismissible">
						<p>Product created successfully. <a href="' . get_permalink($post_id) . '">View Product</a> or <a href="' . site_url() . '/wp-admin/post.php?post=' . $post_id . '&action=edit">Edit Product</a></p>
						</div>';
						} else {
						echo '<div class="notice notice-error is-dismissible">
						<p>Product Name:<span style="color: red"> ' . $dublicate_check . '</span> already created, <a href="' . site_url() . '/wp-admin/post.php?post=' . $page_id . '&action=edit">Edit Product</a></p>
						</div>';
					}

					$html_base->clear();
					unset($html_base);

				}
			?>

			<?php } else {
				echo '<div class="notice notice-error is-dismissible">
				<p>Something went wrong!!! </p>
				</div>';
			}
		}

	}
	function getPrice($str,$starting_word, $ending_word){
		$price = '';
		libxml_use_internal_errors(true);
		if(!empty($str)){
			$doc = new DOMDocument();
			$doc->loadHTML($str);

			$subtring_start = strpos($doc->textContent, $starting_word);

			$subtring_start += strlen($starting_word);
			//Length of our required sub string
			$size = strpos($doc->textContent, $ending_word, $subtring_start) - $subtring_start;
			// Return the substring from the index substring_start of length size
			$price = substr($doc->textContent, $subtring_start, $size);
		}
		return $price;
	}
