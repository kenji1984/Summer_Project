<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../style/style.css"/>	
        <link rel="stylesheet" media="screen and (max-device-width: 500px)" href="../style/mobile.css"/>
        <link rel="stylesheet" media="screen and (min-width: 100px) and (max-width: 900px)" href="../style/mobile.css"/>
        <link rel="stylesheet" media="all" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" media="all" type="text/css" href="../style/jquery-ui-timepicker-addon.css" />
        <title>Survey</title>
    </head>
    <body>
    <main>
        <header class="zoom">
            <p>Resize font: </p>
        <div class="sep">
            <img id="zoom_in" src="../images/font_add.png"/> 
            <span class="grey">|</span> 
            <img id="zoom_out" src="../images/font_delete.png"/>
        </div>
        </header>
        
        <h2>Parcel Table</h2>
        <p>Parcel_________</p>
        <p>Address:_________</p>

        <header class="label">
            <p class="title">Now you have your block let search the right parcel</p>
            <br><br><br>
            <a href="link"><i><b>Please click this link to start query on parcel address</b></i></a>
        </header>

        <form id="survey_form" action="../index.php" method="post">
    
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="pIndex">Parcel Index#</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input id="pIndex" class ="textbox req" type="text" name="pIndex"/>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="pID">Parcel ID numbers</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input id="pID" class ="textbox req" type="text" name="pID"
                                value="<?php if(isset($_POST['parcel_id'])) echo htmlentities($_POST['parcel_id']);?>"/>
                        <span id="avail"></span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="bIndex">Block# & parcel index#</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input id="bIndex" class ="textbox req" type="text" name="bIndex"/>
                        <p class="descrpt">This will show in the survey with Block ID and number index</p>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="bID">Block ID</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input id="bID" class ="textbox req" type="text" name="bID" 
                               value="<?php if(isset($_POST['block_id'])) echo htmlentities($_POST['block_id']);?>"/>
                    </div>
                </div>
            </div>
                     
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="textArea">Querying Resident Address</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <textarea id="address" class="req" name="address"><?php if(isset($_POST['parcel_address'])) echo htmlentities($_POST['parcel_address']); ?></textarea>
                        <span id="grey" class="expand">Expand</span>
                        <p class="descrpt">address in specific resident</p>
                    </div>
                </div>
            </div>
               
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>Is Address Visible?</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="aVisible" value="yes"/>Yes<br>
                        <input type="radio" class="req" name="aVisible" value="no"/>No
                    </div>
                    <div class="third_cell">
                        <span class="reset" id="aVisible">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table address">
                <div class="row">
                    <div class="col">
                        <label>Is the address above correct?</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="correct" value="yes"/>Yes<br>
                        <input type="radio" name="correct" value="no"/>No 
                    </div>
                    <div class="third_cell">
                        <span class="reset" id="correct">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="resType">Done Rating Residential Type</label>
                    </div>
                    <div class="right">
                        <input class ="textbox" type="text" name="resType"/>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="time">Inspection Date and Time</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input id="time" class ="textbox req" type="text" name="time"/>
                        <input id="now" type="button" value="Now"/>
                        <span id="grey">M-D-Y H:M</span>
                    </div>
                </div>
            </div>
            
            <div class="table modify">
                <div class="row">
                    <div class="col">
                        <label for="modify">Manually modified/corrected the address</label>
                    </div>
                    <div class="right">
                        <textarea name="modify"></textarea>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>Off-street Parking</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="parking" value="yes"/>Yes<br>
                        <input type="radio" name="parking" value="no"/>No 
                    </div> 
                    <div class="third_cell">
                        <span class="reset" id="parking">reset</span>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            <header class="label">
                <p class="title">--------------Classification----------------------------</p>
            </header>
            
            <div class="table default res nonres vacant common survey">
                <div class="row">
                    <div class="col">
                        <label>1. Structure Type</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="structType" value="res"/>Residential<br>
                        <input type="radio" class="req" name="structType" value="nonres"/>Non-residential<br>
                        <input type="radio" class="req" name="structType" value="vacant"/>Vacant Lot<br>
                        <input type="radio" class="req" name="structType" value="common"/>Common Area
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="structType">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table res survey">
                <div class="row">
                    <div class="col">
                        <label>2. Use Type</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="useType" value="res"/>Residential<br>
                        <input type="radio" name="useType" value="nonres"/>Non-residential<br>
                        <input type="radio" name="useType" value="mixed"/>Mixed<br>
                        <input type="radio" name="useType" value="unratable"/>Un-ratable<br>
                        <input type="radio" name="useType" value="none"/>Not Applicable
                    </div>
                    <div class="third_cell"> 
                        <span class="reset" id="useType">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table res survey">
                <div class="row">
                    <div class="col">
                        <label>3. Residential Type</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="resType" value="single"/>Detached-1: Single Family<br>
                        <input type="radio" name="resType" value="duplex"/>Detached-2: Duplex<br>
                        <input type="radio" name="resType" value="attached"/>Attached<br>
                        <input type="radio" name="resType" value="apartments"/>Apartments<br>
                        <input type="radio" name="resType" value="nonres"/>Non-residential<br>
                        <input type="radio" name="resType" value="none"/>N/A
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="resType">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table default res nonres survey">
                <div class="row">
                    <div class="col">
                        <label>4. Structure Profile</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="profile" value="1"/>Single level<br>
                        <input type="radio" name="profile" value="2"/>2-story<br>
                        <input type="radio" name="profile" value="3"/>3-story<br>
                        <input type="radio" name="profile" value="4"/>4-6 floors<br>
                        <input type="radio" name="profile" value="6+"/>Over 6 floors<br>
                        <input type="radio" name="profile" value="none"/>Not applicable
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="profile">reset</span>
                    </div>
                </div>
            </div>
            
            
            
            
            
            <header class="label sCondition">
                <p class="title">Structural Condition</p>
            </header>
            
            <div class="table res nonres survey">
                <div class="row">
                    <div class="col">
                        <label>1. Roof</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="roof" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="roof" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="roof" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="roof" value="good"/>Good<br>
                        <input type="radio" class="req" name="roof" value="excellent"/>Excellent<br>
                        <input type="radio" class="req" name="roof" value="none"/>NA<br>
                        <input type="radio" class="req" name="roof" value="unrate"/>Un-rated
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="roof">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table default res nonres common survey">
                <div class="row">
                    <div class="col">
                        <label>2. Foundations and Walls</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="foundation" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="foundation" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="foundation" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="foundation" value="good"/>Good<br>
                        <input type="radio" class="req" name="foundation" value="excellent"/>Excellent<br>
                        <input type="radio" class="req" name="foundation" value="none"/>NA
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="foundation">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table default res nonres survey" id="windows">
                <div class="row">
                    <div class="col">
                        <label>3. Windows and Doors</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="windows" value="severely"/>Severely<br>
                        <input type="radio" name="windows" value="seriously"/>Seriously<br>
                        <input type="radio" name="windows" value="substandard"/>Substandard<br>
                        <input type="radio" name="windows" value="good"/>Good<br>
                        <input type="radio" name="windows" value="excellent"/>Excellent<br>
                        <input type="radio" name="windows" value="none"/>NA
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="windows">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table default res survey">
                <div class="row">
                    <div class="col">
                        <label>4. Porches</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="porch" value="severely"/>Severely<br>
                        <input type="radio" name="porch" value="seriously"/>Seriously<br>
                        <input type="radio" name="porch" value="substandard"/>Substandard<br>
                        <input type="radio" name="porch" value="good"/>Good<br>
                        <input type="radio" name="porch" value="excellent"/>Excellent<br>
                        <input type="radio" name="porch" value="none"/>NA
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="porch">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table res nonres survey">
                <div class="row">
                    <div class="col">
                        <label>5. Exterior Paint</label>
                    </div>
                    <div class="right">
                        <input type="radio" name="paint" value="severely"/>Severely<br>
                        <input type="radio" name="paint" value="seriously"/>Seriously<br>
                        <input type="radio" name="paint" value="substandard"/>Substandard<br>
                        <input type="radio" name="paint" value="good"/>Good<br>
                        <input type="radio" name="paint" value="excellent"/>Excellent<br>
                        <input type="radio" name="paint" value="none"/>NA
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="paint">reset</span>
                    </div>
                </div>
            </div>
            
            
            
            
            
            <header class="label">
                <p class="title">Grounds Condition</p>
            </header>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>1. Private Sidewalks and Driveways</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="sidewalks" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="sidewalks" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="sidewalks" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="sidewalks" value="good"/>Good<br>
                        <input type="radio" class="req" name="sidewalks" value="excellent"/>Excellent<br>
                        <input type="radio" class="req" name="sidewalks" value="none"/>NA
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="sidewalks">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>2. Lawn and Shrubs</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="lawn" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="lawn" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="lawn" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="lawn" value="good"/>Good<br>
                        <input type="radio" class="req" name="lawn" value="excellent"/>Excellent
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="lawn">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>3. Vehicles</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="vehicles" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="vehicles" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="vehicles" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="vehicles" value="good"/>Good<br>
                        <input type="radio" class="req" name="vehicles" value="excellent"/>Excellent
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="vehicles">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>4. Litter</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="litter" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="litter" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="litter" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="litter" value="good"/>Good<br>
                        <input type="radio" class="req" name="litter" value="excellent"/>Excellent
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="litter">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>5. Open Storage</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="storage" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="storage" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="storage" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="storage" value="good"/>Good<br>
                        <input type="radio" class="req" name="storage" value="excellent"/>Excellent
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="storage">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>6. Accessory Structure (excluded from Grounds Conditions Summary Measures)</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="accessory" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="accessory" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="accessory" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="accessory" value="good"/>Good<br>
                        <input type="radio" class="req" name="accessory" value="excellent"/>Excellent<br>
                        <input type="radio" class="req" name="accessory" value="none"/>NA<br>
                        <input type="radio" class="req" name="accessory" value="unrate"/>Un-rated
                        <p class="descrpt">un-ratable: could not be determined e.g. line sight is obscured</p>
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="accessory">reset</span>
                    </div>
                </div>
            </div>
            
            
            
            
            
            
            <header class="label">
                <p class="title">Public Infrastructure Conditions</p>
            </header>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>1. Public Sidewalk</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="public_sidewalk" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="public_sidewalk" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="public_sidewalk" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="public_sidewalk" value="good"/>Good<br>
                        <input type="radio" class="req" name="public_sidewalk" value="excellent"/>Excellent<br>
                        <input type="radio" class="req" name="public_sidewalk" value="none"/>Not Applicable
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="public_sidewalks">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>2. Curbs</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="curbs" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="curbs" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="curbs" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="curbs" value="good"/>Good<br>
                        <input type="radio" class="req" name="curbs" value="excellent"/>Excellent<br>
                        <input type="radio" class="req" name="curbs" value="none"/>Not Applicable
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="curbs">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>3. Street Lights</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="street_lights" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="street_lights" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="street_lights" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="street_lights" value="good"/>Good<br>
                        <input type="radio" class="req" name="street_lights" value="excellent"/>Excellent
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="street_lights">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>4. Catch Basins</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="basins" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="basins" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="basins" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="basins" value="good"/>Good<br>
                        <input type="radio" class="req" name="basins" value="excellent"/>Excellent<br>
                        <input type="radio" class="req" name="basins" value="none"/>Not Applicable
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="basins">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label>5. Street Condition</label>
                        <p class="require"><sup>*</sup>must provide value</p>
                    </div>
                    <div class="right">
                        <input type="radio" class="req" name="street_condition" value="severely"/>Severely<br>
                        <input type="radio" class="req" name="street_condition" value="seriously"/>Seriously<br>
                        <input type="radio" class="req" name="street_condition" value="substandard"/>Substandard<br>
                        <input type="radio" class="req" name="street_condition" value="good"/>Good<br>
                        <input type="radio" class="req" name="street_condition" value="excellent"/>Excellent
                    </div> 
                    <div class="third_cell"> 
                        <span class="reset" id="street_condition">reset</span>
                    </div>
                </div>
            </div>
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="insptr1">INSPTR1</label>
                    </div>
                    <div class="right">
                        <input id="insptr1" class ="textbox" type="text" name="insptr1"/>
                    </div>
                </div>
            </div>            
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="insptr2">INSPTR2</label>
                    </div>
                    <div class="right">
                        <input id="insptr2" class ="textbox" type="text" name="insptr2"/>
                    </div>
                </div>
            </div>            
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="prgm">PRGM</label>
                    </div>
                    <div class="right">
                        <input id="prgm" class ="textbox" type="text" name="prgm"/>
                    </div>
                </div>
            </div>            
            
            <div class="table">
                <div class="row">
                    <div class="col">
                        <label for="area_id">AreaID</label>
                    </div>
                    <div class="right">
                        <input id="area_id" class ="textbox" type="text" name="area_id"/>
                    </div>
                </div>
            </div>            
              
            <div class="table">
                <div class="row">
                    <div class="col">
                        <input id ="prev" type="button" value="Previous"/>
                    </div>
                    <div class="submit">
                        <input id="submit" type="submit" value="Submit" onClick="return validate()"/>
                    </div>
                    <div class="third_cell">
                        <input id ="next" type="button" value="Next"/>
                    </div>
                </div>
            </div>   
            
        </form>

    </main>
    
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/change.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="../js/jquery-ui-sliderAccess.js"></script>
    <script type="text/javascript" src="../js/next_and_previous_button.js"></script>
    <script type="text/javascript" src="../js/validation.js"></script>
        
</body>
</html>

