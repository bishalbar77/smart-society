{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						
											<!--end::Wizard Nav-->
											<!--begin::Card-->
											<div class="card card-custom card-shadowless rounded-top-0">
												<!--begin::Body-->
												<div class="card-body p-0">
													<div class="row justify-content-center py-8 px-8 py-lg-15 px-lg-10">
														<div class="col-xl-12 col-xxl-10">
															<!--begin::Wizard Form-->
															<form class="form" id="kt_form">
																<div class="row justify-content-center">
																	<div class="col-xl-9">
																		<!--begin::Wizard Step 1-->
																		<div class="my-5 step" data-wizard-type="step-content" data-wizard-state="current">
																			<h5 class="text-dark font-weight-bold mb-10">User's Profile Details:</h5>
																			
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Name</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="name" type="text" value="" />
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Company Name</label>
																				<div class="col-lg-9 col-xl-9">
																					<input class="form-control form-control-solid form-control-lg" name="companyname" type="text" value="Loop Inc." />
																					<span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
																				<div class="col-lg-9 col-xl-9">
																					<div class="input-group input-group-solid input-group-lg">
																						<div class="input-group-prepend">
																							<span class="input-group-text">
																								<i class="la la-phone"></i>
																							</span>
																						</div>
																						<input type="text" class="form-control form-control-solid form-control-lg" name="phone" value="5678967456" placeholder="Phone" />
																					</div>
																					<span class="form-text text-muted">Enter valid US phone number(e.g: 5678967456).</span>
																				</div>
																			</div>
																			<!--end::Group-->
																			<!--begin::Group-->
																			<div class="form-group row">
																				<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
																				<div class="col-lg-9 col-xl-9">
																					<div class="input-group input-group-solid input-group-lg">
																						<div class="input-group-prepend">
																							<span class="input-group-text">
																								<i class="la la-at"></i>
																							</span>
																						</div>
																						<input type="text" class="form-control form-control-solid form-control-lg" name="email" value="" />
																					</div>
																				</div>
																			</div>
																			<!--end::Group-->
																			
																		
																		<!--end::Wizard Step 1-->
																		
																		<!--begin::Wizard Step 3-->
																		<br>
																			
																			<!--begin::Group-->
																			<div class="form-group">
																				<label>Address Line 1</label>
																				<input type="text" class="form-control form-control-solid form-control-lg" name="address1" placeholder="Address Line 1" value="Address Line 1" />
																				<span class="form-text text-muted">Please enter your Address.</span>
																			</div>
																			<!--end::Group-->
																			
																			<!--begin::Row-->
																			<div class="row">
																				<div class="col-xl-6">
																					<!--begin::Group-->
																					<div class="form-group">
																						<label>Postcode</label>
																						<input type="text" class="form-control form-control-solid form-control-lg" name="postcode" placeholder="Postcode" value="3000" />
																						<span class="form-text text-muted">Please enter your Postcode.</span>
																					</div>
																				</div>
																				<!--end::Group-->
																				<!--begin::Group-->
																				<div class="col-xl-6">
																					<div class="form-group">
																						<label>City</label>
																						<input type="text" class="form-control form-control-solid form-control-lg" name="city" placeholder="City" value="Melbourne" />
																						<span class="form-text text-muted">Please enter your City.</span>
																					</div>
																				</div>
																				<!--end::Group-->
																			</div>
																			<!--end::Row-->
																			<!--begin::Row-->
																			<div class="row">
																				<div class="col-xl-6">
																					<!--begin::Group-->
																					<div class="form-group">
																						<label>State</label>
																						<input type="text" class="form-control form-control-solid form-control-lg" name="state" placeholder="State" value="VIC" />
																						<span class="form-text text-muted">Please enter your State.</span>
																					</div>
																					<!--end::Group-->
																				</div>
																				<div class="col-xl-6">
																					<!--begin::Group-->
																					<div class="form-group">
																						<label>Country</label>
																						<select name="country" class="form-control form-control-solid form-control-lg">
																							<option value="">Select</option>
																							<option value="AF">Afghanistan</option>
																							<option value="AX">Åland Islands</option>
																							<option value="AL">Albania</option>
																							<option value="DZ">Algeria</option>
																							<option value="AS">American Samoa</option>
																							<option value="AD">Andorra</option>
																							<option value="AO">Angola</option>
																							<option value="AI">Anguilla</option>
																							<option value="AQ">Antarctica</option>
																							<option value="AG">Antigua and Barbuda</option>
																							<option value="AR">Argentina</option>
																							<option value="AM">Armenia</option>
																							<option value="AW">Aruba</option>
																							<option value="AU" selected="selected">Australia</option>
																							<option value="AT">Austria</option>
																							<option value="AZ">Azerbaijan</option>
																							<option value="BS">Bahamas</option>
																							<option value="BH">Bahrain</option>
																							<option value="BD">Bangladesh</option>
																							<option value="BB">Barbados</option>
																							<option value="BY">Belarus</option>
																							<option value="BE">Belgium</option>
																							<option value="BZ">Belize</option>
																							<option value="BJ">Benin</option>
																							<option value="BM">Bermuda</option>
																							<option value="BT">Bhutan</option>
																							<option value="BO">Bolivia, Plurinational State of</option>
																							<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
																							<option value="BA">Bosnia and Herzegovina</option>
																							<option value="BW">Botswana</option>
																							<option value="BV">Bouvet Island</option>
																							<option value="BR">Brazil</option>
																							<option value="IO">British Indian Ocean Territory</option>
																							<option value="BN">Brunei Darussalam</option>
																							<option value="BG">Bulgaria</option>
																							<option value="BF">Burkina Faso</option>
																							<option value="BI">Burundi</option>
																							<option value="KH">Cambodia</option>
																							<option value="CM">Cameroon</option>
																							<option value="CA">Canada</option>
																							<option value="CV">Cape Verde</option>
																							<option value="KY">Cayman Islands</option>
																							<option value="CF">Central African Republic</option>
																							<option value="TD">Chad</option>
																							<option value="CL">Chile</option>
																							<option value="CN">China</option>
																							<option value="CX">Christmas Island</option>
																							<option value="CC">Cocos (Keeling) Islands</option>
																							<option value="CO">Colombia</option>
																							<option value="KM">Comoros</option>
																							<option value="CG">Congo</option>
																							<option value="CD">Congo, the Democratic Republic of the</option>
																							<option value="CK">Cook Islands</option>
																							<option value="CR">Costa Rica</option>
																							<option value="CI">Côte d'Ivoire</option>
																							<option value="HR">Croatia</option>
																							<option value="CU">Cuba</option>
																							<option value="CW">Curaçao</option>
																							<option value="CY">Cyprus</option>
																							<option value="CZ">Czech Republic</option>
																							<option value="DK">Denmark</option>
																							<option value="DJ">Djibouti</option>
																							<option value="DM">Dominica</option>
																							<option value="DO">Dominican Republic</option>
																							<option value="EC">Ecuador</option>
																							<option value="EG">Egypt</option>
																							<option value="SV">El Salvador</option>
																							<option value="GQ">Equatorial Guinea</option>
																							<option value="ER">Eritrea</option>
																							<option value="EE">Estonia</option>
																							<option value="ET">Ethiopia</option>
																							<option value="FK">Falkland Islands (Malvinas)</option>
																							<option value="FO">Faroe Islands</option>
																							<option value="FJ">Fiji</option>
																							<option value="FI">Finland</option>
																							<option value="FR">France</option>
																							<option value="GF">French Guiana</option>
																							<option value="PF">French Polynesia</option>
																							<option value="TF">French Southern Territories</option>
																							<option value="GA">Gabon</option>
																							<option value="GM">Gambia</option>
																							<option value="GE">Georgia</option>
																							<option value="DE">Germany</option>
																							<option value="GH">Ghana</option>
																							<option value="GI">Gibraltar</option>
																							<option value="GR">Greece</option>
																							<option value="GL">Greenland</option>
																							<option value="GD">Grenada</option>
																							<option value="GP">Guadeloupe</option>
																							<option value="GU">Guam</option>
																							<option value="GT">Guatemala</option>
																							<option value="GG">Guernsey</option>
																							<option value="GN">Guinea</option>
																							<option value="GW">Guinea-Bissau</option>
																							<option value="GY">Guyana</option>
																							<option value="HT">Haiti</option>
																							<option value="HM">Heard Island and McDonald Islands</option>
																							<option value="VA">Holy See (Vatican City State)</option>
																							<option value="HN">Honduras</option>
																							<option value="HK">Hong Kong</option>
																							<option value="HU">Hungary</option>
																							<option value="IS">Iceland</option>
																							<option value="IN">India</option>
																							<option value="ID">Indonesia</option>
																							<option value="IR">Iran, Islamic Republic of</option>
																							<option value="IQ">Iraq</option>
																							<option value="IE">Ireland</option>
																							<option value="IM">Isle of Man</option>
																							<option value="IL">Israel</option>
																							<option value="IT">Italy</option>
																							<option value="JM">Jamaica</option>
																							<option value="JP">Japan</option>
																							<option value="JE">Jersey</option>
																							<option value="JO">Jordan</option>
																							<option value="KZ">Kazakhstan</option>
																							<option value="KE">Kenya</option>
																							<option value="KI">Kiribati</option>
																							<option value="KP">Korea, Democratic People's Republic of</option>
																							<option value="KR">Korea, Republic of</option>
																							<option value="KW">Kuwait</option>
																							<option value="KG">Kyrgyzstan</option>
																							<option value="LA">Lao People's Democratic Republic</option>
																							<option value="LV">Latvia</option>
																							<option value="LB">Lebanon</option>
																							<option value="LS">Lesotho</option>
																							<option value="LR">Liberia</option>
																							<option value="LY">Libya</option>
																							<option value="LI">Liechtenstein</option>
																							<option value="LT">Lithuania</option>
																							<option value="LU">Luxembourg</option>
																							<option value="MO">Macao</option>
																							<option value="MK">Macedonia, the former Yugoslav Republic of</option>
																							<option value="MG">Madagascar</option>
																							<option value="MW">Malawi</option>
																							<option value="MY">Malaysia</option>
																							<option value="MV">Maldives</option>
																							<option value="ML">Mali</option>
																							<option value="MT">Malta</option>
																							<option value="MH">Marshall Islands</option>
																							<option value="MQ">Martinique</option>
																							<option value="MR">Mauritania</option>
																							<option value="MU">Mauritius</option>
																							<option value="YT">Mayotte</option>
																							<option value="MX">Mexico</option>
																							<option value="FM">Micronesia, Federated States of</option>
																							<option value="MD">Moldova, Republic of</option>
																							<option value="MC">Monaco</option>
																							<option value="MN">Mongolia</option>
																							<option value="ME">Montenegro</option>
																							<option value="MS">Montserrat</option>
																							<option value="MA">Morocco</option>
																							<option value="MZ">Mozambique</option>
																							<option value="MM">Myanmar</option>
																							<option value="NA">Namibia</option>
																							<option value="NR">Nauru</option>
																							<option value="NP">Nepal</option>
																							<option value="NL">Netherlands</option>
																							<option value="NC">New Caledonia</option>
																							<option value="NZ">New Zealand</option>
																							<option value="NI">Nicaragua</option>
																							<option value="NE">Niger</option>
																							<option value="NG">Nigeria</option>
																							<option value="NU">Niue</option>
																							<option value="NF">Norfolk Island</option>
																							<option value="MP">Northern Mariana Islands</option>
																							<option value="NO">Norway</option>
																							<option value="OM">Oman</option>
																							<option value="PK">Pakistan</option>
																							<option value="PW">Palau</option>
																							<option value="PS">Palestinian Territory, Occupied</option>
																							<option value="PA">Panama</option>
																							<option value="PG">Papua New Guinea</option>
																							<option value="PY">Paraguay</option>
																							<option value="PE">Peru</option>
																							<option value="PH">Philippines</option>
																							<option value="PN">Pitcairn</option>
																							<option value="PL">Poland</option>
																							<option value="PT">Portugal</option>
																							<option value="PR">Puerto Rico</option>
																							<option value="QA">Qatar</option>
																							<option value="RE">Réunion</option>
																							<option value="RO">Romania</option>
																							<option value="RU">Russian Federation</option>
																							<option value="RW">Rwanda</option>
																							<option value="BL">Saint Barthélemy</option>
																							<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
																							<option value="KN">Saint Kitts and Nevis</option>
																							<option value="LC">Saint Lucia</option>
																							<option value="MF">Saint Martin (French part)</option>
																							<option value="PM">Saint Pierre and Miquelon</option>
																							<option value="VC">Saint Vincent and the Grenadines</option>
																							<option value="WS">Samoa</option>
																							<option value="SM">San Marino</option>
																							<option value="ST">Sao Tome and Principe</option>
																							<option value="SA">Saudi Arabia</option>
																							<option value="SN">Senegal</option>
																							<option value="RS">Serbia</option>
																							<option value="SC">Seychelles</option>
																							<option value="SL">Sierra Leone</option>
																							<option value="SG">Singapore</option>
																							<option value="SX">Sint Maarten (Dutch part)</option>
																							<option value="SK">Slovakia</option>
																							<option value="SI">Slovenia</option>
																							<option value="SB">Solomon Islands</option>
																							<option value="SO">Somalia</option>
																							<option value="ZA">South Africa</option>
																							<option value="GS">South Georgia and the South Sandwich Islands</option>
																							<option value="SS">South Sudan</option>
																							<option value="ES">Spain</option>
																							<option value="LK">Sri Lanka</option>
																							<option value="SD">Sudan</option>
																							<option value="SR">Suriname</option>
																							<option value="SJ">Svalbard and Jan Mayen</option>
																							<option value="SZ">Swaziland</option>
																							<option value="SE">Sweden</option>
																							<option value="CH">Switzerland</option>
																							<option value="SY">Syrian Arab Republic</option>
																							<option value="TW">Taiwan, Province of China</option>
																							<option value="TJ">Tajikistan</option>
																							<option value="TZ">Tanzania, United Republic of</option>
																							<option value="TH">Thailand</option>
																							<option value="TL">Timor-Leste</option>
																							<option value="TG">Togo</option>
																							<option value="TK">Tokelau</option>
																							<option value="TO">Tonga</option>
																							<option value="TT">Trinidad and Tobago</option>
																							<option value="TN">Tunisia</option>
																							<option value="TR">Turkey</option>
																							<option value="TM">Turkmenistan</option>
																							<option value="TC">Turks and Caicos Islands</option>
																							<option value="TV">Tuvalu</option>
																							<option value="UG">Uganda</option>
																							<option value="UA">Ukraine</option>
																							<option value="AE">United Arab Emirates</option>
																							<option value="GB">United Kingdom</option>
																							<option value="US">United States</option>
																							<option value="UM">United States Minor Outlying Islands</option>
																							<option value="UY">Uruguay</option>
																							<option value="UZ">Uzbekistan</option>
																							<option value="VU">Vanuatu</option>
																							<option value="VE">Venezuela, Bolivarian Republic of</option>
																							<option value="VN">Viet Nam</option>
																							<option value="VG">Virgin Islands, British</option>
																							<option value="VI">Virgin Islands, U.S.</option>
																							<option value="WF">Wallis and Futuna</option>
																							<option value="EH">Western Sahara</option>
																							<option value="YE">Yemen</option>
																							<option value="ZM">Zambia</option>
																							<option value="ZW">Zimbabwe</option>
																						</select>
																					</div>
																					<!--end::Group-->
																				</div>
																			</div>
																		</div>
																		<!--end::Wizard Step 3-->
																		<!--begin::Wizard Actions-->
																		<div class="d-flex justify-content-between border-top pt-10 mt-15">
																			<div class="mr-2">
																				
																			</div>
																			<div>
																				<button type="button" class="btn btn-success font-weight-bolder px-9 py-4" data-wizard-type="action-submit">Submit</button>
																				
																			</div>
																		</div>
																		<!--end::Wizard Actions-->
																	</div>
																</div>
															</form>
															<!--end::Wizard Form-->
														</div>
													</div>
												</div>
												<!--end::Body-->
											</div>
											<!--end::Card-->
										</div>
										<!--end::Wizard-->
									</div>
								</div>
								<!--end::Card-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>


@endsection

{{-- Styles Section --}}
@section('styles')

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('js/pages/crud/ktdatatable/base/html-table.js') }}" type="text/javascript"></script>
@endsection
