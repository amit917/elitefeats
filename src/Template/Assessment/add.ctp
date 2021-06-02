<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assessment $assessment
 */
?>
<div class = "container">
    <br>
      <?php $role = ["Coach","Parent","Athlete","Other"];?>
    <?php  $country_list = array(
		"Afghanistan",
		"Albania",
		"Algeria",
		"Andorra",
		"Angola",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bhutan",
		"Bolivia",
		"Bosnia and Herzegovina",
		"Botswana",
		"Brazil",
		"Brunei",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cape Verde",
		"Central African Republic",
		"Chad",
		"Chile",
		"China",
		"Colombi",
		"Comoros",
		"Congo (Brazzaville)",
		"Congo",
		"Costa Rica",
		"Cote d'Ivoire",
		"Croatia",
		"Cuba",
		"Cyprus",
		"Czech Republic",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic",
		"East Timor (Timor Timur)",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Ethiopia",
		"Fiji",
		"Finland",
		"France",
		"Gabon",
		"Gambia, The",
		"Georgia",
		"Germany",
		"Ghana",
		"Greece",
		"Grenada",
		"Guatemala",
		"Guinea",
		"Guinea-Bissau",
		"Guyana",
		"Haiti",
		"Honduras",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran",
		"Iraq",
		"Ireland",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea, North",
		"Korea, South",
		"Kuwait",
		"Kyrgyzstan",
		"Laos",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macedonia",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands",
		"Mauritania",
		"Mauritius",
		"Mexico",
		"Micronesia",
		"Moldova",
		"Monaco",
		"Mongolia",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepal",
		"Netherlands",
		"New Zealand",
		"Nicaragua",
		"Niger",
		"Nigeria",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines",
		"Poland",
		"Portugal",
		"Qatar",
		"Romania",
		"Russia",
		"Rwanda",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Vincent",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Serbia and Montenegro",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Slovakia",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"Spain",
		"Sri Lanka",
		"Sudan",
		"Suriname",
		"Swaziland",
		"Sweden",
		"Switzerland",
		"Syria",
		"Taiwan",
		"Tajikistan",
		"Tanzania",
		"Thailand",
		"Togo",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates",
		"United Kingdom",
		"United States",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Vatican City",
		"Venezuela",
		"Vietnam",
		"Yemen",
		"Zambia",
		"Zimbabwe"
	);?>
 <div class="box box-default">
        <div class="box-header with-border bg-info">
          <h3 class="box-title">Account Profile</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            
          <div class = "row">
              <div class = "col-sm-5">
                  <?php echo $this->Form->create("myForm")?>
                  <?php echo $this->Form->control("First name",["class"=>"form-control"])?>
              </div>
               <div class = "col-sm-5">
                  <?php echo $this->Form->control("Last name",["class"=>"form-control"])?>
              </div>
          </div>
           <div class = "row">
              <div class = "col-sm-5">
                  <?php echo $this->Form->control("Email",["class"=>"form-control"])?>
              </div>
               <div class = "col-sm-5">
                  <?php echo $this->Form->control("Phone",["class"=>"form-control"])?>
              </div>
          </div>
           <div class = "row">
              <div class = "col-sm-5">
                  <?php echo $this->Form->control("Organization",["class"=>"form-control"])?>
              </div>
               <div class = "col-sm-5">
                   <label>Role</label>
                  <?php  echo $this->Form->select('reports', $role, ['default' => '',"class"=>"form-control","name"=>"Role"]);?>
              </div>
          </div>
           <div class = "row">
              <div class = "col-sm-5">
                  <?php echo $this->Form->control("Address 1",["class"=>"form-control"])?>
              </div>
               <div class = "col-sm-5">
                  <?php echo $this->Form->control("Address 2",["class"=>"form-control"])?>
              </div>
          </div>
           <div class = "row">
              <div class = "col-sm-5">
                  <?php echo $this->Form->control("City",["class"=>"form-control"])?>
              </div>
               <div class = "col-sm-5">
                  <?php echo $this->Form->control("State",["class"=>"form-control"])?>
              </div>
          </div>
          <div class = "row">
              <div class = "col-sm-5">
                  <label>Country</label>
                  <?php  echo $this->Form->select('reports', $country_list, ['default' => '',"class"=>"form-control","name"=>"Country"]);?>
              </div>
               <div class = "col-sm-5">
                  
              </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         <div class = "row">
              <div class = "col-sm-5">
                  <?php echo $this->Form->submit("Submit",["class"=>"btn btn-primary"])?>
                 
              </div>
               <div class = "col-sm-5">
                  
              </div>
          </div>
        </div>
      </div>
      </div>

