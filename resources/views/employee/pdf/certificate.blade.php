<!DOCTYPE html>
<html>
<head>
  <title>Employee Award Certificate</title>
  <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Arbutus&family=Italianno&family=Nosifer&family=Oswald:wght@700&family=Sail&display=swap" rel="stylesheet" crossorigin="anonymous">


<style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Arbutus&family=Italianno&family=Nosifer&family=Oswald:wght@700&family=Sail&display=swap');
.h1 {

  font-family: 'Arbutus', cursive;
  font-size: 25px;
}
h2 {

  font-size: 25px;
}
h3 {

  font-size: 18px;
}
h4{
  font: italic small-caps bold 20px/30px Georgia, serif;
}
 p {
  font-size: 16px;
 }
 hr {
  width: 250px;
 }
 .h2 {
  font-family: 'Oswald', sans-serif;
  font-size: 20px;
  font-weight: bold;
  text-transform: uppercase;
 }
.first-div {
  width:900px;
  height:680px;
  padding:20px;
  text-align:center;
  border: 10px double #000000;
  position: absolute;
  margin: 80px 0 20px -175px;
  left: 20%;
  top: -15%;

}

.second-div {
  width:850px;
  height:630px;
  padding:20px;
  text-align:center;
  border: 10px double #000000 color bold blue;
  background: #BCC6CC;
  background: -webkit-linear-gradient(to right, #BCC6CC, #BBD2C5, #BCC6CC);
  background: linear-gradient(to right, #BCC6CC, #BBD2C5, #BCC6CC);
}

.first-span {
  font: italic small-caps bold 40px/45px Georgia, serif;

}
 .second-span {
  font: italic small-caps bold 25px/30px Italianno, serif;
  

 }
 .signature {
  
  margin-right: 580px;
  width: 250px;
  margin-top: 40px;
 }
 .date {
  margin-left: 600px;
  margin-top: -110px;
  width: 250px;
 }
</style>
<body>
<div class="first-div">

<div class="second-div">

    <span class="first-span font-weight-bold">Award Certificate</span>

       <br><br>

    <span class="second-span"><b>This certificate is awarded to</b></span>
       <br><br>
      <img src="img/award.png"/>
      <h1 class="h1">{{ $award->user->name}}</h1>

      <h2 class="h2">{{ $award->awardCategory->award_category}}<h2>

      <p>{{ $award->awardCategory->award_description}}</p>
      
      <h2>YOU DON’T HAVE TO BE GREAT TO START, BUT YOU HAVE TO START TO BE GREAT</h2>
      <hr>

      <div class="signature">
        <h4>Md Abdul Mannan Hridoy</h4>
        <hr>
        <h3>Certified by</h3>
      </div>

      <div class="date">
        <h3>{{ $award->date }}</h3>
        <hr>
        <h3>Date</h3>
      </div>
      
</div>

</div>
</div>


</div>

</div>
</body>
</html>
