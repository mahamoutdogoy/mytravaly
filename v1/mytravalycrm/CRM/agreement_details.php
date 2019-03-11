
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
	<script type="text/javascript" src="jspdf.js"></script>

	<style type="text/css">
		h3
		{
			color:blue;

		}
		h4
		{
			color:#4682B4;
		}
	</style>
	<script type="text/javascript">
		function onnClick()
		{
		var pdf = new jsPDF();
  		pdf.setFontSize(12);
  		pdf.setFont('times');
  		
  		pdf.text('The Hotel agreement :This hotel agreement (the “agreement”) is effective',10,10);
  		var datei=document.getElementById("dateid").value;
  		pdf.text(datei,80,20);
  		var txt0='Between: Travaly Travel & Hospitality LLP ( "Travaly"), a company is  incorporated  of the Limited Liability Partnership Act, 2008, CIN: AAK-5336, with its   head office located at: #171, Panduranga Nagar, 1st Cross, Off Bannerghatta Road, Bengaluru-560076, Karnataka, India. Which  expression shall include its executors, administrators, affiliates, subsidiaries, group companies, successors-in-interest/office  and permitted assigns. And: ';
  		 var line0=pdf.splitTextToSize(txt0,200);
  		 pdf.text(line0,10,30);
  		 var hotel=document.getElementById('hotel').value;
  		 pdf.text(hotel,10,50);
  		 var txt1='(the "Hotel"), a company organized and existing under the laws of the of';

  	   	pdf.text(txt1,10,60);
  	   	var state=document.getElementById('state').value;
  	   	pdf.text(state,10,70);
  	   	var txt2=', with its head office located at ';
  	   	pdf.text(txt2,10,80);
  	   	var address=document.getElementById('address').value;
  	   	pdf.text(address,10,90);
  	   	var txt3="PREAMBLE";
  	   	pdf.text(txt3,80,100);
  	   	var txt4 =' WHEREAS TRAVALY TRAVEL & HOSPITALITY LLP IS IN THE BUSINESS OF E-COMMERCE PORTAL UNDER THE BRAND NAME OF TRAVALY ON THE URL: www.mytravaly.com. Whereas the Hotel is in the business executing, running & maintaining Hotels. Whereas the Hotel wishes to obtain such services exclusively from Travaly Travel & Hospitality LLP and Travaly Travel & Hospitality LLP wishes to be the exclusive provider thereof to the Hotel, subject to the terms and conditions of this agreement; Now therefore in consideration of the mutual promises and covenants contained in this agreement and other good and valuable consideration, the receipt and sufficiency of which are hereby acknowledged, the parties agree as follows: ';
  	   	var line1=pdf.splitTextToSize(txt4,200);
  	   	pdf.text(line1,10,110);
  	   	pdf.text('1. Definitions',80,150);
  	   	var txt5='1. Definitions In this agreement, except where the context or subject matter is inconsistent therewith, the following terms shall have the following meanings: 1.1 “agreement” shall mean this document and the annexed schedules which are incorporated herein together with any future written and executed amendments. 1.2 “associated staff” shall mean any officer, director, employee, agent, or student of the parties, and any other person involved in the execution of this agreement. 1.3 “documentation” shall mean all documents, regardless of form, relating to the services. 1.4 “material” shall mean any and all information and materials, relating to a party’s business, given to the other party from time to time for review, data processing, or for any other reason, and all copies thereof regardless of form or storage medium, including, but not limited to, documentation, notes, formulae, components, drawings, data, flow-charts, plans, specifications, techniques, processes, algorithms, inventions, prototypes, protocols, patent portfolio, pre-clinical and clinical studies, contracts, marketing and other financial and business plans, business processes and methods of doing business and includes all confidential and proprietary information which is at any time so designated by either party, either in writing or orally. ';
  	   	var line2=pdf.splitTextToSize(txt5,200);
  	   	pdf.text(line2,10,160);
  	   	var txt6='2. Schedules';
  	   	pdf.text(txt6,80,220);
  	   	var txt7='2.1 The following schedules are attached hereto and are hereby incorporated by reference and made part of this agreement: 2.1.1 Schedule “A” - Fees & payment 2.1.2 Schedule “B”- Cancellations, refunds policies 2.1.3 Schedule “C”- Rooms, Tariff, Tax & inventory details 2.1.4 Schedule “D”- Hotel Information ';
  	   	var line3=pdf.splitTextToSize(txt7,200);
  	   	pdf.text(line3,10,230);
  	   	var txt8='3. Subject/scope of agreement';
  	   	pdf.text(txt8,80,250);
  	   	var txt9='Travaly Travel & Hospitality LLP will provide the services described in schedule “a”, attached hereto (the “services”), to the client according to the terms and conditions of this agreement. Travaly Travel & Hospitality LLP will use its best efforts, skill and ability in performing the services under this agreement. ';
  	   	var line4=pdf.splitTextToSize(txt9,200);
  	   	pdf.text(line4,10,260);
  	   
  	   	pdf.addPage();
  	   	var txt10='4. Relationship of the parties';
  	   	pdf.text(txt10,80,10);
  	   	var txt11='As Travaly Travel & Hospitality LLP is undertaking to perform services for the Hotel, and is doing so as an independent contractor and not as an employee, agent, partner, or joint venture of the Hotel, Travaly Travel & Hospitality LLP’s fees will be limited to those stated in schedule “b” to this agreement. Travaly Travel & Hospitality LLP will not participate in any of the client’s employee benefit plans nor receive any other compensation beyond that stated in such schedule “b”, a copy of which has been appended hereto and initialed by the parties for identification. Travaly Travel & Hospitality LLP will not have any power or authority to bind the Hotel or to assume or create any obligation or responsibility, express or implied, on the Hotel’s behalf or in the Hotel’s name, and Travaly Travel & Hospitality LLP will not represent to any person or entity that Travaly Travel & Hospitality LLP has such power or authority. ';
  	   	var line5=pdf.splitTextToSize(txt11,200);
  	   	pdf.text(line4,10,20);
  	   	var txt12='5. Travaly Travel & Hospitality LLP’s status';
  	   	pdf.text(txt12,80,40);
  	   	var txt13='Travaly Travel & Hospitality LLP is an independent contractor. The Hotel is not responsible for verifying the existence or sufficiency of the qualifications, authorizations, permits or licenses of Travaly Travel & Hospitality LLP and/or Travaly Travel & Hospitality LLP’s employees. Hotel represents and warrants that Travaly Travel & Hospitality LLP and any employees of Travaly Travel & Hospitality LLP are authorized to work and are not acting and will not act during the term of this agreement in violation of any applicable laws and the regulations thereunder or any agreement it has entered into with a third party. The parties will indemnify each other against any and all claims, damages, losses and other liabilities including, but not limited to, fines, penalties and/or attorneys’ fees incurred by the parties and/or either party’s employees or agents are not authorized to perform all or part of the services. ';
  	   	var line5=pdf.splitTextToSize(txt13,200);
  	   	pdf.text(line5,10,50);
  	   	var txt14='6. Fees and expenses & Payment';
  	   	pdf.text(txt14,80,100);
  	   	var txt15='6.1 The fees and payment for Travaly Travel & Hospitality LLP’s services shall be as specified in schedule “b”, attached hereto. 6.2 Travaly Travel & Hospitality LLP will pay Hotel the net room rates for all reservations. In the case of a customer dispute, discrepancy or audit by legal authorities, hotel shall produce evidence of guest occupancy. Travaly Travel & Hospitality LLP shall collect the payment for room charges from the customer at the time of booking and shall pass the booking amount to the hotel, prior to the guest check-out. All additional and miscellaneous services availed by the guest during the stay to be charged directly to the guest. In case of booking made within 48 hours of check in time hotel will give Travaly Travel & Hospitality LLP 3 (three) working days to process the payment. ';
  	   	var line6=pdf.splitTextToSize(txt13,200);
  	   	pdf.text(line6,10,110);
  	   	var txt16='7. Inventory & Tariff ';
  	   	pdf.text(txt16,80,160);
  	   	var txt17='The Hotel has committed to the Travaly Travel & Hospitality LLP a base fare of room allotment on daily basis. The Hotel will be provided with a login & password for Travaly Travel & Hospitality LLP’s hotel Extranet to control rates & inventory of the Hotel on the Travaly’s website. Information related to this agreement is strictly confidential and must not be disclosed to any third parties. ';
  	   	var line7=pdf.splitTextToSize(txt17,200);
  	   	pdf.text(line7,10,170);
  	   	var txt18='8. Term';
  	   	pdf.text(txt18,80,210);
  	   	var txt19='8.1 This agreement will come into force as of the effective date and will expire on 1 year (the “initial term”) unless extended by the parties in writing or otherwise terminated by the parties in accordance with the terms of this agreement subject to earlier termination according to section 9, hereof. 8.2 At the end of the initial term, this agreement will be automatically renewed for successive 5 years’ terms (a “renewal term”) unless either party provides written notice to the other party of its desire to terminate this agreement in accordance herewith. ';
  	   	var line8=pdf.splitTextToSize(txt19,200);
  	   	pdf.text(line8,10,220);
  	   	pdf.addPage();
  	   	var txt20='9. Termination';
  	   	pdf.text(txt20,80,10);
  	   	
  	   	var txt21="9.1 Both parties shall have the right to terminate or cancel all or part of the services contemplated by this agreement or any request for services on any specific task at any time by giving 30 working days prior written notice of its intent to so terminate or cancel. 9.2 Travaly reserves the right to terminate this agreement with immediate effect in the event of any material or other breach of the provision of this agreement by hotel including without limitation on the hotel's inability to offer inventory, inventory and rate parity not being maintained by the hotel, failure to issue invoices to company, bankruptcy or winding up proceedings against the hotel, change of control of the hotel or multiple escalations from customers against the hotel i.e., customer satisfaction index. Hotel shall immediately intimate company of any change of control. 9.3 If either party becomes bankrupt or insolvent or if a petition or other proceeding is filed by or against a party for re-organization, arrangement or relief under any law relating to bankruptcy or insolvency, or if a receiver is appointed in respect of a party’s property and assets or a substantial part thereof, or if a party makes an assignment for the benefit of creditors or if proceedings are instituted for the liquidation or winding-up of the business or assets of a party, then such acts shall be considered a default under this agreement. In such event, the non-defaulting party may, at its option, terminate this agreement upon providing notice in writing to the other party hereto. This agreement, once such notice is given, shall be terminated forthwith with no further obligation or liability other than for payment of any services that have, to that date, been performed by Travaly travel & hospitality LLP to the reasonable satisfaction of the Hotel ";
  	   	var line9=pdf.splitTextToSize(txt21,200);
  	   	pdf.text(line9,10,20);

  	   	var txt22='10. Duties and obligations of Travaly Travel & Hospitality LLP';
  	   	pdf.text(txt22,50,100);
  	   	var txt23=' 10.1 Travaly Travel & Hospitality LLP shall: Use its best efforts to market & promote Hotel and update information like photos, amenities, services, write up provided by Hotel. Travaly should do time to time communication related to reservation, invoice, tax, transfer fund, commission reports, cancellation & refund. ';
  	   	var line10=pdf.splitTextToSize(txt23,200);
  	   	pdf.text(line10,10,110);
  	   	var txt24='11. Duties and obligations of the Hotel';
  	   	pdf.text(txt24,80,130);
  	   	var txt24='11.1 The Hotel shall: Provide information relating to the Hotel photos, amenities, services, write up and the rooms available for reservation, details of the rates (including all applicable taxes, levies, surcharges and fees) and availability, cancellation and no-show policies and other policies and restrictions. 11.2 Time to time update inventory, rates, photos, guests review & rating. 11.3 Hotel should honor guests provide standard support as per Hotel Standard Operating Procedure. 11.4 Participant all events & activities carrying by Travaly like promotional activities, meetings, seminar, workshop, e-leaning, survey, & research. 11.5 Generate invoice to Travaly to receive remittance. 11.6 To ensure the user id’s log-in’s passwords, information about the extranet or any other log in authorization remain confidential. 11.7 To ensure only be used by authorized personnel’s. Any breach of this provision will entitle Travaly to delete this Agreement in its entirety. ';
  	   	var line11=pdf.splitTextToSize(txt24,200);
  	   	pdf.text(line11,10,140);
  	   	var txt25='12. Confidentiality';
  	   	pdf.text(txt25,80,190);
  	   	var txt26='12.1 The following constitutes the applicable party’s “confidential information”: this agreement together with the schedules attached hereto; any computer software or other technical information, technology, research, design, idea, process, procedure, or improvement, or any portion or phase thereof; information relating to any of the other party’s current or proposed products, services, methods, businesses or business plans, marketing, pricing, distribution and other business strategies; lists of, or any other information relating to, any of the other party’s customers, suppliers, dealers, agents or employees and such party’s relationship therewith; the material and documentation and any financial information relating to any of the foregoing. All disclosures of confidential information by one party to the other are made solely on a confidential basis and as trade secrets. Accordingly, each party shall maintain the confidentiality of all confidential information during the initial term and any renewal term and at all times thereafter, irrespective of the manner or method in which it is terminated. ';
  	   	var line12=pdf.splitTextToSize(txt26,200);
  	   	pdf.text(line11,10,200);
  	   	pdf.addPage();
  	   	var txt27='13. Limitation of liability';
  	   	pdf.text(txt27,80,10);
  	   	var txt28='13.1 Travaly Travel & Hospitality LLP, in providing services pursuant to this agreement, shall not be responsible or liable for any acts, errors, omissions, delays, missed connections, accidents losses, injuries, deaths, property damage, or any indirect or consequential damages resulting therefrom, which may be the result of action, inaction, default or insolvency of any airline, hotel, car supplier, other third party goods or service suppliers except in the case of negligence or misconduct by Travaly Travel & Hospitality LLP. Travaly Travel & Hospitality LLP does not give any representation or warranty with respect to any aspect of any third-party supplier’s services. In the event of a supplier’s default with respect to all or any part of such supplier’s services, the Hotel’s sole recourse shall be with the supplier, and shall be subject to said supplier’s own terms and conditions. 13.2 In no show and under no circumstances shall either party be liable for any indirect, incidental, consequential or special damages, including, without limitation, loss of revenue or loss of profits, for any reason whatsoever arising under this agreement, whether arising out of breach of warranty, breach of condition, breach of contract, tort, civil liability or otherwise. ';
  	   	var line13=pdf.splitTextToSize(txt28,200);
  	   	pdf.text(line13,10,20);
  	   	var txt29='14. Representations and warranties';
  	   	pdf.text(txt29,80,80);
  	   	var txt30='14.1 Each party hereby represents and warrants to that: 14.1.1 Each party has all required capacity and corporate authorization to enter into this agreement and be bound by the obligations provided hereunder; 14.1.2 The execution of this agreement by Travaly Travel & Hospitality LLP and the performance of its obligations hereunder will not constitute a violation or breach of any obligation of any agreement between Travaly Travel & Hospitality LLP and any third party or a violation of Travaly Travel & Hospitality LLP’s legal obligations; and 14.1.3 Travaly Travel & Hospitality LLP holds sufficient rights to use Hotel name, pictures, write up or resources used in the performance of the services under this agreement, free and clear of any encumbrances. ';
  	   	var line14=pdf.splitTextToSize(txt30,200);
  	   	pdf.text(line13,10,90);
  	   	var txt31='15. Verification';
  	   	pdf.text(txt31,80,150);
  	   	var txt32='In order to verify Hotel & to meet compliance of Travaly Travel & Hospitality LLP’s obligations hereunder, at any time or from time to time during performance of services, the Travaly Travel & Hospitality LLP or a representative designated by it and reasonably acceptable to Hotel, or regulatory agents, may, upon reasonable notice, inspect, physical visit, and test the manner in which the services are being performed. Such rights of inspection shall include visiting sites at which Hotel located, auditing selected records and databases containing data of the guests, observing the performance of the services or selected components thereof, and interviewing Hotel personnel familiar with, or responsible for, performing the services. Hotel shall cooperate with the Travaly Travel & Hospitality LLP personnel or representatives in such inspections, and shall ensure that appropriate staff, computing and other resources are available as required in the course of such inspections.';
  	   	var line14=pdf.splitTextToSize(txt32,200);
  	   	pdf.text(line14,10,160);
  	   	var txt33='16. Notice';
  	   	pdf.text(txt33,80,210);
  	   	var txt34='16.1 Any notice provided for or permitted in this agreement shall be in writing and will be deemed to have been given 7 days after having been mailed, postage pre-paid, by certified or registered mail or by recognized overnight delivery services, except in the case of a postal or other strike affecting the service used whereupon notice will be deemed to have been given 7 days after normal service resumes. 16.2 Where personal service is made or where delivery is made by facsimile and a receipt thereof has been retained, any notice provided for or permitted in this agreement will be deemed to have been given when received by the intended recipient. The intended recipient must be an individual whose personal name appears on the address set out in the notice. 16.3 Addressing and delivery is to be made as follows: ';
  	   	var line15=pdf.splitTextToSize(txt34,200);
  	   	pdf.text(line15,10,220);
  	   	var txt35='if to: ';
  	   	pdf.text(txt35,80,260);
  	   	var txt36='Travaly Travel & Hospitality LLP: Travaly Travel & Hospitality LLP #167, Panduranga Nagar, 1st Cross, Off Bannerghatta Road, Bengaluru-560076, Karnataka, India. Attention: Partner Management Department ';
  	   	var line16=pdf.splitTextToSize(txt36,200);
  	   	pdf.text(line16,10,270);
  	   	pdf.addPage();
  	   	pdf.text(txt35,80,10);
  	   	pdf.text('the Hotel ',10,20);
  	   	var txt37=document.getElementById('hotelname').value;
  	   	pdf.text(txt37,10,30);
  	   	var txt38=document.getElementById('hoteladdress').value;
  	   	pdf.text(txt38,10,40);
  	   	var txt39=' Attention: ';
  	   	pdf.text(txt39,10,50);
  	   	var txt40=document.getElementById('cname').value;
  	   	pdf.text(txt40,10,60);
  	   	var txt41=document.getElementById('ctitle').value;
  	   	pdf.text(txt41,10,70);
  	   	var txt42="As the case may be. 16.4 the parties may communicate other addresses where notice must be sent to from time to time. Such communication shall be in writing and shall have the effect of replacing the address under subsection 16.3. No change of address effected under this section shall in any way affect the operation of any term, other than the delivery address of subsection 17.3, in this agreement.";
  	   	var line17=pdf.splitTextToSize(txt42,200);
  	   	pdf.text(line17,10,80);
  	   	var txt43='17. Remedies';
  	   	pdf.text(txt43,80,100);
  	   	var txt44='17.1 Hotel acknowledges that any violation of the terms of this agreement would result in damages to Travaly Travel & Hospitality LLP which could not be adequately compensated by monetary award alone. In the event of any violation by Hotel of the terms of this agreement, including, without limitation, of the Travaly’s proprietary rights and ownership, and confidentiality provisions, and in addition to all other remedies available at law and at equity, the Travaly Travel shall be entitled as a matter of right to apply to a court of competent equitable jurisdiction for relief, waiver, restraining order, injunction, decree or other remedy as may be appropriate to ensure compliance of Travaly Travel & Hospitality LLP with the terms of this agreement.';
  	   	var line17=pdf.splitTextToSize(txt44,200);
  	   	pdf.text(line17,10,110);
  	   	var txt45='18. General provisions';
  	   	pdf.text(txt45,80,150);
  	   	var txt46='Entire agreement & amendments This agreement together with the schedules hereto constitutes the entire agreement and understanding between the parties relating to the subject matter hereof, and supersedes all other agreements, oral or written, made between the parties with respect to such subject matter. Except as provided herein, this agreement may not be amended or modified in any way except by a written instrument signed by both parties. ';
  	   	var line18=pdf.splitTextToSize(txt46,200);
  	   	pdf.text(line17,10,160);
  	   	var txt47='18.1 Assignment';
  	   	pdf.text(txt47,80,200);
  	   	var txt48='Neither party shall assign this agreement or any of its rights or obligations hereunder without prior written consent of the other party, which consent may be withheld at the other party’s discretion. ';
  	   	var line18=pdf.splitTextToSize(txt48,200);
  	   	pdf.text(line18,10,210);
  	   	var txt49='18.2 Incorporated by reference';
  	   	pdf.text(txt49,80,230);
  	   	var txt50='The preamble and all attachments, schedules and exhibits attached hereto are hereby incorporated by reference and made a part of this agreement. ';
  	   	var line19=pdf.splitTextToSize(txt50,200);
  	   	pdf.text(line19,10,240);
  	   	var txt51='18.3 Applicable law';
  	   	pdf.text(txt51,80,260);
  	   	var txt52="This agreement shall be governed by and interpreted in accordance with the laws of the national & International, without reference to its conflict of law provisions, and the laws of country applicable therein. All disputes arising under this agreement will be referred to the courts of the state, National & International which will have jurisdiction, and each party hereto irrevocably submits to the jurisdiction of such courts.";
  	   	var line20=pdf.splitTextToSize(txt50,200);
  	   	pdf.text(line20,10,270);
  	   	pdf.addPage();
  	   	var txt53="18.4 Currency";
  	   	pdf.text(txt53,80,10);
  	   	var txt54="All references to monetary amounts in this agreement shall be to respective country’s currency. ";
  	   	var line21=pdf.splitTextToSize(txt54,200);
  	   	pdf.text(line21,10,20);
  	   	var txt55="18.5 Non-solicitation";
  	   	pdf.text(txt55,80,30);
  	   	var txt56='Unless given prior written consent by the parties, which consent may require a payment to the party, each party agrees that it will not, during the initial term, knowingly solicit or hire any employee of the other party who is directly involved in providing the services herein.';
  	   	var line22=pdf.splitTextToSize(txt56,200);
  	   	pdf.text(line22,10,40);
  	   	var txt57='18.6 Survival';
  	   	pdf.text(txt57,80,60);
  	   	var txt58='Sections 9, 12, 13, 14, 15, 17 and 18 and subsections 19.6 and 19.7 and will survive the expiration or termination of this agreement.';
  	   	var line23=pdf.splitTextToSize(txt58,200);
  	   	pdf.text(line23,10,80);
  	   	var txt59='18.7 Absence of presumption';
  	   	pdf.text(txt59,80,100);
  	   	var txt60='No presumption shall operate in favor of or against any party hereto as a result of any responsibility that any party may have had for drafting this agreement. ';
  	   	var line24=pdf.splitTextToSize(txt60,200);
  	   	pdf.text(line24,10,110);
  	   	var txt61='18.8 Language clause';
  	   	pdf.text(txt61,80,130);
  	   	var txt62='It is hereby agreed that both parties specifically require that this agreement and any notices, consents, authorizations, communications and approvals be drawn up in the English language. ';
  	   	var line25=pdf.splitTextToSize(txt62,200);
  	   	pdf.text(line25,10,140);
  	   	var txt63='18.9 Interpretation';
  	   	pdf.text(txt63,80,160);
  	   	var txt64="The headings and section numbers appearing in this agreement or any schedule attached hereto are inserted for convenience of reference only and shall not in any way affect the construction or interpretation of this agreement. For the purposes of this agreement a “day” means any day other than a Saturday, Sunday or other day on which Travaly Travel & Hospitality LLP is not open for business during its regular business hours at its head office. ";
  	   	var line25=pdf.splitTextToSize(txt64,200);
  	   	pdf.text(line25,10,170);
  	   	var txt65="18.10 Severability";
  	   	pdf.text(txt65,80,190);
  	   	var txt66="If for any reason whatsoever, any term or condition of this agreement or the application thereof to any party or circumstance is, to any extent, invalid or unenforceable, all other terms and conditions of this agreement and/or the application of such terms and conditions to the parties or circumstances shall not be affected thereby and shall be separately valid and enforceable to the fullest extent permitted by law. ";
  	   	var line26=pdf.splitTextToSize(txt66,200);
  	   	pdf.text(line26,10,200);
  	   	var txt67="18.11 Force majeure";
  	   	pdf.text(txt67,80,230);
  	   	var txt68="In the event that any party hereto is delayed or hindered in the performance of any act required herein by reason of strike, inability to procure materials, failure of power, restrictive governmental law or regulations, riots, insurrection, war or other reasons of a like nature not the fault of such party, then performance of such act shall be excused for the period of the delay and the period of performance of any such act shall be extended for a period equivalent to the period of such delay, up to a maximum of 30 Days. The provisions of this force majeure clause shall not operate to excuse any party from the payment of any fee or other payment when due. ";
  	   	var line27=pdf.splitTextToSize(txt68,200);
  	   	pdf.text(line27,10,240);
  	   	pdf.addPage();
  	   	var txt69="18.12 Waiver";
  	   	pdf.text(txt69,80,10);
  	   	var txt70="No waiver by either party of any obligation, restriction or remedy under this agreement shall be valid unless by specific written instrument. No acceptance by a party of any payment by another party and no failure, refusal or neglect of any party to exercise any right under this agreement or to insist upon full compliance by the other party with its obligations hereunder, shall constitute a waiver of any other provision of this agreement or any further or subsequent non-compliance with the same or any other provision. ";
  	   	var line28=pdf.splitTextToSize(txt70,200);
  	   	pdf.text(line28,10,20);
  	   	var txt71="18.13 Further assurances";
  	   	pdf.text(txt71,80,50);
  	   	var txt72="Each of the parties hereto hereby covenants and agrees to execute and deliver such further and other agreements, assurances, undertakings, acknowledgments or documents, and other acts and things as may be necessary or desirable in order to give full effect to this agreement and every part hereof. ";
  	   	var line29=pdf.splitTextToSize(txt72,200);
  	   	pdf.text(line29,10,60);
  	   	var txt73="18.14 Binding nature";
  	   	pdf.text(txt73,80,80);
  	   	var txt74="This agreement shall inure to the benefit of and be binding upon the parties hereto and their respective (as applicable) successors and assigns. 18.15 Time of the essence Subject to section 19.13 hereof, time shall be of the essence of this agreement and of each and every part hereof. ";
  	   	var line30=pdf.splitTextToSize(txt74,200);
  	   	pdf.text(line30,10,90);
  	   	var txt75="Counterparts";
  	   	pdf.text(txt75,80,110);
  	   	var txt76="This agreement may be signed in counterparts, and by use of facsimile signatures, each of which when signed and delivered shall be deemed to be an original, but all such counterparts shall together constitute one and the same instrument. In witness whereof, each party to this agreement has caused it to be executed at [place of execution] on the date indicated above. ";
  	   	var line30=pdf.splitTextToSize(txt76,200);
  	   	pdf.text(line30,10,120);
  	   	var txt77="First party";
  	   	pdf.text(txt77,80,140);
  	   	var imgdata='data:image/jpeg;base64,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';
  	   	pdf.addImage(imgdata,'JPEG',80,150,20,20);

  	   	var txt80="authorised stamp and signature ";
  	   	pdf.text(txt80,60,180);
  	   	var txt81="Second party ";
  	   	pdf.text(txt81,80,190);
  	   	var txt82=document.getElementById('sign').value;
  	   	pdf.text(txt82,80,200);
  	   	var txt83=document.getElementById('endname').value;
  	   	pdf.text(txt83,80,210);
  	   	var txt84=document.getElementById('endtitle').value;
  	   	pdf.text(txt84,80,220);
  	   	var d=pdf.save('agreementdetails.pdf');
  	   	
  	    


  	}
	</script>
</head>
<body>
	<div align="center"  class="mt-5">
	<div id="div1" class=" h-25" style="color: black;width:50%;background-color: #C0C0C0;" >
		

			<h2  id="1" style="color: red;">MYTRAVALY AGREEMENT</h2>
		<br>
		
			<p style="width: 50%;font-size: 18px;">
				<p id="2">The Hotel agreement:  
				This hotel agreement (the “agreement”) is effective ,</p> <input type="date" id ="dateid" name="dateid"><p id="3">
				Between:	Travaly Travel & Hospitality LLP ( "Travaly"), a company is incorporated of the Limited Liability Partnership Act, 2008, CIN:  AAK-5336, with its head office located at:
				#171, Panduranga Nagar, 1st Cross, Off Bannerghatta Road, Bengaluru-560076, Karnataka, India.
				Which expression shall include its executors, administrators, affiliates, subsidiaries, group companies, successors-in-interest/office and permitted assigns.


				And:	</p> <br><input type="text" id="hotel" name="hotel" placeholder="hotel name"><br> (the "Hotel"), a company organized and existing under the laws of the 
				of <br><input type="text" name="state" id="state" placeholder="state"><br>, with its head office located at <br><input type="text" name="address" id="address" placeholder="address"><br></p>
				<h3>Preamble</h3>

				WHEREAS TRAVALY TRAVEL & HOSPITALITY LLP IS IN THE BUSINESS OF E-COMMERCE PORTAL UNDER THE BRAND NAME OF TRAVALY ON THE URL: www.mytravaly.com. 
				Whereas the Hotel is in the business executing, running & maintaining Hotels.   
				Whereas the Hotel wishes to obtain such services exclusively from Travaly Travel & Hospitality LLP and Travaly Travel & Hospitality LLP wishes to be the exclusive provider thereof to the Hotel, subject to the terms and conditions of this agreement;
				Now therefore in consideration of the mutual promises and covenants contained in this agreement and other good and valuable consideration, the receipt and sufficiency of which are hereby acknowledged, the parties agree as follows:
				<h3>1.	Definitions</h3>
				<p>
					1.	Definitions
					In this agreement, except where the context or subject matter is inconsistent therewith, the following terms shall have the following meanings:
					1.1	“agreement” shall mean this document and the annexed schedules which are incorporated herein together with any future written and executed amendments.
					1.2	“associated staff” shall mean any officer, director, employee, agent, or student of the parties, and any other person involved in the execution of this agreement.
					1.3	“documentation” shall mean all documents, regardless of form, relating to the services.
					1.4	“material” shall mean any and all information and materials, relating to a party’s business, given to the other party from time to time for review, data processing, or for any other reason, and all copies thereof regardless of form or storage medium, including, but not limited to, documentation, notes, formulae, components, drawings, data, flow-charts, plans, specifications, techniques, processes, algorithms, inventions, prototypes, protocols, patent portfolio, pre-clinical and clinical studies, contracts, marketing and other financial and business plans, business processes and methods of doing business and includes all confidential and proprietary information which is at any time so designated by either party, either in writing or orally.
				</p>

				<h3>2.	Schedules</h3>
				<p>

					2.1	The following schedules are attached hereto and are hereby incorporated by reference and made part of this agreement:
					2.1.1	Schedule “A” - Fees & payment
					2.1.2	Schedule “B”-  Cancellations, refunds policies
					2.1.3	Schedule “C”-  Rooms, Tariff, Tax & inventory details
					2.1.4	Schedule “D”- Hotel Information 

				</p>
				<h3>3.	Subject/scope of agreement</h3>
				<p>
					Travaly Travel & Hospitality LLP will provide the services described in schedule “a”, attached hereto (the “services”), to the client according to the terms and conditions of this agreement. Travaly Travel & Hospitality LLP will use its best efforts, skill and ability in performing the services under this agreement.
				</p>
				<h3>4.	Relationship of the parties</h3>
				<p>
					As Travaly Travel & Hospitality LLP is undertaking to perform services for the Hotel, and is doing so as an independent contractor and not as an employee, agent, partner, or joint venture of the Hotel, Travaly Travel & Hospitality LLP’s fees will be limited to those stated in schedule “b” to this agreement. Travaly Travel & Hospitality LLP will not participate in any of the client’s employee benefit plans nor receive any other compensation beyond that stated in such schedule “b”, a copy of which has been appended hereto and initialed by the parties for identification. Travaly Travel & Hospitality LLP will not have any power or authority to bind the Hotel or to assume or create any obligation or responsibility, express or implied, on the Hotel’s behalf or in the Hotel’s name, and Travaly Travel & Hospitality LLP will not represent to any person or entity that Travaly Travel & Hospitality LLP has such power or authority.
				</p>
				<h3>5.	Travaly Travel & Hospitality LLP’s status</h3>
				<p>
					Travaly Travel & Hospitality LLP is an independent contractor. The Hotel is not responsible for verifying the existence or sufficiency of the qualifications, authorizations, permits or licenses of Travaly Travel & Hospitality LLP and/or Travaly Travel & Hospitality LLP’s employees. Hotel represents and warrants that Travaly Travel & Hospitality LLP and any employees of Travaly Travel & Hospitality LLP are authorized to work and are not acting and will not act during the term of this agreement in violation of any applicable laws and the regulations thereunder or any agreement it has entered into with a third party. The parties will indemnify each other against any and all claims, damages, losses and other liabilities including, but not limited to, fines, penalties and/or attorneys’ fees incurred by the parties and/or either party’s employees or agents are not authorized to perform all or part of the services.
				</p>
				<h3>6.	Fees and expenses & Payment</h3>
				<p>
					6.1	The fees and payment for Travaly Travel & Hospitality LLP’s services shall be as specified in schedule “b”, attached hereto.
					6.2	Travaly Travel & Hospitality LLP will pay Hotel the net room rates for all reservations. In the case of a customer dispute, discrepancy or audit by legal authorities, hotel shall produce evidence of guest occupancy.  Travaly Travel & Hospitality LLP shall collect the payment for room charges from the customer at the time of booking and shall pass the booking amount to the hotel, prior to the guest check-out. All additional and miscellaneous services availed by the guest during the stay to be charged directly to the guest. In case of booking made within 48 hours of check in time hotel will give Travaly Travel & Hospitality LLP  3 (three) working days to process the payment.

				</p>
				<h3>7.	Inventory & Tariff </h3>
				<p>
					The Hotel has committed to the Travaly Travel & Hospitality LLP a base fare of room allotment on daily basis. The Hotel will be provided with a login & password for Travaly Travel & Hospitality LLP’s hotel Extranet to control rates & inventory of the Hotel on the Travaly’s website. Information related to this agreement is strictly confidential and must not be disclosed to any third parties. 
				</p>
				<h3>8.	Term</h3>
				<p>
					8.1	This agreement will come into force as of the effective date and will expire on 1 year (the “initial term”) unless extended by the parties in writing or otherwise terminated by the parties in accordance with the terms of this agreement subject to earlier termination according to section 9, hereof.
					8.2	At the end of the initial term, this agreement will be automatically renewed for successive 5 years’ terms (a “renewal term”) unless either party provides written notice to the other party of its desire to terminate this agreement in accordance herewith.

				</p>
				<h3>9.	Termination</h3>
				<p>
					9.1	Both parties shall have the right to terminate or cancel all or part of the services contemplated by this agreement or any request for services on any specific task at any time by giving 30 working days prior written notice of its intent to so terminate or cancel. 
					9.2	Travaly reserves the right to terminate this agreement with immediate effect in the event of any material or other breach of the provision of this agreement by hotel including without limitation on the hotel's inability to offer inventory, inventory and rate parity not being maintained by the hotel, failure to issue invoices to company, bankruptcy or winding up proceedings against the hotel, change of control of the hotel or multiple escalations from customers against the hotel i.e., customer satisfaction index. Hotel shall immediately intimate company of any change of control. 
					9.3	If either party becomes bankrupt or insolvent or if a petition or other proceeding is filed by or against a party for re-organization, arrangement or relief under any law relating to bankruptcy or insolvency, or if a receiver is appointed in respect of a party’s property and assets or a substantial part thereof, or if a party makes an assignment for the benefit of creditors or if proceedings are instituted for the liquidation or winding-up of the business or assets of a party, then such acts shall be considered a default under this agreement. In such event, the non-defaulting party may, at its option, terminate this agreement upon providing notice in writing to the other party hereto. This agreement, once such notice is given, shall be terminated forthwith with no further obligation or liability other than for payment of any services that have, to that date, been performed by Travaly travel & hospitality LLP to the reasonable satisfaction of the Hotel

					
				</p>
				<h3>10.	Duties and obligations of Travaly Travel & Hospitality LLP</h3>
				<p>
					10.1	Travaly Travel & Hospitality LLP shall:
					Use its best efforts to market & promote Hotel and update information like photos, amenities, services, write up provided by Hotel. Travaly should do time to time communication related to reservation, invoice, tax, transfer fund, commission reports, cancellation & refund. 

				</p>
				<h3>11.	Duties and obligations of the Hotel</h3>
				<p>
					11.1	The Hotel shall:
					Provide information relating to the Hotel photos, amenities, services, write up and the rooms available for reservation, details of the rates (including all applicable taxes, levies, surcharges and fees) and availability, cancellation and no-show policies and other policies and restrictions.
					11.2	Time to time update inventory, rates, photos, guests review & rating. 
					11.3	Hotel should honor guests provide standard support as per Hotel Standard Operating Procedure. 
					11.4	Participant all events & activities carrying by Travaly like promotional activities, meetings, seminar, workshop, e-leaning, survey, & research.
					11.5	Generate invoice to Travaly to receive remittance.
					11.6	To ensure the user id’s log-in’s passwords, information about the extranet or any other log in authorization remain confidential. 
					11.7	To ensure only be used by authorized personnel’s. Any breach of this provision will entitle Travaly to delete this Agreement in its entirety.    

				</p>
				<h3>12.	Confidentiality</h3>
				<p>
					12.1 The following constitutes the applicable party’s “confidential information”: this agreement together with the schedules attached hereto; any computer software or other technical information, technology, research, design, idea, process, procedure, or improvement, or any portion or phase thereof; information relating to any of the other party’s current or proposed products, services, methods, businesses or business plans, marketing, pricing, distribution and other business strategies; lists of, or any other information relating to, any of the other party’s customers, suppliers, dealers, agents or employees and such party’s relationship therewith; the material and documentation and any financial information relating to any of the foregoing. All disclosures of confidential information by one party to the other are made solely on a confidential basis and as trade secrets. Accordingly, each party shall maintain the confidentiality of all confidential information during the initial term and any renewal term and at all times thereafter, irrespective of the manner or method in which it is terminated.
				</p>
				<h3>13.	Limitation of liability</h3>
				<p id='limit'>
					13.1	Travaly Travel & Hospitality LLP, in providing services pursuant to this agreement, shall not be responsible or liable for any acts, errors, omissions, delays, missed connections, accidents losses, injuries, deaths, property damage, or any indirect or consequential damages resulting therefrom, which may be the result of action, inaction, default or insolvency of any airline, hotel, car supplier, other third party goods or service suppliers except in the case of negligence or misconduct by Travaly Travel & Hospitality LLP. Travaly Travel & Hospitality LLP does not give any representation or warranty with respect to any aspect of any third-party supplier’s services. In the event of a supplier’s default with respect to all or any part of such supplier’s services, the Hotel’s sole recourse shall be with the supplier, and shall be subject to said supplier’s own terms and conditions. 
					13.2 In no show and under no circumstances shall either party be liable for any indirect, incidental, consequential or special damages, including, without limitation, loss of revenue or loss of profits, for any reason whatsoever arising under this agreement, whether arising out of breach of warranty, breach of condition, breach of contract, tort, civil liability or otherwise.

				</p>
				<h3>14.	Representations and warranties</h3>
				<p>
					14.1	Each party hereby represents and warrants to that: 
					14.1.1 Each party has all required capacity and corporate authorization to enter into this agreement and be bound by the obligations provided hereunder;
					14.1.2 The execution of this agreement by Travaly Travel & Hospitality LLP and the performance of its obligations hereunder will not constitute a violation or breach of any obligation of any agreement between Travaly Travel & Hospitality LLP and any third party or a violation of Travaly Travel & Hospitality LLP’s legal obligations; and
					14.1.3 Travaly Travel & Hospitality LLP holds sufficient rights to use Hotel name, pictures, write up or resources used in the performance of the services under this agreement, free and clear of any encumbrances. 

				</p>
				<h3>15.	Verification</h3>
				<p>
					In order to verify Hotel & to meet compliance of Travaly Travel & Hospitality LLP’s obligations hereunder, at any time or from time to time during performance of services, the Travaly Travel & Hospitality LLP or a representative designated by it and reasonably acceptable to Hotel, or regulatory agents, may, upon reasonable notice, inspect, physical visit, and test the manner in which the services are being performed. Such rights of inspection shall include visiting sites at which Hotel located, auditing selected records and databases containing data of the guests, observing the performance of the services or selected components thereof, and interviewing Hotel personnel familiar with, or responsible for, performing the services. Hotel shall cooperate with the Travaly Travel & Hospitality LLP personnel or representatives in such inspections, and shall ensure that appropriate staff, computing and other resources are available as required in the course of such inspections.
				</p>
				<h3>16.	Notice</h3>
				<p>
					16.1 Any notice provided for or permitted in this agreement shall be in writing and will be deemed to have been given 7 days after having been mailed, postage pre-paid, by certified or registered mail or by recognized overnight delivery services, except in the case of a postal or other strike affecting the service used whereupon notice will be deemed to have been given 7 days after normal service resumes.
					16.2 Where personal service is made or where delivery is made by facsimile and a receipt thereof has been retained, any notice provided for or permitted in this agreement will be deemed to have been given when received by the intended recipient. The intended recipient must be an individual whose personal name appears on the address set out in the notice.
					16.3 Addressing and delivery is to be made as follows:
					<h4>if to: </h4>
					Travaly Travel & Hospitality LLP:
						Travaly Travel & Hospitality LLP
						#167, Panduranga Nagar, 1st Cross, Off Bannerghatta Road, 
						Bengaluru-560076, Karnataka, India. 
						Attention: Partner Management Department   
					<h4>if to : </h4>
					the Hotel <br>
					<input type="text" name="hotelname" id="hotelname" placeholder="hotelname"><br>
					<input type="text" name="hoteladdress" id="hoteladdress" placeholder="address"><br>

					Attention:	<br><input type="text" id="cname" name="cname" placeholder="name"><br>
					<input type="text" name="title" name="ctitle" id="ctitle" placeholder="title">
					<br>
					As the case may be.
					16.4 the parties may communicate other addresses where notice must be sent to from time to time. Such communication shall be in writing and shall have the effect of replacing the address under subsection 16.3. No change of address effected under this section shall in any way affect the operation of any term, other than the delivery address of subsection 17.3, in this agreement.




				</p>

				<h3>17.	Remedies</h3>
				<span id="remedies">17.1 Hotel acknowledges that any violation of the terms of this agreement would result in damages to Travaly Travel & Hospitality LLP which could not be adequately compensated by monetary award alone. In the event of any violation by Hotel of the terms of this agreement, including, without limitation, of the Travaly’s proprietary rights and ownership, and confidentiality provisions, and in addition to all other remedies available at law and at equity, the Travaly Travel shall be entitled as a matter of right to apply to a court of competent equitable jurisdiction for relief, waiver, restraining order, injunction, decree or other remedy as may be appropriate to ensure compliance of Travaly Travel & Hospitality LLP with the terms of this agreement.
				</span>

				<h3 id="general ">18.	General provisions</h3>
					Entire agreement & amendments
					This agreement together with the schedules hereto constitutes the entire agreement and understanding between the parties relating to the subject matter hereof, and supersedes all other agreements, oral or written, made between the parties with respect to such subject matter. Except as provided herein, this agreement may not be amended or modified in any way except by a written instrument signed by both parties.
					<h4>18.1	Assignment</h4>
					Neither party shall assign this agreement or any of its rights or obligations hereunder without prior written consent of the other party, which consent may be withheld at the other party’s discretion.
					<h4>18.2	Incorporated by reference</h4>
					The preamble and all attachments, schedules and exhibits attached hereto are hereby incorporated by reference and made a part of this agreement. 
					<h4>18.3	Applicable law</h4>
					This agreement shall be governed by and interpreted in accordance with the laws of the national & International, without reference to its conflict of law provisions, and the laws of country applicable therein. All disputes arising under this agreement will be referred to the courts of the state, National & International which will have jurisdiction, and each party hereto irrevocably submits to the jurisdiction of such courts.
					<h4>18.4	Currency</h4>
					All references to monetary amounts in this agreement shall be to respective country’s currency.
					<h4>18.5	Non-solicitation</h4>
					Unless given prior written consent by the parties, which consent may require a payment to the party, each party agrees that it will not, during the initial term, knowingly solicit or hire any employee of the other party who is directly involved in providing the services herein.
					<h4>18.6	Survival</h4>
					Sections 9, 12, 13, 14, 15, 17 and 18 and subsections 19.6 and 19.7 and will survive the expiration or termination of this agreement.
					<h4>18.7	Absence of presumption</h4>
					No presumption shall operate in favor of or against any party hereto as a result of any responsibility that any party may have had for drafting this agreement.
					<h4>18.8	Language clause</h4>
					It is hereby agreed that both parties specifically require that this agreement and any notices, consents, authorizations, communications and approvals be drawn up in the English language.
					<h4>18.9	Interpretation</h4>
					The headings and section numbers appearing in this agreement or any schedule attached hereto are inserted for convenience of reference only and shall not in any way affect the construction or interpretation of this agreement. For the purposes of this agreement a “day” means any day other than a Saturday, Sunday or other day on which Travaly Travel & Hospitality LLP is not open for business during its regular business hours at its head office.
					<h4>18.10 Severability</h4>
					If for any reason whatsoever, any term or condition of this agreement or the application thereof to any party or circumstance is, to any extent, invalid or unenforceable, all other terms and conditions of this agreement and/or the application of such terms and conditions to the parties or circumstances shall not be affected thereby and shall be separately valid and enforceable to the fullest extent permitted by law.
					<h4>18.11 Force majeure</h4>
					In the event that any party hereto is delayed or hindered in the performance of any act required herein by reason of strike, inability to procure materials, failure of power, restrictive governmental law or regulations, riots, insurrection, war or other reasons of a like nature not the fault of such party, then performance of such act shall be excused for the period of the delay and the period of performance of any such act shall be extended for a period equivalent to the period of such delay, up to a maximum of 30 Days. The provisions of this force majeure clause shall not operate to excuse any party from the payment of any fee or other payment when due.
					<h4>18.12 Waiver</h4>
					No waiver by either party of any obligation, restriction or remedy under this agreement shall be valid unless by specific written instrument. No acceptance by a party of any payment by another party and no failure, refusal or neglect of any party to exercise any right under this agreement or to insist upon full compliance by the other party with its obligations hereunder, shall constitute a waiver of any other provision of this agreement or any further or subsequent non-compliance with the same or any other provision.
					<h4>18.13 Further assurances</h4>
					Each of the parties hereto hereby covenants and agrees to execute and deliver such further and other agreements, assurances, undertakings, acknowledgments or documents, and other acts and things as may be necessary or desirable in order to give full effect to this agreement and every part hereof.
					<h4>18.14 Binding nature</h4>
					
					This agreement shall inure to the benefit of and be binding upon the parties hereto and their respective (as applicable) successors and assigns.
					18.15 Time of the essence
					Subject to section 19.13 hereof, time shall be of the essence of this agreement and of each and every part hereof.


				</p>

				<h3>Counterparts</h3>
				<p>
					This agreement may be signed in counterparts, and by use of facsimile signatures, each of which when signed and delivered shall be deemed to be an original, but all such counterparts shall together constitute one and the same instrument.
					In witness whereof, each party to this agreement has caused it to be executed at [place of execution] on the date indicated above.

				</p>
				
				

				First party<br>
				<center>
				<img src="img/seal.jpg" alt="Seal" id="seal" name="seal" height="100" width="100"/><br>
				<i>authorised stamp and signature</i>
				
				<br>

				Second party
				<br>
				<input type="text" id="sign" name="id" placeholder="Signature"><br><br>
				<input type="text"  id="endname" name="endname" placeholder="Name"><br><br>
				<input type="text"  id="endtitle" name="endtitle" placeholder="Title">
				<br>
				<br>
				</center>

				




					<button   onclick="onnClick();" value="download" class="btn btn-success col-lg-2">download</button>
					
					&emsp;

					<input type="button" name="" value="save" class="btn btn-success col-lg-2" onclick="pageprint();">





	</div>
</div>

			
					
			

				
			 
			
		<br/>


</body>
</html>
		