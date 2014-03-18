<?php
// This is to be only first step
personal_number
rank_id
trade_id
name
age
birth_date
religion
wrsp_id
med_cat
hosp_adm
grading
map_reading
civil_edn
grade_percentage
edn_lack

$smarty->assign("personal_number",$_COOKIE['personal_number']);
$smarty->assign("rank_id",$_COOKIE['rank_id']);
$smarty->assign("trade_id",$_COOKIE['trade_id']);
$smarty->assign("name",$_COOKIE['name']);
$smarty->assign("age",$_COOKIE['age']);

$birth_date_array = @explode("-",$_COOKIE['birth_date']);
$smarty->assign("birth_dd",$birth_date_array[2]);
$smarty->assign("birth_mm",$birth_date_array[1]);
$smarty->assign("birth_yy",$birth_date_array[0]);

$smarty->assign("religion",$_COOKIE['religion']);
$smarty->assign("wrsp_id",$_COOKIE['wrsp_id']);
$smarty->assign("med_cat",$_COOKIE['med_cat']);
$smarty->assign("hosp_adm",$_COOKIE['hosp_adm']);
$smarty->assign("grading",$_COOKIE['grading']);
$smarty->assign("map_reading",$_COOKIE['map_reading']);
$smarty->assign("civil_edn",$_COOKIE['civil_edn']);
$smarty->assign("grade_percentage",$_COOKIE['grade_percentage']);
$smarty->assign("edn_lack",$_COOKIE['edn_lack']);


setcookie("personal_number", "", (time()-(2*60*60)));
setcookie("rank_id", "", (time()-(2*60*60)));
setcookie("trade_id", "", (time()-(2*60*60)));
setcookie("name", "", (time()-(2*60*60)));
setcookie("age", "", (time()-(2*60*60)));
setcookie("birth_date", "", (time()-(2*60*60)));
setcookie("religion", "", (time()-(2*60*60)));
setcookie("wrsp_id", "", (time()-(2*60*60)));
setcookie("med_cat", "", (time()-(2*60*60)));
setcookie("hosp_adm", "", (time()-(2*60*60)));
setcookie("grading", "", (time()-(2*60*60)));
setcookie("map_reading", "", (time()-(2*60*60)));
setcookie("civil_edn", "", (time()-(2*60*60)));
setcookie("grade_percentage", "", (time()-(2*60*60)));
setcookie("edn_lack", "", (time()-(2*60*60)));

// This is to be only first step


// This is to be only second step
total_service
last_unit
civ_service_experience
idea_during_service
other_duties

$smarty->assign("total_service",$_COOKIE['total_service']);
$smarty->assign("last_unit",$_COOKIE['last_unit']);
$smarty->assign("civ_service_experience",$_COOKIE['civ_service_experience']);
$smarty->assign("idea_during_service",$_COOKIE['idea_during_service']);
$smarty->assign("other_duties",$_COOKIE['other_duties']);


setcookie("total_service", "", (time()-(2*60*60)));
setcookie("last_unit", "", (time()-(2*60*60)));
setcookie("civ_service_experience", "", (time()-(2*60*60)));
setcookie("idea_during_service", "", (time()-(2*60*60)));
setcookie("other_duties", "", (time()-(2*60*60)));


// This is to be only second step


// This is to be only third step
// This is to be only third step


// This is to be only forth step
nok_name
address_vill
address_post
address_pin
address_ps
address_dist
address_state

$smarty->assign("nok_name",$_COOKIE['nok_name']);
$smarty->assign("address_vill",$_COOKIE['address_vill']);
$smarty->assign("address_post",$_COOKIE['address_post']);
$smarty->assign("address_pin",$_COOKIE['address_pin']);
$smarty->assign("address_ps",$_COOKIE['address_ps']);
$smarty->assign("address_dist",$_COOKIE['address_dist']);
$smarty->assign("address_state",$_COOKIE['address_state']);


setcookie("nok_name", "", (time()-(2*60*60)));
setcookie("address_vill", "", (time()-(2*60*60)));
setcookie("address_post", "", (time()-(2*60*60)));
setcookie("address_pin", "", (time()-(2*60*60)));
setcookie("address_ps", "", (time()-(2*60*60)));
setcookie("address_dist", "", (time()-(2*60*60)));
setcookie("address_state", "", (time()-(2*60*60)));


// This is to be only forth step


// This is to be only fifth step
joint_account_detail
single_account_detail
smart_card_held
pan_card
basic_pay
loan_detail
other_financial_obligation

$smarty->assign("joint_account_detail",$_COOKIE['joint_account_detail']);
$smarty->assign("single_account_detail",$_COOKIE['single_account_detail']);
$smarty->assign("smart_card_held",$_COOKIE['smart_card_held']);
$smarty->assign("pan_card",$_COOKIE['pan_card']);
$smarty->assign("basic_pay",$_COOKIE['basic_pay']);
$smarty->assign("loan_detail",$_COOKIE['loan_detail']);
$smarty->assign("other_financial_obligation",$_COOKIE['other_financial_obligation']);


setcookie("joint_account_detail", "", (time()-(2*60*60)));
setcookie("single_account_detail", "", (time()-(2*60*60)));
setcookie("smart_card_held", "", (time()-(2*60*60)));
setcookie("pan_card", "", (time()-(2*60*60)));
setcookie("basic_pay", "", (time()-(2*60*60)));
setcookie("loan_detail", "", (time()-(2*60*60)));
setcookie("other_financial_obligation", "", (time()-(2*60*60)));


// This is to be only fifth step


// This is to be only sixth step
marital_status
family_planning
al_days
cl_days
red_ink_entry
drinker
health_card_update
pvt_vehicle
license_no
vehicle_reg_no
insurance_period_from
insurance_period_to
special_point
point_by

$smarty->assign("marital_status",$_COOKIE['marital_status']);
$smarty->assign("family_planning",$_COOKIE['family_planning']);
$smarty->assign("al_days",$_COOKIE['al_days']);
$smarty->assign("cl_days",$_COOKIE['cl_days']);
$smarty->assign("red_ink_entry",$_COOKIE['red_ink_entry']);
$smarty->assign("drinker",$_COOKIE['drinker']);
$smarty->assign("health_card_update",$_COOKIE['health_card_update']);
$smarty->assign("pvt_vehicle",$_COOKIE['pvt_vehicle']);
$smarty->assign("license_no",$_COOKIE['license_no']);
$smarty->assign("vehicle_reg_no",$_COOKIE['vehicle_reg_no']);
$smarty->assign("insurance_period_from",$_COOKIE['insurance_period_from']);
$smarty->assign("insurance_period_to",$_COOKIE['insurance_period_to']);
$smarty->assign("special_point",$_COOKIE['special_point']);
$smarty->assign("point_by",$_COOKIE['point_by']);


setcookie("marital_status", "", (time()-(2*60*60)));
setcookie("family_planning", "", (time()-(2*60*60)));
setcookie("al_days", "", (time()-(2*60*60)));
setcookie("cl_days", "", (time()-(2*60*60)));
setcookie("red_ink_entry", "", (time()-(2*60*60)));
setcookie("drinker", "", (time()-(2*60*60)));
setcookie("health_card_update", "", (time()-(2*60*60)));
setcookie("pvt_vehicle", "", (time()-(2*60*60)));
setcookie("license_no", "", (time()-(2*60*60)));
setcookie("vehicle_reg_no", "", (time()-(2*60*60)));
setcookie("insurance_period_from", "", (time()-(2*60*60)));
setcookie("insurance_period_to", "", (time()-(2*60*60)));
setcookie("special_point", "", (time()-(2*60*60)));
setcookie("point_by", "", (time()-(2*60*60)));


// This is to be only sixth step


// This is to be only sixth step
remark_by_bn
sign_by_bn
special_target
sign_of_adjt_date
sign_by_adjt
sign_of_2ic_date
sign_by_2ic

$smarty->assign("remark_by_bn",$_COOKIE['remark_by_bn']);
$smarty->assign("sign_by_bn",$_COOKIE['sign_by_bn']);
$smarty->assign("special_target",$_COOKIE['special_target']);

$sign_of_adjt_date_array = explode("-",$_COOKIE['sign_of_adjt_date']);
$smarty->assign("sign_of_adjt_dd",$sign_of_adjt_date_array[2]);
$smarty->assign("sign_of_adjt_mm",$sign_of_adjt_date_array[1]);
$smarty->assign("sign_of_adjt_yy",$sign_of_adjt_date_array[0]);

$smarty->assign("sign_by_adjt",$_COOKIE['sign_by_adjt']);

$sign_of_2ic_date_array = explode("-",$_COOKIE['sign_of_2ic_date']);
$smarty->assign("sign_of_2ic_dd",$sign_of_2ic_date_array[2]);
$smarty->assign("sign_of_2ic_mm",$sign_of_2ic_date_array[1]);
$smarty->assign("sign_of_2ic_yy",$sign_of_2ic_date_array[0]);

$smarty->assign("sign_by_2ic",$_COOKIE['sign_by_2ic']);


setcookie("remark_by_bn", "", (time()-(2*60*60)));
setcookie("sign_by_bn", "", (time()-(2*60*60)));
setcookie("special_target", "", (time()-(2*60*60)));
setcookie("sign_of_adjt_date", "", (time()-(2*60*60)));
setcookie("sign_by_adjt", "", (time()-(2*60*60)));
setcookie("sign_of_2ic_date", "", (time()-(2*60*60)));
setcookie("sign_by_2ic", "", (time()-(2*60*60)));

// This is to be only sixth step
?>