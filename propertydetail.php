<?php include 'propertymenu.php'; ?>
 <!DOCTYPE html>
<html>
<head>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkad<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
uKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#change').click(function(){
    
         $('#intime').attr('readonly', 'readonly');
         $('#outtime').attr('readonly', 'readonly');
      
    });
});
</script>
</head>
<body>
    <form>

        <div class="mb-5"></div>
        <div class="row">
        <div class="col-6">
                        <table cellpadding="5" class="table table-striped col-md-6 " style="left: 20px;">
                                <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                        <td align="center" colspan="4">
                        <b>Property Details</b>
                        </td>
                        </tr>
                <tr>
                                        <td>
                                                <label class="" >Property Id</label>
                                        </td>
                                        <td>
                                                <input type="text" list="pid" name="pid" class=" form-control" disabled="" />
                                        </td>
                                </tr>
                <tr>
                        <td>
                                <label class="" >Property Name </label>
                        </td>
                        <td>
                                <input type="text" list="pname" name="pname" class=" form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Property Type </label>
                        </td>
                        <td>
                                <select id="property" required class=" form-control">
                                        <option value="" style="display: none;">Choose Property</option>
                                        <option value="hotel">Hotel</option>
                                        <option value="resort">Resort</option>
                                        <option value="holidayHome">Holiday Home</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="guestHouse">Guest House</option>
                                        <option value="bedAndBreakfast">Bed & Breakfast</option>
                                        <option value="cottage">Cottage</option>
                       </select>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Chain Name </label>
                        </td>
                        <td>
                                <input type="text"  name="chain" class=" form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Establishment </label>
                        </td>
                        <td>
                                <input type="date"  name="establishment" class="  form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Currency </label>
                        </td>
                        <td>
                                <select id="currency" required class="form-control">
                                        <option value="" style="display: none;">Choose Currency</option>
                                        <option value="hotel">Rupee</option>
                                        <option value="resort">Dollar</option>
                                        <option value="holidayHome">Pound</option>
                                        <option value="apartment">Euro</option>
                                        <option value="guestHouse">Yen</option>
                                        <option value="bedAndBreakfast">Riyal</option>
                                        <option value="cottage">Franc</option>
                                </select>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Check In time </label>
                        </td>
                        <td>
                                <input type="date"  name="intime" id="intime" class=" form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Check Out Time </label>
                        </td>
                        <td>
                                <input type="date"  name="outtime" id="outtime" class="form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>

                                <input type="radio" name="change" id="change" value=""  class=" form-control">
                                
                        </td>
                        <td>
                            <label>24 hour check in and check out</label>
                        </td>
                </tr>
                
                <tr>
                        <td>
                                <label class="" >Description</label>
                        </td>
                        <td>
                                <textarea rows="4" cols="25" maxlength="200">
                                        
                                </textarea>
                        </td>
                </tr>
                
        </table>

     </div>   
     <div class="col-6">
        
        <table  class="table table-striped col-6">
                 <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                <td align="center" colspan="4">
                        <b>Address</b>
                </td>
         </tr>
                <tr>
                        <td>
                                <label class="" >Street </label>
                        </td>
                        <td>
                                <input type="text"  name="street" class="  form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >City </label>
                        </td>
                        <td>
                                <input type="text"  name="city" class="  form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >State </label>
                        </td>
                        <td>
                                <input type="text"  name="state" class="  form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Country </label>
                        </td>
                        <td>
                                <input type="text"  name="country" class="  form-control"  />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Zip/Postal Code </label>
                        </td>
                        <td>
                                <input type="text"  name="zpcode" class="  form-control"  />
                        </td>
                </tr>
        </table>
</div>
<div class="col-6">
<table  class="table table-striped col-6" style="left: 20px;">
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                <td align="center" colspan="4">
                        <b>Contact Info</b>
                </td>
         </tr>
        <tr>
            <td>
                <label class="" >GM Name</label>
            </td>
            <td>
                <input type="text"  name="gmname" class="  form-control"  />
            </td>
        </tr>
        <tr>
            <td>
                <label class="" >Email</label>
            </td>
            <td>
                <input type="email"  name="email" class="  form-control"  />
            </td>
        </tr>
        <tr>
            <td>
                <label class="" >Phone</label>
            </td>
            <td>
                <input type="text"  name="phone" class="  form-control"  />
            </td>
        </tr>
    </table>
</div>
<div class="col-6">
    <table  class="table table-striped col-6" style="position: relative;top:-300px;">
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                <td align="center" colspan="4">
                        <b>Manager Name</b>
                </td>
         </tr>
        <tr>
            <td>
                <label class="" >Email</label>
            </td>
            <td>
                <input type="email"  name="man_email" class="  form-control"  />
            </td>
        </tr>
        <tr>
            <td>
                <label class="" >phone</label>
            </td>
            <td>
                <input type="text"  name="man_phone" class="  form-control"  />
            </td>
        </tr>
    </table>
</div>
<div class="col-6">
    <table  class="table table-striped col-6" style="position: absolute;top:-260px;right:-450px;">
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                <td align="center" colspan="4">
                        <b>Front Desk/Reservation Manager</b>
                </td>
         </tr>
         <tr>
            <td>
                <label class="" >Email</label>
            </td>
            <td>
                <input type="email"  name="resman_email" class="  form-control"  />
            </td>
        </tr>
        <tr>
            <td>
                <label class="" >phone</label>
            </td>
            <td>
                <input type="text"  name="resman_phone" class="  form-control"  />
            </td>
        </tr>
     </table>
 </div>
<table>
    
    <tr>
        
        <td >
            <input type="submit" name="submit" class=" form-control btn btn-primary btn-lg">
        </td>
        
    </tr>

    

</table>

</div>
</form>
</body>
</html>