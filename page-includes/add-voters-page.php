  <div id="page-add-voters" style="top:100px; width:70%; position:absolute; left:20%; display:none;">
    <h2 style="text-align:center">Add Voters</h2>
    <hr style="border:1px solid">
    <label class="control-label" style="color: red; font-weight: lighter;">This is a manual override. Use it only if necessary.</label>
    <form id="add-voters-form" action="action.php" method="get" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group" id="add-voters-rollno-grp">
        <label class="control-label col-lg-2">Roll no.</label>
        <div class="col-lg-3">
          <input id="add-voters-rollno" name="add-voters-rollno" required="true" type="text" class="form-control" value="" />
        </div>
      </div>
      <div class="form-group" id="add-voters-prog-grp">
        <label class="control-label col-lg-2">Programme</label>
        <div class="col-lg-3">
          <select required="true" id="add-voters-prog" name="add-voters-prog" class="form-control select-picker" onChange="prog_onChange()">
            <option value='' disabled selected>Select programme</option>
            <option value='btech'   >UG B.Tech.         </option>
            <option value='ddcsp'   >UG DD CSP          </option>
            <option value='ddmic'   >UG DD Micro        </option>
            <option value='mtechcsp'>M.Tech. CSP        </option>
            <option value='mtechcon'>M.Tech. Control    </option>
            <option value='mtechpow'>M.Tech. Power	</option>
            <option value='mtechmic'>M.Tech. Micro	</option>
            <option value='mtechele'>M.Tech. Electronic </option>
            <option value='phd'     >PhD                </option>
          </select>
        </div>
      </div>
      <div class="form-group" id="add-voters-yr-grp">
        <label class="control-label col-lg-2">Year</label>
        <div class="col-lg-3">
          <select required="true" id="add-voters-yr" name="add-voters-yr" class="form-control select-picker">
            <option value='' disabled selected>Select year</option>
            <option value='1'>1st</option>
            <option value='2'>2nd</option>
            <option value='3'>3rd</option>
            <option value='4'>4th</option>
            <option value='5'>5th</option>
          </select>
          <label class="control-label" style="font-weight: lighter;">Not required for PhD students.</label>
        </div>
      </div>
      <div class="form-group" id="add-voters-result-grp">
        <label class="control-label col-lg-2" style="padding-top: 0px;">Result</label>
        <div class="col-lg-3">
          <label id="add-voters-result"></label>
        </div>
      </div>
      <input id="add-voters-name" name="add-voters-name" type="hidden" value=""/>
      <input id="add-voters-uid" name="add-voters-uid"  type="hidden" value=""/>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary" name="submit" value="add-voters" onClick="return submit_onClick(['add-voters-name', 'add-voter$
        </div>
      </div>
    </form>
  </div>

