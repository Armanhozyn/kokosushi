<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- billing part -->
<div class="checkout">
	<div class="container mx-auto 2xl:px-9 xl:px-7 lg:px-5 sm:px-2 px-7 grid grid-cols-5">
		<div class="input-box sm:col-span-3 col-span-5">
			<?php echo form_open('', array('autocomplete' => 'off')); ?>
			<?php if (validation_errors()): ?>
				<div class="bg-[#e99b9b2e] rounded-2xl py-[5px] px-8 text-[#fc0c0d]">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php $tenPercent = $this->cart->format_number($this->cart->total()) * 0.1;
			$discountPrice = $this->cart->format_number($this->cart->total()) - $tenPercent; ?>
			<p></p>
			<h2 class="pb-6 text-xl sm:text-2xl md:text-2xl lg:text-3xl  font-semibold pt-5 font-rou">
				Checkout<br>Billing Details</h2>
			<form action="" method="post">
				<div class="form-div space-y-3 mt-2">
					<div class="pl-4 flex space-x-4">
						<select name="country_code" id=""
							class="outline-none border-gray-300 rounded-2xl text-sm w-[150px] h-10 border-[1px] ml-[-17px] mt-[-1px] pl-4">
							<!-- <option data-countryCode="BE" value="+32">Belgium (+32)</option> -->
							<optgroup label="Other countries">
								<option data-countryCode="DZ" value="+213">Algeria (+213)</option>
								<option data-countryCode="AD" value="+376">Andorra (+376)</option>
								<option data-countryCode="AO" value="+244">Angola (+244)</option>
								<option data-countryCode="AI" value="+1264">Anguilla (+1264)</option>
								<option data-countryCode="AG" value="+1268">Antigua &amp; Barbuda (+1268)</option>
								<option data-countryCode="AR" value="+54">Argentina (+54)</option>
								<option data-countryCode="AM" value="+374">Armenia (+374)</option>
								<option data-countryCode="AW" value="+297">Aruba (+297)</option>
								<option data-countryCode="AU" value="+61">Australia (+61)</option>
								<option data-countryCode="AT" value="+43">Austria (+43)</option>
								<option data-countryCode="AZ" value="+994">Azerbaijan (+994)</option>
								<option data-countryCode="BS" value="+1242">Bahamas (+1242)</option>
								<option data-countryCode="BH" value="+973">Bahrain (+973)</option>
								<option data-countryCode="BD" value="+880">Bangladesh (+880)</option>
								<option data-countryCode="BB" value="+1246">Barbados (+1246)</option>
								<option data-countryCode="BY" value="+375">Belarus (+375)</option>
								<option data-countryCode="BE" value="+32" selected>Belgium (+32)</option>
								<option data-countryCode="BZ" value="+501">Belize (+501)</option>
								<option data-countryCode="BJ" value="+229">Benin (+229)</option>
								<option data-countryCode="BM" value="+1441">Bermuda (+1441)</option>
								<option data-countryCode="BT" value="+975">Bhutan (+975)</option>
								<option data-countryCode="BO" value="+591">Bolivia (+591)</option>
								<option data-countryCode="BA" value="+387">Bosnia Herzegovina (+387)</option>
								<option data-countryCode="BW" value="+267">Botswana (+267)</option>
								<option data-countryCode="BR" value="+55">Brazil (+55)</option>
								<option data-countryCode="BN" value="+673">Brunei (+673)</option>
								<option data-countryCode="BG" value="+359">Bulgaria (+359)</option>
								<option data-countryCode="BF" value="+226">Burkina Faso (+226)</option>
								<option data-countryCode="BI" value="+257">Burundi (+257)</option>
								<option data-countryCode="KH" value="+855">Cambodia (+855)</option>
								<option data-countryCode="CM" value="+237">Cameroon (+237)</option>
								<option data-countryCode="CA" value="+1">Canada (+1)</option>
								<option data-countryCode="CV" value="+238">Cape Verde Islands (+238)</option>
								<option data-countryCode="KY" value="+1345">Cayman Islands (+1345)</option>
								<option data-countryCode="CF" value="+236">Central African Republic (+236)</option>
								<option data-countryCode="CL" value="+56">Chile (+56)</option>
								<option data-countryCode="CN" value="+86">China (+86)</option>
								<option data-countryCode="CO" value="+57">Colombia (+57)</option>
								<option data-countryCode="KM" value="+269">Comoros (+269)</option>
								<option data-countryCode="CG" value="+242">Congo (+242)</option>
								<option data-countryCode="CK" value="+682">Cook Islands (+682)</option>
								<option data-countryCode="CR" value="+506">Costa Rica (+506)</option>
								<option data-countryCode="HR" value="+385">Croatia (+385)</option>
								<option data-countryCode="CU" value="+53">Cuba (+53)</option>
								<option data-countryCode="CY" value="+90392">Cyprus North (+90392)</option>
								<option data-countryCode="CY" value="+357">Cyprus South (+357)</option>
								<option data-countryCode="CZ" value="+42">Czech Republic (+42)</option>
								<option data-countryCode="DK" value="+45">Denmark (+45)</option>
								<option data-countryCode="DJ" value="+253">Djibouti (+253)</option>
								<option data-countryCode="DM" value="+1809">Dominica (+1809)</option>
								<option data-countryCode="DO" value="+1809">Dominican Republic (+1809)</option>
								<option data-countryCode="EC" value="+593">Ecuador (+593)</option>
								<option data-countryCode="EG" value="+20">Egypt (+20)</option>
								<option data-countryCode="SV" value="+503">El Salvador (+503)</option>
								<option data-countryCode="GQ" value="+240">Equatorial Guinea (+240)</option>
								<option data-countryCode="ER" value="+291">Eritrea (+291)</option>
								<option data-countryCode="EE" value="+372">Estonia (+372)</option>
								<option data-countryCode="ET" value="+251">Ethiopia (+251)</option>
								<option data-countryCode="FK" value="+500">Falkland Islands (+500)</option>
								<option data-countryCode="FO" value="+298">Faroe Islands (+298)</option>
								<option data-countryCode="FJ" value="+679">Fiji (+679)</option>
								<option data-countryCode="FI" value="+358">Finland (+358)</option>
								<option data-countryCode="FR" value="+33">France (+33)</option>
								<option data-countryCode="GF" value="+594">French Guiana (+594)</option>
								<option data-countryCode="PF" value="+689">French Polynesia (+689)</option>
								<option data-countryCode="GA" value="+241">Gabon (+241)</option>
								<option data-countryCode="GM" value="+220">Gambia (+220)</option>
								<option data-countryCode="GE" value="+7880">Georgia (+7880)</option>
								<option data-countryCode="DE" value="+49">Germany (+49)</option>
								<option data-countryCode="GH" value="+233">Ghana (+233)</option>
								<option data-countryCode="GI" value="+350">Gibraltar (+350)</option>
								<option data-countryCode="GR" value="+30">Greece (+30)</option>
								<option data-countryCode="GL" value="+299">Greenland (+299)</option>
								<option data-countryCode="GD" value="+1473">Grenada (+1473)</option>
								<option data-countryCode="GP" value="+590">Guadeloupe (+590)</option>
								<option data-countryCode="GU" value="+671">Guam (+671)</option>
								<option data-countryCode="GT" value="+502">Guatemala (+502)</option>
								<option data-countryCode="GN" value="+224">Guinea (+224)</option>
								<option data-countryCode="GW" value="+245">Guinea - Bissau (+245)</option>
								<option data-countryCode="GY" value="+592">Guyana (+592)</option>
								<option data-countryCode="HT" value="+509">Haiti (+509)</option>
								<option data-countryCode="HN" value="+504">Honduras (+504)</option>
								<option data-countryCode="HK" value="+852">Hong Kong (+852)</option>
								<option data-countryCode="HU" value="+36">Hungary (+36)</option>
								<option data-countryCode="IS" value="+354">Iceland (+354)</option>
								<option data-countryCode="IN" value="+91">India (+91)</option>
								<option data-countryCode="ID" value="+62">Indonesia (+62)</option>
								<option data-countryCode="IR" value="+98">Iran (+98)</option>
								<option data-countryCode="IQ" value="+964">Iraq (+964)</option>
								<option data-countryCode="IE" value="+353">Ireland (+353)</option>
								<option data-countryCode="IL" value="+972">Israel (+972)</option>
								<option data-countryCode="IT" value="+39">Italy (+39)</option>
								<option data-countryCode="JM" value="+1876">Jamaica (+1876)</option>
								<option data-countryCode="JP" value="+81">Japan (+81)</option>
								<option data-countryCode="JO" value="+962">Jordan (+962)</option>
								<option data-countryCode="KZ" value="+7">Kazakhstan (+7)</option>
								<option data-countryCode="KE" value="+254">Kenya (+254)</option>
								<option data-countryCode="KI" value="+686">Kiribati (+686)</option>
								<option data-countryCode="KP" value="+850">Korea North (+850)</option>
								<option data-countryCode="KR" value="+82">Korea South (+82)</option>
								<option data-countryCode="KW" value="+965">Kuwait (+965)</option>
								<option data-countryCode="KG" value="+996">Kyrgyzstan (+996)</option>
								<option data-countryCode="LA" value="+856">Laos (+856)</option>
								<option data-countryCode="LV" value="+371">Latvia (+371)</option>
								<option data-countryCode="LB" value="+961">Lebanon (+961)</option>
								<option data-countryCode="LS" value="+266">Lesotho (+266)</option>
								<option data-countryCode="LR" value="+231">Liberia (+231)</option>
								<option data-countryCode="LY" value="+218">Libya (+218)</option>
								<option data-countryCode="LI" value="+417">Liechtenstein (+417)</option>
								<option data-countryCode="LT" value="+370">Lithuania (+370)</option>
								<option data-countryCode="LU" value="+352">Luxembourg (+352)</option>
								<option data-countryCode="MO" value="+853">Macao (+853)</option>
								<option data-countryCode="MK" value="+389">Macedonia (+389)</option>
								<option data-countryCode="MG" value="+261">Madagascar (+261)</option>
								<option data-countryCode="MW" value="+265">Malawi (+265)</option>
								<option data-countryCode="MY" value="+60">Malaysia (+60)</option>
								<option data-countryCode="MV" value="+960">Maldives (+960)</option>
								<option data-countryCode="ML" value="+223">Mali (+223)</option>
								<option data-countryCode="MT" value="+356">Malta (+356)</option>
								<option data-countryCode="MH" value="+692">Marshall Islands (+692)</option>
								<option data-countryCode="MQ" value="+596">Martinique (+596)</option>
								<option data-countryCode="MR" value="+222">Mauritania (+222)</option>
								<option data-countryCode="YT" value="+269">Mayotte (+269)</option>
								<option data-countryCode="MX" value="+52">Mexico (+52)</option>
								<option data-countryCode="FM" value="+691">Micronesia (+691)</option>
								<option data-countryCode="MD" value="+373">Moldova (+373)</option>
								<option data-countryCode="MC" value="+377">Monaco (+377)</option>
								<option data-countryCode="MN" value="+976">Mongolia (+976)</option>
								<option data-countryCode="MS" value="+1664">Montserrat (+1664)</option>
								<option data-countryCode="MA" value="+212">Morocco (+212)</option>
								<option data-countryCode="MZ" value="+258">Mozambique (+258)</option>
								<option data-countryCode="MN" value="+95">Myanmar (+95)</option>
								<option data-countryCode="NA" value="+264">Namibia (+264)</option>
								<option data-countryCode="NR" value="+674">Nauru (+674)</option>
								<option data-countryCode="NP" value="+977">Nepal (+977)</option>
								<option data-countryCode="NL" value="+31">Netherlands (+31)</option>
								<option data-countryCode="NC" value="+687">New Caledonia (+687)</option>
								<option data-countryCode="NZ" value="+64">New Zealand (+64)</option>
								<option data-countryCode="NI" value="+505">Nicaragua (+505)</option>
								<option data-countryCode="NE" value="+227">Niger (+227)</option>
								<option data-countryCode="NG" value="+234">Nigeria (+234)</option>
								<option data-countryCode="NU" value="+683">Niue (+683)</option>
								<option data-countryCode="NF" value="+672">Norfolk Islands (+672)</option>
								<option data-countryCode="NP" value="+670">Northern Marianas (+670)</option>
								<option data-countryCode="NO" value="+47">Norway (+47)</option>
								<option data-countryCode="OM" value="+968">Oman (+968)</option>
								<option data-countryCode="PW" value="+680">Palau (+680)</option>
								<option data-countryCode="PA" value="+507">Panama (+507)</option>
								<option data-countryCode="PG" value="+675">Papua New Guinea (+675)</option>
								<option data-countryCode="PY" value="+595">Paraguay (+595)</option>
								<option data-countryCode="PE" value="+51">Peru (+51)</option>
								<option data-countryCode="PH" value="+63">Philippines (+63)</option>
								<option data-countryCode="PL" value="+48">Poland (+48)</option>
								<option data-countryCode="PT" value="+351">Portugal (+351)</option>
								<option data-countryCode="PR" value="+1787">Puerto Rico (+1787)</option>
								<option data-countryCode="QA" value="+974">Qatar (+974)</option>
								<option data-countryCode="RE" value="+262">Reunion (+262)</option>
								<option data-countryCode="RO" value="+40">Romania (+40)</option>
								<option data-countryCode="RU" value="+7">Russia (+7)</option>
								<option data-countryCode="RW" value="+250">Rwanda (+250)</option>
								<option data-countryCode="SM" value="+378">San Marino (+378)</option>
								<option data-countryCode="ST" value="+239">Sao Tome &amp; Principe (+239)</option>
								<option data-countryCode="SA" value="+966">Saudi Arabia (+966)</option>
								<option data-countryCode="SN" value="+221">Senegal (+221)</option>
								<option data-countryCode="CS" value="+381">Serbia (+381)</option>
								<option data-countryCode="SC" value="+248">Seychelles (+248)</option>
								<option data-countryCode="SL" value="+232">Sierra Leone (+232)</option>
								<option data-countryCode="SG" value="+65">Singapore (+65)</option>
								<option data-countryCode="SK" value="+421">Slovak Republic (+421)</option>
								<option data-countryCode="SI" value="+386">Slovenia (+386)</option>
								<option data-countryCode="SB" value="+677">Solomon Islands (+677)</option>
								<option data-countryCode="SO" value="+252">Somalia (+252)</option>
								<option data-countryCode="ZA" value="+27">South Africa (+27)</option>
								<option data-countryCode="ES" value="+34">Spain (+34)</option>
								<option data-countryCode="LK" value="+94">Sri Lanka (+94)</option>
								<option data-countryCode="SH" value="+290">St. Helena (+290)</option>
								<option data-countryCode="KN" value="+1869">St. Kitts (+1869)</option>
								<option data-countryCode="SC" value="+1758">St. Lucia (+1758)</option>
								<option data-countryCode="SD" value="+249">Sudan (+249)</option>
								<option data-countryCode="SR" value="+597">Suriname (+597)</option>
								<option data-countryCode="SZ" value="+268">Swaziland (+268)</option>
								<option data-countryCode="SE" value="+46">Sweden (+46)</option>
								<option data-countryCode="CH" value="+41">Switzerland (+41)</option>
								<option data-countryCode="SI" value="+963">Syria (+963)</option>
								<option data-countryCode="TW" value="+886">Taiwan (+886)</option>
								<option data-countryCode="TJ" value="+7">Tajikstan (+7)</option>
								<option data-countryCode="TH" value="+66">Thailand (+66)</option>
								<option data-countryCode="TG" value="+228">Togo (+228)</option>
								<option data-countryCode="TO" value="+676">Tonga (+676)</option>
								<option data-countryCode="TT" value="+1868">Trinidad &amp; Tobago (+1868)</option>
								<option data-countryCode="TN" value="+216">Tunisia (+216)</option>
								<option data-countryCode="TR" value="+90">Turkey (+90)</option>
								<option data-countryCode="TM" value="+7">Turkmenistan (+7)</option>
								<option data-countryCode="TM" value="+993">Turkmenistan (+993)</option>
								<option data-countryCode="TC" value="+1649">Turks &amp; Caicos Islands (+1649)</option>
								<option data-countryCode="TV" value="+688">Tuvalu (+688)</option>
								<option data-countryCode="UG" value="+256">Uganda (+256)</option>
								<option data-countryCode="GB" value="+44">UK (+44)</option>
								<option data-countryCode="UA" value="+380">Ukraine (+380)</option>
								<option data-countryCode="AE" value="+971">United Arab Emirates (+971)</option>
								<option data-countryCode="UY" value="+598">Uruguay (+598)</option>
								<option data-countryCode="US" value="+1">USA (+1)</option>
								<option data-countryCode="UZ" value="+7">Uzbekistan (+7)</option>
								<option data-countryCode="VU" value="+678">Vanuatu (+678)</option>
								<option data-countryCode="VA" value="+379">Vatican City (+379)</option>
								<option data-countryCode="VE" value="+58">Venezuela (+58)</option>
								<option data-countryCode="VN" value="+84">Vietnam (+84)</option>
								<option data-countryCode="VG" value="+84">Virgin Islands - British (+1284)</option>
								<option data-countryCode="VI" value="+84">Virgin Islands - US (+1340)</option>
								<option data-countryCode="WF" value="+681">Wallis &amp; Futuna (+681)</option>
								<option data-countryCode="YE" value="+969">Yemen (North)(+969)</option>
								<option data-countryCode="YE" value="+967">Yemen (South)(+967)</option>
								<option data-countryCode="ZM" value="+260">Zambia (+260)</option>
								<option data-countryCode="ZW" value="+263">Zimbabwe (+263)</option>
							</optgroup>
						</select>

						<input type="number" name="telephone" id="telePhone" autocomplete="NoAutocomplete"
							placeholder="Phone Number"
							class="outline-none border-gray-300 rounded-2xl text-sm  w-full h-10 pl-4 shadow-lg border-[1px] focus:shadow-none">
					</div>
					<!-- <input type="number" name="telephone" id="telePhone" autocomplete="NoAutocomplete" placeholder="Phone Number" class="outline-none border-gray-300 rounded-2xl text-sm  w-full h-10 pl-4 shadow-lg border-[1px] focus:shadow-none"> -->
					<input type="text" name="full_name" id="fullName" placeholder="Full Name"
						class="outline-none border-gray-300 rounded-2xl text-sm  w-full h-10 pl-4 shadow-lg focus:shadow-none border-[1px]">
					<input type="text" name="address" id="address1" placeholder="Address"
						class="outline-none border-gray-300 rounded-2xl text-sm w-full h-10 pl-4 shadow-lg focus:shadow-none border-[1px]">
					<input type="email" name="email" id="email" placeholder="Enter email for update (Optional)"
						class="outline-none border-gray-300 rounded-2xl text-sm w-full h-10 pl-4 shadow-lg focus:shadow-none border-[1px]">
					<input type="hidden" name="city" id="city" placeholder="City"
						class="outline-none border-gray-300 rounded-2xl text-sm w-full h-10 pl-4 shadow-lg focus:shadow-none border-[1px]">
					<div>

						<select name="xzip" id="zip" onchange="printToZip()" placeholder="Postal Code"
							class="outline-none border-gray-300 rounded-2xl text-sm w-full h-10 pl-4 shadow-lg focus:shadow-none border-[1px] mb-[14px]">
							<option value="">Select City</option>
							<?php
							foreach ($delivery_area as $da):
								?>
								<option id="zip_city_<?php echo $da['zip_code']; ?>" value="<?php echo $da['zip_code']; ?>"
									data-city="<?php echo $da['name']; ?>" <?php echo $da['zip_code'] == $this->session->userdata('zip_code') ? ' selected="selected"' : null ?>>
									<?php echo $da['name']; ?>
								</option>
							<?php endforeach; ?>
						</select>
						<input type="text" name="zip" placeholder="Postal Code"
							class="outline-none border-gray-300 rounded-2xl text-sm w-full h-10 pl-4 shadow-lg focus:shadow-none border-[1px]"
							id="readzip" value="<?php echo $this->session->userdata('zip_code'); ?>">
						<!-- <div><a onclick="changeZip(this)" href="javascript: void(0);">Change</a></div></div> -->
						<select name="country" onchange="preventChange()" id="country" placeholder="Country"
							class="outline-none border-gray-300 rounded-2xl text-sm w-full h-10 pl-4 shadow-lg focus:shadow-none border-[1px] my-[14px]">
							<option value="">Select</option>
							<?php
							$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"); foreach ($countries as $country):
								?>
								<option value="<?php echo $country; ?>" <?php echo $country == 'Belgium' ? ' selected="selected"' : null ?>>
									<?php echo $country; ?>
								</option>
							<?php endforeach; ?>

						</select>
						<textarea id="comment" name="note" rows="5" placeholder="Comment/Note(Optional)"
							class="outline-none border-gray-300 rounded-2xl shadow-lg focus:shadow-none pl-4 pt-3 w-full border-[1px]"></textarea>
					</div>
					<div class="checkout-text">
						<div class="checkout-radio">
							<h2 class="text-lg font-semibold pt-3 pb-2 sm:text-xl md:text-2xl font-rou">Payment Method
							</h2>
							<div class="panel-body">
								<?php if ($this->session->has_userdata('zip_code') && $this->session->userdata('zip_code') != 0 && $this->session->has_userdata('zip_code') && $this->session->userdata('zip_code') != 0 || $this->cart->total() > 24): ?>
									<div class="radio">
										<label>
											<input type="radio" name="payment_method" id="optionsRadios1"
												value="Cash on Delivery" checked="checked" onchange="changeAmount(this)">
											Cash on delivery <b class="text-lg font-rou">(&#x20AC; <?php echo $this->cart->format_number($this->cart->total()) ?>)</b>
										</label>

									</div>
								<?php endif; ?>
								<div class="radio">
									<label>
										<input type="radio" name="payment_method" id="optionsRadios1" value="Take Away"
											checked onchange="changeAmount(this)">
										Take Away <b class="text-lg font-rou">(&#x20AC; <?php echo $discountPrice ?>
											-10% Off)</b>
									</label>
									<!-- <br><b class="text-[#fc0c0d] text-xl font-rou">Total Amount : &#x20AC; <span class="amount_select"><?php echo $discountPrice ?> (10% Off)</span></b><br> -->
									<?php if ($this->session->userdata('zip_code') && $this->session->userdata('zip_code') == 2400): ?>
										<?php if ($this->cart->total() < 20): ?>
											<p class="text-lg pt-2 font-semibold text-[#fc0c0d] sm:text-xl"><strong>Special
													Note: </strong> We do not deliver food to home for below €20 Euro in 2400
												Mol, Belgium. </p>
										<?php endif; ?>
									<?php else: ?>
										<!--<h3 class="text-lg pt-2 font-semibold text-[#fc0c0d] sm:text-xl">
													Please call us to know the minimum order amount to get delivery at your home outside of Mol, Belgium. Phone: <a href="callto:+3214872578" class="text-lg pb-3 font-semibold text-[#fc0c0d] sm:text-xl">+ 32 14 872 578</a></h3> -->
									<?php endif; ?>
								</div>
							</div>
						</div>
						<div class="checkout-pra">
							<p class="text-lg pt-2 font-semibold text-[#fc0c0d] sm:text-xl">Please call us to know the
								minimum order amount to get delivery at your home outside of Mol,Belgium</p>
							<p class="text-lg pb-3 font-semibold text-[#fc0c0d] sm:text-xl">Phone: +32 14 87 25 789</p>
						</div>
					</div>
					<div class="checkout-button pb-10">
						<button type="submit"
							class="outline-none bg-[#2fa84b] text-white text-md px-2 py-1 rounded-md md:text-lg font-rou">Confirm
							Order</button>
					</div>
					<?php echo form_close(); ?>

			</form>

		</div>
	</div>
	<div class="hidden sm:inline-block col-span-2 relative">
		<img src="<?php echo base_url(); ?>assets/imagess/sushi-final.png" class="absolute top-32" alt="">
	</div>

</div>
<!-- billing part -->

<!-- Change Zip Modal -->
<!-- <div class="modal fade" id="changeZipModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Change Postal Code</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="postal-code">Postal Code</label>
					<input type="number" class="form-control" id="postal-code" placeholder="Enter Postal Code">

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button id="zip-save-btn" type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>  -->
<!-- Change Zip Modal ends -->

<script>
	const not_verify_cart = true;


	$(function () {
		//telePhone
		// Single Select
		$("#telePhone").autocomplete({
			source: function (request, response) {
				// Fetch data
				$.ajax({
					url: "<?php echo site_url("order_manager/get_order_contacts_ajax"); ?>",
					type: 'post',
					dataType: "json",
					data: {
						search: request.term
					},
					success: function (data) {
						response(data);
					}
				});
			},
			select: function (event, ui) {
				// Set selection
				$('#telePhone').val(ui.item.label); // display the selected text
				// $('#selectuser_id').val(ui.item.value); // save selected id to input
				getOrderInfo(ui.item.value);
				return false;
			},
			minLength: 4
		});
	});


	function changeZip(el) {
		$("#postal-code").val($("#zip").val());
		$("#changeZipModal").modal('show');
	}

	$("#zip-save-btn").click(function () {
		$.ajax({
			url: "<?php echo base_url(); ?>shopping_cart/change_zip",
			method: "POST",
			data: {

				zip: $("#postal-code").val(),

			},
			success: function (data) {
				//$("#zip").val($("#postal-code").val());
				if (data.status == 1) {
					$("#changeZipModal").modal('hide');
					$("#zip").val($("#postal-code").val());
					$.notify("<strong>Success!</strong><br />Postal Changed Successfully", {
						animate: {
							enter: 'animated rollIn',
							exit: 'animated rollOut'
						},
						type: 'success'
					});

				} else if (data.status == -1) {


					$.notify("<strong>Error!</strong><br />" + data.error, {
						animate: {
							enter: 'animated rollIn',
							exit: 'animated rollOut'
						},
						type: 'danger'
					});
				}


			}
		});
	});


	function getOrderInfo(orderId) {
		var firstName = $("#firstName");
		var fullName = $("#fullName");
		var lastName = $("#lastName");
		var phoneNumber = $("#telePhone");
		var email = $("#email");
		var address1 = $("#address1");
		var address2 = $("#address2");
		var city = $("#zip");
		var city_2 = $("#city");
		var postal = $("#readzip");

		$.ajax({
			url: "<?php echo base_url(); ?>order_manager/orderinfo_ajax",
			method: "POST",
			data: {

				order_id: orderId,

			},
			success: function (data) {
				if (data.status == 1) {
					// debugger;
					firstName.val(data.data.first_name);
					lastName.val(data.data.last_name);
					fullName.val(data.data.full_name);
					phoneNumber.val(data.data.telephone);
					email.val(data.data.email);
					address1.val(data.data.address);
					address2.val(data.data.address2);
					city.val(data.data.city);
					city_2.val(data.data.city);
					postal.val(data.data.zip);
					document.getElementById('zip_city_' + data.data.zip).setAttribute('selected', 'selected');
				}
			}
		});
	}


	// let amount_select = document.getElementsByClassName('amount_select');

	// const method = document.querySelectorAll('input[name="payment_method"]');
	// console.log(method);
	// method.addEventListener('change',function(){
	// 	console.log('change');
	// });
	// method.addEventListener("click", runDiscount());
	// function runDiscount(){
	// 	if (method.values("Cash on Delivery")){
	// 		console.log("Cash on Delivery");
	// 	}
	// 	else{
	// 		console.log("new")
	// 	}
	// }
	function changeAmount(el) {
		if (el.value == 'Cash on Delivery') {
			let amount_select = document.getElementsByClassName('amount_select');
			amount_select[0].innerText = '<?php echo $this->cart->format_number($this->cart->total()) ?>';
		}
		else {
			let amount_select = document.getElementsByClassName('amount_select');
			amount_select[0].innerText = '<?php echo $discountPrice ?> (10% Off)';
		}
	}
</script>