@extends('layouts.employee')
  @section('main')
<style type="text/css">

.h1 {

  font-family: 'Arbutus';font-size: 20px;
}
h2 {

  font-size: 25px;
}
h3 {

  font-size: 18px;
}
 h4 {
  font-family: 'Sail';font-size: 22px;
 }
 p {
  font-size: 16px;
 }
 hr {
  width: 250px;
 }
 .h2 {
  font-family: 'Nosifer';font-size: 15px;
 }
.first-div {
  width:900px;
  height:600px;
  padding:20px;
  text-align:center;
  border: 10px double #000000;
  position: absolute;
  margin: 80px 0 20px -175px;
  left: 25%;
  top: 25%;"
  /*background: linear-gradient(to right,#BCC6CC,#DF01D7);*/
}

.second-div {
  width:850px;
  height:550px;
  padding:20px;
  text-align:center;
  border: 10px double #000000 color bold blue;
  background: #BCC6CC; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #BCC6CC, #BBD2C5, #BCC6CC); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #BCC6CC, #BBD2C5, #BCC6CC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.first-span {
  font-family: 'New Rocker';font-size: 40px;
  font-weight:bold;

}
 .second-span {
  font-size:20px;
  font-style: bold;

 }
 .signature {

  margin-right: 580px;
  width: 250px;
  margin-top: 25px;
 }
 .date {
  margin-left: 600px;
  margin-top: -80px;
  width: 250px;
 }

 /* latin-ext */
@font-face {
  font-family: 'New Rocker';
  font-style: normal;
  font-weight: 400;
  src: local('New Rocker'), local('NewRocker-Regular'), url(https://fonts.gstatic.com/s/newrocker/v8/MwQzbhjp3-HImzcCU_cJoGofiIlP.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'New Rocker';
  font-style: normal;
  font-weight: 400;
  src: local('New Rocker'), local('NewRocker-Regular'), url(https://fonts.gstatic.com/s/newrocker/v8/MwQzbhjp3-HImzcCU_cJoGQfiA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* latin-ext */
@font-face {
  font-family: 'Sail';
  font-style: normal;
  font-weight: 400;
  src: local('Sail'), local('Sail-Regular'), url(https://fonts.gstatic.com/s/sail/v10/DPEjYwiBxwYJJB3JAQYA.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Sail';
  font-style: normal;
  font-weight: 400;
  src: local('Sail'), local('Sail-Regular'), url(https://fonts.gstatic.com/s/sail/v10/DPEjYwiBxwYJJBPJAQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* latin-ext */
@font-face {
  font-family: 'Arbutus';
  font-style: normal;
  font-weight: 400;
  src: local('Arbutus Regular'), local('Arbutus-Regular'), url(https://fonts.gstatic.com/s/arbutus/v9/NaPYcZ7dG_5J3pooX9tnrhO8.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Arbutus';
  font-style: normal;
  font-weight: 400;
  src: local('Arbutus Regular'), local('Arbutus-Regular'), url(https://fonts.gstatic.com/s/arbutus/v9/NaPYcZ7dG_5J3pooX9Vnrg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* latin-ext */
@font-face {
  font-family: 'Nosifer';
  font-style: normal;
  font-weight: 400;
  src: local('Nosifer'), local('Nosifer-Regular'), url(https://fonts.gstatic.com/s/nosifer/v8/ZGjXol5JTp0g5bxZWCRbVQNd.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Nosifer';
  font-style: normal;
  font-weight: 400;
  src: local('Nosifer'), local('Nosifer-Regular'), url(https://fonts.gstatic.com/s/nosifer/v8/ZGjXol5JTp0g5bxZWCpbVQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
</style>

  <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Award Certificate</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="admin">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Award</a></li>
              <li class="breadcrumb-item"><a href="">Give an Award</a></li>
              <li class="breadcrumb-item active" aria-current="page">Award Certificate</li>
            </ol>
          </div>
          

<div class="row">
            <!-- DataTable with Hover -->
            <div class="col-lg-12 text-center">
              <a href="{{url('admin/give_awards/') }}/{{ $GiveAward->id}}/edit">
                <button type="button" class="btn btn-success"><li class="far fa-eye">Generate PDF</li></button>
              </a>
              

<div class="first-div">

<div class="second-div">

    <span class="first-span">Award Certificate</span>

       <br><br>

    <span class="second-span"><b>This certificate is awarded to</b></span>
       <br>
      <img src="https://img.icons8.com/cotton/64/000000/first-place-ribbon--v2.png"/>

      <h1 class="h1">{{ $GiveAward->user->name}}</h1>

      <h2 class="h2">{{ $GiveAward->awardCategory->award_category}}<h2>

      <p>{{ $GiveAward->awardCategory->award_description}}</p>
      
      <h2>YOU DON’T HAVE TO BE GREAT TO START, BUT YOU HAVE TO START TO BE GREAT</h2>
      <hr>

      <div class="signature">
        <h4>Md Abdul Mannan Hridoy</h4>
        <hr>
        <h3>Certified by</h3>
      </div>

      <div class="date">
        <h3>{{ $GiveAward->date }}</h3>
        <hr>
        <h3>Date</h3>
      </div>
      
</div>

</div>
</div>


</div>

</div>

@endsection
