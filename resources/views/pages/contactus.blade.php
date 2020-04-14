@extends('layouts.app')

@section('content')

<div class="container">
  <div style="text-align:center;margin-top: 70px;">
    <h2>Contact Us</h2>
    <p><strong>Phone:</strong>01-111-222-333</p>
    <p><strong>Email Address:</strong>chalesqusit2020@gmail.com</p>
  </div>
  <div class="row">
    <div class="column-md-2">
      <img src="https://www.w3schools.com/w3images/map.jpg" style="width: 100% !important">
    </div>
    <div class="column-md-2">
      <form action="/action_page.php">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" placeholder="Your name..">
        <label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name..">
        <label for="country">Country</label>
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select><br>
        <label for="subject">Subject</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</div>

@endsection

