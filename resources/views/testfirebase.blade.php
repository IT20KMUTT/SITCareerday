<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">


  <script src="https://www.gstatic.com/firebasejs/4.8.2/firebase.js"></script>
  <script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBKxY2FnfyJeC-8qAdBzzoefqETtRUNmVs",
    authDomain: "sitcareerday2018.firebaseapp.com",
    databaseURL: "https://sitcareerday2018.firebaseio.com",
    projectId: "sitcareerday2018",
    storageBucket: "sitcareerday2018.appspot.com",
    messagingSenderId: "187529268560"
  };
  firebase.initializeApp(config);
</script>

<title>Hello, world!</title>
</head>
<body>
  <br><br>
  <div class="row" align="center">
    <div class="col-xl-4 offset-xl-4">
      <div class="form-layout form-layout-4">
        <h5 class="br-section-label">Profile Update</h5>
        <p class="br-section-text">A basic form where labels are aligned in left.</p><br>
        <div class="row">
          <label class="col-sm-4 form-control-label" align="left">Prefix: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <select id="prefix" class="form-control select2" data-placeholder="Choose Browser">
              <option value="Mr.">Mr.</option>
              <option value="Miss">Miss</option>
            </select>
          </div>
        </div><!-- row -->
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label" align="left">Firstname: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input id="name" type="text" class="form-control" placeholder="Enter firstname">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label" align="left">Lastname: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input id="surname" type="text" class="form-control" placeholder="Enter lastname">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label" align="left">Age: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input id="age" type="text" class="form-control" placeholder="Enter your age">
          </div>
        </div>
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label" align="left">Religion: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input id="religion" type="text" class="form-control" placeholder="Enter your religion">
          </div>
        </div>
        <div class="row mg-t-20">
        </div><br>
        <div class="form-layout-footer mg-t-30" align="center">
          <button id="updateProfile" class="btn btn-info">Update</button>
          <button class="btn btn-secondary">Cancel</button>
        </div><!-- form-layout-footer -->
      </div><!-- form-layout -->
    </div><!-- col-6 -->
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  <script type="text/javascript">

  $(document).ready(function(){

    var rootRef = firebase.database().ref().child("Users/profile/-L3-2p16SyISl9V31c8b");

    rootRef.on('value', function(snapshot) {
      $('#prefix').val(snapshot.val().prefix);
      $('#name').val(snapshot.val().name) ;
      $('#surname').val(snapshot.val().surname) ;
      $('#age').val(snapshot.val().age) ;
      $('#religion').val(snapshot.val().religion) ;
    });
  });

  $( "#updateProfile" ).click(function() {
    // alert($('#name').val());
    var postData = {
      prefix: $('#prefix').val(),
      name: $('#name').val(),
      surname: $('#surname').val(),
      age: $('#age').val(),
      religion: $('#religion').val()
    };

    var updates = {};
    updates['Users/profile/-L3-2p16SyISl9V31c8b'] = postData;

    return firebase.database().ref().update(updates);

  });

  $('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
  });



  </script>
</body>
</html>
