  <div id="page-add-news" style="top:100px; width:70%; position:absolute; left:20%;">
    <h2 style="text-align:center">Add News Item</h2>
    <hr style="border:1px solid">
    <form id="add-news-form" action="action.php" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group" id="add-news-headline-grp">
        <label class="control-label col-lg-2">Headline</label>
        <div class="col-lg-9">
          <input id="add-news-headline" name="add-news-headline" required="true" type="text" class="form-control" value="" pattern=".{10,60}"/>
          <label class="control-label" style="font-weight: lighter;font-size: 10px;">(10 to 60 characters)</label>
        </div>
      </div>
      <div class="form-group" id="add-news-synopsis-grp">
        <label class="control-label col-lg-2">Synopsis</label>
        <div class="col-lg-9">
          <input id="add-news-synopsis" name="add-news-synopsis" required="true" type="text" class="form-control" value="" pattern=".{20,160}"/>
          <label class="control-label" style="font-weight: lighter;font-size: 10px;">(20 to 160 characters)</label>
        </div>
      </div>
      <div class="form-group" id="add-news-expiry-grp">
        <label class="control-label col-lg-2">Expires after</label>
        <div class="col-lg-3">
          <select required="true" id="add-news-expiry" name="add-news-expiry" class="form-control select-picker">
            <option value='1'>1 day</option>
            <option value='2' selected>2 days</option>
            <option value='3'>3 days</option>
            <option value='4'>4 days</option>
            <option value='5'>5 days</option>
            <option value='6'>6 days</option>
            <option value='7'>7 days</option>
          </select>
        </div>
      </div>
      <div class="form-group" id="add-news-preview-grp">
        <label class="control-label col-lg-2" style="padding-top: 0px;">Banner image</label>
        <div class="col-lg-3">
          <input id="add-news-banner" name="add-news-banner" required="true" type="file" value=""/>
        </div>
      </div>
      <div class="form-group" id="add-news-data-grp">
        <label class="control-label col-lg-2" style="padding-top: 0px;">HTML data</label>
        <div class="col-lg-9">
          <textarea id="add-news-data" name="add-news-data" required="true" style="width:100%;" rows="10" value="Double click to edit news"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary" name="submit" value="add-news">Submit</button>
        </div>
      </div>
    </form>
  </div>
