 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>CV</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />

</head>
<body>
     
<div class="container justify-content-center">
  <br><br>
   <div class="row">
    <div class="col-lg-2 col-md-2 col-xs-4 col-sm-4">
    </div>
     <div class="col-lg-8 col-md-8 col-xs-4 col-sm-4">
     </div>
    <div class="col-lg-2 col-md-2 col-xs-4 col-sm-4">
      <a class="button button-primary jquery-word-export" href="javascript:void(0)">
          <span class="word-icon"><img src="https://img.icons8.com/dusk/30/000000/ms-word.png"></span>Word
      </a>
      <a class="button button-primary jquery-html-export" href="javascript:void(0)">
          <span class="word-icon"><img src="https://img.icons8.com/nolan/35/000000/html.png"></span>Html
        </a>
    </div>
  </div><br>
  <div id="page-content">
   <table width='80%' cellpadding="20pt" align="center" id="table" style="page-break-inside:auto;">
      <tr>
    <td><img src="/img/logo3.png"></td>
    </tr>
   </table> 
<table bgcolor="#24324a" width='80%' cellpadding="20pt" align="center" id="table" style="page-break-inside:auto;">

    <tr>

        <td>

        <img src="/photo/{{$user_infos[0]->photo}}" height="150pt" width="130pt" align="middle" style="width: 125px;">

        </td>

        <td >
          <img src="/img/cv/icon1.png" width="45" height="45" align="center" /> 
          <font size="4" color="white" valign = "top">{{$user_infos[0]->name}}</font>  </td> 
        <td><img src="/img/cv/icon2.png" width="30" height="30" align="center" /> <font size="4" color="white">{{$user_infos[0]->email}}</font></td> 
        <td><img src="/img/cv/icon3.png" width="30" height="30" align="center" /> <font size="4" color="white">{{$user_infos[0]->phone}}</font></td>
        <td><img src="/img/cv/icon4.png" width="35" height="35"  align="center" /> <font size="4" color="white">{{$user_infos[0]->gender}}</font></td>

    </tr>  
</table>
<table bgcolor="#f5f5f5" align="center" width='80%' cellpadding="20pt"  frame="box" border="0" id="table" style="page-break-inside:auto;">
     <tr>
      <td width="5%"></td>
       <td colspan="3">

       <font size="4"><b> Basic Informations </b> </font><br>
     </td>
    </tr>  
    <tr>
      <td width="5%"></td>
        <td width="35%"><img src="/img/cv/card.png" width="33" height="33" align="center"/> <font size="3">{{$user_infos[0]->nrc}}</font></td>
        <td width="35%"><img src="/img/cv/icon11.png" width="33" height="33" align="center" /> <font size="3">{{$user_infos[0]->race}}
        </font></td> 
        <td width="20%"><img src="/img/cv/pray.png" width="33" height="33" align="center" /> <font size="3">{{$user_infos[0]->religious}}
        </font> </td>  
    </tr>  
     <tr>
      <td width="5%"></td>
        <td><img src="/img/cv/town.png" width="32" height="32" align="center" /> <font size="3">{{$user_infos[0]->native_town}}
        </font></td>
        <td><img src="/img/cv/dateofbirth.png" width="32" height="32" align="center" /> <font size="3">{{$user_infos[0]->date_of_birth}}
        </font></td>
        <td><img src="/img/cv/weight.png" width="30" height="30" align="center"/> <font size="3">{{$user_infos[0]->weight}}</font></td>   
    </tr>  

     <tr>
      <td width="5%"></td>
        <td><img src="/img/cv/height.png" width="30" height="28"align="center" /> <font size="3">{{$user_infos[0]->height}}
        </font></td> 
        <td><img src="/img/cv/icon17.png" width="28" height="30"align="center" /> <font size="3">{{$user_infos[0]->marital_status}}
        </font></td> 
        <td><img src="/img/cv/icon18.png" width="35" height="30"align="center" /> <font size="3">{{$user_infos[0]->health}}
        </font></td>
         
        
    </tr>  
    <tr>
      <td width="5%"></td>
      <td><img src="/img/cv/icon19.png" width="30" height="30" align="center" /> <font size="3">{{$user_infos[0]->emergency_contact_name}}
        </font></td>
        <td><img src="/img/cv/icon20.png" width="30" height="30" align="center" /> <font size="3">{{$user_infos[0]->emergency_phone}}</font></td>
        <td><img src="/img/cv/icon21.png" width="25" height="25" align="center" /> <font size="3">{{$user_infos[0]->relation_with_econtact}}
        </font></td> 
    </tr>
    <tr>
      <td width="5%"></td>
      <td><img src="/img/cv/icon22.png" width="30" height="30" align="center" /> <font size="3">Mandalay
        </font></td>
      <td colspan="3"><img src="/img/cv/icon23.png" width="40" height="40" align="center" /> <font size="2">{{$user_infos[0]->address}},ChanMyaTharZi,Mandalay

        </font></td>
    </tr>
    <tr style="border-top: 1px solid silver;"></tr>

</table>

<table bgcolor="#f5f5f5" align="center" width='80%' cellpadding="20pt"  frame="box" border="0" id="table" style="page-break-inside:auto;">
  <tr>
      <td width="5%"></td>
       <td colspan="3">
      <font size="4"> <b> CV Informations </b></font><br>
     </td>
    </tr> 

    <tr>
      <td width="5%"></td>
        <td><img src="/img/cv/icon24.png" width="28" height="28" align="center"/> <font size="3">{{$user_infos[0]->job_position}}</font></td>
        <td><img src="/img/cv/icon7.png" width="30" height="30" align="center" /> <font size="3">{{$user_infos[0]->job_category}}
        </font></td> 
        <td><img src="/img/cv/icon8.png" width="28" height="28"  align="center" /> <font size="3">{{$user_infos[0]->experlevel}}
        </font></td> 
    </tr> 
    <tr>
      <td width="5%"></td>
        <td><img src="/img/cv/icon9.png" width="30" height="30" align="center" /> <font size="3">{{$user_infos[0]->education}}
        </font></td>
        <td><img src="/img/cv/icon6.png" width="30" height="30" align="center" /> <font size="3">{{$user_infos[0]->expected_salary}}MMK
        </font></td>
        <td><img src="/img/cv/icon25.png" width="35" height="35" align="center"/> <font size="3">{{$user_infos[0]->bond_with_prev_company}} bond with previous company</font></td>
    </tr> 
    <tr>
      <td width="5%"></td>
       <td><img src="/img/cv/icon26.png" width="30" height="30" align="center" /> <font size="2">{{$user_infos[0]->limit_jobs_with_prev_company}} limit jobs with previous company
        </font></td>
       <td><img src="/img/cv/icon32.png" width="35" height="35" align="center"/> <font size="2"> full time
        </font></td>
       <td><img src="/img/cv/icon33.png" width="35" height="35" align="center"/> <font size="2"> Find jobs

        </font></td>
    </tr>
    <tr style="border-top: 1px solid silver;"></tr>
     
</table>
@if(count($work_exps) > 0)
<table bgcolor="#f5f5f5" align="center" width='80%' cellpadding="20pt"  border="0" id="table" style="page-break-inside:auto;">
  <tr>
    <td width="5%"></td>
       <td colspan="4">
        <font size="4"><b> Work Experiences </b></font><br>
     </td>
    </tr> 
    @foreach($work_exps as $work_exp)
    <tr>
      <td width="5%"></td>
      <td colspan="3">

        <img src="/img/cv/icon34.png" width="28" height="28" align="center" /> <font size="3">{{$work_exp->star_date }} to {{$work_exp->end_date}}

        </font>
      </td>
    </tr>
    <tr>
      <td width="5%"></td>
        <td><img src="/img/cv/icon24.png" width="28" height="28" align="center"/> <font size="3">{{$work_exp->job_postion}}</font></td>
        <td><img src="/img/cv/icon7.png" width="30" height="30" align="center" /> <font size="3">{{$work_exp->job_cat_name}}
        </font></td> 
        <td><img src="/img/cv/icon8.png" width="30" height="30" align="center" /> <font size="3">{{$work_exp->job_exp_name}}
        </font></td>
    </tr> 
    <tr>
      <td width="5%"></td>
     <td colspan="3"><img src="/img/cv/icon28.png" width="30" height="30" align="center"/> <font size="2">{{$work_exp->left_reason}}</font></td>
     <td><img src="/img/cv/icon29.png" width="30" height="30" align="center" /> <font size="3">{{$work_exp->proof}}

    </tr>
    <tr style="border-top: 1px dashed silver;"></tr>
    @endforeach
    <tr style="border-top: 1px solid black;"></tr>

</table>
@endif
@if(count($trains) > 0)
<table bgcolor="#f5f5f5" align="center" width='80%' cellpadding="20pt"  frame="box" border="0" id="table" style="page-break-inside:auto;" >
  <tr>
    <td width="5%"></td>
       <td colspan="4">
         <font size="4"><b> Training Certificates </b></font><br>
     </td>
    </tr> 
    @foreach($trains as $train)
    <tr>
      <td width="5%"></td>
        <td colspan="3"><img src="/img/cv/icon30.png" width="28" height="28" align="center"/> <font size="3">{{$train->name}}</font></td>
    </tr> 
    <tr>
      <td width="5%"></td>
       <td><img src="/img/cv/icon31.png" width="30" height="30" align="center" /> <font size="2">{{$train->university}}
        </font></td> 
      <td><img src="/img/cv/icon32.png" width="33" height="33" align="center" /> <font size="3">{{$train->time_limit}}
        </font></td>
      <td><img src="/img/cv/icon27.png" width="28" height="28" align="center" /> <font size="3">{{$train->start_date }} to {{$train->end_date}}

        </font></td>
    </tr>
    <tr style="border-top: 1px dashed silver;"></tr>
    @endforeach
     
</table>
@endif

</div>
</div>
<br>
<br>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/FileSaver.js"></script>
<script src="/js/jquery.wordexport.js"></script>
<script src="/js/jquery.htmlExport.js"></script>
<!-- <script src="/js/jquery.watermark.min.js"></script> -->
<script>
$(document).ready(function() {

  $("a.jquery-word-export").click(function (events) {
            $("#page-content").wordExport();
        });

$("a.jquery-html-export").click(function (events) {
            $("#page-content").htmlExport();
        });


   });
   </script>
</body>
</html>