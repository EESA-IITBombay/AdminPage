  <div id="page-del-news" style="top:100px; width:70%; position:absolute; left:20%; display:none;">
    <h2 style="text-align:center">Remove News Item</h2>
    <hr style="border:1px solid">
    <form id="del-news-form" action="action.php" method="post" class="form-horizontal" enctype="multipart/form-data">
      <div class="form-group" id="del-news-headline-grp">
        <label class="control-label col-lg-2">Headline</label>
        <div class="col-lg-3">
          <select required="true" id="del-news-id" name="del-news-id" class="form-control select-picker">
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary" name="submit" value="del-news">Submit</button>
        </div>
      </div>
    </form>
  </div>
