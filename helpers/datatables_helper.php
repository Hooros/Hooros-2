<?php 
/*
 * function that generate the action buttons edit, delete
 * This is just showing the idea you can use it in different view or whatever fits your needs
 */
function get_codes($id,$code)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url().'propertyCategory/view/'.$id.'">'.$code.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_features($id,$code)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url().'roomFeatures/view/'.$id.'">'.$code.'</a>';
    $html.='</span>';
    
    return $html;
}


function get_buttonsUsageFee($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
     $html .='<a href="'.  base_url().'usageFee/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsGrades($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url().'propertyGrades/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}


function get_buttonsReservation($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'reservationTypes/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsGuest($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
    $html .='<a href="'.  base_url().'guestTypes/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsTittles($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'titles/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsCancellation($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'cancellationReasons/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsDeclineReasons($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'declineReasons/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsChannels($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'channels/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRateGroup($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'rateGroup/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRateType($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'rateType/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsMarket($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'market/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsSource($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'source/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsOrigins($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'origins/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}


function get_buttonsGroup($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'groupDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsDetailsName($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'bankingDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsDetailsCode($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'bankingDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}


function get_buttonsPropertyCodeDetails($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyBankingDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsPropertyNameDetails($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyBankingDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsInvoiceCode($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'invoice/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsInvoiceName($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'invoice/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsDocumentsName($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyDocuments/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsDocumentsCode($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyDocuments/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRoomCategoryCode($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomCategory/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRoomCategoryName($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomCategory/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsMealPlanCode($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'mealPlan/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsMealPlanName($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'mealPlan/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsSpecialCode($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'specialRequest/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsSpecialName($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'specialRequest/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}




function get_buttonsInvoiceData($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'invoice/viewInvoice/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}


function get_buttonsDocumentNamedata($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyDocuments/viewInvoice/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsDocumentTypedata($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyDocuments/viewInvoice/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRoomCategoryCodedata($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomCategory/viewRoomCategory/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRoomCategoryNamedata($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomCategory/viewRoomCategory/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsMealPlanNamedata($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'mealPlan/viewMealPlan/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsMealPlanCodedata($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'mealPlan/viewMealPlan/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsMealPlanAmountdata($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'mealPlan/viewMealPlan/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsSpecialRequestCode($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'specialRequest/viewSpecialRequest/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsSpecialRequestName($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'specialRequest/viewSpecialRequest/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsPropertyName($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsPropertyCode($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertyDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}

function get_buttonsPropertySettings($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'propertySetting/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsSpecialDates($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'specialDates/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsDates($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'specialDates/viewDates/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonstaxDetails($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'taxDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsTaxes($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'taxDetails/viewTaxes/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsPolicyDetails($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'policyDetails/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsPolicy($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'policyDetails/viewPolicy/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}


function get_buttonsDepositDetails($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'depositPolicy/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsDeposit($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'depositPolicy/viewDeposit/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsTaxRules($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'taxRules/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRules($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'taxRules/viewTaxRules/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}



function get_buttonsPolicyRules($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'depositPolicy/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsCencel($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'cancellationPolicy/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsMainRates($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'rates/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    return $html;
}

function get_buttonsRulesPolicy($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'depositPolicy/viewPolicyRules/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsCencelPolicy($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'cancellationPolicy/viewPolicyRules/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRates($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'rates/viewRates/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsRoomTypes($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomTypes/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    return $html;
}
function get_buttonsRoomTypesView($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomTypes/viewRoomTypes/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
function get_buttonsFeatures($id,$value)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomFeaturesView/view/'.$id.'">'.$value.'</a>';
    $html.='</span>';
    return $html;
}
function get_buttonsRoomFeatures($id,$value,$g_id)
{
    $ci= & get_instance();
    $html='<span class="actions">';
   $html .='<a href="'.  base_url().'roomFeaturesView/viewRoomFeatures/'.$id.'/'.$g_id.'">'.$value.'</a>';
    $html.='</span>';
    
    return $html;
}
