<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
	<style>
	#div_view{
  background-color: lightblue;
  width: 70%;
  height: 90%;
  overflow: scroll;
}
</style>
</head>
<body >
<form action="agreement.php" method="post">
	<div align="center"> 
	<div id="div_view">
		<div align="justify" style="padding-left: 15px;padding-top: 15px;padding-bottom: 15px">
		<div style="width:95%;padding-left: 50px;" >
			<center><h2>MYTRAVALY AGREEMENT</h2></center>
			<br><br>
			<div > <p style="text-align: left;">
				<h3>The Hotel agreement:</h3>
				This hotel agreement (the “agreement”) is effective ,<b><?php echo "dd/mm/yyyy"; ?></b>
				<br><br><table>
					<tr style="padding-bottom:20px;"><td style="width:10%;" >Between:</td>
						<td style="border-left: solid 2px;padding-left: 20px;padding-bottom:20px;"> 
							<b><u>Travaly Travel & Hospitality LLP ( "Travaly")</u></b>, a company is incorporated of the Limited Liability Partnership Act, 2008, CIN:  AAK-5336, with its head office located at:
							<br>
							#171, Panduranga Nagar, 1st Cross, Off Bannerghatta Road, Bengaluru-560076, Karnataka, India.
							<br>
						Which expression shall include its executors, administrators, affiliates, subsidiaries, group companies, successors-in-interest/office and permitted assigns</td>
					</tr>
					<tr style="border-top: solid 1px;">
						<td style="width:10%;padding-top: 20px">And:</td>
						<td style="border-left:solid  2px;padding-left: 20px;padding-top: 20px"><b><input type="text" name="Hotel_name" placeholder="Hotel Name" required /></b> (the "Hotel"), a company organized and existing under the laws of the 
				of <input type="text" name="state_name" placeholder="State Name" required="" /> , with its head office located at <textarea name="head_office_address" rows=2 cols=40></textarea>
			</td>
					</tr>
				</table>
				</p>
					  </div>
			 <p style="text-align: left;"><h3>Preamble</h3>

				WHEREAS TRAVALY TRAVEL & HOSPITALITY LLP IS IN THE BUSINESS OF E-COMMERCE PORTAL UNDER THE BRAND NAME OF TRAVALY ON THE URL: www.mytravaly.com. Whereas the Hotel is in the business executing, running & maintaining Hotels. Whereas the Hotel wishes to obtain such services exclusively from Travaly Travel & Hospitality LLP and Travaly Travel & Hospitality LLP wishes to be the exclusive provider thereof to the Hotel, subject to the terms and conditions of this agreement; Now therefore in consideration of the mutual promises and covenants contained in this agreement and other good and valuable consideration, the receipt and sufficiency of which are hereby acknowledged, the parties agree as follows:
				
				</p>
			
			
				<ol>
					<p id="p1"><h4><li> Definitions</h4>
					<ol>	
					Definitions	In this agreement, except where the context or subject matter is inconsistent therewith, the following terms shall have the following meanings:
					<li> “agreement” shall mean this document and the annexed schedules which are incorporated herein together with any future written and executed amendments.</li>
					<li> “associated staff” shall mean any officer, director, employee, agent, or student of the parties, and any other person involved in the execution of this agreement.</li>
					<li> “documentation” shall mean all documents, regardless of form, relating to the services.</li>
					<li> “material” shall mean any and all information and materials, relating to a party’s business, given to the other party from time to time for review, data processing, or for any other reason, and all copies thereof regardless of form or storage medium, including, but not limited to, documentation, notes, formulae, components, drawings, data, flow-charts, plans, specifications, techniques, processes, algorithms, inventions, prototypes, protocols, patent portfolio, pre-clinical and clinical studies, contracts, marketing and other financial and business plans, business processes and methods of doing business and includes all confidential and proprietary information which is at any time so designated by either party, either in writing or orally.</li>
				</ol>
				</p></li>
				<p id="p2"><h4><li> Schedules</h4>
					<ol><li>	The following schedules are attached hereto and are hereby incorporated by reference and made part of this agreement:
					<ul style=" list-style-type: disc ;"><li> Schedule “A” - Fees & payment </li>
						<li> Schedule “B”- Cancellations, refunds policies</li>
						<li> Schedule “D”- Hotel Information </li>
					</ul>
				</li>
			</ol>
		</li>
	
		</p>
		<p id="p3"><h4><li> Subject/Scope of agreement</h4>
				Travaly Travel & Hospitality LLP will provide the services described in schedule “a”, attached hereto (the “services”), to the client according to the terms and conditions of this agreement. Travaly Travel & Hospitality LLP will use its best efforts, skill and ability in performing the services under this agreement.
			</li>
		</p>
		<p id="p4"><h4><li> Relationship of the parties</h4>
				As Travaly Travel & Hospitality LLP is undertaking to perform services for the Hotel, and is doing so as an independent contractor and not as an employee, agent, partner, or joint venture of the Hotel,Travaly Travel & Hospitality LLP’s fees will be limited to those stated in schedule “b” to this agreement. Travaly Travel & Hospitality LLP will not participate in any of the client’s employee benefit plans norreceive any other compensation beyond that stated in such schedule “b”, a copy of which has been appended hereto and initialed by the parties for identification. Travaly Travel & Hospitality LLP willnot have any power or authority to bind the Hotel or to assume or create any obligation or responsibility, express or implied, on the Hotel’s behalf or in the Hotel’s name, and Travaly Travel & Hospitality LLP will not represent to any person or entity that Travaly Travel & Hospitality LLP has such power or authority.
			</li>
		</p>
		<p id="p5"><h4><li>	Travaly Travel & Hospitality LLP’s status </h4>
				Travaly Travel & Hospitality LLP is an independent contractor. The Hotel is not responsible for verifying the existence or sufficiency of the qualifications, authorizations, permits or licenses ofTravaly Travel & Hospitality LLP and/or Travaly Travel & Hospitality LLP’s employees. Hotel represents and warrants that Travaly Travel & Hospitality LLP and any employees of Travaly Travel & Hospitality LLP are authorized to work and are not acting and will not act during the term of this agreement in violation of any applicable laws and the regulations thereunder or anyagreement it has entered into with a third party. The parties will indemnify each other against any and all claims, damages, losses and other liabilities including, but not limited to, fines, penaltiesand/or attorneys’ fees incurred by the parties and/or either party’s employees or agents are not authorized to perform all or part of the services.
			</li>
		</p>
		<p id="p6"><h4><li> Fees and expenses& Payment</h4>
				<ol>
					<li> The fees and payment for Travaly Travel & Hospitality LLP’s services shall be as specified in schedule “b”, attached hereto.</li>
					<li> Travaly Travel & HospitalityLLP will pay Hotel the net room rates for all reservations. In the case of a customer dispute, discrepancy or audit by legal authorities, hotel shall produce evidence of guest occupancy.  Travaly Travel & HospitalityLLP shall collect the payment for room charges from the customer at the time of booking and shall pass the booking amount to the hotel, prior to the guest check-out. All additional and miscellaneous services availed by the guest during the stay to be charged directly to the guest. In case of booking made within 48 hours of check in time hotel will give Travaly Travel & HospitalityLLP 3 (three) working days to process the payment.</li>
				</ol>
			</li>
		</p>
		<p id="p7"><h4><li>	Inventory & Tariff </h4>
					The Hotel has committed to the Travaly Travel & Hospitality LLP a base fare of room allotment on daily basis. The Hotel will be provided with a login & password for Travaly Travel & Hospitality LLP’s hotel Extranet to control rates & inventory of the Hotel on the Travaly’s website. Information related to this agreement is strictly confidential and must not be disclosed to any third parties. 
				</li>
			</p>
		<p id="p8"><h4><li>	Term</h4>
				<ol><li>	This agreement will come into force as of the effective date and will expire on 1 year (the “initial term”) unless extended by the parties in writing or otherwise terminated by the parties inaccordance with the terms of this agreement subject to earlier termination according to section 9, hereof.</li>
				<li>	At the end of the initial term, this agreement will be automatically renewed for successive 5years’ terms (a “renewal term”) unless either party provides written notice to the otherparty of its desire to terminate this agreement in accordance herewith.</li>
			</ol>
		</li>
		</p>
		<p id="p9"><h4><li>	Termination</h4>
			<ol><li>Both parties shall have the right to terminate or cancel all or part of the services contemplated by this agreement or any request for services on any specific task at any time by giving 30 working days prior written notice of its intent to so terminate or cancel.</li> 
				<li>	Travaly reserves the right to terminate this agreement with immediate effect in the event of any material or other breach of the provision of this agreement by hotel including without limitation on the hotel's inability to offer inventory, inventory and rate parity not being maintained by the hotel, failure to issue invoices to company, bankruptcy or winding up proceedings against the hotel, change of control of the hotel or multiple escalations from customers against the hotel i.e., customer satisfaction index. Hotel shall immediately intimate company of any change of control. 				</li>
				<li>	If either party becomes bankrupt or insolvent or if a petition or other proceeding is filed by or against a party for re-organization, arrangement or relief under any law relating to bankruptcy or insolvency, or if a receiver is appointed in respect of a party’s property and assets or a substantial part thereof, or if a party makes an assignment for the benefit of creditors or if proceedings are instituted for the liquidation or winding-up of the business or assets of a party, then such acts shall be considered a default under this agreement. In such event, the non-defaulting party may, at its option, terminate this agreement upon providing notice in writing to the other party hereto. This agreement, once such notice is given, shall be terminated forthwith with no further obligation or liability other than for payment of any services that have, to that date, been performed by Travaly travel & hospitality LLP to the reasonable satisfaction of the Hotel.</li>
			</ol>
		</li>
		</p>
		<p id="p10"><h4><li> Duties and obligations of Travaly Travel & Hospitality LLP	</h4>
					Travaly Travel & Hospitality LLP shall:<br>
					Use its best efforts to market &promote Hotel and update information like photos, amenities, services, write up provided by Hotel. Travaly should do time to time communication related to reservation, invoice, tax, transfer fund, commission reports, cancellation & refund. 
				</li>
			</p>
		<p id="p11"><h4><li> Duties and obligations of the Hotel</h4>
			The Hotel shall:
			<ol><li> Provide information relating to the Hotel photos, amenities, services, write up and the rooms available for reservation, details of the rates (including all applicable taxes, levies, surcharges and fees) and availability, cancellation and no-show policies and other policies and restrictions.</li>
			<li> Time to time update inventory, rates, photos, guests review & rating. </li>
			<li> Hotel should honor guests provide standard support as per Hotel Standard Operating Procedure. </li>
			<li> Participant all events & activities carrying by Travaly like promotional activities, meetings, seminar, workshop, e-leaning, survey, & research.</li>
			<li> Generate invoice to Travaly to receive remittance.</li>
			<li> To ensure the user id’s log-in’s passwords, information about the extranet or any other log in authorization remain confidential. </li>
			<li> To ensure only be used by authorized personnel’s. Any breach of this provision will entitle Travaly to delete this Agreement in its entirety.</li>
		</ol>
		</li>
	</p>
		<p id="p12"><h4><li> Confidentiality</h4>
			 The following constitutes the applicable party’s “confidential information”: this agreement together with the schedules attached hereto; any computer software or other technical information, technology, research, design, idea, process, procedure, or improvement, or any portion or phase thereof; information relating to any of the other party’s current or proposed products, services, methods, businesses or business plans, marketing, pricing, distribution and other business strategies; lists of, or any other information relating to, any of the other party’s customers, suppliers, dealers, agents or employees and such party’s relationship therewith; the material and documentation and any financial information relating to any of the foregoing. All disclosures of confidential information by one party to the other are made solely on a confidential basis and as trade secrets. Accordingly, each party shall maintain the confidentiality of all confidential information during the initial term and any renewal term and at all times thereafter, irrespective of the manner or method in which it is terminated.
		</li>
	</p>
		<p id="p13"><h4><li> Limitation of liability</h4>
		<ol><li>	Travaly Travel & Hospitality LLP, in providing services pursuant to this agreement, shall not be responsible or liable for any acts, errors, omissions, delays, missed connections, accidents losses, injuries, deaths, property damage, or any indirect or consequential damages resulting therefrom, which may be the result of action, inaction, default or insolvency of any airline, hotel, car supplier, other third party goods or service suppliers except in the case of negligence or misconduct by Travaly Travel & Hospitality LLP. Travaly Travel & Hospitality LLP does not give any representation or warranty with respect to any aspect of any third-party supplier’s services. In the event of a supplier’s default with respect to all or any part of such supplier’s services, the Hotel’s sole recourse shall be with the supplier, and shall be subject to said supplier’s own terms and conditions.</li>

		<li>In no show and under no circumstances shall either party be liable for any indirect, incidental, consequential or special damages, including, without limitation, loss of revenue or loss of profits, for any reason whatsoever arising under this agreement, whether arising out of breach of warranty, breach of condition, breach of contract, tort, civil liability or otherwise.</li>
	</ol>
	</li>
	</p>
	<p id="p14"><h4><li> Representations and warranties</h4> 
		Each party hereby represents and warrants to that: 
	<ol><li>Each party has all required capacity and corporate authorization to enter into this agreement and be bound by the obligations provided hereunder;</li>
		
		<li>The execution of this agreement by Travaly Travel & Hospitality LLP and the performance of its obligations hereunder will not constitute a violation or breach of any obligation of any agreement between Travaly Travel & Hospitality LLP and any third party or a violation of Travaly Travel & Hospitality LLP’s legal obligations; and</li>

		<li>Travaly Travel & Hospitality LLP holds sufficient rights to use Hotel name, pictures, write up or resources used in the performance of the services under this agreement, free and clear of any encumbrances.</li>
		</ol>
		</li>
	</p> 
	<p id="p15"><h4><li> Verification</h4>
		In order to verify Hotel & to meet compliance of Travaly Travel & Hospitality LLP’s obligations hereunder, at any time or from time to time during performance of services, the Travaly Travel & Hospitality LLP or a representative designated by it and reasonably acceptable to Hotel, or regulatory agents, may, upon reasonable notice, inspect, physical visit, and test the manner in which the services are being performed. Such rights of inspection shall include visiting sites at which Hotel located, auditing selected records and databases containing data of the guests, observing the performance of the services or selected components thereof, and interviewing Hotel personnel familiar with, or responsible for, performing the services. Hotel shall cooperate with the Travaly Travel & Hospitality LLP personnel or representatives in such inspections, and shall ensure that appropriate staff, computing and other resources are available as required in the course of such inspections.
	</li>
	</p>
	<p id="p16"><h4><li> Notice</h4>
		<ol><li> Any notice provided for or permitted in this agreement shall be in writing and will be deemed to have been given 7 days after having been mailed, postage pre-paid, by certified or registered mail or by recognized overnight delivery services, except in the case of a postal or other strike affecting the service used whereupon notice will be deemed to have been given 7 days after normal service resumes.</li>
		<li> Where personal service is made or where delivery is made by facsimile and a receipt thereof has been retained, any notice provided for or permitted in this agreement will be deemed to have been given when received by the intended recipient. The intended recipient must be an individual whose personal name appears on the address set out in the notice.</li>
		<li> <u>Addressing and delivery is to be made as follows:</u><br>
			<h4>if to: </h4><b ><pre style="font-family:'Segoe UI'">
	Travaly Travel & Hospitality LLP:
	Travaly Travel & Hospitality LLP
	#167, Panduranga Nagar, 1st Cross, Off Bannerghatta Road,
	Bengaluru-560076, Karnataka, India.
	Attention: Partner Management Department </pre></b>
			<h4>if to : </h4><b ><pre style="font-family:'Segoe UI'">
	The Hotel 
	<input type="text" name="if_to_hotel_Name" placeholder="Hotel Name" />

	<textarea  name="if_to_address"placeholder="Full Address" rows="2" cols="40"></textarea>
	Attention:	
	<input type="text" name="attention" placeholder="Individual Name"/>

	<input type="text" name="designation" placeholder="Designation" />	
	As the case may be.</pre></b>
			</li>
			<li> The parties may communicate other addresses where notice must be sent to from time to time. Such communication shall be in writing and shall have the effect of replacing the address under subsection 16.3. No change of address effected under this section shall in any way affect the operation of any term, other than the delivery address of subsection 17.3, in this agreement.</li>
		</ol>
	</li>
	</p>
	<p id="p17">
		<h4><li> Remedies</h4>
		1. Hotel acknowledges that any violation of the terms of this agreement would result in damages to Travaly Travel & Hospitality LLP which could not be adequately compensated by monetary award alone. In the event of any violation by Hotel of the terms of this agreement, including, without limitation, of the Travaly’s proprietary rights and ownership, and confidentiality provisions, and in addition to all other remedies available at law and at equity, the Travaly Travel shall be entitled as a matter of right to apply to a court of competent equitable jurisdiction for relief, waiver, restraining order, injunction, decree or other remedy as may be appropriate to ensure compliance of Travaly Travel & Hospitality LLP with the terms of this agreement.
	</li>
	</p>
	<p id="p18"><h4><li> General provisions</h4>
			Entire agreement & amendments<br>
	This agreement together with the schedules hereto constitutes the entire agreement and understanding between the parties relating to the subject matter hereof, and supersedes all other agreements, oral or written, made between the parties with respect to such subject matter. Except as provided herein, this agreement may not be amended or modified in any way except by a written instrument signed by both parties.
		<ol><li> <b> Assignment</b><br>
		Neither party shall assign this agreement or any of its rights or obligations hereunder without prior written consent of the other party, which consent may be withheld at the other party’s discretion.</li>
		
		<li> <b> Incorporated by reference</b><br>
		The preamble and all attachments, schedules and exhibits attached hereto are hereby incorporated by reference and made a part of this agreement. </li>
		
		<li><b> Applicable law</b><br>
		This agreement shall be governed by and interpreted in accordance with the laws of the national & International, without reference to its conflict of law provisions, and the laws of country applicable therein. All disputes arising under this agreement will be referred to the courts of the state, National & International which will have jurisdiction, and each party hereto irrevocably submits to the jurisdiction of such courts.</li>
		
		<li> <b> Currency </b><br>
		All references to monetary amounts in this agreement shall be to respective country’s currency.</li>
		
		<li><b> Non-solicitation</b><br>
		Unless given prior written consent by the parties, which consent may require a payment to the party, each party agrees that it will not, during the initial term, knowingly solicit or hire any employee of the other party who is directly involved in providing the services herein.</li>
		
		<li><b>	Survival</b><br>
		Sections 9, 12, 13, 14, 15, 17 and 18 and subsections 19.6 and 19.7 and will survive the expiration or termination of this agreement.</li>
		
		<li><b> Absence of presumption</b><br>
		No presumption shall operate in favor of or against any party hereto as a result of any responsibility that any party may have had for drafting this agreement.</li>
		
		<li><b> Language clause</b><br>
		It is hereby agreed that both parties specifically require that this agreement and any notices, consents, authorizations, communications and approvals be drawn up in the English language.</li>
		
		<li><b> Interpretation</b><br>
		The headings and section numbers appearing in this agreement or any schedule attached hereto are inserted for convenience of reference only and shall not in any way affect the construction or interpretation of this agreement. For the purposes of this agreement a “day” means any day other than a Saturday, Sunday or other day on which Travaly Travel & Hospitality LLP is not open for business during its regular business hours at its head office.</li>

		<li><b> Severability </b> <br>
		If for any reason whatsoever, any term or condition of this agreement or the application thereof to any party or circumstance is, to any extent, invalid or unenforceable, all other terms and conditions of this agreement and/or the application of such terms and conditions to the parties or circumstances shall not be affected thereby and shall be separately valid and enforceable to the fullest extent permitted by law.</li>
		
		<li><b> Force majeure </b><br>
		In the event that any party hereto is delayed or hindered in the performance of any act required herein by reason of strike, inability to procure materials, failure of power, restrictive governmental law or regulations, riots, insurrection, war or other reasons of a like nature not the fault of such party, then performance of such act shall be excused for the period of the delay and the period of performance of any such act shall be extended for a period equivalent to the period of such delay, up to a maximum of 30 Days. The provisions of this force majeure clause shall not operate to excuse any party from the payment of any fee or other payment when due.</li>
		<li><b> Waiver</b><br>
		No waiver by either party of any obligation, restriction or remedy under this agreement shall be valid unless by specific written instrument. No acceptance by a party of any payment by another party and no failure, refusal or neglect of any party to exercise any right under this agreement or to insist upon full compliance by the other party with its obligations hereunder, shall constitute a waiver of any other provision of this agreement or any further or subsequent non-compliance with the same or any other provision.</li>
		
		<li><b> Further assurances</b><br>
		Each of the parties hereto hereby covenants and agrees to execute and deliver such further and other agreements, assurances, undertakings, acknowledgments or documents, and other acts and things as may be necessary or desirable in order to give full effect to this agreement and every part hereof.</li>
		
		<li><b> Binding nature</b><br>
			This agreement shall inure to the benefit of and be binding upon the parties hereto and their respective (as applicable) successors and assigns.</li>
		
		<li><b> Time of the essence</b><br>
		Subject to section 19.13 hereof, time shall be of the essence of this agreement and of each and every part hereof.  </li>
		</ol>
	</li>
	</p>
	<p id="p19"><h4><li>Counterparts</h4><br>
		This agreement may be signed in counterparts, and by use of facsimile signatures, each of which when signed and delivered shall be deemed to be an original, but all such counterparts shall together constitute one and the same instrument.
		<br>
		In witness whereof, each party to this agreement has caused it to be executed at [place of execution] on the date indicated above.</li><br><br><br><br><br><br>
		<div class="row">
			<div class="col-sm-6"  style="padding-left: 100px"> 
				<h4>First Party :</h4><br><br>
				Signature is Avilable During Printing <br><br>
				authorised stamp <br>&ensp; and signature 
					
			 </div>
			<div class="col-sm-6"  style="padding-left: 100px">
				<h4>Second Party :</h4><br><br>
				<input type="file" name="signature" required=""/><img  alt="signature" height="70px" width="200px"><br><br>
				&ensp;&ensp;&ensp;&ensp;&ensp;signature 
			</div>
		</div>
	</p>

</ol>
</div>
</div>
</div>

	<div align="center" style="width: 70%">
		<input type="checkbox" name="agree" required=""> I Agree &emsp;
		<input type="submit" class="btn btn-warning" style="width: 100px" name="print" value="print"/>
	</div>
</div>
</form>

</body>
</html>