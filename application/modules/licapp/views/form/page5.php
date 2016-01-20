<?php
$myPageName = curPageName();
$findme   = 'price';
$pos = strpos($myPageName, $findme);
?>
<div class="content pdfpages a4sizeheight"  <?php if($pos) { echo 'style="min-height: 1140px !important;"';}?> >
  <div class="section">
   
    
    <div class="row">
    <div class="col-xs-12 page_part" style="padding:0px 30px;"> 
    <?php //if($pos) { } else { echo 'FEE SCHEDULE'; } ?>
     </div>
  </div>
      
      <br/>
      <!-- <div class="ptxtp">
        As of 01 September 2015, the below price list applies to all Services provided by Virtuzone <br/>
        All amounts are denominated in UAE Dirhams (AED). Internal exchange rates will apply on payments in currencies other 
      than UAE Dirhams (AED).
		 <br/>
      </div>-->
      
      <div class="col-xs-12 col-md-6" style="padding:0px; margin:0px;">
        <p class="txtpbold p_priceList">INCORPORATIONS</p>
        <table class="table" style=" font-weight:normal !important;">
          <tr class="row_1">
          <td width="91%">Company License No Visa Upfront (1 Shareholder)</td><td width="09%" align="right">17,000</td></tr>
          <tr class="row_2"><td>Company License No Visa Installments (1 Shareholder)</td><td width="09%" align="right">18,700</td></tr>
          <tr class="row_1"><td>Company License No Visa Upfront (2 Or More Shareholders)</td><td width="09%" align="right">21,000</td></tr>
     <tr class="row_2"><td>Company License No Visa Installments (2 Or More Shareholders)</td><td width="09%" align="right">22,300</td></tr>
         <tr class="row_1"><td>Company License 1-3 Visas Upfront</td><td width="09%" align="right">30,000</td></tr>
         <tr class="row_2"><td>Company License 1-3 Visas Installments</td><td width="09%" align="right">32,400</td></tr>
          <tr class="row_1"><td>Company License 4-6 Visas Upfront</td><td width="09%" align="right">33,500</td></tr>
          <tr class="row_2"><td>Company License 4-6 Visas Instalments</td><td width="09%" align="right">37,000</td></tr>
        </table>
       
        
        <p class="txtpbold p_priceList">RESIDENCY VISA AND RELATED COSTS</p>
        <table class="table" style=" font-weight:normal !important;">
          <tr class="row_1"><td width="91%">Entry Permit Cancellation – Used (VZFUJ)</td>
          <td width="09%" align="right">1,500</td></tr>
          <tr class="row_2"><td>Entry Permit Cancellation – Unused (VZFUJ)</td><td width="09%" align="right">1,500</td></tr>
          <tr class="row_1"><td>Express Residence Fee (VZFUJ)</td><td width="09%" align="right">1,000</td></tr>
          
          <tr class="row_2"><td>Express Residence Visa Cancellation (VZFUJ)</td>
          <td width="09%" align="right">1,000</td></tr>
          <tr class="row_1"><td>Express Entry Permit (VZFUJ)</td><td width="09%" align="right">1,000</td></tr>
          
          <tr class="row_2"><td>Family Visa Cancellation - In-Country (VZFUJ)</td>
          <td width="09%" align="right">1,500</td></tr>
          <tr class="row_1"><td>Family Visa Cancellation - Out-of-Country (VZFUJ)</td>
          	<td width="09%" align="right">1,500</td></tr>
          
         <tr class="row_2"><td>Family Visa New (VZFUJ)</td><td width="09%" align="right">5,000</td></tr>
         <tr class="row_1"><td>Family Visa Renewal (VZFUJ)</td><td width="09%" align="right">5,000</td></tr>
          
          <tr class="row_2"><td>Maid's Visa Cancellation - In-Country (VZFUJ)</td>
            <td width="09%" align="right">1,000</td></tr>
          
          <tr class="row_1"><td>Maid's Visa Cancellation - Out-of-Country (VZFUJ)</td>
            <td width="09%" align="right">1,500</td></tr>
          
          <tr class="row_2"><td>Maid’s Visa New (VZFUJ)</td><td width="09%" align="right">5,000</td></tr>
          <tr class="row_1"><td>Maid’s Visa Renewal (VZFUJ)</td><td width="09%" align="right">5,000</td></tr>
          <tr class="row_2"><td>Out Pass (VZFUJ)</td><td width="09%" align="right">300</td></tr>
          
          <tr class="row_1"><td>Overstay Charges - Entry Permit / Residency Visa Exceeding 6 Months (VZFUJ)</td>
          <td width="09%" align="right">50 /day</td></tr>
          <tr class="row_2"><td>Overstay Charges - Entry Permit / Residency Visa Within 6 Months (VZFUJ)</td>
          <td width="09%" align="right"> 25 /day</td></tr>
          <tr class="row_1"><td>Overstay Charges - Visit Visa (VZFUJ)</td>
          <td width="09%" align="right">100/day</td></tr>
          <tr class="row_2"><td>Overstay Handling Charges (VZFUJ)</td><td width="09%" align="right">100</td></tr>
          <tr class="row_1"><td>Residence Visa Position Change (VZFUJ)</td>
          <td width="09%" align="right">1,500</td></tr>
          
          <tr class="row_2"><td>Residence Visa Cancellation - In-Country (VZFUJ)</td>
          <td width="09%" align="right">1,500</td></tr>
          <tr class="row_1"><td>Residence Visa Cancellation - Out-Of-Country (VZFUJ)</td>
          <td width="09%" align="right">1,500</td></tr>
          <tr class="row_2"><td>Residence Visa - Company Name Change (VZFUJ)</td>
          <td width="09%" align="right">1,000</td></tr>
          
          <tr class="row_1"><td>Residence Visa New (VZFUJ)</td><td width="09%" align="right">4,650</td></tr>
          <tr class="row_2"><td>Residence Visa Pre-approval - New Customer (VZFUJ)</td>
          <td width="09%" align="right">750</td></tr>
          <tr class="row_1"><td>Residence Visa Pre-approval - Existing Customer (VZFUJ)</td>
          <td width="09%" align="right">750</td></tr>
          <tr class="row_2"><td>Residence Visa Re-Stamping (VZFUJ)</td><td width="09%" align="right">5,500</td></tr>
          <tr class="row_1"><td>Residence Visa Re-Stamping Lost Passport (VZFUJ) </td>
          <td width="09%" align="right">5,500</td></tr>
          <tr class="row_2"><td>Residence Visa Renewal (VZFUJ)</td><td width="09%" align="right">4,650</td></tr>
          
          <tr class="row_1"><td>Status Adjustment (VZFUJ)</td><td width="09%" align="right">750</td></tr>
          <tr class="row_2"><td>Visa Deposit At Airport - AUH</td><td width="09%" align="right">740</td></tr>
          <tr class="row_1"><td>Visa Deposit At Airport - DXB</td><td width="09%" align="right">240</td></tr>
          <tr class="row_2"><td>Visa Deposit At Airport - SHJ</td><td width="09%" align="right">440</td></tr>
          <tr class="row_1"><td>Visa Transfer In (VZFUJ)</td><td width="09%" align="right">750</td></tr>
          <tr class="row_2"><td>Visa Transfer Out (VZFUJ)</td><td width="09%" align="right">1,500</td></tr>
          <tr class="row_1"><td>Work Permit (VZFUJ)*</td><td width="09%" align="right">750</td></tr>
          
       </table>  
       <br/>
       <p style="color:#333; font-weight:normal;"> 
        * Can only be purchased as mandatory addition to other products </p> 
  </div>
     
     
      <div class="col-xs-12 col-md-6">
      
      	<p class="txtpbold p_priceList">RENEWALS</p>
        <table class="table" style=" font-weight:normal !important;">
          <tr class="row_1"><td width="91%">Renewal No Visa Upfront (1 Shareholder)</td>
          <td width="09%" align="right">17,000</td></tr>
          <tr class="row_2"><td>Renewal No Visa Installments (1 Shareholder)</td><td width="09%" align="right">18,700</td></tr>
          <tr class="row_1"><td>Renewal No Visa Upfront (2 or more Shareholders)</td><td width="09%" align="right">21,000</td></tr>
          <tr class="row_2"><td>Renewal No Visa Installments (2 or more Shareholders)&nbsp;&nbsp;&nbsp;</td><td width="09%" align="right">22,300</td></tr>
         <tr class="row_1"><td>Renewal 1-3 Visas Upfront</td><td width="09%" align="right">26,000</td></tr>
         <tr class="row_2"><td>Renewal 1-3 Visas Installments</td><td width="09%" align="right">27,500</td></tr>
          <tr class="row_1"><td>Renewal 4-6 Visas Upfront</td><td width="09%" align="right">29,500</td></tr>
          <tr class="row_2"><td>Renewal 4-6 Visas Installments</td><td width="09%" align="right">33,000</td></tr>
        </table>
        
         <p class="txtpbold p_priceList">MISCELLANEOUS</p>
         <table class="table" style=" font-weight:normal !important;">
          <tr class="row_1"><td width="91%">Certificate Of Good Standing (VZFUJ)</td><td width="09%" align="right">350</td></tr>
          <tr class="row_2"><td>Certificate Of Incumbency (VZFUJ)</td><td width="09%" align="right">350</td></tr>
          <tr class="row_1"><td>Company Stamp - Additional / Replacement</td><td width="09%" align="right">200</td></tr>
          <tr class="row_2"><td>Courier Cost</td><td width="09%" align="right">Variable</td></tr>
         <tr class="row_1"><td>Document Attestation (VZFUJ)</td><td width="09%" align="right">350</td></tr>
         <tr class="row_2"><td>Document Attestation Administration</td><td width="09%" align="right">500</td></tr>
          <tr class="row_1"><td>Document Attestation Cost</td><td width="09%" align="right">Variable</td></tr>
          <tr class="row_2"><td>Document Translation Administration</td><td width="09%" align="right">500</td></tr>
          <tr class="row_1"><td>Document Translation Cost</td><td width="09%" align="right">Variable</td></tr>
          <tr class="row_2"><td>Employment Contract (VZFUJ)*</td><td width="09%" align="right">400</td></tr>
          <tr class="row_1"><td>Employment Contract - Amendment / Re-Issue (VZFUJ)</td><td width="09%" align="right">400</td></tr>
         
     
          <tr class="row_2"><td>Immigration Card - License Renewal (VZFUJ)</td><td width="09%" align="right">1,000</td></tr>
          <tr class="row_1"><td>Immigration Card - License Upgrade (VZFUJ)</td><td width="09%" align="right">1,000</td></tr>
          <tr class="row_2"><td>Immigration Card - New License (VZFUJ)</td><td width="09%" align="right">1,000</td></tr>
          <tr class="row_1"><td>Immigration Report - Active Customer (VZFUJ)</td><td width="09%" align="right">200</td></tr>
          <tr class="row_2"><td>Immigration Report - NAL (VZFUJ)</td><td width="09%" align="right">200</td></tr>
          
          <tr class="row_1"><td>Legalisation MOFA Administration - Corporate Document</td><td width="09%" align="right">1,000</td></tr>
          <tr class="row_2"><td>Legalisation MOFA Administration - Individual Document</td><td width="09%" align="right">500</td></tr>
          <tr class="row_1"><td>Legalisation MOFA Cost</td><td width="09%" align="right">Variable</td></tr>
          <tr class="row_2"><td>Letter Of Authenticity (VZFUJ)</td><td width="09%" align="right">350</td></tr>
          <tr class="row_1"><td>Liquor License Renewal (VZFUJ)</td><td width="09%" align="right">1,500</td></tr>
          <tr class="row_2"><td>Liquor License New (VZFUJ)</td><td width="09%" align="right">1,500</td></tr>
          
          
          
          
          <tr class="row_1"><td>Others</td><td width="09%" align="right">Variable</td></tr>
		  <tr class="row_2"><td>PDC Withdrawal</td><td width="09%" align="right">200</td></tr>
         <tr class="row_1"><td>Penalty On Late Renewal / Cancellation Of Immigration Card (VZFUJ)</td><td width="09%" align="right">Variable</td></tr>
          <tr class="row_2"><td>Penalty On Late Renewal / Cancellation Of License (VZFUJ)</td><td width="09%" align="right">200/month</td></tr>
          <tr class="row_1"><td>Register Of Members (VZFUJ)</td><td width="09%" align="right">350</td></tr>
          <tr class="row_2"><td>Re-issue Of Company Documents (VZFUJ)</td><td width="09%" align="right">3,000</td></tr>
          
          <tr class="row_1"><td>Rejected Payment Handling Waiver</td><td width="09%" align="right">Variable</td></tr>
		  <tr class="row_2"><td>Rejected Payment Handling - Standard</td><td width="09%" align="right">500</td></tr>
          <tr class="row_1"><td>Salary Certificate (VZFUJ)</td><td width="09%" align="right">400</td></tr>
          <tr class="row_2"><td>Security Deposit Against License</td><td width="09%" align="right">2,500</td></tr>
          
          <tr class="row_1"><td>Upgrade 1-3 Visas To 4-6 Visas</td><td width="09%" align="right">6,500</td></tr>
          <tr class="row_2"><td>Upgrade No Visa (1 Shareholder) to 1-3 Visas</td><td width="09%" align="right">16,000</td></tr>
          <tr class="row_1"><td>Upgrade No Visa (1 Shareholder) to 4-6 Visas</td><td width="09%" align="right">19,500</td></tr>
          <tr class="row_2"><td>Upgrade No Visa (2 Or More Shareholders) to 1-3 Visas</td><td width="09%" align="right">12,000</td></tr>
          <tr class="row_1"><td>Upgrade No Visa (2 Or More Shareholders) to 4-6 Visas</td><td width="09%" align="right">15,500</td></tr> 
       </table>  
       
       <p class="txtpbold p_priceList">AMENDMENTS</p>
        <table class="table" style=" font-weight:normal !important;">
            <tr class="row_1"><td width="91%">Additional Business Activity (VZFUJ)</td><td width="09%" align="right">2,500</td></tr>
            <tr class="row_2"><td>Immigration Card Amendment (VZFUJ)</td><td width="09%" align="right">500</td></tr>
            <tr class="row_1"><td>License Amendment (VZFUJ)</td><td width="09%" align="right">3,000</td></tr>
            <tr class="row_2"><td>License Amendment LLE to LLC (VZFUJ) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td width="09%" align="right">5,000</td></tr>
        </table>
       
        
    </div>
    
    
  </div>
<p style="color:#979893; font-weight:normal; text-align:left;">
    All amounts are denominated in UAE Dirhams (AED). Internal exchange rates will apply on payments in currencies other than UAE Dirhams (AED).
    </p>
</div>